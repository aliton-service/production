<?php


class OfferTypes extends MainFormModel
{

	public $code = null;
	public $offertype = null;
	public $auto = null;
	public $offergroup = null;
	public $systp_id = null;

	public $KeyFiled = 'ot.code';
	public $PrimaryKey = 'code';

	public $SP_INSERT_NAME = '';
	public $SP_UPDATE_NAME = '';
	public $SP_DELETE_NAME = '';

	public function __construct($scenario = '') {
		parent::__construct($scenario);

		$select = "Select ot.* ";
		$from = " From OfferTypes ot ";
		$where = "";
		$order = " Order By ot.offertype ";

		$this->Query->setSelect($select);
		$this->Query->setFrom($from);
		$this->Query->setOrder($order);
		$this->Query->setWhere($where);
	}


	public function rules()
	{
		return array(
			array('offertype', 'required'),
			array('offergroup, systp_id', 'numerical', 'integerOnly'=>true),
			array('offertype', 'length', 'max'=>50),
			array('auto', 'safe'),
			array('code, offertype, auto, offergroup, systp_id', 'safe', 'on'=>'search'),
		);
	}


	public function attributeLabels()
	{
		return array(
			'code' => 'Code',
			'offertype' => 'Offertype',
			'auto' => 'Auto',
			'offergroup' => 'Offergroup',
			'systp_id' => 'Systp',
		);
	}


}
