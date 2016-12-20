<?php

class MonitoringDemands extends MainFormModel
{
	public $mndm_id = null;
	public $Date = null;
	public $Prior = null;
	public $DemandPrior = null;
	public $Deadline = null;
	public $WishDate = null;
	public $PlanDate = null;
	public $Description = null;
	public $UserName = null;
	public $Employee_id = null;
	public $Note = null;
	public $DateExec = null;
	public $Calc_id = null;
	public $Dmnd_id = null;
	public $Repr_id = null;
	public $User2;
	public $UserCreate2 = null;
	public $DateCreate = null;
	public $UserChange2 = null;
	public $DateChange = null;
	public $UserAccept2 = null;
	public $DateAccept = null;
	public $OverDays = null;
	public $DelDate = null;
	public $prtp_id = null;
	public $prdoc_id = null;
	public $Lock = null;
	public $EmplLock = null;
	public $DateLock = null;
	public $EmplCreate = null;
	public $EmplChange = null;
	public $EmplDel = null;
	public $EmplNameAccept = null;
        public $title = null;

	public $KeyFiled = 'm.mndm_id';
	public $PrimaryKey = 'mndm_id';

	public $SP_INSERT_NAME = 'INSERT_MonitoringDemands';
	public $SP_UPDATE_NAME = 'UPDATE_MonitoringDemands';
	public $SP_DELETE_NAME = 'DELETE_MonitoringDemands';


	private $select = null;
	private $from = null;
	private $where = null;
	private $order = null;


        public function rules()
	{
            // NOTE: you should only define rules for those attributes that will receive user inputs.
            return array(
                array('Date, Prior', 'required'),
                array('Prior, Calc_id, Dmnd_id, Repr_id, prtp_id, prdoc_id, EmplLock, EmplCreate, EmplChange, EmplDel', 'numerical', 'integerOnly'=>true),
                array('Description, Note', 'length', 'max'=>1073741823),
                array('User2, UserChange2, UserAccept2', 'length', 'max'=>50),
                array('mndm_id, Date, Prior, Deadline, WishDate, PlanDate, Description, Note, DateExec, Calc_id, Dmnd_id, Repr_id, User2, UserCreate2, DateCreate, UserChange2, DateChange, UserAccept2, DateAccept, DelDate, prtp_id, prdoc_id, Lock, EmplLock, DateLock, EmplCreate, EmplChange, EmplDel', 'safe'),
            );
	}

	function __construct($scenario='') {
		parent::__construct($scenario);

		$select = "
		Select
                    m.mndm_id,
                    m.Date,
                    m.Prior,
                    dp.DemandPrior,
                    m.Deadline,
                    m.Description,
                    e.ShortName as UserName,
                    e.Employee_id,
                    m.DateAccept,
                    m.DateExec,
                    m.WishDate,
                    m.Note,
                    m.User2,
                    m.UserChange2,
                    m.UserAccept2,
                    m.UserCreate2,
                    dbo.FIO(e2.EmployeeName) as UserAc,
                    e2.ShortName EmplNameAccept,
                    m.PlanDate,
                    dbo.get_wdays_diff(m.Deadline, isNull(m.DateExec, getdate())) as OverDays,
                    m.prtp_id,
                    m.prdoc_id
		";

		$from = "
		From MonitoringDemands m left join DemandPriors dp on (m.Prior = dp.DemandPrior_id)
                    left join Employees e on (e.Alias = m.User2)
                    left join Employees e2 on (e2.Alias = m.UserAccept2)
		";

		$where = "
                    Where m.DelDate is Null
		";

		$order = "
		Order by
                    case when m.DateExec is Null then
                          0 else 1 end,
                    case when m.DateExec is Null then
                          case when m.DateAccept is Null then
                            0 else 1 end else 0 end,
                    case when m.DateExec is Null then
                          prior else 0 end,
                    mndm_id desc
		";

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
            return 'MonitoringDemands';
	}

	
	
	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'mndm_id' => 'Mndm',
			'Date' => 'Date',
			'Prior' => 'Prior',
			'Deadline' => 'Deadline',
			'WishDate' => 'Wish Date',
			'PlanDate' => 'Plan Date',
			'Description' => 'Description',
			'Note' => 'Note',
			'DateExec' => 'Date Exec',
			'Calc_id' => 'Calc',
			'Dmnd_id' => 'Dmnd',
			'Repr_id' => 'Repr',
			'User2' => 'User2',
			'UserCreate2' => 'User Create2',
			'DateCreate' => 'Date Create',
			'UserChange2' => 'User Change2',
			'DateChange' => 'Date Change',
			'UserAccept2' => 'User Accept2',
			'DateAccept' => 'Date Accept',
			'DelDate' => 'Del Date',
			'prtp_id' => 'Prtp',
			'prdoc_id' => 'Prdoc',
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
	 * @return MonitoringDemands the static model class
	 */
	 public function deleteCount($id, $empl_id) {
	 
		$Command = Yii::app()->db->createCommand(''
                . "UPDATE MonitoringDemands SET EmplDel = {$empl_id}, DelDate = '".date('m.d.y H:i:s')."' WHERE mndm_id = {$id}
                ");
        
        return $Command->queryAll();
	}
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}


	public function getMonitoringDetails($id) {
		$prlt_id = PriceList::getPriceList();
		$this->select = "
		Select
		  md.Mndt_id,
		  md.Mndm_id,
		  md.Equip_id,
		  md.Quant,
		  e.EquipName,
		  u.NameUnitMeasurement,
		  p.price_low,
		  p.price_high
		";
		$this->from = "
		From MonitoringDemandDetails md left join Equips e on (md.Equip_id = e.Equip_id)
		  left join UnitMeasurement u on (e.UnitMeasurement_id = u.UnitMeasurement_id)
		  left join PriceListDetails_v p on (p.prlt_id = '{$prlt_id}' and md.Equip_id = p.eqip_id)
  		";
		$this->where = "
		Where md.Mndm_id = '{$id}'
  		and md.DelDate is null
		";
		$this->order = "order by md.Mndm_id";
		$this->Query->setSelect($this->select);
		$this->Query->setFrom($this->from);
		$this->Query->setOrder($this->order);
		$this->Query->setWhere($this->where);
	}

    public function attributeFilters()
    {
        return array(
            'UserName' => 'e.Employee_id',
            'Date' => 'dbo.truncdate(m.Date)',
            'DemandPrior' => 'm.Prior',
        );
        
        
    }
}
