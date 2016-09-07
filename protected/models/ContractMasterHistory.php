<?php

class ContractMasterHistory extends MainFormModel
{
    public $History_id;
    public $ContrS_id;
    public $Master;
    public $EmployeeName;
    public $WorkDateStart;
    public $WorkDateEnd;


    public $SP_INSERT_NAME = '';
    public $SP_UPDATE_NAME = '';
    public $SP_DELETE_NAME = '';


    public function rules()
    {
        return array(
            array('History_id, ContrS_id, Master', 'numerical', 'integerOnly'=>true),
            array('ContrS_id, Master, WorkDateStart, WorkDateEnd', 'required'),
            array('EmployeeName', 'length', 'max'=>50),
            array('History_id, ContrS_id, Master, EmployeeName, WorkDateStart, WorkDateEnd', 'safe'),
        );
    }

    function __construct($scenario='') {
        
        $this->SP_INSERT_NAME = 'INSERT_ContractMasterHistory';
        $this->SP_UPDATE_NAME = 'UPDATE_ContractMasterHistory';
        $this->SP_DELETE_NAME = 'DELETE_ContractMasterHistory';
        
        parent::__construct($scenario);
        $select = "
            Select
                c.History_id,
                c.ContrS_id,
                c.Master,
                e.EmployeeName EmployeeName,
                c.WorkDateStart,
                c.WorkDateEnd
        ";

        $from = "
            From ContractMasterHistory c left join Employees_ForObj_v e on (c.Master = e.Employee_id)
        ";

        $where = "
            Where c.DelDate is Null
	";

//        $order = "
//        ";

        // Инициализация первичного ключа
        $this->KeyFiled = 'c.History_id';
        $this->PrimaryKey = 'History_id';

        $this->Query->setSelect($select);
        $this->Query->setFrom($from);
	$this->Query->setWhere($where);
//        $this->Query->setOrder($order);
    }
        
    public function attributeLabels()
    {
        return array(
            'History_id' => 'History id',
            'ContrS_id' => 'ContrS id',
            'Master' => 'Имя мастера',
            'EmployeeName' => 'Имя мастера',
            'WorkDateStart' => 'с',
            'WorkDateEnd' => 'по',
        );
    }

}
