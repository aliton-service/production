<?php

/**
 * This is the model class for table "DeliveryComments".
 *
 * The followings are the available columns in table 'DeliveryComments':
 * @property integer $dlcm_id
 * @property integer $dldm_id
 * @property string $DateCreate
 * @property string $text
 * @property string $DelDate
 * @property integer $EmplCreate
 * @property boolean $Lock
 * @property integer $EmplLock
 * @property string $DateLock
 * @property integer $EmplChange
 * @property string $DateChange
 * @property integer $EmplDel
 */
class DeliveryComments extends MainFormModel
{
	public $dlcm_id = null;
	public $dldm_id = null;
	public $DateCreate = null;
	public $text = null;
	public $DelDate = null;
	public $EmplCreate = null;
	public $Lock = null;
	public $EmplLock = null;
	public $DateLock = null;
	public $EmplChange = null;
	public $DateChange = null;
	public $EmplDel = null;
	public $user_create = null;
	public $date_create = null;
	public $employeename = null;

	public $SP_INSERT_NAME = 'INSERT_DeliveryComments';
	public $SP_DELETE_NAME = 'DELETE_DeliveryComments';
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'DeliveryComments';
	}

	function __construct($scenario = '', $print_reason = false) {

		parent::__construct($scenario);

		$select = "
		Select
			dc.dlcm_id,
			dc.dldm_id,
			dc.EmplCreate,
			dc.date_create,
			dc.[text],
			dbo.FIO_N(e.Employee_id) employeename
		";
		$from = "
		From DeliveryComments dc
		left join Employees_ForObj_v e on (dc.EmplCreate = e.Employee_id)
		";
		$where = "
		Where dc.DelDate is Null
		";
		$order = "
		Order by dc.dlcm_id desc
		";
		$this->Query->setSelect($select);
		$this->Query->setFrom($from);
		$this->Query->setOrder($order);
		$this->Query->setWhere($where);
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('dldm_id, DateCreate', 'required'),
			array('dldm_id, EmplCreate, EmplLock, EmplChange, EmplDel', 'numerical', 'integerOnly'=>true),
			array('text, DelDate, Lock, DateLock, DateChange', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('dlcm_id, dldm_id, DateCreate, text, DelDate, EmplCreate, Lock, EmplLock, DateLock, EmplChange, DateChange, EmplDel', 'safe', 'on'=>'search'),
		);
	}



	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'dlcm_id' => 'Dlcm',
			'dldm_id' => 'Dldm',
			'DateCreate' => 'Date Create',
			'text' => 'Text',
			'DelDate' => 'Del Date',
			'EmplCreate' => 'Empl Create',
			'Lock' => 'Lock',
			'EmplLock' => 'Empl Lock',
			'DateLock' => 'Date Lock',
			'EmplChange' => 'Empl Change',
			'DateChange' => 'Date Change',
			'EmplDel' => 'Empl Del',
		);
	}


	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return DeliveryComments the static model class
	 */
	 public function deleteCount($id, $empl_id) {
	 
		$Command = Yii::app()->db->createCommand(''
                . "UPDATE DeliveryComments SET EmplDel = {$empl_id}, DelDate = '".date('m.d.y H:i:s')."' WHERE dlcm_id = {$id}
                ");
        
        return $Command->queryAll();
	}
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
