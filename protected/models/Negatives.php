<?php


class Negatives extends MainFormModel
{
    public $Ngtv_id;
    public $NegativeName;
                
    public function rules()
    {
        return array(
            array('Ngtv_id,
                    NegativeName', 'safe'),
        );
            
    }
	
    function __construct($scenario = '') {

        parent::__construct($scenario);

        $this->SP_INSERT_NAME = '';
        $this->SP_UPDATE_NAME = '';
        $this->SP_DELETE_NAME = '';

        $Select = "\nSelect
                        n.Ngtv_id,
                        n.NegativeName";
        $From = "\nFrom Negatives n";
        $Order = "\nOrder by n.NegativeName";
        
        $this->Query->setSelect($Select);
        $this->Query->setFrom($From);
        $this->Query->setOrder($Order);
        
        // Инициализация первичного ключа
        $this->KeyFiled = 'n.Ngtv_id';
        $this->PrimaryKey = 'Ngtv_id';
    }
    
    public function attributeLabels()
    {
            return array(
                'Ngtv_id' => '',
                'NegativeName' => '',
            );
    }
     
}


