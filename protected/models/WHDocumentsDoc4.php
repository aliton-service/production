<?php

class WHDocumentsDoc4 extends MainFormModel
{
    public $docm_id;
    public $dctp_id;
    public $objc_id;
    public $dctp_name;
    public $number;
    public $date;
    public $date_create;
    public $prty_id;
    public $prty_name;
    public $wrtp_id;
    public $wrtp_name;
    public $Address;
    public $AddressForFind;
    public $best_date;
    public $deadline;
    public $date_ready;
    public $ac_date;
    public $dmnd_empl_name;
    public $dmnd_empl_id;
    public $prms_empl_id;
    public $prms_empl_name;
    public $empl_name;
    public $empl_id;
    public $ReceiptNumber;
    public $ReceiptDate;
    public $strm_name;
    public $mstr_name;
    public $rcrs_id;
    public $rcrs_name;
    public $StatusFull;
    public $status;
    public $date_promise;
    public $achs_id;
    public $c_date;
    public $c_name;
    public $c_confirmname;
    public $overday;
    public $date_prchs;
    public $empl_prchs;
    public $name_prchs;
    public $state_prchs;
    public $strg_id;
    public $storage;
    public $control;
    public $note;
    public $plan_date;
    public $calc_id;
    public $repr_id;
    public $dmnd_id;
    
    function __construct($scenario = '') {
        parent::__construct($scenario);

        $this->SP_INSERT_NAME = 'INSERT_Treb';
        $this->SP_UPDATE_NAME = 'UPDATE_Treb';
        $this->SP_DELETE_NAME = '';

        $Select = "\nSelect 
                        d.docm_id,
                        d.dctp_id,
                        d.objc_id,
                        d.dctp_name,
                        d.number,
                        d.date,
                        d.date_create,
                        d.prty_id,
                        d.prty_name,
                        d.wrtp_id,
                        d.wrtp_name,
                        d.Address,
                        d.Address as AddressForFind,
                        d.best_date,
                        d.deadline,
                        d.date_ready,
                        a.ac_date,
                        d.dmnd_empl_name,
                        d.dmnd_empl_id,
                        d.prms_empl_id,
                        d.prms_empl_name,
                        d.empl_name,
                        d.empl_id,
                        d.ReceiptNumber,
                        d.ReceiptDate,
                        dbo.FIO(a.strm_name) as strm_name,
                        dbo.FIO(a.empl_to_name) as mstr_name,
                        d.rcrs_id,
                        d.rcrs_name,
                        d.StatusFull,
                        d.status,
                        d.date_promise,
                        a.achs_id,
                        ac.date as c_date,
                        ac.EmployeeName as c_name,
                        ac.ConfirmCancelName as c_confirmname,
                        case when isnull(d.date_ready, null) > d.deadline then dbo.get_wdays_diff(d.deadline, isNull(d.date_ready, getdate())) else 0 end as overday,
                        d.date_prchs,
                        d.empl_prchs,
                        d.name_prchs,
                        d.state_prchs,
                        d.strg_id,
                        d.storage,
                        d.control,
                        d.note,
                        d.plan_date,
                        d.repr_id,
                        d.dmnd_id";
        $From = "\nFrom WHDocuments_Treb_v d left join ActionHistory_v a on (d.achs_id = a.achs_id)
                        left join ActionConfirm_v ac on (ac.docm_id = d.docm_id)";
        $Where = "\nWhere d.dctp_id = 4";
        $Order = "\nOrder by case when (d.achs_id is null ) then  0 else 1 end, case when (d.date_ready is null ) then 0 else 1 end, a.ac_date desc, d.deadline";

        $this->Query->setSelect($Select);
        $this->Query->setFrom($From);
        $this->Query->setWhere($Where);
        $this->Query->setOrder($Order);
        
        $this->KeyFiled = 'd.docm_id';
        $this->PrimaryKey = 'docm_id';
    }
    
