<?php

class WHDocumentsDoc3 extends MainFormModel
{
    public $docm_id;
    public $objc_id;
    public $dctp_id;
    public $dctp_name;
    public $number; 
    public $date;
    public $date_create;
    public $note;
    public $splr_name;
    public $ac_date;
    public $strm_name;
    public $achs_id;
    public $wrtp_name;
    public $strg_id;
    public $storage;
    
    function __construct($scenario = '') {
        parent::__construct($scenario);

        $this->SP_INSERT_NAME = '';
        $this->SP_UPDATE_NAME = '';
        $this->SP_DELETE_NAME = '';

        $Select = "\nSelect
                        d.docm_id,
                        d.dctp_id,
                        d.objc_id,
                        d.dctp_name,
                        d.number, 
                        d.date,
                        d.date_create,
                        d.note,
                        d.splr_name,
                        a.ac_date,
                        dbo.FIO(strm_name) strm_name,
                        a.achs_id,
                        d.wrtp_name,
                        d.strg_id,
                        d.storage";
        $From = "\nFrom WHDocuments_NonTreb_v d left join ActionHistory_v a on (d.achs_id = a.achs_id)";
        $Where = "\nWhere d.dctp_id = 3";
        $Order = "\nOrder by a.ac_date";

        $this->Query->setSelect($Select);
        $this->Query->setFrom($From);
        $this->Query->setWhere($Where);
        $this->Query->setOrder($Order);
        
        $this->KeyFiled = 'd.docm_id';
        $this->PrimaryKey = 'docm_id';
    }
    
    public function rules()
    {
        return array(
            array('docm_id,
                    objc_id,
                    dctp_id,
                    dctp_name,
                    number, 
                    date,
                    date_create,
                    note,
                    splr_name,
                    ac_date,
                    strm_name,
                    achs_id,
                    wrtp_name,
                    strg_id,
                    storage,', 'safe'),
        );
    }
    
    public function attributeLabels()
    {
        return array(
            'docm_id' => '',
            'objc_id' => '',
            'dctp_id' => '',
            'dctp_name' => '',
            'number' => '', 
            'date' => '',
            'date_create' => '',
            'note' => '',
            'splr_name' => '',
            'ac_date' => '',
            'strm_name' => '',
            'achs_id' => '',
            'wrtp_name' => '',
            'strg_id' => '',
            'storage' => '',
        );
    }
    
    public function attributeFilters()
    {
        return array(
            'date' => 'd.date',
            'splr_name' => 'd.splr_id',
        );
        
        
    }
    
    public function attributeSotrs() {
        return array(
            'date' => 'd.date',
            'splr_name' => 'd.splr_name',
        );
    }
    
}









