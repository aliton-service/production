<?php


class EventsClients extends MainFormModel
{
	public $form_id = null;
	public $fullname = null;
	public $objectgr_id = null;
	public $addr = null;
	public $isVisible = null;
	public $event_count = null;
	public $no_exec_event_count = null;

	public $SP_INSERT_NAME = '';
	public $SP_UPDATE_NAME = '';
	public $SP_DELETE_NAME = '';


	public function __construct($scenario = '') {
            parent::__construct($scenario);
            $select = "\nSelect
                            sc.form_id,
                            sc.fullname,
                            sc.objectgr_id,
                            sc.addr,
                            sc.isVisible,
                            sc.event_count,
                            sc.no_exec_event_count
            ";
            $from = "\nFrom EventsClients_v sc";
            
//            $where = "";
            
            $order = "\nOrder by sc.fullname, sc.addr";
            
//            $groupby = "";

            $this->Query->setSelect($select);
            $this->Query->setFrom($from);
            $this->Query->setOrder($order);
//            $this->Query->setWhere($where);
//            $this->Query->setGroupBy($groupby);
            
            $this->KeyFiled = 'sc.form_id';
            $this->PrimaryKey = 'form_id';
	}

	public function rules()
	{
            return array(
                //array('evtp_id, objectgr_id, date, empl_id', 'required'),
                array('', 'numerical', 'integerOnly'=>true),
                array('', 'length', 'max'=>20),
                array('', 'length', 'max'=>150),
                array('', 'safe'),
            );
	}


	public function attributeLabels()
	{
            return array(
                'evnt_id' => 'Evnt',
            );
	}


}
