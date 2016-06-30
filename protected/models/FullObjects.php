<?php


class FullObjects extends MainFormModel
{
	public $Object_id = null;
	public $ObjectGr_id = null;
	public $condt = null;
	public $Condition = null;
	public $Address_id = null;
	public $Regionname = null;
	public $StreetName = null;
	public $HouseInt = null;
	public $House = null;
	public $CorpInt = null;
	public $Corp = null;
	public $DoorwayInt = null;
	public $Doorway = null;
	public $Debtor = null;
	public $Region_Id = null;
	public $Addr = null;
	public $Refusers = null;
	public $FullName = null;
	public $PropForm_id = null;
	public $clgr_id = null;
	public $ClientGroup = null;
	public $Street_id = null;
	public $AreaName = null;
	public $Area_id = null;
	public $Srmg_id = null;
	public $ServiceManager = null;
	public $Slmg_id = null;
	public $SalesManager = null;
	public $Inmg_id = null;
	public $InstallManager = null;
	public $Debt = null;
	public $DateContact = null;
	public $ObjectType_id = null;
	public $ObjectType = null;
	public $deldate = null;
	public $x = null;
	public $y = null;
	public $year_construction = null;
	public $VIP = null;
	public $Signal = null;
	public $count_noexec_demands = null;
	public $floor = null;

	public $SP_INSERT_NAME = '';
	public $SP_UPDATE_NAME = '';
	public $SP_DELETE_NAME = '';

	public $KeyFiled = 'o.Object_id';
	public $PrimaryKey = 'Object_id';

	function __construct($scenario='') {
		parent::__construct($scenario);

		$select = "
		Select
			o.Object_id,
			o.ObjectGr_id,
			o.Address_id,
			o.condt,
			o.Condition,
			o.Addr,
			c.MasterName,
			--case when c.ServiceType is null then 'Не на обслуживании' else C.ServiceType end Servicetype,
			--case when isNull(c.Debt, 0) > 0 and o.condt = 0 then 1
				--when isNull(c.Debt, 0) <= 0 and o.condt = 1 then 2
				--when isNull(c.Debt, 0) > 0 and o.condt = 1 then 3 end Status,
			CASE WHEN c.ServiceType IS NULL THEN 'Не на обслуживании' ELSE C.ServiceType END AS ServiceType, CASE WHEN isNull(c.Debt, 0) > 0 AND
					isnull(o.Condition, '') = '' THEN 'Должник' WHEN isNull(c.Debt, 0) <= 0 AND isnull(o.Condition, '') <> '' THEN 'Особые условия' WHEN isNull(c.Debt, 0) > 0 AND isnull(o.Condition, '')
					<> '' THEN 'Должник и особые условия' END AS Status,
			c.ContrS_id,
			c.Master,
			c.JuridicalPerson,
			o.Refusers,
			o.FullName,
			o.ClientGroup,
			case when datepart(yyyy, getdate()) - o.year_construction <= 3 then 'Новостройка' else '' end as year_construction,
			o.AreaName,
			case when isNull(c.ServiceType, 'Не на обслуживании') =  'Не на обслуживании' then 'ОП' else 'СЦ' end GroupDep,
			o.SalesManager,
			o.DateContact,
			o.Street_id,
			o.House,
			case when p.sum_price > 7500 then 'VIP' else '' end as VIP,
			c.Territ_Name,
			o.count_noexec_demands,
			o.floor
		";

		$from = "
		From FullObjects o Left Join Contracts_v C on (O.ObjectGr_Id = C.ObjectGr_Id and dbo.truncdate(getdate()) between C.ContrSDateStart and C.ContrSDateEnd and isNull(c.DocType_id,4) = 4)
		left join Organizations_v p on (o.PropForm_id = p.Form_id)

		";

		$where = " Where O.Deldate is Null
			and O.Doorway <> 'Общее'
			and o.StreetName <> 'ЗИП ул.'
		";

		$order = "
		Order by
		  o.StreetName,
		  o.HouseInt,
		  o.CorpInt,
		  o.DoorwayInt
		";

		$this->Query->setSelect($select);
		$this->Query->setFrom($from);
		$this->Query->setOrder($order);
		$this->Query->setWhere($where);
	}

