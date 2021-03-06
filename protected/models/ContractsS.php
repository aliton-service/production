<?php

class ContractsS extends MainFormModel
{
    public $ContrS_id = null;
    public $ObjectGr_id = null;
    public $ContrNumS = null;
    public $title = null;
    public $ContrDateS = null;
    public $ContrSDateStart = null;
    public $ContrSDateEnd = null;
    public $DatePay = null;
    public $Price = null;
    public $PriceMonth = null;
    public $Empl_id = null;
    public $Master = null;
    public $MasterTel = null;
    public $ServiceType_id = null;
    public $Debtor = null;
    public $ContrNote = null;
    public $DateCreate = null;
    public $DateChange = null;
    public $User2 = null;
    public $ServiceRate_id = null;
    public $PaymentPeriod_id = null;
    public $PaymentType_id = null;
    public $DocType_id = null;
    public $DocType_Name = null;
    public $Reason_id = null;
    public $LastChangeDate = null;
    public $SpecialCondition = null;
    public $Jrdc_id = null;
    public $DelDate = null;
    public $crtp_id = null;
    public $crtp_name = null;
    public $Prolong = null;
    public $date_doc = null;
    public $date_act = null;
    public $Debt = null;
    public $DateExecuting = null;
    public $dmnd_id = null;
    public $JobExec = null;
    public $CalcSum = null;
    public $calc_id = null;
    public $WorkText = null;
    public $ExecDay = null;
    public $PrePayment = null;
    public $Garant = null;
    public $Annex = null;
    public $DocNumber = null;
    public $DocDate = null;
    public $Info = null;
    public $date_checkup = null;
    public $discount = null;
    public $Lock = null;
    public $EmplLock = null;
    public $DateLock = null;
    public $EmplCreate = null;
    public $EmplChange = null;
    public $EmplDel = null;
    public $UserCheckUp = null;
    public $JuridicalPerson = null;
    public $MasterName = null;
    public $PropForm_id = null;
    public $SumPay;



    public $SP_INSERT_NAME = '';
    public $SP_UPDATE_NAME = '';
    public $SP_DELETE_NAME = '';
    public $SP_CLEARContractPriceHistory_NAME = '';


    public function rules()
    {
        return array(
            array('ObjectGr_id, Empl_id, Master, ServiceType_id, ServiceRate_id, PaymentPeriod_id, PaymentType_id, DocType_id, Reason_id, Jrdc_id, crtp_id, dmnd_id, calc_id, ExecDay, Garant, Info, EmplLock, EmplCreate, EmplChange, EmplDel, UserCheckUp', 'numerical', 'integerOnly'=>true),
            array('ContrDateS, ContrNumS', 'required'),
            array('Price, PriceMonth, Debt, PrePayment, discount', 'numerical'),
            array('ContrNumS, DocNumber', 'length', 'max'=>30),
            array('MasterTel, User2', 'length', 'max'=>50),
            array('ContrNote, SpecialCondition', 'length', 'max'=>1073741823),
            array('CalcSum', 'length', 'max'=>19),
            array('ContrDateS, ContrSDateStart, ContrSDateEnd, DatePay, Debtor, DateCreate, DateChange, LastChangeDate, DelDate, Prolong, date_doc, date_act, DateExecuting, JobExec, WorkText, Annex, DocDate, date_checkup, Lock, DateLock', 'safe'),
            array('ContrS_id, ObjectGr_id, ContrNumS, ContrDateS, ContrSDateStart, ContrSDateEnd, DatePay, Price, PriceMonth, Empl_id, Master, MasterName, MasterTel, ServiceType_id, Debtor, ContrNote, DateCreate, DateChange, User2, ServiceRate_id, PaymentPeriod_id, PaymentType_id, DocType_id, Reason_id, LastChangeDate, SpecialCondition, Jrdc_id, DelDate, crtp_id, Prolong, date_doc, date_act, Debt, DateExecuting, dmnd_id, JobExec, CalcSum, calc_id, WorkText, ExecDay, PrePayment, Garant, Annex, DocNumber, DocDate, Info, date_checkup, discount, Lock, EmplLock, DateLock, EmplCreate, EmplChange, EmplDel, UserCheckUp', 'safe'),
        );
    }

