<?php


class RepairWorkings extends MainFormModel
{
    public $RepairWorking_id;
    public $Repr_id;
    public $Empl_id;
    public $WorkStart;
    public $WorkEnd;
    public $DateCreate;
    public $EmplCreate;
    public $DateChange;
    public $EmplChange;
    public $DelDate;

    
    public function rules() {
        return array(
                array('RepairWorking_id,
                        Repr_id,
                        Empl_id,
                        WorkStart,
                        WorkEnd,
                        DateCreate,
                        EmplCreate,
                        DateChange,
                        EmplChange,
                        DelDate', 'safe'),
        );
    }
    
    function __construct($scenario='') {
        parent::__construct($scenario);

        $this->SP_INSERT_NAME = 'INSERT_RepairWorkings';
        $this->SP_UPDATE_NAME = 'UPDATE_RepairWorkings';
        $this->SP_DELETE_NAME = 'DELETE_RepairWorkings';

        $Select = "\nSelect
                        rw.RepairWorking_id,
                        rw.Repr_id,
                        rw.Empl_id,
                        rw.WorkStart,
                        rw.WorkEnd,
                        rw.DateCreate,
                        rw.EmplCreate,
                        rw.DateChange,
                        rw.EmplChange,
                        rw.DelDate";
        $From = "\nFrom RepairWorkings rw";
        $Where = "\nWhere rw.DelDate is Null";
        $Order = "\nOrder by rw.WorkStart";

        $this->Query->setSelect($Select);
        $this->Query->setFrom($From);
        $this->Query->setWhere($Where);
        $this->Query->setOrder($Order);

        $this->KeyFiled = 'rw.RepairWorking_id';
        $this->PrimaryKey = 'RepairWorking_id';
    }
    
    public function attributeLabels(){
        return array(
            'RepairWorking_id' => '',
            'Repr_id' => '',
            'Empl_id' => '',
            'WorkStart' => '',
            'WorkEnd' => '',
            'DateCreate' => '',
            'EmplCreate' => '',
            'DateChange' => '',
            'EmplChange' => '',
            'DelDate' => '',
        );
    }

}




