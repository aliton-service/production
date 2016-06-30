<?php


class Areas extends MainFormModel
{
    public $Area_id;
    public $AreaName;
    public $Lock;
    public $EmplLock;
    public $DateLock;
    public $EmplChange;
    public $DateChange;
    public $DelDate;
    public $EmplDel;
                
    public function rules()
    {
        return array(
            array('Area_id,'
                . ' AreaName,'
                . ' Lock,'
                . ' EmplLock,'
                . ' DateLock,'
                . ' EmplChange,'
                . ' DateChange,'
                . ' DelDate,'
                . ' EmplDel', 'safe'),
        );
            
    }
	
    function __construct($scenario = '') {

        parent::__construct($scenario);

        $this->SP_INSERT_NAME = 'INSERT_Areas';
        $this->SP_UPDATE_NAME = 'UPDATE_Areas';
        $this->SP_DELETE_NAME = 'DELETE_Areas';

        $Select = "Select
                        a.Area_id,
                        a.AreaName,
                        a.DateChange,
                        a.EmplChange,
                        a.DateCreate,
                        a.EmplCreate,
                        a.DateLock,
                        a.DelDate,
                        a.EmplDel,
                        a.EmplLock,
                        a.Lock";
        $From = "\nFrom Areas a";
        $Where = "\nWhere a.DelDate is null";
        $Order = "\nOrder by a.AreaName";
        
        $this->Query->setSelect($Select);
        $this->Query->setFrom($From);
        $this->Query->setWhere($Where);
        $this->Query->setOrder($Order);
        
        // Инициализация первичного ключа
        $this->KeyFiled = 'a.Area_id';
        $this->PrimaryKey = 'Area_id';
    }
    
    public function attributeLabels()
    {
            return array(
                    'Area_id' => 'Area',
                    'AreaName' => 'Area Name',
                    'Lock' => 'Lock',
                    'EmplLock' => 'Empl Lock',
                    'DateLock' => 'Date Lock',
                    'EmplChange' => 'Empl Change',
                    'DateChange' => 'Date Change',
                    'DelDate' => 'Del Date',
                    'EmplDel' => 'Empl Del',
            );
    }
	
     public function deleteCount($id, $empl_id) {

            $Command = Yii::app()->db->createCommand(''
            . "UPDATE Areas SET EmplDel = {$empl_id}, DelDate = '".date('m.d.y H:i:s')."' WHERE Area_id = {$id}
            ");
        
        return $Command->queryAll();
	}
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
        
        public function getData() {
            $q = new SQLQuery();
            $q->setSelect("Select Area_id, AreaName");
            $q->setFrom("\nFrom Areas");
            return $q->QueryAll();
        }
}
