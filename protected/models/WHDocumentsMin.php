<?php

class WHDocumentsMin extends MainFormModel
{
    public $docm_id;
    public $number;
    public $date;
    public $doc;
    
    function __construct($scenario = '') {
        parent::__construct($scenario);

        $this->SP_INSERT_NAME = '';
        $this->SP_UPDATE_NAME = '';
        $this->SP_DELETE_NAME = '';

        $Select = "\nSelect
                        d.docm_id,
                        d.number,
                        d.date,
                        d.number + ' от ' + convert(nvarchar(50), d.date, 104) as doc";
        $From = "\nFrom WHDocuments_v d";
        $Where = "\nWhere d.achs_id is not null";
        $Order = "\nOrder by d.number, d.date";

        $this->Query->setSelect($Select);
        $this->Query->setFrom($From);
        $this->Query->setWhere($Where);
        $this->Query->setOrder($Order);
        
        $this->KeyFiled = 'd.docm_id';
        $this->PrimaryKey = 'docm_id';
    }
    
    public function rules()
    {
        return array(
            
        );
    }
    
    public function attributeLabels()
    {
        return array(
            
        );
    }
}






