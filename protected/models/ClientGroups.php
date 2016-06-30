<?php

/**
 * This is the model class for table "ClientGroups".
 *
 * The followings are the available columns in table 'ClientGroups':
 * @property integer $clgr_id
 * @property string $ClientGroup
 * @property integer $Segment
 */
class ClientGroups extends MainFormModel
{
	public $clgr_id;
        public $ClientGroup;
        public $Segment;
        public $Lock;
        public $EmplLock;
        public $DateLock;
        public $EmplCreate;
        public $DateCreate;
        public $EmplChange;
        public $DateChange;
        public $DelDate;
        public $EmplDel;

	public function rules()
	{
            return array(
                    array('clgr_id,'
                        . ' ClientGroup,'
                        . ' Lock,'
                        . ' EmplLock,'
                        . ' DateLock,'
                        . ' EmplCreate,'
                        . ' DateCreate,'
                        . ' EmplChange,'
                        . ' DateChange,'
                        . ' DelDate,'
                        . ' EmplDel,'
                        . ' Segment', 'safe', 'on'=>'search'),
            );
	}
        
        function __construct($scenario = '') {

            parent::__construct($scenario);

            $this->SP_INSERT_NAME = 'INSERT_ClientGroups';
            $this->SP_UPDATE_NAME = 'UPDATE_ClientGroups';
            $this->SP_DELETE_NAME = 'DELETE_ClientGroups';

            $Select = "Select
                        cg.clgr_id,
                        cg.ClientGroup,
                        cg.Segment,
                        cg.Lock,
                        cg.EmplLock,
                        cg.DateLock,
                        cg.EmplCreate,
                        cg.DateCreate,
                        cg.EmplChange,
                        cg.DateChange,
                        cg.DelDate,
                        cg.EmplDel";
            $From = "\nFrom ClientGroups cg";
            $Where = "\nWhere cg.DelDate is null";
            $Order = "\nOrder by cg.ClientGroup";

            $this->Query->setSelect($Select);
            $this->Query->setFrom($From);
            $this->Query->setWhere($Where);
            $this->Query->setOrder($Order);

            // Инициализация первичного ключа
            $this->KeyFiled = 'cg.clgr_id';
            $this->PrimaryKey = 'clgr_id';
        }

	public function attributeLabels()
	{
            return array(
                    'clgr_id' => 'Сегмент',
                    'ClientGroup' => 'Client Group',
                    'Segment' => 'Segment',
            );
	}

        
        public function getData() {
            $q = new SQLQuery();
            $q->setSelect("Select clgr_id, ClientGroup");
            $q->setFrom("\nFrom ClientGroups");
            return $q->QueryAll();
        }
}
