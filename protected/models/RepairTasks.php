<?php

class RepairTasks extends MainFormModel {
    public $RepairTask_id;
    public $Repr_id;
    public $Number;
    public $TaskSequence;
    public $Status_id;
    public $StatusName;
    public $Empl_id;
    public $SRM;
    public $EmployeeName;
    public $EmplCreate;
    public $EmplChange;
    
    function __construct($scenario='') {
        parent::__construct($scenario);

        $this->SP_INSERT_NAME = 'INSERT_RepairTasks';
        $this->SP_UPDATE_NAME = 'UPDATE_RepairTasks';
        $this->SP_DELETE_NAME = 'DELETE_RepairTasks';

        $Select = "\nSelect
                        RepairTask_id,
                        Repr_id,
                        Number,
                        TaskSequence,
                        Status_id,
                        StatusName,
                        Empl_id,
                        SRM,
                        EmployeeName";
        $From = "\nFrom RepairTasks_v rt";
        $Order = "\nOrder by rt.TaskSequence";
        
        $this->Query->setSelect($Select);
        $this->Query->setFrom($From);
        $this->Query->setOrder($Order);

        $this->KeyFiled = 'rt.RepairTask_id';
        $this->PrimaryKey = 'RepairTask_id';
    }
    
    public function rules(){
		return array(
			array('RepairTask_id,
                                Repr_id,
                                TaskSequence,
                                Status_id,
                                StatusName,
                                Empl_id,
                                SRM,
                                EmployeeName', 'safe'),
		);
	}

	public function attributeLabels(){
		return array(
			'RepairTask_id' => 'RepairTask_id',
                        'Repr_id' => 'Repr_id',
                        'TaskSequence' => 'TaskSequence',
                        'Status_id' => 'Status_id',
                        'StatusName' => 'StatusName',
                        'Empl_id' => 'Empl_id',
                        'SRM' => 'SRM',
                        'EmployeeName' => 'EmployeeName',
		);
	}
}

