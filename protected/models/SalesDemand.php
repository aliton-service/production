<?php

class SalesDemand extends MainFormModel {
    
    
    public $Demand_id;
    public $Object_id;
    public $ObjectGr_id;
    public $DateReg;
    public $PropForm_id;
    public $FullName;
    public $Address;
    public $ActionStage_id;
    public $StageName;
    public $DIFF_STR;
    public $StatusOP;
    public $DemandPrior;
    public $DemandType;
    public $SystemType;
    public $SegmentName;
    public $SubSegmentName;
    public $Contacts;
    public $Note;
    public $Deadline;
    public $DateExec;
    public $DemandText;
    public $ExecutorsName;
    
    function __construct($scenario='') {
        parent::__construct($scenario);

        $this->SP_INSERT_NAME = '';
        $this->SP_UPDATE_NAME = '';
        $this->SP_DELETE_NAME = '';

        $Select = "\nSelect
                        d.Demand_id,
                        d.Object_id,
                        d.ObjectGr_id,
                        d.DateReg,
                        d.Deadline,
                        d.DateExec,
                        d.PropForm_id,
                        p.FullName,
                        d.Address,
                        er.ActionStage_id,
                        s.StageName,
                        dbo.GET_DATEDIFF_STR(er.[Date], GETDATE()) as DIFF_STR,
                        Case When d.StatusOP = 1 Then 'Холодный'
                         When d.StatusOP = 1 Then 'Теплый'
                         When d.StatusOP = 1 Then 'Горячий' End StatusOP,
                        d.DemandPrior,
                        d.DemandType,
                        d.SystemType,
                        cg.ClientGroup as SegmentName,
                        scg.ClientGroup as SubSegmentName,
                        d.Contacts,
                        d.Note,
                        d.DemandText,
                        d.ExecutorsName";
        $From = "\nFrom FullDemands d left join Organizations_v p on (d.PropForm_id = p.Form_id)
                        left join ExecutorReports er on (d.LastAction_id = er.Exrp_id)
                        left join ActionStages s on (er.ActionStage_id = s.Stage_id)
                        left join ClientGroups cg on (p.Segment_id = cg.Clgr_id)
                        left join ClientGroups scg on (p.SubSegment_id = scg.Clgr_id)";
        $this->Query->setSelect($Select);
        $this->Query->setFrom($From);

        $this->KeyFiled = 'd.Demand_id';
        $this->PrimaryKey = 'Demand_id';
    }

    public function rules(){
        return array(
            array('Demand_id,
                    Object_id,
                    ObjectGr_id,
                    DateReg,
                    Deadline,
                    DateExec,
                    PropForm_id,
                    FullName,
                    Address,
                    ActionStage_id,
                    StageName,
                    DIFF_STR,
                    StatusOP,
                    DemandPrior,
                    DemandType,
                    SystemType,
                    SegmentName,
                    SubSegmentName,
                    Contacts,
                    Note,
                    DemandText,
                    ExecutorsName','safe'),
        );
    }

    public function attributeLabels(){
        return array(
            'Object_id' => '',
            'ObjectGr_id' => '',
            'Demand_id' => '',
            'DateReg' => '',
            'Deadline' => '',
            'DateExec' => '',
            'PropForm_id' => '',
            'FullName' => '',
            'Address' => '',
            'ActionStage_id' => '',
            'StageName' => '',
            'DIFF_STR' => '',
            'StatusOP' => '',
            'DemandPrior' => '',
            'DemandType' => '',
            'SystemType' => '',
            'SegmentName' => '',
            'SubSegmentName' => '',
            'Contacts' => '',
            'Note' => '',
            'DemandText' => '',
        );
    }
}

