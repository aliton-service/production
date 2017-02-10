<?php

class Clients extends MainFormModel
{
    public $Form_id;
    public $Number;
    public $FullName;
    public $Demands;
    public $SegmentName;
    public $SubSegmentName;
    public $SourceInfoName;
    public $SubSourceInfoName;
    public $BrandName;
    public $Address;
    public $WWW;
    public $CountObjects;
    public $SalesManager;
    public $ServiceManager;
    public $StatusName;
    public $NextAction;
    public $LastDateContact;
    public $DateChangeSalesManager;
    public $DateCreate;

    function __construct($scenario = '') {
        parent::__construct($scenario);

        $this->SP_INSERT_NAME = '';
        $this->SP_UPDATE_NAME = '';
        $this->SP_DELETE_NAME = '';

        $Select = "\nSelect
                        p.Form_id,
                        p.Number,
                        ISNULL(fo.Name + ' ', '') + p.FormName as FullName,
                        (Select max(d.Demand_id) From ObjectsGroup og left join FullDemands d on (og.ObjectGr_id = d.ObjectGr_id) Where og.PropForm_id = p.Form_id and og.DelDate is Null) as Demands,
                        cg.ClientGroup as SegmentName,
                        scg.ClientGroup as SubSegmentName,
                        si.SourceInfo_name SourceInfoName,
                        ssi.SourceInfo_name SubSourceInfoName,
                        p.BrandName,
                        dbo.address(p.jregion, p.jstreet, p.jhouse, p.jcorp, '') AS [Address],
                        p.WWW,
                        p.CountObjects,
                        dbo.FIO(e.EmployeeName) as SalesManager,
                        dbo.FIO(e2.EmployeeName) as ServiceManager,
                        cs.StatusName,
                        a.NextAction,
                        c.[Date] as LastDateContact,
                        p.DateChangeSalesManager,
                        p.date_create as DateCreate";
        $From = "\nFrom PropForms p left join FormsOfOwnership fo on (p.Fown_id = fo.Fown_id)
                        left join ClientGroups cg on (p.Segment_id = cg.Clgr_id)
                        left join ClientGroups scg on (p.SubSegment_id = scg.Clgr_id)
                        left join SourceInfo si on (p.SourceInfo_id = si.SourceInfo_id)
                        left join SourceInfo ssi on (p.SubSourceInfo_id = ssi.SourceInfo_id)
                        left join Employees e on (p.SalesManager_id = e.Employee_id)
                        left join Employees e2 on (p.ServiceManager_id = e2.Employee_id)
                        left join ClientStatus cs on (p.Status_id = cs.Status_id)
                        left join ExecutorReports a on (p.LastAction_id = a.Exrp_id)
                        left join Contacts c on (c.Cont_id = p.LastCont_id)";
        $Where = "\nWhere p.DelDate is Null";
        $Order = "\nOrder by p.Form_id";

        $this->Query->setSelect($Select);
        $this->Query->setFrom($From);
        $this->Query->setWhere($Where);
        $this->Query->setOrder($Order);
        
        $this->KeyFiled = 'p.Form_id';
        $this->PrimaryKey = 'Form_id';
    }
    
    public function rules()
    {
        return array(
            array('Form_id,
                    Number,
                    FullName,
                    Demands,
                    SegmentName,
                    SubSegmentName,
                    SourceInfoName,
                    SubSourceInfoName,
                    BrandName,
                    Address,
                    WWW,
                    CountObjects,
                    SalesManager,
                    ServiceManager,
                    StatusName,
                    NextAction,
                    LastDateContact,
                    DateChangeSalesManager,
                    DateCreate', 'safe'),
        );
    }
    
    public function attributeLabels()
    {
        return array(
            'Form_id' => '',
            'Number' => '',
            'FullName' => '',
            'Demands' => '',
            'SegmentName' => '',
            'SubSegmentName' => '',
            'SourceInfoName' => '',
            'SubSourceInfoName' => '',
            'BrandName' => '',
            'Address' => '',
            'WWW' => '',
            'CountObjects' => '',
            'SalesManager' => '',
            'ServiceManager' => '',
            'StatusName' => '',
            'NextAction' => '',
            'LastDateContact' => '',
            'DateChangeSalesManager' => '',
            'DateCreate' => '',
        );
    }
    
    public function attributeFilters()
    {
        return array(
            'SalesManager' => 'dbo.FIO(e.EmployeeName)',
            'SegmentName' => 'cg.ClientGroup',
            'SubSegmentName' => 'scg.ClientGroup',
            'SourceInfoName' => 'si.SourceInfo_name',
            'SubSourceInfoName' => 'ssi.SourceInfo_name',
            'FullName' => '(ISNULL(fo.Name + \' \', \'\') + p.FormName)',
        );
    }
}




