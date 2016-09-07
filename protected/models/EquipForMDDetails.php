<?php

class EquipForMDDetails extends MainFormModel
{
    public $Equip_id;
    public $EquipName;
    public $NameUnitMeasurement;
    public $price_high;
    
    public function rules()
    {
        return array(
            array('Equip_id,'
                . ' EquipName,'
                . ' NameUnitMeasurement,'
                . ' price_high,', 'safe'),
            );
    }
    
    public function __construct($scenario = '') {
	
        parent::__construct($scenario);

        $this->SP_INSERT_NAME = '';
        $this->SP_UPDATE_NAME = '';
        $this->SP_DELETE_NAME = '';

        $Select = "\nSelect
            e.Equip_id,
            e.EquipName,
            p.price_high,
            u.NameUnitMeasurement
        ";
        $From = "\nFrom Equips e 
            left join PriceListDetails_v p on (p.Eqip_id = e.Equip_id)
            left join UnitMeasurement u on (e.UnitMeasurement_id = u.UnitMeasurement_id)
            left join Categories c on (e.ctgr_id = c.ctgr_id)
        ";
        $Where = "\nWhere e.DelDate is Null and c.ForTreb = 1";
        $Order = "\nOrder by e.EquipName";

        $this->Query->setSelect($Select);
        $this->Query->setFrom($From);
        $this->Query->setWhere($Where);
        $this->Query->setOrder($Order);

        // Инициализация первичного ключа
        $this->KeyFiled = 'e.Equip_id';
        $this->PrimaryKey = 'Equip_id';
    }
    
    public function attributeLabels()
    {
        return array(
            'Equip_id' => 'Equip_id',
            'EquipName' => 'EquipName',
            'NameUnitMeasurement' => 'NameUnitMeasurement',
            'price_high' => 'price_high',
        );
    }
}

