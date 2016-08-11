<?php

class ComplexityTypes extends MainFormModel {
	
    public $Complexity_Id;
    public $ComplexityName;
    
    public function rules()
    {
        return array(
                array(' Complexity_Id,
                        ComplexityName', 'safe'),
        );
    }
    
    public function __construct($scenario = '') {
        parent::__construct($scenario);

        $this->SP_INSERT_NAME = '';
        $this->SP_UPDATE_NAME = '';
        $this->SP_DELETE_NAME = '';

        $Select =   "\nSelect
                            ct.Complexity_Id,
                            ct.ComplexityName";
        $From =     "\nFrom ComplexityTypes ct";
        $Where =    "\nWhere ct.DelDate is Null";
        $Order =    "\nOrder by ct.ComplexityName";

        $this->Query->setSelect($Select);
        $this->Query->setFrom($From);
        $this->Query->setWhere($Where);
        $this->Query->setOrder($Order);

        $this->KeyFiled = 'ct.Complexity_Id';

    }
    
    public function attributeLabels()
    {
        return array(
            'Complexity_Id' => '',
            'ComplexityName' => '',
            );
    }
}

