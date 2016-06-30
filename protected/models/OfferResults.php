<?php


class OfferResults extends MainFormModel
{
	public $rslt_id = null;
	public $ResultName = null;
	public $DelDate = null;

	public $KeyFiled = '';
	public $PrimaryKey = 'code';

	public $SP_INSERT_NAME = '';
	public $SP_UPDATE_NAME = '';
	public $SP_DELETE_NAME = '';

	public function __construct($scenario = '') {
		parent::__construct($scenario);

		$select = "Select ofr.* ";
		$from = " From OfferResults ofr ";
		$where = " Where ofr.DelDate is null ";
		$order = " Order By ofr.ResultName ";

		$this->Query->setSelect($select);
		$this->Query->setFrom($from);
		$this->Query->setOrder($order);
		$this->Query->setWhere($where);
	}


	public function rules()
	{
		return array(
			array('ResultName', 'length', 'max'=>50),
			array('DelDate', 'safe'),
			array('rslt_id, ResultName, DelDate', 'safe'),
		);
	}

	public function attributeLabels()
	{
		return array(
			'rslt_id' => 'Rslt',
			'ResultName' => 'Result Name',
			'DelDate' => 'Del Date',
		);
	}

}
