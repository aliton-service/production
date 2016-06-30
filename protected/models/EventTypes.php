<?php


class EventTypes extends MainFormModel
{
	public $evtp_id = null;
	public $EventType = null;
	public $Shortname = null;
	public $DelDate = null;
	public $EmplCreate = null;
	public $EmplChange = null;
	public $EmplDel = null;
	public $DateCreate = null;
	public $DateChange = null;

	public $KeyFiled = 'et.evtp_id';
	public $PrimaryKey = 'evtp_id';

	public $SP_INSERT_NAME = '';
	public $SP_UPDATE_NAME = '';
	public $SP_DELETE_NAME = '';


	public function __construct($scenario = '') {
		parent::__construct($scenario);

		$select = "Select et.evtp_id, et.EventType ";
		$from = " From EventTypes et ";
		$where = " Where et.DelDate is null ";
		$order = " Order By et.evtp_id ";

		$this->Query->setSelect($select);
		$this->Query->setFrom($from);
		$this->Query->setOrder($order);
		$this->Query->setWhere($where);
	}


	public function rules()
	{
		return array(
			array('EventType', 'required'),
			array('EmplCreate, EmplChange, EmplDel', 'numerical', 'integerOnly'=>true),
			array('EventType', 'length', 'max'=>50),
			array('Shortname', 'length', 'max'=>3),
			array('DelDate, DateCreate, DateChange', 'safe'),
			array('evtp_id, EventType, Shortname, DelDate, EmplCreate, EmplChange, EmplDel, DateCreate, DateChange', 'safe'),
		);
	}


	public function attributeLabels()
	{
		return array(
			'evtp_id' => 'Evtp',
			'EventType' => 'Event Type',
			'Shortname' => 'Shortname',
			'DelDate' => 'Del Date',
			'EmplCreate' => 'Empl Create',
			'EmplChange' => 'Empl Change',
			'EmplDel' => 'Empl Del',
			'DateCreate' => 'Date Create',
			'DateChange' => 'Date Change',
		);
	}


}
