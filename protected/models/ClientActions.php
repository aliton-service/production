<?php

class ClientActions extends MainFormModel
{
    public $Exrp_id;
    public $Date;
    public $Empl_id;
    public $Form_id;
    public $FullName;
    public $Demand_id;
    public $ContactType_id;
    public $ContactName;
    public $ActionStage_id;
    public $StageName;
    public $Report;
    public $NextDate;
    public $NextAction;
    public $SegmentName;
    public $SubSegmentName;
    public $Address;
    public $LastDateContact;
    public $EmployeeName;
    public $PlanDateExec;
    public $ActionOperationName;
    public $ActionResultName;
    public $ResponsibleName;
    public $FIO;
    public $OtherName;
    public $DateExec;
    public $ContactInfo_id;
    public $ActionStatus_id;
    public $ActionOperation_id;
    public $ActionResult_id;
    public $Responsible_id;
    public $NextContactInfo;
    public $StatusOP;
    
    function __construct($scenario = '') {
        parent::__construct($scenario);

        $this->SP_INSERT_NAME = 'INSERT_ClientActions';
        $this->SP_UPDATE_NAME = 'UPDATE_ClientActions';
        $this->SP_DELETE_NAME = '';

        $Select = "\nSelect
                        er.Exrp_id,
                        er.[Date],
                        er.Empl_id,
                        er.Form_id,
                        p.FullName,
                        er.Demand_id,
                        er.ContactType_id,
                        ct.ContactName,
                        er.ActionStage_id,
                        acs.StageName,
                        er.Report,
                        er.NextDate,
                        er.NextAction,
                        s.ClientGroup SegmentName,
                        s2.ClientGroup SubSegmentName,
                        d.[Address],
                        c.[Date] as LastDateContact,
                        dbo.FIO(e.EmployeeName) as EmployeeName,
                        er.PlanDateExec,
                        o.ActionOperationName,
                        ar.ActionResultName,
                        dbo.FIO(e2.EmployeeName) as ResponsibleName,
                        ci.FIO,
                        er.OtherName,
                        er.Report,
                        er.DateExec,
                        er.ContactInfo_id,
                        er.ActionStatus_id,
                        er.ActionOperation_id,
                        er.ActionResult_id,
                        er.Responsible_id,
                        er.NextContactInfo,
                        d.StatusOP";
        $From = "\nFrom ExecutorReports er left join ContactTypes ct on (er.ContactType_id = ct.Contact_id)
                        left join ActionStages acs on (er.ActionStage_id = acs.Stage_id)
                        left join Organizations_v p on (er.Form_id = p.Form_id)
                        left join ClientGroups s on (s.Clgr_id  = p.Segment_id)
                        left join ClientGroups s2 on (s2.Clgr_id  = p.SubSegment_id)
                        left join FullDemands d on (er.Demand_id = d.Demand_id)
                        left join Contacts c on (p.LastCont_id = c.Cont_id)
                        left join Employees e on (er.Empl_id = e.Employee_id)
                        left join ActionOperations o on (er.ActionOperation_id = o.Operation_id)
                        left join ActionResults ar on (er.ActionResult_id = ar.Result_id)
                        left join Employees e2 on (er.Responsible_id = e2.Employee_id)
                        left join ContactInfo ci on (er.ContactInfo_id = ci.Info_id)";
        $Order = "\nOrder by er.NextDate desc, er.Exrp_id desc";

        $this->Query->setSelect($Select);
        $this->Query->setFrom($From);
        $this->Query->setOrder($Order);
        
        $this->KeyFiled = 'er.Exrp_id';
        $this->PrimaryKey = 'Exrp_id';
    }
    
    public function rules()
    {
        return array(
            array('Exrp_id,
                    Date,
                    Empl_id,
                    Form_id,
                    FullName,
                    Demand_id,
                    ContactType_id,
                    ContactName,
                    ActionStage_id,
                    StageName,
                    Report,
                    NextDate,
                    NextAction,
                    SegmentName,
                    SubSegmentName,
                    Address,
                    LastDateContact,
                    DateExec,
                    ContactInfo_id,
                    ActionStatus_id,
                    ActionOperation_id,
                    ActionResult_id,
                    Responsible_id,
                    StatusOP', 'safe'),
        );
    }
    
    public function attributeLabels()
    {
        return array(
            'Exrp_id' => '',
            'Date' => '',
            'Empl_id' => '',
            'Form_id' => '',
            'FullName' => '',
            'Demand_id' => '',
            'ContactType_id' => '',
            'ContactName' => '',
            'ActionStage_id' => '',
            'StageName' => '',
            'Report' => '',
            'NextDate' => '',
            'NextAction' => '',
            'SegmentName' => '',
            'SubSegmentName' => '',
            'Address' => '',
            'LastDateContact' => '',
            'DateExec' => '',
            'ContactInfo_id' => '',
            'ActionStatus_id' => '',
            'ActionOperation_id' => '',
            'ActionResult_id' => '',
            'Responsible_id' => '',
            'NextContactInfo' => '',
            'StatusOP' => '',
        );
    }
}





