<?php

class Banks extends MainFormModel
{
    public $Bank_id = null;
    public $bank_name = null;
    public $cor_account = null;
    public $bik = null;
    public $City = null;
    public $Department = null;
    public $Status = null;
    public $DateCreate = null;
    public $EmplCreate = null;
    public $DateChange = null;
    public $EmplChange = null;
    public $DelDate = null;
    public $Lock = null;
    public $EmplLock = null;
    public $DateLock = null;
    public $EmplDel = null;

    public $SP_INSERT_NAME = 'INSERT_Banks';
    public $SP_UPDATE_NAME = 'UPDATE_Banks';
    public $SP_DELETE_NAME = 'DELETE_Banks';

    public $KeyFiled = 'b.Bank_id';
    public $PrimaryKey = 'Bank_id';

    function __construct($scenario='') {
        parent::__construct($scenario);
        $Select = "\nSelect b.*";
        $From = "\nFrom Banks b ";
        $Where = "\nWhere DelDate Is Null ";
        $Order = "\nOrder By b.bank_name ";

        $this->Query->setSelect($Select);
        $this->Query->setFrom($From);
        $this->Query->setOrder($Order);
        $this->Query->setWhere($Where);
    }

    public function rules()
    {
        return array(
            array('bank_name, cor_account, bik', 'required'),
            array('Bank_id,
                    bank_name,
                    cor_account,
                    bik,
                    City,
                    Department,
                    Status,
                    DateCreate,
                    EmplCreate,
                    DateChange,
                    EmplChange,
                    DelDate,
                    Lock,
                    EmplLock,
                    DateLock,
                    EmplDel,', 'safe'),
        );
    }

    public function attributeLabels()
    {
        return array(
            'Bank_id' => '',
            'bank_name' => 'Наименование банка',
            'cor_account' => 'Корсчет',
            'bik' => 'БИК',
            'City' => '',
            'Department' => '',
            'Status' => '',
            'DateCreate' => '',
            'EmplCreate' => '',
            'DateChange' => '',
            'EmplChange' => '',
            'DelDate' => '',
            'Lock' => '',
            'EmplLock' => '',
            'DateLock' => '',
            'EmplDel' => '',
        );
    }
}
