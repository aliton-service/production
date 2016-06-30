<?php


class Periods extends MainFormModel
{
	public $code = null;
	public $periodname = null;
	public $interval = null;
	public $sort = null;

	public $KeyFiled = 'p.code';
	public $PrimaryKey = 'code';

	public $SP_INSERT_NAME = '';
	public $SP_UPDATE_NAME = '';
	public $SP_DELETE_NAME = '';


	public function __construct($scenario = '') {
		parent::__construct($scenario);

		$select = "Select p.* ";
		$from = " From Periods p ";
		$where = " Where p.DelDate is null ";
		$order = " Order By p.code ";

		$this->Query->setSelect($select);
		$this->Query->setFrom($from);
		$this->Query->setOrder($order);
//		$this->Query->setWhere($where);
	}

	public function rules()
	{
		return array(
			array('periodname, sort', 'required'),
			array('interval, sort', 'numerical', 'integerOnly'=>true),
			array('periodname', 'length', 'max'=>25),
			array('code, periodname, interval, sort', 'safe'),
		);
	}


	public function attributeLabels()
	{
		return array(
			'code' => 'Code',
			'periodname' => 'Periodname',
			'interval' => 'Interval',
			'sort' => 'Sort',
		);
	}

}
