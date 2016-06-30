<?php

/**
 * This is the model class for table "DeliveryDemands".
 *
 * The followings are the available columns in table 'DeliveryDemands':
 * @property integer $dldm_id
 * @property string $date
 * @property string $user_sender
 * @property integer $objc_id
 * @property integer $dltp_id
 * @property integer $mstr_id
 * @property integer $prty_id
 * @property string $bestdate
 * @property string $deadline
 * @property string $plandate
 * @property string $text
 * @property string $phonenumber
 * @property integer $empl_dlvr_id
 * @property string $date_logist
 * @property string $user_logist
 * @property string $note
 * @property string $date_delivery
 * @property string $rep_delivery
 * @property string $Contacts
 * @property integer $dlrs_id
 * @property string $date_promise
 * @property integer $prtp_id
 * @property integer $prdoc_id
 * @property integer $calc_id
 * @property integer $docm_id
 * @property integer $dmnd_id
 * @property integer $repr_id
 * @property boolean $Lock
 * @property integer $EmplLock
 * @property string $DateLock
 * @property integer $EmplCreate
 * @property string $DateCreate
 * @property integer $EmplChange
 * @property string $DateChange
 * @property integer $EmplDel
 * @property string $DelDate
 */
class Delivery extends MainFormModel
{

	public $dldm_id;
	public $date;
	public $user_sender;
	public $objc_id;
	public $dltp_id;
	public $mstr_id;
	public $prty_id;
	public $bestdate;
	public $deadline;
	public $plandate;
	public $text;
	public $phonenumber;
	public $empl_dlvr_id;
	public $date_logist;
	public $user_logist;
	public $note;
	public $date_delivery;
	public $rep_delivery;
	public $Contacts;
	public $dlrs_id;
	public $date_promise;
	public $prtp_id;
	public $prdoc_id;
	public $calc_id;
	public $docm_id;
	public $dmnd_id;
	public $repr_id;
	public $Lock;
	public $EmplLock;
	public $DateLock;
	public $EmplCreate;
	public $DateCreate;
	public $EmplChange;
	public $DateChange;
	public $EmplDel;
	public $DelDate;


