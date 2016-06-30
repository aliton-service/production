<?php

/**
 * This is the model class for table "DemandResults".
 *
 * The followings are the available columns in table 'DemandResults':
 * @property integer $Result_id
 * @property string $ResultName
 */
class DemandResults extends MainFormModel
{
    public $Result_id;
    public $ResultName;
    public $Lock;
    public $EmplLock;
    public $DateLock;
    public $EmplCreate;
    public $DateCreate;
    public $EmplChange;
    public $DateChange;
    public $DelDate;
    public $EmplDel;
                
    public function rules()
    {
        return array(
            array('Result_id,
                    ResultName,
                    Lock,
                    EmplLock,
                    DateLock,
                    EmplCreate,
                    DateCreate,
                    EmplChange,
                    DateChange,
                    DelDate,
                    EmplDel', 'safe'),
            );
    }
    
    function __construct($scenario = '') {

        parent::__construct($scenario);

        $this->SP_INSERT_NAME = '';
        $this->SP_UPDATE_NAME = '';
        $this->SP_DELETE_NAME = '';

        $Select = "Select
                        dr.Result_id,
                        dr.ResultName,
                        dr.Lock,
                        dr.EmplLock,
                        dr.DateLock,
                        dr.EmplCreate,
                        dr.DateCreate,
                        dr.EmplChange,
                        dr.DateChange,
                        dr.DelDate,
                        dr.EmplDel";
        $From = "\nFrom DemandResults dr";
        $Where = "\nWhere dr.DelDate is null";
        $Order = "\nOrder by dr.ResultName";
        
        $this->Query->setSelect($Select);
        $this->Query->setFrom($From);
        $this->Query->setWhere($Where);
        $this->Query->setOrder($Order);
        
        // Инициализация первичного ключа
        $this->KeyFiled = 'dr.Result_id';
        $this->PrimaryKey = 'Result_id';
    }
    
    public function attributeLabels()
    {
            return array(
                    'Result_id' => 'Result',
                    'ResultName' => 'Result Name',
            );
    }
}
