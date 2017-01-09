<?php

class RepairPriors extends MainFormModel
{
	public $prtp_id = null;
	public $RepairPrior = null;
	public $Sort = null;
	public $Lock = null;
	public $EmplLock = null;
	public $DateLock = null;
	public $EmplCreate = null;
	public $DateCreate = null;
	public $EmplChange = null;
	public $DateChange = null;
	public $EmplDel = null;
	public $DelDate = null;

	public $KeyFiled = 'rp.prtp_id';
	public $PrimaryKey = 'prtp_id';

	public $SP_INSERT_NAME = '';
	public $SP_UPDATE_NAME = '';
	public $SP_DELETE_NAME = '';

	function __construct() {
		parent::__construct();
		$select = "\nSelect * ";
		$from = "\nFrom RepairPriors rp ";
		$where = "\nWhere rp.DelDate is null ";
		$order = "\nOrder by rp.RepairPrior";

		$this->Query->setSelect($select);
		$this->Query->setFrom($from);
		$this->Query->setOrder($order);
		$this->Query->setWhere($where);
	}


	public function rules()
	{
		return array(
			array('prtp_id, RepairPrior', 'required'),
			array('prtp_id, Sort, EmplLock, EmplCreate, EmplChange, EmplDel', 'numerical', 'integerOnly'=>true),
			array('RepairPrior', 'length', 'max'=>50),
			array('Lock, DateLock, DateCreate, DateChange, DelDate', 'safe'),
			array('prtp_id, RepairPrior, Sort, Lock, EmplLock, DateLock, EmplCreate, DateCreate, EmplChange, DateChange, EmplDel, DelDate', 'safe'),
		);
	}


	public function attributeLabels()
	{
		return array(
			'prtp_id' => 'Prtp',
			'RepairPrior' => 'Repair Prior',
			'Sort' => 'Sort',
			'Lock' => 'Lock',
			'EmplLock' => 'Empl Lock',
			'DateLock' => 'Date Lock',
			'EmplCreate' => 'Empl Create',
			'DateCreate' => 'Date Create',
			'EmplChange' => 'Empl Change',
			'DateChange' => 'Date Change',
			'EmplDel' => 'Empl Del',
			'DelDate' => 'Del Date',
		);
	}


}