	function __construct($scenario = '') {

        parent::__construct($scenario);

        $this->SP_INSERT_NAME = 'INSERT_Contacts';
        $this->SP_UPDATE_NAME = 'UPDATE_Contacts';
        $this->SP_DELETE_NAME = 'DELETE_Contacts';

        $select="select
	       d.dldm_id,
	       d.date,
	       d.user_sender,
	       dbo.fio(e2.employeename) as user_sender_name,
	       dbo.FIO(m.EmployeeName) MasterName,
	       d.objc_id,
	       o.ObjectGr_id,
	       d.mstr_id,
	       a.Addr,
	       d.prty_id,
	       dp.DemandPrior,
	       d.bestdate,
	       d.deadline,
	       d.plandate,
	       d.text,
	       d.date_promise,
	       d.phonenumber,
	       d.Contacts,
	       isnull(d.phonenumber, '') + isnull(d.Contacts, '') as contact_info,
	       d.empl_dlvr_id,
	       dbo.FIO(e.EmployeeName) DeliveryMan,
	       d.date_logist,
	       d.user_logist,
	       dbo.fio(e3.employeename) as user_logist_name,
	       d.note,
	       d.date_delivery,
	       d.rep_delivery,
	       dt.DeliveryType,
	       d.dltp_id,
	       dp.sort,
	       dbo.get_wdays_diff(d.deadline, isnull(d.date_delivery, getdate())) as overday,
	       d.dlrs_id,
	       d.dmnd_id,
	       d.calc_id,
	       ar.AreaName ";
	    $from = "from DeliveryDemands d left join Objects o ON (o.Object_id = d.Objc_id)
			    left join Addresses_v a on (o.Address_id = a.Address_id)
			    left outer join Employees_ForObj_v m ON (d.mstr_id = m.Employee_id)
			    inner join DemandPriors dp on (d.prty_id = dp.DemandPrior_id)
			    left outer join Employees_ForObj_v e on (d.empl_dlvr_id = e.Employee_id)
			    left join DeliveryTypes dt on (d.dltp_id = dt.dltp_id)
			    left outer join Employees_ForObj_v e2 on (d.user_sender = e2.alias or d.user_sender = e2.remotealias)
			    left outer join Employees_ForObj_v e3 on (d.user_logist = e3.alias or d.user_logist = e3.remotealias)
			    left join ObjectsGroup og on (o.ObjectGr_id = og.ObjectGr_id)
			    left join Areas ar on (ar.Area_id = og.Area_id) ";

		$this->Query->setSelect($select);
        $this->Query->setFrom($from);

        $this->KeyFiled = 'd.dldm_id';
        $this->PrimaryKey = 'dldm_id';
	}


	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'DeliveryDemands';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('date, user_sender, prty_id, deadline, text', 'required'),
			array('objc_id, dltp_id, mstr_id, prty_id, empl_dlvr_id, dlrs_id, prtp_id, prdoc_id, calc_id, docm_id, dmnd_id, repr_id, EmplLock, EmplCreate, EmplChange, EmplDel', 'numerical', 'integerOnly'=>true),
			array('user_sender, user_logist', 'length', 'max'=>50),
			array('text, note, rep_delivery', 'length', 'max'=>1073741823),
			array('phonenumber, Contacts', 'length', 'max'=>200),
			array('bestdate, plandate, date_logist, date_delivery, date_promise, Lock, DateLock, DateCreate, DateChange, DelDate', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('dldm_id, date, user_sender, objc_id, dltp_id, mstr_id, prty_id, bestdate, deadline, plandate, text, phonenumber, empl_dlvr_id, date_logist, user_logist, note, date_delivery, rep_delivery, Contacts, dlrs_id, date_promise, prtp_id, prdoc_id, calc_id, docm_id, dmnd_id, repr_id, Lock, EmplLock, DateLock, EmplCreate, DateCreate, EmplChange, DateChange, EmplDel, DelDate', 'safe', 'on'=>'search'),
		);
	}

	

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'dldm_id' => 'Dldm',
			'date' => 'Date',
			'user_sender' => 'User Sender',
			'objc_id' => 'Objc',
			'dltp_id' => 'Dltp',
			'mstr_id' => 'Mstr',
			'prty_id' => 'Prty',
			'bestdate' => 'Bestdate',
			'deadline' => 'Deadline',
			'plandate' => 'Plandate',
			'text' => 'Text',
			'phonenumber' => 'Phonenumber',
			'empl_dlvr_id' => 'Empl Dlvr',
			'date_logist' => 'Date Logist',
			'user_logist' => 'User Logist',
			'note' => 'Note',
			'date_delivery' => 'Date Delivery',
			'rep_delivery' => 'Rep Delivery',
			'Contacts' => 'Contacts',
			'dlrs_id' => 'Dlrs',
			'date_promise' => 'Date Promise',
			'prtp_id' => 'Prtp',
			'prdoc_id' => 'Prdoc',
			'calc_id' => 'Calc',
			'docm_id' => 'Docm',
			'dmnd_id' => 'Dmnd',
			'repr_id' => 'Repr',
			'Lock' => 'Lock',
			'EmplLock' => 'Empl Lock',
			'DateLock' => 'Date Lock',
			'EmplCreate' => 'Empl Create',
			'DateCreate' => 'Date Create',
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
	 * @return DeliveryDemands the static model class
	 */
	 public function deleteCount($id, $empl_id) {
	 
		$Command = Yii::app()->db->createCommand(''
                . "UPDATE DeliveryDemands SET EmplDel = {$empl_id}, DelDate = '".date('m.d.y H:i:s')."' WHERE dldm_id = {$id}
                ");
        
        return $Command->queryAll();
	}
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
