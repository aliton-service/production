<?php

class DemandsExecutors extends MainFormModel
{
    public $DemandExecutor_id = null;
    public $Demand_id = null;
    public $Employee_id = null;
    public $EmployeeName = null;
    public $Date = null;
    public $DelDate = null;
    public $EmplCreate = null;
    public $DateCreate = null;
    public $EmplChange = null;
    public $DateChange = null;
    public $EmplDel = null;
    public $Lock = null;
    public $EmplLock = null;
    public $DateLock = null;

    
    public function rules()
    {
        return array(
            array(
                'DemandExecutor_id,
                Demand_id,
                Employee_id,
                EmployeeName,
                Date,
                DelDate,
                EmplCreate,
                DateCreate,
                EmplChange,
                DateChange,
                EmplDel,
                Lock,
                EmplLock,
                DateLock', 'safe'),
        );
    }
    
    function __construct($scenario = '') {
        parent::__construct($scenario);

        $this->SP_INSERT_NAME = 'INSERT_DEMANDSEXECUTORS';
        $this->SP_UPDATE_NAME = 'CHANGE_DEMANDSEXECUTORS';
        $this->SP_DELETE_NAME = 'DELETE_DEMANDSEXECUTORS';
        
        $Select = "\nSelect
                        de.DemandExecutor_id,
                        de.Demand_id,
                        de.Employee_id,
                        e.EmployeeName,
                        de.Date,
                        de.DelDate,
                        de.EmplCreate,
                        de.DateCreate,
                        de.EmplChange,
                        de.DateChange,
                        de.EmplDel,
                        de.Lock,
                        de.EmplLock,
                        de.DateLock";
        $From = "\nFrom DemandsExecutors de inner join Employees_ForObj_v e on (e.Employee_id = de.Employee_id)";
        $Where = "\nWhere de.DelDate is Null";
        $this->Query->setSelect($Select);
        $this->Query->setFrom($From);
        $this->Query->setWhere($Where);
        $this->KeyFiled = 'de.DemandExecutor_id';
        $this->PrimaryKey = 'DemandExecutor_id';        
    }    
            
    public function attributeLabels()
    {
        return array(
            'DemandExecutor_id' => 'Demand Executor',
            'Demand_id' => 'Demand',
            'Employee_id' => 'Employee',
            'Date' => 'Date',
            'DelDate' => 'Del Date',
            'EmplDel' => 'Empl Del',
            'Lock' => 'Lock',
            'EmplLock' => 'Empl Lock',
            'EmplCreate' => 'Empl Create',
            'DateCreate' => 'Date Create',
            'EmplChange' => 'Empl Change',
            'DateChange' => 'Date Change',
        );
    }

}
