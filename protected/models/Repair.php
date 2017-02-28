<?php

class Repair extends MainFormModel {
    public $Repr_id;
    public $objc_id;
    public $objectgr_id;
    public $status;
    public $status_name;
    public $number;
    public $date;
    public $date_exec;
    public $user_exec;
    public $date_create;
    public $best_date;
    public $action;
    public $eqip_id;
    public $EquipName;
    public $docm_quant;
    public $Addr;
    public $date_accept;
    public $prtp_id;
    public $RepairPrior;
    public $deadline;
    public $mstr_empl_id;
    public $mstr_empl_name;
    public $egnr_empl_id;
    public $egnr_empl_name;
    public $cur_empl_id;
    public $reg_empl_id;
    public $defect;
    public $SN;
    public $user_create;
    public $Return;
    public $overday;
    public $date_plan;
    public $date_fact;
    public $repair_pay;
    public $empl_from;
    public $contactface;
    public $note;
    public $sopr_num;
    public $sopr_date;
    public $edefect;
    public $eresult;
    public $rslt_id;
    public $resultname;
    public $dmnd_id;
    public $set;
    public $wrnt;
    public $work_ok;
    public $used;
    public $um_name;
    public $date_send_agree;
    public $user_send_agree;
    public $date_no_agree;
    public $user_no_agree;
    public $date_agree;
    public $date_ready;
    public $act_def_date;
    public $act_def_num;
    public $pay_diagnostics;
    public $sum_repairs;
    public $sum_diagnostics;
    public $splr_id;
    public $NameSupplier;
    public $exechour;
    public $jrdc_id;
    public $dlrs_id;
    public $DatePlan;
    public $price_low;
    public $EmplCreate;
    public $EmplChange;

    function __construct($scenario='') {
        parent::__construct($scenario);

        $this->SP_INSERT_NAME = 'INSERT_Repairs';
        $this->SP_UPDATE_NAME = 'UPDATE_Repairs';
        $this->SP_DELETE_NAME = 'DELETE_Repairs';

        $Select = "\nDeclare @Prlt_id int = dbo.get_price_list(GETDATE())
                    \nSelect
                        r.Repr_id,
                        r.objc_id,
                        r.objectgr_id,
                        r.status,
                        r.status_name,
                        r.number,
                        r.date,
                        r.date_exec,
                        r.user_exec,
                        r.date_create,
                        r.best_date,
                        r.action,
                        r.eqip_id,
                        r.EquipName,
                        r.docm_quant,
                        r.Addr,
                        r.date_accept,
                        r.prtp_id,
                        r.RepairPrior,
                        r.deadline,
                        r.mstr_empl_id,
                        r.mstr_empl_name,
                        r.egnr_empl_id,
                        r.egnr_empl_name,
                        r.cur_empl_id,
                        r.reg_empl_id,
                        r.defect,
                        r.SN,
                        r.user_create,
                        r.[Return],
                        r.overday,
                        r.date_plan,
                        r.date_fact,
                        r.repair_pay,
                        r.empl_from,
                        r.contactface,
                        r.note,
                        r.sopr_num,
                        r.sopr_date,
                        r.edefect,
                        r.eresult,
                        r.rslt_id,
                        r.resultname,
                        r.dmnd_id,
                        r.[set],
                        r.wrnt,
                        r.work_ok,
                        r.used,
                        r.um_name,
                        r.date_send_agree,
                        r.user_send_agree,
                        r.date_no_agree,
                        r.user_no_agree,
                        r.date_agree,
                        r.date_ready,
                        r.act_def_date,
                        r.act_def_num,
                        r.pay_diagnostics,
                        r.sum_repairs,
                        r.sum_diagnostics,
                        r.splr_id,
                        r.NameSupplier,
                        r.exechour,
                        r.jrdc_id,
                        r.dlrs_id,
                        r.DatePlan,
                        r.price_low";

        $From = "\nFrom Repairs_v r
                    left join PriceListDetails_v pl on (pl.prlt_id = @Prlt_id and pl.eqip_id = r.eqip_id)";
        $this->Query->setSelect($Select);
        $this->Query->setFrom($From);

        $this->KeyFiled = 'r.Repr_id';
        $this->PrimaryKey = 'Repr_id';
    }

