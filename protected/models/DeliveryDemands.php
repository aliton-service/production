<?php

class DeliveryDemands extends MainFormModel
{
    public $dldm_id;
    public $date;
    public $user_sender;
    public $user_sender_name;
    public $objc_id;
    public $dltp_id;
    public $DeliveryType;
    public $mstr_id;
    public $MasterName;
    public $prty_id;
    public $DemandPrior;
    public $bestdate;
    public $deadline;
    public $plandate;
    public $text;
    public $phonenumber;
    public $empl_dlvr_id;
    public $date_logist;
    public $user_logist;
    public $user_logist_name;
    public $note;
    public $Addr;
    public $date_delivery;
    public $rep_delivery;
    public $Contacts;
    public $contact_info;
    public $dlrs_id;
    public $date_promise;
    public $prtp_id;
    public $prdoc_id;
    public $calc_id;
    public $docm_id;
    public $dmnd_id;
    public $repr_id;
    public $Lock;
    public $EmplLock;
    public $DateLock;
    public $EmplCreate;
    public $DateCreate;
    public $EmplChange;
    public $DateChange;
    public $EmplDel;
    public $DelDate;
    public $DeliveryMan;
    public $delayreasonname;
            

    function __construct($scenario = '') {

        parent::__construct($scenario);

        $this->SP_INSERT_NAME = 'INSERT_DeliveryDemands';
        $this->SP_UPDATE_NAME = 'UPDATE_DeliveryDemands';
        $this->SP_DELETE_NAME = 'DELETE_DeliveryDemands';

        $Select = "\nSelect
                       d.dldm_id,
                       d.date,
                       d.user_sender,
                       e2.ShortName as user_sender_name,
                       m.ShortName as MasterName,
                       d.objc_id,
                       o.ObjectGr_id,
                       d.mstr_id,
                       a.Addr,
                       d.prty_id,
                       dp.DemandPrior,
                       d.bestdate,
                       d.deadline,
                       d.plandate,
                       d.text,
                       d.date_promise,
                       d.phonenumber,
                       d.Contacts,
                       isnull(d.phonenumber, '') + isnull(d.Contacts, '') as contact_info,
                       d.empl_dlvr_id,
                       e.ShortName DeliveryMan,
                       d.date_logist,
                       d.user_logist,
                       e3.ShortName as user_logist_name,
                       d.note,
                       d.date_delivery,
                       d.rep_delivery,
                       dt.DeliveryType,
                       d.dltp_id,
                       dp.sort,
                       dbo.get_wdays_diff(d.deadline, isnull(d.date_delivery, getdate())) as overday,
                       d.dlrs_id,
                       dr.name AS delayreasonname,
                       d.dmnd_id,
                       d.calc_id,
                       ar.AreaName";
        $From = "\nFrom DeliveryDemands d left join Objects o ON (o.Object_id = d.Objc_id)
                        left join Addresses_v a on (o.Address_id = a.Address_id)
                        left outer join Employees_ForObj_v m ON (d.mstr_id = m.Employee_id)
                        inner join DemandPriors dp on (d.prty_id = dp.DemandPrior_id)
                        left outer join Employees_ForObj_v e on (d.empl_dlvr_id = e.Employee_id)
                        left join DeliveryTypes dt on (d.dltp_id = dt.dltp_id)
                        left outer join Employees_ForObj_v e2 on (d.user_sender = e2.Employee_id)
                        left outer join Employees_ForObj_v e3 on (d.user_logist = e3.Employee_id)
                        left join ObjectsGroup og on (o.ObjectGr_id = og.ObjectGr_id)
                        left join Areas ar on (ar.Area_id = og.Area_id)
                        left join DelayReasonsLogistik as dr on (d.dlrs_id = dr.dlrs_id)
                        ";
        $Where = "\nWhere (1 = 1)";
        $Order = "\nOrder by
                      case when d.date_logist is Null then 0 else 1 end,
                      case when d.date_delivery is Null then 0 else 1 end,
                      dp.Sort,
                      d.dldm_id desc";
        $this->Query->setSelect($Select);
        $this->Query->setFrom($From);
        $this->Query->setOrder($Order);
        
        $this->KeyFiled = 'd.dldm_id';
        $this->PrimaryKey = 'dldm_id';
    }

    
        
    public function rules()
    {
        return array(
                array('prty_id, dltp_id, deadline', 'required'),
                array('dldm_id,
                        date,
                        user_sender,
                        objc_id,
                        dltp_id,
                        mstr_id,
                        prty_id,
                        bestdate,
                        deadline,
                        plandate,
                        text,
                        phonenumber,
                        empl_dlvr_id,
                        date_logist,
                        user_logist,
                        note,
                        date_delivery,
                        rep_delivery,
                        Contacts,
                        contact_info,
                        dlrs_id,
                        date_promise,
                        prtp_id,
                        prdoc_id,
                        calc_id,
                        docm_id,
                        dmnd_id,
                        repr_id,
                        Lock,
                        EmplLock,
                        DateLock,
                        EmplCreate,
                        DateCreate,
                        EmplChange,
                        DateChange,
                        EmplDel,
                        DelDate,', 'safe'),
        );
    }

    public function attributeLabels()
    {
            return array(
                    'dldm_id' => 'Dldm',
                    'date' => 'Date',
                    'user_sender' => 'User Sender',
                    'objc_id' => 'Objc',
                    'dltp_id' => 'Вид',
                    'mstr_id' => 'Mstr',
                    'prty_id' => 'Приоритет',
                    'bestdate' => 'Bestdate',
                    'deadline' => 'Deadline',
                    'plandate' => 'Plandate',
                    'text' => 'Text',
                    'contact_info' => 'contact_info',
                    'phonenumber' => 'Phonenumber',
                    'empl_dlvr_id' => 'Empl Dlvr',
                    'date_logist' => 'Date Logist',
                    'user_logist' => 'User Logist',
                    'note' => 'Note',
                    'date_delivery' => 'Date Delivery',
                    'rep_delivery' => 'Rep Delivery',
                    'Contacts' => 'Contacts',
                    'dlrs_id' => 'Dlrs',
                    'date_promise' => 'Date Promise',
                    'prtp_id' => 'Prtp',
                    'prdoc_id' => 'Prdoc',
                    'calc_id' => 'Calc',
                    'docm_id' => 'Docm',
                    'dmnd_id' => 'Dmnd',
                    'repr_id' => 'Repr',
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
    
    public function attributeFilters()
    {
        return array(
            'MasterName' => 'd.mstr_id',
            'date' => 'dbo.truncdate(d.date)',
            'DeliveryMan' => 'd.empl_dlvr_id',
            'user_sender_name' => 'd.user_sender',
        );
        
        
    }
    
    public function attributeSotrs() {
        return array(
            'user_sender_name' => 'e2.ShortName',
            'MasterName' => 'm.ShortName',
        );
    }
}