    public function rules()
    {
        return array(
            array('date, prty_id, strg_id, dmnd_empl_id, empl_id, prms_empl_id, wrtp_id, objc_id', 'required'),
            array('docm_id,
                    dctp_id,
                    objc_id,
                    dctp_name,
                    number,
                    date,
                    date_create,
                    prty_id,
                    prty_name,
                    wrtp_id,
                    wrtp_name,
                    Address,
                    AddressForFind,
                    best_date,
                    deadline,
                    date_ready,
                    ac_date,
                    dmnd_empl_name,
                    dmnd_empl_id,
                    prms_empl_name,
                    empl_name,
                    empl_id,
                    ReceiptNumber,
                    ReceiptDate,
                    strm_name,
                    mstr_name,
                    rcrs_id,
                    rcrs_name,
                    StatusFull,
                    status,
                    date_promise,
                    achs_id,
                    c_date,
                    c_name,
                    c_confirmname,
                    overday,
                    date_prchs,
                    empl_prchs,
                    name_prchs,
                    state_prchs,
                    strg_id,
                    storage,
                    control,
                    note,
                    plan_date,
                    calc_id,
                    repr_id,
                    dmnd_id', 'safe'),
        );
    }
    
    public function attributeLabels()
    {
        return array(
            'docm_id' => '',
            'dctp_id' => '',
            'objc_id' => 'Адрес',
            'dctp_name' => '',
            'number' => '',
            'date' => 'Дата',
            'date_create' => '',
            'prty_id' => 'Приоритет',
            'prty_name' => '',
            'wrtp_id' => 'Вид работы',
            'wrtp_name' => '',
            'Address' => '',
            'AddressForFind' => '',
            'best_date' => '',
            'deadline' => '',
            'date_ready' => '',
            'ac_date' => '',
            'dmnd_empl_name' => 'Затребовал',
            'dmnd_empl_id' => 'Затребовал',
            'prms_empl_id' => 'Разрешил',
            'prms_empl_name' => '',
            'empl_name' => '',
            'empl_id' => 'Выписал',
            'ReceiptNumber' => '',
            'ReceiptDate' => '',
            'strm_name' => '',
            'mstr_name' => '',
            'rcrs_id' => '',
            'rcrs_name' => '',
            'StatusFull' => '',
            'status' => '',
            'date_promise' => '',
            'achs_id' => '',
            'c_date' => '',
            'c_name' => '',
            'c_confirmname' => '',
            'overday' => '',
            'date_prchs' => '',
            'empl_prchs' => '',
            'name_prchs' => '',
            'state_prchs' => '',
            'strg_id' => 'Склад',
            'storage' => '',
            'control' => '',
            'note' => '',
            'plan_date' => '',
            'calc_id' => 'calc_id',
            'repr_id' => 'repr_id',
            'dmnd_id' => '',
        );
    }
    
    public function attributeFilters()
    {
        return array(
            'date' => 'd.date',
            'splr_name' => 'd.splr_id',
            'overday' => '(case when isnull(d.date_ready, null) > d.deadline then dbo.get_wdays_diff(d.deadline, isNull(d.date_ready, getdate())) else 0 end)',
            'c_date' => 'ac.date',
            'c_name' => 'ac.EmployeeName',
            'c_confirmname' => 'ac.ConfirmCancelName',
            'dmnd_empl_name' => 'd.dmnd_empl_id',
            'AddressForFind' => 'd.objc_id',
        );
    }
    
    public function attributeSotrs() {
        return array(
            'date' => 'd.date',
            'splr_name' => 'd.splr_name',
            'overday' => '(case when isnull(d.date_ready, null) > d.deadline then dbo.get_wdays_diff(d.deadline, isNull(d.date_ready, getdate())) else 0 end)',
            'c_date' => 'ac.date',
            'c_name' => 'ac.EmployeeName',
            'c_confirmname' => 'ac.ConfirmCancelName',
            'AddressForFind' => 'd.Address',
        );
    }
    
}












