<?php

class Instructings extends MainFormModel
{
	public $Instructing_id = null;
	public $Employee_id = null;
	public $Name = null;
	public $DateCreate = null;
	public $UserCreate = null;
	public $DateChange = null;
	public $UserChange = null;
	public $Date = null;
	public $UserExec = null;
	public $Note = null;
	public $DelDate = null;
	public $EmplCreate = null;
	public $EmplChange = null;
	public $EmplDel = null;

	public $KeyFiled = 'i.Instructing_id';
	public $PrimaryKey = 'Instructing_id';

	public $SP_INSERT_NAME = 'INSERT_Instructings';
	public $SP_UPDATE_NAME = 'UPDATE_Instructings';
	public $SP_DELETE_NAME = 'DELETE_Instructings';


	function __construct($scenario='')
	{
		parent::__construct($scenario);

		$select = "
		select
		   i.Instructing_id,
		   i.Employee_id,
		   i.Name,
		   i.DateCreate,
		   i.UserCreate,
		   i.DateChange,
		   i.UserChange,
		   i.Date,
		   i.UserExec,
		   i.Note,
		   i.DelDate,
		   dbo.FIO(e.EmployeeName) EmployeeName
		";
		$from = "
		from Instructings i left join Employees e on (e.Employee_id = i.UserExec)
		";
		$where = "
		where i.DelDate is Null
		";
		$order = " Order By i.Name ";

		$this->Query->setSelect($select);
		$this->Query->setFrom($from);
		$this->Query->setOrder($order);
		$this->Query->setWhere($where);
	}


	public function rules()
	{

		return array(
			array('Date, UserExec', 'required'),
			array('Employee_id, UserExec', 'numerical', 'integerOnly'=>true),
			array('Name', 'length', 'max'=>250),
			array('UserCreate, UserChange', 'length', 'max'=>50),
			array('Note', 'length', 'max'=>150),
			array('DelDate', 'safe'),
			array('Instructing_id, Employee_id, Name, DateCreate, UserCreate, DateChange, UserChange, Date, UserExec, Note, DelDate', 'safe'),
		);
	}


	public function attributeLabels()
	{
		return array(
			'Instructing_id' => 'Instructing',
			'Employee_id' => 'Employee',
			'Name' => 'Название',
			'DateCreate' => 'Date Create',
			'UserCreate' => 'User Create',
			'DateChange' => 'Date Change',
			'UserChange' => 'User Change',
			'Date' => 'Дата проведения',
			'UserExec' => 'Исполнитель',
			'Note' => 'Примечание',
			'DelDate' => 'Del Date',
		);
	}

}
