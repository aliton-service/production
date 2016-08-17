<?php

/**
 * This is the model class for table "ContractTypes".
 *
 * The followings are the available columns in table 'ContractTypes':
 * @property integer $crtp_id
 * @property string $name
 * @property boolean $Lock
 * @property integer $EmplLock
 * @property string $DateLock
 * @property integer $EmplChange
 * @property string $DateChange
 * @property integer $EmplDel
 * @property string $DelDate
 */
class ContractTypes extends MainFormModel
{
    public $crtp_id;
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

        $this->SP_INSERT_NAME = 'INSERT_ContractTypes';
        $this->SP_UPDATE_NAME = 'UPDATE_ContractTypes';
        $this->SP_DELETE_NAME = 'DELETE_ContractTypes';

        $select = "Select 
                    ct.crtp_id,
                    ct.name,
                    ct.Lock,
                    ct.EmplLock,
                    ct.DateLock,
                    ct.EmplChange,
                    ct.DateChange,
                    ct.EmplDel,
                    ct.DelDate
                    ";
        $from = "\nFrom ContractTypes ct";
        $Where = "\nWhere ct.DelDate is null";
        
        $this->Query->setSelect($select);
        $this->Query->setFrom($from);
        $this->Query->setWhere($Where);      

        
        // Инициализация первичного ключа
        $this->KeyFiled = 'ct.crtp_id';
        $this->PrimaryKey = 'crtp_id';


    }
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'ContractTypes';
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
			array('crtp_id, name, Lock, EmplLock, DateLock, EmplChange, DateChange, EmplDel, DelDate', 'safe'),
		);
	}
	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'crtp_id' => 'Contract',
			'name' => 'Contract Name',
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
