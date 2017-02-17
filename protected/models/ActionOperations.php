<?php

class ActionOperations extends MainFormModel
{
    public $Operation_id;
    public $ActionOperationName;
    
    function __construct($scenario = '') {
        parent::__construct($scenario);

        $this->SP_INSERT_NAME = 'INSERT_ActionOperations';
        $this->SP_UPDATE_NAME = 'UPDATE_ActionOperations';
        $this->SP_DELETE_NAME = 'DELETE_ActionOperations';

        $Select = "\nSelect
                        s.Operation_id,
                        s.ActionOperationName";
        $From = "\nFrom ActionOperations s";
        $Order = "\nOrder by s.ActionOperationName";

        $this->Query->setSelect($Select);
        $this->Query->setFrom($From);
        $this->Query->setOrder($Order);
        
        $this->KeyFiled = 's.Operation_id';
        $this->PrimaryKey = 'Operation_id';
    }
    
    public function rules()
    {
        return array(
            array('ActionOperationName', 'required'),
            array('Operation_id,
                    ActionOperationName', 'safe'),
        );
    }
    
    public function attributeLabels()
    {
        return array(
            'Operation_id' => 'Operation_id',
            'ActionOperationName' => 'Подразделения',
        );
    }
}




