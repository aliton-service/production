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
        
	public $form_id = null;

	public $KeyFiled = 'e.evnt_id';
	public $PrimaryKey = 'evnt_id';

	public $SP_INSERT_NAME = 'AUTO_Events';
	public $SP_UPDATE_NAME = 'UPDATE_Events';
	public $SP_DELETE_NAME = '';


	public function __construct($scenario = '') {
		parent::__construct($scenario);
		$select = "\nSelect
                            e.evnt_id,
                            e.evtp_id,
                            et.eventtype,
                            e.objectgr_id,
                            e.date,
                            e.date_exec,
                            e.empl_id,
                            dbo.fio(emp.employeename) employeename,
                            a.addr,
                            datediff(dd, dateadd(mm, 1, dbo.encodedate(5, month(e.date), year(e.date))), isnull(e.date_exec, getdate())) overday,
                            e.note,
                            e.date_act,
                            e.date_plan,
                            e.rpfr_id,
                            c.ServiceType,
                            e.evaluation,
                            e.prds_id,
                            e.who_reported,
                            emp3.EmployeeName as master,
                            dbo.fio(emp2.employeename) emplcreate,
                            o.form_id
		";
		$from = "\nFrom events e 
                            inner join eventtypes et on (e.evtp_id = et.evtp_id)
                            left join employees_forobj_v emp on (e.empl_id = emp.employee_id)
                            inner join objectsgroup og on (e.objectgr_id = og.objectgr_id)
                            left join employees_forobj_v emp2 on (e.EmplCreate = emp2.employee_id)
                            inner join organizations_v o on (og.propform_id = o.form_id)
                            inner join addresses_v a on (a.address_id = og.address_id)
                            left join contracts_v c on (c.objectgr_id = og.objectgr_id and dbo.truncdate(getdate()) between c.contrsdatestart and c.contrsdateend and c.doctype_id = 4)
                            left join Employees emp3 on (c.Master = emp3.Employee_id)
		";
		$where = "\nWhere e.deldate is null";
                
		$order = "\nOrder by a.addr, et.eventtype, e.date ";
                
		$groupby = "\nGroup by e.evnt_id, e.date_act, e.evaluation, e.evtp_id, emp3.EmployeeName, e.who_reported, et.eventtype, e.rpfr_id, e.objectgr_id, e.prds_id, e.date, e.date_exec, e.empl_id, emp.employeename, emp2.employeename, c.ServiceType, e.date_plan, e.note, a.addr, o.form_id ";

		$this->Query->setSelect($select);
		$this->Query->setFrom($from);
		$this->Query->setOrder($order);
		$this->Query->setWhere($where);
		$this->Query->setGroupBy($groupby);
	}

	public function rules()
	{
		return array(
			array('evtp_id, objectgr_id, empl_id', 'required'),
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
			'evtp_id' => 'Направление',
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
			'empl_id' => 'Исполнитель',
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

        public function attributeFilters()
        {
            return array(
                'objectgr_id' => 'e.objectgr_id',
                'evtp_id' => 'e.evtp_id',
            );
        }


}
