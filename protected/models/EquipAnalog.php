<?php


class EquipAnalog extends MainFormModel
{

	public $Analog_id = null;
	public $Equip_id = null;
	public $AnalogEquip_id = null;
	public $Lock = null;
	public $EmplLock = null;
	public $DateLock = null;
	public $EmplCreate = null;
	public $DateCreate = null;
	public $EmplChange = null;
	public $DateChange = null;
	public $EmplDel = null;
	public $DelDate = null;

	public $KeyFiled = 'ea.Equip_id';
	public $PrimaryKey = 'Equip_id';

	public $SP_INSERT_NAME = '';
	public $SP_UPDATE_NAME = '';
	public $SP_DELETE_NAME = '';


	function __construct($scenario='') {
		parent::__construct($scenario);
		$select = " Select e.* ";
		$from = " From EquipAnalog ea
			Inner Join Equips e On e.Equip_id = ea.Equip_id
		";
		$where = " Where ea.DelDate Is Null ";
		$order = " Order By e.EquipName ";

		$this->Query->setSelect($select);
		$this->Query->setFrom($from);
		$this->Query->setOrder($order);
		$this->Query->setWhere($where);
	}

	public function rules()
	{
		return array(
			array('AnalogEquip_id', 'required'),
			array('Equip_id, AnalogEquip_id, EmplLock, EmplCreate, EmplChange, EmplDel', 'numerical', 'integerOnly'=>true),
			array('Lock, DateLock, DateCreate, DateChange, DelDate', 'safe'),
			array('Analog_id, Equip_id, AnalogEquip_id, Lock, EmplLock, DateLock, EmplCreate, DateCreate, EmplChange, DateChange, EmplDel, DelDate', 'safe'),
		);
	}


	public function attributeLabels()
	{
		return array(
			'Analog_id' => 'Analog',
			'Equip_id' => 'Equip',
			'AnalogEquip_id' => 'Analog Equip',
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
