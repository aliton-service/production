<?php

class DocmAchsDetailsReserv extends MainFormModel
{
    public $dadt_id;
    public $docm_id;
    public $number;
    public $eqip_id;
    public $achs_id;
    public $EquipName;
    public $UnitMeasurement_Id;
    public $NameUnitMeasurement;
    public $docm_quant;
    public $fact_quant;
    public $quant;
    public $used;
    public $ToProduction;
    public $price; 
    public $sum;
    public $EmplChange;
    public $date_change;
    public $EmplCreate;
    public $date_create;
    public $discontinued;
    public $SN;
    public $color;
    public $no_price_list;

    function __construct($scenario='') {
        parent::__construct($scenario);

        $this->SP_INSERT_NAME = '';
        $this->SP_UPDATE_NAME = '';
        $this->SP_DELETE_NAME = '';
        
        $Select = "\nSelect
                        dt.dadt_id,
                        dt.docm_id,
                        d.number,
                        dt.eqip_id,
                        dt.achs_id,
                        dt.EquipName,
                        dt.UnitMeasurement_Id,
                        dt.NameUnitMeasurement,
                        dt.docm_quant,
                        dt.fact_quant,
                        isnull(dt.docm_quant, 0) as quant,
                        dt.used,
                        dt.ToProduction,
                        dt.price, 
                        dt.sum,
                        dt.Emplchange,
                        dt.date_change,
                        dt.Emplcreate,
                        dt.date_create,
                        dt.discontinued,
                        dt.SN,
                        dt.color,
                        dt.no_price_list";
        $From = "\nFrom DocmAchsDetails_v dt inner join WHDocuments d on (dt.Docm_id = d.Docm_id)";
        $Where = "\nWhere d.Dctp_id = 4 and d.Achs_id is Null";

        $this->Query->setSelect($Select);
        $this->Query->setFrom($From);
        $this->Query->setWhere($Where);

        // Инициализация первичного ключа
        $this->KeyFiled = 'dt.dadt_id';
        $this->PrimaryKey = 'dadt_id';
        
    }

    public function rules()
    {
        return array(
            array('eqip_id, docm_quant', 'required'),
            array(' dadt_id,
                    docm_id,
                    eqip_id,
                    achs_id,
                    EquipName,
                    UnitMeasurement_Id,
                    NameUnitMeasurement,
                    docm_quant,
                    fact_quant,
                    quant,
                    used,
                    ToProduction,
                    price, 
                    sum,
                    Emplchange,
                    date_change,
                    Emplcreate,
                    date_create,
                    discontinued,
                    SN,
                    color,
                    no_price_list', 'safe'),
        );
    }

    public function attributeLabels()
    {
        return array(
            'dadt_id' => 'dadt_id',
            'docm_id' => 'docm_id',
            'eqip_id' => 'Оборудование',
            'achs_id' => 'achs_id',
            'no_price_list' => 'no_price_list',
            'EquipName' => 'EquipName',
            'UnitMeasurement_Id' => 'UnitMeasurement_Id',
            'NameUnitMeasurement' => 'NameUnitMeasurement',
            'docm_quant' => 'Кол-во',
            'fact_quant' => 'fact_quant',
            'quant' => 'quant',
            'used' => 'used',
            'ToProduction' => 'ToProduction',
            'price' => 'price', 
            'sum' => 'sum',
            'Emplchange' => 'Emplchange',
            'date_change' => 'date_change',
            'Emplcreate' => 'Emplcreate',
            'date_create' => 'date_create',
            'discontinued' => 'discontinued',
            'SN' => 'SN',
            'color' => 'color',
        );
    }
}


