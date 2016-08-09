<?php

class OrganizationStructure extends MainFormModel
{
    public $Structure_id;
    public $Parent_id;
    public $Empl_id;
    public $EmployeeName;
    public $ShortName;
    public $DateCreate;
    public $EmplCreate;
    public $DateChange;
    public $EmplChange;
    public $Lock;
    public $EmplLock;
    public $DateLock;
    public $DelDate;
    
    public function rules()
    {
        return array(
            array('Empl_id', 'required'),
            array('Structure_id,
                    Parent_id,
                    Empl_id,
                    DateCreate,
                    EmplCreate,
                    DateChange,
                    EmplChange,
                    Lock,
                    EmplLock,
                    DateLock,
                    DelDate,', 'safe'),
        );
    }
    
    function __construct($scenario = '') {

        parent::__construct($scenario);

        $this->SP_INSERT_NAME = 'INSERT_OrganizationStructure';
        $this->SP_UPDATE_NAME = 'UPDATE_OrganizationStructure';
        $this->SP_DELETE_NAME = 'DELETE_OrganizationStructure';

        $Select = "Select
                        s.Structure_id,
                        s.Parent_id,
                        s.Empl_id,
                        e.EmployeeName,
                        e.ShortName,
                        s.DateCreate,
                        s.EmplCreate,
                        s.DateChange,
                        s.EmplChange,
                        s.DelDate,
                        s.Lock,
                        s.DateLock,
                        s.EmplLock";
        $From = "\nFrom OrganizationStructure s inner join Employees e on (s.Empl_id = e.Employee_id)";
        $Where = "\nWhere s.DelDate is Null";
        $Order = "\nOrder by s.Parent_id";
        
        $this->Query->setSelect($Select);
        $this->Query->setFrom($From);
        $this->Query->setWhere($Where);
        $this->Query->setOrder($Order);
        
        // Инициализация первичного ключа
        $this->KeyFiled = 's.Structure_id';
        $this->PrimaryKey = 'Structure_id';
    }
    
    public function attributeLabels()
    {
            return array(
                    'Structure_id' => '',
                    'Parent_id' => '',
                    'Empl_id' => 'Сотрудник',
                    'DateCreate' => '',
                    'EmplCreate' => '',
                    'DateChange' => '',
                    'EmplChange' => '',
                    'Lock' => '',
                    'EmplLock' => '',
                    'DateLock' => '',
                    'DelDate' => '',
            );
    }
	
}


