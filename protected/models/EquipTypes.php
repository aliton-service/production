<?php

class EquipTypes extends MainFormModel
{
    public $EquipType_id;
    public $EquipType;
    public $DateCreate;
    public $EmplCreate;
    public $DateChange;
    public $EmplChange;
    public $DelDate;
    
    function __construct($scenario = '') {
        parent::__construct($scenario);

        $this->SP_INSERT_NAME = 'INSERT_EquipTypes';
        $this->SP_UPDATE_NAME = 'UPDATE_EquipTypes';
        $this->SP_DELETE_NAME = 'DELETE_EquipTypes';

        $Select = "\nSelect
                        et.EquipType_id,
                        et.EquipType,
                        et.DateCreate,
                        et.EmplCreate,
                        et.DateChange,
                        et.EmplChange,
                        et.DelDate";
        $From = "\nFrom EquipTypes et";
        $Where = "\nWhere et.DelDate is null";
        $Order = "\nOrder by et.EquipType";

        $this->Query->setSelect($Select);
        $this->Query->setFrom($From);
        $this->Query->setWhere($Where);
        $this->Query->setOrder($Order);
        
        $this->KeyFiled = 'et.EquipType_id';
        $this->PrimaryKey = 'EquipType_id';
    }
    
    public function rules()
    {
        return array(
            array('EquipType', 'required'),
            array('EquipType_id,
                    EquipType,
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
            'EquipType_id' => 'EquipType_id',
            'EquipType' => 'Оборудование',
            'DateCreate' => 'DateCreate',
            'EmplCreate' => 'EmplCreate',
            'DateChange' => 'DateChange',
            'EmplChange' => 'EmplChange',
            'DelDate' => 'DelDate',
        );
    }
}




