<?php

class DEquips extends MainFormModel
{
    public $DEquip_id;
    public $DSystem_id;
    public $EquipType_id;
    public $EquipType;
    public $Sort;

    function __construct($scenario = '') {

        parent::__construct($scenario);

        $this->SP_INSERT_NAME = '';
        $this->SP_UPDATE_NAME = '';
        $this->SP_DELETE_NAME = '';

        $Select = "Select
                        d.DEquip_id,
                        d.DSystem_id,
                        d.EquipType_id,
                        isNull(et.EquipType, '(Пусто)') as EquipType,
                        d.Sort";
        $From = "\nFrom DEquips d left join EquipTypes et on (d.EquipType_id = et.EquipType_id)";
        $Order = "\nOrder by d.Sort";

        $this->Query->setSelect($Select);
        $this->Query->setFrom($From);
        $this->Query->setOrder($Order);

        // Инициализация первичного ключа
        $this->KeyFiled = 'd.DEquip_id';
        $this->PrimaryKey = 'DEquip_id';
    }
        
    public function rules()
    {
        return array(
            array('DEquip_id,
                    DSystem_id,
                    EquipType_id,
                    EquipType,
                    Sort,', 'safe'),
        );
    }

    public function attributeLabels()
    {
        return array(
            'DEquip_id' => '',
            'DSystem_id' => '',
            'EquipType_id' => '',
            'EquipType' => '',
            'Sort' => '',
        );
    }
}






