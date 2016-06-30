<?php

class Territory extends MainFormModel
{
	public $Territ_Id;
	public $Territ_Name;
	public $Employee_Id;
	public $Note;
	public $Lock;
	public $EmplLock;
	public $DateLock;
	public $EmplCreate;
	public $DateCreate;
	public $EmplChange;
	public $DateChange;
	public $EmplDel;
	public $DelDate;
	public $have_so;
        
	public function rules()
	{
            return array(
                array('Territ_Id,'
                    . ' Territ_Name,'
                    . ' Employee_Id,'
                    . ' Note,'
                    . ' Lock,'
                    . ' EmplLock,'
                    . ' DateLock,'
                    . ' EmplCreate,'
                    . ' DateCreate,'
                    . ' EmplChange,'
                    . ' DateChange,'
                    . ' DelDate,'
                    . ' EmplDel', 'safe'),
            );
	}

        function __construct($scenario = '') {

            parent::__construct($scenario);

            $this->SP_INSERT_NAME = 'INSERT_Territory';
            $this->SP_UPDATE_NAME = 'UPDATE_Territory';
            $this->SP_DELETE_NAME = 'DELETE_Territory';

            $Select = "Select
                            t.Territ_Id,
                            t.Territ_Name,
                            t.Employee_Id,
                            t.Note,
                            t.Lock,
                            t.EmplLock,
                            t.DateLock,
                            t.EmplCreate,
                            t.DateCreate,
                            t.EmplChange,
                            t.DateChange,
                            t.EmplDel,
                            t.DelDate,
                            t.have_so";
            $From = "\nFrom Territory t";
            $Where = "\nWhere t.DelDate is null";
            $Order = "\nOrder by t.Territ_Name";

            $this->Query->setSelect($Select);
            $this->Query->setFrom($From);
            $this->Query->setWhere($Where);
            $this->Query->setOrder($Order);

            // Инициализация первичного ключа
            $this->KeyFiled = 't.Territ_Id';
            $this->PrimaryKey = 'Territ_Name';
        }
        
	public function attributeLabels()
	{
		return array(
			'Territ_Id' => 'Territ',
			'Territ_Name' => 'Territ Name',
			'Employee_Id' => 'Employee',
			'Note' => 'Note',
			'Lock' => 'Lock',
			'EmplLock' => 'Empl Lock',
			'DateLock' => 'Date Lock',
			'EmplCreate' => 'Empl Create',
			'DateCreate' => 'Date Create',
			'EmplChange' => 'Empl Change',
			'DateChange' => 'Date Change',
			'DelDate' => 'Del Date',
			'EmplDel' => 'Empl Del',
		);
	}

	public function deleteCount($id, $empl_id) {
	 
		$Command = Yii::app()->db->createCommand(''
                . "UPDATE Territory SET EmplDel = {$empl_id}, DelDate = '".date('m.d.y H:i:s')."' WHERE Territ_Id = {$id}
                ");
        
        return $Command->queryAll();
	}
	
        
        public function getData($filter=array()) {
            $q = new SQLQuery();
            $q->setSelect("Select Territ_Id, Territ_Name");
            $q->setFrom("\nFrom Territory");
            $q->setWhere("\nWhere DelDate is Null");
			$q->setFilter($filter);
            return $q->QueryAll();
        }
}
