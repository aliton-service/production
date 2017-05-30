<?php
 

class DemandsList extends MainFormModel {
    public $Demand_id;
    public $Object_id;
    public $ObjectGr_id;
    public $Address;
    public $UCreateName;
    public $DateReg;
    public $Deadline;
    public $DateMaster;
    public $DateExec;
    public $ExceedDays;
    public $DemandType;
    public $EquipType;
    public $Malfunction;
    public $DemandPrior;
    public $DemandPrior_id;
    public $MasterName;
    public $PlanDateExec;
    public $ExecutorsName;
    public $ServiceType;
    public $FirstDemandType;
    public $DemandText;
    public $Note;
    public $AreaName;
    public $UChangeName;
    public $ResultName;
    public $OtherName;
    public $Territ_id;
    public $Street_id;
    public $House;
    public $Contacts;
    public $StatusOP;
    public $FirstDemandPrior;
    public $InitiatorName;
    public $WorkedOutStatus;
    public $DateExecFilter;
    public $VIPName;
    public $StatusOPName;
    public $FullOverDay;
    public $LphName;
    
    function __construct($scenario = '') {
        parent::__construct($scenario);
        
        $Select ="\nSelect
                        d.Demand_id,
                        d.Object_id,
                        d.ObjectGr_id,
                        d.Address,
                        d.UCreateName,
                        d.DateReg,
                        d.Deadline,
                        d.DateMaster,
                        d.DateExec,
                        d.ExceedDays,
                        d.DemandType,
                        d.EquipType,
                        d.Malfunction,
                        d.DemandPrior,
                        d.DemandPrior_id,
                        d.MasterName,
                        d.PlanDateExec,
                        d.ExecutorsName,
                        d.ServiceType,
                        d.FirstDemandType,
                        d.Contacts,
                        d.DemandText,
                        d.Note,
                        d.AreaName,
                        d.UChangeName,
                        d.ResultName,
                        d.OtherName,
                        d.Territ_id,
                        d.Street_id,
                        d.House,
                        d.Contacts,
                        d.StatusOP,
                        d.FirstDemandPrior,
                        d.InitiatorName,
                        case when d.WorkedOut is not null then 'Отработано' else 'Не отработано' end WorkedOutStatus,
                        d.DateExec as DateExecFilter,
                        Case when d.VIP = 1 then 'VIP' else '' end  as VIPName,
                        Case when d.StatusOP = 0 then ''
                                when d.StatusOP = 1 then 'Холодный'
                                when d.StatusOP = 2 then 'Теплый'
                                when d.StatusOP = 3 then 'Горячий'
                                end as StatusOPName,
                        dbo.get_overday(d.Deadline, isnull(d.DateExec, getdate()), d.DemandEt_id) + isnull(d.overday, 0) as FullOverDay,
                        Case when l.LPh_id = 1 then 'Юр.лицо'
                                when l.LPh_id = 2 then 'Физ.лицо'
                                end AS LphName";
        $From = "\nFrom FullDemands d with (nolock) 
                        left join ObjectsGroup og on (d.ObjectGr_id = og.ObjectGr_id)
                        left join PropForms AS p on (og.PropForm_id = p.Form_id)
                        left join Lph AS l ON ISNULL(p.lph_id, 1) = l.LPh_id";
        
				
	$this->Query->setSelect($Select);
        $this->Query->setFrom($From);
        if (Yii::app()->user->checkAccess('SeniorDispatcher') || Yii::app()->user->checkAccess('Dispatcher') || Yii::app()->user->checkAccess('AdministartorDispatchers'))
            $this->Query->setOrder(" order by
                                      case when WorkedOut is Null
                                        then 0
                                        else 1
                                      end,
                                      case when DateExec is Null
                                        then 0
                                        else 1
                                      end,
                                      case when DateExec is Null
                                        then case when DateMaster is Null
                                               then 0
                                               else 1 end
                                        else 0
                                      end,
                                      case when DateExec is Null
                                        then Sort
                                        else 0
                                      end,
                                      demand_id desc ");
        else
            $this->Query->setOrder(" order by
                                      case when DateExec is Null
                                        then 0
                                        else 1
                                      end,
                                      case when DateExec is Null
                                        then case when DateMaster is Null
                                               then 0
                                               else 1 end
                                        else 0
                                      end,
                                      case when DateExec is Null
                                        then Sort
                                        else 0
                                      end,
                                      demand_id desc ");
        

            $this->KeyFiled = 'd.Demand_id';
            $this->PrimaryKey = 'Demand_id';
    }
    
    public function rules()
	{
            return array(
                    array('Demand_id,
                            Object_id,
                            Address,
                            UCreateName,
                            DateReg,
                            Deadline,
                            DateMaster,
                            DateExec,
                            ExceedDays,
                            DemandType,
                            EquipType,
                            Malfunction,
                            DemandPrior,
                            DemandPrior_id,
                            MasterName,
                            PlanDateExec,
                            ExecutorsName,
                            ServiceType,
                            FirstDemandType,
                            Contacts,
                            DemandText,
                            Note,
                            AreaName,
                            UChangeName,
                            ResultName,
                            OtherName,
                            Territ_id,
                            Street_id,
                            House,
                            Contacts,
                            StatusOP,
                            FirstDemandPrior,
                            InitiatorName,
                            WorkedOutStatus,
                            DateExecFilter,
                            VIPName,
                            StatusOPName,
                            FullOverDay,
                            LphName,', 'safe'),
            );
	}
        
    public function attributeFilters()
    {
        return array(
            'ObjectGr_id' => 'd.ObjectGr_id',
            'MasterName' => 'd.Master',
            'DemandType' => 'd.DemandType_id',
            'ExecutorsName' => 'd.OtherName',
//            'Street_id' => 'd.Address',
        );
        
        
    }
    
    public function attributeSotrs() {
        return array(
            
        );
    }
}

