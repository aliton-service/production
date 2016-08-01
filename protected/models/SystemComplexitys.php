<?php

/**
 * This is the model class for table "SystemComplexitys".
 *
 * The followings are the available columns in table 'SystemComplexitys':
 * @property integer $SystemComplexitys_id
 * @property string $SystemComplexitysName
 * @property integer $Coefficient
 * @property boolean $Lock
 * @property integer $EmplLock
 * @property string $DateLock
 * @property integer $EmplDel
 * @property string $DateChange
 * @property integer $EmplChange
 * @property string $DelDate
 *
 * The followings are the available model relations:
 * @property SystemComplexitys $systemComplexitys
 */
class SystemComplexitys extends MainFormModel
{
    public $SystemComplexitys_id;
    public $SystemComplexitysName;
    public $Coefficient;
    public $Lock;
    public $EmplLock;
    public $DateLock;
    public $EmplCreate;
    public $EmplChange;
    public $EmplDel;
    public $DelDate;
    public $DateChange;
            
    
    public function rules()
    {
            // NOTE: you should only define rules for those attributes that
            // will receive user inputs.
            return array(
                array('Coefficient, SystemComplexitysName', 'fieldValidate'),
                array('Coefficient, SystemComplexitysName', 'required'),
                array('SystemComplexitys_id, SystemComplexitysName, Coefficient, Lock, EmplLock, DateLock, EmplDel, DateChange, EmplChange, DelDate', 'safe'),
            );
    }

    public function __construct($scenario = '') {
        parent::__construct($scenario);
        
        $Select =   "\nSelect
                        r.SystemComplexitys_id,
                        r.SystemComplexitysName,
                        r.Coefficient,
                        r.Lock,
                        r.EmplLock,
                        r.DateLock,
                        r.EmplCreate,
                        r.EmplChange,
                        r.EmplDel,
                        r.DelDate,
                        r.DateChange";
        $From =     "\nFrom SystemComplexitys r";
        $Where =    "\nWhere r.DelDate is null";
        $Order =    "\nOrder by r.SystemComplexitysName";
        
        $this->Query->setSelect($Select);
        $this->Query->setFrom($From);
        $this->Query->setWhere($Where);
        $this->Query->setOrder($Order);
        $this->KeyFiled = 'r.SystemComplexitys_id';
        
        $this->SP_INSERT_NAME = 'INSERT_SystemComplexitys';
        $this->SP_UPDATE_NAME = 'UPDATE_SystemComplexitys';
        $this->SP_DELETE_NAME = 'DELETE_SystemComplexitys';
    }
    
    public function attributeLabels()
    {
        return array(
                'SystemComplexitys_id' => 'SystemComplexitys',
                'SystemComplexitysName' => 'SystemComplexitys Name',
                'Coefficient' => 'Коэффициент',
                'Lock' => 'Lock',
                'EmplLock' => 'Empl Lock',
                'DateLock' => 'Date Lock',
                'EmplCreate' => 'Empl Create',
                'DateChange' => 'Date Change',
                'EmplDel' => 'Empl Del',
                'DelDate' => 'Del Date',
                'DateChange' => 'Date Change',
        );
    }
    
    public function fieldValidate($attribute, array $params = array()) {
        if (($this->SystemComplexitysName === '') || ($this->Coefficient == 0)) {
            $this->addError($attribute, 'Заполните все поля.');
        }
    }
}
