<?php

class AreaPrices extends MainFormModel
{
    public $AreaPrice_id;
    public $StartArea;
    public $EndArea;
    public $Price;	
    public $EmplCreate;
    public $DateCreate;
    public $EmplChange;
    public $DateChange;
    public $Lock;
    public $DateLock;
    public $EmplLock;
    public $DelDate;
    
    function __construct($scenario = '') {
        parent::__construct($scenario);

        $this->SP_INSERT_NAME = 'INSERT_AreaPrices';
        $this->SP_UPDATE_NAME = 'UPDATE_AreaPrices';
        $this->SP_DELETE_NAME = 'DELETE_AreaPrices';

        $Select = "\nSelect
                        ap.AreaPrice_id,
                        ap.StartArea,
                        ap.EndArea,
                        ap.Price,	
                        ap.EmplCreate,
                        ap.DateCreate,
                        ap.EmplChange,
                        ap.DateChange";
        $From = "\nFrom AreaPrices ap";
        $Where = "\nWhere ap.DelDate is null";
        $Order = "\nOrder by ap.StartArea";

        $this->Query->setSelect($Select);
        $this->Query->setFrom($From);
        $this->Query->setWhere($Where);
        $this->Query->setOrder($Order);
        
        $this->KeyFiled = 'ap.AreaPrice_id';
        $this->PrimaryKey = 'AreaPrice_id';
    }
    
    public function rules()
    {
        return array(
            array('StartArea, EndArea, Price', 'required'),
            array('AreaPrice_id,
                    StartArea,
                    EndArea,
                    Price,	
                    EmplCreate,
                    DateCreate,
                    EmplChange,
                    DateChange,
                    Lock,
                    DateLock,
                    EmplLock,
                    DelDate', 'safe'),
        );
    }
    
    public function attributeLabels()
    {
        return array(
            'AreaPrice_id' => '',
            'StartArea' => '',
            'EndArea' => '',
            'Price' => '',	
            'EmplCreate' => '',
            'DateCreate' => '',
            'EmplChange' => '',
            'DateChange' => '',
            'Lock' => '',
            'DateLock' => '',
            'EmplLock' => '',
            'DelDate' => '',
        );
    }
}




