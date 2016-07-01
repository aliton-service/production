<?php

class RepairWarrantys extends MainFormModel
{
    public $Docm_id;
    public $Repr_id;
    public $Objc_id;
    public $RepNumber;
    public $Equip_id;
    public $EquipName;
    public $Date;
    public $Number;
    public $EmplAgree;
    public $Note;
    public $EmplAgreeName;
    public $Period;
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
                            RepNumber,
                            Equip_id,
                            EquipName,
                            Date,
                            Number,
                            EmplAgree,
                            Note,
                            EmplAgreeName,
                            Period,
                            DateAgree,
                            DateCreate,
                            EmplCreate,
                            DateChange,
                            EmplChange,
                            DelDate', 'safe'),
            );
    }
        
    function __construct() {
        parent::__construct();
        
        $this->SP_INSERT_NAME = 'INSERT_RepairWarrantys';
        $this->SP_UPDATE_NAME = 'UPDATE_RepairWarrantys';
        $this->SP_DELETE_NAME = '';
                
        $Select = "\nSelect
                        rw.Docm_id,
                        rw.Repr_id,
                        rw.Objc_id,
                        rw.RepNumber,
                        rw.Equip_id,
                        rw.EquipName,
                        rw.Date,
                        rw.Number,
                        rw.EmplAgree,
                        rw.Note,
                        rw.EmplAgreeName,
                        rw.Period,
                        rw.DateAgree,
                        rw.DateCreate,
                        rw.EmplCreate,
                        rw.DateChange,
                        rw.EmplChange,
                        rw.DelDate";
        $From = "\nFrom RepairWarrantys_v rw";
        $Order = "\nOrder by rw.Docm_id Desc";
        $this->Query->setSelect($Select);
        $this->Query->setFrom($From);
        $this->Query->setOrder($Order);
        
        $this->KeyFiled = 'rw.Docm_id';
    }


    public function attributeLabels()
    {
        return array(
            'Docm_id' => '',
            'Repr_id' => '',
            'Objc_id' => '',
            'RepNumber' => '',
            'Equip_id' => '',
            'EquipName' => '',
            'Date' => '',
            'Number' => '',
            'EmplAgree' => '',
            'Note' => '',
            'EmplAgreeName' => '',
            'Period' => '',
            'DateAgree' => '',
            'DateCreate' => '',
            'EmplCreate' => '',
            'DateChange' => '',
            'EmplChange' => '',
            'DelDate' => '',
        );
    }
}


