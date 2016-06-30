<?php

class EquipsListAll extends MainFormModel
{
    public $Equip_id;
    public $EquipName;
    
    public function rules() {
        return array(
            array('Equip_id,'
                . 'EquipName,', 'safe'),
        );
    }
    
    public function __construct($scenario = '') {
        
        parent::__construct($scenario);
        
        $this->SP_INSERT_NAME = 'INSERT_Equips';
        $this->SP_UPDATE_NAME = 'UPDATE_Equips';
        $this->SP_DELETE_NAME = 'DELETE_Equips';
        
        $Select =   "Select
                        e.Equip_id,
                        e.EquipName";
        $From =     "\nFrom Equips e";
        $Where =    "\nWhere e.DelDate is null";
        $Order =    "\nOrder by e.EquipName";
        
        $this->Query->setSelect($Select);
        $this->Query->setFrom($From);
        $this->Query->setWhere($Where);
        $this->Query->setOrder($Order);
        
        $this->KeyFiled = 'e.Equip_id';
    }
    
    public function attributeLabels()
    {
            return array(
                'Equip_id' => 'Оборудование',
                'EquipName' => 'Наименование оборудования',
            );
    }
}

