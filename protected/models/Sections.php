<?php

class Sections extends MainFormModel
{
    public $Section_id;
    public $SectionName;
    public $DateCreate;
    public $EmplCreate;
    public $DateChange;
    public $EmplChange;
    public $DelDate;
    
    function __construct($scenario = '') {
        parent::__construct($scenario);

        $this->SP_INSERT_NAME = 'INSERT_Sections';
        $this->SP_UPDATE_NAME = 'UPDATE_Sections';
        $this->SP_DELETE_NAME = 'DELETE_Sections';

        $Select = "\nSelect
                        s.Section_id,
                        s.SectionName,
                        s.DateCreate,
                        s.EmplCreate,
                        s.DateChange,
                        s.EmplChange,
                        s.DelDate";
        $From = "\nFrom Sections s";
        $Where = "\nWhere s.DelDate is null";
        $Order = "\nOrder by s.SectionName";

        $this->Query->setSelect($Select);
        $this->Query->setFrom($From);
        $this->Query->setWhere($Where);
        $this->Query->setOrder($Order);
        
        $this->KeyFiled = 's.Section_id';
        $this->PrimaryKey = 'Section_id';
    }
    
    public function rules()
    {
        return array(
            array('SectionName', 'required'),
            array('Section_id,
                    SectionName,
                    DateCreate,
                    EmplCreate,
                    DateChange,
                    EmplChange,
                    DelDate', 'safe'),
        );
    }
    
    public function attributeLabels()
    {
        return array(
            'Section_id' => 'Section_id',
            'SectionName' => 'Подразделения',
            'DateCreate' => 'DateCreate',
            'EmplCreate' => 'EmplCreate',
            'DateChange' => 'DateChange',
            'EmplChange' => 'EmplChange',
            'DelDate' => 'DelDate',
        );
    }
}




