<?php

/**
 * This is the model class for table "DeliveryTypes".
 *
 * The followings are the available columns in table 'DeliveryTypes':
 * @property integer $dltp_id
 * @property string $DeliveryType
 * @property boolean $Lock
 * @property integer $EmplLock
 * @property string $DateLock
 * @property integer $EmplCreate
 * @property string $DateCreate
 * @property integer $EmplChange
 * @property string $DateChange
 * @property integer $EmplDel
 * @property string $DelDate
 */
class DeliveryTypes extends MainFormModel
{
	public $dltp_id = null;
	public $DeliveryType = null;
	public $Lock = null;
	public $EmplLock = null;
	public $DateLock = null;
	public $EmplCreate = null;
	public $DateCreate = null;
	public $EmplChange = null;
	public $DateChange = null;
	public $EmplDel = null;
	public $DelDate = null;


	function __construct($scenario = '') {
		parent::__construct($scenario);

		$select = " Select dt.*";
		$from = " From DeliveryTypes dt ";
		$where = " Where dt.DelDate is null ";
		$order = " Order By dt.DeliveryType ";

		$this->Query->setSelect($select);
		$this->Query->setFrom($from);
		$this->Query->setWhere($where);
		$this->Query->setOrder($order);
		$this->KeyFiled = 'dt.dltp_id';
	}
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'DeliveryTypes';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('DeliveryType', 'required'),
			array('EmplLock, EmplCreate, EmplChange, EmplDel', 'numerical', 'integerOnly'=>true),
			array('DeliveryType', 'length', 'max'=>150),
			array('Lock, DateLock, DateCreate, DateChange, DelDate', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('dltp_id, DeliveryType, Lock, EmplLock, DateLock, EmplCreate, DateCreate, EmplChange, DateChange, EmplDel, DelDate', 'safe', 'on'=>'search'),
		);
	}


	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'dltp_id' => 'Dltp',
			'DeliveryType' => 'Delivery Type',
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



	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return DeliveryTypes the static model class
	 */
	 public function deleteCount($id, $empl_id) {
	 
		$Command = Yii::app()->db->createCommand(''
                . "UPDATE DeliveryTypes SET EmplDel = {$empl_id}, DelDate = '".date('m.d.y H:i:s')."' WHERE dltp_id = {$id}
                ");
        
        return $Command->queryAll();
	}
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

//	static function all() {
//		return CHtml::listData(self::model()->findAll(), 'dltp_id', 'DeliveryType');
//
//	}

//	static function getData() {
//		$q = new SQLQuery();
//		$q->setSelect("Select dltp_id, DeliveryType");
//		$q->setFrom("\nFrom DeliveryTypes");
//		$q->setWhere("\nWhere DelDate is Null");
//		return $q->QueryAll();
//	}
}
