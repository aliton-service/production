<?php

class ObjectsGroupSystemComplexitys extends MainFormModel
{
	
    public $Ogsc_id;
    public $Ogst_id;
    public $ObjectGr_id;
    public $SystemComplexity_id;
    public $SystemComplexitysName;
    public $EmplCreate;
    public $EmplChange;
    
    public function rules()
    {
        return array(
            array('Ogsc_id,
                    Ogst_id,
                    ObjectGr_id,
                    SystemComplexity_id,
                    SystemComplexitysName', 'safe'),
        );
    }

    function __construct($scenario = '') {

        parent::__construct($scenario);

        $this->SP_INSERT_NAME = 'INSERT_ObjectsGroupSystemComplexitys';
        $this->SP_UPDATE_NAME = 'UPDATE_ObjectsGroupSystemComplexitys';
        $this->SP_DELETE_NAME = 'DELETE_ObjectsGroupSystemComplexitys';

        $Select = "\nSelect
                        s.Ogsc_id,
                        s.Ogst_id,
                        s.ObjectGr_id,
                        s.SystemComplexity_id,
                        sc.SystemComplexitysName";
        $From = "\nFrom ObjectsGroupSystemComplexitys s inner join SystemComplexitys sc on (s.SystemComplexity_id = sc.SystemComplexitys_id)";
        $Where = "\nWhere s.DelDate is Null";
        
        $this->Query->setSelect($Select);
        $this->Query->setFrom($From);
        $this->Query->setWhere($Where);
        
        // Инициализация первичного ключа
        $this->KeyFiled = 's.Ogsc_id';
        $this->PrimaryKey = 'Ogsc_id';
    }
	
}
