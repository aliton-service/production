<?php


class TaskExecutors extends MainFormModel
{
	public $Taskexecutor_Id = null;
	public $Task_Id = null;
	public $Employee_id = null;
	public $CreateDate = null;
	public $DelDate = null;
	public $Addnote = null;
	public $Delnote = null;
	public $EmplCreate = null;
	public $EmplChange = null;
	public $DateChange = null;
	public $EmplDel = null;

	public $KeyFiled = 'te.Taskexecutor_Id,';
	public $PrimaryKey = 'Taskexecutor_Id';

	public $SP_INSERT_NAME = 'INSERT_Taskexecutor';
	public $SP_UPDATE_NAME = '';
	public $SP_DELETE_NAME = 'DELETE_TaskExecutors';


	function __construct() {
		parent::__construct();
		$select = "Select te.*, e.EmployeeName ";
		$from = " From TaskExecutors te
		 Inner Join Employees e on e.Employee_id = te.Employee_id ";
		$where = " Where te.DelDate is null ";
		$order = " Order By e.EmployeeName ";

		$this->Query->setSelect($select);
		$this->Query->setFrom($from);
		$this->Query->setOrder($order);
		$this->Query->setWhere($where);
	}


	public function rules()
	{
		return array(
			array('Employee_id', 'required'),
			array('Task_Id, Employee_id, EmplCreate, EmplChange, EmplDel', 'numerical', 'integerOnly'=>true),
			array('Addnote, Delnote', 'length', 'max'=>300),
			array('CreateDate, DelDate, DateChange', 'safe'),
			array('Taskexecutor_Id, Task_Id, Employee_id, CreateDate, DelDate, Addnote, Delnote, EmplCreate, EmplChange, DateChange, EmplDel', 'safe'),
		);
	}


	public function attributeLabels()
	{
		return array(
			'Taskexecutor_Id' => 'Taskexecutor',
			'Task_Id' => 'Task',
			'Employee_id' => 'Employee',
			'CreateDate' => 'Create Date',
			'DelDate' => 'Del Date',
			'Addnote' => 'Addnote',
			'Delnote' => 'Delnote',
			'EmplCreate' => 'Empl Create',
			'EmplChange' => 'Empl Change',
			'DateChange' => 'Date Change',
			'EmplDel' => 'Empl Del',
		);
	}

}
