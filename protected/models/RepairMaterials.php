<?php


class RepairMaterials extends MainFormModel
{
    public $RepairMaterial_id;
    public $Repr_id;
    public $Eqip_id;
    public $EquipName;
    public $UmName;
    public $Quant;
    public $Used;
    public $PriceLow;
    public $SumPriceLow;
    public $PriceHeight;
    public $EmplCreate;
    public $DateCreate;
    public $EmplChange;
    public $DateChange;
    
    public function rules() {
        return array(
                array('RepairMaterial_id,
                        Repr_id,
                        Eqip_id,
                        EquipName,
                        UmName,
                        Quant,
                        Used,
                        PriceLow,
                        PriceHeight,
                        EmplCreate,
                        DateCreate,
                        EmplChange,
                        DateChange', 'safe'),
        );
    }
    
    function __construct($scenario='') {
        parent::__construct($scenario);

        $this->SP_INSERT_NAME = 'INSERT_RepairMaterials';
        $this->SP_UPDATE_NAME = 'UPDATE_RepairMaterials';
        $this->SP_DELETE_NAME = 'DELETE_RepairMaterials';

        $Select = "\nSelect
                        rm.RepairMaterial_id,
                        rm.Repr_id,
                        rm.Eqip_id,
                        rm.EquipName,
                        rm.UmName,
                        rm.Quant,
                        rm.Used,
                        rm.PriceLow,
                        rm.PriceLow*rm.Quant as SumPriceLow,
                        rm.PriceHeight,
                        rm.EmplCreate,
                        rm.DateCreate,
                        rm.EmplChange,
                        rm.DateChange";
        $From = "\nFrom RepairMaterials_v rm";
        $Order = "\nOrder by rm.RepairMaterial_id";

        $this->Query->setSelect($Select);
        $this->Query->setFrom($From);
        $this->Query->setOrder($Order);

        $this->KeyFiled = 'rm.RepairMaterial_id';
        $this->PrimaryKey = 'RepairMaterial_id';
    }
    
    public function attributeLabels(){
        return array(
            'RepairMaterial_id' => 'RepairMaterial_id',
            'Repr_id' => 'Repr_id',
            'Eqip_id' => 'Eqip_id',
            'EquipName' => 'EquipName',
            'UmName' => 'UmName',
            'Quant' => 'Quant',
            'Used' => 'Used',
            'PriceLow' => 'PriceLow',
            'SumPriceLow' => 'SumPriceLow',
            'PriceHeight' => 'PriceHeight',
            'EmplCreate' => 'EmplCreate',
            'DateCreate' => 'DateCreate',
            'EmplChange' => 'EmplChange',
            'DateChange' => 'DateChange',
        );
    }

}
