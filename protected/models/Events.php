<?php


class Events extends MainFormModel
{
	public $evnt_id = null;
	public $evtp_id = null;
	public $objectgr_id = null;
	public $prds_id = null;
	public $date = null;
	public $achs_id = null;
	public $date_plan = null;
	public $date_exec = null;
	public $user_date_exec = null;
	public $add_date_exec = null;
	public $date_act = null;
	public $user_date_act = null;
	public $add_date_act = null;
	public $empl_id = null;
	public $rpfr_id = null;
	public $who_reported = null;
	public $evaluation = null;
	public $note = null;
	public $user_create = null;
	public $DateCreate = null;
	public $DelDate = null;
	public $EmplCreate = null;
	public $EmplChange = null;
	public $DateChange = null;
	public $EmplDel = null;
	public $EmplExec = null;

	public $addr = null;
	public $ServiceType = null;
	public $emplcreate = null;
	public $master = null;

	public $datestart = null;
	public $dateend = null;

	public $KeyFiled = 'e.evnt_id';
	public $PrimaryKey = 'evnt_id';

	public $SP_INSERT_NAME = 'AUTO_Events';
	public $SP_UPDATE_NAME = 'UPDATE_Events';
	public $SP_DELETE_NAME = '';


	public function __construct($scenario = '') {
		parent::__construct($scenario);
		$select = "
			select
			e.evnt_id,
			e.evtp_id,
			et.eventtype,
			e.objectgr_id,
			e.date,
			e.note,
			e.date_exec,
			e.empl_id,
			e.date_act,
			e.date_plan,
			e.rpfr_id,
			c.ServiceType,
			e.evaluation,
			e.prds_id,
			e.who_reported,
			emp3.EmployeeName as master,
			dbo.fio(emp.employeename) employeename,
			dbo.fio(emp2.employeename) emplcreate,
				a.addr,
				datediff(dd, dateadd(mm, 1, dbo.encodedate(5, month(e.date), year(e.date))), isnull(e.date_exec, getdate())) overday
		";
		$from = "
			from events e inner join eventtypes et on (e.evtp_id = et.evtp_id)
			left join employees_forobj_v emp on (e.empl_id = emp.employee_id)
				inner join objectsgroup og on (e.objectgr_id = og.objectgr_id)
			left join employees_forobj_v emp2 on (e.EmplCreate = emp2.employee_id)

			inner join organizations_v o on (og.propform_id = o.form_id)
				inner join addresses_v a on (a.address_id = og.address_id)
				left join contracts_v c on (c.objectgr_id = og.objectgr_id and dbo.truncdate(getdate()) between c.contrsdatestart and c.contrsdateend and c.doctype_id = 4)
				left join Employees emp3 on (c.Master = emp3.Employee_id)
		";
		$where = "
			where e.deldate is null

		";
		$order = " order by a.addr, et.eventtype, e.date ";
		$groupby = " group by e.evnt_id, e.date_act, e.evaluation, e.evtp_id, emp3.EmployeeName, e.who_reported, et.eventtype, e.rpfr_id, e.objectgr_id, e.prds_id, e.date, e.date_exec, e.empl_id, emp.employeename, emp2.employeename, c.ServiceType, e.date_plan, e.note, a.addr ";

		$this->Query->setSelect($select);
		$this->Query->setFrom($from);
		$this->Query->setOrder($order);
		$this->Query->setWhere($where);
		$this->Query->setGroupBy($groupby);
	}

	public function rules()
	{
		return array(
			//array('evtp_id, objectgr_id, date, empl_id', 'required'),
			array('evtp_id, objectgr_id, prds_id, achs_id, empl_id, rpfr_id, user_create, EmplCreate, EmplChange, EmplDel', 'numerical', 'integerOnly'=>true),
			array('user_date_exec, user_date_act', 'length', 'max'=>20),
			array('who_reported, evaluation', 'length', 'max'=>150),
			array('date_plan, date_exec, add_date_exec, date_act, add_date_act, note, DateCreate, DelDate, DateChange', 'safe'),
			array('dateend, datestart, evnt_id, evtp_id, objectgr_id, prds_id, date, achs_id, date_plan, date_exec, user_date_exec, add_date_exec, date_act, user_date_act, add_date_act, empl_id, rpfr_id, who_reported, evaluation, note, user_create, DateCreate, DelDate, EmplCreate, EmplChange, DateChange, EmplDel', 'safe'),
		);
	}


