<?php


class Delivery extends MainFormModel
{

	public $dldm_id = null;
	public $date = null;
	public $user_sender = null;
	public $objc_id = null;
	public $dltp_id = null;
	public $mstr_id = null;
	public $prty_id = null;
	public $bestdate = null;
	public $deadline = null;
	public $plandate = null;
	public $text = null;
	public $phonenumber = null;
	public $empl_dlvr_id = null;
	public $date_logist = null;
	public $user_logist = null;
	public $note = null;
	public $date_delivery = null;
	public $rep_delivery = null;
	public $Contacts = null;
	public $dlrs_id = null;
	public $date_promise = null;
	public $prtp_id = null;
	public $prdoc_id = null;
	public $calc_id = null;
	public $docm_id = null;
	public $dmnd_id = null;
	public $repr_id = null;
	public $Lock = null;
	public $EmplLock = null;
	public $DateLock = null;
	public $EmplCreate = null;
	public $DateCreate = null;
	public $EmplChange = null;
	public $DateChange = null;
	public $EmplDel = null;
	public $DelDate = null;
	public $MasterName = null;
	public $DeliveryType = null;
	public $Address_id = null;
	public $DeliveryMan = null;
	public $user_sender_name = null;
	public $user_logist_name = null;

	public $DemandPrior = null;

	public $Street_id = null;
	public $house = null;


	public $KeyFiled = 'd.dldm_id';
	public $PrimaryKey = 'dldm_id';


