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
        if ($this->SP_INSERT_NAME == null)
            return 0;
               
        return $this->execProcedure($this->SP_INSERT_NAME);
    }
    
    public function Update()
    {
        // Редактирование записи
        if ($this->SP_UPDATE_NAME == null)
            return 0;
        
        $SP = new StoredProc();
        $this->execProcedure($this->SP_UPDATE_NAME);
    }
    
    public function Delete()
    {
        // Вставка записи
        if ($this->SP_DELETE_NAME == null)
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
    
    public function Find($Params)
    {
        // Поиск по параметрам, возвращаем массив записей
        foreach ($Params as $key => $value)
        {
            $this->Query->AddWhere($key . " = " . $value);
        }
        
        return $this->Query->QueryAll();
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


}

