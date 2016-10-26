<?php
 

class Demands extends MainFormModel
{
	public $Demand_id = null;
	public $vvvvvvv = null;
	public $ContrS_id = null;
	public $Object_id = null;
        public $ObjectGr_id = null;
        public $Address = null;
	public $DemandText = null;
	public $DateReg = null;
	public $DateExec = null;
	public $DatePrev = null;
	public $DateMaster = null;
	public $RepMaster = null;
	public $ExecOther = null;
	public $DemandType_id = null;
        public $DemandType = null;
	public $DemandPrior_id = null;
	public $Note = null;
	public $DateCreate = null;
	public $DateChange = null;
	public $FirstDemandType_Id = null;
	public $FirstDemandPrior_Id = null;
	public $UserChangePrior = null;
	public $DateChangePrior = null;
	public $PlanDateExec = null;
	public $JobType_Id = null;
	public $Contacts = null;
	public $DateExecute = null;
	public $Deadline = null;
	public $Dateregdem = null;
	public $dlrs_id = null;
	public $RemarkReason = null;
	public $ActionClient = null;
	public $ActionMaster = null;
	public $ReportRemark = null;
	public $Beep = null;
	public $SystemType_id = null;
	public $EquipType_id = null;
	public $Malfunction_id = null;
	public $RemarkDemand = null;
	public $AgreeDate = null;
	public $TransferReason = null;
	public $DateOfHelpRequest = null;
	public $DateOfTransfer = null;
	public $DelayedClosureReason_id = null;
	public $DelDate = null;
	public $UntimeRes = null;
	public $DemandEt_id = null;
	public $FirstEquipType_id = null;
	public $FirstMalfunction_id = null;
	public $rslt_id = null;
	public $EmplCreate = null;
	public $EmplChange = null;
	public $EmplDel = null;
	public $Lock = null;
	public $EmplLock = null;
	public $User = null;
	public $note = null;
	public $overday = null;

	//------fulldemands-----
	public $objectgr_id = null;
	public $MasterName = null;
        public $Master = null;
	public $OtherName = null;
	public $ExecutorsName = null;
	public $ServiceType = null;
	public $UCreateName = null;
	public $UChangeName = null;
	public $FirstDemandType = null;
	public $FirstDemandPrior = null;
	public $AreaName = null;
	public $ResultName = null;
	public $VIP = null;
	public $floor = null;
	public $Street_id = null;
	public $Territ_id = null;
	public $House = null;
	public $DelayReason = null;
	public $clrs_id = null;
	public $Reason = null;
        public $SystemType = null;
        public $EquipType = null;
        public $Malfunction = null;
        public $DemandPrior = null;
        public $CloseReason = null;
        public $ExceedDays = null;
        public $FullOverDay = null;
        public $WorkedOut = null;
        public $WorkedOutStatus = null;

	//------executorreport
	public $exrp_id = null;
	public $empl_id = null;
	public $demand_id = null;
	public $plandateexec = null;
	public $report = null;

