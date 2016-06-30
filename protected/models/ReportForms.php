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

		$select = " Select rf.rpfr_id, rf.ReportForm ";
		$from = " From ReportForms rf ";
		$where = "";
		$order = "Order By rf.ReportForm";

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
