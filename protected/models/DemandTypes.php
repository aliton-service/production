<?php

class DemandTypes extends MainFormModel
{
	public $DemandType_id;
	public $DemandType;
	public $Visible;
	public $Sort;
	public $dd;
	public $id;
	public $d;
	public $Lock;
	public $EmplLock;
	public $DateLock;
	public $EmplCreate;
	public $DateCreate;
	public $EmplChange;
	public $DateChange;
	public $EmplDel;
	public $DelDate;

	function __construct($scenario = '') {

        parent::__construct($scenario);

            $this->SP_INSERT_NAME = 'INSERT_DemandTypes';
            $this->SP_UPDATE_NAME = 'UPDATE_DemandTypes';
            $this->SP_DELETE_NAME = 'DELETE_DemandTypes';

            $Select = "Select
                            dt.DemandType_id,
                            dt.DemandType,
                            dt.Visible,
                            dt.Sort,
                            dt.dd,
                            dt.id,
                            dt.d,
                            dt.Lock,
                            dt.EmplLock,
                            dt.DateLock,
                            dt.EmplCreate,
                            dt.DateCreate,
                            dt.EmplChange,
                            dt.DateChange,
                            dt.EmplDel,
                            dt.DelDate";
            $From = "\nFrom DemandTypes dt";
            $Where = "\nWhere dt.DelDate is null";
            $Order = "\nOrder by dt.Sort, dt.DemandType";

            $this->Query->setSelect($Select);
            $this->Query->setFrom($From);
            $this->Query->setWhere($Where);
            $this->Query->setOrder($Order);

            // Инициализация первичного ключа
            $this->KeyFiled = 'dt.DemandType_id';
            $this->PrimaryKey = 'DemandType';
        }
        
	public function rules()
	{
            return array(
                array('DemandType_id,'
                    . ' DemandType,'
                    . ' Visible,'
                    . ' Sort,'
                    . ' dd,'
                    . ' id,'
                    . ' d,'
                    . ' Lock,'
                    . ' EmplLock,'
                    . ' DateLock,'
                    . ' EmplChange,'
                    . ' DateChange,'
                    . ' EmplDel,'
                    . ' DelDate', 'safe'),
            );
	}

	public function attributeLabels()
	{
		return array(
			'DemandType_id' => 'Demand Type',
			'DemandType' => 'Demand Type',
			'Visible' => 'Visible',
			'Sort' => 'Sort',
			'dd' => 'Dd',
			'id' => 'ID',
			'd' => 'D',
			'Lock' => 'Lock',
			'EmplLock' => 'Empl Lock',
			'DateLock' => 'Date Lock',
			'EmplChange' => 'Empl Change',
			'DateChange' => 'Date Change',
			'EmplDel' => 'Empl Del',
			'DelDate' => 'Del Date',
		);
	}

	 public function deleteCount($id, $empl_id) {
	 
            $Command = Yii::app()->db->createCommand(''
            . "UPDATE DemandTypes SET EmplDel = {$empl_id}, DelDate = '".date('m.d.y H:i:s')."' WHERE DemandType_id = {$id}
            ");
        
            return $Command->queryAll();
	}
	
        
        public function getData() {
            $q = new SQLQuery();
            $q->setSelect("Select DemandType_id, DemandType");
            $q->setFrom("\nFrom DemandTypes");
            $q->setWhere("\nWhere DelDate is Null and D = 1");
            $q->setOrder("\nOrder by Sort, DemandType");
            return $q->QueryAll();
        }
        
}
