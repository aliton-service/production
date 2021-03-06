<?php

class DiaryActions extends MainFormModel
{
    public $Exrp_id;
    public $Date;
    public $FullName;
    public $SegmentName;
    public $SubSegmentName;
    public $Address;
    public $Demand_id;
    public $Form_id;
    public $ContactName;
    public $StageName;
    public $DIFF_STR;
    public $LastDateContact;
    public $StatusOP;
    public $NextAction;
    public $NextDate;
    public $Responsible_id;
    public $ResponsibleName;
    public $EmployeeName;
    public $OverDay;
    public $DemandType;
    public $ObjectGr_id;
    public $Contacts;
    public $DemandText;
    
    function __construct($scenario = '') {
        parent::__construct($scenario);

        $this->SP_INSERT_NAME = '';
        $this->SP_UPDATE_NAME = '';
        $this->SP_DELETE_NAME = '';

        $Select = "\nSelect
                        er.Exrp_id,
                        er.[Date],
                        p.FullName,
                        s.ClientGroup as SegmentName,
                        ss.ClientGroup as SubSegmentName,
                        case when er.Demand_id = 0 then dbo.address(p.jregion, p.jstreet, p.jhouse, p.jcorp, p.jroom) else d.[Address] end [Address],
                        er.Demand_id,
                        er.Form_id,
                        ct.ContactName,
                        stg.StageName,
                        dbo.GET_DATEDIFF_STR(er.[Date], GETDATE()) as DIFF_STR,
                        c.[Date] LastDateContact,
                        Case When d.StatusOP = 1 Then 'Холодный'
                                 When d.StatusOP = 2 Then 'Теплый'
                                 When d.StatusOP = 3 Then 'Горячий' End StatusOP,
                        er.NextAction,
                        er.NextDate,
                        er.Responsible_id,
                        dbo.FIO(e.EmployeeName) ResponsibleName,
                        dbo.FIO(e2.EmployeeName) EmployeeName,
                        Case When dbo.truncdate(GETDATE()) > er.NextDate Then 1 Else 0 End OverDay,
                        d.DemandType,
                        Case When d.ObjectGr_id is Not Null Then d.ObjectGr_id Else (Select Min(og.ObjectGr_id) From ObjectsGroup og Where og.DelDate is Null and og.PropForm_id = p.Form_id) End ObjectGr_id,
                        d.Contacts,
                        d.DemandText";
        $From = "\nFrom ExecutorReports er inner join Organizations_v p on (er.Exrp_id = p.LastAction_id)
                        left join ClientGroups s on (p.Segment_id = s.Clgr_id)
                        left join ClientGroups ss on (p.SubSegment_id = ss.Clgr_id)
                        left join FullDemands d on (er.Demand_id = d.Demand_id)
                        left join ContactTypes ct on (er.ContactType_id = ct.Contact_id)
                        left join ActionStages stg on (er.ActionStage_id = stg.Stage_id)
                        left join Contacts c on (p.LastCont_id = c.Cont_id)
                        left join Employees e on (er.Responsible_id = e.Employee_id)
                        left join Employees e2 on (er.Empl_id = e2.Employee_id)";
        $Where = "\nWhere er.DelDate is Null";
        //        . " and er.NextDate is not  Null";
        $Order = "\nOrder by er.NextDate DESC";

        $this->Query->setSelect($Select);
        $this->Query->setFrom($From);
        $this->Query->setWhere($Where);
        $this->Query->setOrder($Order);
        
        $this->KeyFiled = 'er.Exrp_id';
        $this->PrimaryKey = 'Exrp_id';
    }
    
    public function rules()
    {
        return array(
            array('Exrp_id,
                    Date,
                    FullName,
                    SegmentName,
                    SubSegmentName,
                    Address,
                    Demand_id,
                    ContactName,
                    StageName,
                    DIFF_STR,
                    LastDateContact,
                    StatusOP,
                    NextAction,
                    NextDate,
                    Responsible_id,
                    ResponsibleName', 'safe'),
        );
    }
    
    public function attributeLabels()
    {
        return array(
            'Exrp_id' => '',
            'Date' => '',
            'FullName' => '',
            'SegmentName' => '',
            'SubSegmentName' => '',
            'Address' => '',
            'Demand_id' => '',
            'ContactName' => '',
            'StageName' => '',
            'DIFF_STR' => '',
            'LastDateContact' => '',
            'StatusOP' => '',
            'NextAction' => '',
            'NextDate' => '',
            'Responsible_id' => '',
            'ResponsibleName' => '',
        );
    }
    
    public function attributeFilters()
    {
        return array(
            'ResponsibleName' => 'dbo.FIO(e.EmployeeName)',
            'DemandType' => 'd.DemandType_id',
            'StageName' => 'er.ActionStage_id',
            'StatusOP' => 'd.StatusOP',
            'SegmentName' => 'p.Segment_id',
            'SubSegmentName' => 'p.SubSegment_id',
        );
        
        
    }
    
    public function attributeSotrs() {
        return array(
            'ResponsibleName' => 'dbo.FIO(e.EmployeeName)',
        );
    }
}




