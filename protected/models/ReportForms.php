<?php


class ReportForms extends MainFormModel
{
	public $rpfr_id = null;
	public $ReportForm = null;

	public $KeyFiled = 'rf.rpfr_id';
	public $PrimaryKey = 'rpfr_id';

	public $SP_INSERT_NAME = '';
	public $SP_UPDATE_NAME = '';
	public $SP_DELETE_NAME = '';


	public function __construct($scenario = '') {
		parent::__construct($scenario);

		$select = "\nSelect rf.rpfr_id, rf.ReportForm ";
		$from = "\nFrom ReportForms rf ";
		$where = "\nWhere rpfr_id <> 3 and rpfr_id <> 4";
		$order = "\nOrder By rf.ReportForm";

		$this->Query->setSelect($select);
		$this->Query->setFrom($from);
		$this->Query->setOrder($order);
		$this->Query->setWhere($where);

	}

	public function rules()
	{
		return array(
			array('ReportForm', 'required'),
			array('ReportForm', 'length', 'max'=>50),
			array('rpfr_id, ReportForm', 'safe'),
		);
	}


	public function attributeLabels()
	{
		return array(
			'rpfr_id' => 'Rpfr',
			'ReportForm' => 'Report Form',
		);
	}

}
