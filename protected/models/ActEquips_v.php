<?php

class ActEquips_v extends MainFormModel
{
    public $treb_id;
    public $number;
    public $date;
    public $acdc_id;
    public $dadt_id;
    public $docm_id;
    public $eqip_id;
    public $EquipName;
    public $NameUnitMeasurement;
    public $docm_quant;
    public $fact_quant;
    public $used;
    public $snf; 
    public $SN;
    public $price;
    public $sum;
    public $ToProduction;
    public $no_price_list;
    public $EmplChange;
    
    public function rules()
    {
        return array(
            array('eqip_id, docm_quant', 'required'),
            array('treb_id,'
                . ' number,'
                . ' date,'
                . ' acdc_id,'
                . ' dadt_id,'
                . ' docm_id,'
                . ' eqip_id,'
                . ' EquipName,'
                . ' NameUnitMeasurement,'
                . ' docm_quant,'
                . ' fact_quant,'
                . ' used,'
                . ' snf,'
                . ' SN,'
                . ' price,'
                . ' sum,'
                . ' ToProduction,'
                . ' no_price_list', 'safe'),
            );
    }
    
    public function __construct($scenario = '') {
	
        parent::__construct($scenario);

        $this->SP_INSERT_NAME = 'INSERT_DocmAchsDetails';
        $this->SP_UPDATE_NAME = 'UPDATE_DocmAchsDetails';
        $this->SP_DELETE_NAME = 'DELETE_DocmAchsDetails';

        $Select = " Select "
                . "     d.treb_id,
                        d.number,
                        d.date,
                        d.acdc_id,
                        d.dadt_id,
                        d.docm_id,
                        d.eqip_id,
                        d.EquipName,
                        d.NameUnitMeasurement,
                        d.docm_quant,
                        isNull(d.fact_quant, d.docm_quant) fact_quant,
                        d.used,
                        isNull(d.acdc_id, d.dadt_id) snf, 
                        (select case when min(s.SN) is null then '()' else min(s.SN) end from SerialNumbers s where s.dadt_id = d.dadt_id) as SN,
                        d.price,
                        d.sum,
                        d.ToProduction,
                        d.no_price_list";
        $From = "\nFrom ActEquips_v d";
        $Order = "\nOrder by d.dadt_id";

        $this->Query->setSelect($Select);
        $this->Query->setFrom($From);
        $this->Query->setOrder($Order);

        // Инициализация первичного ключа
        $this->KeyFiled = 'd.dadt_id';
        $this->PrimaryKey = 'dadt_id';
    }
    
    public function attributeLabels()
    {
        return array(
            'treb_id' => 'treb_id',
            'number' => 'number',
            'date' => 'date',
            'acdc_id' => 'acdc_id',
            'dadt_id' => 'dadt_id',
            'docm_id' => 'docm_id',
            'eqip_id' => 'Оборудование',
            'EquipName' => 'EquipName',
            'NameUnitMeasurement' => 'NameUnitMeasurement',
            'docm_quant' => 'Количество',
            'fact_quant' => 'fact_quant',
            'used' => 'used',
            'snf' => 'snf',
            'SN' => 'SN',
            'price' => 'price',
            'sum' => 'sum',
            'ToProduction' => 'ToProduction',
            'no_price_list' => 'no_price_list',
        );
    }
}

