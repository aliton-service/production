<?php

class TaskPrior extends MainFormModel
{
	public $Taskprior_id = null;
	public $TaskpriorName = null;

	public $KeyFiled = 'tp.Taskprior_id,';
	public $PrimaryKey = 'Taskprior_id';

	public $SP_INSERT_NAME = '';
	public $SP_UPDATE_NAME = '';
	public $SP_DELETE_NAME = '';


	function __construct() {
		parent::__construct();
		$select = "Select tp.* ";
		$from = " From TaskPrior tp ";
		$where = "";
		$order = " Order By tp.TaskpriorName ";

		$this->Query->setSelect($select);
		$this->Query->setFrom($from);
		$this->Query->setOrder($order);
		$this->Query->setWhere($where);
	}


	public function rules()
	{
		return array(
			array('TaskpriorName', 'required'),
			array('TaskpriorName', 'length', 'max'=>50),
			array('Taskprior_id, TaskpriorName', 'safe', 'on'=>'search'),
		);
	}


	public function attributeLabels()
	{
		return array(
			'Taskprior_id' => 'Taskprior',
			'TaskpriorName' => 'Taskprior Name',
		);
	}

}
