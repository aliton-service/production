<?php

class EventOffers extends MainFormModel
{
	public $code = null;
	public $evnt_id = null;
	public $oftp_id = null;
	public $note = null;
	public $rslt_id = null;
	public $DelDate = null;
	public $systemtype_id = null;
	public $situation = null;
	public $resulltdate = null;
	public $resultcreator_id = null;
	public $EmplCreate = null;
	public $EmplChange = null;
	public $EmplDel = null;
	public $DateCreate = null;
	public $DateChange = null;

	public $KeyFiled = 'eo.code';
	public $PrimaryKey = 'code';

	public $SP_INSERT_NAME = 'INSERT_EventOffers';
	public $SP_UPDATE_NAME = 'UPDATE_EventOffers';
	public $SP_DELETE_NAME = 'DELETE_EventOffers';


	public function __construct($scenario = '') {
		parent::__construct($scenario);

		$select = "
		 select
			eo.code,
				eo.evnt_id,
			eo.oftp_id,
			ot.offertype,
			eo.rslt_id,
			r.resultname,
			eo.note,
				eo.situation,
			(select case when min(od.dmnd_id) is not null then  '[' +  cast(min(od.dmnd_id) as nvarchar) + ', ...]' else '[]' end
			 from offerdemands od
			 where od.offer_id = eo.code
				and od.deldate is null) as demand,
			prev_eo.note prev_note,
			prev_eo.rslt_id prev_rslt_id,
				prev_r.resultname prev_resultname,
				prev_e.date prev_date,
				dbo.fio(emp.employeename) prev_emplname,
				dbo.is_systemtype_elton(ot.systp_id, e.objectgr_id) is_system
		 ";
		$from = "
		 from eventoffers eo left join offertypes ot on (eo.oftp_id = ot.code)
			left join events e on (eo.evnt_id = e.evnt_id)
			left join offerresults r on (eo.rslt_id = r.rslt_id)
			left join eventoffers prev_eo on (prev_eo.code = dbo.prev_offer(e.date, eo.oftp_id, e.objectgr_id))
			left join offerresults prev_r on (prev_eo.rslt_id = prev_r.rslt_id)
			left join events prev_e on (prev_e.evnt_id = prev_eo.evnt_id)
			left join employees_forobj_v emp on (prev_e.empl_id = emp.employee_id)

		 ";
		$where = " where eo.EmplDel is null ";
		$order = " Order By eo.code desc ";

		$this->Query->setSelect($select);
		$this->Query->setFrom($from);
		$this->Query->setOrder($order);
		$this->Query->setWhere($where);
	}


	public function rules()
	{
		return array(
			array('evnt_id, oftp_id', 'required'),
			array('evnt_id, oftp_id, rslt_id, systemtype_id, resultcreator_id, EmplCreate, EmplChange, EmplDel', 'numerical', 'integerOnly'=>true),
			array('note, DelDate, situation, resulltdate, DateCreate, DateChange', 'safe'),
			array('code, evnt_id, oftp_id, note, rslt_id, DelDate, systemtype_id, situation, resulltdate, resultcreator_id, EmplCreate, EmplChange, EmplDel, DateCreate, DateChange', 'safe'),
		);
	}


	public function attributeLabels()
	{
		return array(
			'code' => 'Code',
			'evnt_id' => 'Evnt',
			'oftp_id' => 'Предложение',
			'note' => 'Примечание',
			'rslt_id' => 'Результат по предложению',
			'DelDate' => 'Del Date',
			'systemtype_id' => 'Systemtype',
			'situation' => 'Ситуация по постановке на обслуживание',
			'resulltdate' => 'Resulltdate',
			'resultcreator_id' => 'Resultcreator',
			'EmplCreate' => 'Empl Create',
			'EmplChange' => 'Empl Change',
			'EmplDel' => 'Empl Del',
			'DateCreate' => 'Date Create',
			'DateChange' => 'Date Change',
		);
	}


	public function getOfferFromObjCart($objgr_id, $group_id) {
		$sql = "
		select
			eo.code,
				e.date,
				eo.evnt_id,
			eo.oftp_id,
			ot.offertype,
				ot.offergroup,
			eo.rslt_id,
			r.resultname,
			eo.note,
				eo.situation,
			(select case when min(od.dmnd_id) is not null then  '[' +  cast(min(od.dmnd_id) as nvarchar) + ', ...]' else '[]' end
			 from offerdemands od
			 where od.offer_id = eo.code
				and od.deldate is null) as demand,
				dbo.fio(emp.employeename) emplname
		from eventoffers eo left join offertypes ot on (eo.oftp_id = ot.code)
			left join events e on (eo.evnt_id = e.evnt_id)
			left join offerresults r on (eo.rslt_id = r.rslt_id)
				left join employees_forobj_v emp on (e.empl_id = emp.employee_id)
		where e.objectgr_id = $objgr_id
				and ot.offergroup = $group_id
		order by ot.offertype, e.date desc
		";

		$command = Yii::app()->db->createCommand($sql);
		return $command->queryAll();
	}

	public function getEventsFromObjCart($objgr_id) {
		$sql = "
		Select
		  e.evnt_id,
		  e.evtp_id,
		  et.eventtype,
		  e.objectgr_id,
		  e.date,
		  e.date_plan,
		  e.date_exec,
		  e.date_act,
		  e.empl_id,
		  dbo.fio(emp.employeename) employeename,
		  e.rpfr_id,
		  e.who_reported,
		  e.evaluation,
		  e.prds_id,
		  e.Note eventnote,
		  e.user_create,
		  e.DateCreate,
		  e.achs_id,
		  ah.ac_date,
		  dbo.fio(e2.employeename) empl_name,
		  dbo.fio(e3.employeename) empl_name3,
		  e.add_date_act,
		  dbo.fio(e4.employeename) empl_name4,
		  e.add_date_exec
		From Events e left join EventTypes et on (e.evtp_id = et.evtp_id)
		  left join Employees_ForObj_v emp on (emp.Employee_id = e.empl_id)
		  left join planactionhistory ah on (e.achs_id = ah.achs_id and ah.deldate is null)
		  left join employees_forobj_v e2 on (e2.alias = ah.user_create or e2.remotealias = ah.user_create)
		  left join employees_forobj_v e3 on (e3.alias = e.user_date_act or e3.remotealias = e.user_date_act)
		  left join employees_forobj_v e4 on (e4.alias = e.user_date_exec or e4.remotealias = e.user_date_exec)
		where e.deldate is null
			and e.objectgr_id = $objgr_id
		order by et.eventtype, e.date desc
		";

		$command = Yii::app()->db->createCommand($sql);
		return $command->queryAll();
	}

}
