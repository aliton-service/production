<?php

class PriceMarkupDetails extends MainFormModel
{

	public $mrdt_id = null;
	public $mrkp_id = null;
	public $eqip_id = null;
	public $EquipName = null;
	public $splr_id = null;
	public $NameSupplier = null;
	public $grp_id = null;
	public $grp_name = null;
	public $Price = null;
	public $MarkupLow = null;
	public $MarkupHigh = null;

	function __construct($scenario = '') {
            parent::__construct($scenario);

            $this->SP_INSERT_NAME = 'INSERT_PriceMarkupDetails';
            $this->SP_UPDATE_NAME = 'UPDATE_PriceMarkupDetails';
            $this->SP_DELETE_NAME = 'DELETE_PriceMarkupDetails';

            $Select = "\nSelect 
                            d.mrdt_id, 
                            d.mrkp_id,
                            d.eqip_id,
                            e.EquipName,
                            d.splr_id,
                            s.NameSupplier,
                            d.grp_id,
                            g.name grp_name,
                            d.Price,
                            d.MarkupLow,
                            d.MarkupHigh";
            
            $From = "\nFrom PriceMarkupDetails d left outer join Equips e on (d.eqip_id = e.Equip_id)
                            left outer join Suppliers s on (d.splr_id = s.Supplier_id)
                            left outer join EquipGroups g on (d.grp_id = g.grp_id)";
            
//            $Where = "\nWhere ";
            
            $Order = "\nOrder by case when d.price is null then 0 else 1 end +
                            case when d.eqip_id is Null then 0 else 10 end +
                            case when d.splr_id is Null then 0 else 100 end +
                            case when d.grp_id is Null then 0 else 1000 end,
                            d.price";

            $this->Query->setSelect($Select);
            $this->Query->setFrom($From);
//            $this->Query->setWhere($Where);
            $this->Query->setOrder($Order);

            $this->KeyFiled = 'd.mrdt_id';
            $this->PrimaryKey = 'mrdt_id';
        }
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'PriceMarkupDetails';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
            return array(
                array('mrdt_id, mrkp_id, eqip_id, EquipName, splr_id, NameSupplier, grp_id, grp_name, Price, MarkupLow, MarkupHigh', 'safe'),
            );
	}


	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'mrdt_id' => 'mrdt_id',
			'mrkp_id' => 'mrkp_id',
			'eqip_id' => 'Оборудование',
			'EquipName' => 'Оборудование',
			'splr_id' => 'splr_id',
			'NameSupplier' => 'NameSupplier',
			'grp_id' => 'grp_id',
			'grp_name' => 'grp_name',
			'Price' => 'Price',
			'MarkupLow' => 'MarkupLow',
			'MarkupHigh' => 'MarkupHigh',
		);
	}



	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}


}
