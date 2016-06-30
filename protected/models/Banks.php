<?php

/**
 * This is the model class for table "Banks".
 *
 * The followings are the available columns in table 'Banks':
 * @property integer $Bank_id
 * @property string $bank_name
 * @property string $cor_account
 * @property string $bik
 * @property string $City
 * @property string $Department
 * @property boolean $Status
 * @property string $DateCreate
 * @property string $UserCreate
 * @property string $DateChange
 * @property string $EmplChange
 * @property string $DelDate
 * @property boolean $Lock
 * @property integer $EmplLock
 * @property string $DateLock
 * @property integer $EmplDel
 */
class Banks extends MainFormModel
{


	public $Bank_id = null;
	public $bank_name = null;
	public $cor_account = null;
	public $bik = null;
	public $City = null;
	public $Department = null;
	public $Status = null;
	public $DateCreate = null;
	public $EmplCreate = null;
	public $DateChange = null;
	public $EmplChange = null;
	public $DelDate = null;
	public $Lock = null;
	public $EmplLock = null;
	public $DateLock = null;
	public $EmplDel = null;

	public $SP_INSERT_NAME = 'INSERT_Banks';
	public $SP_UPDATE_NAME = 'UPDATE_Banks';
	public $SP_DELETE_NAME = 'DELETE_Banks';

	public $KeyFiled = 'b.Bank_id';
	public $PrimaryKey = 'Bank_id';


	function __construct($scenario='') {
		parent::__construct($scenario);
		$select = "Select b.* ";
		$from = "From Banks b ";
		$where = "Where DelDate Is Null ";
		$order = "Order By b.bank_name ";

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
		return 'Banks';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('bank_name, cor_account, bik', 'required'),
			array('EmplLock, EmplDel, EmplCreate', 'numerical', 'integerOnly'=>true),
			array('bank_name', 'length', 'max'=>150),
			array('cor_account, bik, EmplChange', 'length', 'max'=>50),
			array('City', 'length', 'max'=>100),
			array('Department', 'length', 'max'=>250),
			array('Status, DateChange, DelDate, Lock, DateLock', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('Bank_id, bank_name, cor_account, bik, City, Department, Status, DateCreate, DateChange, EmplChange, DelDate, Lock, EmplLock, DateLock, EmplDel', 'safe', 'on'=>'search'),
		);
	}

	/**


	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'Bank_id' => 'Bank',
			'bank_name' => 'Название',
			'cor_account' => 'Кор. счет',
			'bik' => 'БИК',
			'City' => 'Город',
			'Department' => 'Филиал',
			'Status' => 'Не действует',
			'DateCreate' => 'Date Create',

			'DateChange' => 'Date Change',
			'EmplChange' => 'Empl Change',
			'DelDate' => 'Del Date',
			'Lock' => 'Lock',
			'EmplLock' => 'Empl Lock',
			'DateLock' => 'Date Lock',
			'EmplDel' => 'Empl Del',
		);
	}



	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Banks the static model class
	 */
	 public function deleteCount($id, $empl_id) {
	 
		$Command = Yii::app()->db->createCommand(''
                . "UPDATE Banks SET EmplDel = {$empl_id}, DelDate = '".date('m.d.y H:i:s')."' WHERE Bank_id = {$id}
                ");
        
        return $Command->queryAll();
	}
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
