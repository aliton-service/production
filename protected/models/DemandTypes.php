<?php

class DemandTypes extends MainFormModel
{
    public $DemandType_id;
    public $DemandType;
    public $DateCreate;
    public $EmplCreate;
    public $DateChange;
    public $EmplChange;
    public $DelDate;
    public $dd;
    public $d;
    public $id;
    
    function __construct($scenario = '') {
        parent::__construct($scenario);

        $this->SP_INSERT_NAME = 'INSERT_DEMANDTYPES';
        $this->SP_UPDATE_NAME = 'UPDATE_DemandTypes';
        $this->SP_DELETE_NAME = 'DELETE_DemandTypes';

        $Select = "\nSelect
                        dt.DemandType_id,
                        dt.DemandType,
                        dt.DateCreate,
                        dt.EmplCreate,
                        dt.DateChange,
                        dt.EmplChange,
                        dt.dd,
                        dt.d,
                        dt.id,
                        dt.DelDate";
        $From = "\nFrom DemandTypes dt";
        $Where = "\nWhere dt.DelDate is null";
        $Order = "\nOrder by dt.Sort, dt.DemandType";

        $this->Query->setSelect($Select);
        $this->Query->setFrom($From);
        $this->Query->setWhere($Where);
        $this->Query->setOrder($Order);
        
        $this->KeyFiled = 'dt.DemandType_id';
        $this->PrimaryKey = 'DemandType_id';
    }
    
    public function rules()
    {
        return array(
            array('DemandType', 'required'),
            array('DemandType_id,
                    DemandType,
                    DateCreate,
                    EmplCreate,
                    DateChange,
                    EmplChange,
                    dd,
                    d,
                    id,
                    DelDate', 'safe'),
        );
    }
    
    public function attributeLabels()
    {
        return array(
            'DemandType_id' => 'DemandType_id',
            'DemandType' => 'Тип заявки',
            'DateCreate' => 'DateCreate',
            'EmplCreate' => 'EmplCreate',
            'DateChange' => 'DateChange',
            'EmplChange' => 'EmplChange',
            'DelDate' => 'DelDate',
        );
    }
}




