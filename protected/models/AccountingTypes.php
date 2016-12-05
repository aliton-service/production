<?php

/**
 * This is the model class for table "AccountingTypes".
 *
 * The followings are the available columns in table 'AccountingTypes':
 * @property integer $actp_id
 * @property string $name
 * @property string $DescriptionType
 * @property string $user_create
 * @property string $date_create
 * @property string $user_change
 * @property string $date_change
 */
class AccountingTypes extends MainFormModel
{
	public $actp_id = null;
	public $name = null;
	public $DescriptionType = null;
	public $user_create = null;
	public $DateCreate = null;
	public $user_change = null;
	public $DateChange = null;
	public $EmplDel = null;
	public $EmplCreate = null;
	public $EmplChange = null;
	public $DelDate = null;

	public $KeyFiled = 'at.actp_id';
	public $PrimaryKey = 'actp_id';

	public $SP_INSERT_NAME = '';
	public $SP_UPDATE_NAME = '';
	public $SP_DELETE_NAME = '';

	function __construct($scenario='')
	{
		parent::__construct($scenario);

		$select = "\nSelect at.* ";
		$from = "\nFrom AccountingTypes at ";
		$where = "Where at.DelDate Is Null ";
		$order = "\nOrder By at.name ";

		$this->Query->setSelect($select);
		$this->Query->setFrom($from);
		$this->Query->setOrder($order);
		//$this->Query->setWhere($where);
	}
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'AccountingTypes';
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
			array('name', 'length', 'max'=>30),
			array('DescriptionType', 'length', 'max'=>150),
			array('user_create, user_change', 'length', 'max'=>50),
			array('date_create, date_change', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('actp_id, name, DescriptionType, user_create, date_create, user_change, date_change', 'safe', 'on'=>'search'),
		);
	}


	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'actp_id' => 'Actp',
			'name' => 'Name',
			'DescriptionType' => 'Description Type',
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
	 * @return AccountingTypes the static model class
	 */
	 public function deleteCount($id, $empl_id) {
	 
		$Command = Yii::app()->db->createCommand(''
                . "UPDATE AccountingTypes SET EmplDel = {$empl_id}, DelDate = '".date('m.d.y H:i:s')."' WHERE actp_id = {$id}
                ");
        
        return $Command->queryAll();
	}
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
