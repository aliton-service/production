<?php

class EquipDetails extends MainFormModel
{
	const TYPE_ANALOG = 0; //Аналог
	const TYPE_REPLACEMENT = 1; //Замена
	const TYPE_SET = 2; //Комплект


	public $eqdt_id = null;
	public $equip_id = null;
	public $item = null;
	public $type = null;
	public $date_create = null;
	public $user_create = null;
	public $Lock = null;
	public $EmplLock = null;
	public $DateLock = null;
	public $EmplCreate = null;
	public $DateCreate = null;
	public $EmplChange = null;
	public $DateChange = null;
	public $EmplDel = null;
	public $DelDate = null;

	public $KeyFiled = 'ed.eqdt_id';
	public $PrimaryKey = 'eqdt_id';

	public $SP_INSERT_NAME = 'INSERT_EquipDetails';
	public $SP_UPDATE_NAME = 'UPDATE_EquipDetails';
	public $SP_DELETE_NAME = 'DELETE_EquipDetails';

	function __construct($scenario='') {
		parent::__construct($scenario);
		$select = "
		Select
		 ed.eqdt_id,
		 ed.equip_id,
		 ed.item,
		 ed.type,
		 e.EquipName
		";
		$from = " From EquipDetails ed
			Inner Join Equips e on e.Equip_id = ed.item
		";
		$where = "
		Where ed.DelDate is null
		";
		$order = " Order By e.EquipName ";

		$this->Query->setSelect($select);
		$this->Query->setFrom($from);
		$this->Query->setOrder($order);
		$this->Query->setWhere($where);
	}


	public function rules()
	{
		return array(
			array('item, type', 'required'),
			array('equip_id, item, type, EmplLock, EmplCreate, EmplChange, EmplDel', 'numerical', 'integerOnly'=>true),
			array('user_create', 'length', 'max'=>20),
			array('Lock, DateLock, DateCreate, DateChange, DelDate', 'safe'),
			array('eqdt_id, equip_id, item, type, date_create, user_create, Lock, EmplLock, DateLock, EmplCreate, DateCreate, EmplChange, DateChange, EmplDel, DelDate', 'safe'),
		);
	}


	public function attributeLabels()
	{
		return array(
			'eqdt_id' => 'Eqdt',
			'equip_id' => 'Equip',
			'item' => 'Оборудование',
			'type' => 'Type',
			'date_create' => 'Date Create',
			'user_create' => 'User Create',
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
