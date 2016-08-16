<?php


class DelayReasonsLogistik extends MainFormModel
{
    public $dlrs_id;
    public $name;
    
                
    public function rules()
    {
        return array(
            array('dlrs_id,'
                . ' name', 'safe'),
        );
            
    }
	
    function __construct($scenario = '') {

        parent::__construct($scenario);

        $this->SP_INSERT_NAME = '';
        $this->SP_UPDATE_NAME = '';
        $this->SP_DELETE_NAME = '';
        $Select = "Select
                        drl.dlrs_id,
                        drl.name";
        $From = "\nFrom DelayReasonsLogistik drl";
        $Order = "\nOrder by drl.name";
        
        $this->Query->setSelect($Select);
        $this->Query->setFrom($From);
        $this->Query->setOrder($Order);
        
        // Инициализация первичного ключа
        $this->KeyFiled = 'drl.dlrs_id';
        $this->PrimaryKey = 'dlrs_id';
    }
    
    public function attributeLabels()
    {
            return array(
                    'dlrs_id' => 'dlrs_id',
                    'name' => 'Name',
            );
    }
}

