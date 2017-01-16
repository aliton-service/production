<?php

class WHControls_v extends MainFormModel
{
    public $id;
    public $docm_id;
    public $dctp_id;
    public $DocTypeName;
    public $Employee_id;
    public $MasterName;
    public $Equip_id;
    public $EquipName;
    public $NameUnitMeasurement;
    public $docm_quant;
    public $fact_quant;
    public $Quant;
    public $direct;
    public $Price;
    public $SumPrice;
    public $number;
    public $Addr;

    function __construct() {
        parent::__construct();
        
        $q = new SQlQuery();
        $q->text = "select dbo.get_price_list(getdate()) as prlt_id";
        $row = $q->QueryRow();
        
        $Select = "\nSelect
                        d.id,
                        d.docm_id,
                        d.dctp_id,
                        d.DocTypeName,
                        d.Employee_id,
                        d.MasterName,
                        d.Equip_id,
                        d.EquipName,
                        d.NameUnitMeasurement,
                        d.docm_quant,
                        d.fact_quant,
                        d.Quant,
                        d.direct,
                        d.number,
                        d.Addr,
                        p.price_low as Price,
                        d.direct*d.Quant*p.Price_low SumPrice";
        $From = "\nFrom WHControls_v d  left join PriceListDetails_v p on (d.Equip_id = p.eqip_id and p.prlt_id = " . $row['prlt_id'] . " )";
        $Order = "\nOrder by d.EquipName, d.Equip_id, d.docm_id";
        
        $this->Query->setSelect($Select);
        $this->Query->setFrom($From);
        $this->Query->setOrder($Order);
    }

    public function rules()
    {
        return array(
                array('id,
                        docm_id,
                        dctp_id,
                        DocTypeName,
                        Employee_id,
                        MasterName,
                        Equip_id,
                        EquipName,
                        NameUnitMeasurement,
                        docm_quant,
                        fact_quant,
                        Quant,
                        direct,
                        Addr,
                        number,
                        Price,
                        SumPrice', 'safe'),
        );
    }
    
    public function attributeLabels()
    {
        return array(
            'id' => '',
            'docm_id' => '',
            'dctp_id' => '',
            'DocTypeName' => '',
            'Employee_id' => '',
            'MasterName' => '',
            'Equip_id' => '',
            'EquipName' => '',
            'NameUnitMeasurement' => '',
            'docm_quant' => '',
            'fact_quant' => '',
            'Quant' => '',
            'direct' => '',
            'Addr' => '',
            'number' => '',
            'Price' => '',
            'SumPrice' => '',
        );
    }


}