    public function rules(){
        return array(
            array('prtp_id, objc_id, eqip_id, docm_quant, defect, mstr_empl_id, egnr_empl_id, reg_empl_id', 'required'),
            array('Repr_id,
                    objc_id,
                    objectgr_id,
                    status,
                    status_name,
                    number,
                    date,
                    date_exec,
                    user_exec,
                    date_create,
                    best_date,
                    action,
                    eqip_id,
                    EquipName,
                    docm_quant,
                    Addr,
                    date_accept,
                    prtp_id,
                    RepairPrior,
                    deadline,
                    mstr_empl_id,
                    mstr_empl_name,
                    egnr_empl_id,
                    egnr_empl_name,
                    cur_empl_id,
                    reg_empl_id,
                    defect,
                    SN,
                    user_create,
                    Return,
                    overday,
                    date_plan,
                    date_fact,
                    repair_pay,
                    empl_from,
                    contactface,
                    note,
                    sopr_num,
                    sopr_date,
                    edefect,
                    eresult,
                    rslt_id,
                    resultname,
                    dmnd_id,
                    set,
                    wrnt,
                    work_ok,
                    used,
                    um_name,
                    date_send_agree,
                    user_send_agree,
                    date_no_agree,
                    user_no_agree,
                    date_agree,
                    date_ready,
                    act_def_date,
                    act_def_num,
                    pay_diagnostics,
                    sum_repairs,
                    sum_diagnostics,
                    splr_id,
                    exechour,
                    jrdc_id,
                    dlrs_id,
                    DatePlan,
                    price_low','safe'),
        );
    }

    public function attributeLabels(){
        return array(
            'Repr_id' => '',
            'objc_id' => 'Объект',
            'objectgr_id' => '',
            'status' => '',
            'status_name' => '',
            'number' => '',
            'date' => '',
            'date_exec' => '',
            'user_exec' => '',
            'date_create' => '',
            'best_date' => '',
            'action' => '',
            'eqip_id' => 'Оборудование',
            'EquipName' => '',
            'docm_quant' => 'Кол-во',
            'Addr' => '',
            'date_accept' => '',
            'prtp_id' => 'Приоритет',
            'RepairPrior' => '',
            'deadline' => '',
            'mstr_empl_id' => 'Мастер',
            'mstr_empl_name' => '',
            'egnr_empl_id' => 'Инженер',
            'egnr_empl_name' => '',
            'cur_empl_id' => '',
            'reg_empl_id' => 'Зарегистрировал',
            'defect' => 'Неисправность',
            'SN' => '',
            'user_create' => '',
            'Return' => '',
            'overday' => '',
            'date_plan' => '',
            'date_fact' => '',
            'repair_pay' => '',
            'empl_from' => '',
            'contactface' => '',
            'note' => '',
            'sopr_num' => '',
            'sopr_date' => '',
            'edefect' => '',
            'eresult' => '',
            'rslt_id' => '',
            'resultname' => '',
            'dmnd_id' => '',
            'set' => '',
            'wrnt' => '',
            'work_ok' => '',
            'used' => '',
            'um_name' => '',
            'date_send_agree' => '',
            'user_send_agree' => '',
            'date_no_agree' => '',
            'user_no_agree' => '',
            'date_agree' => '',
            'date_ready' => '',
            'act_def_date' => '',
            'act_def_num' => '',
            'pay_diagnostics' => '',
            'sum_repairs' => '',
            'sum_diagnostics' => '',
            'splr_id' => '',
            'exechour' => '',
            'jrdc_id' => '',
            'dlrs_id' => '',
            'DatePlan' => '',
            'price_low' => '',
        );
    }
}

