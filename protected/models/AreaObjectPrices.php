<?php

class AreaObjectPrices extends MainFormModel
{
    public $AreaObjectPrice_id;
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

        $this->SP_INSERT_NAME = 'INSERT_AreaObjectPrices';
        $this->SP_UPDATE_NAME = 'UPDATE_AreaObjectPrices';
        $this->SP_DELETE_NAME = 'DELETE_AreaObjectPrices';

        $Select = "\nSelect
                        ap.AreaObjectPrice_id,
                        ap.StartArea,
                        ap.EndArea,
                        ap.Price,	
                        ap.EmplCreate,
                        ap.DateCreate,
                        ap.EmplChange,
                        ap.DateChange";
        $From = "\nFrom AreaObjectPrices ap";
        $Where = "\nWhere ap.DelDate is null";
        $Order = "\nOrder by ap.StartArea";

        $this->Query->setSelect($Select);
        $this->Query->setFrom($From);
        $this->Query->setWhere($Where);
        $this->Query->setOrder($Order);
        
        $this->KeyFiled = 'ap.AreaObjectPrice_id';
        $this->PrimaryKey = 'AreaObjectPrice_id';
    }
    
    public function rules()
    {
        return array(
            array('StartArea, EndArea, Price', 'required'),
            array('AreaObjectPrice_id,
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
            'AreaObjectPrice_id' => '',
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




