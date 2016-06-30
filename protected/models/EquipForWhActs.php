<?php

class EquipForWhActs extends MainFormModel
{
    public $Equip_id;
    public $EquipName;
    public $NameUnitMeasurement;
    public $discontinued;
    
    public function rules()
    {
        return array(
            array('Equip_id,'
                . ' EquipName,'
                . ' NameUnitMeasurement,'
                . ' discontinued,', 'safe'),
            );
    }
    
    public function __construct($scenario = '') {
	
        parent::__construct($scenario);

        $this->SP_INSERT_NAME = '';
        $this->SP_UPDATE_NAME = '';
        $this->SP_DELETE_NAME = '';

        $Select = " Select "
                . "     e.Equip_id,
                        e.EquipName,
                        m.NameUnitMeasurement,
                        e.discontinued";
        $From = "\nFrom Equips e left join UnitMeasurement m on (e.UnitMeasurement_id = m.UnitMeasurement_id)
                    left join Categories c on (e.ctgr_id = c.ctgr_id)";
        $Where = "\nWhere (e.DelDate is null)
                        and ((c.ForTreb = 1) or (c.ForObject = 1) or (e.ctgr_id is Null))";
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
            'discontinued' => 'discontinued',
        );
    }
}

