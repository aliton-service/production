<?php

class RepairDocuments extends MainFormModel
{
    public $Repr_id;
    public $Docm_id;
    public $KeyField;
    public $DocType_id;
    public $DocType;
    public $Number;
    public $DateReg;
    public $Note;
    public $Status;

    function __construct() {
        parent::__construct();
        
        $Select = "\nSelect
                        d.Repr_id,
                        d.Docm_id,
                        d.KeyField,
                        d.DocType_id,
                        d.DocType,
                        d.Number,
                        d.DateReg,
                        d.Note,
                        d.Status";
        $From = "\nFrom dbo.GET_RepairDocuments(#Repr_id) d";
        $Order = "\nOrder by d.DateReg";

        $this->Query->setSelect($Select);
        $this->Query->setFrom($From);
        $this->Query->setOrder($Order);
    }

    public function rules()
    {
        return array(
                array('Repr_id,
                    Docm_id,
                    KeyField,
                    DocType_id,
                    DocType,
                    Number,
                    DateReg,
                    Note,
                    Status', 'safe'),
        );
    }
    
    public function attributeLabels()
    {
        return array(
            'Repr_id' => '',
            'Docm_id' => '',
            'KeyField' => '',
            'DocType_id' => '',
            'DocType' => '',
            'Number' => '',
            'DateReg' => '',
            'Note' => '',
            'Status' => '',
        );
    }


}
