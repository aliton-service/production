<?php

class TransferReasons extends MainFormModel
{
    public $TransferReason_id;
    public $TransferReason;
    public $Lock;
    public $EmplLock;
    public $DateLock;
    public $EmplCreate;
    public $DateCreate;
    public $EmplChange;
    public $DateChange;
    public $EmplDel;
    
    public function rules()
    {
        return array(
            array('TransferReason_id,'
                . ' TransferReason,'
                . ' Lock,'
                . ' EmplLock,'
                . ' DateLock,'
                . ' EmplChange,'
                . ' DateChange,'
                . ' EmplDel,'
                . ' DelDate', 'safe'),
        );
    }

    function __construct($scenario = '') {

        parent::__construct($scenario);

        $this->SP_INSERT_NAME = '';
        $this->SP_UPDATE_NAME = '';
        $this->SP_DELETE_NAME = '';

        $Select = "Select
                        t.TransferReason_id,
                        t.TransferReason,
                        t.Lock,
                        t.EmplLock,
                        t.DateLock,
                        t.EmplCreate,
                        t.DateCreate,
                        t.EmplChange,
                        t.DateChange,
                        t.EmplDel";
        $From = "\nFrom TransferReasons t";
        $Where = "\nWhere t.DelDate is null";
        $Order = "\nOrder by t.TransferReason";
        
        $this->Query->setSelect($Select);
        $this->Query->setFrom($From);
        $this->Query->setWhere($Where);
        $this->Query->setOrder($Order);
        
        // Инициализация первичного ключа
        $this->KeyFiled = 't.TransferReason_id';
        $this->PrimaryKey = 'TransferReason_id';
    }
    
    public function attributeLabels()
    {
        return array(
            'TransferReason_id' => 'Transfer Reason',
            'TransferReason' => 'Transfer Reason',
            'Lock' => 'Lock',
            'EmplLock' => 'Empl Lock',
            'DateLock' => 'Date Lock',
            'EmplChange' => 'Empl Change',
            'DateChange' => 'Date Change',
            'EmplDel' => 'Empl Del',
            'DelDate' => 'Del Date',
        );
    }
}
