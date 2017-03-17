<?php

class InspActOptions extends MainFormModel
{
    public $Option_id;
    public $Inspection_id;
    public $Option;
    public $DateCreate;
    public $EmplCreate;
    public $ShortName;
    public $DateChange;
    public $EmplChange;
    
    function __construct($scenario = '') {
        parent::__construct($scenario);

        $this->SP_INSERT_NAME = 'INSERT_InspActOptions';
        $this->SP_UPDATE_NAME = 'UPDATE_InspActOptions';
        $this->SP_DELETE_NAME = 'DELETE_InspActOptions';

        $Select = "\nSelect
                        r.Option_id,
                        r.Inspection_id,
                        r.[Option],
                        r.DateCreate,
                        r.EmplCreate,
                        e.ShortName,
                        r.DateChange,
                        r.EmplChange";
        $From = "\nFrom InspActOptions r left join Employees e on (r.EmplCreate = e.Employee_id)";
        $Where = "\nWhere r.DelDate is Null";
        
        $this->Query->setSelect($Select);
        $this->Query->setFrom($From);
        $this->Query->setWhere($Where);
        
        $this->KeyFiled = 'r.Option_id';
        $this->PrimaryKey = 'Option_id';
    }
    
    public function rules()
    {
        return array(
            array('Option', 'required'),
            array('Option_id,
                    Inspection_id,
                    Option,
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
            'Option_id' => '',
            'Inspection_id' => '',
            'Option' => '',
            'DateCreate' => '',
            'EmplCreate' => '',
            'ShortName' => '',
            'DateChange' => '',
            'EmplChange' => '',
        );
    }
}




