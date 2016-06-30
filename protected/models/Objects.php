<?php

class Objects extends MainFormModel
{
    public $Object_id;
    public $ObjectGr_id;
    public $Address_id;
    public $Doorway;
    public $ObjectType;
    public $ObjectTypeName;
    public $Note;
    public $Complexity_id;
    public $ComplexityName;
    public $Condition;
    public $Code;
    public $MasterKey;
    public $Signal;
    public $Cntp_id;
    public $ConnectionType;
    public $EmplCreate;
    public $DateCreate;
    public $EmplChange;
    public $DateChange;
    
    public function rules() {
        return array(
            /* обязательные поля*/
            array('ObjectGr_id, Doorway', 'required'),
            array('Object_id,'
                . 'Address_id,'
                . 'ObjectType,'
                . 'ObjectTypeName,'
                . 'Note,'
                . 'Complexity_id,'
                . 'ComplexityName,'
                . 'Condition,'
                . 'Code,'
                . 'MasterKey,'
                . 'Signal,'
                . 'Cntp_id,'
                . 'ConnectionType,'
                . 'EmplCreate,'
                . 'DateCreate,'
                . 'EmplChange,'
                . 'DateChange', 'safe'),
        );
    }
    
    public function __construct($scenario = '') {
        
        parent::__construct($scenario);
        
        $this->SP_INSERT_NAME = 'INSERT_Objects';
        $this->SP_UPDATE_NAME = 'UPDATE_Objects';
        $this->SP_DELETE_NAME = 'DELETE_Objects';
        
        $Select =   "Select o.Object_id,"
                    ."   o.ObjectGr_id,"
                    ."  o.Address_id,"
                    ."  o.Doorway,"
                    ."  o.ObjectType,"
                    ."  ot.ObjectType ObjectTypeName,"
                    ."  o.Note,"
                    ."  o.Complexity_id,"
                    ."  c.ComplexityName,"
                    ."  o.Condition,"
                    ."  o.Code,"
                    ."  o.MasterKey,"
                    ."  o.Signal,"
                    ."  o.Cntp_id,"
                    ."  ct.ConnectionType,"
                    ."  o.EmplCreate,"
                    ."  o.DateCreate,"
                    ."  o.EmplChange,"
                    ."  o.DateChange";
        $From =     "\nFrom Objects o left outer join ObjectTypes ot on (o.ObjectType = ot.ObjectType_id)"
                    ."  left outer join ComplexityTypes c on (o.Complexity_id = c.Complexity_id)"
                    ."  left join ConnectionTypes ct on (o.Cntp_id = ct.ConnectionType_id)";
        $Where =    "\nWhere o.DelDate is Null";
        
        $this->Query->setSelect($Select);
        $this->Query->setFrom($From);
        $this->Query->setWhere($Where);
        $this->KeyFiled = 'o.Object_id';
    }
    
    public function attributeLabels()
    {
            return array(
                    'Object_id' => 'Object_id',
                    'Address_id' => 'Адрес',
                    'Doorway' => 'Подъезд',
                    'ObjectType' => 'Число квартир',
                    'ObjectTypeName' => 'Число квартир',
                    'Complexity_id' => 'Тип',
                    'ComplexityName' => 'Тип',
                    'Condition' => 'Особыу условия',
                    'Note' => 'Примечание',
                    'Code' => 'Код',
                    'MasterKey' => 'Мастер ключ',
                    'Signal' => 'Сигнал ОДС',
                    'Cntp_id' => 'Тип связи',
                    'ConnectionType' => 'Тип связи',
                    'EmplCreate' => 'Тип связи',
                    'DateCreate' => 'Тип связи',
                    'EmplChange' => 'Тип связи',
                    'DateChange' => 'Тип связи',
                );
    }
}

