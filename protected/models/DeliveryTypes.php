<?php

class DeliveryTypes extends MainFormModel
{
    public $dltp_id = null;
    public $DeliveryType = null;
    public $Lock = null;
    public $EmplLock = null;
    public $DateLock = null;
    public $EmplCreate = null;
    public $date_create = null;
    public $EmplChange = null;
    public $date_change = null;
    public $EmplDel = null;
    public $deldate = null;

    function __construct($scenario = '') {
        parent::__construct($scenario);

        $this->SP_INSERT_NAME = 'INSERT_DeliveryTypes';
        $this->SP_UPDATE_NAME = 'UPDATE_DeliveryTypes';
        $this->SP_DELETE_NAME = 'DELETE_DeliveryTypes';

        $Select = "\nSelect
                    d.dltp_id,
                    d.DeliveryType,
                    d.Lock,
                    d.EmplLock,
                    d.DateLock,
                    d.EmplCreate,
                    d.date_change,
                    d.EmplChange,
                    d.date_create,
                    d.EmplDel,
                    d.deldate";

        $From = "\nFrom DeliveryTypes d";

        $Where = "\nWhere d.deldate is null";

        $Order = "\nOrder by d.DeliveryType";

        $this->Query->setSelect($Select);
        $this->Query->setFrom($From);
        $this->Query->setWhere($Where);
        $this->Query->setOrder($Order);
        
        $this->KeyFiled = 'd.dltp_id';
        $this->PrimaryKey = 'dltp_id';
    }
  
    public function rules()
    {
            // NOTE: you should only define rules for those attributes that
            // will receive user inputs.
            return array(
                    array('DeliveryType', 'required'),
                    array('EmplLock, EmplCreate, EmplChange, EmplDel', 'numerical', 'integerOnly'=>true),
                    array('DeliveryType', 'length', 'max'=>150),
                    array('Lock, DateLock, date_create, date_change, deldate', 'safe'),
                    array('dltp_id, DeliveryType, Lock, EmplLock, DateLock, EmplCreate, date_create, EmplChange, date_change, EmplDel, DelDate', 'safe'),
            );
    }

    public function attributeLabels()
    {
            return array(
                    'dltp_id' => 'Dltp',
                    'DeliveryType' => 'Delivery Type',
                    'Lock' => 'Lock',
                    'EmplLock' => 'Empl Lock',
                    'DateLock' => 'Date Lock',
                    'EmplCreate' => 'Empl Create',
                    'date_create' => 'Date Create',
                    'EmplChange' => 'Empl Change',
                    'date_change' => 'Date Change',
                    'EmplDel' => 'Empl Del',
                    'deldate' => 'Del Date',
            );
    }
}
