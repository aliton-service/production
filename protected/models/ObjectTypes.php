<?php

class ObjectTypes extends MainFormModel {
	
    public $ObjectType_Id;
    public $ObjectType;
    
    public function rules()
    {
        return array(
                array(' ObjectType_Id;
                        ObjectType;', 'safe'),
        );
    }
    
    public function __construct($scenario = '') {
        parent::__construct($scenario);

        $this->SP_INSERT_NAME = '';
        $this->SP_UPDATE_NAME = '';
        $this->SP_DELETE_NAME = '';

        $Select =   "\nSelect
                        ot.ObjectType_Id,
                        ot.ObjectType";
        $From =     "\nFrom ObjectTypes ot";
        $Where = "\nWhere ot.DelDate is Null";
        $Order =    "\nOrder by ot.ObjectType_Id";

        $this->Query->setSelect($Select);
        $this->Query->setFrom($From);
        $this->Query->setWhere($Where);
        $this->Query->setOrder($Order);

        $this->KeyFiled = 'ot.ObjectType_Id';

    }
    
    public function attributeLabels()
    {
        return array(
            'ObjectType_Id' => '',
            'ObjectType' => '',
            );
    }
}

