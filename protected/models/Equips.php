<?php

class Equips extends MainFormModel
{
    public $Equip_id = null;
    public $EquipName = null;
    public $UnitMeasurement_Id = null;
    public $Supplier_id = null;
    public $Description = null;
    public $GroupGood_Id = null;
    public $SubGroupGood_Id = null;
    public $CategoryGood_Id = null;
    public $EquipImage = null;
    public $actp_id = null;
    public $ctgr_id = null;
    public $grp_id = null;
    public $sgrp_id = null;
    public $discontinued = null;
    public $SystemType_id = null;
    public $ServicingTime = null;
    public $AddressSystem_id = null;
    public $rate = null;
    public $must_instruction = null;
    public $there_instruction = null;
    public $must_photo = null;
    public $there_photo = null;
    public $must_analog = null;
    public $there_analog = null;
    public $must_producer = null;
    public $there_producer = null;
    public $must_supplier = null;
    public $there_supplier = null;
    public $note = null;
    public $group_id = null;
    public $Lock = null;
    public $EmplLock = null;
    public $DateLock = null;
    public $EmplCreate = null;
    public $DateCreate = null;
    public $EmplChange = null;
    public $DateChange = null;
    public $EmplDel = null;
    public $DelDate = null;

    public $from_equip_id = null;
    public $in_equip_id = null;


	public $KeyFiled = 'e.Equip_id';
	public $PrimaryKey = 'Equip_id';

	public $SP_INSERT_NAME = 'INSERT_EQUIPS';
	public $SP_UPDATE_NAME = 'UPDATE_EQUIPS';
	public $SP_DELETE_NAME = 'DELETE_EQUIPS';


