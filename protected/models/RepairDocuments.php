<?php

class RepairDocuments extends MainFormModel
{
//	public $rpdoc_id = null;
//	public $repr_id = null;
//	public $dctp_id = null;
//	public $number = null;
//	public $date = null;
//	public $empl_id = null;
//	public $splr_id = null;
//	public $diagnostics = null;
//	public $diagnostics_sum = null;
//	public $sum = null;
//	public $defect = null;
//	public $result = null;
//	public $contact_person = null;
//	public $note = null;
//	public $deldate = null;
//	public $Lock = null;
//	public $EmplLock = null;
//	public $DateLock = null;
//	public $EmplCreate = null;
//	public $DateCreate = null;
//	public $EmplChange = null;
//	public $DateChange = null;
//	public $EmplDel = null;

	public $keyfield = null;
	public $docid = null;
	public $doctype_id = null;
	public $doctype = null;
	public $number = null;
	public $datereg = null;
	public $dateexec = null;
	public $note = null;
	public $status = null;

	public $KeyFiled = 'd.keyfield';
//	public $PrimaryKey = 'keyfield';

	public $SP_INSERT_NAME = '';
	public $SP_UPDATE_NAME = '';
	public $SP_DELETE_NAME = '';


	function __construct() {
		parent::__construct();
		$select = "select
					d.keyfield,
					d.docid,
					d.doctype_id,
					d.doctype,
					d.number,
					d.datereg,
					d.dateexec,
					d.note,
					d.status
					";
		$repr_id = (int)$_POST['params']['repr_id'];
		$from = " from get_documents_repair($repr_id) d ";
		$where = "";
		$order = "";

		$this->Query->setSelect($select);
		$this->Query->setFrom($from);
		$this->Query->setOrder($order);
		$this->Query->setWhere($where);
	}


	public function rules()
	{
		return array(
			array('repr_id, dctp_id, number, date', 'required'),
			array('repr_id, dctp_id, empl_id, splr_id, EmplLock, EmplCreate, EmplChange, EmplDel', 'numerical', 'integerOnly'=>true),
			array('diagnostics_sum, sum', 'numerical'),
			array('number', 'length', 'max'=>20),
			array('contact_person', 'length', 'max'=>150),
			array('diagnostics, defect, result, note, deldate, Lock, DateLock, DateCreate, DateChange', 'safe'),
			array('rpdoc_id, repr_id, dctp_id, number, date, empl_id, splr_id, diagnostics, diagnostics_sum, sum, defect, result, contact_person, note, deldate, Lock, EmplLock, DateLock, EmplCreate, DateCreate, EmplChange, DateChange, EmplDel', 'safe'),
		);
	}


	public function attributeLabels()
	{
		return array(
//			'rpdoc_id' => 'Rpdoc',
//			'repr_id' => 'Repr',
//			'dctp_id' => 'Dctp',
//			'number' => 'Number',
//			'date' => 'Date',
//			'empl_id' => 'Empl',
//			'splr_id' => 'Splr',
//			'diagnostics' => 'Diagnostics',
//			'diagnostics_sum' => 'Diagnostics Sum',
//			'sum' => 'Sum',
//			'defect' => 'Defect',
//			'result' => 'Result',
//			'contact_person' => 'Contact Person',
//			'note' => 'Note',
//			'deldate' => 'Deldate',
//			'Lock' => 'Lock',
//			'EmplLock' => 'Empl Lock',
//			'DateLock' => 'Date Lock',
//			'EmplCreate' => 'Empl Create',
//			'DateCreate' => 'Date Create',
//			'EmplChange' => 'Empl Change',
//			'DateChange' => 'Date Change',
//			'EmplDel' => 'Empl Del',

			'keyfield' => 'keyfield',
			'docid' => 'docid',
			'doctype_id' => 'doctype_id',
			'doctype' => 'Тип документа',
			'number' => 'Номер',
			'datereg' => 'Дата рег.',
			'dateexec' => 'Даты вып.',
			'note' => 'Примечание',
			'status' => 'Статус',
		);
	}


}
