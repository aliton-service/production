<?php

class MarketingSolutions extends MainFormModel
{
    public $Solution_id;
    public $Form_id;
    public $Action_id;
    public $Offer1Result_id;
    public $Offer1Date;
    public $Offer1Note;
    public $Offer2Result_id;
    public $Offer2Date;
    public $Offer2Note;
    public $Offer3Result_id;
    public $Offer3Date;
    public $Offer3Note;
    public $Offer4Result_id;
    public $Offer4Date;
    public $Offer4Note;
    public $Offer5Result_id;
    public $Offer5Date;
    public $Offer5Note;
    public $Offer6Result_id;
    public $Offer6Date;
    public $Offer6Note;
    public $Offer7Result_id;
    public $Offer7Date;
    public $Offer7Note;
    public $Offer8Result_id;
    public $Offer8Date;
    public $Offer8Note;
    public $Offer9Result_id;
    public $Offer9Date;
    public $Offer9Note;
    public $Economy;
    public $Quality;
    public $Private;
    public $Modernization;
    public $Beautification;
    
    function __construct($scenario = '') {
        parent::__construct($scenario);

        $this->SP_INSERT_NAME = '';
        $this->SP_UPDATE_NAME = 'UPDATE_MarketingSolutions';
        $this->SP_DELETE_NAME = '';

        $Select = "\nSelect
                        ms.Solution_id,
                        ms.Form_id,
                        ms.Action_id,
                        ms.Offer1Result_id,
                        ms.Offer1Date,
                        ms.Offer1Note,
                        ms.Offer2Result_id,
                        ms.Offer2Date,
                        ms.Offer2Note,
                        ms.Offer3Result_id,
                        ms.Offer3Date,
                        ms.Offer3Note,
                        ms.Offer4Result_id,
                        ms.Offer4Date,
                        ms.Offer4Note,
                        ms.Offer5Result_id,
                        ms.Offer5Date,
                        ms.Offer5Note,
                        ms.Offer6Result_id,
                        ms.Offer6Date,
                        ms.Offer6Note,
                        ms.Offer7Result_id,
                        ms.Offer7Date,
                        ms.Offer7Note,
                        ms.Offer8Result_id,
                        ms.Offer8Date,
                        ms.Offer8Note,
                        ms.Offer9Result_id,
                        ms.Offer9Date,
                        ms.Offer9Note,
                        ms.Economy,
                        ms.Quality,
                        ms.Private,
                        ms.Modernization,
                        ms.Beautification";
        $From = "\nFrom MarketingSolutions ms";
        
        $this->Query->setSelect($Select);
        $this->Query->setFrom($From);
        
        $this->KeyFiled = 'ms.Solution_id';
        $this->PrimaryKey = 'Solution_id';
    }
    
    public function rules()
    {
        return array(
            array('Solution_id,
                    Form_id,
                    Action_id,
                    Offer1Result_id,
                    Offer1Date,
                    Offer1Note,
                    Offer2Result_id,
                    Offer2Date,
                    Offer2Note,
                    Offer3Result_id,
                    Offer3Date,
                    Offer3Note,
                    Offer4Result_id,
                    Offer4Date,
                    Offer4Note,
                    Offer5Result_id,
                    Offer5Date,
                    Offer5Note,
                    Offer6Result_id,
                    Offer6Date,
                    Offer6Note,
                    Offer7Result_id,
                    Offer7Date,
                    Offer7Note,
                    Offer8Result_id,
                    Offer8Date,
                    Offer8Note,
                    Offer9Result_id,
                    Offer9Date,
                    Offer9Note,
                    Economy,
                    Quality,
                    Private,
                    Modernization,
                    Beautification', 'safe'),
        );
    }
    
    public function attributeLabels()
    {
        return array(
            'Solution_id' => '',
            'Form_id' => '',
            'Action_id' => '',
            'Offer1Result_id' => '',
            'Offer1Date' => '',
            'Offer1Note' => '',
            'Offer2Result_id' => '',
            'Offer2Date' => '',
            'Offer2Note' => '',
            'Offer3Result_id' => '',
            'Offer3Date' => '',
            'Offer3Note' => '',
            'Offer4Result_id' => '',
            'Offer4Date' => '',
            'Offer4Note' => '',
            'Offer5Result_id' => '',
            'Offer5Date' => '',
            'Offer5Note' => '',
            'Offer6Result_id' => '',
            'Offer6Date' => '',
            'Offer6Note' => '',
            'Offer7Result_id' => '',
            'Offer7Date' => '',
            'Offer7Note' => '',
            'Offer8Result_id' => '',
            'Offer8Date' => '',
            'Offer8Note' => '',
            'Offer9Result_id' => '',
            'Offer9Date' => '',
            'Offer9Note' => '',
            'Economy' => '',
            'Quality' => '',
            'Private' => '',
            'Modernization' => '',
            'Beautification' => '',
        );
    }
}




