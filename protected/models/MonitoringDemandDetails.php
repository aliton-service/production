<?php

class MonitoringDemandDetails extends MainFormModel
{
	public $mndt_id;
	public $mndm_id;
	public $EquipName;
	public $price;
	public $Note;
	public $NameUnitMeasurement;
	public $equip_id;
	public $quant;
	public $price_low;
	public $price_high;
	public $UserCreate;

	public $SP_INSERT_NAME = 'INSERT_MonitoringDemandDetails';
	public $SP_UPDATE_NAME = 'UPDATE_MonitoringDemandDetails';
	public $SP_DELETE_NAME = 'DELETE_MonitoringDemandDetails';

        public function rules()
	{
            // NOTE: you should only define rules for those attributes that will receive user inputs.
            return array(
                array('equip_id, quant', 'required'),
                array('price_high', 'numerical'),
                array('Note', 'length', 'max'=>1073741823),
                array('EquipName, NameUnitMeasurement', 'length', 'max'=>100),
                array('mndt_id, mndm_id, EquipName, price_high, Note, NameUnitMeasurement', 'safe'),
            );
	}
        
	function __construct($scenario='') {
		parent::__construct($scenario);

		$select = "\n Declare @Prlt_id int = dbo.get_price_list(GETDATE()) \n
                    Select
                        m.mndt_id,
                        m.mndm_id,
                        e.EquipName,
                        m.price,
                        m.Note,
                        u.NameUnitMeasurement,
                        m.equip_id,
                        m.quant,
                        p.price_low,
                        p.price_high
		";

		$from = "
                    From MonitoringDemandDetails m left join Equips e on (m.equip_id = e.Equip_id)
                        left join UnitMeasurement_v u on (e.UnitMeasurement_id = u.UnitMeasurement_id)
                        left join PriceListDetails_v p on (m.equip_id = p.eqip_id and p.prlt_id = @Prlt_id)
		";

		$where = "
                    Where m.DelDate is Null
		";

//		$order = "
//		";

                // Инициализация первичного ключа
                $this->KeyFiled = 'm.mndt_id';
                $this->PrimaryKey = 'mndt_id';
        
		$this->Query->setSelect($select);
		$this->Query->setFrom($from);
		$this->Query->setWhere($where);
//                $this->Query->setOrder($order);
	}


	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
            return 'MonitoringDemandDetails';
	}

	
	public function attributeLabels()
	{
		return array(
			'mndt_id' => 'mndt_id',
			'mndm_id' => 'mndm_id',
			'EquipName' => 'Оборудование',
			'equip_id' => 'Оборудование',
			'quant' => 'Количество',
			'Price' => 'Price',
			'Note' => 'Note',
			'NameUnitMeasurement' => 'NameUnitMeasurement',
		);
	}



	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}



}
