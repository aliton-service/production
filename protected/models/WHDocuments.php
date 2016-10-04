<?php

class WHDocuments extends MainFormModel
{
    public $docm_id;
    public $dctp_id;
    public $date;
    public $dctp_name;
    public $dckn_id;
    public $dckn_name;
    public $number;
    public $note;
    public $splr_id;
    public $splr_name;
    public $objc_id;
    public $Address;
    public $rtrs_id;
    public $rtrs_name;
    public $in_docm_id;
    public $in_number;
    public $in_date;
    public $wrtp_id;
    public $wrtp_name;
    public $prty_id;
    public $prty_name;
    public $rcrs_id;
    public $rcrs_name;
    public $best_date;
    public $deadline;
    public $dmnd_empl_id;
    public $dmnd_empl_name;
    public $prms_empl_id;
    public $prms_empl_name;
    public $achs_id;
    public $status;
    public $empl_id;
    public $empl_name;
    public $ReceiptNumber;
    public $ReceiptDate;
    public $dlrs_id;
    public $date_promise;
    public $date_change;
    public $Emplchange;
    public $EmplChangeName;
    public $jrdc_id;
    public $JuridicalPerson;
    public $prtp_id;
    public $prdoc_id;
    public $date_prchs;
    public $Emplcreate;
    public $state_prchs;
    public $calc_id;
    public $repr_id;
    public $demand_id;
    public $dmnd_id;
    public $notes;
    public $date_ready;
    public $plan_date;
    public $strg_id;
    public $storage;
    public $in_strg_id;
    public $in_storage;
    public $control;
    
    function __construct($scenario = '') {
        parent::__construct($scenario);

        $this->SP_INSERT_NAME = '';
        $this->SP_UPDATE_NAME = 'UPDATE_WHDocuments';
        $this->SP_DELETE_NAME = '';

        $Select = "\nSelect Top 1  
                        d.docm_id,
                        d.dctp_id,
                        d.date,
                        d.dctp_name,
                        d.dckn_id,
                        d.dckn_name,
                        d.number,
                        d.note,
                        d.splr_id,
                        d.splr_name,
                        d.objc_id,
                        d.Address,
                        d.rtrs_id,
                        d.rtrs_name,
                        d.in_docm_id,
                        in_doc.number in_number,
                        in_doc.date in_date,
                        d.wrtp_id,
                        d.wrtp_name,
                        d.prty_id,
                        d.prty_name,
                        d.rcrs_id,
                        d.rcrs_name,
                        d.best_date,
                        d.deadline,
                        d.dmnd_empl_id,
                        d.dmnd_empl_name,
                        d.prms_empl_id,
                        d.prms_empl_name,
                        d.achs_id,
                        d.status,
                        d.empl_id,
                        d.empl_name,
                        d.ReceiptNumber,
                        d.ReceiptDate,
                        d.dlrs_id,
                        d.date_promise,
                        d.date_change,
                        d.Emplchange,
                        dbo.FIO_N(d.EmplChange) as EmplChangeName,
                        d.jrdc_id,
                        d.JuridicalPerson,
                        d.prtp_id,
                        d.prdoc_id,
                        d.date_prchs,
                        d.Emplcreate,
                        case when d.date_prchs is not null then 'Требуется закупка' else '' end state_prchs,
                        d.calc_id,
                        d.repr_id,
                        case when isnull(d.dmnd_id, d.demand_id) is null then isnull(d.prdoc_id, 0) else  isnull(d.dmnd_id, d.demand_id) end demand_id,
                        d.dmnd_id,
                        dbo.get_wh_notes(d.docm_id) notes,
                        d.date_ready,
                        d.plan_date,
                        d.strg_id,
                        d.storage,
                        d.in_strg_id,
                        d.in_storage,
                        d.control";
        $From = "\nFrom WHDocuments_v d left outer join WHDocuments_v in_doc on (d.in_docm_id = in_doc.docm_id)";
        

        $this->Query->setSelect($Select);
        $this->Query->setFrom($From);
        //$this->Query->setWhere($Where);
        //$this->Query->setOrder($Order);
        
        $this->KeyFiled = 'd.docm_id';
        $this->PrimaryKey = 'docm_id';
    }
    
    public function rules()
    {
        return array(
            array('docm_id,
                    dctp_id,
                    date,
                    dctp_name,
                    dckn_id,
                    dckn_name,
                    number,
                    note,
                    splr_id,
                    splr_name,
                    objc_id,
                    Address,
                    rtrs_id,
                    rtrs_name,
                    in_docm_id,
                    in_number,
                    in_date,
                    wrtp_id,
                    wrtp_name,
                    prty_id,
                    prty_name,
                    rcrs_id,
                    rcrs_name,
                    best_date,
                    deadline,
                    dmnd_empl_id,
                    dmnd_empl_name,
                    prms_empl_id,
                    prms_empl_name,
                    achs_id,
                    status,
                    empl_id,
                    empl_name,
                    ReceiptNumber,
                    ReceiptDate,
                    dlrs_id,
                    date_promise,
                    date_change,
                    Emplchange,
                    EmplChangeName,
                    jrdc_id,
                    JuridicalPerson,
                    prtp_id,
                    prdoc_id,
                    date_prchs,
                    Emplcreate,
                    state_prchs,
                    calc_id,
                    repr_id,
                    demand_id,
                    dmnd_id,
                    notes,
                    date_ready,
                    plan_date,
                    strg_id,
                    storage,
                    in_strg_id,
                    in_storage,
                    control,', 'safe'),
        );
    }
    
    public function attributeLabels()
    {
        return array(
            'docm_id' => '',
            'dctp_id' => '',
            'date' => '',
            'dctp_name' => '',
            'dckn_id' => '',
            'dckn_name' => '',
            'number' => '',
            'note' => '',
            'splr_id' => '',
            'splr_name' => '',
            'objc_id' => '',
            'Address' => '',
            'rtrs_id' => '',
            'rtrs_name' => '',
            'in_docm_id' => '',
            'in_number' => '',
            'in_date' => '',
            'wrtp_id' => '',
            'wrtp_name' => '',
            'prty_id' => '',
            'prty_name' => '',
            'rcrs_id' => '',
            'rcrs_name' => '',
            'best_date' => '',
            'deadline' => '',
            'dmnd_empl_id' => '',
            'dmnd_empl_name' => '',
            'prms_empl_id' => '',
            'prms_empl_name' => '',
            'achs_id' => '',
            'status' => '',
            'empl_id' => '',
            'empl_name' => '',
            'ReceiptNumber' => '',
            'ReceiptDate' => '',
            'dlrs_id' => '',
            'date_promise' => '',
            'date_change' => '',
            'Emplchange' => '',
            'EmplChangeName' => '',
            'jrdc_id' => '',
            'JuridicalPerson' => '',
            'prtp_id' => '',
            'prdoc_id' => '',
            'date_prchs' => '',
            'Emplcreate' => '',
            'state_prchs' => '',
            'calc_id' => '',
            'repr_id' => '',
            'demand_id' => '',
            'dmnd_id' => '',
            'notes' => '',
            'date_ready' => '',
            'plan_date' => '',
            'strg_id' => '',
            'storage' => '',
            'in_strg_id' => '',
            'in_storage' => '',
            'control' => '',
        );
    }
}






