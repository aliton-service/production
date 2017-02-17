<?php

class ActionStages extends MainFormModel
{
    public $Stage_id;
    public $StageName;
    
    function __construct($scenario = '') {
        parent::__construct($scenario);

        $this->SP_INSERT_NAME = 'INSERT_ActionStages';
        $this->SP_UPDATE_NAME = 'UPDATE_ActionStages';
        $this->SP_DELETE_NAME = 'DELETE_ActionStages';

        $Select = "\nSelect
                        s.Stage_id,
                        s.StageName";
        $From = "\nFrom ActionStages s";
        $Order = "\nOrder by s.StageName";

        $this->Query->setSelect($Select);
        $this->Query->setFrom($From);
        $this->Query->setOrder($Order);
        
        $this->KeyFiled = 's.Stage_id';
        $this->PrimaryKey = 'Stage_id';
    }
    
    public function rules()
    {
        return array(
            array('StageName', 'required'),
            array('Stage_id, StageName', 'safe'),
        );
    }
    
    public function attributeLabels()
    {
        return array(
            'Stage_id' => 'Stage_id',
            'StageName' => 'Подразделения',
        );
    }
}




