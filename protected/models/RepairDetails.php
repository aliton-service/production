<?php


class RepairDetails extends MainFormModel
{
    public $rpdt_id;
    public $repr_id;
    public $eqip_id;
    public $EquipName;
    public $um_name;
    public $docm_quant;
    public $fact_quant;
    public $summa;

    function __construct() {
        parent::__construct();
        
        $this->SP_INSERT_NAME = 'INSERT_RepairDetails';
        $this->SP_UPDATE_NAME = 'UPDATE_RepairDetails';
        $this->SP_DELETE_NAME = 'DELETE_RepairDetails';
        
        $Select = "\ndeclare @prlt_id int = dbo.get_price_list(getdate())
            \nSelect
                        dt.rpdt_id,
                        dt.repr_id,
                        dt.eqip_id,
                        e.EquipName,
                        m.NameUnitMeasurement um_name,
                        dt.docm_quant,
                        dt.fact_quant,
                        dt.docm_quant*p.price_low as summa";
        $From = "\nFrom RepairDetails dt inner join Equips e on (dt.Eqip_id = e.Equip_id)
            left join UnitMeasurement m on (e.UnitMeasurement_id = m.UnitMeasurement_id)
            left join PriceListDetails_v p on (p.prlt_id = @prlt_id and p.eqip_id = dt.eqip_id)";
        $Where = "\nWhere dt.DelDate is null ";
        $Order = "\nOrder by e.EquipName ";

        $this->Query->setSelect($Select);
        $this->Query->setFrom($From);
        $this->Query->setOrder($Order);
        $this->Query->setWhere($Where);
        
        $this->KeyFiled = 'dt.rpdt_id';
        $this->PrimaryKey = 'rpdt_id';
    }
	
    public function rules()
    {
        return array(
            array('rpdt_id,
                    repr_id,
                    eqip_id,
                    EquipName,
                    um_name,
                    docm_quant,
                    fact_quant,
                    summa', 'safe'),
        );
    }

    public function attributeLabels()
    {
        return array(
            'rpdt_id' => '',
            'repr_id' => '',
            'eqip_id' => '',
            'EquipName' => '',
            'um_name' => '',
            'docm_quant' => '',
            'fact_quant' => '',
            'summa' => '',
        );
    }
}
