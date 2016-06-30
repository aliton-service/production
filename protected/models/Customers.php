<?php

class Customers extends MainFormModel
{
    public $Customer_Id;
    public $CustomerName;
    public $Reduction;
    public $Lock;
    public $EmplLock;
    public $DateLock;
    public $EmplCreate;
    public $DateCreate;
    public $EmplChange;
    public $DateChange;
    public $DelDate;
    public $EmplDel;
    
    public function rules()
    {
        return array(
            array(' Customer_Id,
                    CustomerName,
                    Reduction,
                    Lock,
                    EmplLock,
                    DateLock,
                    EmplCreate,
                    DateCreate,
                    EmplChange,
                    DateChange,
                    DelDate,
                    EmplDel', 'safe', 'on'=>'search'),
        );
    }
    
    function __construct($scenario = '') {

        parent::__construct($scenario);

        $this->SP_INSERT_NAME = 'INSERT_Customer';
        $this->SP_UPDATE_NAME = 'UPDATE_Customer';
        $this->SP_DELETE_NAME = 'DELETE_Customer';

        $Select = "Select
                        c.Customer_Id,
                        c.CustomerName,
                        c.Reduction,
                        c.Lock,
                        c.EmplLock,
                        c.DateLock,
                        c.EmplCreate,
                        c.DateCreate,
                        c.EmplChange,
                        c.DateChange,
                        c.DelDate,
                        c.EmplDel";
        $From = "\nFrom Customers c";
        $Where = "\nWhere c.DelDate is null";
        $Order = "\nOrder by c.CustomerName";
        
        $this->Query->setSelect($Select);
        $this->Query->setFrom($From);
        $this->Query->setWhere($Where);
        $this->Query->setOrder($Order);
        
        // Инициализация первичного ключа
        $this->KeyFiled = 'c.Customer_Id';
        $this->PrimaryKey = 'Customer_Id';
    }
	
    public function attributeLabels()
    {
            return array(
                    'Customer_Id' => 'Customer',
                    'CustomerName' => 'CustomerName',
                    'Reduction' => 'Reduction',
            );
    }
     
    public function getData() {
        $q = new SQLQuery();
        $q->setSelect("Select Customer_id, CustomerName");
        $q->setFrom("\nFrom Customers");
        $q->setWhere("\nOrder by CustomerName");
        return $q->QueryAll();
    }
}
