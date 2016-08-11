<?php

class ConnectionTypes extends MainFormModel {
	
    public $ConnectionType_id;
    public $ConnectionType;
    
    public function rules()
    {
        return array(
                array(' ConnectionType_id,
                        ConnectionType', 'safe'),
        );
    }
    
    public function __construct($scenario = '') {
        parent::__construct($scenario);

        $this->SP_INSERT_NAME = '';
        $this->SP_UPDATE_NAME = '';
        $this->SP_DELETE_NAME = '';

        $Select =   "\nSelect
                            ct.ConnectionType_id,
                            ct.ConnectionType";
        $From =     "\nFrom ConnectionTypes ct";
        $Where =    "\nWhere ct.DelDate is Null";
        $Order =    "\nOrder by ct.ConnectionType";

        $this->Query->setSelect($Select);
        $this->Query->setFrom($From);
        $this->Query->setWhere($Where);
        $this->Query->setOrder($Order);

        $this->KeyFiled = 'ct.ConnectionType_id';

    }
    
    public function attributeLabels()
    {
        return array(
            'ConnectionType_id' => '',
            'ConnectionType' => '',
            );
    }
}

