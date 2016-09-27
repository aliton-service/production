<?php

class WHDocumentsAll extends MainFormModel
{
    public $docm_id;
    public $objc_id;
    public $dctp_id;
    public $dctp_name;
    public $number; 
    public $date;
    public $date_create;
    public $note;
    public $actn_code;
    public $actn_name;
    public $ac_date;
    public $Source;
    public $Destination;
    public $achs_id;
    public $wrtp_name;
    public $wrtp_gr;
    public $strg_id;
    public $storage;
    
    function __construct($scenario = '') {
        parent::__construct($scenario);

        $this->SP_INSERT_NAME = '';
        $this->SP_UPDATE_NAME = '';
        $this->SP_DELETE_NAME = '';

        $Select = "\nSelect
                        d.docm_id,
                        d.objc_id,
                        d.dctp_id,
                        d.dctp_name,
                        d.number, 
                        d.date,
                        d.date_create,
                        d.note,
                        a.actn_code,
                        a.actn_name,
                        a.ac_date,
                        hldr_src_name + ': ' +
                                case when a.hldr_src_id = 1 then dbo.FIO(strm_name)
                                        when a.hldr_src_id = 2 then a.splr_name
                                        when a.hldr_src_id = 3 then dbo.FIO(mstr_name)
                                        when a.hldr_src_id = 6 then dbo.FIO(strm_name)
                                end as Source,
                        hldr_dst_name + ': ' +
                                case when a.hldr_dst_id = 1 then dbo.FIO(strm_name)
                                        when a.hldr_dst_id = 2 then a.splr_name
                                        when a.hldr_dst_id = 3 then dbo.FIO(mstr_name)
                                end as Destination,
                        a.achs_id,
                        d.wrtp_name,
                        case when (d.wrtp_name = 'Монтаж' or d.wrtp_name = 'Установка') then 'Монтаж' else 'Обслуживание' end as wrtp_gr,
                        d.strg_id,
                        d.storage";
        $From = "\nFrom WHDocuments_v d left join ActionHistory_v a on (d.achs_id = a.achs_id)";
        $Where = "\nWhere d.dctp_id <> 6";
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
                    actn_code,
                    actn_name,
                    ac_date,
                    Source,
                    Destination,
                    achs_id,
                    wrtp_name,
                    wrtp_gr,
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
            'actn_code' => '',
            'actn_name' => '',
            'ac_date' => '',
            'Source' => '',
            'Destination' => '',
            'achs_id' => '',
            'wrtp_name' => '',
            'wrtp_gr' => '',
            'strg_id' => '',
            'storage' => '',
        );
    }
}






