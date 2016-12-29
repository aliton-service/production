<?php

class CostCalculations extends MainFormModel
{
    public $calc_id = null;
    public $cgrp_id = null;
    public $ObjectGr_id = null;
    public $group_name = null;
    public $Addr = null;
    public $FullName = null;
    public $date = null;
    public $empl_id = null;
    public $empl_name = null;
    public $PaymentType_id = null;
    public $info_id = null;
    public $best_date = null;
    public $note = null;
    public $jrdc_id = null;
    public $jrdc_name = null;
    public $koef_indirect = null;
    public $discount = null;
    public $date_annul = null;
    public $date_ready = null;
    public $date_agreed = null;
    public $EmplAgreed = null;
    public $type = null;
    public $CostCalcType = null;
    public $name = null;
    public $expences = null;
    public $starting_work = null;
    public $starting_work_low = null;
    public $starting_work_high = null;
    public $total_work = null;
    public $sum_works_high = null;
    public $sum_materials_low = null;
    public $sum_materials_high = null;
    public $EmplCreate = null;
    public $wrtp_id = null;
    public $workname = null;
    public $spec_condt = null;
    public $ContrNumS = null;
    public $ContrDateS = null;
    public $Demand_id = null;
    public $used_expences = null;
    public $regs_id = null;
    public $RegistrationName = null;
    public $Object_id = null;
    public $free_work = null;
    public $ccwt_id = null;
    public $ccwt_proc = null;
    public $repr_id = null;
    public $EmplChange = null;

