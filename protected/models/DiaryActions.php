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
    public $ContactName;
    public $StageName;
    public $DIFF_STR;
    public $LastDateContact;
    public $StatusOP;
    public $NextAction;
    public $NextDate;
    public $Responsible_id;
    public $ResponsibleName;
    
    function __construct($scenario = '') {
        parent::__construct($scenario);

        $this->SP_INSERT_NAME = '';
        $this->SP_UPDATE_NAME = '';
        $this->SP_DELETE_NAME = '';

        $Select = "\nSelect
                        er.Exrp_id,
                        er.[Date],
                        p.FullName,
                        s.SegmentName,
                        ss.SegmentName as SubSegmentName,
                        case when er.Demand_id = 0 then dbo.address(p.jregion, p.jstreet, p.jhouse, p.jcorp, p.jroom) else d.[Address] end [Address],
                        er.Demand_id,
                        ct.ContactName,
                        stg.StageName,
                        dbo.GET_DATEDIFF_STR(er.[Date], GETDATE()) as DIFF_STR,
                        c.[Date] LastDateContact,
                        Case When d.StatusOP = 1 Then 'Холодный'
                                 When d.StatusOP = 1 Then 'Теплый'
                                 When d.StatusOP = 1 Then 'Горячий' End StatusOP,
                        er.NextAction,
                        er.NextDate,
                        er.Responsible_id,
                        dbo.FIO(e.EmployeeName) ResponsibleName";
        $From = "\nFrom ExecutorReports er left join Organizations_v p on (er.Form_id = p.Form_id)
                        left join Segments s on (p.Segment_id = s.Segment_id)
                        left join Segments ss on (p.SubSegment_id = ss.Segment_id)
                        left join FullDemands d on (er.Demand_id = d.Demand_id)
                        left join ContactTypes ct on (er.ContactType_id = ct.Contact_id)
                        left join ActionStages stg on (er.ActionStage_id = stg.Stage_id)
                        left join Contacts c on (p.LastCont_id = c.Cont_id)
                        left join Employees e on (er.Responsible_id = e.Employee_id)";
        $Where = "\nWhere er.DelDate is Null"
                . " and er.NextDate is not  Null";
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
}




