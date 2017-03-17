<?php

class InspActRemarks extends MainFormModel
{
    public $Remark_id;
    public $Inspection_id;
    public $Remark;
    public $DateCreate;
    public $EmplCreate;
    public $ShortName;
    public $DateChange;
    public $EmplChange;
    
    function __construct($scenario = '') {
        parent::__construct($scenario);

        $this->SP_INSERT_NAME = 'INSERT_InspActRemarks';
        $this->SP_UPDATE_NAME = 'UPDATE_InspActRemarks';
        $this->SP_DELETE_NAME = 'DELETE_InspActRemarks';

        $Select = "\nSelect
                        r.Remark_id,
                        r.Inspection_id,
                        r.Remark,
                        r.DateCreate,
                        r.EmplCreate,
                        e.ShortName,
                        r.DateChange,
                        r.EmplChange";
        $From = "\nFrom InspActRemarks r left join Employees e on (r.EmplCreate = e.Employee_id)";
        $Where = "\nWhere r.DelDate is Null";
        
        $this->Query->setSelect($Select);
        $this->Query->setFrom($From);
        $this->Query->setWhere($Where);
        
        $this->KeyFiled = 'r.Remark_id';
        $this->PrimaryKey = 'Remark_id';
    }
    
    public function rules()
    {
        return array(
            array('Remark', 'required'),
            array('Remark_id,
                    Inspection_id,
                    Remark,
                    DateCreate,
                    EmplCreate,
                    ShortName,
                    DateChange,
                    EmplChange,', 'safe'),
        );
    }
    
    public function attributeLabels()
    {
        return array(
            'Remark_id' => '',
            'Inspection_id' => '',
            'Remark' => '',
            'DateCreate' => '',
            'EmplCreate' => '',
            'ShortName' => '',
            'DateChange' => '',
            'EmplChange' => '',
        );
    }
}




