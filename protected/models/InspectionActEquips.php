<?php

class InspectionActEquips extends MainFormModel
{
    public $ActEquip_id;
    public $Inspection_id;
    public $Equip_id;
    public $EquipName;
    public $Quant;
    public $UmName;
    public $Characteristics;
    public $Object_id;
    public $Doorway;
    public $OtherEquip;
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
                        case when a.Equip_id is null then a.OtherEquip else e.EquipName end EquipName,
                        a.Quant,
                        a.Object_id,
                        o.Doorway,
                        u.NameUnitMeasurement as UmName,
                        (SELECT CASE WHEN MIN(c.CharacteristicName) IS NULL THEN '()' ELSE '(' + MIN(c.CharacteristicName) + ', ...)' END AS Expr1
                               FROM            dbo.InspActEquipCharacteristics AS c
                               WHERE        (a.ActEquip_id = c.ActEquip_id) AND (c.DelDate IS NULL)) AS Characteristics,
                        a.DateCreate,
                        a.EmplCreate,
                        a.DateChange,
                        a.EmplChange,
                        a.OtherEquip";
        $From = "\nFrom InspectionActEquips a left join Equips e on (a.Equip_id = e.Equip_id)
                        left join UnitMeasurement u on (e.UnitMeasurement_Id = u.UnitMeasurement_Id)
                        left join Objects o on (a.Object_id = o.Object_id)";
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
            array('Inspection_id, Quant, Object_id', 'required'),
            array('ActEquip_id,
                    Inspection_id,
                    Equip_id,
                    EquipName,
                    Quant,
                    UmName,
                    OtherEquip,
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
            'Object_id' => '',
            'Inspection_id' => '',
            'Equip_id' => '',
            'EquipName' => '',
            'Quant' => '',
            'UmName' => '',
            'DateCreate' => '',
            'EmplCreate' => '',
            'DateChange' => '',
            'EmplChange' => '',
            'OtherEquip' => 'OtherEquip',
        );
    }
}




