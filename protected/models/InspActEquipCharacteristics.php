<?php

class InspActEquipCharacteristics extends MainFormModel
{
    public $Characteristic_id;
    public $ActEquip_id;
    public $CharacteristicName;
    public $EmplCreate;
    public $DateCreate;
    public $EmplChange;
    public $DateChange;
            
    function __construct($scenario = '') {
        parent::__construct($scenario);

        $this->SP_INSERT_NAME = 'INSERT_InspActEquipCharacteristics';
        $this->SP_UPDATE_NAME = 'UPDATE_InspActEquipCharacteristics';
        $this->SP_DELETE_NAME = 'DELETE_InspActEquipCharacteristics';

        $Select = "\nSelect
                        c.Characteristic_id,
                        c.ActEquip_id,
                        c.CharacteristicName,
                        c.EmplCreate,
                        c.DateCreate,
                        c.EmplChange,
                        c.DateChange";
        $From = "\nFrom InspActEquipCharacteristics c";
        $Where = "\nWhere c.DelDate is Null";
        $this->Query->setSelect($Select);
        $this->Query->setFrom($From);
        $this->Query->setWhere($Where);
        
        $this->KeyFiled = 'c.Characteristic_id';
        $this->PrimaryKey = 'Characteristic_id';
    }
    
    public function rules()
    {
        return array(
            array('ActEquip_id, CharacteristicName', 'required'),
            array('Characteristic_id,
                    ActEquip_id,
                    CharacteristicName,
                    EmplCreate,
                    DateCreate,
                    EmplChange,
                    DateChange', 'safe'),
        );
    }
    
    public function attributeLabels()
    {
        return array(
            'Characteristic_id' => '',
            'ActEquip_id' => '',
            'CharacteristicName' => '',
            'EmplCreate' => '',
            'DateCreate' => '',
            'EmplChange' => '',
            'DateChange' => '',
        );
    }
}




