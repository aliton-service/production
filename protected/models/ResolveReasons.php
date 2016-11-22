<?php


class ResolveReasons extends MainFormModel
{
    public $Rvrs_id;
    public $ResolveReason;
                
    public function rules()
    {
        return array(
            array('Rvrs_id,
                    ResolveReason', 'safe'),
        );
            
    }
	
    function __construct($scenario = '') {

        parent::__construct($scenario);

        $this->SP_INSERT_NAME = '';
        $this->SP_UPDATE_NAME = '';
        $this->SP_DELETE_NAME = '';

        $Select = "\nSelect
                      r.Rvrs_id,
                      r.ResolveReason";
        $From = "\nFrom ResolveReasons r";
        $Order = "\nOrder by ResolveReason";
        
        $this->Query->setSelect($Select);
        $this->Query->setFrom($From);
        $this->Query->setOrder($Order);
        
        // Инициализация первичного ключа
        $this->KeyFiled = 'r.Rvrs_id';
        $this->PrimaryKey = 'Rvrs_id';
    }
    
    public function attributeLabels()
    {
            return array(
                'Rvrs_id' => '',
                'ResolveReason' => '',
            );
    }
     
}