    function __construct($scenario = '') {
        parent::__construct($scenario);

        $this->SP_INSERT_NAME = 'INSERT_CostCalculations';
        $this->SP_UPDATE_NAME = 'UPDATE_CostCalculations';
        $this->SP_DELETE_NAME = 'DELETE_CostCalculations';

        $Select = "\nSelect
                        cc.calc_id,
                        cc.cgrp_id,
                        cc.ObjectGr_id,
                        g.name as group_name,
                        a.Addr,
                        p.FullName,
                        cc.date,
                        cc.empl_id,
                        dbo.FIO(e.EmployeeName) empl_name,
                        cc.PaymentType_id,
                        cc.info_id,
                        cc.best_date,
                        cc.note,
                        cc.jrdc_id, 
                        j.JuridicalPerson jrdc_name,
                        cc.koef_indirect,
                        cc.discount,
                        cc.date_annul,
                        cc.date_ready,
                        cc.date_agreed,
                        e2.EmployeeName as EmplAgreed,
                        cc.type,
                        case when cc.type = 0 then 'Коммерческое предложение'
                            when cc.type = 1 then 'Смета'
                            when cc.type = 2 then 'Доп. смета' end as CostCalcType,
                        g.name,
                        isnull(cc.expences, 0) as expences,
                        cc.starting_work,
                        cc.starting_work_low,
                        cc.starting_work_high,
                        cc.total_work,
                        cc.sum_works_high,
                        cc.sum_materials_low,
                        cc.sum_materials_high,
                        cc.EmplCreate,
                        cc.wrtp_id,
                        cwt.ccwt_name as workname,
                        cc.spec_condt,
                        cc.ContrNumS,
                        cc.ContrDateS,
                        cc.Demand_id,
                        cc.used_expences,
                        cc.regs_id,
                        r.RegistrationName,
                        isNull((Select d.Object_id From Demands d inner join objects o on (d.Object_id = o.object_id) Where o.deldate is null and d.DelDate is null and d.Demand_id = cc.Demand_id), (Select Min(o.Object_id) From Objects o Where o.DelDate is null and o.ObjectGr_id = cc.ObjectGr_id and o.Doorway <> 'Общее')) as Object_id,
                        cc.free_work,
                        cc.ccwt_id,
                        isnull(cwt.ccwt_proc, 35) ccwt_proc,
                        cc.repr_id";
        
        $From = "\nFrom CostCalculations cc 
                    inner join Employees e on (cc.empl_id = e.Employee_id)
                    inner join Juridicals j on (cc.jrdc_id = j.jrdc_id)
                    inner join CostCalcGroups g on (cc.cgrp_id = g.cgrp_id)
                    left join WorkTypes wt on (wt.wrtp_id = cc.wrtp_id)
                    left join Registrations r on (r.Registration_id = cc.regs_id)
                    left join ObjectsGroup og on (cc.ObjectGr_id = og.ObjectGr_id)
                    inner join Addresses_v a on (a.Address_id = og.Address_id)
                    left join CostCalcWorkTypes cwt on (cc.ccwt_id = cwt.ccwt_id)
                    left join Employees e2 on (cc.user_agreed = e2.employee_id)
                    left join Organizations_v p on (og.PropForm_id = p.Form_id)";
        
        $Where = "\nWhere cc.DelDate is null";
        
//        $Order = "\nOrder by ";

        $this->Query->setSelect($Select);
        $this->Query->setFrom($From);
        $this->Query->setWhere($Where);
//        $this->Query->setOrder($Order);

        $this->KeyFiled = 'cc.calc_id';
        $this->PrimaryKey = 'calc_id';
    }
    public function rules()
    {
        return array(
            array('ObjectGr_id, empl_id, jrdc_id, Demand_id', 'required'),
            array('Demand_id', 'numerical', 'min' => 1),
            array('calc_id,
                    cgrp_id,
                    ObjectGr_id,
                    group_name,
                    Addr,
                    date,
                    empl_id,
                    empl_name,
                    PaymentType_id,
                    info_id,
                    best_date,
                    note,
                    jrdc_id,
                    jrdc_name,
                    koef_indirect,
                    discount,
                    date_annul,
                    date_ready,
                    date_agreed,
                    EmplAgreed,
                    type,
                    CostCalcType,
                    name,
                    expences,
                    starting_work,
                    starting_work_low,
                    starting_work_high,
                    total_work,
                    sum_works_high,
                    sum_materials_low,
                    sum_materials_high,
                    EmplCreate,
                    wrtp_id,
                    workname,
                    spec_condt,
                    ContrNumS,
                    ContrDateS,
                    Demand_id,
                    used_expences,
                    regs_id,
                    RegistrationName,
                    Object_id,
                    free_work,
                    ccwt_id,
                    ccwt_proc,
                    repr_id,
                    EmplChange', 'safe'),
        );
    }


    
    public function attributeLabels()
    {
        return array(
            'calc_id' => 'calc_id',
            'cgrp_id' => 'cgrp_id',
            'ObjectGr_id' => 'Объект',
            'Addr' => 'Addr',
            'date' => 'date',
            'empl_id' => 'Менеджер',
            'empl_name' => 'empl_name',
            'PaymentType_id' => 'PaymentType_id',
            'info_id' => 'info_id',
            'best_date' => 'best_date',
            'note' => 'note',
            'jrdc_id' => 'Юр. лицо',
            'jrdc_name' => 'jrdc_name',
            'koef_indirect' => 'koef_indirect',
            'discount' => 'discount',
            'date_annul' => 'date_annul',
            'date_ready' => 'date_ready',
            'date_agreed' => 'date_agreed',
            'EmplAgreed' => 'EmplAgreed',
            'type' => 'type',
            'CostCalcType' => 'CostCalcType',
            'name' => 'name',
            'expences' => 'expences',
            'starting_work' => 'starting_work',
            'starting_work_low' => 'starting_work_low',
            'starting_work_high' => 'starting_work_high',
            'total_work' => 'total_work',
            'sum_works_high' => 'sum_works_high',
            'sum_materials_low' => 'sum_materials_low',
            'sum_materials_high' => 'sum_materials_high',
            'EmplCreate' => 'EmplCreate',
            'wrtp_id' => 'wrtp_id',
            'workname' => 'workname',
            'spec_condt' => 'spec_condt',
            'ContrNumS' => 'ContrNumS',
            'ContrDateS' => 'ContrDateS',
            'Demand_id' => 'Заявка',
            'used_expences' => 'used_expences',
            'regs_id' => 'regs_id',
            'RegistrationName' => 'RegistrationName',
            'Object_id' => 'Object_id',
            'free_work' => 'free_work',
            'ccwt_id' => 'ccwt_id',
            'ccwt_proc' => 'ccwt_proc',
            'repr_id' => 'repr_id',
        );
    }

}