	public function attributeLabels()
	{
		return array(
			'evnt_id' => 'Evnt',
			'evtp_id' => 'Evtp',
			'objectgr_id' => 'Objectgr',
			'prds_id' => 'Prds',
			'date' => 'Date',
			'achs_id' => 'Achs',
			'date_plan' => 'Date Plan',
			'date_exec' => 'Date Exec',
			'user_date_exec' => 'User Date Exec',
			'add_date_exec' => 'Add Date Exec',
			'date_act' => 'Date Act',
			'user_date_act' => 'User Date Act',
			'add_date_act' => 'Add Date Act',
			'empl_id' => 'Empl',
			'rpfr_id' => 'Rpfr',
			'who_reported' => 'Who Reported',
			'evaluation' => 'Evaluation',
			'note' => 'Note',
			'user_create' => 'User Create',
			'DateCreate' => 'Date Create',
			'DelDate' => 'Del Date',
			'EmplCreate' => 'Empl Create',
			'EmplChange' => 'Empl Change',
			'DateChange' => 'Date Change',
			'EmplDel' => 'Empl Del',
		);
	}

	public static function getClients($where = false, $out_where=false) {
		$filter = '';
		$filter_evtp = '(1=1)';
		if(is_array($out_where))
			$filter_evtp = implode('and ', $out_where);

		if(is_array($where))
			$filter = 'and ' . implode('and ', $where);
		$sql = "
		select
			t.form_id,
			t.fullname,
			t.objectgr_id,
			t.addr,
			--e.evtp_id,
			--e.Date,
				t.isVisible,
				case when lag(t.form_id, 1, 0) over (order by t.fullname, t.addr) <> t.form_id then 1 else 0 end as count_form,
			sum(case when e.evnt_id is null then 0 else 1 end) event_count,
			sum(case when e.evnt_id is not null and e.date_exec is null then 1 else 0 end) no_exec_event_count
		from (
			select
				1 sort,
				o.form_id,
				(o.fullname + ' ' + case when max(o.sum_price) > 7500 then 'VIP' else '' end) as fullname,
				og.objectgr_id,
				a.addr,
						isNull(v.isVisible, 1) isVisible
			from organizations_v o inner join objectsgroup og on (o.form_id = og.propform_id and og.deldate is null)
				inner join addresses_v a on (og.address_id = a.address_id)
				left join contracts_v c on (c.objectgr_id = og.objectgr_id and dbo.truncdate(getdate()) between c.contrsdatestart and c.contrsdateend and c.doctype_id = 4)
				left join ObjectsGroupSystems st on (og.objectgr_id = st.ObjectGr_id and st.Availability_id = 1 and st.deldate is null and exists (select 1 from systemcompetitors stc where stc.ObjectsGroupSystem_id = st.ObjectsGroupSystem_id and stc.cmtr_id = 4))
						left join ObjectsGroupVisible v on (og.objectgr_id = v.objectgr_id
		)
			where o.lph_id = 1
				 and og.deldate is null
						 and isnull(c.servicetype_id, 0) <> 1
						 {$filter}
		group by o.form_id, o.fullname, og.objectgr_id, a.addr, og.isplanvisible, v.isVisible
		) t left join events e on (t.objectgr_id = e.objectgr_id and e.deldate is null
		)
		 where $filter_evtp
		  group by t.form_id, t.fullname,	t.objectgr_id, t.addr, t.isVisible--, e.Date, e.evtp_id
		having (1=1)
		order by t.fullname, t.addr
		";

		$command = Yii::app()->db->createCommand($sql);
		return $command->queryAll();
	}



}
