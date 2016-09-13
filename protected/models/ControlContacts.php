<?php

class ControlContacts extends MainFormModel
{
    public $ObjectGr_id;
    public $Form_id;
    public $PKey;
    public $FullName;
    public $Addr;
    public $Address_id;
    public $Doctype_Name;
    public $ContrNumS;
    public $ContrDateS;
    public $empl_name;
    public $text;
    public $next_date;
    public $next_info_id;
    public $next_cntp_id;
    public $next_cntp_name;
    public $next_contact;
    public $note;
    public $drsn_id;
    public $date;
    public $drsn_name;
    public $debt;
    public $rslt_name;
    public $cntp_name;
    public $contact;
    public $empl_id;
    public $Employee_id;
    
    function __construct($scenario = '') {
        parent::__construct($scenario);

        $this->SP_INSERT_NAME = '';
        $this->SP_UPDATE_NAME = '';
        $this->SP_DELETE_NAME = '';

        $Select = "\nSelect 
                    og.ObjectGr_id,
                    org.Form_id,
                    replace(Str(og.ObjectGr_id) + isnull(Str(c.ContrS_id),0), ' ', '0') PKey,
                    org.FullName,
                    a.Addr,
                    og.Address_id,
                    c.Doctype_Name,
                    c.ContrNumS,
                    c.ContrDateS,
                    dbo.FIO(e.EmployeeName) empl_name,
                    cnt.empl_id,
                    cnt.text,
                    cnt.info_id,
                    cnt.next_date,
                    cnt.next_info_id,
                    cnt.next_cntp_id,
                    cnt.note,
                    cnt.drsn_id,
                    cnt.date,
                    dr.name drsn_name,
                    ct1.ContactName cntp_name,
                    ct.ContactName next_cntp_name,
                    ci.contact next_contact,
                    ci2.contact contact,
                    c.debt,
                    r.ResultName rslt_name,
                    (select top 1 c.date from Contacts c where c.ObjectGr_id = og.ObjectGr_id and c.deldate is null Order by c.date desc, c.cont_id desc)as last_cont
                ";
        $From = "\nFrom ObjectsGroup og 
                    left join Organizations_v org on (org.Form_id = og.PropForm_id)
                    inner join Contacts cnt on (og.ObjectGr_id = cnt.ObjectGr_id and cnt.cont_id = (select top 1 cnt.cont_id from Contacts cnt where cnt.ObjectGr_id = og.ObjectGr_id and cnt.DelDate is null order by cnt.date desc, cnt.cont_id desc))
                    left join ContactInfo_v ci on (cnt.next_info_id = ci.info_id)
                    left join ContactInfo_v ci2 on (cnt.info_id = ci2.info_id)
                    left join ContactTypes ct1 on (cnt.cntp_id = ct1.contact_id)
                    left join ContactTypes ct on (cnt.next_cntp_id = ct.contact_id)
                    left join DebtReasons dr on (cnt.drsn_id = dr.drsn_id)
                    left join Results r on (cnt.rslt_id = r.Result_id)
                    left join Employees e on (cnt.empl_id = e.Employee_id)
                    inner join Addresses_v a on (og.Address_id = a.Address_id)
                    left join Contracts_v c on (c.ObjectGr_id = og.ObjectGr_id and c.DocType_id = 4 and c.ContrS_id = (select max(c2.ContrS_id) from ContractsS c2 where c2.DocType_id = 4 and c2.ObjectGr_id = og.ObjectGr_id))
                ";
        $Where = "\nWhere og.DelDate is null 
                    and ci.DelDate is null 
                    and cnt.DelDate is null
                ";
        $Order = "\nOrder by 
                    case when org.Form_id = 12 then 1
                    else 0 end,
                    FullName
                ";

        $this->Query->setSelect($Select);
        $this->Query->setFrom($From);
        $this->Query->setWhere($Where);
        $this->Query->setOrder($Order);
        
        $this->KeyFiled = 'og.ObjectGr_id';
        $this->PrimaryKey = 'ObjectGr_id';
    }
    
    public function rules()
    {
        return array(
            array('ObjectGr_id,
                    Form_id,
                    PKey,
                    FullName,
                    Addr,
                    Doctype_Name,
                    ContrNumS,
                    ContrDateS,
                    empl_name,
                    text,
                    next_date,
                    next_info_id,
                    next_cntp_id,
                    next_cntp_name,
                    next_contact,
                    Debt', 'safe'),
        );
    }
    
    public function attributeLabels()
    {
        return array(
            'ObjectGr_id' => 'ObjectGr_id',
            'Form_id' => 'Form_id',
            'PKey' => 'PKey',
            'FullName' => 'Организация',
            'Addr' => 'Адрес',
            'Doctype_Name' => 'Тип договора',
            'ContrNumS' => 'ContrNumS',
            'ContrDateS' => 'ContrDateS',
            'empl_name' => 'empl_name',
            'text' => 'text',
            'next_date' => 'next_date',
            'next_info_id' => 'next_info_id',
            'next_cntp_id' => 'next_cntp_id',
            'next_cntp_name' => 'next_cntp_name',
            'next_contact' => 'next_contact',
            'Debt' => 'Долг',
        );
    }
}






