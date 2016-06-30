<?php

class ControlContacts extends MainFormModel
{
    public $cont_id;
    public $ObjectGr_id;
    public $next_date;
    public $date;
    public $next_cntp_id;
    public $contactname;
    public $next_info_id;
    public $next_contact;
    public $PropForm_id;
    public $FullName;
    public $Addr;
    public $debt;
    public $empl_id;
    public $empl_name;
    
    function __construct($scenario = '') {
        parent::__construct($scenario);

        $this->SP_INSERT_NAME = '';
        $this->SP_UPDATE_NAME = '';
        $this->SP_DELETE_NAME = '';

        $Select = "\nSelect
                        cnt.cont_id,
                        cnt.ObjectGr_id,
                        cnt.next_date,
                        cnt.date,
                        cnt.next_cntp_id,
                        ct.contactname,
                        cnt.next_info_id,
                        ci.contact next_contact,
                        og.PropForm_id,
                        o.FullName,
                        a.Addr,
                        o.debt,
                        cnt.empl_id,
                        dbo.FIO(e.EmployeeName) empl_name";
        $From = "\nFrom Contacts cnt left join ContactTypes ct on (cnt.next_cntp_id = ct.contact_id)
                        left join ContactInfo_v ci on (cnt.next_info_id = ci.info_id)
                        inner join ObjectsGroup og on (cnt.ObjectGr_id = og.ObjectGr_id)
                        left join Organizations_v o on (og.PropForm_id = o.Form_id)
                        inner join Addresses_v a on (og.Address_id = a.Address_id)
                        left join Employees e on (cnt.empl_id = e.Employee_id)";
        $Where = "\nWhere cnt.DelDate is null
                        and og.DelDate is null
                        and cnt.next_date is not null";
        $Order = "\nOrder by cnt.next_date desc";

        $this->Query->setSelect($Select);
        $this->Query->setFrom($From);
        $this->Query->setWhere($Where);
        $this->Query->setOrder($Order);
        
        $this->KeyFiled = 'cnt.cont_id';
        $this->PrimaryKey = 'cont_id';
    }
    
    public function rules()
    {
        return array(
            array('cont_id,
                    ObjectGr_id,
                    next_date,
                    date,
                    next_cntp_id,
                    contactname,
                    next_info_id,
                    next_contact,
                    PropForm_id,
                    FullName,
                    Addr,
                    debt,
                    empl_id,
                    empl_name', 'safe'),
        );
    }
    
    public function attributeLabels()
    {
        return array(
            'cont_id' => 'cont_id',
            'ObjectGr_id' => 'ObjectGr_id',
            'next_date' => 'next_date',
            'date' => 'date',
            'next_cntp_id' => 'next_cntp_id',
            'contactname' => 'contactname',
            'next_info_id' => 'next_info_id',
            'next_contact' => 'next_contact',
            'PropForm_id' => 'PropForm_id',
            'FullName' => 'FullName',
            'Addr' => 'Addr',
            'debt' => 'debt',
            'empl_id' => 'empl_id',
            'empl_name' => 'empl_name',
        );
    }
}






