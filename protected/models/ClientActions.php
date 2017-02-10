<?php

class ClientActions extends MainFormModel
{
    public $Exrp_id;
    public $Date;
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
    
    function __construct($scenario = '') {
        parent::__construct($scenario);

        $this->SP_INSERT_NAME = '';
        $this->SP_UPDATE_NAME = '';
        $this->SP_DELETE_NAME = '';

        $Select = "\nSelect
                        er.Exrp_id,
                        er.[Date],
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
                        c.[Date] as LastDateContact";
        $From = "\nFrom ExecutorReports er left join ContactTypes ct on (er.ContactType_id = ct.Contact_id)
                        left join ActionStages acs on (er.ActionStage_id = acs.Stage_id)
                        left join Organizations_v p on (er.Form_id = p.Form_id)
                        left join ClientGroups s on (s.Clgr_id  = p.Segment_id)
                        left join ClientGroups s2 on (s2.Clgr_id  = p.SubSegment_id)
                        left join FullDemands d on (er.Demand_id = d.Demand_id)
                        left join Contacts c on (p.LastCont_id = c.Cont_id)";
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
                    LastDateContact', 'safe'),
        );
    }
    
    public function attributeLabels()
    {
        return array(
            'Exrp_id' => '',
            'Date' => '',
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
        );
    }
}





