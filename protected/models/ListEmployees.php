<?php

class ListEmployees extends MainFormModel
{
    public $Employee_id;
    public $Employee_id_For_Demands;
    public $EmployeeName;
    public $ShortName;
    public $Sort;
        
    public function rules()
    {
        return array(
            array('Employee_id', 'required'),
            array('Employee_id,
                    Employee_id_For_Demands,
                    EmployeeName,
                    ShortName,
                    Sort', 'safe')
        );
    }
	
    function __construct($scenario = '') {

        parent::__construct($scenario);

        $this->SP_INSERT_NAME = '';
        $this->SP_UPDATE_NAME = '';
        $this->SP_DELETE_NAME = '';
        
        $Select = " Select
                        e.Employee_id,
                        '#' + cast(e.Employee_id as nvarchar) + '#' as Employee_id_For_Demands,
                        e.EmployeeName,
                        e.ShortName,
                        e.Sort";
        $From = "\nFrom ListEmployees_v e";
        $Order = "\nOrder by e.Sort, e.EmployeeName";
        $this->Query->setSelect($Select);
        $this->Query->setFrom($From);
        $this->Query->setOrder($Order);
        $this->KeyFiled = 'e.Employee_id';
        $this->PrimaryKey = 'Employee_id';
    }
    
    public function attributeLabels()
    {
            return array(
                    'Employee_id' => 'ФИО',
                    'Employee_id_For_Demands' => 'ФИО',
                    'EmployeeName' => 'ФИО',
                    'ShortName' => '',
                    'Sort' => '',
            );
    }

}


