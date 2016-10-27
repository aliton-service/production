<?php

class WhActsReestr_v extends MainFormModel
{
    public $docm_id;
    public $achs_id;
    public $date;
    public $ac_date;
    public $objc_id;
    public $ObjectGr_id;
    public $Address;
    public $sum;
    public $date_payment;
    public $note;
    public $work_list;
    public $dmnd_empl_id;
    public $signed_yn;
    public $cstm_id;
    public $cstn_name;
    public $master;
    public $c_date;
    public $c_name;
    public $c_confirmname;
    public $date_create;
    public $EmplCreate;
    public $user_create;
    public $dctp_id;
    public $DelDate;
    public $sort;

    
    public function __construct($scenario = '') {
	
        parent::__construct($scenario);

        $this->SP_INSERT_NAME = '';
        $this->SP_UPDATE_NAME = '';
        $this->SP_DELETE_NAME = '';

        $Select = " Select"
                . "     w.*";
        $From = "From WhActsReestr_v w";
        $Order = "Order by w.sort, w.date";

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
        );
    }
    
     public function attributeFilters()
    {
        return array(
            'master' => 'w.dmnd_empl_id',
            
        );
        
        
    }
}

