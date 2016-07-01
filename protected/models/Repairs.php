<?php

class Repairs extends MainFormModel {
	
	public $Repr_id;
        public $RepTask_id;
	public $TaskSequence;
        public $Date;
	public $Objc_id;
        public $ObjectGr_id;
        public $RepairPay;
        public $RepairPayByCompany;
        public $Prtp_id;
        public $Demand_id;
        public $RepairPrior;
        public $Addr;
	public $Eqip_id;
        public $Used;
        public $EquipReturn;
	public $EquipGood;
	public $EquipWrnt;
        public $EquipSet;
        public $EquipName;
        public $Substitution;
        public $Evaluation;
        public $SN;
        public $Number;
        public $Status_id;
        public $StatusName;
        public $RepairStage_id;
        public $RepairStageName;
        public $Rslt_id;
        public $ResultName;
        public $Engr_Empl_id;
        public $Engr_Empl_Name;
        public $Mstr_Empl_id;
	public $Mstr_Empl_Name;
	public $Cur_Empl_id;
	public $Cur_Empl_Name;
	public $Reg_Empl_id;
	public $Reg_Empl_Name;
        public $PlanExecHours;
        public $DateBest;
        public $Deadline;
        public $EquipDefects;
        public $EquipDefects2;
        public $DefectsConfirm;
	public $Defect_id;
	public $RepairDefect;
        public $Note;
        public $DateExec;
        public $DateAccept;
        public $EmplAccept;
        public $EquipRepeated;
        public $AddrRepeated;
        public $EmplCreate;
        public $EmplChange;
        public $Jrdc_id;
        public $JuridicalPerson;
        public $Territ_id;
        public $RepairIncorrect_id;
        public $IncorrectName;
	public $Storage_id;
        public $Storage;
        public $OverDay;
        
