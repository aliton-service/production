<?php

/**
 * This is the model class for table "ExecutorReports".
 *
 * The followings are the available columns in table 'ExecutorReports':
 * @property integer $exrp_id
 * @property integer $demand_id
 * @property integer $empl_id
 * @property string $DateCreate
 * @property string $report
 * @property string $othername
 * @property string $dateexec
 * @property boolean $is_auto
 * @property string $DelDate
 * @property string $plandateexec
 * @property boolean $Lock
 * @property integer $EmplLock
 * @property integer $EmplCreate
 * @property integer $EmplChange
 * @property string $DateChange
 * @property integer $EmplDel
 */
class ExecutorReports extends MainFormModel
{

	public $exrp_id = null;
	public $demand_id = null;
	public $empl_id = null;
	public $DateCreate = null;
	public $report = null;
	public $othername = null;
	public $dateexec = null;
	public $is_auto = null;
	public $DelDate = null;
        public $date = null;
	public $plandateexec = null;
	public $Lock = null;
	public $EmplLock = null;
	public $EmplCreate = null;
	public $EmplChange = null;
	public $DateChange = null;
	public $EmplDel = null;
	
	public function rules()
	{
            return array(
                array(
                    'exrp_id',
                    'demand_id',
                    'empl_id',
                    'DateCreate',
                    'report',
                    'othername',
                    'dateexec',
                    'is_auto',
                    'DelDate',
                    'plandateexec',
                    'Lock',
                    'date',
                    'EmplLock',
                    'EmplCreate',
                    'EmplChange',
                    'DateChange',
                    'EmplDel', 'safe'),
            );
	}
        
        public function __construct($scenario = '') {
            parent::__construct($scenario);
            
            $this->SP_INSERT_NAME = 'INSERT_EXECUTORREPORTS';
            $this->SP_UPDATE_NAME = '';
            $this->SP_DELETE_NAME = 'DELETE_EXECUTORREPORTS';

            $Select  =  "\nSelect
                              ex.exrp_id,
                              ex.demand_id,
                              ex.empl_id,
                              ex.[date],
                              ex.report,
                              e.ShortName as EmployeeName,
                              ex.plandateexec,
                              ex.othername,
                              ex.dateexec,
                              isnull(is_auto, 0) as is_auto";
            $From =     "\nFrom ExecutorReports ex inner join Employees e on (ex.empl_id = e.Employee_id)";
            $Where =    "\nWhere ex.DelDate is null";
            $Order =    "\nOrder by ex.exrp_id desc";
            $this->Query->setSelect($Select);
            $this->Query->setFrom($From);
            $this->Query->setWhere($Where);
            $this->Query->setOrder($Order);
            $this->KeyFiled = 'o.exrp_id';
            $this->PrimaryKey = 'exrp_id';
        }
        
	public function attributeLabels()
	{
		return array(
			'exrp_id' => 'Exrp',
			'demand_id' => 'Demand',
                        'date' => 'Дата',
			'empl_id' => 'Empl',
			'DateCreate' => 'Date Create',
			'report' => 'Report',
			'othername' => 'Othername',
			'dateexec' => 'Dateexec',
			'is_auto' => 'Is Auto',
			'DelDate' => 'Del Date',
			'plandateexec' => 'Plandateexec',
			'Lock' => 'Lock',
			'EmplLock' => 'Empl Lock',
			'EmplCreate' => 'Empl Create',
			'EmplChange' => 'Empl Change',
			'DateChange' => 'Date Change',
			'EmplDel' => 'Empl Del',
		);
	}

        public function deleteCount($id, $empl_id) {
	 
            $Command = Yii::app()->db->createCommand(''
            . "UPDATE ExecutorReports SET EmplDel = {$empl_id}, DelDate = '".date('m.d.y H:i:s')."' WHERE exrp_id = {$id}
            ");
            return $Command->queryAll();
	}
	
        
}
