<?php


class RepairDetails extends MainFormModel
{
	public $rpdt_id = null;
	public $repr_id = null;
	public $eqip_id = null;
	public $docm_quant = null;
	public $fact_quant = null;
	public $used = null;
	public $return = null;
	public $work_ok = null;
	public $wrnt = null;
	public $set = null;
	public $defect = null;
	public $user_create2 = null;
	public $date_create = null;
	public $user_change2 = null;
	public $date_change = null;
	public $DelDate = null;
	public $Lock = null;
	public $EmplLock = null;
	public $DateLock = null;
	public $EmplCreate = null;
	public $EmplChange = null;
	public $EmplDel = null;

	public $KeyFiled = 'dt.rpdt_id';
	public $PrimaryKey = 'rpdt_id';

	public $SP_INSERT_NAME = '';
	public $SP_UPDATE_NAME = '';
	public $SP_DELETE_NAME = '';


	function __construct() {
		parent::__construct();
		$select = "
		 Select
		  dt.rpdt_id,
		  dt.repr_id,
		  dt.eqip_id,
		  e.EquipName,
		  m.NameUnitMeasurement um_name,
		  dt.docm_quant,
		  dt.fact_quant,
		  dt.docm_quant*p.price_low as summa
		 ";
		$from = "
		From RepairDetails dt inner join Equips e on (dt.Eqip_id = e.Equip_id)
		  left join UnitMeasurement m on (e.UnitMeasurement_id = m.UnitMeasurement_id)
		  left join PriceListDetails_v p on (dbo.get_price_list(getdate()) = prlt_id and p.eqip_id = dt.eqip_id)
		";
		$where = " Where dt.DelDate is null ";
		$order = " Order by e.EquipName ";

		$this->Query->setSelect($select);
		$this->Query->setFrom($from);
		$this->Query->setOrder($order);
		$this->Query->setWhere($where);
	}


	public function rules()
	{
		return array(
			array('repr_id, eqip_id', 'required'),
			array('repr_id, eqip_id, EmplLock, EmplCreate, EmplChange, EmplDel', 'numerical', 'integerOnly'=>true),
			array('docm_quant, fact_quant', 'numerical'),
			array('user_create2, user_change2', 'length', 'max'=>50),
			array('used, return, work_ok, wrnt, set, defect, date_create, date_change, DelDate, Lock, DateLock', 'safe'),
			array('rpdt_id, repr_id, eqip_id, docm_quant, fact_quant, used, return, work_ok, wrnt, set, defect, user_create2, date_create, user_change2, date_change, DelDate, Lock, EmplLock, DateLock, EmplCreate, EmplChange, EmplDel', 'safe'),
		);
	}


	public function attributeLabels()
	{
		return array(
			'rpdt_id' => 'Rpdt',
			'repr_id' => 'Repr',
			'eqip_id' => 'Eqip',
			'docm_quant' => 'Docm Quant',
			'fact_quant' => 'Fact Quant',
			'used' => 'Used',
			'return' => 'Return',
			'work_ok' => 'Work Ok',
			'wrnt' => 'Wrnt',
			'set' => 'Set',
			'defect' => 'Defect',
			'user_create2' => 'User Create2',
			'date_create' => 'Date Create',
			'user_change2' => 'User Change2',
			'date_change' => 'Date Change',
			'DelDate' => 'Del Date',
			'Lock' => 'Lock',
			'EmplLock' => 'Empl Lock',
			'DateLock' => 'Date Lock',
			'EmplCreate' => 'Empl Create',
			'EmplChange' => 'Empl Change',
			'EmplDel' => 'Empl Del',
		);
	}


	public function setRepair($id) {
		$this->Query->AddWhere('repr_id = ' . $id);
	}

}
