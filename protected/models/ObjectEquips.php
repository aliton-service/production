<?php

class ObjectEquips extends MainFormModel
{
    public $Code;
    public $Object_Id;
    public $ObjectGr_id;
    public $Equip_id;
    public $EquipName;
    public $EquipQuant;
    public $Note;
    public $StockNumber;
    public $DateInstall;
    public $DateService;
    public $Status;
    public $Condition;
    public $flag;
    public $Location;
    public $EmplCreate;
    public $DateCreate;
    public $EmplChange;
    public $DateChange;
    
    public function rules() {
        return array(
            /* обязательные поля*/
            array('Equip_id', 'required'),
            array('Code,'
                . 'Object_Id,'
                . 'ObjectGr_id,'
                . 'EquipName,'
                . 'EquipQuant,'
                . 'Note,'
                . 'ObjectGr_id,'
                . 'StockNumber,'
                . 'DateInstall,'
                . 'DateService,'
                . 'Status,'
                . 'Condition,'
                . 'flag,'
                . 'Location,', 'safe'),
        );
    }
    
    public function __construct($scenario = '') {
        parent::__construct($scenario);
        
        $this->SP_INSERT_NAME = 'INSERT_ObjectsEquip';
        $this->SP_UPDATE_NAME = 'UPDATE_OBJEQUIP';
        $this->SP_DELETE_NAME = 'DELETE_ObjectsEquip';
        
        $Select =   "Select"
                    ."  oeq.Code,"
                    ."  oeq.Object_Id,"
                    ."  oeq.Equip_id,"
                    ."  eq.EquipName,"
                    ."  oeq.EquipQuant,"
                    ."  oeq.Note,"
                    ."  o.ObjectGr_id,"
                    ."  oeq.StockNumber,"
                    ."  oeq.DateInstall,"
                    ."  oeq.DateService,"
                    ."  eq.Status,"
                    ."  o.Condition,"
                    ."  oeq.flag,"
                    ."  oeq.Location,"
                    ."  oeq.EmplCreate,"
                    ."  oeq.DateCreate,"
                    ."  oeq.EmplChange,"
                    ."  oeq.DateChange";
        $From =     "\nFrom Objects o inner join ObjectsEquip oeq on (o.Object_id = oeq.Object_id)"
                    ."  left outer join Equips_ForObj_v eq on (oeq.Equip_id = eq.Equip_id)";
        $Where =    "\nWhere oeq.DelDate is Null";
        $Order =    "\nOrder by oeq.Code";
                
        $this->Query->setSelect($Select);
        $this->Query->setFrom($From);
        $this->Query->setWhere($Where);
        $this->Query->setOrder($Order);
        
        $this->KeyFiled = 'oeq.Code';
    }
    
    public function attributeLabels()
    {
            return array(
                    'Code' => 'Code',
                    'Object_Id' => 'Object_Id',
                    'Equip_id' => 'Оборудование',
                    'EquipName' => 'Оборудование',
                    'EquipQuant' => 'Кол-во',
                    'Note' => 'Примечание',
                    'ObjectGr_id' => 'ObjectGr_id',
                    'StockNumber' => 'Описание',
                    'DateInstall' => 'Дата установки',
                    'DateService' => 'Дата постановки на обслуживание',
                    'Status' => 'Status',
                    'Location' => 'Месторасположение',
                );
    }
    
    
}

