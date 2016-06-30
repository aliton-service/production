<?php

/**
 * This is the model class for table "PriceMonitoring".
 *
 * The followings are the available columns in table 'PriceMonitoring':
 * @property integer $mntr_id
 * @property string $date
 * @property integer $eqip_id
 * @property integer $splr_id
 * @property double $price
 * @property string $user_create
 * @property string $date_create
 * @property string $user_change
 * @property string $date_change
 *
 * The followings are the available model relations:
 * @property Equips $eqip
 * @property Suppliers $splr
 */
class PriceMonitoring extends MainFormModel
{
	protected $table = 'PriceMonitoring';

	public $mntr_id = null;
	public $date = null;
	public $eqip_id = null;
	public $splr_id = null;
	public $price = null;
	public $user_create = null;
	public $date_create = null;
	public $user_change = null;
	public $date_change = null;
	public $user = null;
	public $EmplCreate = null;
	public $EmplChange = null;
	public $DateCreate = null;
	public $DateChange = null;
	public $EmplDel = null;
	public $DelDate = null;

	public $KeyFiled = 'pm.mntr_id';
	public $PrimaryKey = 'mntr_id';

	public $SP_INSERT_NAME = 'INSERT_PriceMonitoring';
	public $SP_UPDATE_NAME = 'UPDATE_PriceMonitoring';
	public $SP_DELETE_NAME = 'DELETE_PriceMonitoring';

	public $select = null;
	public $from = null;
	public $where = null;
	public $order = null;

	function __construct($scenario='') {
		parent::__construct($scenario);

		$date_begin = 'dateadd(mm, -3, getdate())';
		$date_end = 'getdate()';

		$this->select = "
		select pm.mntr_id, pm.date, pm.eqip_id, pm.splr_id, pm.price, dbo.FIO(e.EmployeeName) user_create, eq.EquipName, s.NameSupplier, um.NameUnitMeasurement ums
		";

		$this->from = "
		from PriceMonitoring pm left join Employees e on (e.Alias = replace(replace(pm.user_create, 'ELTON\', ''), 'ALITON\', '') or e.RemoteAlias = replace(replace(pm.user_create, 'ELTON\', ''), 'ALITON\', ''))
		left join Equips eq on pm.eqip_id = eq.Equip_id
		left join Suppliers s on pm.splr_id = s.Supplier_Id
		left join UnitMeasurement um on eq.UnitMeasurement_id = um.UnitMeasurement_id
		";

		$this->where = "
		where pm.DelDate is null and (dbo.truncdate([date]) between {$date_begin} and {$date_end})
		";

		$this->order = "
		order by date desc, eqip_id
		";

		$this->Query->setSelect($this->select);
		$this->Query->setFrom($this->from);
		$this->Query->setOrder($this->order);
		$this->Query->setWhere($this->where);

	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'PriceMonitoring';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('date, eqip_id, splr_id, price', 'required'),
			array('eqip_id, splr_id', 'numerical', 'integerOnly'=>true),
			array('price', 'numerical'),
			array('user_create, user_change', 'length', 'max'=>50),
			array('date_create, date_change', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('mntr_id, date, eqip_id, splr_id, price, user_create, date_create, user_change, date_change', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'mntr_id' => 'Mntr',
			'date' => 'Дата',
			'eqip_id' => 'Оборудование',
			'splr_id' => 'Поставщик',
			'price' => 'Цена',
			'user_create' => 'User Create',
			'date_create' => 'Date Create',
			'user_change' => 'User Change',
			'date_change' => 'Date Change',
		);
	}


	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return PriceMonitoring the static model class
	 */
	 public function deleteCount($id, $empl_id) {
	 
		$Command = Yii::app()->db->createCommand(''
                . "UPDATE PriceMonitoring SET EmplDel = {$empl_id}, DelDate = '".date('m.d.y H:i:s')."' WHERE mntr_id = {$id}
                ");
        
        return $Command->queryAll();
	}
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function getMonitoringPrice($q=null, $date_begin = 'dateadd(mm, -3, getdate())', $date_end = 'getdate()') {
		$this->select = "
		select pm.mntr_id, pm.date, pm.eqip_id, pm.splr_id, pm.price, dbo.FIO(e.EmployeeName) user_create, eq.EquipName, s.NameSupplier, um.NameUnitMeasurement ums
		";

		$this->from = "
		from PriceMonitoring pm left join Employees e on (e.Alias = replace(replace(pm.user_create, 'ELTON\', ''), 'ALITON\', '') or e.RemoteAlias = replace(replace(pm.user_create, 'ELTON\', ''), 'ALITON\', ''))
		left join Equips eq on pm.eqip_id = eq.Equip_id
		left join Suppliers s on pm.splr_id = s.Supplier_Id
		left join UnitMeasurement um on eq.UnitMeasurement_id = um.UnitMeasurement_id
		";

		$this->where = "
		where pm.DelDate is null and dbo.truncdate([date]) between {$date_begin} and {$date_end}
  --and (splr_id = :p_splr_id or :p_all_splr = 1)
		";

		$this->order = "
		order by date desc, eqip_id
		";

		$this->Query->setSelect($this->select);
		$this->Query->setFrom($this->from);
		$this->Query->setOrder($this->order);
		$this->Query->setWhere($this->where);
	}
}
