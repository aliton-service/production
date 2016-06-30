<?php

/**
 * This is the model class for table "WHDocuments".
 *
 * The followings are the available columns in table 'WHDocuments':
 * @property integer $docm_id
 * @property integer $achs_id
 * @property integer $dctp_id
 * @property string $date
 * @property string $number
 * @property string $note
 * @property integer $splr_id
 * @property integer $objc_id
 * @property integer $rtrs_id
 * @property string $in_date
 * @property string $in_number
 * @property integer $wrtp_id
 * @property integer $prty_id
 * @property integer $rcrs_id
 * @property string $best_date
 * @property string $deadline
 * @property string $date_ready
 * @property string $date_act
 * @property string $DelDate
 * @property string $user_create2
 * @property string $date_create
 * @property string $user_change2
 * @property string $date_change
 * @property integer $dmnd_empl_id
 * @property integer $prms_empl_id
 * @property integer $dckn_id
 * @property integer $in_docm_id
 * @property double $sum
 * @property integer $pmtp_id
 * @property string $bill
 * @property string $date_payment
 * @property string $note_payment
 * @property integer $jbtp_id
 * @property string $work_list
 * @property boolean $signed_yn
 * @property integer $cstm_id
 * @property integer $jrdc_id
 * @property integer $cntr_id
 * @property integer $empl_id
 * @property integer $dlrs_id
 * @property string $ReceiptNumber
 * @property string $ReceiptDate
 * @property string $date_promise
 * @property integer $ConfirmCancel_id
 * @property string $date_prchs
 * @property integer $empl_prchs
 * @property integer $prtp_id
 * @property integer $prdoc_id
 * @property integer $calc_id
 * @property integer $info_id
 * @property integer $repr_id
 * @property integer $dmnd_id
 * @property string $plan_date
 * @property integer $strg_id
 * @property integer $in_strg_id
 * @property boolean $Lock
 * @property integer $EmplLock
 * @property string $DateLock
 * @property integer $EmplCreate
 * @property integer $EmplChange
 * @property integer $EmplDel
 *
 * The followings are the available model relations:
 * @property WHDocuments $inDocm
 * @property WHDocuments[] $wHDocuments
 * @property ActDocuments[] $actDocuments
 * @property ActDocuments[] $actDocuments1
 * @property ActDemands[] $actDemands
 * @property ActContracts[] $actContracts
 * @property DocmAchsDetails[] $docmAchsDetails
 */
class WHDocuments extends MainFormModel
{

	public $docm_id = null;
	public $achs_id = null;
	public $dctp_id = null;
	public $date = null;
	public $number = null;
	public $note = null;
	public $splr_id = null;
	public $objc_id = null;
	public $rtrs_id = null;
	public $in_date = null;
	public $in_number = null;
	public $wrtp_id = null;
	public $prty_id = null;
	public $rcrs_id = null;
	public $best_date = null;
	public $deadline = null;
	public $date_ready = null;
	public $date_act = null;
	public $DelDate = null;
	public $user_create2 = null;
	public $date_create = null;
	public $user_change2 = null;
	public $date_change = null;
	public $dmnd_empl_id = null;
	public $prms_empl_id = null;
	public $dckn_id = null;
	public $in_docm_id = null;
	public $sum = null;
	public $pmtp_id = null;
	public $bill = null;
	public $date_payment = null;
	public $note_payment = null;
	public $jbtp_id = null;
	public $work_list = null;
	public $signed_yn = null;
	public $cstm_id = null;
	public $jrdc_id = null;
	public $cntr_id = null;
	public $empl_id = null;
	public $dlrs_id = null;
	public $ReceiptNumber = null;
	public $ReceiptDate = null;
	public $date_promise = null;
	public $ConfirmCancel_id = null;
	public $date_prchs = null;
	public $empl_prchs = null;
	public $prtp_id = null;
	public $prdoc_id = null;
	public $calc_id = null;
	public $info_id = null;
	public $repr_id = null;
	public $dmnd_id = null;
	public $plan_date = null;
	public $strg_id = null;
	public $in_strg_id = null;
	public $Lock = null;
	public $EmplLock = null;
	public $DateLock = null;
	public $EmplCreate = null;
	public $EmplChange = null;
	public $EmplDel = null;
	public $wrtp_name = null;
	public $prty_name = null;
	public $storage = null;
	public $Address = null;
	public $rcrs_name = null;
	public $dmnd_empl_name = null;
	public $prms_empl_name = null;
	public $notes = null;
	public $splr_name = null;
	public $in_storage = null;
	public $JuridicalPerson = null;
	public $rtrs_name = null;
	public $empl_name = null;
	public $dckn_name = null;


