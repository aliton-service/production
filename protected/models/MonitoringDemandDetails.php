<?php

class MonitoringDemandDetails extends MainFormModel
{
	public $mndt_id = null;
	public $EquipName = null;
	public $Price = null;
	public $NameUnitMeasurement = null;

	public $SP_INSERT_NAME = 'INSERT_MonitoringDemandDetails';
	public $SP_UPDATE_NAME = 'UPDATE_MonitoringDemandDetails';
	public $SP_DELETE_NAME = 'DELETE_MonitoringDemandDetails';

        public function rules()
	{
            // NOTE: you should only define rules for those attributes that will receive user inputs.
            return array(
                array('EquipName, Price, Note, NameUnitMeasurement', 'required'),
                array('Price', 'numerical'),
                array('Note', 'length', 'max'=>1073741823),
                array('EquipName, NameUnitMeasurement', 'length', 'max'=>100),
                array('mndt_id, EquipName, Price, Note, NameUnitMeasurement', 'safe'),
            );
	}
        
	function __construct($scenario='') {
		parent::__construct($scenario);

		$select = "
                    Select
                        m.mndt_id,
                        e.EquipName,
                        m.Price,
                        m.Note,
                        u.NameUnitMeasurement
		";

		$from = "
                    From MonitoringDemandDetails m left join Equips e on (m.Equip_id = e.Equip_id)
                        left join UnitMeasurement_v u on (e.UnitMeasurement_id = u.UnitMeasurement_id)
		";

//		$where = "
//                    Where m.DelDate is Null
//		";

//		$order = "
//		";

                // Инициализация первичного ключа
                $this->KeyFiled = 'm.mndt_id';
                $this->PrimaryKey = 'mndt_id';
        
		$this->Query->setSelect($select);
		$this->Query->setFrom($from);
//		$this->Query->setWhere($where);
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
			'EquipName' => 'EquipName',
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
