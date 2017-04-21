<?php

class DTypesNew extends MainFormModel
{
    public $DType_id;
    public $DemandType_id;
    public $DemandType;
    public $Sort;

    function __construct($scenario = '') {

    parent::__construct($scenario);

        $this->SP_INSERT_NAME = '';
        $this->SP_UPDATE_NAME = '';
        $this->SP_DELETE_NAME = '';

        $Select = "Select
                        d.DType_id,
                        d.DemandType_id,
                        dt.DemandType,
                        d.Sort";
        $From = "\nFrom DTypes d left join DemandTypes dt on (d.DemandType_id = dt.DemandType_id)";
        $Where = "\nWhere dt.DemandType_id <> 90
                        and isNull(d.Visible, 0) = 1";
        $Order = "\nOrder by d.Sort";

        $this->Query->setSelect($Select);
        $this->Query->setFrom($From);
        $this->Query->setWhere($Where);
        $this->Query->setOrder($Order);

        // Инициализация первичного ключа
        $this->KeyFiled = 'd.DType_id';
        $this->PrimaryKey = 'DType_id';
    }
        
    public function rules()
    {
        return array(
            array('DType_id,
                    DemandType_id,
                    DemandType,
                    Sort', 'safe'),
        );
    }

    public function attributeLabels()
    {
        return array(
            'DType_id' => '',
            'DemandType_id' => '',
            'DemandType' => '',
            'Sort' => '',
        );
    }
}


