<?php

class Repairs extends MainFormModel {
    
    public $Repr_id;
    public $status;
    public $status_name;
    public $number;
    public $date;
    public $date_create;
    public $action;
    public $EquipName;
    public $Addr;
    public $date_ready;
    public $date_exec;
    public $date_accept;
    public $RepairPrior;
    public $deadline;
    public $mstr_empl_id;
    public $mstr_empl_name;
    public $egnr_empl_id;
    public $egnr_empl_name;
    public $defect;
    public $SN;
    public $user_create;
    public $reg_empl_name;
    public $Return;
    public $overday;
    public $date_plan;
    public $wrnt;
    public $splr_id;
    public $NameSupplier;
    public $delayreason;
    public $resultname;
    public $date_undo;
    public $undo_empl_name;
    public $reason_name;
    public $DatePlan;
        
    public function rules() {
        return array(
            array(' Repr_id,
                    status,
                    status_name,
                    number,
                    date,
                    date_create,
                    action,
                    EquipName,
                    Addr,
                    date_ready,
                    date_exec,
                    date_accept,
                    RepairPrior,
                    deadline,
                    mstr_empl_id,
                    mstr_empl_name,
                    egnr_empl_id,
                    egnr_empl_name,
                    defect,
                    SN,
                    user_create,
                    reg_empl_name,
                    Return,
                    overday,
                    date_plan,
                    wrnt,
                    splr_id,
                    NameSupplier,
                    delayreason,
                    resultname,
                    date_undo,
                    undo_empl_name,
                    reason_name,
                    DatePlan,', 'safe'),
        );
    }
        
    function __construct($scenario='') {
            parent::__construct($scenario);

            $this->SP_INSERT_NAME = 'INSERT_Repairs';
            $this->SP_UPDATE_NAME = 'UPDATE_Repairs';
            $this->SP_DELETE_NAME = 'DELETE_Repairs';

            $Select = "\nSelect
                            r.Repr_id,
                            r.status,
                            r.status_name,
                            r.number,
                            r.date,
                            r.date_create,
                            r.action,
                            r.EquipName,
                            r.Addr,
                            r.date_ready,
                            r.date_exec,
                            r.date_accept,
                            r.RepairPrior,
                            r.deadline,
                            r.mstr_empl_id,
                            r.mstr_empl_name,
                            r.egnr_empl_id,
                            r.egnr_empl_name,
                            r.defect,
                            r.SN,
                            r.user_create,
                            r.reg_empl_name,
                            r.[Return],
                            r.overday,
                            r.date_plan,
                            r.wrnt,
                            r.splr_id,
                            r.NameSupplier,
                            r.delayreason,
                            r.resultname,
                            r.date_undo,
                            r.DatePlan";
            $From = "\nFrom RepairsReestr_v r";
            $Where = "\nWhere r.DelDate is Null";
            $Order = "\nOrder by
                          case when r.date is null then 0 else 1 end,
                          case when r.date_accept is null then 0 else 1 end,
                          case when r.date_ready is null then 0 else 1 end,
                          r.repr_id desc";

            $this->Query->setSelect($Select);
            $this->Query->setFrom($From);
            $this->Query->setWhere($Where);
            $this->Query->setOrder($Order);

            $this->KeyFiled = 'r.Repr_id';
            $this->PrimaryKey = 'Repr_id';
    }

	

	public function attributeLabels(){
		return array(
                    'Repr_id' => '',
                    'status' => '',
                    'status_name' => '',
                    'number' => '',
                    'date' => '',
                    'date_create' => '',
                    'action' => '',
                    'EquipName' => '',
                    'Addr' => '',
                    'date_ready' => '',
                    'date_exec' => '',
                    'date_accept' => '',
                    'RepairPrior' => '',
                    'deadline' => '',
                    'mstr_empl_id' => '',
                    'mstr_empl_name' => '',
                    'egnr_empl_id' => '',
                    'egnr_empl_name' => '',
                    'defect' => '',
                    'SN' => '',
                    'user_create' => '',
                    'reg_empl_name' => '',
                    'Return' => '',
                    'overday' => '',
                    'date_plan' => '',
                    'wrnt' => '',
                    'splr_id' => '',
                    'NameSupplier' => '',
                    'delayreason' => '',
                    'resultname' => '',
                    'date_undo' => '',
                    'undo_empl_name' => '',
                    'reason_name' => '',
                    'DatePlan' => '',
		);
	}
        
    public function attributeFilters()
    {
        return array(
            'egnr_empl_name' => 'egnr_empl_id',
            'Return' => 'r.[return]',
            'mstr_empl_name' => 'mstr_empl_id',
        );
    }
    
    public function attributeSotrs() {
        return array(
            
        );
    }
}

