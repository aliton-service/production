<?php

class ReturnReasons extends MainFormModel
{
    public $rtrs_id;
    public $name;
    
    function __construct($scenario = '') {
        parent::__construct($scenario);

        $this->SP_INSERT_NAME = '';
        $this->SP_UPDATE_NAME = '';
        $this->SP_DELETE_NAME = '';

        $Select = "\nSelect
                        r.rtrs_id,
                        r.name";
        $From = "\nFrom ReturnReasons r";
        $Order = "\nOrder by r.name";

        $this->Query->setSelect($Select);
        $this->Query->setFrom($From);
        $this->Query->setOrder($Order);
        
        $this->KeyFiled = 'r.rtrs_id';
        $this->PrimaryKey = 'rtrs_id';
    }
    
    public function rules()
    {
        return array(
            
        );
    }
    
    public function attributeLabels()
    {
        return array(
            
        );
    }
}
