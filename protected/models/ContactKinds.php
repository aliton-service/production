<?php

/**
 * This is the model class for table "ContactKinds".
 *
 * The followings are the available columns in table 'ContactKinds':
 * @property integer $Kind_id
 * @property string $Kind_name
 * @property boolean $Lock
 * @property integer $EmplLock
 * @property string $DateLock
 * @property integer $EmplChange
 * @property string $DateChange
 * @property integer $EmplDel
 * @property string $DelDate
 */
class ContactKinds extends MainFormModel
{
    public $Kind_id;
    public $Kind_name;
    public $Lock;
    public $EmplLock;
    public $DateLock;
    public $EmplChange;
    public $DateChange;
    public $EmplDel;
    public $DelDate;
    
    function __construct($scenario = '') {

        parent::__construct($scenario);

        $this->SP_INSERT_NAME = 'INSERT_ContactKinds';
        $this->SP_UPDATE_NAME = 'UPDATE_ContactKinds';
        $this->SP_DELETE_NAME = 'DELETE_ContactKinds';

        $select = "Select 
                    ck.Kind_id,
                    ck.Kind_name,
                    ck.Lock,
                    ck.EmplLock,
                    ck.DateLock,
                    ck.EmplChange,
                    ck.DateChange,
                    ck.EmplDel,
                    ck.DelDate
                    ";
        $from = "\nFrom ContactKinds ck";
        $Where = "\nWhere ck.DelDate is null";
        
        $this->Query->setSelect($select);
        $this->Query->setFrom($from);
        $this->Query->setWhere($Where);      

        
        // Инициализация первичного ключа
        $this->KeyFiled = 'ck.Kind_id';
        $this->PrimaryKey = 'Kind_id';


    }
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'ContactKinds';
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
			array('Kind_name', 'length', 'max'=>50),
			array('Lock, DateLock, DateChange, DelDate', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('Kind_id, Kind_name, Lock, EmplLock, DateLock, EmplChange, DateChange, EmplDel, DelDate', 'safe'),
		);
	}
	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'Kind_id' => 'Kind',
			'Kind_name' => 'Kind Name',
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
