<?php

class ObjectsGroupCostCalculations extends MainFormModel
{
    public $calc_id = null;
    public $cgrp_id = null;
    public $number = null;
    public $group_name = null;
    public $CostGroupName = null;
    public $date = null;
    public $type = null;
    public $CostCalcType = null;
    public $count_type0 = null;
    public $count_type1 = null;
    public $EmployeeName = null;
    public $cnt_date = null;
    public $cntp_name = null;
    public $FIO = null;
    public $Note = null;
    public $date_annul = null;
    public $Demand_id = null;
    public $date_ready = null;
    public $Executor = null;

    function __construct($scenario = '') {
        parent::__construct($scenario);

        $this->SP_INSERT_NAME = 'INSERT_ObjectsGroupCostCalculations';
        $this->SP_UPDATE_NAME = 'UPDATE_ObjectsGroupCostCalculations';
        $this->SP_DELETE_NAME = 'DELETE_ObjectsGroupCostCalculations';

        $Select = "\nSelect 
                        c.calc_id,
                        ccg.cgrp_id,
                        ccg.number,
                        ccg.name as group_name,
                        convert(nvarchar, ccg.number) + ' (' + isNull(ccg.name, ' ') + ')' as CostGroupName,
                        c.date,
                        c.type,
                        case when c.type = 0 then 'Коммерческое предложение'
                            when c.type = 1 then 'Смета'
                            when c.type = 2 then 'Доп. смета' end as CostCalcType,
                        sum(case when type = 0 and date_annul is null and date_ready is not null then 1 else 0 end) over(partition by ccg.cgrp_id) count_type0,
                        sum(case when type = 1 and date_annul is null then 1 else 0 end) over(partition by ccg.cgrp_id) count_type1,
                        dbo.FIO(e.EmployeeName) as EmployeeName,
                        cnt.date as cnt_date,
                        cnt.cntp_name,
                        cnt.FIO,
                        c.Note,
                        c.date_annul,
                        c.Demand_id,
                        c.date_ready,
                        c.empl_id as Executor";
        
        $From = "\nFrom CostCalcGroups ccg inner join CostCalculations c on (c.cgrp_id = ccg.cgrp_id)
                        left join Employees e on (c.Empl_id = e.Employee_id)
                        left join Contacts_v cnt on (c.cont_id = cnt.cont_id)";
        
        $Where = "\nWhere c.DelDate is Null";
        
        $Order = "\nOrder by ccg.number, c.calc_id";

        $this->Query->setSelect($Select);
        $this->Query->setFrom($From);
        $this->Query->setWhere($Where);
        $this->Query->setOrder($Order);

        $this->KeyFiled = 'c.calc_id';
        $this->PrimaryKey = 'calc_id';
    }
    /**
     * @return string the associated database table name
     */
    public function tableName()
    {
            return 'ObjectsGroupCostCalculations';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
            return array(
//			array('date, strg_id', 'required'),
                    array('calc_id, cgrp_id, number', 'numerical', 'integerOnly'=>true),
                    array('calc_id, cgrp_id, number, group_name, CostGroupName, date, type, CostCalcType, count_type0, count_type1, EmployeeName, cnt_date, '
                        . 'cntp_name, FIO, Note, date_annul, Demand_id, date_ready, Executor', 'safe'),
            );
    }


    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array(
            'calc_id' => 'calc_id',
            'cgrp_id' => 'cgrp_id',
            'number' => 'number',
            'group_name' => 'group_name',
            'CostGroupName' => 'CostGroupName',
            'date' => 'date',
            'type' => 'type',
            'CostCalcType' => 'CostCalcType',
            'count_type0' => 'count_type0',
            'count_type1' => 'count_type1',
            'EmployeeName' => 'EmployeeName',
            'cnt_date' => 'cnt_date',
            'cntp_name' => 'cntp_name',
            'FIO' => 'FIO',
            'Note' => 'Note',
            'date_annul' => 'date_annul',
            'Demand_id' => 'Demand_id',
            'date_ready' => 'date_ready',
            'Executor' => 'Executor',
        );
    }

}
