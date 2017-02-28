<?php

class ActionResults extends MainFormModel
{
    public $Result_id;
    public $ActionResultName;
    
    function __construct($scenario = '') {
        parent::__construct($scenario);

        $this->SP_INSERT_NAME = 'INSERT_ActionResults';
        $this->SP_UPDATE_NAME = 'UPDATE_ActionResults';
        $this->SP_DELETE_NAME = 'DELETE_ActionResults';

        $Select = "\nSelect
                        s.Result_id,
                        s.ActionResultName";
        $From = "\nFrom ActionResults s";
        $Order = "\nOrder by s.ActionResultName";

        $this->Query->setSelect($Select);
        $this->Query->setFrom($From);
        $this->Query->setOrder($Order);
        
        $this->KeyFiled = 's.Result_id';
        $this->PrimaryKey = 'Result_id';
    }
    
    public function rules()
    {
        return array(
            array('ActionResultName', 'required'),
            array('Result_id,
                    ActionResultName', 'safe'),
        );
    }
    
    public function attributeLabels()
    {
        return array(
            'Result_id' => 'Result_id',
            'ActionResultName' => 'Подразделения',
        );
    }
}




