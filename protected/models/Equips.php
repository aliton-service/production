<?php

class Equips extends MainFormModel
{
    public $Equip_id;
    public $group_id;
    public $EquipName;
    public $UnitMeasurement_id;
    public $NameUnitMeasurement;
    public $Supplier_id;
    public $NameSupplier;
    public $Description;
    public $SystemType_id;
    public $SystemTypeName;
    public $actp_id;
    public $actp_name;
    public $ctgr_id;
    public $ctgr_name;
    public $grp_id;
    public $grp_name;
    public $discontinued;
    public $sgrp_id;
    public $sgrp_name;
    public $ServicingTime;
    public $EquipImage;
    public $full_group_name;
    public $must_instruction;
    public $there_instruction;
    public $must_photo;
    public $there_photo;
    public $must_analog;
    public $there_analog;
    public $must_producer;
    public $there_producer;
    public $must_supplier;
    public $there_supplier;
    public $note;
    public $EmplChangeInventory;
    public $DateChangeInventory;
    public $AddressedStorage;
    public $Replacement;
    public $Analogs;
    public $Sets;
    public $EmplChange;

    public $KeyFiled = 'e.Equip_id';
    public $PrimaryKey = 'Equip_id';

    public $SP_INSERT_NAME = 'INSERT_EQUIPS';
    public $SP_UPDATE_NAME = 'UPDATE_EQUIPS';
    public $SP_DELETE_NAME = 'DELETE_EQUIPS';

    function __construct($scenario='') {
        parent::__construct($scenario);

        $Select = "\nSelect
            e.Equip_id,
            e.group_id,
            e.EquipName,
            e.UnitMeasurement_id,
            m.NameUnitMeasurement,
            e.Supplier_id,
            s.NameSupplier,
            e.Description,
            e.SystemType_id,
            st.SystemTypeName,
            e.actp_id,
            at.name actp_name,
            e.ctgr_id,
            c.name ctgr_name,
            e.grp_id,
            g.name grp_name,
            e.discontinued,
            e.sgrp_id,
            sg.name sgrp_name,
            e.ServicingTime,
            e.EquipImage,
            eg.full_group_name,
            e.must_instruction,
            e.there_instruction,
            e.must_photo,
            e.there_photo,
            e.must_analog,
            e.there_analog,
            e.must_producer,
            e.there_producer,
            e.must_supplier,
            e.there_supplier,
            e.note,
            e.EmplChangeInventory,
            e.DateChangeInventory,
            e.AddressedStorage,
            '' as Replacement,
            '' as Analogs,
            '' as [Sets]";
        $From = "\nFrom Equips e left join UnitMeasurement m on (e.UnitMeasurement_id = m.UnitMeasurement_id)
                left join Suppliers s on (e.Supplier_id = s.Supplier_id)
                left join AccountingTypes at on (e.actp_id = at.actp_id)
                left join Categories c on (e.ctgr_id = c.ctgr_id)
                left join EquipGroups g on (e.grp_id = g.grp_id)
                left join EquipSubgroups sg on (e.sgrp_id = sg.sgrp_id)
                left join SystemTypes st on (e.SystemType_id = st.SystemType_id)
                left join EqipGroups eg on (e.group_id = eg.group_id)";

        $Where = "\nWhere e.DelDate is Null";
        $Order = "\nOrder by e.EquipName";

        $this->Query->setSelect($Select);
        $this->Query->setFrom($From);
        $this->Query->setOrder($Order);
        $this->Query->setWhere($Where);
    }

    public function rules()
    {
        return array(
            array('EquipName', 'required'),
            array('Equip_id,
                    group_id,
                    EquipName,
                    UnitMeasurement_id,
                    NameUnitMeasurement,
                    Supplier_id,
                    NameSupplier,
                    Description,
                    SystemType_id,
                    SystemTypeName,
                    actp_id,
                    actp_name,
                    ctgr_id,
                    ctgr_name,
                    grp_id,
                    grp_name,
                    discontinued,
                    sgrp_id,
                    sgrp_name,
                    ServicingTime,
                    EquipImage,
                    full_group_name,
                    must_instruction,
                    there_instruction,
                    must_photo,
                    there_photo,
                    must_analog,
                    there_analog,
                    must_producer,
                    there_producer,
                    must_supplier,
                    there_supplier,
                    note,
                    EmplChangeInventory,
                    DateChangeInventory,
                    AddressStorage,
                    Replacement,
                    Analogs,
                    Sets,', 'safe'),
        );
    }
    
    public function attributeLabels()
    {
        return array(
            'Equip_id' => 'Equip',
            'EquipName' => 'Оборудование',
            'UnitMeasurement_Id' => 'Ед. изм.',
            'Supplier_id' => 'Производитель',
            'Description' => 'Описание',
            'GroupGood_Id' => 'Group Good',
            'SubGroupGood_Id' => 'Sub Group Good',
            'CategoryGood_Id' => 'Category Good',
            'EquipImage' => 'Equip Image',
            'actp_id' => 'Тип учета',
            'ctgr_id' => 'Категория',
            'grp_id' => 'Группа',
            'sgrp_id' => 'Подгруппа',
            'discontinued' => 'Снят с производства',
            'SystemType_id' => 'Тип системы',
            'ServicingTime' => 'Время ТО',
            'AddressSystem_id' => 'Address System',
            'rate' => 'Rate',
            'must_instruction' => 'Нужна',
            'there_instruction' => 'Есть',
            'must_photo' => 'Нужна',
            'there_photo' => 'Есть',
            'must_analog' => 'Нужна',
            'there_analog' => 'Есть',
            'must_producer' => 'Нужна',
            'there_producer' => 'Есть',
            'must_supplier' => 'Нужна',
            'there_supplier' => 'Есть',
            'note' => 'Краткие технические характеристики',
            'group_id' => 'Ветка',
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

    public function attributeFilters()
    {
        return array(
            'full_group_name' => 'eg.code',
        );
    }
        
        
}
