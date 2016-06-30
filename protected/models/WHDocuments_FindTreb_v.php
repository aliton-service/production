<?php

class WHDocuments_FindTreb_v extends MainFormModel
{
    public $docm_id;
    public $dctp_id;
    public $dctp_name;
    public $number; 
    public $date;
    public $date_create;
    public $prty_name;
    public $wrtp_name;
    public $note;
    public $Address;
    public $best_date;
    public $deadline;
    public $date_ready;
    public $ac_date;
    public $dmnd_empl_name;
    public $prms_empl_name;
    public $strm_name;
    public $mstr_name;
    public $rcrs_name;
    public $StatusFull;
    public $status;
    public $achs_id;
    public $objc_id;
    public $exceedYN;
    
    public function rules()
    {
        return array(
            array(' docm_id,
                    dctp_id,
                    dctp_name,
                    number, 
                    date,
                    date_create,
                    prty_name,
                    wrtp_name,
                    note,
                    Address,
                    best_date,
                    deadline,
                    date_ready,
                    ac_date,
                    dmnd_empl_name,
                    prms_empl_name,
                    strm_name,
                    mstr_name,
                    rcrs_name,
                    StatusFull,
                    status,
                    achs_id,
                    objc_id,
                    exceedYN', 'safe'),
            );
    }
    
    public function __construct($scenario = '') {
	
        parent::__construct($scenario);

        $this->SP_INSERT_NAME = '';
        $this->SP_UPDATE_NAME = '';
        $this->SP_DELETE_NAME = '';

        $Select = " Select "
                . "     d.docm_id,
                        d.dctp_id,
                        d.dctp_name,
                        d.number, 
                        d.date,
                        d.date_create,
                        d.prty_name,
                        d.wrtp_name,
                        d.note,
                        d.Address,
                        d.best_date,
                        d.deadline,
                        d.date_ready,
                        d.ac_date,
                        d.dmnd_empl_name,
                        d.prms_empl_name,
                        d.strm_name,
                        d.mstr_name,
                        d.rcrs_name,
                        d.StatusFull,
                        d.status,
                        d.achs_id,
                        d.objc_id,
                        d.exceedYN";
        $From = "\nFrom WHDocuments_FindTreb_v d";
        $Order = "\nOrder by d.ac_date";

        $this->Query->setSelect($Select);
        $this->Query->setFrom($From);
        $this->Query->setOrder($Order);

        // Инициализация первичного ключа
        $this->KeyFiled = 'd.docm_id';
        $this->PrimaryKey = 'docm_id';
    }
    
    public function attributeLabels()
    {
        return array(
            'docm_id' => 'docm_id',
            'dctp_id' => 'dctp_id',
            'dctp_name' => 'dctp_name',
            'number' => 'number', 
            'date' => 'date',
            'date_create' => 'date_create',
            'prty_name' => 'prty_name',
            'wrtp_name' => 'wrtp_name',
            'note' => 'note',
            'Address' => 'Address',
            'best_date' => 'best_date',
            'deadline' => 'deadline',
            'date_ready' => 'date_ready',
            'ac_date' => 'ac_date',
            'dmnd_empl_name' => 'dmnd_empl_name',
            'prms_empl_name' => 'prms_empl_name',
            'strm_name' => 'strm_name',
            'mstr_name' => 'mstr_name',
            'rcrs_name' => 'rcrs_name',
            'StatusFull' => 'StatusFull',
            'status' => 'status',
            'achs_id' => 'achs_id',
            'objc_id' => 'objc_id',
            'exceedYN' => 'exceedYN',
        );
    }
}

