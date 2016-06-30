<?php

/**
 * This is the model class for table "AddressSystems".
 *
 * The followings are the available columns in table 'AddressSystems':
 * @property integer $AddressSystem_id
 * @property string $AddressSystem
 * @property string $Note
 * @property boolean $Lock
 * @property integer $EmplLock
 * @property string $DateLock
 * @property integer $EmplCreate
 * @property string $DateCreate
 * @property integer $EmplChange
 * @property string $DateChange
 * @property integer $EmplDel
 * @property string $DelData
 */
class AddressSystems extends MainFormModel
{

	public $AddressSystem_id = null;
	public $AddressSystem = null;
	public $Note = null;
	public $Lock = null;
	public $EmplLock = null;
	public $DateLock = null;
	public $EmplCreate = null;
	public $DateCreate = null;
	public $EmplChange = null;
	public $DateChange = null;
	public $EmplDel = null;
	public $DelDate = null;

	public $SP_INSERT_NAME = 'INSERT_AddressSystems';
	public $SP_UPDATE_NAME = 'UPDATE_AddressSystems';
	public $SP_DELETE_NAME = 'DELETE_AddressSystems';

	public $KeyFiled = 'a.AddressSystem_id';
	public $PrimaryKey = 'AddressSystem_id';


	function __construct($scenario='') {
		parent::__construct($scenario);
		$select = "Select a.* ";
		$from = "From AddressSystems a ";
		$where = "Where a.DelDate Is Null ";
		$order = "Order By a.AddressSystem ";

		$this->Query->setSelect($select);
		$this->Query->setFrom($from);
		$this->Query->setOrder($order);
		$this->Query->setWhere($where);
	}


	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'AddressSystems';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('AddressSystem', 'required'),
			array('EmplLock, EmplCreate, EmplChange, EmplDel', 'numerical', 'integerOnly'=>true),
			array('AddressSystem', 'length', 'max'=>25),
			array('Note, Lock, DateLock, DateCreate, DateChange, DelDate', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('AddressSystem_id, AddressSystem, Note, Lock, EmplLock, DateLock, EmplCreate, DateCreate, EmplChange, DateChange, EmplDel, DelDate', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'AddressSystem_id' => 'Address System',
			'AddressSystem' => 'Адрес',
			'Note' => 'Примечание',
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
	 * @return AddressSystems the static model class
	 */
	 public function deleteCount($id, $empl_id) {
	 
		$Command = Yii::app()->db->createCommand(''
                . "UPDATE AddressSystems SET EmplDel = {$empl_id}, DelDate = '".date('m.d.y H:i:s')."' WHERE AddressSystem_id = {$id}
                ");
        
        return $Command->queryAll();
	}
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
