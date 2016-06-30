<?php


class EventClient extends MainFormModel
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

	public $KeyFiled = 'e.evnt_id';
	public $PrimaryKey = 'evnt_id';

	public $SP_INSERT_NAME = '';
	public $SP_UPDATE_NAME = '';
	public $SP_DELETE_NAME = '';


	public function __construct($scenario = '') {
		parent::__construct($scenario);
		$select = "
		select
			t.form_id,
			t.fullname,
			t.objectgr_id,
			t.addr,
				t.isVisible,
				case when lag(t.form_id, 1, 0) over (order by t.fullname, t.addr) <> t.form_id then 1 else 0 end as count_form,
			sum(case when e.evnt_id is null then 0 else 1 end) event_count,
			sum(case when e.evnt_id is not null and e.date_exec is null then 1 else 0 end) no_exec_event_count
		";
		$from = "from (
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
		group by o.form_id, o.fullname, og.objectgr_id, a.addr, og.isplanvisible, v.isVisible
		) t left join events e on (t.objectgr_id = e.objectgr_id and e.deldate is null
		)";

		$where = " where (1=1) ";
		$groupby = " group by t.form_id, t.fullname,	t.objectgr_id, t.addr, t.isVisible
		having (1=1) ";
		$order = " order by t.fullname, t.addr
		";

		$this->Query->setSelect($select);
		$this->Query->setFrom($from);
		$this->Query->setOrder($order);
		$this->Query->setWhere($where);
		$this->Query->setGroupBy($groupby);

	}


	public function rules()
	{
		return array(
			array('evtp_id, objectgr_id, date, empl_id', 'required'),
			array('evtp_id, objectgr_id, prds_id, achs_id, empl_id, rpfr_id, user_create, EmplCreate, EmplChange, EmplDel', 'numerical', 'integerOnly'=>true),
			array('user_date_exec, user_date_act', 'length', 'max'=>20),
			array('who_reported, evaluation', 'length', 'max'=>150),
			array('date_plan, date_exec, add_date_exec, date_act, add_date_act, note, DateCreate, DelDate, DateChange', 'safe'),
			array('evnt_id, evtp_id, objectgr_id, prds_id, date, achs_id, date_plan, date_exec, user_date_exec, add_date_exec, date_act, user_date_act, add_date_act, empl_id, rpfr_id, who_reported, evaluation, note, user_create, DateCreate, DelDate, EmplCreate, EmplChange, DateChange, EmplDel', 'safe'),
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




}
