<?php

class WHDocumentsDoc9 extends MainFormModel
{
    public $docm_id;
    public $dctp_id;
    public $dctp_name;
    public $number;
    public $status;
    public $date;
    public $date_create;
    public $note;
    public $address;
    public $ac_date;
    public $dmnd_empl_name;
    public $dmnd_empl_id;
    public $empl_name;
    public $empl_id;
    public $strm_id;
    public $strm_name;
    public $achs_id;
    public $strg_id;
    public $storage;
    public $repr_id;
    
    function __construct($scenario = '') {
        parent::__construct($scenario);

        $this->SP_INSERT_NAME = '';
        $this->SP_UPDATE_NAME = '';
        $this->SP_DELETE_NAME = '';

        $Select = "\nSelect
                        d.docm_id,
                        d.dctp_id,
                        d.dctp_name,
                        d.number,
                        case when a.achs_id is null then 'Не выдано' else 'Выдано' end [status],
                        d.date,
                        d.date_create,
                        d.note,
                        d.address,
                        a.ac_date,
                        d.dmnd_empl_name,
                        d.dmnd_empl_id,
                        d.empl_name,
                        d.empl_id,
                        a.strm_id,
                        dbo.FIO(a.strm_name) as strm_name,
                        a.achs_id,
                        isnull(d.strg_id, 1) as strg_id,
                        isnull(d.storage, '') as storage,
                        d.repr_id";
        $From = "\nFrom WHDocuments_v d left join ActionHistory_v a on (d.achs_id = a.achs_id)";
        $Where = "\nWhere d.dctp_id = 9";
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
            array('dmnd_empl_id, strg_id, date, empl_id', 'required'),
            array('docm_id,
                    dctp_id,
                    dctp_name,
                    number,
                    status,
                    date,
                    date_create,
                    note,
                    address,
                    ac_date,
                    dmnd_empl_name,
                    dmnd_empl_id,
                    empl_name,
                    empl_id,
                    strm_id,
                    strm_name,
                    achs_id,
                    strg_id,
                    storage,
                    repr_id', 'safe'),
        );
    }
    
    public function attributeLabels()
    {
        return array(
            'docm_id' => '',
            'dctp_id' => '',
            'dctp_name' => '',
            'number' => '',
            'status' => '',
            'date' => 'Дата',
            'date_create' => '',
            'note' => '',
            'address' => '',
            'ac_date' => '',
            'dmnd_empl_name' => '',
            'dmnd_empl_id' => 'Мастер',
            'empl_name' => '',
            'empl_id' => 'Создал',
            'strm_id' => '',
            'strm_name' => '',
            'achs_id' => '',
            'strg_id' => 'Склад',
            'storage' => '',
            'repr_id' => '',
        );
    }
    
    public function attributeFilters()
    {
        return array(
            'date' => 'd.date',
        );
        
        
    }
    
    public function attributeSotrs() {
        return array(
            'date' => 'd.date',
        );
    }
    
}