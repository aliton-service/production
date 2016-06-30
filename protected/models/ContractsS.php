<?php

class ContractsS extends MainFormModel
{
	public $ContrS_id = null;
	public $ObjectGr_id = null;
	public $ContrNumS = null;
	public $ContrDateS = null;
	public $ContrSDateStart = null;
	public $ContrSDateEnd = null;
	public $DatePay = null;
	public $Price = null;
	public $PriceMonth = null;
	public $Empl_id = null;
	public $Master = null;
	public $MasterTel = null;
	public $ServiceType_id = null;
	public $Debtor = null;
	public $Note = null;
	public $DateCreate = null;
	public $DateChange = null;
	public $User2 = null;
	public $ServiceRate_id = null;
	public $PaymentPeriod_id = null;
	public $PaymentType_id = null;
	public $DocType_id = null;
	public $Reason_id = null;
	public $LastChangeDate = null;
	public $SpecialCondition = null;
	public $Jrdc_id = null;
	public $DelDate = null;
	public $crtp_id = null;
	public $Prolong = null;
	public $date_doc = null;
	public $date_act = null;
	public $Debt = null;
	public $DateExecuting = null;
	public $dmnd_id = null;
	public $JobExec = null;
	public $CalcSum = null;
	public $calc_id = null;
	public $WorkText = null;
	public $ExecDay = null;
	public $PrePayment = null;
	public $Garant = null;
	public $Annex = null;
	public $DocNumber = null;
	public $DocDate = null;
	public $Info = null;
	public $date_checkup = null;
	public $discount = null;
	public $Lock = null;
	public $EmplLock = null;
	public $DateLock = null;
	public $EmplCreate = null;
	public $EmplChange = null;
	public $EmplDel = null;
	public $UserCheckUp = null;

	public $KeyFiled = 'c.ContrS_id';
	public $PrimaryKey = 'ContrS_id';

	public $SP_INSERT_NAME = '';
	public $SP_UPDATE_NAME = '';
	public $SP_DELETE_NAME = '';


	public function rules()
	{
		return array(
			array('ObjectGr_id, Empl_id, Master, ServiceType_id, ServiceRate_id, PaymentPeriod_id, PaymentType_id, DocType_id, Reason_id, Jrdc_id, crtp_id, dmnd_id, calc_id, ExecDay, Garant, Info, EmplLock, EmplCreate, EmplChange, EmplDel, UserCheckUp', 'numerical', 'integerOnly'=>true),
			array('Price, PriceMonth, Debt, PrePayment, discount', 'numerical'),
			array('ContrNumS, DocNumber', 'length', 'max'=>30),
			array('MasterTel, User2', 'length', 'max'=>50),
			array('Note, SpecialCondition', 'length', 'max'=>1073741823),
			array('CalcSum', 'length', 'max'=>19),
			array('ContrDateS, ContrSDateStart, ContrSDateEnd, DatePay, Debtor, DateCreate, DateChange, LastChangeDate, DelDate, Prolong, date_doc, date_act, DateExecuting, JobExec, WorkText, Annex, DocDate, date_checkup, Lock, DateLock', 'safe'),
			array('ContrS_id, ObjectGr_id, ContrNumS, ContrDateS, ContrSDateStart, ContrSDateEnd, DatePay, Price, PriceMonth, Empl_id, Master, MasterTel, ServiceType_id, Debtor, Note, DateCreate, DateChange, User2, ServiceRate_id, PaymentPeriod_id, PaymentType_id, DocType_id, Reason_id, LastChangeDate, SpecialCondition, Jrdc_id, DelDate, crtp_id, Prolong, date_doc, date_act, Debt, DateExecuting, dmnd_id, JobExec, CalcSum, calc_id, WorkText, ExecDay, PrePayment, Garant, Annex, DocNumber, DocDate, Info, date_checkup, discount, Lock, EmplLock, DateLock, EmplCreate, EmplChange, EmplDel, UserCheckUp', 'safe'),
		);
	}

	function __construct($scenario='') {
		parent::__construct($scenario);
		$select = "
		select
			c.ContrS_id,
			c.ContrDateS,
			c.ContrNumS,
			dt.DocType_Name,
			c.ContrSDateStart,
			c.ContrSDateEnd,
			a.Addr,
			case when c.DocType_id = 4 then round(c.PriceMonth, 2) else round(c.Price, 2) end Price
		";

		$from = "
		from contractss c left join ObjectsGroup og on (c.ObjectGr_id = og.ObjectGr_id)
		left join Addresses_v a on (a.Address_id = og.Address_id)
		left join DocTypes dt on (c.DocType_id = dt.DocType_Id)
		";

		$where = "
		where c.DelDate is null
			and og.DelDate is null
			and c.DocType_id in (4, 5, 8)
		";

		$order = "
		order by c.ContrS_id
		";

		$this->Query->setSelect($select);
		$this->Query->setFrom($from);
		$this->Query->setWhere($where);
		$this->Query->setOrder($order);
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
			'MasterTel' => 'Master Tel',
			'ServiceType_id' => 'Service Type',
			'Debtor' => 'Debtor',
			'Note' => 'Note',
			'DateCreate' => 'Date Create',
			'DateChange' => 'Date Change',
			'User2' => 'User2',
			'ServiceRate_id' => 'Service Rate',
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
