<?php

class ObjectsGroup extends MainFormModel
{
    public $ObjectGr_id;
    public $FullName;
    public $PropForm_id;
    public $Address;
    public $Region_id;
    public $Street_id;
    public $Address_id;
    public $Refusers;
    public $LphName;
    public $Apartment;
    public $Floor;
    public $year_construction;
    public $Entrance;
    public $CountPorch;
    public $clgr_id;
    public $ClientGroup;
    public $Journal;
    public $PostalAddress;
    public $Note;
    public $Information;
    public $SalesManager;
    public $InstallManager;
    public $ServiceManager;
    public $Srmg_id;
    public $Slmg_id;
    public $Inmg_id;
    public $Area_id;
    public $Corp;
    public $House;
    public $Room;
    public $no_sms;
    public $EmplCreate;
    public $DateCreate;
    public $EmplChange;
    public $DateChange;
    public $DoorwayList;
    public $ClientName;
    public $Telephone;
    public $AreaSize;
    public $Inform_id;
    public $CommonObject_id;
    
    public function rules()
    {
        return array(
            /* Обязательные поля для заполнения*/
            array('PropForm_id, Entrance', 'required', 'on' => 'Insert'),
            array('Region_id, Street_id, House', 'required', 'on' => 'Update, Insert'),
            /* Любое заполнение */
            array('PropForm_id,'
                . ' Address_id,'
                . ' Refusers,'
                . ' Apartment,'
                . ' Floor,'
                . ' year_construction,'
                . ' Entrance,'
                . ' CountPorch,'
                . ' clgr_id,'
                . ' Note,'
                . ' Information,'
                . ' Srmg_id,'
                . ' Slmg_id,'
                . ' Inmg_id,'
                . ' Area_id,'
                . ' Region_id,'
                . ' Street_id,'
                . ' Corp,'
                . ' Room,'
                . ' no_sms,'
                . ' Journal,'
                . ' EmplCreate,'
                . ' DateCreate,'
                . ' EmplChange,'
                . ' DateChange,'
                . ' ObjectGr_id,'
                . ' ClientName,'
                . ' Telephone,'
                . ' AreaSize,'
                . ' PostalAddress', 'safe', 'on' => 'Insert, Update'),
        );
    }
    
    public function __construct($scenario = '') {
        parent::__construct($scenario);
        
        // Инициализация процедур
        $this->SP_INSERT_NAME = 'INSERT_ObjectsGroup';
        $this->SP_UPDATE_NAME = 'UPDATE_ObjectsGroup';
        $this->SP_DELETE_NAME = 'DELETE_OBJECTSGROUP';
        
        // Инициализация запроса
        $Select =   "Select"
                    ."  og.ObjectGr_id,"
                    ."  p.FullName,"
                    ."  og.PropForm_id,"
                    ."  p.lph_name as LphName,"
                    ."  a.Addr Address,"
                    ."  a.Corp,"
                    ."  a.House,"
                    ."  a.Room,"
                    ."  a.Street_id,"
                    ."  a.Region_id,"
                    ."  og.Address_id,"
                    ."  og.Apartment,"
                    ."  og.Floor,"
                    ."  og.year_construction,"
                    ."  og.Entrance,"
                    ."  dbo.get_doorways_list(og.ObjectGr_id) as DoorwayList,"
                    ."  og.CountPorch,"
                    ."  og.clgr_id,"
                    ."  og.Refusers,"
                    ."  og.Journal,"
                    ."  og.ClientName,"
                    ."  og.Telephone,"
                    ."  og.PostalAddress,"
                    ."  cg.ClientGroup,"
                    ."  og.Note,"
                    ."  og.Information,"
                    ."  og.AreaSize,"
                    ."  og.Srmg_id,"
                    ."  og.Slmg_id,"
                    ."  og.Inmg_id,"
                    ."  og.Area_id,"
                    ."  og.no_sms,"
                    ."  dbo.FIO(e2.EmployeeName) as SalesManager,"
                    ."  dbo.FIO(e3.EmployeeName) as InstallManager,"
                    ."  dbo.FIO(e.EmployeeName) as ServiceManager,"
                    ."  og.EmplCreate,"
                    ."  og.DateCreate,"
                    ."  og.EmplChange,"
                    ."  og.DateChange,"
                    ."  (Select max(o.Object_id) From Objects o Where o.ObjectGr_id = og.ObjectGr_id and o.DelDate is Null and o.Doorway = 'Общее') as CommonObject_id";
        $From =     "\nFrom ObjectsGroup og left join Organizations_v p on (og.PropForm_id = p.Form_id)"
                    ."  left join Addresses_v a on (a.Address_id = og.Address_id)"
                    ."  left join ClientGroups cg on (og.clgr_id = cg.clgr_id)"
                    ."  left join Employees e on (og.Srmg_id = e.Employee_id)"
                    ."  left join Employees e2 on (og.Slmg_id = e2.Employee_id)"
                    ."  left join Employees e3 on (og.Inmg_id = e3.Employee_id)" ;
        
        $this->Query->setSelect($Select);
        $this->Query->setFrom($From);
        
        // Инициализация первичного ключа
        $this->KeyFiled = 'og.ObjectGr_id';
    }
    
    public function attributeLabels()
    {
	return array(
            'ObjectGr_id' => 'ObjectGr_id',
            'PropForm_id' => 'Клиент',
            'FullName' => 'Клиент',
            'Address' => 'Адрес',
            'Refusers' => 'Отказники',
            'LphName' => 'Тип клиента',
            'Apartment' => 'Кол-во квартир',
            'Floor' => 'Кол-во этажей',
            'year_construction' => 'Год постройки',
            'Entrance' => 'Подъезды',
            'CountPorch' => 'Кол-во подъездов',
            'ClientGroup' => 'Сегмент',
            'Journal' => 'Журнал',
            'PostalAddress' => 'Почта',
            'Note' => 'Примечание',
            'Information' => 'Общая информация',
            'Region_id' => 'Регион',
            'Area_id' => 'Район',
            'Street_id' => 'Улица',
            'House' => 'Дом',
            'Corp' => 'Корпус',
            'Room' => 'Помещение',
            'Srmg_id' => 'Менеджер СЦ',
            'Slmg_id' => 'Менеджер ОП',
            'Inmg_id' => 'Менеджер монтажа',
            'AreaSize' => 'Площадь АППЗ',
	);
    }
    
    
    public function getCommonObject_id()
    {
        $Object = new Objects();
        $Result = $Object->Find(array(
                'o.ObjectGr_id' => $this->ObjectGr_id,
                'o.Doorway' => "'Общее'",
                ));
        
        if (!isset($Result[0]))
            return 0;
        else
            return $Result[0]['Object_id'];
    }
}
