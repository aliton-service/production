<?php

class JobTypes extends MainFormModel
{
    public $JobType_Id;
    public $JobType_Name;
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
            array('JobType_Id,'
                . ' JobType_Name,'
                . ' Lock,'
                . ' EmplLock,'
                . ' DateLock,'
                . ' EmplChange,'
                . ' DateChange,'
                . ' EmplDel,'
                . ' DelDate', 'safe', 'on'=>'search'),
        );
    }
    
    function __construct($scenario = '') {

        parent::__construct($scenario);

        $this->SP_INSERT_NAME = '';
        $this->SP_UPDATE_NAME = '';
        $this->SP_DELETE_NAME = '';

        $Select = "Select
                        jt.JobType_Id,
                        jt.JobType_Name,
                        jt.Lock,
                        jt.EmplLock,
                        jt.DateLock,
                        jt.EmplCreate,
                        jt.DateCreate,
                        jt.EmplChange,
                        jt.DateChange,
                        jt.EmplDel";
        $From = "\nFrom JobTypes jt";
        $Order = "\nOrder by jt.JobType_Name";
        
        $this->Query->setSelect($Select);
        $this->Query->setFrom($From);
        $this->Query->setOrder($Order);
        
        // Инициализация первичного ключа
        $this->KeyFiled = 'jt.JobType_Id';
        $this->PrimaryKey = 'JobType_Id';
    }
    
    public function attributeLabels()
    {
            return array(
                    'JobType_Id' => 'Job Type',
                    'JobType_Name' => 'Job Type Name',
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
