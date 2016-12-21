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
	public $EquipName = null;
	public $Mndm_id = null;
	public $UnitMeasurement_Id = null;
	public $NameUnitMeasurement = null;
	public $splr_id = null;
	public $NameSupplier = null;
	public $price = null;
	public $price_high = null;
	public $price_retail = null;
	public $user_create_id = null;
	public $EmployeeName = null;
	public $ShortName = null;
	public $date_create = null;
	public $user_change = null;
	public $user_change_id = null;
	public $date_change = null;
	public $EmplDel = null;
	public $DelDate = null;
	public $delivery = null;
	public $title = null;
	public $user_delete = null;
	public $date_delete = null;

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
                    select 
                        pm.mntr_id, 
                        pm.date, 
                        pm.eqip_id, 
                        pm.Mndm_id, 
                        eqps.EquipName, 
                        unms.UnitMeasurement_Id, 
                        unms.NameUnitMeasurement, 
                        pm.splr_id, 
                        splrs.NameSupplier, 
                        pm.price, 
                        pm.price_retail, 
                        pm.user_create_id, 
                        empl.EmployeeName, 
                        empl.ShortName, 
                        pm.delivery
		";

		$this->from = "
                    from PriceMonitoring pm 

                    left join Employees empl 
                            on pm.user_create_id = empl.Employee_id

                    left join Equips eqps
                            on pm.eqip_id = eqps.Equip_id

                    left join UnitMeasurement unms
                            on eqps.UnitMeasurement_Id = unms.UnitMeasurement_Id

                    left join Suppliers splrs
                            on pm.splr_id = splrs.Supplier_Id
		";

		$this->where = "
                    Where pm.date_delete is null
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
                    array('price, price_retail', 'fieldValidate'),
                    array('mntr_id, Mndm_id, date, eqip_id, splr_id, price, price_retail, user_create_id, date_create, user_change_id, date_change, delivery', 'safe'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'mntr_id' => 'Mntr',
                        'Mndm_id' => '',
			'date' => 'Дата',
			'eqip_id' => 'Оборудование',
			'splr_id' => 'Поставщик',
			'price' => 'Цена',
			'delivery' => 'Срок поставки',
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
                    select pm.mntr_id, pm.date, pm.eqip_id, eqps.EquipName, unms.UnitMeasurement_Id, unms.NameUnitMeasurement, pm.splr_id, splrs.NameSupplier, 
                        pm.price, pm.price_retail, pm.user_create_id, empl.EmployeeName, pm.delivery
		";

		$this->from = "
		from PriceMonitoring pm 

                    left join Employees empl 
                            on pm.user_create_id = empl.Employee_id

                    left join Equips eqps
                            on pm.eqip_id = eqps.Equip_id

                    left join UnitMeasurement unms
                            on eqps.UnitMeasurement_Id = unms.UnitMeasurement_Id

                    left join Suppliers splrs
                            on pm.splr_id = splrs.Supplier_Id
		";

		$this->where = "
                    Where pm.date_delete is null
		";

		$this->order = "
                    order by date desc, eqip_id
		";

		$this->Query->setSelect($this->select);
		$this->Query->setFrom($this->from);
		$this->Query->setOrder($this->order);
		$this->Query->setWhere($this->where);
	}
        
        public function fieldValidate($attribute, array $params = array()) {
            if (($this->price == 0) || ($this->price_retail == 0)) {
                $this->addError($attribute, 'Заполните все поля.');
            }
        }
}
