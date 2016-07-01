<?php

class RepairEvaluations extends MainFormModel {
	
	public $RepairEvaluation_id;
	public $RepairEvaluation;
	public $Evaluation;
	public $Desc;
	public $DateCreate;
	public $EmplCreate;
	public $DateChange;
	public $EmplChange;
	public $DelDate;
	
        
        public function rules() {
		return array(
			array('RepairEvaluation_id,
                                RepairEvaluation,
                                Evaluation,
                                Desc,
                                DateCreate,
                                EmplCreate,
                                DateChange,
                                EmplChange,
                                DelDate', 'safe'),
		);
	}
        
	function __construct($scenario='') {
		parent::__construct($scenario);

		$this->SP_INSERT_NAME = '';
		$this->SP_UPDATE_NAME = '';
		$this->SP_DELETE_NAME = '';

		$Select = "\nSelect
                                r.RepairEvaluation_id,
                                r.RepairEvaluation,
                                r.Evaluation,
                                r.[Desc],
                                r.DateCreate,
                                r.EmplCreate,
                                r.DateChange,
                                r.EmplChange,
                                r.DelDate";
                $From = "\nFrom RepairEvaluations r";
                $Where = "\nWhere r.DelDate is Null";
                $Order = "\nOrder by r.RepairEvaluation_id";
                
                $this->Query->setSelect($Select);
		$this->Query->setFrom($From);
                $this->Query->setWhere($Where);
                $this->Query->setOrder($Order);

		$this->KeyFiled = 'r.RepairEvaluation_id';
		$this->PrimaryKey = 'RepairEvaluation_id';
        }

	

	public function attributeLabels(){
		return array(
			'RepairEvaluation_id' => '',
                        'RepairEvaluation' => '',
                        'Evaluation' => '',
                        'Desc' => '',
                        'DateCreate' => '',
                        'EmplCreate' => '',
                        'DateChange' => '',
                        'EmplChange' => '',
                        'DelDate' => '',
		);
	}
}

