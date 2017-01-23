<?php


class Events extends MainFormModel
{
    public $Evnt_id;
    public $Evtp_id;
    public $EventType;
    public $ObjectGr_id;
    public $Date;
    public $DateExec;
    public $Empl_id;
    public $EmployeeName;
    public $Addr;
    public $OverDay;
    public $Note;
    public $DateAct;
    public $DatePlan;
    public $Rpfr_id;
    public $Evaluation;
    public $Prds_id;
    public $Who_reported;
    public $EmplCreate;
    public $EmplChange;
    public $datestart;
    public $dateend;
    public $EmplDel;

    public $KeyFiled = 'e.Evnt_id';
    public $PrimaryKey = 'Evnt_id';

    public $SP_INSERT_NAME = 'AUTO_Events';
    public $SP_UPDATE_NAME = 'UPDATE_Events2';
    public $SP_DELETE_NAME = 'DELETE_Events';


    public function __construct($scenario = '') {
        parent::__construct($scenario);
        $Select = "\nSelect
                        e.Evnt_id,
                        e.Evtp_id,
                        et.EventType,
                        e.ObjectGr_id,
                        e.Date,
                        e.Date_exec as DateExec,
                        e.Empl_id,
                        e1.ShortName as EmployeeName,
                        a.Addr,
                        datediff(dd, dateadd(mm, 1, dbo.encodedate(5, month(e.date), year(e.date))), isnull(e.date_exec, getdate())) OverDay,
                        e.Note,
                        e.Date_act as DateAct,
                        e.date_plan as DatePlan,
                        e.Rpfr_id,
                        e.Evaluation,
                        e.Prds_id,
                        e.Who_reported,
                        e2.ShortName as EmplCreate";
        $From = "\nFrom Events e inner join EventTypes et on (e.evtp_id = et.evtp_id)
                        inner join ObjectsGroup og on (e.ObjectGr_id = og.ObjectGr_id)
                        inner join Addresses_v a on (og.Address_id = a.Address_id)
                        left join Employees_forobj_v e1 on (e.empl_id = e1.employee_id)
                        left join Employees_forobj_v e2 on (e.EmplCreate = e2.employee_id)";
        $Where = "\nWhere
                        e.DelDate is null
                        and og.DelDate is Null";

        $Order = "\nOrder by et.EventType, e.Date";

        $this->Query->setSelect($Select);
        $this->Query->setFrom($From);
        $this->Query->setOrder($Order);
        $this->Query->setWhere($Where);
    }

    public function rules()
    {
        return array(
            array('Evnt_id,
                    Evtp_id,
                    EventType,
                    ObjectGr_id,
                    Date,
                    DateExec,
                    Empl_id,
                    EmployeeName,
                    Addr,
                    OverDay,
                    Note,
                    DateAct,
                    DatePlan,
                    Rpfr_id,
                    Evaluation,
                    Prds_id,
                    Who_reported,
                    EmplCreate,
                    datestart,
                    dateend', 'safe'),
        );
    }


    public function attributeLabels()
    {
        return array(
            'Evnt_id' => '',
            'Evtp_id' => '',
            'EventType' => '',
            'ObjectGr_id' => '',
            'Date' => '',
            'DateExec' => '',
            'Empl_id' => '',
            'EmployeeName' => '',
            'Addr' => '',
            'OverDay' => '',
            'Note' => '',
            'DateAct' => '',
            'DatePlan' => '',
            'Rpfr_id' => '',
            'Evaluation' => '',
            'Prds_id' => '',
            'Who_reported' => '',
            'EmplCreate' => '',
            'datestart' => '',
            'dateend' => '',
        );
    }

    public function attributeFilters()
    {
        return array(
            'ObjectGr_id' => 'e.ObjectGr_id',
            'Evtp_id' => 'e.Evtp_id',
            'DateExec' => 'e.Date_exec',
            'EmployeeName' => 'e.Empl_id',
        );
    }
}
