<?php

/**
 * This is the model class for table "Results".
 *
 * The followings are the available columns in table 'Results':
 * @property integer $Result_Id
 * @property string $ResultName
 * @property boolean $Lock
 * @property integer $EmplLock
 * @property string $DateLock
 * @property integer $EmplChange
 * @property string $DateChange
 * @property integer $EmplDel
 * @property string $DelDate
 */
class Results extends MainFormModel
{
    public $Result_Id;
    public $ResultName;
    public $Lock;
    public $EmplLock;
    public $DateLock;
    public $EmplCreate;
    public $DateCreate;
    public $EmplChange;
    public $DateChange;
    public $EmplDel;
    public $DelDate;
    
    function __construct($scenario = '') {

        parent::__construct($scenario);

        $this->SP_INSERT_NAME = 'INSERT_Results';
        $this->SP_UPDATE_NAME = 'UPDATE_Results';
        $this->SP_DELETE_NAME = 'DELETE_Results';

        $select = "Select 
                    r.Result_Id,
                    r.ResultName,
                    r.Lock,
                    r.EmplLock,
                    r.DateLock,
                    r.EmplCreate,
                    r.DateCreate,
                    r.EmplChange,
                    r.DateChange,
                    r.EmplDel,
                    r.DelDate
                    ";
        $from = "\nFrom Results r";
        $Where = "\nWhere r.DelDate is null";
        
        $this->Query->setSelect($select);
        $this->Query->setFrom($from);
        $this->Query->setWhere($Where);      

        
        // Инициализация первичного ключа
        $this->KeyFiled = 'r.Result_Id';
        $this->PrimaryKey = 'Result_Id';


    }
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'Results';
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
			array('ResultName', 'length', 'max'=>50),
			array('Lock, DateLock, DateChange, DelDate', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('Result_Id, ResultName, Lock, EmplLock, DateLock, EmplCreate, DateCreate, EmplChange, DateChange, EmplDel, DelDate', 'safe'),
		);
	}
	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'Result_Id' => 'Results',
			'ResultName' => 'Results Name',
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

	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

}
