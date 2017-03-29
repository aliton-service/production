<?php

class ClientPotentials extends MainFormModel
{
    public $Potential_id;
    public $Form_id;
    public $Date1;
    public $Date2;
    public $Date3;
    public $Date4;
    public $Date5;
    public $Initiative_id;
    public $Service_id;
    public $Competitive_id;
    public $Negative_id;
    public $System1;
    public $System2;
    public $System3;
    public $System4;
    public $System5;
    public $Offer1;
    public $Offer2;
    public $Offer3;
    public $Offer4;
    public $Offer5;
    public $EmplChange;
    public $DateChange;
    
    function __construct($scenario = '') {
        parent::__construct($scenario);

        $this->SP_UPDATE_NAME = 'UPDATE_ClientPotentials';
        
        $Select = "\nSelect
                        cp.Potential_id,
                        cp.Form_id,
                        cp.Date1,
                        cp.Date2,
                        cp.Date3,
                        cp.Date4,
                        cp.Date5,
                        cp.Initiative_id,
                        cp.Service_id,
                        cp.Competitive_id,
                        cp.Negative_id,
                        cp.System1,
                        cp.System2,
                        cp.System3,
                        cp.System4,
                        cp.System5,
                        cp.Offer1,
                        cp.Offer2,
                        cp.Offer3,
                        cp.Offer4,
                        cp.Offer5,
                        cp.EmplChange,
                        cp.DateChange";
        $From = "\nFrom ClientPotentials cp";
        
        $this->Query->setSelect($Select);
        $this->Query->setFrom($From);
        
        $this->KeyFiled = 'cp.Potential_id';
        $this->PrimaryKey = 'Potential_id';
    }
    
    public function rules()
    {
        return array(
            array('Potential_id,
                    Form_id,
                    Date1,
                    Date2,
                    Date3,
                    Date4,
                    Date5,
                    Initiative_id,
                    Service_id,
                    Competitive_id,
                    Negative_id,
                    System1,
                    System2,
                    System3,
                    System4,
                    System5,
                    Offer1,
                    Offer2,
                    Offer3,
                    Offer4,
                    Offer5,
                    EmplChange,', 'safe'),
        );
    }
    
    public function attributeLabels()
    {
        return array(
            'Potential_id' => '',
            'Form_id' => '',
            'Date1' => '',
            'Date2' => '',
            'Date3' => '',
            'Date4' => '',
            'Date5' => '',
            'Initiative_id' => '',
            'Service_id' => '',
            'Competitive_id' => '',
            'Negative_id' => '',
            'System1' => '',
            'System2' => '',
            'System3' => '',
            'System4' => '',
            'System5' => '',
            'Offer1' => '',
            'Offer2' => '',
            'Offer3' => '',
            'Offer4' => '',
            'Offer5' => '',
            'EmplChange' => '',
            'DateChange' => '',
        );
    }
}




