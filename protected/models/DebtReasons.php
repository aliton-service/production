<?php

/**
 * This is the model class for table "DebtReasons".
 *
 * The followings are the available columns in table 'DebtReasons':
 * @property integer $drsn_Id
 * @property string $name
 * @property boolean $Lock
 * @property integer $EmplLock
 * @property string $DateLock
 * @property integer $EmplChange
 * @property string $DateChange
 * @property integer $EmplDel
 * @property string $DelDate
 */
class DebtReasons extends MainFormModel
{
    public $drsn_Id;
    public $name;
    public $Lock;
    public $EmplLock;
    public $DateLock;
    public $EmplChange;
    public $DateChange;
    public $EmplDel;
    public $DelDate;
    
    function __construct($scenario = '') {

        parent::__construct($scenario);

        $this->SP_INSERT_NAME = 'INSERT_DebtReasons';
        $this->SP_UPDATE_NAME = 'UPDATE_DebtReasons';
        $this->SP_DELETE_NAME = 'DELETE_DebtReasons';

        $select = "Select 
                    dr.drsn_Id,
                    dr.name,
                    dr.Lock,
                    dr.EmplLock,
                    dr.DateLock,
                    dr.EmplChange,
                    dr.DateChange,
                    dr.EmplDel,
                    dr.DelDate
                    ";
        $from = "\nFrom DebtReasons dr";
        $Where = "\nWhere dr.DelDate is null";
        
        $this->Query->setSelect($select);
        $this->Query->setFrom($from);
        $this->Query->setWhere($Where);      

        
        // Инициализация первичного ключа
        $this->KeyFiled = 'dr.drsn_Id';
        $this->PrimaryKey = 'drsn_Id';


    }
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'DebtReasons';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('EmplLock, EmplChange, EmplDel', 'numerical', 'integerOnly'=>true),
			array('name', 'length', 'max'=>50),
			array('Lock, DateLock, DateChange, DelDate', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('drsn_Id, name, Lock, EmplLock, DateLock, EmplChange, DateChange, EmplDel, DelDate', 'safe'),
		);
	}
	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'drsn_Id' => 'DebtReasons',
			'name' => 'DebtReasons Name',
			'Lock' => 'Lock',
			'EmplLock' => 'Empl Lock',
			'DateLock' => 'Date Lock',
			'EmplChange' => 'Empl Change',
			'DateChange' => 'Date Change',
			'EmplDel' => 'Empl Del',
			'DelDate' => 'Del Date',
		);
	}

	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

}
