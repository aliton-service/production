<?php

class WHBuhActs extends MainFormModel
{
    public $docm_id;
    public $achs_id;
    public $date;
    public $objc_id;
    public $ObjectGr_id;
    public $Address;
    public $org_name;
    public $wrtp_id;
    public $wrtp_name;
    public $sum;
    public $jbtp_id;
    public $jbtp_name;
    public $note = '.';
    public $work_list;
    public $info_id;
    public $FIO;
    public $jrdc_id;
    public $JuridicalPerson;
    public $calc_id;
    public $ReceiptNumber;
    public $ReceiptDate;
    public $rcrs_name;
    public $number;
    public $rcrs_id;
    public $signed_yn;
    public $date_ready;
    public $date_act;
    public $state;
    public $EmplCreate;
    
    function __construct($scenario = '') {
        parent::__construct($scenario);

        $this->SP_INSERT_NAME = 'INSERT_WHBuhActs';
        $this->SP_UPDATE_NAME = 'UPDATE_WHBuhActs';
        $this->SP_DELETE_NAME = 'DELETE_WHBuhActs';

        $Select = "\nSelect 
                        d.docm_id,
                        d.achs_id,
                        d.date,
                        d.objc_id,
                        d.ObjectGr_id,
                        d.Address,
                        d.org_name,
                        d.wrtp_id,
                        d.wrtp_name,
                        d.sum,
                        d.jbtp_id,
                        d.jbtp_name,
                        d.note,
                        d.work_list,
                        d.info_id,
                        d.FIO,
                        d.jrdc_id,
                        d.JuridicalPerson,
                        d.calc_id,
                        d.ReceiptNumber,
                        d.ReceiptDate,
                        d.rcrs_name,
                        d.number,
                        d.rcrs_id,
                        d.signed_yn,
                        d.date_ready,
                        d.date_act,
                        case when d.achs_id is null then 'Не утвержден' else 'Утвержден' end as state";
        $From = "\nFrom WHBuhActs d";
        

        $this->Query->setSelect($Select);
        $this->Query->setFrom($From);
        //$this->Query->setWhere($Where);
        //$this->Query->setOrder($Order);
        
        $this->KeyFiled = 'd.docm_id';
        $this->PrimaryKey = 'docm_id';
    }
    
    public function rules()
    {
        return array(
            array('achs_id,
                    date,
                    objc_id,
                    ObjectGr_id,
                    Address,
                    wrtp_id,
                    wrtp_name,
                    sum,
                    jbtp_id,
                    jbtp_name,
                    note,
                    work_list,
                    info_id,
                    FIO,
                    jrdc_id,
                    JuridicalPerson,
                    calc_id,
                    ReceiptNumber,
                    ReceiptDate,
                    rcrs_name,
                    number,
                    rcrs_id,
                    signed_yn,
                    date_ready,
                    date_act', 'safe'),
        );
    }
    
    public function attributeLabels()
    {
        return array(
            'docm_id' => '',
            'docm_id' => '',
            'achs_id' => '',
            'date' => '',
            'objc_id' => '',
            'ObjectGr_id' => '',
            'Address' => '',
            'org_name' => '',
            'wrtp_id' => '',
            'wrtp_name' => '',
            'sum' => '',
            'jbtp_id' => '',
            'jbtp_name' => '',
            'note' => '',
            'work_list' => '',
            'info_id' => '',
            'FIO' => '',
            'jrdc_id' => '',
            'JuridicalPerson' => '',
            'calc_id' => '',
            'ReceiptNumber' => '',
            'ReceiptDate' => '',
            'rcrs_name' => '',
            'number' => '',
            'rcrs_id' => '',
            'signed_yn' => '',
            'date_ready' => '',
            'date_act' => '',
            'date_act' => '',
        );
    }
}


