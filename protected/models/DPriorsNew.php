<?php

class DPriorsNew extends MainFormModel
{
    public $DPrior_id;
    public $DMalfunction_id;
    public $DemandPrior_id;
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
                        d.DPrior_id,
                        d.DMalfunction_id,
                        d.DemandPrior_id,
                        dp.DemandPrior,
                        d.ExceedDays,
                        d.ExceedType,
                        d.StartTime,
                        d.DayOff,
                        d.VipExceedDays,
                        d.VipStartTime,
                        d.VipDayOff";
        $From = "\nfrom DPriors d left join DemandPriors dp on (d.DemandPrior_id = dp.DemandPrior_id)";
        $Where = "\nWhere d.Visible = 1";
        $Order = "\nOrder by d.Sort";

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
            array('DPrior_id,
                    DMalfunction_id,
                    DemandPrior_id,
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
            'DPrior_id' => '',
            'DMalfunction_id' => '',
            'DemandPrior_id' => '',
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










