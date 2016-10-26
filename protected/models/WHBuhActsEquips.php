<?php

class WHBuhActsEquips extends MainFormModel
{
    public $dadt_id;
    public $docm_id;
    public $in_number;
    public $in_date;
    public $achs_id;
    public $eqip_id;
    public $EquipName;
    public $UnitMeasurement_id;
    public $NameUnitMeasurement;
    public $docm_quant;
    public $fact_quant;
    public $EmplChange;
    public $date_change;
    public $EmplCreate;
    public $date_create;
    public $used;
    public $price;
    public $sum;
    public $discontinued;
    public $ToProduction;
    public $SN;
    public $no_price_list;
    
    function __construct($scenario = '') {
        parent::__construct($scenario);

        $this->SP_INSERT_NAME = 'INSERT_WHBuhActsEquips';
        $this->SP_UPDATE_NAME = 'UPDATE_WHBuhActsEquips';
        $this->SP_DELETE_NAME = 'DELETE_WHBuhActsEquips';

        $Select = "\nSelect 
                        d.dadt_id,
                        d.docm_id,
                        d.in_number,
                        d.in_date,
                        d.achs_id,
                        d.eqip_id,
                        d.EquipName,
                        d.UnitMeasurement_id,
                        d.NameUnitMeasurement,
                        d.docm_quant,
                        d.fact_quant,
                        d.EmplChange,
                        d.date_change,
                        d.EmplCreate,
                        d.date_create,
                        d.used,
                        d.price,
                        d.sum,
                        d.discontinued,
                        d.ToProduction,
                        d.SN,
                        d.no_price_list";
        $From = "\nFrom BuhActEquips_v d";
        

        $this->Query->setSelect($Select);
        $this->Query->setFrom($From);
        //$this->Query->setWhere($Where);
        //$this->Query->setOrder($Order);
        
        $this->KeyFiled = 'd.dadt_id';
        $this->PrimaryKey = 'dadt_id';
    }
    
    public function rules()
    {
        return array(
            array('dadt_id,
                    docm_id,
                    in_number,
                    in_date,
                    achs_id,
                    eqip_id,
                    EquipName,
                    UnitMeasurement_id,
                    NameUnitMeasurement,
                    docm_quant,
                    fact_quant,
                    EmplChange,
                    date_change,
                    EmplCreate,
                    date_create,
                    used,
                    price,
                    sum,
                    discontinued,
                    ToProduction,
                    SN,
                    no_price_list', 'safe'),
        );
    }
    
    public function attributeLabels()
    {
        return array(
            'dadt_id' => '',
            'docm_id' => '',
            'dadt_id'=> '',
            'docm_id'=> '',
            'in_number'=> '',
            'in_date'=> '',
            'achs_id'=> '',
            'eqip_id'=> '',
            'EquipName'=> '',
            'UnitMeasurement_id'=> '',
            'NameUnitMeasurement'=> '',
            'docm_quant'=> '',
            'fact_quant'=> '',
            'EmplChange'=> '',
            'date_change'=> '',
            'EmplCreate'=> '',
            'date_create'=> '',
            'used'=> '',
            'price'=> '',
            'sum'=> '',
            'discontinued'=> '',
            'ToProduction'=> '',
            'SN'=> '',
            'no_price_list'=> '',
        );
    }
}


