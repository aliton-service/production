<?php

/**
 * This is the model class for table "ContactTypes".
 *
 * The followings are the available columns in table 'ContactTypes':
 * @property integer $Contact_id
 * @property string $ContactName
 * @property boolean $Lock
 * @property integer $EmplLock
 * @property string $DateLock
 * @property integer $EmplChange
 * @property string $DateChange
 * @property integer $EmplDel
 * @property string $DelDate
 */
class ContactTypes extends MainFormModel
{
    public $Contact_id;
    public $ContactName;
    public $Lock;
    public $EmplLock;
    public $DateLock;
    public $EmplChange;
    public $DateChange;
    public $EmplDel;
    public $DelDate;
    
    function __construct($scenario = '') {

        parent::__construct($scenario);

        $this->SP_INSERT_NAME = 'INSERT_ContactTypes';
        $this->SP_UPDATE_NAME = 'UPDATE_ContactTypes';
        $this->SP_DELETE_NAME = 'DELETE_ContactTypes';

        $select = "Select 
                    ct.Contact_id,
                    ct.ContactName,
                    ct.Lock,
                    ct.EmplLock,
                    ct.DateLock,
                    ct.EmplChange,
                    ct.DateChange,
                    ct.EmplDel,
                    ct.DelDate
                    ";
        $from = "\nFrom ContactTypes ct";
        $Where = "\nWhere ct.DelDate is null";
        
        $this->Query->setSelect($select);
        $this->Query->setFrom($from);
        $this->Query->setWhere($Where);      

        
        // Инициализация первичного ключа
        $this->KeyFiled = 'ct.Contact_id';
        $this->PrimaryKey = 'Contact_id';


    }
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'ContactTypes';
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
			array('ContactName', 'length', 'max'=>50),
			array('Lock, DateLock, DateChange, DelDate', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('Contact_id, ContactName, Lock, EmplLock, DateLock, EmplChange, DateChange, EmplDel, DelDate', 'safe'),
		);
	}
	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'Contact_id' => 'Contact',
			'ContactName' => 'Contact Name',
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
