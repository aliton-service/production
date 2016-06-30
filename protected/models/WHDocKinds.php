<?php


class WHDocKinds extends MainFormModel
{
    public $dckn_id;
    public $name;
    public $EmplCreate;
    public $DateCreate;
    public $EmplChange;
    public $DateChange;
    public $DelDate;
    
    public function rules()
    {
        return array(
            array('dckn_id,'
                . ' name,'
                . ' DateCreate,'
                . ' EmplCreate,'
                . ' EmplChange,'
                . ' DateChange,'
                . ' DelDaate', 'safe', 'on'=>'search'),
        );
    }
    
    public function __construct($scenario = '') {
	parent::__construct($scenario);

	$this->SP_INSERT_NAME = '';
        $this->SP_UPDATE_NAME = '';
        $this->SP_DELETE_NAME = '';

        $Select = "Select 
                        k.dckn_id,
                        k.name,
                        k.DateCreate,
                        k.EmplCreate,
                        k.DateChange,
                        k.EmplChange,
                        k.DelDate
                  ";
        $From = "From WHDocKinds k";
        $Order = "Order by k.name";

        $this->Query->setSelect($Select);
        $this->Query->setFrom($From);
        $this->Query->setOrder($Order);
        
        // Инициализация первичного ключа
        $this->KeyFiled = 'k.dckn_id';
        $this->PrimaryKey = 'dckn_id';
    }
    	
    public function attributeLabels()
    {
        return array(
            'dckn_id' => 'Dckn',
            'name' => 'Name',
            'DateCreate' => 'DateCreate',
            'EmplCreate' => 'EmplCreate',
            'DateChange' => 'DateChange',
            'EmplChange' => 'EmplChange',
        );
    }
}
