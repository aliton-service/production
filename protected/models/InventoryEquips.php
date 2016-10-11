<?php

class InventoryEquips extends MainFormModel
{
    public $Equip_id;
    public $EquipName;
    public $Storage_id;
    public $Storage;
    public $quant;
    public $quant_used;
    
    function __construct($scenario = '') {
        parent::__construct($scenario);

        $this->SP_INSERT_NAME = '';
        $this->SP_UPDATE_NAME = '';
        $this->SP_DELETE_NAME = '';

        $Select = "\nSelect
                        e.Equip_id,
                        e.EquipName,
                        s.Storage_id,
                        s.Storage,
                        dbo.get_wh_inventory(e.Equip_id, GETDATE(), 0, s.storage_id) as quant,
                        dbo.get_wh_inventory(e.Equip_id, GETDATE(), 1, s.storage_id) as quant_used";
        $From = "\nFrom Equips e, Storages s";
        
        $this->Query->setSelect($Select);
        $this->Query->setFrom($From);
        
        $this->KeyFiled = 'e.Equip_id';
        $this->PrimaryKey = 'Equip_id';
    }
    
    public function rules()
    {
        return array(
            array(),
        );
    }
    
    public function attributeLabels()
    {
        return array(
            
        );
    }
}





