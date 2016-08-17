<?php

class Documents extends MainFormModel
{
	public $ContrS_id;
        public $ObjectGr_id; 
        public $DocType_id; 
        public $DocType_Name;
        public $summa;
        public $ContrNumS; 
        public $ContrDateS; 
        public $ContrSDateStart; 
        public $ContrSDateEnd;
        public $DatePay; 
        public $Price; 
        public $PriceMonth; 
        public $PaymentPeriod_id; 
        public $PaymentName;
        public $PaymentType_id; 
        public $PaymentTypeName; 
        public $Jrdc_id; 
        public $JuridicalPerson;
        public $Master; 
        public $MasterName; 
        public $Debtor; 
        public $Note;
        public $ServiceType_id; 
        public $ServiceType; 
        public $SpecialCondition; 
        public $Reason_id;
        public $LastChangeDate; 
        public $crtp_id; 
        public $crtp_name; 
        public $Prolong;
        public $date_doc; 
        public $date_act; 
        public $DateExecuting; 
        public $JobExec; 
        public $dmnd_id;
        public $CalcSum; 
        public $Calc_id; 
        public $DateExec; 
        public $WorkText; 
        public $ExecDay; 
        public $PrePayment; 
        public $Garant;
        public $Annex; 
        public $DocNumber; 
        public $DocDate; 
        public $Info; 
        public $FIO; 
        public $date_checkup; 
        public $user_checkup;
        public $demand_id;
        public $empl_name;
        public $empl_id;
        public $discount;

	public $SP_INSERT_NAME = '';
	public $SP_UPDATE_NAME = '';
	public $SP_DELETE_NAME = '';


	public function rules()
	{
		return array(
			array('ObjectGr_id, Empl_id, Master, ServiceType_id, PaymentPeriod_id, PaymentType_id, DocType_id, Reason_id, Jrdc_id, crtp_id, dmnd_id, calc_id, ExecDay, Garant, Info, EmplLock, EmplCreate, EmplChange, EmplDel, UserCheckUp', 'numerical', 'integerOnly'=>true),
			array('Price, PriceMonth, PrePayment, discount', 'numerical'),
			array('ContrNumS, DocNumber', 'length', 'max'=>30),
			array('SpecialCondition', 'length', 'max'=>1073741823),
			array('CalcSum', 'length', 'max'=>19),
			array('ContrDateS, ContrSDateStart, ContrSDateEnd, DatePay, Debtor, LastChangeDate, Prolong, date_doc, date_act, DateExecuting, JobExec, WorkText, Annex, DocDate, date_checkup, Lock, DateLock', 'safe'),
			array('ContrS_id, ObjectGr_id, ContrNumS, ContrDateS, ContrSDateStart, ContrSDateEnd, DatePay, Price, PriceMonth, Empl_id, Master, ServiceType_id, Debtor, PaymentPeriod_id, PaymentType_id, DocType_id, Reason_id, LastChangeDate, SpecialCondition, Jrdc_id, DelDate, crtp_id, '
                            . 'Prolong, date_doc, date_act, Debtor, DateExecuting, dmnd_id, JobExec, CalcSum, calc_id, WorkText, ExecDay, PrePayment, Garant, Annex, DocNumber, DocDate, Info, date_checkup, discount, Lock, EmplLock, DateLock, EmplCreate, EmplChange, EmplDel, UserCheckUp', 'safe'),
		);
	}

