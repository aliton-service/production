<?php

class WorkTypes extends MainFormModel
{
    
    public $wrtp_id;
    public $name;
    public $EmplCreate;
    public $date_create;
    public $EmplChange;
    public $date_change;
    public $Lock;
    public $EmplLock;
    public $DateLock;
    public $EmplDel;
    
    public function rules()
    {
        return array(
            array('wrtp_id,'
                . ' name,'
                . ' EmplCreate,'
                . ' date_create,'
                . ' EmplChange,'
                . ' date_change,'
                . ' Lock,'
                . ' EmplLock,'
                . ' DateLock', 'safe', 'on'=>'search'),
        );
    }
    
    function __construct($scenario = '') {

        parent::__construct($scenario);

        $this->SP_INSERT_NAME = '';
        $this->SP_UPDATE_NAME = '';
        $this->SP_DELETE_NAME = '';

        $Select = "Select
                        wt.wrtp_id,
                        wt.name,
                        wt.EmplCreate,
                        wt.date_create,
                        wt.EmplChange,
                        wt.date_change,
                        wt.Lock,
                        wt.EmplLock,
                        wt.DateLock,
                        wt.EmplDel";
        $From = "\nFrom WorkTypes wt";
        $Order = "\nOrder by wt.name";
        
        $this->Query->setSelect($Select);
        $this->Query->setFrom($From);
        $this->Query->setOrder($Order);
        
        // Инициализация первичного ключа
        $this->KeyFiled = 'pt.wrtp_id';
        $this->PrimaryKey = 'name';
    }
    
    public function attributeLabels()
    {
        return array(
            'wrtp_id' => 'Wrtp',
            'name' => 'Name',
            'EmplCreate' => 'EmplCreate',
            'date_create' => 'Date Create',
            'Lock' => 'Lock',
            'EmplLock' => 'Empl Lock',
            'DateLock' => 'Date Lock',
            'EmplChange' => 'Empl Change',
            'date_change' => 'Date Change',
            'EmplDel' => 'Empl Del',
            'DelDate' => 'Del Date',
        );
    }
}
