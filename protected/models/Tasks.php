<?php

class Tasks extends MainFormModel
{
	public $Task_id = null;
	public $EmplCreate = null;
	public $Empl_id = null;
	public $TaskText = null;
	public $DateCreate = null;
	public $DateExec = null;
	public $Taskprior_id = null;
	public $Tasktype_id = null;
	public $Deadline = null;
	public $hours = null;
	public $acceptdate = null;
	public $DateCancel = null;
	public $DelDate = null;
	public $delreason = null;
	public $HoursPlanned = null;
	public $DatePlanned = null;
	public $HoursExec = null;
	public $Assistant_id = null;
	public $Nodeadline = null;
	public $Hidden = null;
	public $EmplChange = null;
	public $DateChange = null;
	public $EmplDel = null;

	public $creator = null;
	public $employee = null;
	public $TaskpriorName = null;
	public $TasktypeName = null;

	public $KeyFiled = 't.Task_id';
	public $PrimaryKey = 'Task_id';

	public $SP_INSERT_NAME = 'INSERT_Task';
	public $SP_UPDATE_NAME = 'UPDATE_Task';
	public $SP_DELETE_NAME = 'DELETE_Task';


	function __construct() {
		parent::__construct();

		$select = "
			select
			t.EmplCreate,
			iif(t.DateCancel is not null,'отменена',
				iif(t.dateexec is not null,'выполнена',
					iif(t.acceptdate is not null, 'принята', 'непринята'))) [status],
			t.Task_id,
			dbo.fio(e1.EmployeeName) creator,
			dbo.fio(e2.EmployeeName) employee,
			t.Empl_id,
			t.TaskText,
			t.DateCreate,
			t.DateExec,
			tp.TaskpriorName,
			tt.TasktypeName,
			t.Deadline,
			t.Hours,
			t.DateCancel,
			t.HoursPlanned,
			t.DatePlanned,
			t.HoursExec,
			iif(t.DateExec is null and datediff(d,cast(t.Deadline as date),cast(getdate() as date))>0,datediff(d,cast(t.Deadline as date),cast(getdate() as date)),null) [delay],
			t.NoDeadline,
			tn.DatePlanned NextDate,
			t.Hidden,
			iif(exists (select * from TaskFiles tf where tf.Task_id = t.Task_id and tf.DelDate is null),1,0) FileAttached
		";
		$from = "
		from Tasks t
		inner join Employees e1 on (e1.Employee_id=t.EmplCreate)
		inner join Employees e2 on (e2.Employee_id=t.Empl_id)
		inner join TaskTypesTree tt on (tt.Tasktype_id=t.Tasktype_id)
		inner join TaskPrior tp on (tp.Taskprior_id=t.Taskprior_id)
		left join TaskExecutors te on te.Task_Id = t.Task_id
		left join TaskNotes tn on (tn.Task_id=t.Task_id and tn.[DateCreate]=(select top 1 tn1.[DateCreate] from TaskNotes tn1 where tn1.DatePlanned is not null and  tn1.Task_id=t.Task_id /*and tn1.DatePlanned>=getdate()*/ order by tn1.[DateCreate] desc))
		";
		$where = "where
		t.DelDate is null and t.DateCancel is null
		";
		$order = " Order By t.DateCreate desc ";

		$this->Query->setSelect($select);
		$this->Query->setFrom($from);
		$this->Query->setOrder($order);
		$this->Query->setWhere($where);
	}


	public function rules()
	{
		return array(
			array('EmplCreate, Empl_id, TaskText, DateCreate, Taskprior_id, Tasktype_id, Deadline', 'required'),
			array('EmplCreate, Empl_id, Taskprior_id, Tasktype_id, Assistant_id, EmplChange, EmplDel', 'numerical', 'integerOnly'=>true),
			array('hours, HoursPlanned, HoursExec', 'length', 'max'=>10),
			array('delreason', 'length', 'max'=>200),
			array('DateExec, acceptdate, DelDate, DatePlanned, Nodeadline, Hidden, DateChange', 'safe'),
			array('Task_id, EmplCreate, Empl_id, TaskText, DateCreate, DateExec, Taskprior_id, Tasktype_id, Deadline, hours, acceptdate, DelDate, delreason, HoursPlanned, DatePlanned, HoursExec, Assistant_id, Nodeadline, Hidden, EmplChange, DateChange, EmplDel', 'safe'),
		);
	}


	public function attributeLabels()
	{
		return array(
			'Task_id' => 'Task',
			'EmplCreate' => 'Empl Create',
			'Empl_id' => 'Empl',
			'TaskText' => 'Task Text',
			'DateCreate' => 'Date Create',
			'DateExec' => 'Date Exec',
			'Taskprior_id' => 'Taskprior',
			'Tasktype_id' => 'Tasktype',
			'Deadline' => 'Deadline',
			'hours' => 'Hours',
			'acceptdate' => 'Acceptdate',
			'DelDate' => 'Del Date',
			'delreason' => 'Delreason',
			'HoursPlanned' => 'Hours Planned',
			'DatePlanned' => 'Date Planned',
			'HoursExec' => 'Hours Exec',
			'Assistant_id' => 'Assistant',
			'Nodeadline' => 'Nodeadline',
			'Hidden' => 'Hidden',
			'EmplChange' => 'Empl Change',
			'DateChange' => 'Date Change',
			'EmplDel' => 'Empl Del',
		);
	}


	public function FindAjax($Page, $PageSize, $Sort = array(), $InternalFilters = array(), $ExternalFilters = array()) {
		if(!Yii::app()->user->checkAccess('AdminTasks')) {
			array_push($InternalFilters, '(t.Empl_id = ' . Yii::app()->user->Employee_id
										. ' or te.Employee_id = ' . Yii::app()->user->Employee_id
										. ' or t.EmplCreate = ' . Yii::app()->user->Employee_id . ')');
		}
		return parent::FindAjax($Page, $PageSize, $Sort, $InternalFilters, $ExternalFilters);
	}


}
