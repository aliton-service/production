<?php

class MainFormModel extends CFormModel
{
    // Наименование хранимой процедуры вставки
    public $SP_INSERT_NAME = '';
    // Наименование хранимой процедуры редактирования
    public $SP_UPDATE_NAME = '';
    // Наименование хранимой процедуры удаления
    public $SP_DELETE_NAME = '';
        
    public $Filters = array();
    
    // Наименование ключевого поля
    public $KeyFiled = '';
    
    public $Query;

    public $PrimaryKey;
    
    public function __construct($scenario = '') {
        parent::__construct($scenario);
        
        $this->Query = new SQLQuery();
    }
    
    public function filter(array $data)
    {
        foreach ($data AS $rowIndex => $row) {
            foreach ($this->Filters AS $key => $searchValue) {
                if (!is_null($searchValue) AND $searchValue !== '') {
                    $compareValue = null;
 
                    if ($row instanceof CModel) {
                        if (isset($row->$key) == false) {
                            throw new CException("Property " . get_class($row) . "::{$key} does not exist!");
                        }
                        $compareValue = $row->$key;
                    } elseif (is_array($row)) {
                        if (!array_key_exists($key, $row)) {
                            throw new CException("Key {$key} does not exist in array!");
                        }
                        $compareValue = $row[$key];
                    } else {
                        throw new CException("Data in CArrayDataProvider must be an array of arrays or an array of CModels!");
                    }
 
                    if (stripos(mb_strtolower($compareValue,"utf-8"), mb_strtolower($searchValue,"utf-8")) === false) {
                        unset($data[$rowIndex]);
                    }
                }
            }
        }
        return $data;
    }  
    
    public function Insert()
    {
        // Вставка записи
        if ($this->SP_INSERT_NAME === '')
            return 0;
               
        return $this->execProcedure($this->SP_INSERT_NAME);
    }
    
    public function Update()
    {
        // Редактирование записи
        if ($this->SP_UPDATE_NAME === '')
            return 0;
        
        $this->execProcedure($this->SP_UPDATE_NAME);
    }
    
    public function Delete()
    {
        // Вставка записи
        if ($this->SP_DELETE_NAME === '')
            return 0;
        
        $this->execProcedure($this->SP_DELETE_NAME);
    }

      public function callProc($name) {
        if($name == null) return;

        $this->execProcedure($name);
    }

    public function execProcedure($name) {
        $SP = new StoredProc();
        $SP->ProcedureName = $name;
        $SP->SetStoredProcParams($this);
        return $SP->Execute();
        
    }
    
    public function getModelPk($Id)
    {
        // Считывание модели
        $where = $this->Query->where;
        $this->Query->where = '';
        $this->Query->AddWhere($this->KeyFiled . " = " . $Id);

        $row = $this->Query->QueryRow();
        
        $atr = $this->attributeNames();
        
        for ($i = 0; $i < count($atr); ++$i)
        {
            if (isset($row[$atr[$i]]))
                $this->$atr[$i] = $row[$atr[$i]];
        }
        $this->Query->where = $where;

    }
    
    public function Find($Params, $Conditions = array(), $TopCount = -1)
    {
        $this->createQuery($Params, $Conditions, $TopCount);
        
        return $this->Query->QueryAll();
    }

    public function queryRow($Params, $Conditions = array(), $TopCount = -1)
    {
        $this->createQuery($Params, $Conditions, $TopCount);
        return $this->Query->queryRow();
    }

    protected function createQuery($Params, $Conditions = array(), $TopCount = -1) {
        // Поиск по параметрам, возвращаем массив записей
        foreach ($Params as $key => $value)
        {
            $this->Query->AddWhere($key . " = " . trim($value));
        }

        foreach ($Conditions as $key => $value) {
            $this->Query->AddWhere(trim($value));
        }

        if (($TopCount != -1) && ($TopCount != ""))
        {
            $this->Query->text = str_ireplace("Select", "Select Top " . $TopCount, $this->Query->text);
        }

    }
    
    public function getCountAllRow()
    {
        $Select = '';
        $Form = '';
        $Where = '';
        $Order = '';
        
        $Select = $this->Query->select;
        $Form = $this->Query->from;
        $Where = $this->Query->where;
        $Order = $this->Query->order;
        
        $Select = "Select Count(*) CountAll \n";
        $QueryText = $Select . "\n" . $Form . "\n" . $Where;
        
        /*
        $QueryText = $this->Query->text;
        $IdxOrder = strripos($QueryText, "Order");
        $QueryText = substr($QueryText, 0, $IdxOrder);
        $IdxFrom =  strripos($QueryText, "From");
        $QueryText = substr($QueryText, $IdxFrom, strlen($QueryText));
        $QueryText = "Select Count(*) CountAll \n" . $QueryText;
        */
        $Result  = Yii::app()->db->createCommand($QueryText)->queryAll();
        if (count($Result) > 0)
            return $Result[0]["CountAll"];
        else
            return 0;
    }
    
    public function FindAjaxFirst($Filters = array(), $Sort = array())
    {
        $Result = array();
        $CountAllRow = $this->getCountAllRow();
        
        if (count($Sort) > 0)
        {
            $this->Query->setOrder("");
            for ($i = 0; $i < count($Sort); $i++)
                $this->Query->addOrder($Sort[$i]);
        }
        
        $NewQuery = new SQLQuery();
        $From =  $this->str_replace_once('select', 'Select Top ' . $CountAllRow . ' ROW_NUMBER() OVER('.$this->Query->order.') as RowNumber,', $this->Query->text);
        $Select = 'Select Top 1 t.*';
        $From = "\nFrom (" . $From . ") t";
        $NewQuery->setSelect($Select);
        $NewQuery->setFrom($From);
        
        for ($i = 0; $i < count($Filters); $i++)
            $NewQuery->AddWhere($Filters[$i]);
        
        $Result['Data'] = $NewQuery->QueryAll();
        return $Result;
    }
    
