<?php

class CloseReasons extends MainFormModel
{
    public $CloseReason_id;
    public $CloseReason;
    
    public function rules()
    {
        return array(
            array('CloseReason_id,'
                . ' CloseReason', 'safe'),
        );
    }

    function __construct($scenario = '') {

        parent::__construct($scenario);

        $this->SP_INSERT_NAME = '';
        $this->SP_UPDATE_NAME = '';
        $this->SP_DELETE_NAME = '';

        $Select = "Select
                        cr.CloseReason_id,
                        cr.CloseReason";
        $From = "\nFrom CloseReasons_v cr";
        $Order = "\nOrder by cr.CloseReason";
        
        $this->Query->setSelect($Select);
        $this->Query->setFrom($From);
        $this->Query->setOrder($Order);
        
        // Инициализация первичного ключа
        $this->KeyFiled = 'cr.CloseReason_id';
        $this->PrimaryKey = 'CloseReason_id';
    }
    
    public function attributeLabels()
    {
        return array(
            'CloseReason_id' => 'CloseReason_id',
            'CloseReason' => 'CloseReason',
        );
    }
}


