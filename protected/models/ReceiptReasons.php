<?php


class ReceiptReasons extends MainFormModel
{
    public $rcrs_id;
    public $name;

    public function rules()
    {
        return array(
            array('rcrs_id, name', 'safe'),
        );
    }
    
    function __construct($scenario = '') {
        parent::__construct($scenario);

        $this->SP_INSERT_NAME = 'INSERT_ReceiptReasons';
        $this->SP_UPDATE_NAME = 'UPDATE_ReceiptReasons';
        $this->SP_DELETE_NAME = 'DELETE_ReceiptReasons';

        $Select = "\nSelect
                        rc.rcrs_id,
                        rc.name";
        $From = "\nFrom ReceiptReasons rc";
        $Order = "\nOrder by rc.name";

        $this->Query->setSelect($Select);
        $this->Query->setFrom($From);
        $this->Query->setOrder($Order);
        
        $this->KeyFiled = 'rc.rcrs_id';
        $this->PrimaryKey = 'rcrs_id';
    }
                
    public function attributeLabels()
    {
            return array(
                    'rcrs_id' => 'Rcrs',
                    'name' => 'Name'
            );
    }
}
