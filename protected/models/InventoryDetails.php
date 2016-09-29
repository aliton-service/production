<?php

class InventoryDetails extends MainFormModel
{

	public $indt_id = null;
	public $invn_id = null;
	public $eqip_id = null;
	public $EquipName = null;
	public $UnitMeasurement_id = null;
	public $NameUnitMeasurement = null;
	public $quant = null;
	public $quant_used = null;
	public $EmplChange = null;
	public $EmplChangeInventory = null;
	public $DateChangeInventory = null;


	function __construct($scenario = '') {
            parent::__construct($scenario);

            $this->SP_INSERT_NAME = 'INSERT_InventoryDetails';
            $this->SP_UPDATE_NAME = 'UPDATE_WH_InventoryDetails';
            $this->SP_DELETE_NAME = 'DELETE_InventoryDetails';

            $Select = "\nSelect 
                            id.indt_id,
                            id.invn_id, 
                            id.eqip_id,
                            eq.EquipName,
                            eq.UnitMeasurement_id, 
                            um.NameUnitMeasurement,
                            id.quant,
                            id.quant_used,
                            eq.EmplChangeInventory,
                            eq.DateChangeInventory";
            
            $From = "\nFrom InventoryDetails id inner join Equips eq on (id.eqip_id = eq.Equip_id)
                            left join UnitMeasurement um on (eq.UnitMeasurement_id = um.UnitMeasurement_id)";
            
            $Where = "\nWhere id.DelDate is Null";
            
            $Order = "\nOrder by eq.EquipName";

            $this->Query->setSelect($Select);
            $this->Query->setFrom($From);
            $this->Query->setWhere($Where);
            $this->Query->setOrder($Order);

            $this->KeyFiled = 'id.indt_id';
            $this->PrimaryKey = 'indt_id';
        }
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'InventoryDetails';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
            return array(
                array('indt_id, invn_id, eqip_id, quant, quant_used', 'safe'),
            );
	}


	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'indt_id' => 'indt_id',
			'invn_id' => 'invn_id',
			'eqip_id' => 'eqip_id',
			'EquipName' => 'Оборудование',
			'UnitMeasurement_id' => 'UnitMeasurement_id',
			'NameUnitMeasurement' => 'Ед.изм.',
			'quant' => 'Количество',
			'quant_used' => 'quant_used',
			'EmplChangeInventory' => 'EmplChangeInventory',
			'DateChangeInventory' => 'DateChangeInventory',
		);
	}



	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}


}
