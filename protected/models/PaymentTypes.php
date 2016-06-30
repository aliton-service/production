<?php

class PaymentTypes extends MainFormModel
{
    
    public $PaymentType_Id;
    public $PaymentTypeName;
    public $DateCreate;
    public $EmplCreate;
    public $DateChange;
    public $EmplChange;
    public $EmplDel;
    public $EmplLock;
    public $Lock;
    public $DateLock;
    
    public function rules()
    {
        return array(
            array('PaymentType_Id,'
                . ' PaymentTypeName,'
                . ' Lock,'
                . ' EmplLock,'
                . ' DateLock,'
                . ' EmplCreate,'
                . ' DateCreate,'
                . ' EmplChange,'
                . ' DateChange,'
                . ' EmplDel,'
                . ' DelDate', 'safe', 'on'=>'search'),
        );
    }
    
    function __construct($scenario = '') {

        parent::__construct($scenario);

        $this->SP_INSERT_NAME = '';
        $this->SP_UPDATE_NAME = '';
        $this->SP_DELETE_NAME = '';

        $Select = "Select
                        pt.PaymentType_Id,
                        pt.PaymentTypeName,
                        pt.DateCreate,
                        pt.EmplCreate,
                        pt.DateChange,
                        pt.EmplChange,
                        pt.EmplDel,
                        pt.EmplLock,
                        pt.Lock,
                        pt.DateLock";
        $From = "\nFrom PaymentTypes pt";
        $Order = "\nOrder by pt.PaymentTypeName";
        
        $this->Query->setSelect($Select);
        $this->Query->setFrom($From);
        $this->Query->setOrder($Order);
        
        // Инициализация первичного ключа
        $this->KeyFiled = 'pt.PaymentType_Id';
        $this->PrimaryKey = 'PaymentType_Id';
    }
}
