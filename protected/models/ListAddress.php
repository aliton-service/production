<?php

class ListAddress extends MainFormModel
{
    public $Form_id;
    public $Fullname;
    
    public function rules() {
        return array(
            array(
                'Form_id',
                'FullName', 'safe'),
        );
    }
    
    public function __construct($scenario = '') {
        
        parent::__construct($scenario);
        
        $this->SP_INSERT_NAME = 'INSERT_PropForms';
        $this->SP_UPDATE_NAME = 'UPDATE_PropForms';
        $this->SP_DELETE_NAME = 'DELETE_PropForms';
        
        $Select  =  "\nSelect" .
                    "   o.Form_id," .
                    "   o.FullName";
        $From =     "\nFrom Organizations_v o";
        $Order =    "\nOrder by o.FullName";
        $this->Query->setSelect($Select);
        $this->Query->setFrom($From);
        $this->Query->setOrder($Order);
        $this->KeyFiled = 'o.Form_id';
        $this->PrimaryKey = 'Form_id';
    }
    
    public function attributeLabels()
    {
        return array(
                'Form_id' => 'Идентификатор',
                'FullName' => 'Организация',
            );
    }
    
    

}

