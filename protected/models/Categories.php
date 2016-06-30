<?php

/**
 * This is the model class for table "Categories".
 *
 * The followings are the available columns in table 'Categories':
 * @property integer $ctgr_id
 * @property string $name
 * @property boolean $ForPrice
 * @property boolean $ForObject
 * @property boolean $ForTreb
 * @property boolean $ForCostCalc
 * @property boolean $Lock
 * @property integer $EmplLock
 * @property string $DateLock
 * @property integer $EmplCreate
 * @property string $DateCreate
 * @property integer $EmplChange
 * @property string $DateChange
 * @property string $DelDate
 * @property integer $EmplDel
 *
 * The followings are the available model relations:
 * @property Equips[] $equips
 */
class Categories extends MainFormModel
{

	public $ctgr_id = null;
	public $name = null;
	public $ForPrice = null;
	public $ForObject = null;
	public $ForTreb = null;
	public $ForCostCalc = null;
	public $Lock = null;
	public $EmplLock = null;
	public $DateLock = null;
	public $EmplCreate = null;
	public $DateCreate = null;
	public $EmplChange = null;
	public $DateChange = null;
	public $DelDate = null;
	public $EmplDel = null;

	public $KeyFiled = 'c.ctgr_id';
	public $PrimaryKey = 'ctgr_id';

	public $SP_INSERT_NAME = 'INSERT_Categories';
	public $SP_UPDATE_NAME = 'UPDATE_Categories';
	public $SP_DELETE_NAME = 'DELETE_Categories';

	function __construct($scenario='') {
		parent::__construct($scenario);

		$select = "Select c.* ";
		$from = "From Categories c ";
		$where = "Where c.DelDate Is Null ";
		$order = "Order By c.name ";

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
		return 'Categories';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name', 'required'),
			array('EmplLock, EmplCreate, EmplChange, EmplDel', 'numerical', 'integerOnly'=>true),
			array('name', 'length', 'max'=>25),
			array('ForPrice, ForObject, ForTreb, ForCostCalc, Lock, DateLock, DateCreate, DateChange, DelDate', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('ctgr_id, name, ForPrice, ForObject, ForTreb, ForCostCalc, Lock, EmplLock, DateLock, EmplCreate, DateCreate, EmplChange, DateChange, DelDate, EmplDel', 'safe', 'on'=>'search'),
		);
	}



	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'ctgr_id' => 'Ctgr',
			'name' => 'Категория',
			'ForPrice' => 'Для прайса',
			'ForObject' => 'Для объектов',
			'ForTreb' => 'Для требований',
			'ForCostCalc' => 'Для смет',
			'Lock' => 'Lock',
			'EmplLock' => 'Empl Lock',
			'DateLock' => 'Date Lock',
			'EmplCreate' => 'Empl Create',
			'DateCreate' => 'Date Create',
			'EmplChange' => 'Empl Change',
			'DateChange' => 'Date Change',
			'DelDate' => 'Del Date',
			'EmplDel' => 'Empl Del',
		);
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Categories the static model class
	 */
	 public function deleteCount($id, $empl_id) {
	 
		$Command = Yii::app()->db->createCommand(''
                . "UPDATE Categories SET EmplDel = {$empl_id}, DelDate = '".date('m.d.y H:i:s')."' WHERE ctgr_id = {$id}
                ");
        
        return $Command->queryAll();
	}
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
