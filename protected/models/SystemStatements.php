<?php

/**
 * This is the model class for table "SystemStatements".
 *
 * The followings are the available columns in table 'SystemStatements':
 * @property integer $SystemStatements_id
 * @property string $SystemStatementsName
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
 * @property SystemStatements $systemStatements
 */
class SystemStatements extends MainFormModel
{
    public $SystemStatements_id;
    public $SystemStatementsName;
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
                array('Coefficient, SystemStatementsName', 'fieldValidate'),
                array('Coefficient, SystemStatementsName', 'required'),
                array('SystemStatements_id, SystemStatementsName, Coefficient, Lock, EmplLock, DateLock, EmplDel, DateChange, EmplChange, DelDate', 'safe'),
            );
    }

    public function __construct($scenario = '') {
        parent::__construct($scenario);
        
        $Select =   "\nSelect
                        r.SystemStatements_id,
                        r.SystemStatementsName,
                        r.Coefficient,
                        r.Lock,
                        r.EmplLock,
                        r.DateLock,
                        r.EmplCreate,
                        r.EmplChange,
                        r.EmplDel,
                        r.DelDate,
                        r.DateChange";
        $From =     "\nFrom SystemStatements r";
        $Where =    "\nWhere r.DelDate is null";
        $Order =    "\nOrder by r.SystemStatementsName";
        
        $this->Query->setSelect($Select);
        $this->Query->setFrom($From);
        $this->Query->setWhere($Where);
        $this->Query->setOrder($Order);
        $this->KeyFiled = 'r.SystemStatements_id';
        
        $this->SP_INSERT_NAME = 'INSERT_SystemStatements';
        $this->SP_UPDATE_NAME = 'UPDATE_SystemStatements';
        $this->SP_DELETE_NAME = 'DELETE_SystemStatements';
    }
    
    public function attributeLabels()
    {
        return array(
                'SystemStatements_id' => 'SystemStatements',
                'SystemStatementsName' => 'SystemStatements Name',
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
        if (($this->SystemStatementsName === '') || ($this->Coefficient == 0)) {
            $this->addError($attribute, 'Заполните все поля.');
        }
    }
}
