<?php

class Childrens extends MainFormModel
{
    public $Children_id;
    public $Employee_id;
    public $ChildrenName;
    public $BirthDay;
    public $DateCreate;
    public $EmplCreate;
    public $DateChange;
    public $EmplChange;
    public $Age;
    
    function __construct($scenario = '') {
        parent::__construct($scenario);

        $this->SP_INSERT_NAME = 'INSERT_Childrens';
        $this->SP_UPDATE_NAME = 'UPDATE_Childrens';
        $this->SP_DELETE_NAME = 'DELETE_childrens';

        $Select = "\nSelect
                       c.Children_id,
                       c.Employee_id,
                       c.ChildrenName,
                       c.BirthDay,
                       c.DateCreate,
                       c.EmplCreate,
                       c.DateChange,
                       c.EmplChange,
                       Year(GETDATE()) - Year(c.BirthDay) - (case when dbo.EncodeDate(Day(c.BirthDay), Month(c.BirthDay), Year(GETDATE())) < dbo.truncdate(GETDATE()) then 0 else 1 end) Age";
        $From = "\nFrom Childrens c";
        $Where = "\nWhere c.DelDate is Null";
        $Order = "\nOrder by c.BirthDay";

        $this->Query->setSelect($Select);
        $this->Query->setFrom($From);
        $this->Query->setWhere($Where);
        $this->Query->setOrder($Order);
        
        $this->KeyFiled = 'c.Children_id';
        $this->PrimaryKey = 'Children_id';
    }
    
    public function rules()
    {
        return array(
            array('ChildrenName, BirthDay, Employee_id', 'required'),
            array('Children_id,
                   Employee_id,
                   ChildrenName,
                   BirthDay,
                   DateCreate,
                   EmplCreate,
                   DateChange,
                   EmplChange,
                   Age', 'safe'),
        );
    }
    
    public function attributeLabels()
    {
        return array(
            'Children_id' => 'Children_id',
            'Employee_id' => 'Employee_id',
            'ChildrenName' => 'ФИО',
            'BirthDay' => 'Дата рождения',
            'DateCreate' => 'DateCreate',
            'EmplCreate' => 'EmplCreate',
            'DateChange' => 'DateChange',
            'EmplChange' => 'EmplChange',
            'Age' => 'Age',
        );
    }
}




