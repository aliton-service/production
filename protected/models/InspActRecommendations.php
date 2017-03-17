<?php

class InspActRecommendations extends MainFormModel
{
    public $Recommendation_id;
    public $Inspection_id;
    public $Recommendation;
    public $DateCreate;
    public $EmplCreate;
    public $ShortName;
    public $DateChange;
    public $EmplChange;
    
    function __construct($scenario = '') {
        parent::__construct($scenario);

        $this->SP_INSERT_NAME = 'INSERT_InspActRecommendations';
        $this->SP_UPDATE_NAME = 'UPDATE_InspActRecommendations';
        $this->SP_DELETE_NAME = 'DELETE_InspActRecommendations';

        $Select = "\nSelect
                        r.Recommendation_id,
                        r.Inspection_id,
                        r.Recommendation,
                        r.DateCreate,
                        r.EmplCreate,
                        e.ShortName,
                        r.DateChange,
                        r.EmplChange";
        $From = "\nFrom InspActRecommendations r left join Employees e on (r.EmplCreate = e.Employee_id)";
        $Where = "\nWhere r.DelDate is Null";
        
        $this->Query->setSelect($Select);
        $this->Query->setFrom($From);
        $this->Query->setWhere($Where);
        
        $this->KeyFiled = 'r.Recommendation_id';
        $this->PrimaryKey = 'Recommendation_id';
    }
    
    public function rules()
    {
        return array(
            array('Recommendation', 'required'),
            array('Recommendation_id,
                    Inspection_id,
                    Recommendation,
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
            'Recommendation_id' => '',
            'Inspection_id' => '',
            'Recommendation' => '',
            'DateCreate' => '',
            'EmplCreate' => '',
            'ShortName' => '',
            'DateChange' => '',
            'EmplChange' => '',
        );
    }
}




