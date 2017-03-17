<?php

class ValuableInstructions extends MainFormModel
{
    public $Instruction_id;
    public $Form_id;
    public $Demand_id;
    public $Empl_id;
    public $ShortName;
    public $DatePlanExec;
    public $Instruction;
    public $Executor_id;
    public $ExecutorShortName;
    public $DateExec;
    public $Note;
    public $DateCreate;
    public $EmplCreate;
    public $CreatorShortName;
    public $DateChange;
    public $EmplChange;
    
    function __construct($scenario = '') {
        parent::__construct($scenario);

        $this->SP_INSERT_NAME = 'INSERT_ValuableInstructions';
        $this->SP_UPDATE_NAME = 'UPDATE_ValuableInstructions';
        $this->SP_DELETE_NAME = 'DELETE_ValuableInstructions';

        $Select = "\nSelect
                        vi.Instruction_id,
                        vi.Form_id,
                        vi.Demand_id,
                        vi.Empl_id,
                        e.ShortName,
                        vi.DatePlanExec,
                        vi.Instruction,
                        vi.Executor_id,
                        e2.ShortName as ExecutorShortName,
                        vi.DateExec,
                        vi.Note,
                        vi.DateCreate,
                        vi.EmplCreate,
                        e3.ShortName as CreatorShortName,
                        vi.DateChange,
                        vi.EmplChange";
        $From = "\nFrom ValuableInstructions vi left join Employees e on (vi.Empl_id = e.Employee_id)
                        left join Employees e2 on (vi.Executor_id = e2.Employee_id)
                        left join Employees e3 on (vi.EmplCreate = e3.Employee_id)";
        $Where = "\nWhere vi.DelDate is Null";
        

        $this->Query->setSelect($Select);
        $this->Query->setFrom($From);
        $this->Query->setWhere($Where);
        
        $this->KeyFiled = 'vi.Instruction_id';
        $this->PrimaryKey = 'Instruction_id';
    }
    
    public function rules()
    {
        return array(
            array('Empl_id, DatePlanExec, Instruction', 'required'),
            array('Instruction_id,
                    Form_id,
                    Demand_id,
                    Empl_id,
                    ShortName,
                    DatePlanExec,
                    Instruction,
                    Executor_id,
                    ExecutorShortName,
                    DateExec,
                    Note,
                    DateCreate,
                    EmplCreate,
                    CreatorShortName,
                    DateChange,
                    EmplChange,', 'safe'),
        );
    }
    
    public function attributeLabels()
    {
        return array(
            'Instruction_id' => '',
            'Form_id' => '',
            'Demand_id' => '',
            'Empl_id' => '',
            'ShortName' => '',
            'DatePlanExec' => '',
            'Instruction' => '',
            'Executor_id' => '',
            'ExecutorShortName' => '',
            'DateExec' => '',
            'Note' => '',
            'DateCreate' => '',
            'EmplCreate' => '',
            'CreatorShortName' => '',
            'DateChange' => '',
            'EmplChange' => '',
        );
    }
    
    public function attributeFilters()
    {
        return array(
            'ShortName' => 'e.ShortName',
        );
    }
}




