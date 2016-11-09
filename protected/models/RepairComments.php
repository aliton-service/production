<?php

class RepairComments extends MainFormModel
{
    public $Rpcm_id;
    public $Repr_id;
    public $Date;
    public $Auto;
    public $Comment;
    public $EmplCreate;
    public $EmployeeName;
    public $DatePlan;
        
    public function rules() {
            return array(
                    array('Rpcm_id,
                            Repr_id,
                            Date,
                            DatePlan,
                            Auto,
                            Comment,
                            EmplCreate,
                            EmployeeName', 'safe'),
            );
    }
        
    function __construct() {
        parent::__construct();
        
        $this->SP_INSERT_NAME = 'INSERT_RepairComments';
        $this->SP_UPDATE_NAME = '';
        $this->SP_DELETE_NAME = '';
                
        $Select = "\nSelect
                        rc.Rpcm_id,
                        rc.Repr_id,
                        rc.Date,
                        rc.Auto,
                        rc.Comment,
                        rc.EmplCreate,
                        dbo.FIO(e.EmployeeName) as EmployeeName,
                        rc.DatePlan";
        $From = "\nFrom RepairComments rc left join Employees e on (rc.EmplCreate = e.Employee_id)";
        $Order = "\nOrder by rc.Rpcm_id desc";

        $this->Query->setSelect($Select);
        $this->Query->setFrom($From);
        $this->Query->setOrder($Order);
    }


    public function attributeLabels()
    {
        return array(
            'Rpcm_id' => '',
            'Repr_id' => '',
            'Date' => '',
            'DatePlan' => '',
            'Auto' => '',
            'Comment' => '',
            'EmplCreate' => '',
            'EmployeeName' => '',
        );
    }
}
