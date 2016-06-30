<?php

/**
 * This is the model class for table "DeliveryDetails".
 *
 * The followings are the available columns in table 'DeliveryDetails':
 * @property integer $dldt_id
 * @property integer $dldm_id
 * @property integer $equip_id
 * @property double $quant
 * @property boolean $used
 * @property double $price
 * @property string $date_create
 * @property string $user_create
 * @property string $date_change
 * @property string $user_change
 * @property string $deldate
 */
class DeliveryDetails extends MainFormModel
{
	public $dldt_id = null;
	public $dldm_id = null;
	public $equip_id = null;
	public $quant = null;
	public $used = null;
	public $price = null;
	public $date_create = null;
	public $user_create = null;
	public $date_change = null;
	public $user_change = null;
	public $deldate = null;
	public $equipname = null;
	public $um_name = null;

	public $KeyField = 'dt.dldt_id';
	public $KeyFiled = 'dt.dldt_id';
	public $PrimaryKey = 'dldt_id';

	public $SP_INSERT_NAME = 'INSERT_DeliveryDetails';
	public $SP_UPDATE_NAME = 'UPDATE_DeliveryDetails';

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'DeliveryDetails';
	}

	function __construct($scenario = '', $print_reason = false)
	{
		parent::__construct($scenario);

		$select = "
		Select
			dt.dldt_id,
			dt.dldm_id,
			dt.equip_id,
			e.equipname,
			u.NameUnitMeasurement um_name,
			dt.quant,
			dt.used,
			dt.price
		";
		$from = "
		From DeliveryDetails dt left join Equips e on (dt.equip_id = e.equip_id)
		left join UnitMeasurement u on (e.UnitMeasurement_Id = u.UnitMeasurement_Id)
		";
		$where = "
		Where dt.deldate is null
		";
		$order = "
		Order by dt.dldt_id
		";

		$this->Query->setSelect($select);
		$this->Query->setFrom($from);
		$this->Query->setOrder($order);
		$this->Query->setWhere($where);

	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('dldm_id, equip_id, quant, date_create, user_create', 'required'),
			array('dldm_id, equip_id', 'numerical', 'integerOnly'=>true),
			array('quant, price', 'numerical'),
			array('user_create, user_change', 'length', 'max'=>20),
			array('used, date_change, deldate', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('dldt_id, dldm_id, equip_id, quant, used, price, date_create, user_create, date_change, user_change, deldate', 'safe', 'on'=>'search'),
		);
	}


	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'dldt_id' => 'Dldt',
			'dldm_id' => 'Dldm',
			'equip_id' => 'Equip',
			'quant' => 'Quant',
			'used' => 'Used',
			'price' => 'Price',
			'date_create' => 'Date Create',
			'user_create' => 'User Create',
			'date_change' => 'Date Change',
			'user_change' => 'User Change',
			'deldate' => 'Deldate',
		);
	}


	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return DeliveryDetails the static model class
	 */
	 public function deleteCount($id, $empl_id) {
	 
		$Command = Yii::app()->db->createCommand(''
                . "UPDATE DeliveryDetails SET EmplDel = {$empl_id}, DelDate = '".date('m.d.y H:i:s')."' WHERE dldt_id = {$id}
                ");
        
        return $Command->queryAll();
	}
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
