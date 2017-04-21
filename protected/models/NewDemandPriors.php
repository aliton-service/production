<?php

class NewDemandPriors extends MainFormModel
{
    public $DType_id;
    public $DemandType;
    public $Visible;
    public $DSystem_id;
    public $SystemTypeName;
    public $Visible;
    public $DEquip_id;
    public $EquipType;
    public $Visible;
    public $DMalfunction_id;
    public $Malfunction;
    public $Visible;
    public $DPrior_id;
    public $Visible;
    public $DemandPrior;
    public $ExceedDays;
    public $ExceedType;
    public $StartTime;
    public $DayOff;
    public $VipExceedDays;
    public $VipStartTime;
    public $VipDayOff;

    function __construct($scenario = '') {

        parent::__construct($scenario);

        $this->SP_INSERT_NAME = '';
        $this->SP_UPDATE_NAME = '';
        $this->SP_DELETE_NAME = '';

        $Select = "Select
                        d.DType_id,
                        dt.DemandType,
                        d.Visible,
                        s.DSystem_id,
                        st.SystemTypeName,
                        s.Visible,
                        e.DEquip_id,
                        et.EquipType,
                        e.Visible,
                        m.DMalfunction_id,
                        mf.Malfunction,
                        m.Visible,
                        p.DPrior_id,
                        p.Visible,
                        dp.DemandPrior,
                        p.ExceedDays,
                        p.ExceedType,
                        p.StartTime,
                        p.DayOff,
                        p.VipExceedDays,
                        p.VipStartTime,
                        p.VipDayOff";
        $From = "\nFrom DTypes d left join DemandTypes dt on (d.DemandType_id = dt.DemandType_id)
                        left join DSystems s on (d.DType_id = s.DType_id)
                        left join SystemTypes st on (s.SystemType_id = st.SystemType_Id)
                        left join DEquips e on (s.DSystem_id = e.DSystem_id)
                        left join EquipTypes et on (e.EquipType_id = et.EquipType_id)
                        left join DMalfunctions m on (e.DEquip_id = m.DEquip_id)
                        left join Malfunctions mf on (m.Malfunction_id = mf.Malfunction_id)
                        left join DPriors p on (p.DMalfunction_id = m.DMalfunction_id)
                        left join DemandPriors dp on (p.DemandPrior_id = dp.DemandPrior_id)";
        $Where = "\nWhere d.Visible = 1
                        and s.Visible = 1
                        and e.Visible = 1
                        and m.Visible = 1
                        and p.Visible = 1";
        $Order = "\nOrder by
                        d.Sort,
                        s.Sort,
                        e.Sort,
                        m.Sort,
                        p.Sort";

        $this->Query->setSelect($Select);
        $this->Query->setFrom($From);
        $this->Query->setWhere($Where);
        $this->Query->setOrder($Order);

        // Инициализация первичного ключа
        $this->KeyFiled = 'd.DPrior_id';
        $this->PrimaryKey = 'DPrior_id';
    }
        
    public function rules()
    {
        return array(
            array('DType_id,
                    DemandType,
                    Visible,
                    DSystem_id,
                    SystemTypeName,
                    Visible,
                    DEquip_id,
                    EquipType,
                    Visible,
                    DMalfunction_id,
                    Malfunction,
                    Visible,
                    DPrior_id,
                    Visible,
                    DemandPrior,
                    ExceedDays,
                    ExceedType,
                    StartTime,
                    DayOff,
                    VipExceedDays,
                    VipStartTime,
                    VipDayOff', 'safe'),
        );
    }

    public function attributeLabels()
    {
        return array(
            'DType_id' => '',
            'DemandType' => '',
            'Visible' => '',
            'DSystem_id' => '',
            'SystemTypeName' => '',
            'Visible' => '',
            'DEquip_id' => '',
            'EquipType' => '',
            'Visible' => '',
            'DMalfunction_id' => '',
            'Malfunction' => '',
            'Visible' => '',
            'DPrior_id' => '',
            'Visible' => '',
            'DemandPrior' => '',
            'ExceedDays' => '',
            'ExceedType' => '',
            'StartTime' => '',
            'DayOff' => '',
            'VipExceedDays' => '',
            'VipStartTime' => '',
            'VipDayOff' => '',
        );
    }
}











