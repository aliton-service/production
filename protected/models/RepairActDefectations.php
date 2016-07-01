<?php

class RepairActDefectations extends MainFormModel {
    
    public $Docm_id;
    public $Repr_id;
    public $Objc_id;
    public $Addr;
    public $Equip_id;
    public $EquipName;
    public $Date;
    public $Number;
    public $RepNumber;
    public $Empl_id;
    public $EmployeeName;
    public $Defect;
    public $Result;
    public $HeadComment;
    public $DateAgree;
    public $EmplAgree;
    public $EmplAgreeName;
    public $DateCreate;
    public $EmplCreate;
    public $DateChange;
    public $EmplChange;
    public $DelDate;
            
    public function rules()
    {
        return array(
                array('Docm_id,
                        Repr_id,
                        Objc_id,
                        Equip_id,
                        EquipName,
                        Date,
                        Number,
                        Empl_id,
                        EmployeeName,
                        Defect,
                        Result,
                        HeadComment,
                        DateAgree,
                        EmplAgree,
                        EmplAgreeName,
                        Addr,
                        DateCreate,
                        EmplCreate,
                        DateChange,
                        EmplChange,
                        DelDate,', 'safe'),
        );
    }
    
    public function __construct($scenario = '') {
        parent::__construct($scenario);

        $this->SP_INSERT_NAME = 'INSERT_RepairActDefectations';
        $this->SP_UPDATE_NAME = 'UPDATE_RepairActDefectations';
        $this->SP_DELETE_NAME = 'DELETE_RepairActDefectations';

        $Select =   "Select
                        rd.Docm_id,
                        rd.Repr_id,
                        rd.Objc_id,
                        rd.Addr,
                        rd.Equip_id,
                        rd.EquipName,
                        rd.Date,
                        rd.Number,
                        rd.RepNumber,
                        rd.Empl_id,
                        rd.EmployeeName,
                        rd.Defect,
                        rd.Result,
                        rd.HeadComment,
                        rd.DateAgree,
                        rd.EmplAgree,
                        rd.EmplAgreeName,
                        rd.DateCreate,
                        rd.EmplCreate,
                        rd.DateChange,
                        rd.EmplChange,
                        rd.DelDate";
        $From =     "\nFrom RepairActDefectations_v rd";
        $Order =    "\nOrder by rd.Docm_id Desc";

        $this->Query->setSelect($Select);
        $this->Query->setFrom($From);
        $this->Query->setOrder($Order);

        $this->KeyFiled = 'rd.Docm_id';
    }
    
    public function attributeLabels()
    {
        return array(
                'Docm_id' => '',
                'Repr_id' => '',
                'Objc_id' => '',
                'Addr' => '',
                'Equip_id' => '',
                'EquipName' => '',
                'Date' => '',
                'Number' => '',
                'Empl_id' => '',
                'EmployeeName' => '',
                'Defect' => '',
                'Result' => '',
                'EmplAgreeName' => '',
                'DateCreate' => '',
                'EmplCreate' => '',
                'DateChange' => '',
                'EmplChange' => '',
                'DelDate' => '',
                'RepNumber' => 'RepNumber',
        );
    }
}



