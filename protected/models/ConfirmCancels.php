<?php

class ConfirmCancels extends MainFormModel
{
    public $ConfirmCancel_id;
    public $ConfirmCancelName;
    
    function __construct($scenario = '') {
        parent::__construct($scenario);

        $this->SP_INSERT_NAME = '';
        $this->SP_UPDATE_NAME = '';
        $this->SP_DELETE_NAME = '';

        $Select = "\nSelect
                          c.ConfirmCancel_id,
                          c.ConfirmCancelName";
        $From = "\nFrom ConfirmCancels c";
        $Order = "\nOrder by c.ConfirmCancelName";

        $this->Query->setSelect($Select);
        $this->Query->setFrom($From);
        $this->Query->setOrder($Order);
        
        $this->KeyFiled = 'c.ConfirmCancel_id';
        $this->PrimaryKey = 'ConfirmCancelName';
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




