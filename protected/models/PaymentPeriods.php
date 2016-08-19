<?php

class PaymentPeriods extends MainFormModel
{
    
    public $PaymentPeriod_Id;
    public $PaymentName;
    
    public function rules()
    {
        return array(
            array('PaymentPeriod_Id, PaymentName', 'safe', 'on'=>'search'),
        );
    }
    
    function __construct($scenario = '') {

        parent::__construct($scenario);

        $this->SP_INSERT_NAME = '';
        $this->SP_UPDATE_NAME = '';
        $this->SP_DELETE_NAME = '';

        $Select = "Select
                        pp.PaymentPeriod_Id,
                        pp.PaymentName";
        $From = "\nFrom PaymentPeriods pp";
        $Order = "\nOrder by pp.PaymentName";
        
        $this->Query->setSelect($Select);
        $this->Query->setFrom($From);
        $this->Query->setOrder($Order);
        
        // Инициализация первичного ключа
        $this->KeyFiled = 'pp.PaymentPeriod_Id';
        $this->PrimaryKey = 'PaymentPeriod_Id';
    }
}