        public $DType_id;
        public $DSystem_id;
        public $DEquip_id;
        public $DMalfunction_id;
        public $DPrior_id;
        
        
	function __construct($scenario = '') {

        parent::__construct($scenario);

        $this->SP_INSERT_NAME = 'INSERT_Demands2';
        $this->SP_UPDATE_NAME = 'UPDATE_Demands2';
        $this->SP_DELETE_NAME = 'DELETE_Demands';

        $request = new CHttpRequest;
        $top = $request->getParam('top',200);
        $top == null ? $top=200 : '';
      
        $data = $request->getParam('d', false);
        $status = $request->getParam('status',false);
        
        $select ="SELECT 
        		d.*,
                        case when d.WorkedOut is not null then 'Отработано' else 'Не отработано' end WorkedOutStatus,
                        d.DateExec as DateExecFilter,
                        case when d.VIP = 1 then 'VIP' else '' end  as VIPName,
                        dbo.get_overday(d.Deadline, isnull(d.DateExec, getdate()), d.DemandEt_id) + isnull(d.overday, 0) as FullOverDay";
        $from = "\nFrom FullDemands d with (nolock) ";
				
	$this->Query->setSelect($select);
        $this->Query->setFrom($from);
        $this->Query->setOrder(" order by
                                  case when WorkedOut is Null
                                    then 0
                                    else 1
                                  end,
				  case when DateExec is Null
				    then 0
				    else 1
				  end,
				  case when DateExec is Null
				    then case when DateMaster is Null
				           then 0
				           else 1 end
				    else 0
				  end,
				  case when DateExec is Null
				    then Sort
				    else 0
				  end,
				  demand_id desc ");

            $this->KeyFiled = 'd.Demand_id';
            $this->PrimaryKey = 'Demand_id';
        }

	public function rules()
	{
            return array(
                    array('TransferReason', 'TransferValidate', 'on' => 'Exec, Update'),
                    array('dlrs_id', 'DeadlineValidate', 'on' => 'Exec'),
                    array('DateExec', 'ExecutorsValidate', 'on' => 'Exec'),
                    array('DateMaster, rslt_id', 'required', 'on' => 'Exec'),
                    array('Contacts, DType_id, DPrior_id', 'required', 'on' => 'Insert, Update, Exec'),
                    array('Demand_id,'
                        . 'vvvvvvv,'
                        . 'ContrS_id,'
                        . 'Object_id,'
                        . 'ObjectGr_id,'
                        . 'DemandText,'
                        . 'DateReg,'
                        . 'Master,'
                        . 'Contacts,'
                        . 'DateExec,'
                        . 'DatePrev,'
                        . 'DateMaster,'
                        . 'RepMaster,'
                        . 'ExecOther,'
                        . 'DemandPrior_id,'
                        . 'Note,'
                        . 'DateCreate,'
                        . 'DateChange,'
                        . 'FirstDemandType_Id,'
                        . 'FirstDemandPrior_Id,'
                        . 'UserChangePrior,'
                        . 'DateChangePrior,'
                        . 'PlanDateExec,'
                        . 'JobType_Id,'
                        . 'DateExecute,'
                        . 'Deadline,'
                        . 'Dateregdem,'
                        . 'dlrs_id,'
                        . 'RemarkReason,'
                        . 'ActionClient,'
                        . 'ActionMaster,'
                        . 'ReportRemark,'
                        . 'Beep,'
                        . 'Address,'
                        . 'SystemType_id,'
                        . 'EquipType_id,'
                        . 'Malfunction_id,'
                        . 'RemarkDemand,'
                        . 'AgreeDate,'
                        . 'TransferReason,'
                        . 'DateOfHelpRequest,'
                        . 'DateOfTransfer,'
                        . 'DelayedClosureReason_id,'
                        . 'DelDate,'
                        . 'DType_id,
                           DSystem_id,
                           DEquip_id,
                           DMalfunction_id,
                           DPrior_id,'
                        . 'UntimeRes,'
                        . 'DemandEt_id,'
                        . 'FirstEquipType_id,'
                        . 'FirstMalfunction_id,'
                        . 'rslt_id,'
                        . 'EmplCreate,'
                        . 'EmplChange,'
                        . 'EmplDel,'
                        . 'Lock,'
                        . 'WorkedOut,'
                        . 'WorkedOutStatus,'
                        . 'EmplLock', 'safe', 'on' => 'Insert, Update, Exec'),
            );
	}
        
        public function ExecutorsValidate($attribute, array $params = array()) {
            $Executors = new DemandsExecutors();
            $Executors = $Executors->Find(array(
                'de.Demand_id' => $this->Demand_id));
            
            if (count($Executors) === 0)
                $this->addError($attribute, 'У заявки отсутствуют исполнители');
        }
        
        public function DeadlineValidate($attribute, array $params = array()) {
            $Deadline = 0;
            if ($this->Deadline === '')
                $Deadline = strtotime('01.01.2999');
            else    
                $Deadline = strtotime($this->Deadline);
            
            $DateExec = strtotime($this->DateExec);
            if (($DateExec > $Deadline) && ($this->dlrs_id === ''))
                $this->addError($attribute, 'Заполните причину просрочки');
        }
        
        public function TransferValidate($attribute, array $params = array()) {
            if (($this->DemandPrior_id === '10') || ($this->DemandPrior_id === '11')) {
                if ($this->FirstDemandPrior_Id !== $this->DemandPrior_id) {
                    if ($this->TransferReason === '')
                        $this->addError($attribute, 'Заполните причину перевода заявки');   
                }
            }
        }
        
	public function attributeLabels()
	{
		return array(
			'Demand_id' => 'Demand',
                        'Address' => 'Address',
                        'DemandType_id' => 'Тип заявки',
			'Contacts' => 'Контактное лицо',
                        'DemandPrior_id' => 'Приоритет',
                        'vvvvvvv' => 'Vvvvvvv',
			'ContrS_id' => 'Contr_S',
			'Object_id' => 'Object_id',
                        'ObjectGr_id' => 'ObjectGr_id',
			'DemandText' => 'Demand Text',
			'DateReg' => 'Date Reg',
			'DateExec' => 'Date Exec',
			'DatePrev' => 'Date Prev',
			'DateMaster' => 'Date Master',
			'RepMaster' => 'Rep Master',
			'ExecOther' => 'Exec Other',
			'WorkedOut' => 'WorkedOut',
			'WorkedOutStatus' => 'WorkedOutStatus',
			'DType_id' => 'Тип заявки',
                        'DSystem_id' => '',
                        'DEquip_id' => '',
                        'DMalfunction_id' => '',
                        'DPrior_id' => 'Приоритет',
			
			'Note' => 'Note',
			'DateCreate' => 'Date Create',
			'DateChange' => 'Date Change',
			'FirstDemandType_Id' => 'First Demand Type',
			'FirstDemandPrior_Id' => 'First Demand Prior',
			'UserChangePrior' => 'User Change Prior',
			'DateChangePrior' => 'Date Change Prior',
			'PlanDateExec' => 'Plan Date Exec',
			'JobType_Id' => 'Job Type',
			
			'DateExecute' => 'Date Execute',
			'Deadline' => 'Deadline',
			'Dateregdem' => 'Dateregdem',
			'dlrs_id' => 'Dlrs',
			'RemarkReason' => 'Remark Reason',
			'ActionClient' => 'Action Client',
			'ActionMaster' => 'Action Master',
			'ReportRemark' => 'Report Remark',
			'Beep' => 'Beep',
			'SystemType_id' => 'System Type',
			'EquipType_id' => 'Equip Type',
			'Malfunction_id' => 'Malfunction',
			'RemarkDemand' => 'Remark Demand',
			'AgreeDate' => 'Agree Date',
			'TransferReason' => 'Transfer Reason',
			'DateOfHelpRequest' => 'Date Of Help Request',
			'DateOfTransfer' => 'Date Of Transfer',
			'DelayedClosureReason_id' => 'Delayed Closure Reason',
			'DelDate' => 'Del Date',
			'UntimeRes' => 'Untime Res',
			'DemandEt_id' => 'Demand Et',
			'FirstEquipType_id' => 'First Equip Type',
			'FirstMalfunction_id' => 'First Malfunction',
			'rslt_id' => '',
			'EmplCreate' => 'Empl Create',
			'EmplChange' => 'Empl Change',
			'EmplDel' => 'Empl Del',
			'Lock' => 'Lock',
			'EmplLock' => 'Empl Lock',
		);
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Demands the static model class
	 */
	 public function deleteCount($id, $empl_id) {
	 
		$Command = Yii::app()->db->createCommand(''
                . "UPDATE Demands SET EmplDel = {$empl_id}, DelDate = '".date('m.d.y H:i:s')."' WHERE Demand_id = {$id}
                ");
        
        return $Command->queryAll();
	}
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function contactsInfo($obj_gr) {
		$sql = "select 
	       			c.date,
	       			c.text,
	       			c.pay_date,
	       			c.next_date      

				from Contacts c
				inner join Objects o
				on o.ObjectGr_id = c.ObjectGr_id
				where o.Object_id = $obj_gr
				order by c.date desc 
				";

		$query = Yii::app()->db->createCommand($sql);
		return $query->queryAll();
	}

	public function executorsInfo($dem_id) {
		$sql = "Select
				  de.DemandExecutor_id,
				  de.Demand_id,
				  de.Employee_id,
				  e.EmployeeName as empl,
				  de.Date as date,
				  de.DelDate,
				  datediff(dd, Date, isNull(d.DateExec, GetDate())) as day
				From DemandsExecutors de inner join Employees_ForObj_v e on (e.Employee_id = de.Employee_id)
				        inner join Demands d on (de.Demand_id = d.Demand_id)
				Where de.DelDate is Null and de.Demand_id = {$dem_id}
				";
	
		$query = Yii::app()->db->createCommand($sql);
		return $query->queryAll();
	}


	public function getSystemTypes($id, $listdata = false) {
		$sql = "select
				   p.SystemType_id as id,
				   s.SystemTypeName as value
				 
				from DemandsExecTime p left join SystemTypes s on (p.SystemType_id = s.SystemType_Id)
				where DemandType_id = {$id}
				  and p.DelDate is null
				group by p.SystemType_id, s.SystemTypeName, s.Sort
				Order By s.Sort, s.SystemTypeName
				 
				 ";

		$query = Yii::app()->db->createCommand($sql);
		if($listdata) {
			return CHtml::listData($query->queryAll(), 'id', 'value');
		}

		return $query->queryAll();
	}

	public function getEquipTypes($id,$parent_id=null, $listdata = false) {
		if($parent_id == null) $dem_t = " (p.DemandType_id is Null) ";
		else $dem_t = " (p.DemandType_id = {$parent_id} or p.DemandType_id is Null) ";

		if($id == null) $system = " (p.SystemType_id is Null) ";
		else $system = " (p.SystemType_id = {$id} or p.SystemType_id is Null) ";
		$sql = "Select
			   p.EquipType_id as id,
			   e.EquipType as value
			From DemandsExecTime p left join EquipTypes e on (p.EquipType_id = e.EquipType_id)
			Where {$system}
			  and {$dem_t}
			  and p.DelDate is null
			Group by p.EquipType_id, e.EquipType
			Order By e.EquipType
			 ";

		$query = Yii::app()->db->createCommand($sql);
		if($listdata) {
			return CHtml::listData($query->queryAll(), 'id', 'value');
		}

		return $query->queryAll();

	}

	public function getFault($id, $parent_id, $parent_parent_id) {
		$sql ="Select
			   p.Malfunction_id as id,
			   m.Malfunction as value
			From DemandsExecTime p left join Malfunctions m on (p.Malfunction_id = m.Malfunction_id)
			Where (p.EquipType_id = {$id} or p.EquipType_id is null)
			  and (p.SystemType_id = {$parent_id} or p.SystemType_id is null)
			  and p.DemandType_id = {$parent_parent_id}
			  and p.DelDate is null
			Group by p.Malfunction_id, m.Malfunction
			Order By m.Malfunction";

		$query = Yii::app()->db->createCommand($sql);
		return $query->queryAll();
	}

	public function getPriors($id=null, $parent_id=null, $parent_parent_id=null, $parent_parent_parent_id=null) {
		if ($parent_parent_id == null) $system = "and (p.SystemType_id is Null) ";
		else $system = "and (p.SystemType_id = {$parent_parent_id} or p.SystemType_id is Null) ";

		if ($parent_id == null) $equip = "and (p.EquipType_id is Null) ";
		else $equip = "and (p.EquipType_id = {$parent_id} or p.EquipType_id is Null) ";

		if ($id == null) $fault = "and (p.Malfunction_id is Null) ";
		else $fault = "and (p.Malfunction_id = {$id} or p.Malfunction_id is Null) ";

		$sql = "Select
			  
			   p.Demandet_id as id,
			   d.DemandPrior as value,
			   case when d.DemandPrior = 'Срочная, платная' then 1 else 0 end as sort_1
			From DemandsExecTime p left join DemandPriors d on (p.DemandPrior_id = d.DemandPrior_id)
			Where p.DemandType_id = {$parent_parent_parent_id}
			   {$system}
			   {$equip}
			   {$fault}
			   and p.DelDate is null
			Order By sort_1, d.Sort, value";
			

		$query = Yii::app()->db->createCommand($sql);
		return $query->queryAll();
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


	public function getReportGeneral() {

		$select = "Select
					  dbo.FIO(d.MasterName) as MasterName,
					  d.ExecutorsName,
					  d.ServiceType,
					  d.Address,
					  d.Demand_id,
					  d.DemandText,
					  d.DateReg,
					  d.DateExec,
					  d.DemandType,
					  d.DemandPrior,
					  og.ClientName,
					  og.Telephone,
					  d.DateMaster,
					  d.EquipType,
					  d.Malfunction,
					  d.RepMaster,
					  d.Contacts,
					  dbo.get_whour_diff(deadline, isnull(d.DateExec, getdate())) as Overday
					  ";
		$from = "From FullDemands d left join ObjectsGroup og on (og.ObjectGr_id = d.ObjectGr_id) ";

		$request = new CHttpRequest;
		$demands = $request->getParam('d', false);
		$date = $demands['date'];
		unset($demands['date']);

		$where_filter=null;
		if($demands) {
			foreach ($demands as $key => $value) {
				$value != null ? $where_filter .= "and ( {$key} = {$value}  ) " : '';

			}
			//$where .= ")";
		}

		if($date) {
			$where = "Where (dbo.truncdate(d.DateReg) between dbo.truncdate('{$date['begin']}') and dbo.truncdate(convert(datetime,'{$date['end']}',130) + 1) {$where_filter} )";
		}


		if(!$demands && !$date) {
			return false;
		}

		$query = Yii::app()->db->createCommand($select.$from.$where);
		return $query->queryAll();

	}

	public function getHouse($id=null) {
		if($id == null) {
			$where = "Where Street_id is null";
		}
		else $where = "Where Street_id = {$id}";
		$sql = "SELECT house as id, house as value From FullDemands ";
		$order = " Order By house asc";
		$group = " Group By house";
		$query = Yii::app()->db->createCommand($sql.$where.$group.$order);
		return $query->queryAll();
	}

	static function getReportGeneralDetails($id) {
		$sql = "Select
				  r.DateCreate,
				  r.plandateexec,
				  dbo.FIO(e.EmployeeName) as EmployeeName,
				  r.report
				From ExecutorReports r left join Employees_ForObj_v e on (r.empl_id = e.Employee_id)
				Where r.DelDate is null
				  and r.demand_id = {$id}
				Order by r.DateCreate desc";

		$query = Yii::app()->db->createCommand($sql);
		//var_dump($query);
		return $query->queryAll();
	}

	static function getAdditionDemand($id) {
		$sql = "Select
				  d.Demand_id,
				  d.ObjectGr_id,
				  d.Object_id,
				  d.Address,
				  d.DateReg,
				  d.DateReg as TimeReg,
				  d.ServiceType,
				  d.Master,
				  d.MasterName,
				  d.DemandType,
				  d.DemandType_id,
				  d.SystemType,
				  d.SystemType_id,
				  d.EquipType,
				  d.EquipType_id,
				  d.Malfunction,
				  d.Malfunction_id,
				  d.DemandPrior,
				  d.DemandPrior_id,
				  d.Contacts,
				  d.CloseReason,
				  d.DelayedClosureReason_id,
				  d.Note,
				  d.Deadline,
				  d.Deadline as TimeDeadline,
				  d.AgreeDate,
				  d.AgreeDate as AgreeTime,
				  d.DateOfTransfer,
				  d.DateOfTransfer as TimeOfTransfer,
				  d.DemandText,
				  d.TransfReason,
				  d.TransferReason,
				  d.DelayReason,
				 d.dlrs_id,
				  d.DateExec,
				  d.DateMaster,
				  d.Refusers,
				  d.RepMaster,
				  d.DateOfHelpRequest,
				  d.OverDay,
				  d.PlanDateExec,
				  d.ExecOther,
				  d.DemandEt_id,
				  d.ExecutorsName,
				  d.GoCalc,
				  d.WorkExec,
				  d.Ngtv_id,
				  d.Negative,
				  d.Rvrs_id,
				  d.ResolveReason,
				  d.DateContract,
				  d.DateContract as TimeContract,
				  d.CalcSum,
				  d.DateSurvey,
				  d.DateSurvey as TimeSurvey,
				  d.offer,
				  d.competitive,
				  d.initiative,
				  d.clrs_id,
				  d.upg_note,
				  d.date_calc,
				  d.calc_accept,
				  d.CloseReas,
				  d.rslt_id,
				  d.ResultName
				From FullDemands d
				Where d.Demand_id = {$id}";

		$query = Yii::app()->db->createCommand($sql);
		return $query->queryAll();
	}

	static function DemandExec($id, $datetime) {
		$sql = "Update FullDemands Set DateExecute = '{$datetime}' Where Demand_id = {$id}";
		$query = Yii::app()->db->createCommand($sql);
		return $query->queryAll();
	}


	public function getProceessInfo($id) {

		$select = "
		Select
		  ex.exrp_id,
		  ex.demand_id,
		  ex.empl_id,
		  ex.date,
		  ex.report,
		  dbo.FIO_N(ex.empl_id) as EmployeeName,
		  ex.plandateexec,
		  ex.othername,
		  ex.dateexec
		";

		$from = "
		From ExecutorReports ex
		";

		$where = "
		Where ex.DelDate is null and ex.demand_id = {$id}
		";

		$order = "
		Order by ex.exrp_id desc
		";

		$this->Query->setSelect($select);
		$this->Query->setFrom($from);
		$this->Query->setOrder($order);
		$this->Query->setWhere($where);

	}

	public function report() {
		$select = "
		Select *
		";

		$from = "
		From FullDemands
		";

		$where = "
		Where DelDate is null and DateExec is null and dbo.truncdate(DateReg) = dbo.truncdate(getdate()) and DemandType_id = 36 and DemandPrior_id = 1
		";

		$order = "
		Order by Demand_id
		";

		$this->Query->setSelect($select);
		$this->Query->setFrom($from);
		$this->Query->setOrder($order);
		$this->Query->setWhere($where);

		$report['urgent'] = Yii::app()->db->createCommand($this->Query->text)->queryAll();

		$where = "
		Where DelDate is null and DateExec is null and dbo.truncdate(DateReg) = dbo.truncdate(getdate()) and DemandType_id = 36 and DemandPrior_id = 32
		";
		$this->Query->setWhere($where);

		$report['crash'] = Yii::app()->db->createCommand($this->Query->text)->queryAll();
		$report['datecreate'] = date('d-m-Y H:i:s');

		return $report;
	}
        
    public function attributeFilters()
    {
        return array(
            'MasterName' => 'd.Master',
            'DemandType' => 'd.DemandType_id',
            'ExecutorsName' => 'd.OtherName',
        );
        
        
    }
    
    public function attributeSotrs() {
        return array(
            
        );
    }
	
}
