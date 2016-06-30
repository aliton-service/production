<?php


class RepairResults extends MainFormModel
{
	public $rslt_id = null;
	public $ResultName = null;

	public $KeyFiled = 'rr.rslt_id';
	public $PrimaryKey = 'rslt_id';

	public $SP_INSERT_NAME = '';
	public $SP_UPDATE_NAME = '';
	public $SP_DELETE_NAME = '';

	function __construct() {
		parent::__construct();
		$select = "Select * ";
		$from = " From RepairResults rr ";
		$where = "  ";
		$order = " Order by rr.ResultName";

		$this->Query->setSelect($select);
		$this->Query->setFrom($from);
		$this->Query->setOrder($order);
//		$this->Query->setWhere($where);
	}


	public function rules()
	{
		return array(
			array('rslt_id', 'required'),
			array('rslt_id', 'numerical', 'integerOnly'=>true),
			array('ResultName', 'length', 'max'=>50),
			array('rslt_id, ResultName', 'safe'),
		);
	}


	public function attributeLabels()
	{
		return array(
			'rslt_id' => 'Rslt',
			'ResultName' => 'Result Name',
		);
	}

}
