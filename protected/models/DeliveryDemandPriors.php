<?php

class DeliveryDemandPriors extends MainFormModel
{
	public $DemandPrior_id = null;
	public $DemandPrior = null;
	public $ExceedType = null;
	public $ExceedDays = null;
	public $for_wh = null;
	public $Sort = null;
	public $Malfunction_id = null;
	public $for_dd = null;
	public $for_id = null;
	public $for_d = null;
	public $for_pd = null;
	public $for_md = null;
	public $Lock = null;
	public $EmplLock = null;
	public $DateLock = null;
	public $EmplChange = null;
	public $DateChange = null;
	public $EmplDel = null;
	public $DelDate = null;


	function __construct($scenario = '') {
		parent::__construct($scenario);

		$select = " Select dp.* ";
		$from = " From DemandPriors dp ";
		$where = " Where dp.DelDate is null and dp.for_dd = 1";
		$order = " Order By dp.DemandPrior ";

		$this->Query->setSelect($select);
		$this->Query->setFrom($from);
		$this->Query->setWhere($where);
		$this->Query->setOrder($order);
		$this->KeyFiled = 'dp.DemandPrior_id';
	}


	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('for_wh, Sort', 'required'),
			array('ExceedType, ExceedDays, Sort, Malfunction_id, EmplLock, EmplChange, EmplDel', 'numerical', 'integerOnly'=>true),
			array('DemandPrior', 'length', 'max'=>50),
			array('for_dd, for_id, for_d, for_pd, for_md, Lock, DateLock, DateChange, DelDate', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('DemandPrior_id, DemandPrior, ExceedType, ExceedDays, for_wh, Sort, Malfunction_id, for_dd, for_id, for_d, for_pd, for_md, Lock, EmplLock, DateLock, EmplChange, DateChange, EmplDel, DelDate', 'safe', 'on'=>'search'),
		);
	}

	
	public function attributeLabels()
	{
		return array(
			'DemandPrior_id' => 'Demand Prior',
			'DemandPrior' => 'Demand Prior',
			'ExceedType' => 'Exceed Type',
			'ExceedDays' => 'Exceed Days',
			'for_wh' => 'For Wh',
			'Sort' => 'Sort',
			'Malfunction_id' => 'Malfunction',
			'for_dd' => 'For Dd',
			'for_id' => 'For',
			'for_d' => 'For D',
			'for_pd' => 'For Pd',
			'for_md' => 'For Md',
			'Lock' => 'Lock',
			'EmplLock' => 'Empl Lock',
			'DateLock' => 'Date Lock',
			'EmplChange' => 'Empl Change',
			'DateChange' => 'Date Change',
			'EmplDel' => 'Empl Del',
			'DelDate' => 'Del Date',
		);
	}
}

