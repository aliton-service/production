<?php

class RepairDefects extends MainFormModel {
	
        public $RepairDefect_id = null;
	public $RepairDefect = null;
	public $EmplCreate = null;
	public $EmplChange = null;
	public $EmplDel = null;
	public $DateCreate = null;
	public $DateChange = null;
	public $DelDate = null;

	public $KeyFiled = 'rd.RepairDefect_id';
	public $PrimaryKey = 'RepairDefect_id';

	public $SP_INSERT_NAME = '';
	public $SP_UPDATE_NAME = '';
	public $SP_DELETE_NAME = '';


	function __construct() {
		parent::__construct();
		$select = "Select rd.RepairDefect_id, rd.RepairDefect ";
		$from = " From RepairDefects rd ";
		$where = " Where rd.DelDate is null ";
		$order = " Order By rd.RepairDefect ";

		$this->Query->setSelect($select);
		$this->Query->setFrom($from);
		$this->Query->setWhere($where);
		$this->Query->setOrder($order);
	}


	public function rules() {
		return array(
			array('ReparDefect', 'required'),
			array('RepairDefect_id, RepairDefect, EmplCreate, EmplChange, EmplDel, DateCreate, DateChange, DelDate', 'safe'),
		);
	}


	public function attributeLabels() {
		return array(
			'RepairDefect_id' => 'RepairDefect_id',
			'RepairDefect' => '�������������',
			'EmplCreate' => 'EmplCreate',
			'EmplChange' => 'EmplChange',
			'EmplDel' => 'EmplDel',
			'DateCreate' => 'DateCreate',
			'DateChange' => 'DateChange',
			'DelDate' => 'DelDate',
		);
	}
}