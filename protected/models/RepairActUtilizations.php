<?php

class RepairActUtilizations extends MainFormModel
{
    public $Docm_id;
    public $Repr_id;
    public $Objc_id;
    public $Addr;
    public $RepNumber;
    public $Equip_id;
    public $EquipName;
    public $Date;
    public $Number;
    public $EmplAgree;
    public $Note;
    public $SN;
    public $EmplAgreeName;
    public $EquipAge;
    public $EquipLifeTime;
    public $EquipWear;
    public $EquipFactWear;
    public $DateAgree;
    public $DateCreate;
    public $EmplCreate;
    public $DateChange;
    public $EmplChange;
    public $DelDate;

        
    public function rules() {
            return array(
                    array('Docm_id,
                            Repr_id,
                            Objc_id,
                            Addr,
                            RepNumber,
                            Equip_id,
                            EquipName,
                            Date,
                            Number,
                            EmplAgree,
                            Note,
                            SN,
                            EmplAgreeName,
                            EquipAge,
                            EquipLifeTime,
                            EquipWear,
                            EquipFactWear,
                            DateAgree,
                            DateCreate,
                            EmplCreate,
                            DateChange,
                            EmplChange,
                            DelDate,', 'safe'),
            );
    }
        
    function __construct() {
        parent::__construct();
        
        $this->SP_INSERT_NAME = 'INSERT_RepairActUtilizations';
        $this->SP_UPDATE_NAME = 'UPDATE_RepairActUtilizations';
        $this->SP_DELETE_NAME = '';
                
        $Select = "\nSelect
                        ru.Docm_id,
                        ru.Repr_id,
                        ru.Objc_id,
                        ru.Addr,
                        ru.Number as RepNumber,
                        ru.Equip_id,
                        ru.EquipName,
                        ru.Date,
                        ru.Number,
                        ru.EmplAgree,
                        ru.Note,
                        ru.SN,
                        ru.EmplAgreeName,
                        ru.EquipAge,
                        ru.EquipLifeTime,
                        ru.EquipWear,
                        ru.EquipFactWear,
                        ru.DateAgree,
                        ru.DateCreate,
                        ru.EmplCreate,
                        ru.DateChange,
                        ru.EmplChange,
                        ru.DelDate";
        $From = "\nFrom RepairUtilizations_v ru";
        $Order = "\nOrder by ru.Docm_id Desc";
        $this->Query->setSelect($Select);
        $this->Query->setFrom($From);
        $this->Query->setOrder($Order);
        
        $this->KeyFiled = 'ru.Docm_id';
    }


    public function attributeLabels()
    {
        return array(
            'Docm_id' => '',
            'Repr_id' => '',
            'Objc_id' => '',
            'Addr' => '',
            'RepNumber' => '',
            'Equip_id' => '',
            'EquipName' => '',
            'Date' => '',
            'Number' => '',
            'EmplAgree' => '',
            'Note' => '',
            'SN' => '',
            'EmplAgreeName' => '',
            'EquipAge' => '',
            'EquipLifeTime' => '',
            'EquipWear' => '',
            'EquipFactWear' => '',
            'DateAgree' => '',
            'DateCreate' => '',
            'EmplCreate' => '',
            'DateChange' => '',
            'EmplChange' => '',
            'DelDate' => '',
        );
    }
}




