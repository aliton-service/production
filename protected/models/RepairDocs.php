<?php


class RepairDocs extends MainFormModel
{
    public $rpdoc_id;
    public $repr_id;
    public $dctp_id;
    public $number;
    public $date;
    public $empl_id;
    public $splr_id;
    public $diagnostics;
    public $diagnostics_sum;
    public $sum;
    public $defect;
    public $result;
    public $contact_person;
    public $note;
    
    public function rules() {
        return array(
                array('rpdoc_id,
                        repr_id,
                        dctp_id,
                        number,
                        date,
                        empl_id,
                        splr_id,
                        diagnostics,
                        diagnostics_sum,
                        sum,
                        defect,
                        result,
                        contact_person,
                        note,', 'safe'),
        );
    }
    
    function __construct($scenario='') {
        parent::__construct($scenario);

        $this->SP_INSERT_NAME = 'INSERT_RepairDocuments';
        $this->SP_UPDATE_NAME = 'UPDATE_RepairDocuments';
        $this->SP_DELETE_NAME = 'DELETE_RepairDocuments';

        $Select = "\nSelect
                        d.rpdoc_id,
                        d.repr_id,
                        d.dctp_id,
                        d.number,
                        d.date,
                        d.empl_id,
                        d.splr_id,
                        d.diagnostics,
                        d.diagnostics_sum,
                        d.[sum],
                        d.defect,
                        d.result,
                        d.contact_person,
                        d.note";
        $From = "\nFrom RepairDocuments d";
        
        $this->Query->setSelect($Select);
        $this->Query->setFrom($From);
        
        $this->KeyFiled = 'd.rpdoc_id';
        $this->PrimaryKey = 'rpdoc_id';
    }
    
    public function attributeLabels(){
        return array(
            'rpdoc_id' => '',
            'repr_id' => '',
            'dctp_id' => '',
            'number' => '',
            'date' => '',
            'empl_id' => '',
            'splr_id' => '',
            'diagnostics' => '',
            'diagnostics_sum' => '',
            'sum' => '',
            'defect' => '',
            'result' => '',
            'contact_person' => '',
            'note' => '',
        );
    }

}


