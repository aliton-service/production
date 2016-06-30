<?php

class Lph extends MainFormModel {
    public $LPh_id;
    public $Name;
    public $Lock;
    public $EmplLock;
    public $DateLock;
    public $EmplCreate;
    public $DateCreate;
    public $EmplChange;
    public $DateChan;
    
    public function rules()
    {
        return array(
                array(' LPh_id,
                        Name,
                        Lock,
                        EmplLock,
                        DateLock,
                        EmplCreate,
                        DateCreate,
                        EmplChange,
                        DateChan', 'safe'),
        );
    }
    
    public function __construct($scenario = '') {
        parent::__construct($scenario);

        $this->SP_INSERT_NAME = 'INSERT_Lph';
        $this->SP_UPDATE_NAME = 'UPDATE_Lph';
        $this->SP_DELETE_NAME = 'DELETE_Lph';

        $Select =   "Select
                        l.LPh_id,
                        l.Name,
                        l.Lock,
                        l.EmplLock,
                        l.DateLock,
                        l.EmplCreate,
                        l.DateCreate,
                        l.EmplChange,
                        l.DateChange,
                        l.EmplDel";
        $From =     "\nFrom Lph l";
        $Order =    "\nOrder by l.LPh_id";

        $this->Query->setSelect($Select);
        $this->Query->setFrom($From);
        $this->Query->setOrder($Order);

        $this->KeyFiled = 'p.LPh_id';

    }
    
    public function attributeLabels()
    {
        return array(
                'LPh_id' => 'LPh_id',
                'Name' => 'Name',

        );
    }
}

