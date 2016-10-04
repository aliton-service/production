<?php

class WHDocumentsDoc1 extends MainFormModel
{
    public $docm_id;
    public $objc_id;
    public $dctp_id;
    public $dctp_name;
    public $dckn_id;
    public $dckn_name;
    public $number;
    public $date;
    public $date_create;
    public $note;
    public $splr_id;
    public $splr_name;
    public $ac_date;
    public $strm_name ;
    public $achs_id;
    public $wrtp_id;
    public $wrtp_name;
    public $summa;
    public $c_date;
    public $c_name;
    public $c_confirmname;
    public $strg_id;
    public $storage;
    public $jrdc_id;
    public $JuridicalPerson;
    
    function __construct($scenario = '') {
        parent::__construct($scenario);

        $this->SP_INSERT_NAME = 'INSERT_WHDocuments';
        $this->SP_UPDATE_NAME = 'UPDATE_WHDocuments';
        $this->SP_DELETE_NAME = 'DELETE_WHDocuments';

        $Select = "\nSelect 
                        d.docm_id,
                        d.objc_id,
                        d.dctp_id,
                        d.dctp_name,
                        d.dckn_id,
                        d.dckn_name,
                        d.number,
                        d.date,
                        d.date_create,
                        d.note,
                        d.splr_id,
                        d.splr_name,
                        a.ac_date,
                        dbo.FIO(strm_name) strm_name ,
                        a.achs_id,
                        d.wrtp_id,
                        d.wrtp_name,
                        dbo.get_docmachsdetails_sum(d.docm_id) as summa,
                        ac.date as c_date,
                        ac.EmployeeName as c_name,
                        ac.ConfirmCancelName as c_confirmname,
                        d.strg_id,
                        d.storage,
                        d.jrdc_id,
                        d.JuridicalPerson";
        $From = "\nFrom WHDocuments_NonTreb_v d left join ActionHistory_v a on (d.achs_id = a.achs_id)
                    left join ActionConfirm_v ac on (ac.docm_id = d.docm_id)";
        $Where = "\nWhere d.dctp_id = 1";
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
            array('number, date, splr_id, dckn_id, wrtp_id, strg_id', 'required'),
            array('docm_id,
                    objc_id,
                    dctp_id,
                    dctp_name,
                    dckn_id,
                    dckn_name,
                    number,
                    date,
                    date_create,
                    note,
                    splr_id,
                    splr_name,
                    ac_date,
                    strm_name ,
                    achs_id,
                    wrtp_id,
                    wrtp_name,
                    summa,
                    c_date,
                    c_name,
                    c_confirmname,
                    strg_id,
                    storage,
                    jrdc_id,
                    JuridicalPerson', 'safe'),
        );
    }
    
    public function attributeLabels()
    {
        return array(
            'docm_id' => '',
            'objc_id' => '',
            'dctp_id' => '',
            'dctp_name' => '',
            'dckn_id' => 'Вид документа',
            'dckn_name' => '',
            'number' => 'Номер',
            'date' => 'Дата',
            'date_create' => '',
            'note' => '',
            'splr_id' => 'Поставщик',
            'splr_name' => '',
            'ac_date' => '',
            'strm_name ' => '',
            'achs_id' => '',
            'wrtp_id' => 'Вид работ',
            'wrtp_name' => '',
            'summa' => '',
            'c_date' => '',
            'c_name' => '',
            'c_confirmname' => '',
            'strg_id' => 'Склад',
            'storage' => '',
            'jrdc_id' => '',
            'JuridicalPerson' => '',
        );
    }
    
    public function attributeFilters()
    {
        return array(
            'date' => 'd.date',
            'summa' => 'dbo.get_docmachsdetails_sum(d.docm_id)',
            'splr_name' => 'd.splr_id',
            'c_date' => 'ac.date',
            'c_name' => 'ac.EmployeeName',
            'c_confirmname' => 'ac.ConfirmCancelName'
        );
        
        
    }
    
    public function attributeSotrs() {
        return array(
            'date' => 'd.date',
            'summa' => 'dbo.get_docmachsdetails_sum(d.docm_id)',
            'splr_name' => 'd.splr_name',
            'c_date' => 'ac.date',
            'c_name' => 'ac.EmployeeName',
            'c_confirmname' => 'ac.ConfirmCancelName'
        );
    }
    
}






