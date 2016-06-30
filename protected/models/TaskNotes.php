<?php


class TaskNotes extends MainFormModel
{
	public $Tasknote_id = null;
	public $Task_id = null;
	public $DateCreate = null;
	public $EmplCreate = null;
	public $NoteText = null;
	public $DatePlanned = null;
	public $DateExec = null;
	public $IsRemark = null;
	public $EmplChange = null;
	public $DateChange = null;
	public $EmplDel = null;
	public $DelDate = null;

	public $Empl_id = null;

	public $KeyFiled = 'tn.Tasknote_id';
	public $PrimaryKey = 'Tasknote_id';

	public $SP_INSERT_NAME = 'INSERT_TaskNotes';
	public $SP_UPDATE_NAME = 'UPDATE_Tasknotes';
	public $SP_DELETE_NAME = '';


	function __construct() {
		parent::__construct();
		$select = "
		Select tn.*, e.EmployeeName
		";
		$from = " From TaskNotes tn
		 Inner Join Employees e on e.Employee_id = tn.EmplCreate ";
		$where = " Where tn.DelDate Is Null
			 ";
		$order = " Order By tn.DateCreate Desc";

		$this->Query->setSelect($select);
		$this->Query->setFrom($from);
		$this->Query->setOrder($order);
		$this->Query->setWhere($where);
	}


	public function rules()
	{
		return array(
			array('NoteText, EmplCreate', 'required'),
			array('Task_id, EmplCreate, EmplChange, EmplDel', 'numerical', 'integerOnly'=>true),
			array('DateCreate, DatePlanned, DateExec, IsRemark, DateChange, DelDate', 'safe'),
			array('Tasknote_id, Task_id, DateCreate, EmplCreate, NoteText, DatePlanned, DateExec, IsRemark, EmplChange, DateChange, EmplDel, DelDate', 'safe'),
		);
	}


	public function attributeLabels()
	{
		return array(
			'Tasknote_id' => 'Tasknote',
			'Task_id' => 'Task',
			'DateCreate' => 'Date Create',
			'EmplCreate' => 'Empl Create',
			'NoteText' => 'Note Text',
			'DatePlanned' => 'Date Planned',
			'DateExec' => 'Date Exec',
			'IsRemark' => 'Is Remark',
			'EmplChange' => 'Empl Change',
			'DateChange' => 'Date Change',
			'EmplDel' => 'Empl Del',
			'DelDate' => 'Del Date',
		);
	}


}
