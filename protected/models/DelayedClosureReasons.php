<?php

class DelayedClosureReasons extends MainFormModel
{
    public $DelayedClosureReason_id = null;
    public $Name = null;
    
    public function rules() {
        return array(
            array('DelayedClosureReason_id,'
                . 'Name', 'safe'),
        );
    }
    
    public function __construct($scenario = '') {
        
        parent::__construct($scenario);
        
        $this->SP_INSERT_NAME = 'INSERT_DelayedClosureReason';
        $this->SP_UPDATE_NAME = 'UPDATE_DelayedClosureReason';
        $this->SP_DELETE_NAME = 'DELETE_DelayedClosureReason';
        
        $Select =   "Select"
                    ."  DelayedClosureReason_id,
                        Name";
        $From =     "\nFrom DelayedClosureReasons";
        $Order =    "\nOrder by Name";
        
        $this->Query->setSelect($Select);
        $this->Query->setFrom($From);
        $this->Query->setOrder($Order);
        $this->KeyFiled = 'DelayedClosureReason_id';
    }
}