	function __construct($scenario='') {
		parent::__construct($scenario);

		$select = "
		select e.Equip_id, e.group_id,
       e.EquipName,
       e.UnitMeasurement_Id,
       m.NameUnitMeasurement,
       e.Supplier_id,
       s.NameSupplier,
       e.Description,
       e.SystemType_id,
       st.SystemTypeName,
       e.actp_id,
       at.name actp_name,
       e.ctgr_id,
       c.name ctgr_name,
       e.grp_id,
       g.name grp_name,
       e.discontinued,
       e.sgrp_id,
       sg.name sgrp_name,
       (Select case when Min(ed.EquipName) is not null then '(' + Min(ed.EquipName) + ', ...)'
                         else '()' end EquipName
       from EquipDetails_v ed
       where e.Equip_id = ed.Equip_id and ed.type = 0) as EquipDetailsType0,

       (Select case when Min(ed.EquipName) is not null then '(' + Min(ed.EquipName) + ', ...)'
                         else '()' end EquipName
       from EquipDetails_v ed
      where e.Equip_id = ed.Equip_id and ed.type = 2) as EquipDetailsType2,

      (Select case when Min(ed.EquipName) is not null then '(' + Min(ed.EquipName) + ', ...)'
                         else '()' end EquipName
       from EquipDetails_v ed
      where e.Equip_id = ed.Equip_id and ed.type = 1) as EquipDetailsType1,
      e.ServicingTime,

      (select case when Min(ads.AddressSystem) is not null then '(' + Min(ads.AddressSystem) + ', ...)'
                         else '()' end AddressSystem
       from AddressedStorage ad left join AddressSystems ads on (ad.adsys_id = ads.AddressSystem_id)
      where e.Equip_id = ad.Equip_id) as AddressSys,
        e.EquipImage,
      eg.full_group_name,
        e.must_instruction,
        e.there_instruction,
        e.must_photo,
        e.there_photo,
        e.must_analog,
        e.there_analog,
        e.must_producer,
        e.there_producer,
        e.must_supplier,
        e.there_supplier,
        e.note


		";

		$from = "
		From Equips e left join UnitMeasurement m on (e.UnitMeasurement_id = m.UnitMeasurement_id)
     left join Suppliers s on (e.Supplier_id = s.Supplier_id)
     left join AccountingTypes at on (e.actp_id = at.actp_id)
     left join Categories c on (e.ctgr_id = c.ctgr_id)
     left join EquipGroups g on (e.grp_id = g.grp_id)
     left join EquipSubgroups sg on (e.sgrp_id = sg.sgrp_id)
     left join SystemTypes st on (e.SystemType_id = st.SystemType_id)
     left join EqipGroups eg on (e.group_id = eg.group_id)

		";

		$where = "
		where e.DelDate is Null
		";

		$order = "
		order by e.EquipName
		";

		$this->Query->setSelect($select);
		$this->Query->setFrom($from);
		$this->Query->setOrder($order);
		$this->Query->setWhere($where);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'Equips';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('EquipName, group_id', 'required'),
			array('UnitMeasurement_Id, Supplier_id, GroupGood_Id, SubGroupGood_Id, actp_id, ctgr_id, grp_id, sgrp_id, SystemType_id, ServicingTime, AddressSystem_id, group_id, EmplLock, EmplCreate, EmplChange, EmplDel', 'numerical', 'integerOnly'=>true),
			array('EquipName', 'length', 'max'=>200),
			array('Description', 'length', 'max'=>1000),
			array('CategoryGood_Id, rate', 'length', 'max'=>19),
			array('EquipImage', 'length', 'max'=>250),
			array('discontinued, must_instruction, there_instruction, must_photo, there_photo, must_analog, there_analog, must_producer, there_producer, must_supplier, there_supplier, note, Lock, DateLock, DateCreate, DateChange, DelDate', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('Equip_id, from_equip_id, in_equip_id, EquipName, UnitMeasurement_Id, Supplier_id, Description, GroupGood_Id, SubGroupGood_Id, CategoryGood_Id, EquipImage, actp_id, ctgr_id, grp_id, sgrp_id, discontinued, SystemType_id, ServicingTime, AddressSystem_id, rate, must_instruction, there_instruction, must_photo, there_photo, must_analog, there_analog, must_producer, there_producer, must_supplier, there_supplier, note, group_id, Lock, EmplLock, DateLock, EmplCreate, DateCreate, EmplChange, DateChange, EmplDel, DelDate', 'safe'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'Equip_id' => 'Equip',
			'EquipName' => 'Оборудование',
			'UnitMeasurement_Id' => 'Ед. изм.',
			'Supplier_id' => 'Производитель',
			'Description' => 'Описание',
			'GroupGood_Id' => 'Group Good',
			'SubGroupGood_Id' => 'Sub Group Good',
			'CategoryGood_Id' => 'Category Good',
			'EquipImage' => 'Equip Image',
			'actp_id' => 'Тип учета',
			'ctgr_id' => 'Категория',
			'grp_id' => 'Группа',
			'sgrp_id' => 'Подгруппа',
			'discontinued' => 'Снят с производства',
			'SystemType_id' => 'Тип системы',
			'ServicingTime' => 'Время ТО',
			'AddressSystem_id' => 'Address System',
			'rate' => 'Rate',
			'must_instruction' => 'Нужна',
			'there_instruction' => 'Есть',
			'must_photo' => 'Нужна',
			'there_photo' => 'Есть',
			'must_analog' => 'Нужна',
			'there_analog' => 'Есть',
			'must_producer' => 'Нужна',
			'there_producer' => 'Есть',
			'must_supplier' => 'Нужна',
			'there_supplier' => 'Есть',
			'note' => 'Краткие технические характеристики',
			'group_id' => 'Ветка',
			'Lock' => 'Lock',
			'EmplLock' => 'Empl Lock',
			'DateLock' => 'Date Lock',
			'EmplCreate' => 'Empl Create',
			'DateCreate' => 'Date Create',
			'EmplChange' => 'Empl Change',
			'DateChange' => 'Date Change',
			'EmplDel' => 'Empl Del',
			'DelDate' => 'Del Date',
		);
	}


	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Equips the static model class
	 */
	 public function deleteCount($id, $empl_id) {
	 
		$Command = Yii::app()->db->createCommand(''
                . "UPDATE Equips SET EmplDel = {$empl_id}, DelDate = '".date('m.d.y H:i:s')."' WHERE Equip_id = {$id}
                ");
        
        return $Command->queryAll();
	}
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
//
//	static function all() {
//		return CHtml::listData(self::model()->findAll(), 'Equip_id', 'EquipName');
//	}

	static function getData() {
		$q = new SQLQuery();
		$q->setSelect("Select Equip_id, EquipName");
		$q->setFrom("\nFrom Equips");
		$q->setWhere("\nWhere DelDate is Null");
		return $q->QueryAll();
	}

	static function getEquipsFull() {
		$q = new SQLQuery();
		$q->setSelect("
		select e.Equip_id, EquipName,  m.NameUnitMeasurement, e.discontinued
		");
		$q->setFrom("
		from Equips e left outer join UnitMeasurement m on (e.UnitMeasurement_id = m.UnitMeasurement_id)
              left join Categories c on (e.ctgr_id = c.ctgr_id)
		");
		$q->setWhere("
		where (e.DelDate is null) and (c.ForTreb = 1) or (e.DelDate is Null) and (e.ctgr_id is Null)
		");
		$q->setOrder("
		order by e.EquipName
		");

		return $q->QueryAll();
	}

	public function getAnalog($id) {
		$sql = "
			select
			   e.Equip_id,
			   e.EquipName
			from EquipAnalog_v  e
			where e.Equip_id = :equip_id
		";
		$query = Yii::app()->db->createCommand($sql);
		$query->bindParam(':equip_id', $id);
		return $query->queryAll();
	}

	public function getInfoForAnalog($id) {
		$sql = "
			select
			   Equip_id,
			   EquipName,
			   e.UnitMeasurement_id,
			   m.NameUnitMeasurement,
			   e.Supplier_id,
			   s.NameSupplier,
			   e.discontinued,
			   e.Description
			from Equips e left join UnitMeasurement m on (e.UnitMeasurement_id = m.UnitMeasurement_id)
				 left join Suppliers s on (e.Supplier_id = s.Supplier_id)
				 left join AccountingTypes at on (e.actp_id = at.actp_id)
				 left join Categories c on (e.ctgr_id = c.ctgr_id)
				 left join EquipGroups g on (e.grp_id = g.grp_id)
				 left join EquipSubgroups sg on (e.sgrp_id = sg.sgrp_id)
			where e.Equip_id = :equip_id
		";
		$query = Yii::app()->db->createCommand($sql);
		$query->bindParam(':equip_id', $id);
		return $query->queryRow();
	}
        
        
}
