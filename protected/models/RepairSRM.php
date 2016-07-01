<?php

class RepairSRM extends MainFormModel {
    
    public $Docm_id;
    public $Repr_id;
    public $Objc_id;
    public $Splr_id;
    public $RepNumber;
    public $NameSupplier;
    public $Addr;
    public $Number;
    public $Equip_id;
    public $EquipName;
    public $Date;
    public $Contact;
    public $Empl_id;
    public $EmployeeName;
    public $Defect;
    public $Result;
    public $Note;
    public $EmplAgree;
    public $EmplAgreeName;
    public $DiagnosticPay;
    public $DiagnosticSum;
    public $RepairSum;
    public $DateAgree;
    public $HeadComment;
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
                        Splr_id,
                        NameSupplier,
                        Addr,
                        Number,
                        RepNumber,
                        Equip_id,
                        EquipName,
                        Date,
                        Number,
                        Contact,
                        Empl_id,
                        EmployeeName,
                        Defect,
                        Result,
                        Note,
                        EmplAgree,
                        EmplAgreeName,
                        DiagnosticPay,
                        DiagnosticSum,
                        RepairSum,
                        DateAgree,
                        HeadComment,
                        DateCreate,
                        EmplCreate,
                        DateChange,
                        EmplChange,
                        DelDate', 'safe'),
        );
    }
    
    public function __construct($scenario = '') {
        parent::__construct($scenario);

        $this->SP_INSERT_NAME = 'INSERT_RepairSRM';
        $this->SP_UPDATE_NAME = 'UPDATE_RepairSRM';
        $this->SP_DELETE_NAME = 'DELETE_RepairSRM';

        $Select =   "Select
                        srm.Docm_id,
                        srm.Repr_id,
                        srm.Objc_id,
                        srm.Splr_id,
                        srm.NameSupplier,
                        srm.Addr,
                        srm.RepNumber,
                        srm.Equip_id,
                        srm.EquipName,
                        srm.Date,
                        srm.Number,
                        srm.Contact,
                        srm.Empl_id,
                        srm.EmployeeName,
                        srm.Defect,
                        srm.Result,
                        srm.Note,
                        srm.EmplAgree,
                        srm.EmplAgreeName,
                        srm.DiagnosticPay,
                        srm.DiagnosticSum,
                        srm.RepairSum,
                        srm.DateAgree,
                        srm.HeadComment,
                        srm.DateCreate,
                        srm.EmplCreate,
                        srm.DateChange,
                        srm.EmplChange,
                        srm.DelDate";
        $From =     "\nFrom RepairSRM_v srm";
        $Order =    "\nOrder by srm.Docm_id Desc";

        $this->Query->setSelect($Select);
        $this->Query->setFrom($From);
        $this->Query->setOrder($Order);

        $this->KeyFiled = 'srm.Docm_id';
    }
    
    public function attributeLabels()
    {
        return array(
                'Docm_id' => '',
                'Repr_id' => '',
                'Objc_id' => '',
                'Splr_id' => '',
                'NameSupplier' => '',
                'Addr' => '',
                'Number' => '',
                'RepNumber' => '',
                'Equip_id' => '',
                'EquipName' => '',
                'Date' => '',
                'Number' => '',
                'Contact' => '',
                'Empl_id' => '',
                'EmployeeName' => '',
                'Defect' => '',
                'Result' => '',
                'Note' => '',
                'EmplAgree' => '',
                'EmplAgreeName' => '',
                'DiagnostiсPay' => '',
                'DiagnostiсSum' => '',
                'RepairSum' => '',
                'DateAgree' => '',
                'HeadComment' => '',
                'DateCreate' => '',
                'EmplCreate' => '',
                'DateChange' => '',
                'EmplChange' => '',
                'DelDate' => '',
        );
    }
}





