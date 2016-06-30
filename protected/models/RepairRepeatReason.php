<?php

class RepairRepeatReason extends MainFormModel
{

	public $Repr_repeat_id = null;
	public $Repr_repeat_name = null;
	public $Repr_repeat_alias = null;
	public $DelDate = null;
	public $EmplCreate = null;
	public $EmplChange = null;
	public $EmplDel = null;
	public $DateChange = null;
	public $DateCreate = null;

	public $KeyFiled = 'rr.Repr_repeat_id';
	public $PrimaryKey = 'Repr_repeat_id';

	public $SP_INSERT_NAME = '';
	public $SP_UPDATE_NAME = '';
	public $SP_DELETE_NAME = '';

	function __construct() {
		parent::__construct();
		$select = "Select * ";
		$from = " From RepairRepeatReason rr ";
		$where = " Where rr.DelDate is null ";
		$order = " Order by rr.Repr_repeat_name";

		$this->Query->setSelect($select);
		$this->Query->setFrom($from);
		$this->Query->setOrder($order);
		$this->Query->setWhere($where);
	}

	public function rules()
	{
		return array(
			array('Repr_repeat_name, Repr_repeat_alias', 'required'),
			array('Repr_repeat_name, Repr_repeat_alias', 'length', 'max'=>255),
			array('Repr_repeat_id, Repr_repeat_name, Repr_repeat_alias', 'safe'),
		);
	}


	public function attributeLabels()
	{
		return array(
			'Repr_repeat_id' => 'Repr Repeat',
			'Repr_repeat_name' => 'Repr Repeat Name',
			'Repr_repeat_alias' => 'Repr Repeat Alias',
		);
	}

}
