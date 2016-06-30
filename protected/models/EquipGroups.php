<?php

/**
 * This is the model class for table "EquipGroups".
 *
 * The followings are the available columns in table 'EquipGroups':
 * @property integer $grp_id
 * @property string $name
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
class EquipGroups extends MainFormModel
{

	public $grp_id = null;
	public $name = null;
	public $Lock = null;
	public $EmplLock = null;
	public $DateLock = null;
	public $EmplCreate = null;
	public $DateCreate = null;
	public $EmplChange = null;
	public $DateChange = null;
	public $EmplDel = null;
	public $DelDate = null;

	public $SP_INSERT_NAME = 'INSERT_EquipGroups';
	public $SP_UPDATE_NAME = 'UPDATE_EquipGroups';
	public $SP_DELETE_NAME = 'DELETE_EquipGroups';

	public $KeyFiled = 'eg.grp_id';
	public $PrimaryKey = 'grp_id';

	function __construct($scenario='') {
		parent::__construct($scenario);

		$select = "Select eg.* ";

		$from = "From EquipGroups eg ";

		$where = "Where eg.DelDate Is Null ";

		$order = "Order By eg.name ";

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
		return 'EquipGroups';
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
			array('name', 'length', 'max'=>50),
			array('Lock, DateLock, DateCreate, DateChange, DelDate', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('grp_id, name, Lock, EmplLock, DateLock, EmplCreate, DateCreate, EmplChange, DateChange, EmplDel, DelDate', 'safe', 'on'=>'search'),
		);
	}



	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'grp_id' => 'Grp',
			'name' => 'Наименование',
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
	 * @return EquipGroups the static model class
	 */
	 public function deleteCount($id, $empl_id) {
	 
		$Command = Yii::app()->db->createCommand(''
                . "UPDATE EquipGroups SET EmplDel = {$empl_id}, DelDate = '".date('m.d.y H:i:s')."' WHERE grp_id = {$id}
                ");
        
        return $Command->queryAll();
	}
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
