<?php


class DemandsExecTime extends MainFormModel
{
    public $Demandet_id;
    public $DemandType_id;
    public $DemandType;
    public $SystemType_id;
    public $SystemTypeName;
    public $EquipType_id;
    public $EquipType;
    public $Malfunction_id;
    public $Malfunction;
    public $DemandPrior_id;
    public $DemandPrior;
                
    public function rules()
    {
        return array(
            array('Demandet_id,'
                . ' DemandType_id,'
                . ' DemandType,'
                . ' SystemType_id,'
                . ' SystemTypeName,'
                . ' EquipType_id,'
                . ' EquipType,'
                . ' Malfunction_id,'
                . ' Malfunction,'
                . ' DemandPrior_id,'
                . ' DemandPrior', 'safe'),
        );
            
    }
	
    function __construct($scenario = '') {

        parent::__construct($scenario);

        $this->SP_INSERT_NAME = 'INSERT_DemandsExecTime';
        $this->SP_UPDATE_NAME = 'UPDATE_DemandsExecTime';
        $this->SP_DELETE_NAME = 'DELETE_DemandsExecTime';

        $Select = "\nSelect
                        p.Demandet_id,
                        p.DemandType_id,
                        dt.DemandType,
                        p.SystemType_id,
                        s.SystemTypeName,
                        p.EquipType_id,
                        et.EquipType,
                        p.Malfunction_id,
                        m.Malfunction,
                        p.DemandPrior_id,
                        dp.DemandPrior";
        $From = "\nFrom DemandsExecTime p left join DemandTypes dt on (p.DemandType_id = dt.DemandType_id)
                        left join SystemTypes s on (p.SystemType_id = s.SystemType_Id)
                        left join EquipTypes et on (p.EquipType_id = et.EquipType_id)
                        left join Malfunctions m on (p.Malfunction_id = m.Malfunction_id)
                        left join DemandPriors dp on (p.DemandPrior_id = dp.DemandPrior_id)";
        $Where = "\nWhere p.DelDate is null";
        $Order = "\nOrder By
                        dt.Sort,
                        dt.DemandType,
                        s.Sort,
                        s.SystemTypeName,
                        et.EquipType,
                        m.Malfunction,
                        dp.Sort,
                        dp.DemandPrior";
        
        $this->Query->setSelect($Select);
        $this->Query->setFrom($From);
        $this->Query->setWhere($Where);
        $this->Query->setOrder($Order);
        
        // Инициализация первичного ключа
        $this->KeyFiled = 'p.Demandet_id';
        $this->PrimaryKey = 'Demandet_id';
    }
    
    public function attributeLabels()
    {
        return array(
            "Demandet_id" => 'Demandet_id',
            'DemandType_id' => 'DemandType_id',
            'DemandType' => 'DemandType',
            'SystemType_id' => 'SystemType_id',
            'SystemTypeName' => 'SystemTypeName',
            'EquipType_id' => 'EquipType_id',
            'EquipType' => 'EquipType',
            'Malfunction_id' => 'Malfunction_id',
            'Malfunction' => 'Malfunction',
            'DemandPrior_id' => 'DemandPrior_id',
            'DemandPrior' => 'DemandPrior',
        );
    }
}


