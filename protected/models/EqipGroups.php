<?php

/**
 * This is the model class for table "EqipGroups".
 *
 * The followings are the available columns in table 'EqipGroups':
 * @property integer $group_id
 * @property integer $parent_group_id
 * @property string $code
 * @property string $group_name
 * @property string $full_group_name
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
class EqipGroups extends MainFormModel
{
	public $group_id = null;
	public $parent_group_id = 1;
	public $code = null;
	public $group_name = null;
	public $full_group_name = null;
	public $Lock = null;
	public $EmplLock = null;
	public $DateLock = null;
	public $EmplCreate = null;
	public $DateCreate = null;
	public $EmplChange = null;
	public $DateChange = null;
	public $EmplDel = null;
 	public $DelDate = null;

	public $KeyFiled = 'eg.group_id';
	public $PrimaryKey = 'group_id';

	public $SP_INSERT_NAME = 'INSERT_EqipGroups';
	public $SP_UPDATE_NAME = 'UPDATE_EqipGroups';
	public $SP_DELETE_NAME = 'DELETE_EqipGroups';


	function __construct($scenario='')
	{
		parent::__construct($scenario);

		$select = "Select eg.* ";
		$from = "From EqipGroups eg ";
		$where = "Where eg.DelDate Is Null ";
		$order = "Order By eg.group_name ";

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
		return 'EqipGroups';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('group_name', 'required'),
			array('parent_group_id, EmplLock, EmplCreate, EmplChange, EmplDel', 'numerical', 'integerOnly'=>true),
			array('group_name', 'length', 'max'=>50),
			array('code, Lock, DateLock, DateCreate, DateChange, DelDate', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('group_id, parent_group_id, code, group_name, full_group_name, Lock, EmplLock, DateLock, EmplCreate, DateCreate, EmplChange, DateChange, EmplDel, DelDate', 'safe', 'on'=>'search'),
		);
	}



	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'group_id' => 'Group',
			'parent_group_id' => 'Parent Group',
			'code' => 'Code',
			'group_name' => 'Наименвоание',
			'full_group_name' => 'Full Group Name',
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
	 * @return EqipGroups the static model class
	 */
	 public function deleteCount($id, $empl_id) {
	 
		$Command = Yii::app()->db->createCommand(''
                . "UPDATE EqipGroups SET EmplDel = {$empl_id}, DelDate = '".date('m.d.y H:i:s')."' WHERE group_id = {$id}
                ");
        
        return $Command->queryAll();
	}
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	
}
