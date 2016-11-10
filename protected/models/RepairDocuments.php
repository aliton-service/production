<?php

class RepairDocuments extends MainFormModel
{
    public $keyfield;
    public $docid;
    public $doctype_id;
    public $doctype;
    public $number;
    public $datereg;
    public $dateexec;
    public $note;
    public $status;

    function __construct() {
        parent::__construct();
        
        $Select = "\nSelect
                        d.keyfield,
                        d.docid,
                        d.doctype_id,
                        d.doctype,
                        d.number,
                        d.datereg,
                        d.dateexec,
                        d.note,
                        d.[status]";
        $From = "\nFrom get_documents_repair(:#Repr_id) d";
        
        $this->Query->setSelect($Select);
        $this->Query->setFrom($From);
    }

    public function rules()
    {
        return array(
                array('keyfield,
                        docid,
                        doctype_id,
                        doctype,
                        number,
                        datereg,
                        dateexec,
                        note,
                        status,', 'safe'),
        );
    }
    
    public function attributeLabels()
    {
        return array(
            'keyfield' => '',
            'docid' => '',
            'doctype_id' => '',
            'doctype' => '',
            'number' => '',
            'datereg' => '',
            'dateexec' => '',
            'note' => '',
            'status' => '',
        );
    }


}
