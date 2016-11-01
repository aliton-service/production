<?php

class WhActs_v extends MainFormModel
{
    public $docm_id;
    public $achs_id;
    public $date;
    public $objc_id;
    public $ObjectGr_id;
    public $Address;
    public $org_name;
    public $cntr_id;
    public $ServiceType;
    public $wrtp_id;
    public $wrtp_name;
    public $sum;
    public $pmtp_id;
    public $pmtp_name;
    public $bill;
    public $date_payment;
    public $note_payment;
    public $dckn_id;
    public $dckn_name;
    public $jbtp_id;
    public $jbtp_name;
    public $note;
    public $work_list;
    public $dmnd_empl_id;
    public $master;
    public $signed_yn;
    public $cstm_id;
    public $cstm_name;
    public $jrdc_id;
    public $JuridicalPerson;
    public $EmplCreate;
    public $date_create;
    public $EmplChange;
    public $date_change;
    public $dlrs_id;
    public $calc_id;
    public $repr_id;
    public $UserCreate;
    public $DelDate;
    
    public function rules()
    {
        return array(
                array('date, pmtp_id, dmnd_empl_id, jrdc_id', 'required'),
                array(''
                    . 'docm_id,
                        achs_id,
                        date,
                        objc_id,
                        ObjectGr_id,
                        Address,
                        org_name,
                        cntr_id,
                        ServiceType,
                        wrtp_id,
                        wrtp_name,
                        sum,
                        pmtp_id,
                        pmtp_name,
                        bill,
                        date_payment,
                        note_payment,
                        dckn_id,
                        dckn_name,
                        jbtp_id,
                        jbtp_name,
                        note,
                        work_list,
                        dmnd_empl_id,
                        master,
                        signed_yn,
                        cstm_id,
                        cstm_name,
                        jrdc_id,
                        JuridicalPerson,
                        EmplCreate,
                        date_create,
                        EmplChange,
                        date_change,
                        dlrs_id,
                        calc_id,
                        repr_id,
                        UserCreate,
                        DelDate', 'safe'),
        );
    }
    
    public function __construct($scenario = '') {
	
        parent::__construct($scenario);

        $this->SP_INSERT_NAME = 'INSERT_WhActs';
        $this->SP_UPDATE_NAME = 'UPDATE_WhActs';
        $this->SP_DELETE_NAME = 'DELETE_WhActs';

        $Select = "\nSelect"
                . "     w.*";
        $From = "\nFrom WhActs_v w";
        $Order = "\nOrder by w.docm_id";

        $this->Query->setSelect($Select);
        $this->Query->setFrom($From);
        $this->Query->setOrder($Order);

        // Инициализация первичного ключа
        $this->KeyFiled = 'w.docm_id';
        $this->PrimaryKey = 'docm_id';
    }
    
    public function attributeLabels()
    {
        return array(
            'docm_id' => 'docm_id',
            'achs_id' => 'achs_id',
            'date' => 'date',
            'objc_id' => 'objc_id',
            'ObjectGr_id' => 'ObjectGr_id',
            'Address' => 'Address',
            'org_name' => 'org_name',
            'cntr_id' => 'cntr_id',
            'ServiceType' => 'ServiceType',
            'wrtp_id' => 'wrtp_id',
            'wrtp_name' => 'wrtp_name',
            'sum' => 'sum',
            'pmtp_id' => 'Форма оплаты',
            'pmtp_name' => 'pmtp_name',
            'bill' => 'bill',
            'date_payment' => 'date_payment',
            'note_payment' => 'note_payment',
            'dckn_id' => 'dckn_id',
            'dckn_name' => 'dckn_name',
            'jbtp_id' => 'jbtp_id',
            'jbtp_name' => 'jbtp_name',
            'note' => 'note',
            'work_list' => 'work_list',
            'dmnd_empl_id' => 'Исполнитель',
            'master' => 'master',
            'signed_yn' => 'signed_yn',
            'cstm_id' => 'cstm_id',
            'cstm_name' => 'cstm_name',
            'jrdc_id' => 'Юр. лицо',
            'JuridicalPerson' => 'JuridicalPerson',
            'EmplCreate' => 'EmplCreate',
            'date_create' => 'date_create',
            'EmplChange' => 'EmplChange',
            'date_change' => 'date_change',
            'dlrs_id' => 'dlrs_id',
            'calc_id' => 'calc_id',
            'repr_id' => 'repr_id',
            'UserCreate' => 'UserCreate',
            'DelDate' => 'DelDate',
        );
    }
}

