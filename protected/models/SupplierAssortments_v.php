<?php

class SupplierAssortments_v extends MainFormModel
{
    public $Supplier_id = null;
    public $Equip_id = null;
    public $EquipName = null;
    
    function __construct($scenario = '') {

        parent::__construct($scenario);

        $this->SP_INSERT_NAME = '';
        $this->SP_UPDATE_NAME = '';
        $this->SP_DELETE_NAME = '';

        $Select = "\nSelect
                        sa.Supplier_id,
                        sa.Equip_id,
                        sa.EquipName";
        $From = "\nFrom SupplierAssortments_v sa";
        $Order = "\nOrder by sa.EquipName";

        $this->Query->setSelect($Select);
        $this->Query->setFrom($From);
        $this->Query->setOrder($Order);

        $this->KeyFiled = 'sa.Supplier_id';
        $this->PrimaryKey = 'Supplier_id';
    }
    
}

