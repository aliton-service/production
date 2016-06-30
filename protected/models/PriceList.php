<?php

/**
 * This is the model class for table "PriceList".
 *
 * The followings are the available columns in table 'PriceList':
 * @property integer $prlt_id
 * @property string $date
 * @property string $note
 * @property string $DelDate
 * @property string $user_create2
 * @property string $date_create
 * @property string $user_change2
 * @property string $date_change
 * @property boolean $Lock
 * @property integer $EmplLock
 * @property string $DateLock
 * @property integer $EmplCreate
 * @property integer $EmplChange
 * @property integer $EmplDel
 */
class PriceList extends CActiveRecord
{

	public $prlt_id = null;
	public $date = null;
	public $note = null;
	public $DelDate = null;
	public $user_create2 = null;
	public $date_create = null;
	public $user_change2 = null;
	public $date_change = null;
	public $Lock = null;
	public $EmplLock = null;
	public $DateLock = null;
	public $EmplCreate = null;
	public $EmplChange = null;
	public $EmplDel = null;

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'PriceList';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('date', 'required'),
			array('EmplLock, EmplCreate, EmplChange, EmplDel', 'numerical', 'integerOnly'=>true),
			array('note', 'length', 'max'=>1073741823),
			array('user_create2, user_change2', 'length', 'max'=>50),
			array('DelDate, date_create, date_change, Lock, DateLock', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('prlt_id, date, note, DelDate, user_create2, date_create, user_change2, date_change, Lock, EmplLock, DateLock, EmplCreate, EmplChange, EmplDel', 'safe', 'on'=>'search'),
		);
	}


	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'prlt_id' => 'Prlt',
			'date' => 'Date',
			'note' => 'Note',
			'DelDate' => 'Del Date',
			'user_create2' => 'User Create2',
			'date_create' => 'Date Create',
			'user_change2' => 'User Change2',
			'date_change' => 'Date Change',
			'Lock' => 'Lock',
			'EmplLock' => 'Empl Lock',
			'DateLock' => 'Date Lock',
			'EmplCreate' => 'Empl Create',
			'EmplChange' => 'Empl Change',
			'EmplDel' => 'Empl Del',
		);
	}


	 public function deleteCount($id, $empl_id) {
	 
		$Command = Yii::app()->db->createCommand(''
                . "UPDATE PriceList SET EmplDel = {$empl_id}, DelDate = '".date('m.d.y H:i:s')."' WHERE prlt_id = {$id}
                ");
        
        return $Command->queryAll();
	}
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	static function getPriceList($date = "getdate()") {
		$sql = "select dbo.get_price_list($date)";
		$query = Yii::app()->db->createCommand($sql);
		return $query->queryScalar();
	}
}
