<?php

/**
 * This is the model class for table "RepDebtReasons".
 *
 * The followings are the available columns in table 'RepDebtReasons':
 * @property integer $rpdr_id
 * @property string $date
 * @property string $note
 * @property integer $type
 * @property string $user_create
 * @property string $DateCreate
 * @property string $user_deldate
 * @property string $DelDate
 * @property integer $EmplCreate
 * @property integer $EmplChange
 * @property string $DateChange
 * @property integer $EmplDel
 *
 * The followings are the available model relations:
 * @property RepDebtReasonDetails[] $repDebtReasonDetails
 */
class RepDebtReasons extends MainFormModel
{
	public $rpdr_id = null;
	public $date = null;
	public $note = null;
	public $type = null;
	public $user_create = null;
	public $DateCreate = null;
	public $user_deldate = null;
	public $DelDate = null;
	public $EmplCreate = null;
	public $EmplChange = null;
	public $DateChange = null;
	public $EmplDel = null;

	public $KeyFiled = 'r.rpdr_id';
	public $PrimaryKey = 'rpdr_id';

	public $SP_INSERT_NAME = '';
	public $SP_UPDATE_NAME = '';
	public $SP_DELETE_NAME = '';


	function __construct($scenario='')
	{
		parent::__construct($scenario);

		$select = "
		Select
		  r.rpdr_id,
		  r.date,
		  r.note,
		  r.type,
		  case  when r.type = 0 then 'Все'
				when r.type = 1 then 'Договора'
				when r.type = 2 then 'Доп. соглашения'
		  end type_name
		";
		$from = " From RepDebtReasons r ";
		$where = " Where r.DelDate is null ";
		$order = " Order by r.date desc ";

		$this->Query->setSelect($select);
		$this->Query->setFrom($from);
		$this->Query->setOrder($order);
		$this->Query->setWhere($where);
	}

	public function rules()
	{
		return array(
			array('type, EmplCreate, EmplChange, EmplDel', 'numerical', 'integerOnly'=>true),
			array('user_create, user_deldate', 'length', 'max'=>10),
			array('date, note, DateCreate, DelDate, DateChange', 'safe'),
			array('rpdr_id, date, note, type, user_create, DateCreate, user_deldate, DelDate, EmplCreate, EmplChange, DateChange, EmplDel', 'safe'),
		);
	}

	public function attributeLabels()
	{
		return array(
			'rpdr_id' => 'Rpdr',
			'date' => 'Date',
			'note' => 'Note',
			'type' => 'Type',
			'user_create' => 'User Create',
			'DateCreate' => 'Date Create',
			'user_deldate' => 'User Deldate',
			'DelDate' => 'Del Date',
			'EmplCreate' => 'Empl Create',
			'EmplChange' => 'Empl Change',
			'DateChange' => 'Date Change',
			'EmplDel' => 'Empl Del',
		);
	}

}
