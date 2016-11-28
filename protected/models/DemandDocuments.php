<?php


class DemandDocuments extends MainFormModel
{
    public $KeyField;
    public $Docid;
    public $DocType_id;
    public $DocType;
    public $Number;
    public $DateReg;
    public $DateExec;
    public $Note;
    public $Procpay;
                
    public function rules()
    {
        return array(
            array('KeyField,
                    Docid,
                    DocType_id,
                    DocType,
                    Number,
                    DateReg,
                    DateExec,
                    Note,
                    Procpay', 'safe'),
        );
            
    }
	
    function __construct($scenario = '') {

        parent::__construct($scenario);

        $this->SP_INSERT_NAME = '';
        $this->SP_UPDATE_NAME = '';
        $this->SP_DELETE_NAME = '';

        $Select = "\nSelect
                        d.KeyField,
                        d.Docid,
                        d.DocType_id,
                        d.DocType,
                        d.Number,
                        d.DateReg,
                        d.DateExec,
                        d.Note,
                        d.Procpay";
        $From = "\nFrom dbo.get_documents_demand(:#Demand_id) d";
        
        $this->Query->setSelect($Select);
        $this->Query->setFrom($From);
        
        // Инициализация первичного ключа
        $this->KeyFiled = 'd.KeyField';
        $this->PrimaryKey = 'KeyField';
    }
    
    public function attributeLabels()
    {
            return array(
                    'KeyField' => '',
                    'Docid' => '',
                    'DocType_id' => '',
                    'DocType' => '',
                    'Number' => '',
                    'DateReg' => '',
                    'DateExec' => '',
                    'Note' => '',
                    'Procpay' => '',
            );
    }
    
}