    function __construct($scenario='') {

        $this->SP_DELETE_NAME = 'DELETE_CONTRACTS';
        $this->SP_CLEARContractPriceHistory_NAME = 'CLEAR_ContractPriceHistory';

        parent::__construct($scenario);
        $select = "\nSelect
                        c.ContrS_id,
                        c.ContrDateS,
                        c.ContrNumS,
                        dt.DocType_Name,
                        c.crtp_id,
                        ct.name crtp_name,
                        c.date_doc,
                        c.ContrSDateStart,
                        c.ContrSDateEnd,
                        c.Reason_id,
                        c.Price,
                        c.DatePay,
                        dbo.get_sumpayments(c.ContrS_id) as SumPay,
                        c.Debtor,
                        c.PriceMonth,
                        c.LastChangeDate,
                        pp.PaymentName,
                        pt.PaymentTypeName,
                        a.Addr,
                        c.Debt,
                        c.CalcSum,
                        c.Jrdc_id,
                        j.JuridicalPerson,
                        e.EmployeeName MasterName,
                        c.SpecialCondition,
                        c.Note ContrNote,
                        c.DateExecuting,
                        og.PropForm_id,
                        case when c.DocType_id = 4 then round(c.PriceMonth, 2) else round(c.Price, 2) end Price";

        $from = "\nFrom ContractsS c 
                        left join ObjectsGroup og on (c.ObjectGr_id = og.ObjectGr_id)
                        left join Addresses_v a on (a.Address_id = og.Address_id)
                        left join DocTypes dt on (c.DocType_id = dt.DocType_Id)
                        left join ContractTypes ct on (c.crtp_id = ct.crtp_id)
                        left join PaymentPeriods pp on (c.PaymentPeriod_id = pp.PaymentPeriod_Id)
                        left join PaymentTypes pt on (c.PaymentType_id = pt.PaymentType_Id)
                        left join Juridicals j on (c.Jrdc_id = j.Jrdc_id)
                        left join Employees_ForObj_v e on (c.Master = e.Employee_id)";

        $where = "\nWhere 
                        c.DelDate is null
                        and og.DelDate is null
                        and c.DocType_id in (3, 4, 5, 8)";

        $order = "\nOrder by c.ContrS_id";

        // Инициализация первичного ключа
        $this->KeyFiled = 'c.contrs_id';
        $this->PrimaryKey = 'contrs_id';

        $this->Query->setSelect($select);
        $this->Query->setFrom($from);
        $this->Query->setWhere($where);
        $this->Query->setOrder($order);
    }



    public function attributeLabels()
    {
        return array(
            'ContrS_id' => 'Contr S',
            'ObjectGr_id' => 'Object Gr',
            'ContrNumS' => 'Contr Num S',
            'ContrDateS' => 'Contr Date S',
            'ContrSDateStart' => 'Contr Sdate Start',
            'ContrSDateEnd' => 'Contr Sdate End',
            'DatePay' => 'Date Pay',
            'Price' => 'Price',
            'PriceMonth' => 'Price Month',
            'Empl_id' => 'Empl',
            'Master' => 'Master',
            'MasterTel' => 'Master Tel',
            'ServiceType_id' => 'Service Type',
            'Debtor' => 'Debtor',
            'ContrNote' => 'Contr Note',
            'DateCreate' => 'Date Create',
            'DateChange' => 'Date Change',
            'User2' => 'User2',
            'ServiceRate_id' => 'Service Rate',
            'PaymentPeriod_id' => 'Payment Period',
            'PaymentType_id' => 'Payment Type',
            'DocType_id' => 'Doc Type',
            'Reason_id' => 'Reason',
            'LastChangeDate' => 'Last Change Date',
            'SpecialCondition' => 'Special Condition',
            'Jrdc_id' => 'Jrdc',
            'DelDate' => 'Del Date',
            'crtp_id' => 'Crtp',
            'Prolong' => 'Prolong',
            'date_doc' => 'Date Doc',
            'date_act' => 'Date Act',
            'Debt' => 'Debt',
            'DateExecuting' => 'Date Executing',
            'dmnd_id' => 'Dmnd',
            'JobExec' => 'Job Exec',
            'CalcSum' => 'Calc Sum',
            'calc_id' => 'Calc',
            'WorkText' => 'Work Text',
            'ExecDay' => 'Exec Day',
            'PrePayment' => 'Pre Payment',
            'Garant' => 'Garant',
            'Annex' => 'Annex',
            'DocNumber' => 'Doc Number',
            'DocDate' => 'Doc Date',
            'Info' => 'Info',
            'date_checkup' => 'Date Checkup',
            'discount' => 'Discount',
            'Lock' => 'Lock',
            'EmplLock' => 'Empl Lock',
            'DateLock' => 'Date Lock',
            'EmplCreate' => 'Empl Create',
            'EmplChange' => 'Empl Change',
            'EmplDel' => 'Empl Del',
            'UserCheckUp' => 'User Check Up',
            'PropForm_id' => 'PropForm_id',
        );
    }

    public function ClearContractPriceHistory()
    {
        // Очистка тарифов в истории изменения расценок
        if ($this->SP_CLEARContractPriceHistory_NAME == null)
            return 0;
        
        $this->execProcedure($this->SP_CLEARContractPriceHistory_NAME);
    }
}
