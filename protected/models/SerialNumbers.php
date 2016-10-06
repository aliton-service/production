<?php

class SerialNumbers extends MainFormModel
{
    public $srnm_id;
    public $dadt_id;
    public $SN;
    
    function __construct($scenario = '') {
        parent::__construct($scenario);

        $this->SP_INSERT_NAME = 'INSERT_SerialNumbers';
        $this->SP_UPDATE_NAME = 'UPDATE_SerialNumbers';
        $this->SP_DELETE_NAME = 'DELETE_SerialNumbers';

        $Select = "\nSelect
                        s.srnm_id,
                        s.dadt_id,
                        s.SN";
        $From = "\nFrom SerialNumbers s";
        $Order = "\nOrder by s.SN";

        $this->Query->setSelect($Select);
        $this->Query->setFrom($From);
        $this->Query->setOrder($Order);
        
        $this->KeyFiled = 's.srnm_id';
        $this->PrimaryKey = 'srnm_id';
    }
    
    public function rules()
    {
        return array(
            array('dadt_id, SN', 'required'),
            array('srnm_id,
                    dadt_id,
                    SN', 'safe'),
        );
    }
    
    public function attributeLabels()
    {
        return array(
            'srnm_id' => 'srnm_id',
            'dadt_id' => 'dadt_id',
            'SN' => 'SN',
        );
    }
}






