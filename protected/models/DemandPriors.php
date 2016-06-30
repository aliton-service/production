<?php

/**
 * This is the model class for table "DemandPriors".
 *
 * The followings are the available columns in table 'DemandPriors':
 * @property integer $DemandPrior_id
 * @property string $DemandPrior
 * @property integer $ExceedType
 * @property integer $ExceedDays
 * @property boolean $for_wh
 * @property integer $Sort
 * @property integer $Malfunction_id
 * @property boolean $for_dd
 * @property boolean $for_id
 * @property boolean $for_d
 * @property boolean $for_pd
 * @property boolean $for_md
 * @property boolean $Lock
 * @property integer $EmplLock
 * @property string $DateLock
 * @property integer $EmplChange
 * @property string $DateChange
 * @property integer $EmplDel
 * @property string $DelDate
 */
class DemandPriors extends MainFormModel
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
		$where = " Where dp.DelDate is null ";
		$order = " Order By dp.DemandPrior ";

		$this->Query->setSelect($select);
		$this->Query->setFrom($from);
		$this->Query->setWhere($where);
		$this->Query->setOrder($order);
		$this->KeyFiled = 'dp.DemandPrior_id';
	}


	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'DemandPriors';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
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

	/**
	 * @return array customized attribute labels (name=>label)
	 */
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

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return DemandPriors the static model class
	 */
	 public function deleteCount($id, $empl_id) {
	 
		$Command = Yii::app()->db->createCommand(''
                . "UPDATE DemandPriors SET EmplDel = {$empl_id}, DelDate = '".date('m.d.y H:i:s')."' WHERE DemandPrior_id = {$id}
                ");
        
        return $Command->queryAll();
	}
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

//	static function all() {
//		return CHtml::listData(self::model()->findAll(), 'DemandPrior_id', 'DemandPrior');
//
//	}

	static function getData() {
		$q = new SQLQuery();
		$q->setSelect("Select DemandPrior_id, DemandPrior");
		$q->setFrom("\nFrom DemandPriors");
		$q->setWhere("\nWhere DelDate is Null");
		return $q->QueryAll();
	}
        
        static function getDataForDemandEdit() {
		$q = new SQLQuery();
		$q->setSelect("Select p.Demandet_id, p.DemandType_id, p.SystemType_id, p.EquipType_id, p.Malfunction_id, p.DemandPrior_id, d.DemandPrior, case when d.DemandPrior = 'Срочная, платная' then 1 else 0 end as sort_1");
		$q->setFrom("\nFrom DemandsExecTime p left join DemandPriors d on (p.DemandPrior_id = d.DemandPrior_id)");
		$q->setWhere("\nWhere p.DelDate is null");
                $q->setOrder("\nOrder By sort_1, d.Sort, DemandPrior");
		return $q->QueryAll();
	}
}
