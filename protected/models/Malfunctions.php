<?php

class Malfunctions extends MainFormModel
{
    public $Malfunction_id;
    public $Malfunction;
    public $DateCreate;
    public $EmplCreate;
    public $DateChange;
    public $EmplChange;
    public $DelDate;
    
    function __construct($scenario = '') {
        parent::__construct($scenario);

        $this->SP_INSERT_NAME = 'INSERT_Malfunctions';
        $this->SP_UPDATE_NAME = 'UPDATE_Malfunctions';
        $this->SP_DELETE_NAME = 'DELETE_Malfunctions';

        $Select = "\nSelect
                        m.Malfunction_id,
                        m.Malfunction,
                        m.DateCreate,
                        m.EmplCreate,
                        m.DateChange,
                        m.EmplChange,
                        m.DelDate";
        $From = "\nFrom Malfunctions m";
        $Where = "\nWhere m.DelDate is null";
        $Order = "\nOrder by m.Malfunction";

        $this->Query->setSelect($Select);
        $this->Query->setFrom($From);
        $this->Query->setWhere($Where);
        $this->Query->setOrder($Order);
        
        $this->KeyFiled = 'm.Malfunction_id';
        $this->PrimaryKey = 'Malfunction_id';
    }
    
    public function rules()
    {
        return array(
            array('Malfunction', 'required'),
            array('Malfunction_id,
                    Malfunction,
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
            'Malfunction_id' => 'Malfunction_id',
            'Malfunction' => 'Неисправность',
            'DateCreate' => 'DateCreate',
            'EmplCreate' => 'EmplCreate',
            'DateChange' => 'DateChange',
            'EmplChange' => 'EmplChange',
            'DelDate' => 'DelDate',
        );
    }
}




