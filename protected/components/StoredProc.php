<?php

class StoredProc
{
    public $ProcedureName = '';
    public $Parameters = array();
    public $CheckParam;
    public $NoInitParams = '';
    
    // Объявление параметров хранимой процедуры
    public $InitParams = '';
    // Выборка возвращенных параметров
    public $SelectParams = '';
            
    public function __construct() {
        $this->CheckParam = FALSE;
    }
    
    protected function getTypeParam($type, $length)
    {
        if ($type === 'nvarchar') 
            if ($length == -1)
                return $type . '(MAX)';
            else
                return $type . '('. $length .')';
            
        if ($type === 'ntext')
            return 'nvarchar(MAX)';
        
        return $type;            
    }
    
    public function ParametersRefresh()
    {
        if ($this->ProcedureName == '')
            throw new CHttpException(404, 'Не указано имя хранимой процедуры: ');    
        
        $this->InitParams = '';
        $this->SelectParams = '';
        
        // Поиск хранимой процедуры
        $Row = Yii::app()->db->createCommand(""
                    . "Select"
                    . "     o.Object_id,"
                    . "     o.Name"
                    . "\nFrom sys.objects o"
                    . "\nWhere o.type = 'P'"
                    . "and o.Name = '" . $this->ProcedureName . "'")->queryAll();
            
        if (count($Row) === 0)
            throw new CHttpException(404, 'Хранимая процедура не найдена');
        else
            $SP_NAME = $Row[0]['Name'];
            
        $Command = Yii::app()->db->createCommand(    "Select"
                                                ."  PARAMETER_NAME,"
                                                ."  PARAMETER_MODE,"
                                                ."  DATA_TYPE,"
                                                ."  CHARACTER_MAXIMUM_LENGTH"
                                                ."\n From INFORMATION_SCHEMA.PARAMETERS"
                                                ."\n Where SPECIFIC_NAME = '" . $SP_NAME ."'"

                                            );
        // Считываем параметры процедуры
        $Params = $Command->QueryAll();
        
        for ($i = 0; $i <= count($Params)-1; ++$i)
        {
            $ParamName = $Params[$i]['PARAMETER_NAME']; // Имя параметра в MSSQL
            $Type = $this->getTypeParam($Params[$i]['DATA_TYPE'], $Params[$i]['CHARACTER_MAXIMUM_LENGTH']); // Тип параметра   
            $Mode = $Params[$i]['PARAMETER_MODE']; // INPUT/OUTPUT
            $FieldName = substr($ParamName, 1); // Имя поля
            $Placeholder = ':' . substr($ParamName, 1); // PLACEHOLDER
            
            $this->Parameters[$i] = array('ParamName' => $ParamName, 'Value' => NULL, 'Type' => $Type, 'Placeholder' => $Placeholder, 'ParamMode' => $Mode, 'FieldName' => $FieldName);
            
            if ($this->InitParams === '')
                $this->InitParams = "\nDECLARE " . $ParamName . ' ' . $Type . ' = ' . $Placeholder;
            else
                $this->InitParams = $this->InitParams . ', ' . $ParamName . ' ' . $Type . ' = ' . $Placeholder;
            
            if ($this->SelectParams === '')
                $this->SelectParams = " \nSELECT " . $ParamName . " as " . $FieldName;
            else
                $this->SelectParams = $this->SelectParams . ", " .$ParamName . ' as [' . $FieldName . ']';
        }
        
    }
    
    protected function FindParamInModel($params , $model)
    {
        $attributes = $model->attributeNames();
                
        for ($j = 0; $j < count($attributes); ++$j)
        {
            if (mb_strtoupper($params['FieldName']) === mb_strtoupper($attributes[$j])) {
                if (strtolower($params['Type']) == 'datetime') {
                    if ($model->$attributes[$j] !== null)
                        //$model->$attributes[$j] = Yii::app()->dateFormatter->formatDateTime($model->$attributes[$j], 'short','short');
                        $model->$attributes[$j] = DateTimeManager::YiiDateToAliton ($model->$attributes[$j]);
                }
                return $attributes[$j];

            }
        }
        
        return FALSE;
    }

    public function SetParamValue($ParamName = '', $Value = null) {
        for ($i = 0; $i <= count($this->Parameters)-1; ++$i) {
            if ($this->Parameters[$i]['ParamName'] == $ParamName) {
                if ($Value == '') $Value = null;
                $this->Parameters[$i]['Value'] = $Value;
                $this->CheckParam = TRUE;
                return 0;
            }
        }
    }
    
