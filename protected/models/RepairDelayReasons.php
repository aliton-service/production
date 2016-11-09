<?php

class RepairDelayReasons extends MainFormModel
{
    public $Dlrs_id;
    public $DelayReason;
        
    public function rules() {
        return array(
            array('Dlrs_id, DelayReason', 'safe'),
        );
    }
        
    function __construct() {
        parent::__construct();
        
        $this->SP_INSERT_NAME = '';
        $this->SP_UPDATE_NAME = '';
        $this->SP_DELETE_NAME = '';
                
        $Select = "\nSelect
                        dr.Dlrs_id,
                        dr.DelayReason";
        $From = "\nFrom DelayReasonsRepair dr";
        $Where = "\nWhere dr.DelDate is Null";
        $Order = "\nOrder by dr.DelayReason desc";

        $this->Query->setSelect($Select);
        $this->Query->setFrom($From);
        $this->Query->setWhere($Where);
        $this->Query->setOrder($Order);
    }


    public function attributeLabels()
    {
        return array(
            'Dlrs_id' => '',
            'DelayReason' => '',
        );
    }
}
