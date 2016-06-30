<?php

class Positions extends MainFormModel
{
    public $Position_id;
    public $PositionName;
    public $TrialPeriod;
    public $DateCreate;
    public $EmplCreate;
    public $DateChange;
    public $EmplChange;
    public $DelDate;
    
    function __construct($scenario = '') {
        parent::__construct($scenario);

        $this->SP_INSERT_NAME = 'INSERT_POSITIONS';
        $this->SP_UPDATE_NAME = 'UPDATE_POSITIONS';
        $this->SP_DELETE_NAME = 'DELETE_POSITIONS';

        $Select = "\nSelect
                        p.Position_id,
                        p.PositionName,
                        p.TrialPeriod,
                        p.DateCreate,
                        p.EmplCreate,
                        p.DateChange,
                        p.EmplChange,
                        p.DelDate";
        $From = "\nFrom Positions p";
        $Where = "\nWhere p.DelDate is null";
        $Order = "\nOrder by p.PositionName";

        $this->Query->setSelect($Select);
        $this->Query->setFrom($From);
        $this->Query->setWhere($Where);
        $this->Query->setOrder($Order);
        
        $this->KeyFiled = 'p.Position_id';
        $this->PrimaryKey = 'Position_id';
    }
    
    public function rules()
    {
        return array(
            array('PositionName', 'required'),
            array('Position_id,
                    PositionName,
                    TrialPeriod,
                    DateCreate,
                    EmplCreate,
                    DateChange,
                    EmplChange,
                    DelDate', 'safe'),
        );
    }
    
    public function attributeLabels()
    {
        return array(
            'Position_id' => 'Position_id',
            'PositionName' => 'Наименование',
            'TrialPeriod' => 'TrialPeriod',
            'DateCreate' => 'DateCreate',
            'EmplCreate' => 'EmplCreate',
            'DateChange' => 'DateChange',
            'EmplChange' => 'EmplChange',
            'DelDate' => 'DelDate',
        );
    }
}


