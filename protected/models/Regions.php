<?php

/**
 * This is the model class for table "Regions".
 *
 * The followings are the available columns in table 'Regions':
 * @property integer $Region_id
 * @property string $RegionName
 * @property integer $Sort
 * @property boolean $Lock
 * @property integer $EmplLock
 * @property string $DateLock
 * @property integer $EmplDel
 * @property string $DateChange
 * @property integer $EmplChange
 * @property string $DelDate
 *
 * The followings are the available model relations:
 * @property Regions $region
 * @property Regions $regions
 */
class Regions extends MainFormModel
{
    public $Region_id;
    public $Sort;
    public $RegionName;
    public $Lock;
    public $EmplLock;
    public $DateLock;
    public $EmplDel;
    public $DateChange;
    public $EmplChange;
    public $EmplCreate;
    public $DelDate;
            
    
    public function rules()
    {
            // NOTE: you should only define rules for those attributes that
            // will receive user inputs.
            return array(
                    array('Sort, RegionName', 'required'),
                    array('Sort', 'SortValidate'),
                    array('Sort, EmplLock, EmplDel, EmplChange', 'numerical', 'integerOnly'=>true),
                    array('RegionName', 'length', 'max'=>50),
                    array('Lock, DateLock, DateChange, DelDate', 'safe'),
                    // The following rule is used by search().
                    // @todo Please remove those attributes that should not be searched.
                    array('Region_id, RegionName, Sort, Lock, EmplLock, DateLock, EmplDel, DateChange, EmplChange, DelDate', 'safe'),
            );
    }

    public function __construct($scenario = '') {
        parent::__construct($scenario);
        
        $Select =   "\nSelect
                        r.Region_id,
                        r.RegionName,
                        r.Sort,
                        r.Lock,
                        r.EmplLock,
                        r.DateLock,
                        r.EmplCreate,
                        r.EmplChange,
                        r.EmplDel,
                        r.DelDate";
        $From =     "\nFrom Regions r";
        $Where =    "\nWhere r.DelDate is null";
        $Order =    "\nOrder by r.RegionName";
        
        $this->Query->setSelect($Select);
        $this->Query->setFrom($From);
        $this->Query->setWhere($Where);
        $this->Query->setOrder($Order);
        $this->KeyFiled = 'r.Region_id';
        
        $this->SP_INSERT_NAME = 'INSERT_Regions';
        $this->SP_UPDATE_NAME = 'UPDATE_Regions';
        $this->SP_DELETE_NAME = 'DELETE_Regions';
    }
    
    public function attributeLabels()
    {
        return array(
                'Region_id' => 'Region',
                'RegionName' => 'Region Name',
                'Sort' => 'Порядок',
                'Lock' => 'Lock',
                'EmplLock' => 'Empl Lock',
                'DateLock' => 'Date Lock',
                'EmplDel' => 'Empl Del',
                'DateChange' => 'Date Change',
                'EmplChange' => 'Empl Change',
                'DelDate' => 'Del Date',
        );
    }
    
    public function SortValidate($attribute, array $params = array()) {
        if (($this->Sort < 0) || ($this->Sort > 10)) {
            $this->addError($attribute, 'Введите в поле "Порядок" значение от 0 до 10');
        }
    }
}
