<?php

/*
    Модель - список объектов, на форме для диспетчеров
*/

class ListObjectsMin extends MainFormModel
{
    public $Object_id;
    public $ObjectGr_id;
    public $Addr;
    public $MasterName;
    public $Status;
    public $ContrS_id;
    public $JuridicalPerson;
    public $FullName;
    public $year_construction;
    public $AreaName;
    public $Street_id;
    public $House;
    public $VIP;
    public $Territ_Name;
    public $ServiceType;
    
    public function rules() {
        return array(
            array(
                'Object_id,'
                .'ObjectGr_id'
                .'Address_id,'
                .'Condition,'
                .'Addr,'
                .'MasterName,'
                .'ServiceType,'
                .'Status,'
                .'ContrS_id,'
                .'jrdc_id,'
                .'Master,'
                .'JuridicalPerson,'
                .'Refusers,'
                .'FullName,'
                .'ClientGroup,'
                .'year_construction,'
                .'AreaName,'
                .'GroupDep,'
                .'SalesManager,'
                .'Street_id,'
                .'House,'
                .'VIP,'
                .'Territ_Name,'
                .'DateCreate', 'safe'),
        );
    }
    
    public function __construct($scenario = '') {
        
        parent::__construct($scenario);
        
        $this->SP_INSERT_NAME = 'INSERT_Objects';
        $this->SP_UPDATE_NAME = 'UPDATE_Objects';
        $this->SP_DELETE_NAME = 'DELETE_Objects';
        
        $Select  =  "\nSelect
                        o.Object_id,
                        o.ObjectGr_id,
                        a.Addr + CASE WHEN o.Doorway IS NULL THEN '' ELSE ', п. ' + o.Doorway END AS Addr,
                        c.MasterName,
                        CASE WHEN c.ServiceType IS NULL THEN 'Не на обслуживании' ELSE C.ServiceType END AS ServiceType,
                        CASE WHEN isNull(c.Debt, 0) > 0 AND isnull(o.Condition, '') = '' THEN 1
                             WHEN isNull(c.Debt, 0) <= 0 AND isnull(o.Condition, '') <> '' THEN 2 
                             WHEN isNull(c.Debt, 0) > 0 AND isnull(o.Condition, '') <> '' THEN 3 ELSE 0 END AS Status,
                        C.ContrS_id,
                        C.JuridicalPerson,
                        p.FullName,
                        CASE WHEN datepart(yyyy, getdate()) - og.year_construction <= 3 THEN 'Новостройка' ELSE '' END AS year_construction,
                        ar.AreaName,
                        a.Street_id,
                        a.House, 
                        case when p.sum_price > 7500 then 'VIP' else '' end AS VIP,
                        c.Territ_Name";
        $From =     "\nFrom dbo.Objects AS o inner join dbo.ObjectsGroup AS og ON o.ObjectGr_id = og.ObjectGr_id 
                        left join dbo.Addresses_v AS a ON og.Address_id = a.Address_id 
                        left join dbo.Contracts_v AS C ON o.ObjectGr_id = C.ObjectGr_id AND dbo.truncdate(GETDATE()) BETWEEN C.ContrSDateStart AND C.ContrSDateEnd AND ISNULL(C.DocType_id, 4) = 4
                        left join dbo.Organizations_v AS p ON og.PropForm_id = p.Form_id
                        left join dbo.Areas AS ar ON og.Area_id = ar.Area_id";
        $Where =    "\nWhere (o.DelDate IS NULL)
                        AND (og.DelDate IS NULL)
                        AND (o.Doorway <> 'Общее')
                        AND (a.StreetName <> 'ЗИП ул.')";
        $Order =    "\nOrder by a.StreetName, a.RegionName, dbo.StrToInt(a.House), dbo.StrToInt(a.Corp), dbo.StrToInt(o.Doorway)";
        $this->Query->setSelect($Select);
        $this->Query->setFrom($From);
        $this->Query->setWhere($Where);
        $this->Query->setOrder($Order);
        $this->KeyFiled = 'o.Object_id';
        $this->PrimaryKey = 'Object_id';
    }
    
    public function attributeLabels()
    {
        return array(
                'Object_id' => 'Идентификатор',
                'Condition' => 'Условия',
                'Addr' => 'Адрес',
                'MasterName' => 'Мастер',
                'Servicetype' => 'Тариф',
                'JuridicalPerson' => 'Юр. лицо',
                'Refusers' => 'Отказники',
                'FullName' => 'Организация',
                'year_construction' => 'Год постройки',
                'AreaName' => 'Район',
                'House' => 'Дом',
                'VIP' => 'ВИП',
                'Territ_Name' => 'Участок',
            );
    }

    static function getData() {
        $q = new SQLQuery();
        $q->setSelect("Select o.Object_id, o.ObjectGr_id, a.Addr + CASE WHEN o.Doorway IS NULL THEN '' ELSE ', п. ' + o.Doorway END AS Addr");
        $q->setFrom("\nFrom dbo.Objects AS o
                        inner join dbo.ObjectsGroup AS og ON o.ObjectGr_id = og.ObjectGr_id
                        left join dbo.Addresses_v AS a ON og.Address_id = a.Address_id ");
        $q->setWhere("\nWhere o.DelDate is Null");
        return $q->QueryAll();
    }
}