	function __construct($scenario='') {
		parent::__construct($scenario);
		$select = "
                    select
                        c.ContrS_id, 
                        c.ObjectGr_id, 
                        c.DocType_id, 
                        dt.DocType_Name,
                        dbo.get_sumpayments(c.ContrS_id) summa,
                        c.ContrNumS, 
                        c.ContrDateS, 
                        c.ContrSDateStart, 
                        c.ContrSDateEnd,
                        c.DatePay, 
                        c.Price, 
                        c.PriceMonth, 
                        c.PaymentPeriod_id, 
                        p.PaymentName,
                        c.PaymentType_id, 
                        pt.PaymentTypeName, 
                        c.Jrdc_id, 
                        j.JuridicalPerson,
                        ch.Master Master, 
                        e.EmployeeName MasterName, 
                        c.Debtor, 
                        c.Note,
                        c.ServiceType_id, 
                        st.ServiceType, 
                        c.SpecialCondition, 
                        c.Reason_id,
                        c.LastChangeDate, 
                        c.crtp_id, 
                        ct.name crtp_name, 
                        c.Prolong,
                        c.date_doc, 
                        c.date_act, 
                        c.DateExecuting, 
                        c.JobExec, 
                        c.dmnd_id,
                        c.CalcSum, 
                        c.Calc_id, 
                        d.DateExec, 
                        c.WorkText, 
                        c.ExecDay, 
                        c.PrePayment, 
                        c.Garant,
                        c.Annex, 
                        c.DocNumber, 
                        c.DocDate, 
                        c.Info, 
                        ci.FIO, 
                        c.date_checkup, 
                        dbo.FIO_N(c.UserCheckUp) user_checkup,
                        case when c.dmnd_id is null then (select t.demand_id from costcalculations t where t.deldate is null and t.calc_id = c.calc_id) else c.dmnd_id end demand_id,
                        dbo.fio(e2.employeename) empl_name, 
                        c.empl_id, 
                        isnull(c.discount, 0) discount
		";

		$from = "
		From ContractsS c 
                    left join ServiceTypes st on (c.ServiceType_id = st.Servicetype_id)
                    left join Juridicals j on (c.Jrdc_id = j.Jrdc_id)
                    left join ContractMasterHistory ch on (c.ContrS_id = ch.ContrS_id and ch.DelDate is Null and dbo.truncdate(getdate()) between dbo.truncdate(ch.WorkDateStart) and dbo.truncdate(ch.WorkDateEnd))
                    left join Employees_ForObj_v e on (ch.Master = e.Employee_id)
                    left join DocTypes dt on (c.DocType_id = dt.DocType_id)
                    left join PaymentPeriods p on (c.PaymentPeriod_id = p.PaymentPeriod_id)
                    left join PaymentTypes pt on (c.PaymentType_id = pt.PaymentType_id)
                    left join ContractTypes ct on (c.crtp_id = ct.crtp_id)
                    left join FullDemands d on (c.dmnd_id = d.Demand_id)
                    left join ContactInfo ci on (ci.Info_id = c.Info)
                    left join Employees_ForObj_v e2 on (c.Empl_id = e2.Employee_id)
		";

		$where = "
		Where
                    c.DelDate is Null
		";
        // Инициализация первичного ключа
                $this->KeyFiled = 'c.contrs_id';
                $this->PrimaryKey = 'contrs_id';

		$this->Query->setSelect($select);
		$this->Query->setFrom($from);
		$this->Query->setWhere($where);
	}
        

	public function attributeLabels()
	{
		return array(
			'ContrS_id' => 'Contr S',
			'ObjectGr_id' => 'Object Gr',
			'ContrNumS' => 'Contr Num S',
			'ContrDateS' => 'Contr Date S',
			'ContrSDateStart' => 'Contr Sdate Start',
			'ContrSDateEnd' => 'Contr Sdate End',
			'DatePay' => 'Date Pay',
			'Price' => 'Price',
			'PriceMonth' => 'Price Month',
			'Empl_id' => 'Empl',
			'Master' => 'Master',
			'ServiceType_id' => 'Service Type',
			'Debtor' => 'Debtor',
			'DateCreate' => 'Date Create',
			'DateChange' => 'Date Change',
			'PaymentPeriod_id' => 'Payment Period',
			'PaymentType_id' => 'Payment Type',
			'DocType_id' => 'Doc Type',
			'Reason_id' => 'Reason',
			'LastChangeDate' => 'Last Change Date',
			'SpecialCondition' => 'Special Condition',
			'Jrdc_id' => 'Jrdc',
			'DelDate' => 'Del Date',
			'crtp_id' => 'Crtp',
			'Prolong' => 'Prolong',
			'date_doc' => 'Date Doc',
			'date_act' => 'Date Act',
			'Debt' => 'Debt',
			'DateExecuting' => 'Date Executing',
			'dmnd_id' => 'Dmnd',
			'JobExec' => 'Job Exec',
			'CalcSum' => 'Calc Sum',
			'calc_id' => 'Calc',
			'WorkText' => 'Work Text',
			'ExecDay' => 'Exec Day',
			'PrePayment' => 'Pre Payment',
			'Garant' => 'Garant',
			'Annex' => 'Annex',
			'DocNumber' => 'Doc Number',
			'DocDate' => 'Doc Date',
			'Info' => 'Info',
			'date_checkup' => 'Date Checkup',
			'discount' => 'Discount',
			'Lock' => 'Lock',
			'EmplLock' => 'Empl Lock',
			'DateLock' => 'Date Lock',
			'EmplCreate' => 'Empl Create',
			'EmplChange' => 'Empl Change',
			'EmplDel' => 'Empl Del',
			'UserCheckUp' => 'User Check Up',
		);
	}


}
