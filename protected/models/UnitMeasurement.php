<?php

/**
 * This is the model class for table "UnitMeasurement".
 *
 * The followings are the available columns in table 'UnitMeasurement':
 * @property integer $UnitMeasurement_Id
 * @property string $NameUnitMeasurement
 * @property string $Note
 * @property string $DateInsert
 * @property string $DateChange
 * @property string $UserInsert2
 * @property string $UserChange2
 * @property boolean $Lock
 * @property integer $EmplLock
 * @property string $DateLock
 * @property integer $EmplCreate
 * @property integer $EmplChange
 * @property integer $EmplDel
 *
 * The followings are the available model relations:
 * @property CalcWorkTypeDetails[] $calcWorkTypeDetails
 */
class UnitMeasurement extends MainFormModel
{
	public $UnitMeasurement_Id = null;
	public $NameUnitMeasurement = null;
	public $Note = null;
	public $DateInsert = null;
	public $DateChange = null;
	public $UserInsert2 = null;
	public $UserChange2 = null;
	public $Lock = null;
	public $EmplLock = null;
	public $DateLock = null;
	public $EmplCreate = null;
	public $EmplChange = null;
	public $EmplDel = null;
	public $DelDate = null;

	public $KeyFiled = 'um.UnitMeasurement_Id';
	public $PrimaryKey = 'UnitMeasurement_Id';

	public $SP_INSERT_NAME = '';
	public $SP_UPDATE_NAME = '';
	public $SP_DELETE_NAME = '';

	function __construct($scenario='')
	{
		parent::__construct($scenario);

		$select = "Select um.* ";
		$from = "From UnitMeasurement um ";
		$where = "";
		$order = "Order By um.NameUnitMeasurement ";

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
		return 'UnitMeasurement';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('UnitMeasurement_Id', 'required'),
			array('UnitMeasurement_Id, EmplLock, EmplCreate, EmplChange, EmplDel', 'numerical', 'integerOnly'=>true),
			array('NameUnitMeasurement, Note', 'length', 'max'=>250),
			array('UserInsert2, UserChange2', 'length', 'max'=>50),
			array('DateInsert, DateChange, Lock, DateLock', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('UnitMeasurement_Id, NameUnitMeasurement, Note, DateInsert, DateChange, UserInsert2, UserChange2, Lock, EmplLock, DateLock, EmplCreate, EmplChange, EmplDel', 'safe', 'on'=>'search'),
		);
	}



	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'UnitMeasurement_Id' => 'Unit Measurement',
			'NameUnitMeasurement' => 'Name Unit Measurement',
			'Note' => 'Note',
			'DateInsert' => 'Date Insert',
			'DateChange' => 'Date Change',
			'UserInsert2' => 'User Insert2',
			'UserChange2' => 'User Change2',
			'Lock' => 'Lock',
			'EmplLock' => 'Empl Lock',
			'DateLock' => 'Date Lock',
			'EmplCreate' => 'Empl Create',
			'EmplChange' => 'Empl Change',
			'EmplDel' => 'Empl Del',
		);
	}



	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return UnitMeasurement the static model class
	 */
	 public function deleteCount($id, $empl_id) {
	 
		$Command = Yii::app()->db->createCommand(''
                . "UPDATE UnitMeasurement SET EmplDel = {$empl_id}, DelDate = '".date('m.d.y H:i:s')."' WHERE UnitMeasurement_Id = {$id}
                ");
        
        return $Command->queryAll();
	}
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
