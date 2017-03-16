<?php

class InspectionActEquips extends MainFormModel
{
    public $ActEquip_id;
    public $Inspection_id;
    public $Equip_id;
    public $EquipName;
    public $Quant;
    public $UmName;
    public $DateCreate;
    public $EmplCreate;
    public $DateChange;
    public $EmplChange;
            
    function __construct($scenario = '') {
        parent::__construct($scenario);

        $this->SP_INSERT_NAME = 'INSERT_InspectionActEquips';
        $this->SP_UPDATE_NAME = 'UPDATE_InspectionActEquips';
        $this->SP_DELETE_NAME = 'DELETE_InspectionActEquips';

        $Select = "\nSelect
                        a.ActEquip_id,
                        a.Inspection_id,
                        a.Equip_id,
                        e.EquipName,
                        a.Quant,
                        u.NameUnitMeasurement as UmName,
                        a.DateCreate,
                        a.EmplCreate,
                        a.DateChange,
                        a.EmplChange";
        $From = "\nFrom InspectionActEquips a left join Equips e on (a.Equip_id = e.Equip_id)
                        left join UnitMeasurement u on (e.UnitMeasurement_Id = u.UnitMeasurement_Id)";
        $Where = "\nWhere a.DelDate is Null";
        $this->Query->setSelect($Select);
        $this->Query->setFrom($From);
        $this->Query->setWhere($Where);
        
        $this->KeyFiled = 'a.ActEquip_id';
        $this->PrimaryKey = 'ActEquip_id';
    }
    
    public function rules()
    {
        return array(
            array('Inspection_id, Equip_id, Quant', 'required'),
            array('ActEquip_id,
                    Inspection_id,
                    Equip_id,
                    EquipName,
                    Quant,
                    UmName,
                    DateCreate,
                    EmplCreate,
                    DateChange,
                    EmplChange,', 'safe'),
        );
    }
    
    public function attributeLabels()
    {
        return array(
            'ActEquip_id' => '',
            'Inspection_id' => '',
            'Equip_id' => '',
            'EquipName' => '',
            'Quant' => '',
            'UmName' => '',
            'DateCreate' => '',
            'EmplCreate' => '',
            'DateChange' => '',
            'EmplChange' => '',
        );
    }
}