	function __construct($scenario = '', $print_reason = false) {

        parent::__construct($scenario);

        $this->SP_INSERT_NAME = 'INSERT_DeliveryDemands';
        $this->SP_UPDATE_NAME = 'UPDATE_DeliveryDemands';
        $this->SP_DELETE_NAME = 'DELETE_DeliveryDemands';

        $request = new CHttpRequest;
        $top = $request->getParam('top',200);
        $id  = $request->getParam('id',false);
        $date_range = $request->getParam('date',false);
        $empl_id = $request->getParam('empl_id',false);
        $master_id = $request->getParam('master_id',false);
        $status = $request->getParam('status',false);
        $address = $request->getParam('address',false);

        $top == null ? $top=200 : '';

        $select="select
	       d.dldm_id,
	       d.date,
	       d.user_sender,
	       dbo.fio(e2.employeename) as user_sender_name,
	       --dbo.FIO(m.EmployeeName) MasterName,
	       d.objc_id,
	       o.ObjectGr_id,
	       d.mstr_id,
	       m.EmployeeName as MasterName,
	       e.EmployeeName as CurName,
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
	       ar.AreaName
	       a ";

	    $from = "from DeliveryDemands d left join Objects o ON (o.Object_id = d.Objc_id)
			    left join Addresses_v a on (o.Address_id = a.Address_id)
			    left outer join Employees_ForObj_v m ON (d.mstr_id = m.Employee_id)
			    inner join DemandPriors dp on (d.prty_id = dp.DemandPrior_id)
			    left outer join Employees_ForObj_v e on (d.empl_dlvr_id = e.Employee_id)
			    left join DeliveryTypes dt on (d.dltp_id = dt.dltp_id)
			    left outer join Employees_ForObj_v e2 on (d.user_sender = e2.Employee_id)
			    left outer join Employees_ForObj_v e3 on (d.user_logist = e3.Employee_id )
			    left join ObjectsGroup og on (o.ObjectGr_id = og.ObjectGr_id)
			    left join Areas ar on (ar.Area_id = og.Area_id) ";

		$this->Query->setSelect($select);
        $this->Query->setFrom($from);
        $this->Query->setOrder(" order by d.dldm_id desc ");

        
//        if($id && $id != null){
//        	$this->Query->AddWhere("d.dldm_id='{$id}'");
//        }
//        else if(isset($date_range['fixday']) && $date_range['fixday'] != null) {
//        	$this->Query->AddWhere("d.date<=convert(datetime,'{$date_range['fixday']} 23:59:59',103)");
//        	$this->Query->AddWhere("d.date>=convert(datetime,'{$date_range['fixday']} 0:00:01',103)");
//	    }
//	    else {
//
//	        if(isset($date_range['begin']) && $date_range['begin'] != null) {
//	        	$this->Query->AddWhere("d.date>=convert(datetime,'{$date_range['begin']} 0:00:01',103)");
//	        }
//	        if(isset($date_range['end']) && $date_range['end'] != null) {
//	        	$this->Query->AddWhere("d.date<=convert(datetime,'{$date_range['end']} 23:59:59',103)");
//	        }
//	    }
//
//	    if($empl_id && $empl_id != null){
//        	$this->Query->AddWhere("d.empl_dlvr_id='{$empl_id}'");
//        }
//
//         if($master_id && $master_id != null){
//        	$this->Query->AddWhere("d.mstr_id='{$master_id}'");
//        }
//
//        if ($status) {
//        	if(isset($status['notrans'])) {
//        		$this->Query->AddWhere("d.date_logist is null");
//        	}
//        	if(isset($status['nofinish'])) {
//        		$this->Query->AddWhere("d.date_delivery is null");
//        	}
//        	if(isset($status['finish'])) {
//        		$this->Query->AddWhere("d.date_delivery is not null");
//        	}
//        }
//
//        if($address && $address != null){
//        	$this->Query->AddWhere("a.Street_id='{$address}'");
//        }
//
//        if ($print_reason) {
//        	$this->Query->AddWhere("d.plandate>d.date_delivery");
//        }



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
			array('date, prty_id, deadline, text', 'required'),
			array('objc_id, user_sender, dltp_id, mstr_id, prty_id, empl_dlvr_id, dlrs_id, prtp_id, prdoc_id, calc_id, docm_id, dmnd_id, repr_id, EmplLock, EmplCreate, EmplChange, EmplDel', 'numerical', 'integerOnly'=>true),
			array(' user_logist', 'length', 'max'=>50),
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

	public function getObjectList(){
		$sql = "Select
    O.Object_Id,
   
    A.Addr+Case When Isnull(O.Doorway,'')<>'' Then ', подъезд '+ O.Doorway Else '' End Address

  From Objects O
     inner join ObjectsGroup OG on (O.ObjectGr_Id = OG.ObjectGr_Id)
     inner Join Addresses_v A on (O.Address_id = A.Address_Id)
  Where
  O.Doorway <> 'Общее'
  and O.DelDate is Null
  and OG.DelDate is Null
Order by [Address]";

	$query = Yii::app()->db->createCommand($sql);
	return CHtml::listData($query->queryAll(), 'Object_Id', 'Address');
	}


	public function getAdditionInfo($id = false) {
		//if($id === false) $id = $this->dldm_id;
		$select = "
		select
       d.dldm_id,
       d.date,
       d.user_sender,
       d.MasterName,
       d.objc_id,
       d.ObjectGr_id,
       d.mstr_id,
       d.Addr,
       d.prty_id,
       d.DemandPrior,
       d.bestdate,
       d.deadline,
       d.plandate,
       d.text,
       d.date_promise,
       d.phonenumber,
       d.Contacts,
       d.contact_info,
       d.empl_dlvr_id,
       d.DeliveryMan,
       d.date_logist,
       d.user_logist,
       d.note,
       d.date_delivery,
       d.rep_delivery,
       d.DeliveryType,
       d.dltp_id,
       d.sort,
       d.overday,
       d.dlrs_id,
       d.user_sender_name,
       d.user_logist_name,
       d.delayreasonname,
       d.prtp_id,
       d.prdoc_id,
       d.calc_id,
       d.dmnd_id,
       d.docm_id,
       d.repr_id
		";

		$from = "
		from DeliveryDemands_v d
		";

		if($id === false) {
			$where = "";
		}
		else {
			$where = "
			where d.dldm_id = $id
			";
		}

		$order = "";

		$this->Query->setSelect($select);
		$this->Query->setFrom($from);
		$this->Query->setOrder($order);
		$this->Query->setWhere($where);

	}
}