	public $KeyFiled = 'd.docm_id';
	public $PrimaryKey = 'docm_id';

	protected $data = array();

	private $select = null;
	private $from = null;
	private $where = null;
	private $order = null;

	private $_actions = array(
		'insert' => array(
			'billComing' => 'INSERT_WHDocuments',
			'billReturn' => 'INSERT_WHDocuments',
			'billReturnDistrib' => 'INSERT_WHDocuments',
			'billReturnMaster' => 'INSERT_WHDocuments',
			'movePRC' => 'INSERT_WHDocuments',
			'moveStorage' => 'INSERT_WHDocuments',
			'requireGrant' => 'INSERT_WHDocuments',
		),
		'update' => array(
			'billComing' => 'UPDATE_WHDocuments',
			'billReturn' => 'UPDATE_WHDocuments',
			'billReturnDistrib' => 'UPDATE_WHDocuments',
			'billReturnMaster' => 'UPDATE_WHDocuments',
			'movePRC' => 'UPDATE_WHDocuments',
			'moveStorage' => 'UPDATE_WHDocuments',
			'requireGrant' => 'UPDATE_WHDocuments',
		),
	);

	public $SP_DELETE_NAME = 'DELETE_WHDocuments';


	function __construct($scenario='') {
		parent::__construct($scenario);





	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'WHDocuments';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('dctp_id, date, number, note', 'required'),
			array('achs_id, dctp_id, splr_id, objc_id, rtrs_id, wrtp_id, prty_id, rcrs_id, dmnd_empl_id, prms_empl_id, dckn_id, in_docm_id, pmtp_id, jbtp_id, cstm_id, jrdc_id, cntr_id, empl_id, dlrs_id, ConfirmCancel_id, empl_prchs, prtp_id, prdoc_id, calc_id, info_id, repr_id, dmnd_id, strg_id, in_strg_id, EmplLock, EmplCreate, EmplChange, EmplDel', 'numerical', 'integerOnly'=>true),
			array('sum', 'numerical'),
			array('number', 'length', 'max'=>120),
			array('note, note_payment, work_list', 'length', 'max'=>1073741823),
			array('in_number', 'length', 'max'=>10),
			array('user_create2, user_change2, bill, ReceiptNumber', 'length', 'max'=>50),
			array('in_date, best_date, deadline, date_ready, date_act, DelDate, date_create, date_change, date_payment, signed_yn, ReceiptDate, date_promise, date_prchs, plan_date, Lock, DateLock', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('docm_id, achs_id, dctp_id, date, number, note, splr_id, objc_id, rtrs_id, in_date, in_number, wrtp_id, prty_id, rcrs_id, best_date, deadline, date_ready, date_act, DelDate, user_create2, date_create, user_change2, date_change, dmnd_empl_id, prms_empl_id, dckn_id, in_docm_id, sum, pmtp_id, bill, date_payment, note_payment, jbtp_id, work_list, signed_yn, cstm_id, jrdc_id, cntr_id, empl_id, dlrs_id, ReceiptNumber, ReceiptDate, date_promise, ConfirmCancel_id, date_prchs, empl_prchs, prtp_id, prdoc_id, calc_id, info_id, repr_id, dmnd_id, plan_date, strg_id, in_strg_id, Lock, EmplLock, DateLock, EmplCreate, EmplChange, EmplDel', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'inDocm' => array(self::BELONGS_TO, 'WHDocuments', 'in_docm_id'),
			'wHDocuments' => array(self::HAS_MANY, 'WHDocuments', 'in_docm_id'),
			'actDocuments' => array(self::HAS_MANY, 'ActDocuments', 'act_id'),
			'actDocuments1' => array(self::HAS_MANY, 'ActDocuments', 'docm_id'),
			'actDemands' => array(self::HAS_MANY, 'ActDemands', 'act_id'),
			'actContracts' => array(self::HAS_MANY, 'ActContracts', 'act_id'),
			'docmAchsDetails' => array(self::HAS_MANY, 'DocmAchsDetails', 'docm_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'docm_id' => 'Docm',
			'achs_id' => 'Achs',
			'dctp_id' => 'Dctp',
			'date' => 'Date',
			'number' => 'Number',
			'note' => 'Note',
			'splr_id' => 'Splr',
			'objc_id' => 'Objc',
			'rtrs_id' => 'Rtrs',
			'in_date' => 'In Date',
			'in_number' => 'In Number',
			'wrtp_id' => 'Wrtp',
			'prty_id' => 'Prty',
			'rcrs_id' => 'Rcrs',
			'best_date' => 'Best Date',
			'deadline' => 'Deadline',
			'date_ready' => 'Date Ready',
			'date_act' => 'Date Act',
			'DelDate' => 'Del Date',
			'user_create2' => 'User Create2',
			'date_create' => 'Date Create',
			'user_change2' => 'User Change2',
			'date_change' => 'Date Change',
			'dmnd_empl_id' => 'Dmnd Empl',
			'prms_empl_id' => 'Prms Empl',
			'dckn_id' => 'Dckn',
			'in_docm_id' => 'In Docm',
			'sum' => 'Sum',
			'pmtp_id' => 'Pmtp',
			'bill' => 'Bill',
			'date_payment' => 'Date Payment',
			'note_payment' => 'Note Payment',
			'jbtp_id' => 'Jbtp',
			'work_list' => 'Work List',
			'signed_yn' => 'Signed Yn',
			'cstm_id' => 'Cstm',
			'jrdc_id' => 'Jrdc',
			'cntr_id' => 'Cntr',
			'empl_id' => 'Empl',
			'dlrs_id' => 'Dlrs',
			'ReceiptNumber' => 'Receipt Number',
			'ReceiptDate' => 'Receipt Date',
			'date_promise' => 'Date Promise',
			'ConfirmCancel_id' => 'Confirm Cancel',
			'date_prchs' => 'Date Prchs',
			'empl_prchs' => 'Empl Prchs',
			'prtp_id' => 'Prtp',
			'prdoc_id' => 'Prdoc',
			'calc_id' => 'Calc',
			'info_id' => 'Info',
			'repr_id' => 'Repr',
			'dmnd_id' => 'Dmnd',
			'plan_date' => 'Plan Date',
			'strg_id' => 'Strg',
			'in_strg_id' => 'In Strg',
			'Lock' => 'Lock',
			'EmplLock' => 'Empl Lock',
			'DateLock' => 'Date Lock',
			'EmplCreate' => 'Empl Create',
			'EmplChange' => 'Empl Change',
			'EmplDel' => 'Empl Del',
		);
	}



	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return WHDocuments the static model class
	 */
	 public function deleteCount($id, $empl_id) {
	 
		$Command = Yii::app()->db->createCommand(''
                . "UPDATE WHDocuments SET EmplDel = {$empl_id}, DelDate = '".date('m.d.y H:i:s')."' WHERE docm_id = {$id}
                ");
        
        return $Command->queryAll();
	}
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function getAction($type = false, $view = false) {
		if(!$type || !$view) return false;

//		if(!$view || !isset($this->_actions[$type][$view])) {
//			return false;
//		}

		return isset($this->_actions[$type][$view]) ?
			$this->_actions[$type][$view] : false;
	}

	public function setData($reestr) {
		switch ($reestr) {
			case 'all':
				$this->choiseAll();
				break;
			case 'move_storage':
				$this->choiseByType(8);
				break;
			case 'move_prc':
				$this->choiseByType(7);
				break;
			case 'bill_coming':
				$this->choiseBillComing();
				break;
			case 'require_grant':
				$this->choiseRequireGrant();
				break;
			case 'bill_return':
				$this->choiseByType(2);
				break;
			case 'bill_return_distrib':
				$this->choiseByType(3);
				break;
			case 'bill_return_master':
				$this->choiseBillReturnMaster();
				break;
			case 'doc_details':
				$this->getDetails();
				break;
			default:
				break;
		}

	}

	private function choiseAll() {
		$this->select = "
			select d.docm_id,
			   d.objc_id,
			   d.dctp_id,
			   d.dctp_name,
			   d.number,
			   d.date,
			   d.date_create,
			   d.note,
			   a.actn_code,
			   a.actn_name,
			   a.ac_date,
			   hldr_src_name + ': ' +
				 case when a.hldr_src_id = 1 then dbo.FIO(strm_name)
					  when a.hldr_src_id = 2 then a.splr_name
					  when a.hldr_src_id = 3 then dbo.FIO(mstr_name)
				 end as Source,
			   hldr_dst_name + ': ' +
				 case when a.hldr_dst_id = 1 then dbo.FIO(strm_name)
					  when a.hldr_dst_id = 2 then a.splr_name
					  when a.hldr_dst_id = 3 then dbo.FIO(mstr_name)
				 end as Destination,
			 a.achs_id,
			 d.wrtp_name,
			 case when (d.wrtp_name = 'Монтаж' or d.wrtp_name = 'Установка') then 'Монтаж' else 'Обслуживание' end as wrtp_gr,
			 d.strg_id,
			 d.storage
		";
		$this->from = "
			from WHDocuments_v d left join ActionHistory_v a on (d.achs_id = a.achs_id)
		";

		$this->order = "Order By d.docm_id asc ";

		$this->setQuery();
	}

	private function choiseBillComing() {
		$this->select = "
			select d.docm_id,
       d.objc_id,
       d.dctp_id,
       d.dctp_name,
       d.dckn_id,
       d.dckn_name,
       d.number,
       d.date,
       d.date_create,
       d.note,
       d.splr_name,
       a.ac_date,
       dbo.FIO(strm_name) strm_name ,
       a.achs_id,
       d.wrtp_name,
       dbo.get_docmachsdetails_sum(d.docm_id) as summa,
       ac.date as c_date,
       ac.EmployeeName as c_name,
       ac.ConfirmCancelName as c_confirmname,
       d.strg_id,
       d.storage
		";
		$this->from = "
			from WHDocuments_NonTreb_v d left join ActionHistory_v a on (d.achs_id = a.achs_id)
  left join ActionConfirm_v ac on (ac.docm_id = d.docm_id)
		";

		$this->where = "
		where d.dctp_id = 1
		";

		$this->order = "order by d.docm_id asc ";

		$this->setQuery();
	}

	private function choiseRequireGrant() {
		$this->select = "
		select d.docm_id,
       d.dctp_id,
       d.objc_id,
       d.dctp_name,
       d.number,
       d.date,
       d.date_create,
       d.prty_name,
       d.wrtp_name,
       d.note,
       d.Address,
       d.best_date,
       d.deadline,
       d.date_ready,
       a.ac_date,
       d.dmnd_empl_name,
       d.dmnd_empl_id,
       d.prms_empl_name,
       d.empl_name,
       d.empl_id,
       d.ReceiptNumber,
       d.ReceiptDate,
       dbo.FIO(a.strm_name) as strm_name,
       dbo.FIO(a.empl_to_name) as mstr_name,
       d.rcrs_name,
       d.StatusFull,
       d.status,
       d.date_promise,

       a.achs_id,
       case when ((isNull(a.ac_date, getdate()) > d.deadline and d.prty_name = 'Срочное уточнение') or (isNull(dbo.truncdate(a.ac_date), dbo.truncdate(getdate())) > d.deadline ) and d.prty_name <> 'Срочное уточнение')then 'Y'
               else 'N' end exceedYN,
       case when (d.wrtp_name = 'Монтаж' or d.wrtp_name = 'Установка') then 'Монтаж' else 'Обслуживание' end as wrtp_gr,
       ac.date as c_date,
       ac.EmployeeName as c_name,
       ac.ConfirmCancelName as c_confirmname,
       case when dbo.truncdate(isNull(d.date_ready, getdate())) > d.deadline then
          dbo.get_wdays_diff(d.deadline, dbo.truncdate(isNull(a.ac_date, getdate())))
       else Null end OverDay,
       d.date_prchs,
       d.empl_prchs,
       d.name_prchs,
       d.state_prchs,
       d.strg_id,
       d.storage
		";
		$this->from = "
		from WHDocuments_Treb_v d left join ActionHistory_v a on (d.achs_id = a.achs_id)
        left join Objects o on (o.Object_id = d.Objc_id)
        left join Addresses_v ad on (ad.Address_id = o.Address_id)
        left join ObjectsGroup og on (og.ObjectGr_id = o.ObjectGr_id)
        left join ActionConfirm_v ac on (ac.docm_id = d.docm_id)

		";
		$this->order = "
		order by case when (a.achs_id is null ) then  0 else 1 end, case when (d.date_ready is null ) then 0 else 1 end, a.ac_date desc, d.deadline, d.best_date
		";

		$this->setQuery();
	}

	private function choiseByType($id) {
		$this->select = "
		select d.docm_id,
       d.objc_id,
       d.dctp_id,
       d.dctp_name,
       d.number,
       d.date,
       d.date_create,
       d.note,
       d.Address,
       d.rtrs_name,
       a.ac_date,
       dbo.FIO(a.strm_name) strm_name,
       dbo.FIO(a.mstr_name) mstr_name,
       a.achs_id,
       d.wrtp_name,
       d.strg_id,
       d.storage
		";
		$this->from = "
		from WHDocuments_NonTreb_v d left join ActionHistory_v a on (d.achs_id = a.achs_id)
		";
		$this->order = "order by d.docm_id desc ";

		$this->where = "
		where d.dctp_id = $id
		";

		$this->setQuery();
	}

	private function choiseBillReturnMaster() {
		$this->select = "
		select
    d.docm_id,
    d.dctp_id,
    d.dctp_name,
    d.number,
    case when a.achs_id is null then 'Не выдано' else 'Выдано' end [status],
    d.date,
    d.date_create,
    d.note,
    d.address,
    a.ac_date,
    d.dmnd_empl_name,
    d.dmnd_empl_id,
    d.empl_name,
    d.empl_id,
    a.strm_id,
    dbo.FIO(a.strm_name) as strm_name,
    a.achs_id

		";
		$this->from = "
		from WHDocuments_v d left join ActionHistory_v a on (d.achs_id = a.achs_id)
        left join Objects o on (o.Object_id = d.Objc_id)
        left join Addresses_v ad on (ad.Address_id = o.Address_id)
        left join ObjectsGroup og on (og.ObjectGr_id = o.ObjectGr_id)
        left join ActionConfirm_v ac on (ac.docm_id = d.docm_id)

		";
		$this->order = "
		order by case when (a.achs_id is null ) then  0 else 1 end, a.ac_date desc, d.deadline, d.best_date

		";
		$this->where = "
		where d.dctp_id = 9
		";

		$this->setQuery();
	}


	private function setQuery() {
		$this->Query->setSelect($this->select);
		$this->Query->setFrom($this->from);
		$this->Query->setOrder($this->order);
		$this->Query->setWhere($this->where);
	}


	public function getAdditionData($id) {
		$id = (int) $id;
		$this->select = "
		select d.docm_id,
       d.dctp_id,
       d.date,
       d.dctp_name,
       d.dckn_id,
       d.dckn_name,
       d.number,
       d.note,
       d.splr_id,
       d.splr_name,
       d.objc_id,
       d.Address,
       d.rtrs_id,
       d.rtrs_name,
       d.in_docm_id,
       in_doc.number in_number,
       in_doc.date in_date,
       d.wrtp_id,
       d.wrtp_name,
       d.prty_id,
       d.prty_name,
       d.rcrs_id,
       d.rcrs_name,
       d.best_date,
       d.deadline,
       d.dmnd_empl_id,
       d.dmnd_empl_name,
       d.prms_empl_id,
       d.prms_empl_name,
       d.achs_id,
       d.status,
       d.empl_id,
       d.empl_name,
       d.ReceiptNumber,
       d.ReceiptDate,
       d.dlrs_id,
       d.date_promise,
      --wd.date_change,
      --wd.user_change,
      dbo.fio(e.EmployeeName),
      d.jrdc_id,
      d.JuridicalPerson,
      d.prtp_id,
      d.prdoc_id,
      d.date_prchs,
    --  d.user_create,
      case when d.date_prchs is not null then 'Требуется закупка' else '' end state_prchs,
      d.calc_id,
      d.repr_id,
      case when isnull(d.prdoc_id, 0) = 0 then isnull(d.demand_id, 0) else d.prdoc_id end demand_id,
      d.dmnd_id,
      dbo.get_wh_notes(d.docm_id) notes,
      d.date_ready,
      d.plan_date,
      d.strg_id,
      d.storage,
      d.in_strg_id,
      d.in_storage
      ";
		$this->from = "
from WHDocuments_v d left outer join WHDocuments_v in_doc on (d.in_docm_id = in_doc.docm_id)
left join WHDocuments_v wd on (wd.docm_id = d.docm_id)
left join employees e on (e.Employee_id=wd.EmplChange )
";
		$this->where = "
where d.docm_id = $id
		";

		$this->setQuery();

//		$query = Yii::app()->db->CreateCommand($sql);
//		$query->bindParam(':id', $id);
//		return $query->queryRow();
	}

	private function getDetails() {
		$this->select = "
		select
       d.dadt_id,
       d.docm_id,
       d.achs_id,
       d.eqip_id,
       e.EquipName,
       e.UnitMeasurement_id,
       m.NameUnitMeasurement,
       d.docm_quant,
       d.fact_quant,

       d.used,
       d.price,
       d.sum,
       e.discontinued,
       d.ToProduction,
       d.no_price_list,
      case when d.cceq_id is null then 1 else 0 end color
		";
		$this->from = "
		from DocmAchsDetails d inner join Equips e on (d.eqip_id = e.Equip_id)
     left join UnitMeasurement m on (e.UnitMeasurement_id = m.UnitMeasurement_id)
		";
		$this->order = "order by d.dadt_id ";

		$this->where = "
		where  d.DelDate is null
		";

		$this->setQuery();
	}

	public function getEquipInfo($ids) {
		$this->getAvailableInfo($ids['equip_id'], $ids['strg_id']);
		$this->getReservInfo($ids['equip_id'], $ids['strg_id']);
		$this->getReadyInfo($ids['equip_id'], $ids['strg_id']);
		$this->getMinReservInfo($ids['equip_id']);
		die(json_encode($this->data));
	}

	public function getAvailableInfo($equip_id, $strg_id) {
		$this->select = "declare @date datetime set @date = getdate() exec dbo.get_wh_inventory_proc '{$equip_id}', @date, '{$strg_id}'";
		$this->setQuery();
		$this->data = array_merge($this->data, $this->queryRow(array()));

	}

	public function getReservInfo($equip_id, $strg_id) {
		$this->select = "select dbo.get_wh_reserv(t.eqip_id, getdate(), t.strg_id) reserv
from (select '{$equip_id}' eqip_id, '{$strg_id}' strg_id) t";
		$this->setQuery();
		$this->data = array_merge($this->data, $this->queryRow(array()));
	}

	public function getMinReservInfo($equip_id) {
		$this->select = "select dbo.get_reserv('{$equip_id}', getdate()) min_reserv ";
		$this->setQuery();
		$this->data = array_merge($this->data, $this->queryRow(array()));
	}

	public function getReadyInfo($equip_id, $strg_id) {
		$this->select = "select dbo.get_wh_ready(t.eqip_id, getdate(), t.strg_id) ready
from (select '{$equip_id}' eqip_id, '{$strg_id}' strg_id) t";
		$this->setQuery();
		$this->data = array_merge($this->data, $this->queryRow(array()));

	}

	public function getHistoryEquip($ids) {

		$docm_id = $ids['docm_id'];
		$dt_id = $ids['dt_id'];

		$this->select = "
		SELECT
     0 Sort,
     0 his_id,
     'Текущее состояние' as action,

   dad.docm_id,
   dad.eqip_id,
   dbo.FIO(e.EmployeeName) Namechange,
  dbo.FIO(e1.EmployeeName) Namecreate,
  eq.equipname,
  dad.docm_quant
from DocmAchsDetails dad
left join Employees e on (e.Employee_id =dad.EmplChange)
left join Employees e1 on (e1.Employee_id =dad.EmplCreate)
inner join Equips eq on(dad.eqip_id=eq.Equip_id)
where dad.docm_id = {$docm_id} and dad.dadt_id = {$dt_id}
 UNION ALL
  SELECT
     1 as Sort,
     wh.his_id,
     case when wh.action = 'u' then 'Изменение'
            when wh.action = 'i' then 'Создано'
    end Action,

   wh.docm_id,
   wh.equip_id,
   dbo.FIO(e.EmployeeName) Namechange,
   dbo.FIO(e1.EmployeeName) Namecreate,
   eq.equipname,
   wh.quant
		";

		$this->from = "
		from whdoc_audit_E wh
left join Employees e on (e.Employee_id = wh.EmplChange)
left join Employees e1 on (e1.Employee_id = wh.EmplCreate)
inner join equips eq on(wh.equip_id=eq.Equip_id)
		";

		$this->where = "
		where wh.docm_id = {$docm_id} and wh.dadt_id = {$dt_id}
		";

		$this->order = "
		order by Sort, his_id desc
		";

		$this->setQuery();
	}


	public function getEquipsFull() {
		$this->select = "
		select e.Equip_id, EquipName,  m.NameUnitMeasurement, e.discontinued
		";
		$this->from = "
		from Equips e left outer join UnitMeasurement m on (e.UnitMeasurement_id = m.UnitMeasurement_id)
              left join Categories c on (e.ctgr_id = c.ctgr_id)
		";
		$this->where = "
		where (e.DelDate is null) and (c.ForTreb = 1) or (e.DelDate is Null) and (e.ctgr_id is Null)
		";
		$this->order = "
		order by e.EquipName
		";

		$this->setQuery();
	}


	public function getGrantHistory($id) {
		$this->select = "
		SELECT
			 0 Sort,
			 0 his_id,
			 'Текущее состояние' as action,
		   wh.EmplChange,
		   wh.EmplCreate,
		   wh.docm_id,
		   wh.dctp_id,
		   wh.objc_id,
		   wh.note,
		   dbo.truncdate(wh.ReceiptDate) ReceiptDate,
		   wh.date_promise,
		   p.DemandPrior,
		   dt.DocType_Name NameDoc,
		   a.Addr,
		   dbo.FIO(e.EmployeeName) Name1,
		  dbo.FIO(e1.EmployeeName) Name2
		";
		$this->from = "
		from WHDocuments wh
			left join DemandPriors p on (wh.prty_id = p.DemandPrior_id)
			left join Employees e on (e.Employee_id =wh.EmplChange)
			left join Employees e1 on (e1.Employee_id =wh.EmplCreate)
			left join DocTypes dt on (wh.dctp_id=dt.DocType_Id)
			left join Objects o on (o.object_id=wh.objc_id)
			inner join Addresses_v a on (a.address_id=o.address_id)
			where wh.docm_id={$id}
			 UNION ALL
			  SELECT
				 1 as Sort,
				 wh.his_id,
				 case when wh.action = 'u' then 'Изменение'
						when wh.action = 'i' then 'Создано'
				end Action,
			   wh.[user],
			   wh.user_create,
			   wh.docm_id,
			   wh.dctp_id,
			   wh.objc_id,
			   wh.note1,
			   dbo.truncdate(wh.ReceiptDate) ReceiptDate,
			   wh.date_promise,
			   p.DemandPrior,
			   dt.DocType_Name NameDoc,
			   a.Addr,
			   dbo.FIO(e.EmployeeName) Name,
				dbo.FIO(e1.EmployeeName) Name2
			from whdoc_audit wh
			left join DemandPriors p on (wh.prty_id = p.DemandPrior_id)
			left join Employees e on (e.Employee_id = wh.EmplCreate)
			left join Employees e1 on (el.Employee_id =wh.EmplCreate)
			left join DocTypes dt on (wh.dctp_id=dt.DocType_Id)
			left join Objects o on (o.object_id=wh.objc_id)
			inner join Addresses_v a on (o.address_id=a.address_id)
		";
		$this->where = "
		where wh.docm_id={$id}
		";
		$this->order = "
		order by Sort
		";
		$this->setQuery();

	}


	public function getProcessInfo($id) {
//		$sql = "select dbo.get_wh_notes({$id}) notes";
//		$query = Yii->app()->db->createCommand($sql);
//

	}


	static function getNote($id) {
		$q = new SQLQuery();
		$q->setSelect("select dbo.get_wh_notes({$id}) notes");
		return $q->QueryRow();
	}



}
