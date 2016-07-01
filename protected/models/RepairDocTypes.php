<?php


class RepairDocTypes extends MainFormModel
{
    public $ID;
    public $DocName;
    
    
    public function rules() {
        return array(
                array('ID,
                        DocName', 'safe'),
        );
    }
    
    function __construct($scenario='') {
        parent::__construct($scenario);

        $this->SP_INSERT_NAME = '';
        $this->SP_UPDATE_NAME = '';
        $this->SP_DELETE_NAME = '';

        $Select = "\nSelect dt.ID, dt.DocName";
        $From = "\nFrom RepairDocTypes_v dt";
        $Order = "\nOrder by dt.DocName";

        $this->Query->setSelect($Select);
        $this->Query->setFrom($From);
        $this->Query->setOrder($Order);

        $this->KeyFiled = 'dt.ID';
        $this->PrimaryKey = 'dt.ID';
    }
    
    public function attributeLabels(){
        return array(
            'ID' => 'ID',
            'DocName' => 'DocName',
        );
    }

}




