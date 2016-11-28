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
                    org.FullName,
                    a.Addr,
                    og.Address_id,
                    --dbo.FIO(e.EmployeeName) empl_name,
					e.ShortName empl_name,
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
                    og.debt,
                    r.ResultName rslt_name,
                    cnt.date as last_cont
                ";
        $From = "\nFrom ObjectsGroup og 
                        left join Organizations_v org on (org.Form_id = og.PropForm_id)
                        inner join Contacts cnt on (og.cont_id = cnt.cont_id)
                        left join ContactInfo_v ci on (cnt.next_info_id = ci.info_id)
                        left join ContactInfo_v ci2 on (cnt.info_id = ci2.info_id)
                        left join ContactTypes ct1 on (cnt.cntp_id = ct1.contact_id)
                        left join ContactTypes ct on (cnt.next_cntp_id = ct.contact_id)
                        left join DebtReasons dr on (cnt.drsn_id = dr.drsn_id)
                        left join Results r on (cnt.rslt_id = r.Result_id)
                        left join Employees e on (cnt.empl_id = e.Employee_id)
                        inner join Addresses_v a on (og.Address_id = a.Address_id)";
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
    
    public function attributeFilters()
    {
        return array(
            'empl_name' => 'cnt.empl_id',
            'debt' => 'og.debt',
        );
        
        
    }
}






