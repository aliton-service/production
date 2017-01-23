<?php

class DocmAchsDetails extends MainFormModel
{
    public $dadt_id;
    public $docm_id;
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
    public $EmplChangeInventory;

    function __construct($scenario='') {
        parent::__construct($scenario);

        $this->SP_INSERT_NAME = 'INSERT_DocmAchsDetails';
        $this->SP_UPDATE_NAME = 'UPDATE_DocmAchsDetails';
        $this->SP_DELETE_NAME = 'DELETE_DocmAchsDetails';
        
        $Select = "\nSelect"
                . "     d.dadt_id,
                        d.docm_id,
                        d.eqip_id,
                        d.achs_id,
                        d.EquipName,
                        d.UnitMeasurement_Id,
                        d.NameUnitMeasurement,
                        d.docm_quant,
                        d.fact_quant,
                        isnull(d.fact_quant, d.docm_quant) as quant,
                        d.used,
                        d.ToProduction,
                        d.price, 
                        d.sum,
                        d.Emplchange,
                        d.date_change,
                        d.Emplcreate,
                        d.date_create,
                        d.discontinued,
                        d.SN,
                        d.color,
                        d.no_price_list,
                        d.EmplChangeInventory";
        $From = "\nFrom DocmAchsDetails_v d";
        $Order = "\nOrder by d.docm_id";

        $this->Query->setSelect($Select);
        $this->Query->setFrom($From);
        $this->Query->setOrder($Order);

        // Инициализация первичного ключа
        $this->KeyFiled = 'd.dadt_id';
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
                    no_price_list,
                    EmplChangeInventory', 'safe'),
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
            'EmplChangeInventory' => 'EmplChangeInventory',
        );
    }
	
    public function deleteCount($id, $empl_id) {

        $Command = Yii::app()->db->createCommand(''
        . "UPDATE DocmAchsDetails SET EmplDel = {$empl_id}, DelDate = '".date('m.d.y H:i:s')."' WHERE dadt_id = {$id}
        ");

        return $Command->queryAll();
    }

    public static function model($className=__CLASS__)
    {
            return parent::model($className);
    }
}
