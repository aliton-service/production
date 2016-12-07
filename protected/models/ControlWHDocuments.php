<?php

class ControlWHDocuments extends MainFormModel
{
    public $dadt_id = null;
    public $eqip_id = null;
    public $docm_id = null;
    public $objc_id = null;
    public $equipname = null;
    public $um_name = null;
    public $quant = null;
    public $used = null;
    public $Addr = null;
    public $demand_id = null;
    public $dmnd_empl_id = null;
    public $dmnd_empl_name = null;
    public $ac_date = null;
    public $number = null;
    public $empl_name = null;
    public $deadline = null;
    public $overday = null;
    public $wh_cntrl_id = null;
    public $part = null;
    public $plan_date = null;
    public $SN = null;


    public $SP_INSERT_NAME = '';
    public $SP_UPDATE_NAME = '';
    public $SP_DELETE_NAME = '';


    public function rules()
    {
        return array(
            array('', 'numerical', 'integerOnly'=>true),
            array('', 'required'),
            array('', 'numerical'),
            array('', 'safe'),
        );
    }

    function __construct() {

        parent::__construct();
        $select = "\nSelect 
                        dt.dadt_id,
                        dt.eqip_id,
                        d.docm_id,
                        d.objc_id,
                        dt.equipname,
                        dt.NameUnitMeasurement um_name,
                        isnull(dt.fact_quant, dt.docm_quant) quant,
                        dt.used,
                        a.Addr + ' п. ' + isnull(o.Doorway, '') Addr,
                        isnull(d.dmnd_id, c.demand_id) demand_id,
                        d.dmnd_empl_id,
                        dbo.fio(e.EmployeeName) dmnd_empl_name,
                        ah.ac_date,
                        d.number,
                        dbo.FIO(e2.EmployeeName) empl_name,
                        dateadd(dd, 14, ah.ac_date) deadline,
                        case when dateadd(dd, 14, ah.ac_date) > getdate() then 0 else datediff(dd, dateadd(dd, 14, ah.ac_date), getdate()) end overday,
                        cl.wh_cntrl_id,
                        case when count(dt.dadt_id) over(partition by d.docm_id) > 1 then 1 else 0 end part,
                        d.plan_date,
                        (select case when Min(s.SN) is not null then '(' + Min(s.SN) + ', ...)'
                                         else '()' end SN
                            from SerialNumbers s
                            where s.dadt_id = dt.dadt_id) as SN";

        $from = "\nFrom ActionHistory ah 
                        inner join WHDocuments d on (ah.achs_id = d.achs_id)
                        inner join DocmAchsDetails_v dt on (dt.docm_id = d.docm_id)
                        inner join Objects o on (d.objc_id = o.Object_id)
                        inner join Addresses_v a on (o.Address_id = a.Address_id)
                        left join CostCalculations c on (c.calc_id = d.calc_id)
                        left join Employees_ForObj_v e on (e.Employee_id = d.dmnd_empl_id)
                        left join Employees_ForObj_v e2 on (e2.Employee_id = d.empl_id)
                        left join ControlWHDocs cl on (dt.dadt_id = cl.treb_dadt_id and cl.deldate is null)";

        $where = "\nWhere 
                        ah.DelDate is null
                        and d.DelDate is null
                        and o.DelDate is null
                        and d.rcrs_id = 8
                        and d.dctp_id = 4
                        and ah.ac_date >= '23.06.2014'";
        $order = "\nOrder by ah.achs_id desc";

        // Инициализация первичного ключа
        $this->KeyFiled = 'dt.dadt_id';
        $this->PrimaryKey = 'dadt_id';

        $this->Query->setSelect($select);
        $this->Query->setFrom($from);
        $this->Query->setWhere($where);
        $this->Query->setOrder($order);
    }



    public function attributeLabels()
    {
        return array(
            'dadt_id' => 'dadt_id',
            'eqip_id' => 'eqip_id',
            'docm_id' => 'docm_id',
            'objc_id' => 'objc_id',
            'equipname' => 'equipname',
            'um_name' => 'um_name',
            'quant' => 'quant',
            'used' => 'used',
            'Addr' => 'Addr',
            'demand_id' => 'demand_id',
            'dmnd_empl_id' => 'dmnd_empl_id',
            'dmnd_empl_name' => 'dmnd_empl_name',
            'ac_date' => 'ac_date',
            'number' => 'number',
            'empl_name' => 'empl_name',
            'deadline' => 'deadline',
            'overday' => 'overday',
            'wh_cntrl_id' => 'wh_cntrl_id',
            'part' => 'part',
            'plan_date' => 'plan_date',
            'SN' => 'SN',
        );
    }
    
    function attributeFilters()
    {
        return array(
            'dmnd_empl_name' => 'e.EmployeeName',
        );
    }
}
