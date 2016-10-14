<?php

class ContactInfoForCostCalc extends MainFormModel
{
    public $info_id;
    public $ObjectGr_id;
    public $FIO;
    
    public function __construct($scenario = '') {
        
        parent::__construct($scenario);
        
        $this->SP_INSERT_NAME = 'INSERT_ContactInfoForCostCalc';
        $this->SP_UPDATE_NAME = 'UPDATE_ContactInfoForCostCalc';
        $this->SP_DELETE_NAME = 'DELETE_ContactInfoForCostCalc';
        
        $Select = "Select
                        i.info_id, 
                        i.ObjectGr_id, 
                        i.FIO";
        
        $From = "\nFrom ContactInfo i with (nolock)";
        
        $Where = "\nWhere i.DelDate is Null";
        
        $Order = "\nOrder by i.FIO";
        
        $this->Query->setSelect($Select);
        $this->Query->setFrom($From);
        $this->Query->setWhere($Where);
        $this->Query->setOrder($Order);
        
        $this->KeyFiled = 'i.info_id';
        $this->PrimaryKey = 'info_id';
    }
     
    public function rules() {
        return array(
            array('FIO', 'required'),
            array('info_id, FIO, ObjectGr_id', 'safe'),
        );
    }
    
    public function attributeLabels()
    {
        return array(
            'info_id' => 'Info_id',
            'ObjectGr_id' => 'ObjectGr_id',
            'FIO' => 'FIO',
        );
    } 
}