	public function rules()
	{
		return array(
			array('Object_id, condt, Doorway', 'required'),
			array('Object_id, ObjectGr_id, condt, Address_id, HouseInt, CorpInt, DoorwayInt, Region_Id, PropForm_id, clgr_id, Street_id, Area_id, Srmg_id, Slmg_id, Inmg_id, ObjectType_id, x, y, year_construction, VIP, Signal, count_noexec_demands, floor', 'numerical', 'integerOnly'=>true),
			array('Condition', 'length', 'max'=>500),
			array('Regionname, AreaName, ObjectType', 'length', 'max'=>50),
			array('StreetName', 'length', 'max'=>100),
			array('House', 'length', 'max'=>10),
			array('Corp', 'length', 'max'=>15),
			array('Doorway', 'length', 'max'=>35),
			array('Addr', 'length', 'max'=>240),
			array('Refusers', 'length', 'max'=>1073741823),
			array('FullName', 'length', 'max'=>86),
			array('ClientGroup', 'length', 'max'=>250),
			array('ServiceManager, SalesManager, InstallManager', 'length', 'max'=>70),
			array('Debt', 'length', 'max'=>19),
			array('Debtor, DateContact, deldate', 'safe'),
			array('Object_id, ObjectGr_id, condt, Condition, Address_id, Regionname, StreetName, HouseInt, House, CorpInt, Corp, DoorwayInt, Doorway, Debtor, Region_Id, Addr, Refusers, FullName, PropForm_id, clgr_id, ClientGroup, Street_id, AreaName, Area_id, Srmg_id, ServiceManager, Slmg_id, SalesManager, Inmg_id, InstallManager, Debt, DateContact, ObjectType_id, ObjectType, deldate, x, y, year_construction, VIP, Signal, count_noexec_demands, floor', 'safe'),
		);
	}


	public function attributeLabels()
	{
		return array(
			'Object_id' => 'Object',
			'ObjectGr_id' => 'Object Gr',
			'condt' => 'Condt',
			'Condition' => 'Condition',
			'Address_id' => 'Address',
			'Regionname' => 'Regionname',
			'StreetName' => 'Street Name',
			'HouseInt' => 'House Int',
			'House' => 'House',
			'CorpInt' => 'Corp Int',
			'Corp' => 'Corp',
			'DoorwayInt' => 'Doorway Int',
			'Doorway' => 'Doorway',
			'Debtor' => 'Debtor',
			'Region_Id' => 'Region',
			'Addr' => 'Addr',
			'Refusers' => 'Refusers',
			'FullName' => 'Full Name',
			'PropForm_id' => 'Prop Form',
			'clgr_id' => 'Clgr',
			'ClientGroup' => 'Client Group',
			'Street_id' => 'Street',
			'AreaName' => 'Area Name',
			'Area_id' => 'Area',
			'Srmg_id' => 'Srmg',
			'ServiceManager' => 'Service Manager',
			'Slmg_id' => 'Slmg',
			'SalesManager' => 'Sales Manager',
			'Inmg_id' => 'Inmg',
			'InstallManager' => 'Install Manager',
			'Debt' => 'Debt',
			'DateContact' => 'Date Contact',
			'ObjectType_id' => 'Object Type',
			'ObjectType' => 'Object Type',
			'deldate' => 'Deldate',
			'x' => 'X',
			'y' => 'Y',
			'year_construction' => 'Year Construction',
			'VIP' => 'Vip',
			'Signal' => 'Signal',
			'count_noexec_demands' => 'Count Noexec Demands',
			'floor' => 'Floor',
		);
	}

}
