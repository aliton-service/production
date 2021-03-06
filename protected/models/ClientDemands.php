<?php


class ClientDemands extends MainFormModel
{
    public $Exrp_id;
    public $Date;
    public $Demand_id;
    public $Address;
    public $DemandType;
    public $StageName;
    public $ActionOperationName;
    public $EmplName;
    public $ActionResultName;
    public $FIO;
    public $NextDate;
    public $Report;
    public $OtherName;
    public $ObjectGr_id;
    public $ContactType_id;
    public $ContactName;
    public $NextAction;
    public $NextActionOperationName;
    public $Responsible_id;
    public $ResponsibleName;
    public $DateReg;
    public $DateExec;
            
    public function rules()
    {
        return array(
            array('Exrp_id,
                    Date,
                    Demand_id,
                    Address,
                    DemandType,
                    StageName,
                    ActionOperationName,
                    EmplName,
                    ActionResultName,
                    FIO,
                    NextDate,
                    Report,
                    OtherName,', 'safe'),
        );
            
    }
	
    function __construct($scenario = '') {

        parent::__construct($scenario);

        $this->SP_INSERT_NAME = '';
        $this->SP_UPDATE_NAME = '';
        $this->SP_DELETE_NAME = '';

        $Select = "\nSelect
                        er.Exrp_id,
                        er.[Date],
                        d.DateReg,
                        d.DateExec,
                        d.Demand_id,
                        d.ObjectGr_id,
                        d.[Address],
                        d.DemandType,
                        s.StageName,
                        o.ActionOperationName,
                        dbo.FIO(e.EmployeeName) as EmplName,
                        ar.ActionResultName,
                        ci.FIO,
                        er.NextDate,
                        er.Report,
                        er.OtherName,
                        er.ContactType_id,
                        ct.ContactName,
                        er.NextAction,
                        o2.ActionOperationName as NextActionOperationName,
                        er.Responsible_id,
                        dbo.FIO(e2.EmployeeName) as ResponsibleName";
        $From = "\nFrom FullDemands d left join ExecutorReports er on (d.LastAction_id = er.Exrp_id)
                        left join ActionStages s on (er.ActionStage_id = s.Stage_id)
                        left join ActionOperations o on (er.ActionOperation_id = o.Operation_id)
                        left join Employees e on (er.Empl_id = e.Employee_id)
                        left join ActionResults ar on (er.ActionResult_id = ar.Result_id)
                        left join ContactInfo ci on (er.ContactInfo_id = ci.Info_id)
                        left join ContactTypes ct on (er.ContactType_id = ct.Contact_id)
                        left join ActionOperations o2 on (er.NextAction = o2.Operation_id)
                        left join Employees e2 on (er.Responsible_id = e2.Employee_id)
                        left join ObjectsGroup og on (d.ObjectGr_id = og.Objectgr_id)";
        $Order = "\nOrder by d.Demand_id desc";
        
        $this->Query->setSelect($Select);
        $this->Query->setFrom($From);
        $this->Query->setOrder($Order);
        
        // Инициализация первичного ключа
        $this->KeyFiled = 'er.Exrp_id';
        $this->PrimaryKey = 'Exrp_id';
    }
    
    public function attributeLabels()
    {
            return array(
                'Exrp_id' => '',
                'Date' => '',
                'Demand_id' => '',
                'Address' => '',
                'DemandType' => '',
                'StageName' => '',
                'ActionOperationName' => '',
                'EmplName' => '',
                'ActionResultName' => '',
                'FIO' => '',
                'NextDate' => '',
                'Report' => '',
                'OtherName' => '',
            );
    }
    
    public function attributeFilters()
    {
        return array(
            'Demand_id' => 'd.Demand_id',
            'Address' => 'd.[Address]',
            'DemandType' => 'd.DemandType_id',
            'StageName' => 'er.ActionStage_id',
            'ContactType' => 'er.ActionStage_id',
            'ContactName' => 'er.ContactType_id',
            'EmplName' => 'er.Empl_id',
            'OtherName' => 'er.OtherName',
            'NextActionOperationName' => 'o2.ActionOperationName',
            'ResponsibleName' => 'dbo.FIO(e2.EmployeeName)',
        );
    }
}
