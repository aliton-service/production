<?php

class EquipState extends MainFormModel {
	public $EquipState_id = null;
	public $EquipState = null;
	public $EmplCreate = null;
	public $EmplChange = null;
	public $EmplDel = null;
	public $DateCreate = null;
	public $DateChange = null;
	public $DelDate = null;

	public $KeyFiled = 'es.EquipState_id';
	public $PrimaryKey = 'EquipState_id';

	public $SP_INSERT_NAME = '';
	public $SP_UPDATE_NAME = '';
	public $SP_DELETE_NAME = '';


	function __construct() {
		parent::__construct();

		$select = " Select es.EquipState_id, es.EquipState ";
		$from = " From EquipState es ";
		$order = " Order By es.EquipState ";
		$where = " Where es.DelDate is null ";

		$this->Query->setSelect($select);
		$this->Query->setFrom($from);
		$this->Query->setOrder($order);
		$this->Query->setWhere($where);
	}


	public function rules() {
		return array(
			array('EquipState', 'required'),
			array('EquipState_id, EquipState, EmplDel, EmplCreate, EmplChange, EmplDel, DateCreate, DateChange, DelDate', 'safe'),
		);
	}


	public function attributeLabels() {
		return array(
			'EquipState_id' => 'EquipState_id',
			'EquipState' 	=> 'EquipState',
			'EmplCreate' 	=> 'EmplCreate',
			'EmplChange' 	=> 'EmplChange',
			'EmplDel' 		=> 'EmplDel',
			'DateCreate' 	=> 'DateCreate',
			'DateChange' 	=> 'DateChange',
			'DelDate' 		=> 'DelDate',
		);
	}
}