    public function SetStoredProcParams($model)
    {
        // Устанавливаем параметры процедуры
        $this->CheckParam = TRUE;
        // Составляем список параметров
        $this->ParametersRefresh();
        
        // Цикл по параметрам
        for ($i = 0; $i <= count($this->Parameters)-1; ++$i)
        {
        
            $ModelFieldName = $this->FindParamInModel($this->Parameters[$i], $model);
                
            if ($ModelFieldName !== FALSE)
            {
               
                if (($ModelFieldName === 'EmplCreate') ||
                    ($ModelFieldName === 'EmplChange') ||
                    ($ModelFieldName === 'EmplDel')    
                   ) $this->Parameters[$i]['Value'] = Yii::app()->user->Employee_id;
                else
                {
                    //echo '<br>' . $ModelFieldName . ' = ' . $model->$ModelFieldName;
                    $Value = $model->$ModelFieldName;
                    
                    if (($this->Parameters[$i]['Type'] === 'int') && ($Value === ''))
                        $Value = null;
                    
                    if (($this->Parameters[$i]['Type'] === 'float') && ($Value === ''))
                        $Value = null;
                    
                    if (($this->Parameters[$i]['Type'] === 'nvarchar') && ($Value === ''))
                        $Value = null;
                    
                    $this->Parameters[$i]['Value'] = $Value;
                }    
            }
            else 
            {
                $this->CheckParam = FALSE;
                
                //$this->Parameters[$i]['Value'] = NULL;
                
                if ($this->NoInitParams === '') 
                    $this->NoInitParams = $this->Parameters[$i]['ParamName'];
                else
                    $this->NoInitParams = $this->NoInitParams . ', '. $this->Parameters[$i]['ParamName'];
            }
        }
    }
    
    public function Execute()
    {
        if ($this->CheckParam)
        {
            $InitSQL = $this->InitParams;
            //$ProcNameSQL = "SET NOCOUNT ON;";
            $ProcNameSQL = " \nEXEC DBO." . $this->ProcedureName;
            $ParamsSQL = "";
            $SelectSQL = $this->SelectParams;
                    
            for ($i = 0; $i < count($this->Parameters); ++$i)
            {
                $OUT = "";
                
                if (strpos($this->Parameters[$i]['ParamMode'], 'OUT') !== FALSE)
                    $OUT = " OUT";
                if ($ParamsSQL !== "")
                    $ParamsSQL = $ParamsSQL . "\n, " . $this->Parameters[$i]['ParamName'] . $OUT;
                else 
                    $ParamsSQL = " " . $this->Parameters[$i]['ParamName'] . $OUT;
            }
            
            $SQLCommand = "SET NOCOUNT ON; \n" . $InitSQL . $ProcNameSQL . $ParamsSQL . $SelectSQL;
            //$SQLCommand = $InitSQL;  //. $SelectSQL;
            
            
            //echo '<br><br>$SQLCommand' . str_replace("\n", "<br>", $SQLCommand);
            
            $Cmd = Yii::app()->db->createCommand($SQLCommand);
            
            $Params = '';
            
            for ($i = 0; $i < count($this->Parameters); ++$i)
            {
                $Params .= "<br>" . $this->Parameters[$i]['Placeholder'] . ' = ' . $this->Parameters[$i]['Value'];
                if (is_null($this->Parameters[$i]['Value'])) {
                    
                    
                    
                    $Params .= " NULL";
                    $Cmd->bindParam($this->Parameters[$i]['Placeholder'], $this->Parameters[$i]['Value'], PDO::PARAM_NULL);
                } else {
                    
                    $Cmd->bindParam($this->Parameters[$i]['Placeholder'], $this->Parameters[$i]['Value']);
                }
            }
            
            
            $Result = array();
            
            try {
                $Result = $Cmd->QueryRow();
            } catch (Exception $e) {
                //echo 'Выброшено исключение: ',  $e->getMessage(), "\n";
                throw new CHttpException(404, 'Не удалось выполнить хранимую процедуру: ' . $e->getMessage() . "\n" . $Params);
                //echo $Params;
            }
            
            //$Result = $Cmd->QueryRow();
            
            return $Result; 
        }
        else {
            throw new CHttpException(404, 'Неопределены параметры: ' . $this->NoInitParams);
        }
    }
}