    public function str_replace_once($search, $replace, $text){ 
        $pos = stripos($text, $search); 
        return $pos!==false ? substr_replace($text, $replace, $pos, strlen($search)) : $text; 
    }
    
    public function FindAjax($Page, $PageSize, $Sort = array(), $InternalFilters = array(), $ExternalFilters = array())
    {
        $Result = array();
        $Top = $Page*$PageSize;
        $Start = $Page*$PageSize - $PageSize;
        
        if (count($Sort) > 0)
        {
            $this->Query->setOrder("");
            for ($i = 0; $i < count($Sort); $i++)
                $this->Query->addOrder($Sort[$i]);
        }
        
        if ($this->Query->order == '')
            $this->Query->addOrder($this->KeyFiled);
        
        for ($i = 0; $i < count($InternalFilters); $i++)
            $this->Query->AddWhere($InternalFilters[$i]);
        
        if ($this->Query->where == '')
            $this->Query->AddWhere("(1=1)");
        
        if ($Top < 0) {
            $CountAllRow = $this->getCountAllRow();
            $Top = $CountAllRow;
        }
        else
            $CountAllRow = $this->getCountAllRow();
            
        //$QueryText = str_ireplace('select', 'Select Top ' . $Top . ' ROW_NUMBER() OVER('.$this->Query->order.') as RowNumber,', $this->Query->text, $subject);
        
        $QueryText = $this->str_replace_once('select', 'Select Top ' . $Top . ' ROW_NUMBER() OVER('.$this->Query->order.') as RowNumber,', $this->Query->text);
        
        
        $NewQuery = new SQLQuery();
        $Select = "\nSelect t.*";
        $From = "\nFrom (\n" . $QueryText . "\n) t";
        $Where = "\nWhere t.RowNumber > " . $Start;
        $NewQuery->setSelect($Select);
        $NewQuery->setFrom($From);
        $NewQuery->setWhere($Where);
        
        for ($i = 0; $i < count($ExternalFilters); $i++)
            $NewQuery->AddWhere($ExternalFilters[$i]);
        
        $Result['Data'] = $NewQuery->QueryAll();
        $Result['QueryText'] = $NewQuery->text; 
        //$Result['Data'] = Yii::app()->db->createCommand($QueryText)->queryAll();
        
        $PageCount = ceil($CountAllRow/$PageSize);
        $Result['Details'] = array('Count' => $CountAllRow, 'PageCount' => $PageCount);
        return $Result;
    }
    
    public function SetFilter($array)
    {
        $this->Filters = $array;
        $this->attributes = $array;
    }

    public static function model($class) {
        return new $class;
    }

    public function all() {
       
        return CHtml::listData($this->find(array()), $this->id_dropList, $this->name_dropList);
    
    }

    public function getObjectList(){
        $sql = "Select
                    O.Object_Id,

                    A.Addr+Case When Isnull(O.Doorway,'')<>'' Then ', подъезд '+ O.Doorway Else '' End Address

                  From Objects O
                     inner join ObjectsGroup OG on (O.ObjectGr_Id = OG.ObjectGr_Id)
                     inner Join Addresses_v A on (O.Address_id = A.Address_Id)
                  Where
                  O.Doorway <> 'Общее'
                  and O.DelDate is Null
                  and OG.DelDate is Null
                Order by [Address]";

        $query = Yii::app()->db->createCommand($sql);
        return CHtml::listData($query->queryAll(), 'Object_Id', 'Address');
    }

    public function setParams($params) {
        if(!is_array($params)) {
            return false;
        }
        if (isset($params['actions'])) {
            foreach($params['actions'] as $key => $value) {
                $this->callMethod($key, $value);
            }
        }

    }

    /*
     * метод  callMethod скорее всего будет вызывать методы дочерних классов
     */
    public function callMethod($method, $params) {
        if (method_exists($this, $method)) {
            $this->$method($params);
        }
    }


    public function FindRow($Params=false, $Conditions = array(), $TopCount = -1)
    {
        $this->createQuery($Params, $Conditions, $TopCount);
        return $this->Query->QueryRow();
    }


    public function setProp($data) {
        foreach ($data as $prop_key => $prop_value) {
            if(is_scalar($prop_key)) {
                $this->$prop_key = $prop_value;
            }
        }
    }


    public function insertOne($data) {
        $sql = "INSERT INTO {$this->table} (" . implode(',',array_keys($data)) . ") "
            . "VALUES (:" . implode(',:',array_keys($data)) . ")";

        $query = Yii::app()->db->createCommand($sql);
        $query->bindValues($data);
        return $query->queryScalar();
    }

    public function attributeFilters() {
        return array();
    }
    
    public function GetAttributeNameFilters($FiledName) {
        $Result = $FiledName;
        $AttributeFilters = $this->attributeFilters();
        
        if (isset($AttributeFilters[$FiledName])) 
            $Result = $AttributeFilters[$FiledName];

        return $Result; 
    }
    
    public function attributeSotrs() {
        return array();
    }
    
    public function GetAttributeNameSorts($FiledName) {
        $Result = $FiledName;
        $AttributeSorts = $this->attributeSotrs();
        
        if (isset($AttributeSorts[$FiledName])) 
            $Result = $AttributeSorts[$FiledName];

        return $Result; 
    }


}

