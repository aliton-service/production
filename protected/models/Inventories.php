<?php

/**
 * This is the model class for table "Inventories".
 *
 * The followings are the available columns in table 'Inventories':
 * @property integer $invn_id
 * @property string $date
 * @property integer $hldr_id
 * @property boolean $closed
 * @property string $DelDate
 * @property string $user_create
 * @property string $date_create
 * @property string $user_change
 * @property string $date_change
 * @property integer $mstr_id
 * @property integer $wrtp_id
 * @property integer $strg_id
 * @property integer $EmplCreate
 * @property integer $EmplChange
 * @property integer $EmplDel
 *
 * The followings are the available model relations:
 * @property Employees $mstr
 * @property InventoryDetails[] $inventoryDetails
 */
class Inventories extends MainFormModel
{

	public $invn_id = null;
	public $date = null;
	public $hldr_id = null;
	public $closed = null;
	public $DelDate = null;
	public $user_create = null;
	public $date_create = null;
	public $user_change = null;
	public $date_change = null;
	public $mstr_id = null;
	public $wrtp_id = null;
	public $strg_id = null;
	public $EmplCreate = null;
	public $EmplChange = null;
	public $EmplDel = null;

	public $indt_id = null;
	public $quant = null;
	public $quant_used = null;

	public $KeyFiled = 'i.invn_id';
	public $PrimaryKey = 'invn_id';

	public $select = null;
	public $from = null;
	public $where = null;
	public $order = null;

	function __construct($scenario = '') {
		parent::__construct($scenario);

	}
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'Inventories';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('date, hldr_id', 'required'),
			array('hldr_id, mstr_id, wrtp_id, strg_id, EmplCreate, EmplChange, EmplDel', 'numerical', 'integerOnly'=>true),
			array('user_create, user_change', 'length', 'max'=>50),
			array('closed, DelDate, date_create, date_change', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('invn_id, date, hldr_id, closed, DelDate, user_create, date_create, user_change, date_change, mstr_id, wrtp_id, strg_id, EmplCreate, EmplChange, EmplDel', 'safe', 'on'=>'search'),
		);
	}



	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'invn_id' => 'Invn',
			'date' => 'Date',
			'hldr_id' => 'Hldr',
			'closed' => 'Closed',
			'DelDate' => 'Del Date',
			'user_create' => 'User Create',
			'date_create' => 'Date Create',
			'user_change' => 'User Change',
			'date_change' => 'Date Change',
			'mstr_id' => 'Mstr',
			'wrtp_id' => 'Wrtp',
			'strg_id' => 'Strg',
			'EmplCreate' => 'Empl Create',
			'EmplChange' => 'Empl Change',
			'EmplDel' => 'Empl Del',
		);
	}



	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Inventories the static model class
	 */
	 public function deleteCount($id, $empl_id) {
	 
		$Command = Yii::app()->db->createCommand(''
                . "UPDATE Inventories SET EmplDel = {$empl_id}, DelDate = '".date('m.d.y H:i:s')."' WHERE invn_id = {$id}
                ");
        
        return $Command->queryAll();
	}
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function getReestrInventories() {
		$this->select = "
		select i.invn_id, i.date, i.closed, i.strg_id, isnull(s.storage, 'Все') storage
		";
		$this->from = "
		from Inventories i left join Storages s on (i.strg_id = s.storage_id)
		";
		$this->where = "
		where i.DelDate is null
		and i.hldr_id = 1
		";
		$this->order = "
		order by i.date desc
		";

		$this->Query->setSelect($this->select);
		$this->Query->setFrom($this->from);
		$this->Query->setOrder($this->order);
		$this->Query->setWhere($this->where);

	}

	public function getInventories($id) {
		$id = (int)$id;
		$this->select = "
		select id.indt_id,
       id.invn_id,
       id.eqip_id,
       eq.EquipName,
       eq.UnitMeasurement_id,
       um.NameUnitMeasurement,
       id.quant,
       id.quant_used
		";
		$this->from = "
		from InventoryDetails id inner join Equips eq on (id.eqip_id = eq.Equip_id)
       left join UnitMeasurement um on (eq.UnitMeasurement_id = um.UnitMeasurement_id)
		";
		$this->where = "
		where id.invn_id = {$id}
		and id.DelDate is Null
		";
		$this->order = "
		Order by eq.EquipName
		";

		$this->Query->setSelect($this->select);
		$this->Query->setFrom($this->from);
		$this->Query->setOrder($this->order);
		$this->Query->setWhere($this->where);
	}
}
