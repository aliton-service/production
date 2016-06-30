<?php

class RepairComments extends MainFormModel
{
	public $rpcm_id = null;
	public $repr_id = null;
	public $DateCreate = null;
	public $user2 = null;
	public $auto = null;
	public $comment = null;
	public $User = null;
	public $Lock = null;
	public $EmplLock = null;
	public $DateLock = null;
	public $EmplCreate = null;
	public $EmplChange = null;

	public $KeyFiled = 'rc.rpcm_id';
	public $PrimaryKey = 'rpcm_id';

	public $SP_INSERT_NAME = '';
	public $SP_UPDATE_NAME = '';
	public $SP_DELETE_NAME = '';

	function __construct() {
		parent::__construct();
		$select = "
		Select
		  rc.rpcm_id,
		  rc.repr_id,
		  rc.DateCreate,
		  rc.EmplCreate [user],
		  rc.[auto],
		  rc.comment,
		  dbo.FIO(e.EmployeeName) EmplName
		";
		$from = " From RepairComments rc left join Employees_ForObj_v e on (rc.EmplCreate = e.employee_id) ";
		$where = " Where rc.DelDate is null ";
		$order = " Order by rc.rpcm_id desc";

		$this->Query->setSelect($select);
		$this->Query->setFrom($from);
		$this->Query->setOrder($order);
		$this->Query->setWhere($where);
	}


	public function rules()
	{
		return array(
			array('repr_id', 'required'),
			array('rpcm_id,repr_id,DateCreate,user2,auto,comment,User,Lock,EmplLock,DateLock,EmplCreate,EmplChange', 'safe'),
		);
	}


	public function attributeLabels()
	{
		return array(
			'rpcm_id' => 'rpcm_id',
			'repr_id' => 'repr_id',
			'DateCreate' => 'DateCreate',
			'user2' => 'user2',
			'auto' => 'auto',
			'comment' => 'comment',
			'User' => 'User',
			'Lock' => 'Lock',
			'EmplLock' => 'EmplLock',
			'DateLock' => 'DateLock',
			'EmplCreate' => 'EmplCreate',
			'EmplChange' => 'EmplChange',
		);
	}


}
