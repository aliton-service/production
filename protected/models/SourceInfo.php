<?php

/**
 * This is the model class for table "SourceInfo".
 *
 * The followings are the available columns in table 'SourceInfo':
 * @property integer $SourceInfo_id
 * @property string $SourceInfo_name
 * @property boolean $Lock
 * @property integer $EmplLock
 * @property string $DateLock
 * @property integer $EmplChange
 * @property string $DateChange
 * @property integer $EmplDel
 * @property string $DelDate
 */
class SourceInfo extends MainFormModel
{
    public $SourceInfo_id;
    public $SourceInfo_name;
    public $Lock;
    public $EmplLock;
    public $DateLock;
    public $EmplChange;
    public $DateChange;
    public $EmplDel;
    public $DelDate;
    
    function __construct($scenario = '') {

        parent::__construct($scenario);

        $this->SP_INSERT_NAME = 'INSERT_SourceInfo';
        $this->SP_UPDATE_NAME = 'UPDATE_SourceInfo';
        $this->SP_DELETE_NAME = 'DELETE_SourceInfo';

        $select = "Select 
                    si.SourceInfo_id,
                    si.SourceInfo_name,
                    si.Lock,
                    si.EmplLock,
                    si.DateLock,
                    si.EmplChange,
                    si.DateChange,
                    si.EmplDel,
                    si.DelDate
                    ";
        $from = "\nFrom SourceInfo si";
        $Where = "\nWhere si.DelDate is null";
        
        $this->Query->setSelect($select);
        $this->Query->setFrom($from);
        $this->Query->setWhere($Where);      

        
        // Инициализация первичного ключа
        $this->KeyFiled = 'si.SourceInfo_id';
        $this->PrimaryKey = 'SourceInfo_id';


    }
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'SourceInfo';
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
			array('SourceInfo_name', 'length', 'max'=>50),
			array('Lock, DateLock, DateChange, DelDate', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('SourceInfo_id, SourceInfo_name, Lock, EmplLock, DateLock, EmplChange, DateChange, EmplDel, DelDate', 'safe'),
		);
	}
	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'SourceInfo_id' => 'SourceInfo',
			'SourceInfo_name' => 'SourceInfo Name',
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
