<?php

class Departments extends MainFormModel
{
    public $Dep_id;
    public $DepName;
    public $bn_id;
    public $DateCreate;
    public $EmplCreate;
    public $DateChange;
    public $EmplChange;
    public $DelDate;
    public $Lock;
    public $EmplLock;
    public $DateLock;
    
    function __construct($scenario = '') {
        parent::__construct($scenario);

        $this->SP_INSERT_NAME = 'INSERT_Departments';
        $this->SP_UPDATE_NAME = 'UPDATE_Departments';
        $this->SP_DELETE_NAME = 'DELETE_Departments';

        $Select = "\nSelect
                        dp.Dep_id,
                        dp.DepName,
                        dp.bn_id,
                        dp.DateCreate,
                        dp.EmplCreate,
                        dp.DateChange,
                        dp.EmplChange,
                        dp.DelDate,
                        dp.Lock,
                        dp.EmplLock,
                        dp.DateLock";
        $From = "\nFrom Departments dp";
        $Where = "\nWhere dp.DelDate is null";
        $Order = "\nOrder by dp.DepName";

        $this->Query->setSelect($Select);
        $this->Query->setFrom($From);
        $this->Query->setWhere($Where);
        $this->Query->setOrder($Order);
        
        $this->KeyFiled = 'dp.Dep_id';
        $this->PrimaryKey = 'Dep_id';
    }
    
    public function rules()
    {
        return array(
            array('DepName', 'required'),
            array('Dep_id,
                    DepName,
                    bn_id,
                    DateCreate,
                    EmplCreate,
                    DateChange,
                    EmplChange,
                    DelDate,
                    Lock,
                    EmplLock,
                    DateLock', 'safe'),
        );
    }
    
    public function attributeLabels()
    {
        return array(
            'Dep_id' => 'Dep_id',
            'DepName' => 'Нименование отдела',
            'bn_id' => 'bn_id',
            'DateCreate' => 'DateCreate',
            'EmplCreate' => 'EmplCreate',
            'DateChange' => 'DateChange',
            'EmplChange' => 'EmplChange',
            'DelDate' => 'DelDate',
            'Lock' => 'Lock',
            'EmplLock' => 'EmplLock',
            'DateLock' => 'DateLock',
        );
    }
}


