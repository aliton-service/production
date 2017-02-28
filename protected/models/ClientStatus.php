<?php

class ClientStatus extends MainFormModel
{
    public $Status_id;
    public $StatusName;
    
    function __construct($scenario = '') {
        parent::__construct($scenario);

        $this->SP_INSERT_NAME = 'INSERT_ClientStatus';
        $this->SP_UPDATE_NAME = 'UPDATE_ClientStatus';
        $this->SP_DELETE_NAME = 'DELETE_ClientStatus';

        $Select = "\nSelect
                        cs.Status_id,
                        cs.StatusName";
        $From = "\nFrom ClientStatus cs";
        $Order = "\nOrder by cs.Status_id";

        $this->Query->setSelect($Select);
        $this->Query->setFrom($From);
        $this->Query->setOrder($Order);
        
        $this->KeyFiled = 'cs.Status_id';
        $this->PrimaryKey = 'Status_id';
    }
    
    public function rules()
    {
        return array(
            array('StatusName', 'required'),
            array('Status_id, StatusName', 'safe'),
        );
    }
    
    public function attributeLabels()
    {
        return array(
            'Status_id' => '',
            'StatusName' => '',
        );
    }
}




