<?php

class CostCalcSalarys extends MainFormModel
{
    public $ccsl_id = null;
    public $calc_id = null;
    public $empl_id = null;
    public $price = null;
    public $date_accept = null;
    public $EmployeeName = null;

    function __construct($scenario = '') {
        parent::__construct($scenario);

        $this->SP_INSERT_NAME = 'INSERT_CostCalcSalarys';
        $this->SP_UPDATE_NAME = 'UPDATE_CostCalcSalarys';
        $this->SP_DELETE_NAME = 'DELETE_CostCalcSalarys';

        $Select = "\nSelect 
                        c.ccsl_id,
                        c.calc_id,
                        c.empl_id,
                        c.price,
                        c.date_accept,
                        e.EmployeeName";
        
        $From = "\nFrom CostCalcSalarys c
                    left join Employees_ForObj_v e on (c.empl_id = e.Employee_id)";
        
        $Where = "\nWhere c.delDate is null";
        
//        $Order = "\nOrder by ";

        $this->Query->setSelect($Select);
        $this->Query->setFrom($From);
        $this->Query->setWhere($Where);
//        $this->Query->setOrder($Order);

        $this->KeyFiled = 'c.ccsl_id';
        $this->PrimaryKey = 'ccsl_id';
    }
    /**
     * @return string the associated database table name
     */
    public function tableName()
    {
        return 'CostCalcSalarys';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        return array(
            array('empl_id, calc_id', 'required'),
            array('ccsl_id, calc_id, empl_id', 'numerical', 'integerOnly'=>true),
            array('ccsl_id, calc_id, empl_id, price, date_accept, EmployeeName', 'safe'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array(
            'ccsl_id' => 'ccsl_id',
            'calc_id' => 'calc_id',
            'empl_id' => 'Сотрудник',
            'price' => 'Сумма',
            'date_accept' => 'date_accept',
            'EmployeeName' => 'EmployeeName',
        );
    }

}
