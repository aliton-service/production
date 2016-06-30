<?php

class DelayReasons extends MainFormModel
{
    public $dlrs_id;
    public $name;
    public $d;
    public $dd;
    public $treb;
    public $id;
    public $Lock;
    public $EmplLock;
    public $DateLock;
    public $EmplCreate;
    public $DateCreate;
    public $EmplChange;
    public $DateChange;
    public $DelDate;
    public $EmplDel;
          
    function __construct($scenario = '') {

        parent::__construct($scenario);

        $this->SP_INSERT_NAME = '';
        $this->SP_UPDATE_NAME = '';
        $this->SP_DELETE_NAME = '';

        $Select = "Select
                        d.dlrs_id,
                        d.name,
                        d.d,
                        d.dd,
                        d.treb,
                        d.id,
                        d.Lock,
                        d.EmplLock,
                        d.DateLock,
                        d.EmplCreate,
                        d.DateCreate,
                        d.EmplChange,
                        d.DateChange,
                        d.DelDate,
                        d.EmplDel";
        $From = "\nFrom DelayReasons d";
        $Where = "\nWhere d.DelDate is null";
        $Order = "\nOrder by d.name";
        
        $this->Query->setSelect($Select);
        $this->Query->setFrom($From);
        $this->Query->setWhere($Where);
        $this->Query->setOrder($Order);
        
        // Инициализация первичного ключа
        $this->KeyFiled = 'd.dlrs_id';
        $this->PrimaryKey = 'dlrs_id';
    }
	
    public function rules()
    {
        return array(
            array('dlrs_id,
                    name,
                    d,
                    dd,
                    treb,
                    id,
                    Lock,
                    EmplLock,
                    DateLock,
                    EmplCreate,
                    DateCreate,
                    EmplChange,
                    DateChange,
                    DelDate,
                    EmplDel', 'safe'),
        );
    }

    public function attributeLabels()
    {
        return array(
                'dlrs_id' => 'Dlrs',
                'name' => 'Name',
                'd' => 'D',
                'dd' => 'Dd',
                'treb' => 'Treb',
                'id' => 'ID',
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
