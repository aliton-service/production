<?php


class DemandsExecTime extends MainFormModel
{
    public $DType_id;
    public $DemandType_id;
    public $DemandType;
    public $DSystem_id;
    public $SystemType_id;
    public $SystemTypeName;
    public $DEquip_id;
    public $EquipType_id;
    public $EquipType;
    public $DMalfunction_id;
    public $Malfunction_id;
    public $Malfunction;
    public $DPrior_id;
    public $DemandPrior_id;
    public $DemandPrior;
    public $Demandet_id;
    public $ExceedDays;
    public $ExceedType;
    public $ExceedTypeName;
    public $DayOff;
    public $VipDayOff;
    public $VipExceedDays;
                
    public function rules()
    {
        return array(
            array('DemandType_id, DemandPrior_id, ExceedType, ExceedDays', 'required'),
            array('DType_id,
                    DemandType_id,
                    DemandType,
                    DSystem_id,
                    SystemType_id,
                    SystemTypeName,
                    DEquip_id,
                    EquipType_id,
                    EquipType,
                    DMalfunction_id,
                    Malfunction_id,
                    Malfunction,
                    DPrior_id,
                    DemandPrior_id,
                    DemandPrior,
                    Demandet_id,
                    ExceedDays,
                    ExceedType,
                    ExceedTypeName,
                    DayOff,
                    VipDayOff,
                    VipExceedDays', 'safe'),
        );
    }
	
    function __construct($scenario = '') {

        parent::__construct($scenario);

        $this->SP_INSERT_NAME = 'INSERT_DemandsExecTime';
        $this->SP_UPDATE_NAME = 'UPDATE_DemandsExecTime';
        $this->SP_DELETE_NAME = 'DELETE_DemandsExecTime';

        $Select = "\nSelect 
                        d.DType_id,
                        d.DemandType_id,
                        dt.DemandType,
                        ds.DSystem_id,
                        ds.SystemType_id,
                        st.SystemTypeName,
                        de.DEquip_id,
                        de.EquipType_id,
                        et.EquipType,
                        dm.DMalfunction_id,
                        dm.Malfunction_id,
                        m.Malfunction,
                        dp.DPrior_id,
                        dp.DemandPrior_id,
                        pr.DemandPrior,
                        det.Demandet_id,
                        dp.ExceedDays,
                        dp.ExceedType,
                        case when dp.ExceedType = 1 then 'Часы'
                            when dp.ExceedType = 2 then 'Дни'
                            when dp.ExceedType = 3 then 'День подачи' end ExceedTypeName,
                        dp.DayOff,
                        dp.VipDayOff,
                        dp.VipExceedDays";
        $From = "\nFrom DTypes d inner join DemandTypes dt on (d.DemandType_id = dt.DemandType_id)
                        inner join DSystems ds on (ds.DType_id = d.DType_id)
                        left join SystemTypes st on (ds.SystemType_id = st.SystemType_Id)
                        inner join DEquips de on (ds.DSystem_id = de.DSystem_id)
                        left join EquipTypes et on (et.EquipType_id = de.EquipType_id)
                        inner join DMalfunctions dm on (de.DEquip_id = dm.DEquip_id)
                        left join Malfunctions m on (dm.Malfunction_id = m.Malfunction_id)
                        inner join DPriors dp on (dm.DMalfunction_id = dp.DMalfunction_id)
                        left join DemandPriors pr on (pr.DemandPrior_id = dp.DemandPrior_id)
                        left join DemandsExecTime det on (
                                det.DelDate is null 
                                and det.DemandType_id = d.DemandType_id
                                and (isnull(det.SystemType_id, 0) = ds.SystemType_id)
                                and (isnull(det.EquipType_id, 0) = de.EquipType_id)
                                and (isnull(det.Malfunction_id, 0) = dm.Malfunction_id)
                                and (det.DemandPrior_id = dp.DemandPrior_id)
                        )";
        //$Where = "\nWhere p.DelDate is null";
        $Order = "\nOrder by d.Sort, ds.Sort, de.Sort, dm.Sort, dp.Sort";
        
        $this->Query->setSelect($Select);
        $this->Query->setFrom($From);
        //$this->Query->setWhere($Where);
        $this->Query->setOrder($Order);
        
        // Инициализация первичного ключа
        $this->KeyFiled = 'dp.DPrior_id';
        $this->PrimaryKey = 'DPrior_id';
    }
    
    public function attributeLabels()
    {
        return array(
            'DType_id' => '',
            'DemandType_id' => 'Тип заявки',
            'DemandType' => '',
            'DSystem_id' => '',
            'SystemType_id' => '',
            'SystemTypeName' => '',
            'DEquip_id' => '',
            'EquipType_id' => '',
            'EquipType' => '',
            'DMalfunction_id' => '',
            'Malfunction_id' => '',
            'Malfunction' => '',
            'DPrior_id' => '',
            'DemandPrior_id' => 'Приоритет',
            'DemandPrior' => '',
            'Demandet_id' => '',
            'ExceedDays' => 'Кол-во',
            'ExceedType' => 'Срок',
            'ExceedTypeName' => '',
            'DayOff' => '',
            'VipDayOff' => '',
            'VipExceedDays' => '',
        );
    }
}


