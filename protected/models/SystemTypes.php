<?php

/**
 * This is the model class for table "SystemTypes".
 *
 * The followings are the available columns in table 'SystemTypes':
 * @property integer $SystemType_Id
 * @property string $SystemTypeName
 * @property integer $Sort
 * @property boolean $Visible
 * @property boolean $Lock
 * @property integer $EmplLock
 * @property string $DateLock
 * @property integer $EmplChange
 * @property string $DateChange
 * @property integer $EmplDel
 * @property string $DelDate
 */
class SystemTypes extends MainFormModel
{
	public $SystemType_Id = null;
	public $SystemTypeName = null;
	public $Sort = null;
	public $Visible = null;
	public $Lock = null;
	public $EmplLock = null;
	public $DateLock = null;
	public $EmplChange = null;
	public $DateChange = null;
	public $EmplDel = null;
	public $DelDate = null;

	public $KeyFiled = 'st.SystemType_Id';
	public $PrimaryKey = 'SystemType_Id';

	public $SP_INSERT_NAME = '';
	public $SP_UPDATE_NAME = '';
	public $SP_DELETE_NAME = '';

	function __construct($scenario='') {
		parent::__construct($scenario);

		$select = "Select st.* ";
		$from = "From SystemTypes st ";
		$where = "Where st.DelDate Is Null ";
		$order = "Order By st.SystemTypeName ";

		$this->Query->setSelect($select);
		$this->Query->setFrom($from);
		$this->Query->setOrder($order);
		$this->Query->setWhere($where);
	}
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'SystemTypes';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('SystemTypeName', 'required'),
			array('Sort, EmplLock, EmplChange, EmplDel', 'numerical', 'integerOnly'=>true),
			array('SystemTypeName', 'length', 'max'=>100),
			array('Visible, Lock, DateLock, DateChange, DelDate', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('SystemType_Id, SystemTypeName, Sort, Visible, Lock, EmplLock, DateLock, EmplChange, DateChange, EmplDel, DelDate', 'safe', 'on'=>'search'),
		);
	}


	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'SystemType_Id' => 'System Type',
			'SystemTypeName' => 'System Type Name',
			'Sort' => 'Sort',
			'Visible' => 'Visible',
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
	 * @return SystemTypes the static model class
	 */
	 public function deleteCount($id, $empl_id) {
	 
		$Command = Yii::app()->db->createCommand(''
                . "UPDATE SystemTypes SET EmplDel = {$empl_id}, DelDate = '".date('m.d.y H:i:s')."' WHERE SystemType_Id = {$id}
                ");
        
        return $Command->queryAll();
	}
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

        
        public function getData() {
            $q = new SQLQuery();
            $q->setSelect("Select SystemType_Id, SystemTypeName");
            $q->setFrom("\nFrom SystemTypes");
            $q->setWhere("\nWhere DelDate is Null");
            $q->setOrder("\nOrder by SystemTypeName");
            return $q->QueryAll();
        }
        
        public function getDataForDemandEdit() {
            $q = new SQLQuery();
            $q->setSelect("Select p.DemandType_id, p.SystemType_id, s.SystemTypeName, s.Sort");
            $q->setFrom("\nFrom DemandsExecTime p left join SystemTypes s on (p.SystemType_id = s.SystemType_Id)");
            $q->setWhere("\nWhere p.DelDate is null");
            $q->setGroupBy("\nGroup by p.DemandType_id, p.SystemType_id, s.SystemTypeName, s.Sort");
            $q->setOrder("\nOrder By s.Sort, s.SystemTypeName");
            return $q->QueryAll();
        }
}