        public function rules() {
		return array(
                        array('Date', 'DateValidate'),
                        array('EquipDefects', 'EquipDefectsValidate'),
                        array('Prtp_id, Objc_id, Eqip_id, Evaluation, Mstr_Empl_id, Reg_Empl_id', 'required'),
			array('Repr_id,
                                RepTask_id,
                                TaskSequence,
                                Date,
                                Objc_id,
                                ObjectGr_id,
                                RepairPay,
                                RepairPayByCompany,
                                Addr,
                                Demand_id,
                                Eqip_id,
                                Used,
                                EquipReturn,
                                EquipGood,
                                EquipWrnt,
                                EquipSet,
                                EquipName,
                                Substitution,
                                Evaluation,
                                SN,
                                Number,
                                Status_id,
                                EquipDefects,
                                EquipDefects2,
                                DefectsConfirm,
                                Defect_id,
                                RepairDefect,
                                StatusName,
                                RepairStage_id,
                                RepairStageName,
                                Rslt_id,
                                ResultName,
                                Engr_Empl_id,
                                Engr_Empl_Name,
                                Mstr_Empl_id,
                                Mstr_Empl_Name,
                                Cur_Empl_id,
                                Cur_Empl_Name,
                                Reg_Empl_id,
                                Reg_Empl_Name,
                                PlanExecHours,
                                DateBest,
                                Deadline,
                                Note,
                                DateExec,
                                Prtp_id,
                                DateAccept,
                                EmplAccept,
                                EquipRepeated,
                                AddrRepeated,
                                Territ_id,
                                Jrdc_id,
                                JuridicalPerson,
                                EmplCreate,
                                EmplChange,
                                RepairIncorrect_id,
                                IncorrectName,
                                Storage_id,
                                Storage,
                                OverDay', 'safe'),
		);
	}
        
        public function EquipDefectsValidate($attribute, array $params = array()) {
            if ($this->EquipGood == '' || $this->EquipGood == null || $this->EquipGood == 'false') {
                if ($this->EquipDefects == '' || $this->EquipDefects == null)
                    $this->addError($attribute, 'Поле Неисправность обязательно к заполнению');
            }
        }
        
        public function DateValidate($attribute, array $params = array()) {
            $Date = 0;
            $CurrentDate = 0;
            $OldDate;
            
            if  ($this->Repr_id == '') {
                $OldDate = '';
            }
            else {
                $model = new Repairs();
                $model->getModelPk($this->Repr_id);
                $OldDate = $model->Date;
            }
            
            if (($OldDate == '') && ($this->Date !== '')) {
                $Date = strtotime($this->Date);
                $CurrentDate = strtotime(Date('d.m.Y'));
                
                if ($Date < $CurrentDate)
                    $this->addError($attribute, 'Дата прихода обор. не может быть меньше чем текущая');
            }
            
        }
        
	function __construct($scenario='') {
		parent::__construct($scenario);

		$this->SP_INSERT_NAME = 'INSERT_Repairs';
		$this->SP_UPDATE_NAME = 'UPDATE_Repairs';
		$this->SP_DELETE_NAME = 'DELETE_Repairs';

		$Select = "\nSelect
                                r.Repr_id,
                                r.RepTask_id,
                                r.TaskSequence,
                                r.Date,
                                r.Objc_id,
                                r.ObjectGr_id,
                                r.RepairPay,
                                r.RepairPayByCompany,
                                r.Demand_id,
                                r.Prtp_id,
                                r.RepairPrior,
                                r.Addr,
                                r.Eqip_id,
                                r.Used,
                                r.EquipReturn,
                                r.EquipGood,
                                r.EquipWrnt,
                                r.EquipSet,
                                r.EquipName,
                                r.Substitution,
                                r.Evaluation,
                                r.SN,
                                r.Number,
                                r.Status_id,
                                r.RepairStage_id,
                                r.RepairStageName,
                                r.StatusName,
                                r.Rslt_id,
                                r.ResultName,
                                r.Engr_Empl_id,
                                r.Engr_Empl_Name,
                                r.Mstr_Empl_id,
                                r.Mstr_Empl_Name,
                                r.Territ_id,
                                r.Cur_Empl_id,
                                r.Cur_Empl_Name,
                                r.Reg_Empl_id,
                                r.Reg_Empl_Name,
                                r.PlanExecHours,
                                r.DateBest,
                                r.Deadline,
                                r.EquipDefects,
                                r.EquipDefects2,
                                r.DefectsConfirm,
                                r.Defect_id,
                                r.RepairDefect,
                                r.Note,
                                r.DateExec,
                                r.DateCreate,
                                r.EmplCreate,
                                r.DateAccept,
                                r.EmplAccept,
                                r.Jrdc_id,
                                r.EquipRepeated,
                                r.AddrRepeated,
                                r.JuridicalPerson,
                                r.DateChange,
                                r.EmplChange,
                                r.RepairIncorrect_id,
                                r.IncorrectName,
                                r.Storage_id,
                                r.Storage,
                                r.OverDay";
                $From = "\nFrom Repairs_v r";
                $Order = "\nOrder by r.DateCreate Desc";
                
                $this->Query->setSelect($Select);
		$this->Query->setFrom($From);
                $this->Query->setOrder($Order);

		$this->KeyFiled = 'r.Repr_id';
		$this->PrimaryKey = 'Repr_id';
        }

	

	public function attributeLabels(){
		return array(
			'Repr_id' => 'Repr_id',
                        'Date' => 'Date',
                        'Objc_id' => 'Адрес',
                        'ObjectGr_id' => 'ObjectGr_id',
                        'Demand_id' => 'Demand_id',
                        'Prtp_id' => 'Приоритет',
                        'RepairPay' => 'RepairPay',
                        'RepairPayByCompany' => 'RepairPayByCompany',
                        'Eqip_id' => 'Оборудование',
                        'Used' => 'Used',
                        'EquipReturn' => '',
                        'EquipGood' => '',
                        'EquipWrnt' => '',
                        'EquipSet' => '',
                        'EqipName' => 'EqipName',
                        'Substitution' => 'Substitution',
                        'Evaluation' => 'Оценка',
                        'SN' => 'SN',
                        'Number' => 'Number',
                        'Status_id' => 'Status_id',
                        'StatusName' => 'StatusName',
                        'RepairStage_id' => 'RepairStage_id',
                        'RepairStageName' => 'RepairStageName',
                        'Rslt_id' => 'Rslt_id',
                        'Engr_Empl_id' => 'Engr_Empl_id',
                        'Engr_Empl_Name' => 'Engr_Empl_Name',
                        'Mstr_Empl_id' => 'Мастер',
                        'Mstr_Empl_Name' => '',
                        'Territ_id' => 'Territ_id',
                        'Cur_Empl_id' => '',
                        'Cur_Empl_Name' => '',
                        'Reg_Empl_id' => 'Зарегистрировал',
                        'Reg_Empl_Name' => '',
                        'PlanExecHours' => 'PlanExecHours',
                        'ResultName' => 'ResultName',
                        'DateBest' => '',
                        'Deadline' => '',
                        'EquipDefects' => '',
                        'EquipDefects2' => '',
                        'DefectsConfirm' => '',
                        'Defect_id' => '',
                        'RepairDefect' => '',
                        'Note' => '',
                        'DateExec' => 'DateExec',
                        'Jrdc_id' => '',
                        'JuridicalPerson' => '',
                        'EmplCreate' => 'EmplCreate',
                        'EmplChange' => 'EmplChange',
                        'RepairIncorrect_id' => '',
                        'IncorrectName' => '',
                        'Storage_id' => '',
                        'Storage' => '',
                        'OverDay' => 'OverDay',
		);
	}
}

