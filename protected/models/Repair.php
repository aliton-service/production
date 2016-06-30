<?php

class Repair extends MainFormModel {
	const TYPE_REPAIR_SRM = 1; // ремонт в срм
	const TYPE_REPAIR_PRC_SIMPLE = 2; // ремонт в прц (простой)
	const TYPE_REPAIR_PRC_SALARY = 3; // ремонт в прц с учетом времязатратности и оклада мастера за час работы
	const TYPE_REPAIR_PRC_RETURN = 4; // ремонт с возвратом
	const TYPE_REPAIR_PRC_NOT_RETURN = 5; // ремонт без возврата

	const DAYS_REPEAT_REPAIR = 30;
	const DOC_TYPE_FROM_SD = 4;
	const PRICE_MARKUP = 1.3;

	/**
	 * Table (view) Repairs_v
	 */
	public $Repr_id = null;
	public $status = null;
	public $status_name = null;
	public $number = null;
	public $date = null;
	public $date_create = null;
	public $action = null;
	public $EquipName = null;
	public $Addr = null;
	public $date_ready = null;
	public $date_exec = null;
	public $date_accept = null;
	public $RepairPrior = null;
	public $deadline = null;
	public $mstr_empl_id = null;
	public $mstr_empl_name = null;
	public $egnr_empl_id = null;
	public $egnr_empl_name = null;
	public $defect = null;
	public $SN = null;
	//public $user_create = null;
	public $EmplCreate = null;
	public $EmplChange = null;
	public $reg_empl_name = null;
	public $overday = null;
	public $date_plan = null;
	public $wrnt = null;
	public $splr_id = null;
	public $delayreason = null;
	public $resultname = null;
	public $date_undo = null;
	public $undo_empl_name = null;
	public $reason_name = null;
	public $Territ_Name = null;

	/**
	 * Table Repairs
	 */

	public $objc_id = null;
	public $prtp_id = null;
	public $eqip_id = null;
	public $used = null;
	public $docm_quant = null;
	public $return = null;
	public $repair_pay = null;
	public $work_ok = null;
	public $best_date = null;
	public $reg_empl_id = null;
	public $cur_empl_id = null;
	public $dmnd_id = null;
	public $edefect = null;
	public $set = null;
	public $jrdc_id = null;
	public $note = null;
	public $ExecHour = null;
	public $eresult = null;
	public $rslt_id = null;
	public $act_def_num = null;
	public $act_def_date = null;
	public $date_fact = null;
	public $sopr_num = null;
	public $sopr_date = null;
	public $empl_from = null;
	public $pay_diagnostics = null;
	public $sum_diagnostics;
	public $sum_repairs = null;
	public $contactface = null;
	public $dlrs_id = null;
	public $Repr_repeat_id = null;
	public $Tmp_equip_replace = null;
	public $so_id = null;
	public $blank_correct = null;
	public $um_name = null;
	public $EquipState_id = null;

	///////
	public $mstr_id = null;
	public $engnr_id = null;

	function __construct($scenario='') {
		parent::__construct($scenario);

		$this->SP_INSERT_NAME = 'INSERT_Repairs';
		$this->SP_UPDATE_NAME = 'UPDATE_Repairs';
		$this->SP_DELETE_NAME = 'DELETE_Repairs';

		$request = new CHttpRequest;
		$top = $request->getParam('top',200);
		$top == null ? $top=200 : '';
		$data = $request->getParam('d', false);

		$status = $request->getParam('status',false);

		$select = "SELECT
					  r.Repr_id,
					  r.status,
					  r.status_name,
					  r.number,
					  r.date,
					  r.date_create,
					  r.action,
					  r.eqip_id,
					  r.EquipName,
					  r.Addr,
					  r.date_ready,
					  r.date_exec,
					  r.date_accept,
					  r.RepairPrior,
					  r.deadline,
					  r.mstr_empl_id,
					  r.mstr_empl_name,
					  r.egnr_empl_id,
					  r.egnr_empl_name,
					  r.defect,
					  r.SN,
					  r.user_create,
					  r.reg_empl_name,
					  r.um_name,
					  r.[Return],
					  r.overday,
					  r.date_plan,
					  r.wrnt,
					  rd.splr_id,
					  r.delayreason,
					  r.resultname,
					  r.date_undo,
					  r.undo_empl_name,
					  r.reason_name,
					  r.Territ_Name,
					  r.Territ_Id,
					  r.objc_id
				";

		$from = "From Repairs_v r left join RepairDocuments rd on (r.rpdoc_id = rd.rpdoc_id and rd.deldate is null)
				";

//		if(isset($data['id']) && $data['id'] != null){
//			$this->Query->AddWhere("r.Repr_id='{$data['id']}'");
//		}
//		else {
//			if (isset($data['date']['fixday']) && $data['date']['fixday'] != null) {
//				$this->Query->AddWhere("r.date<=convert(datetime,'{$data['date']['fixday']} 23:59:59',103)");
//				$this->Query->AddWhere("r.date>=convert(datetime,'{$data['date']['fixday']} 0:00:00',103)");
//			} else {
//				if (isset($data['date']['begin']) && $data['date']['begin'] != 	null) {
//					$this->Query->AddWhere("r.date>=convert(datetime,'{$data['date']['begin']} 0:00:00',103)");
//				}
//				if (isset($data['date']['end']) && $data['date']['end'] != null) {
//					$this->Query->AddWhere("r.date<=convert(datetime,'{$data['date']['end']} 23:59:59',103)");
//				}
//			}
//
//			if (isset($data['addr']) && $data['addr'] != null) {
//				$this->Query->AddWhere("r.Addr = '{$data['addr']}'");
//			}
//
//			if (isset($data['master']) && $data['master'] != null) {
//				$this->Query->AddWhere("r.mstr_empl_id = {$data['master']}");
//			}
//
//			if (isset($data['egnr']) && $data['egnr'] != null) {
//				$this->Query->AddWhere("r.egnr_empl_id = {$data['egnr']}");
//			}
//
//			if ($status) {
//				if(isset($status['noaccept'])) {
//					$this->Query->AddWhere("r.date_accept is null");
//				}
//				if(isset($status['nocomplete'])) {
//					$this->Query->AddWhere("r.date_ready is null");
//				}
//				if(isset($status['return'])) {
//					$this->Query->AddWhere("r.[return] = 1");
//				}
//				if(isset($status['noreturn'])) {
//					$this->Query->AddWhere("r.[return] <> 1");
//				}
//			}
//		}

		$this->Query->setSelect($select);
		$this->Query->setFrom($from);

		$this->KeyFiled = 'r.Repr_id';
		$this->PrimaryKey = 'Repr_id';

	}


	public function tableName()
	{
		return 'Repairs_v';
	}

	public function rules(){
		return array(
			array('Repr_id,status,objc_id,set,docm_quant,status_name,number,date,date_create,action,EquipName,Addr,date_ready,date_exec,date_accept,RepairPrior,deadline,mstr_empl_id,mstr_empl_name,egnr_empl_id,egnr_empl_name,defect,SN,user_create,reg_empl_name,overday,date_plan,wrnt,splr_id,delayreason,resultname,note,um_name,edefect,EquipState_id,ExecHour,work_ok,blank_correct,used,return,date_undo,date_fact,rslt_id,eresult,undo_empl_name,reason_name','safe'),
		);
	}

	public function attributeLabels(){
		return array(
			'Repr_id' => 'Repr_id',
			'status' => 'status',
			'status_name' => 'Статус',
			'number' => 'number',
			'date' => 'Дата прихода об-ния',
			'date_create' => 'Дата создания',
			'action' => 'action',
			'EquipName' => 'Оборудование',
			'Addr' => 'Addr',
			'date_ready' => 'date_ready',
			'date_exec' => 'date_exec',
			'date_accept' => 'date_accept',
			'RepairPrior' => 'Приоритет',
			'deadline' => 'Предельная дата',
			'mstr_empl_id' => 'mstr_empl_id',
			'mstr_empl_name' => 'Сдал в ремонт',
			'egnr_empl_id' => 'egnr_empl_id',
			'egnr_empl_name' => 'Инженер ПРЦ',
			'defect' => 'Неисправность',
			'SN' => 'Серийный номер',
			'user_create' => 'user_create',
			'reg_empl_name' => 'reg_empl_name',
			'overday' => 'overday',
			'date_plan' => 'Запланированная дата',
			'wrnt' => 'wrnt',
			'splr_id' => 'splr_id',
			'delayreason' => 'delayreason',
			'resultname' => 'resultname',
			'date_undo' => 'date_undo',
			'undo_empl_name' => 'undo_empl_name',
			'reason_name' => 'reason_name',
			'Repr_repeat_id' => 'Причина повторного ремонта',
			'Tmp_equip_replace' => 'Установлено исправное оборудование на время ремонта',
			'EquipState_id' => 'Состояние оборудование',
			'EmplCreate' => 'Зарегистрировал',
			'prtp_id' => 'Приоритет',
		);
	}

	public function getProcessInfo($id) {
		$sql = "Select
				  rc.rpcm_id,
				  rc.repr_id,
				  rc.date as date,
				  e.EmployeeName as empl,
				  rc.[auto],
				  rc.comment as msg
				 -- case when rc.[user] = 'SQL' then 'SQL' else dbo.FIO(e.EmployeeName) end EmplName
				From RepairComments rc left join Employees_ForObj_v e on rc.[user] = e.Employee_id
				Where rc.repr_id = :id
				Order by rc.rpcm_id desc";

		$query = Yii::app()->db->CreateCommand($sql);
		$query->bindParam(':id', $id);

		return $query->queryAll();
	}

	public function getMaterialsInfo($id) {
		$sql = "declare @prlt_id int

				select @prlt_id = dbo.get_price_list(getdate())

				Select
				  dt.rpdt_id,
				  dt.repr_id,
				  dt.eqip_id,
				  e.EquipName as name,
				  m.NameUnitMeasurement ed,
				  dt.docm_quant as need,
				  dt.fact_quant as available,
				  dt.docm_quant*p.price_low as sum
				From RepairDetails dt inner join Equips e on (dt.Eqip_id = e.Equip_id)
				  left join UnitMeasurement m on (e.UnitMeasurement_id = m.UnitMeasurement_id)
				  left join PriceListDetails_v p on (p.prlt_id = @prlt_id and p.eqip_id = dt.eqip_id)
				Where dt.DelDate is Null
				  and dt.repr_id = :id
				";
		$query->bindParam(':id', $id);
		$query = Yii::app()->db->CreateCommand($sql);
		return $query->queryAll();
	}

	public function getDocumentsInfo($id) {
		$sql = "select
					d.keyfield,
					d.docid,
					d.doctype_id,
					d.doctype as type,
					d.number,
					d.datereg as date,
					d.dateexec as date_exec,
					d.note,
					d.[status]
				from get_documents_repair(:id) d
				 ";

		$query = Yii::app()->db->CreateCommand($sql);
		$query->bindParam(':id', $id);

		return $query->queryAll();
	}

	public function getInfoEquipSN($sn) {
		$sql = "SELECT sn.*, dad.date_create, ah.*, sup.*, wh.* "
			."From SerialNumbers sn "
			."Inner Join DocmAchsDetails dad On sn.dadt_id = dad.dadt_id "
			."Inner Join ActionHistory ah On dad.achs_id = ah.achs_id "
			."Inner Join WHDocuments wh On wh.achs_id = ah.achs_id "
			."Inner Join Suppliers sup On wh.splr_id = sup.Supplier_Id "
			."Where sn.SN = :sn";

		$query = Yii::app()->db->CreateCommand($sql);
		$query->bindParam(':sn', $sn);
		return $query->queryAll();
	}


	public function getEquipPrice($id) {
		$sql = "SELECT TOP 1 [price_low]
				  FROM [PriceListDetails_v]
				  where [eqip_id] = :id
				  order by [prlt_id] desc";
		$query = Yii::app()->db->CreateCommand($sql);
		$query->bindParam(':id', $id);
		return $query->queryScalar();
	}

	public function isEstimate($id) {
		$sql = "SELECT calc_id
				FROM CostCalculations
				WHERE (type = 1 or type = 2) AND repr_id = :id";

		$query = Yii::app()->db->CreateCommand($sql);
		$query->bindParam(':id', $id);
		return count($query->queryAll()) > 0
			? true : false;
	}


	public function getNodeptEquipMaster($empl_id, $equip_id) {
		$sql = "

declare @prlt_id int

set @prlt_id = dbo.get_price_list(getdate())


select MasterName,
       EquipName,
       NameUnitMeasurement,
       /*quant_start,
       quant_used_start,*/
       quant_to,
       quant_used_to,
       quant_from,
       quant_used_from,
       quant_out,
       quant_used_out,
       /*quant_start +*/ quant_to - quant_from - quant_out quant_end,
      /* quant_used_start + */quant_used_to - quant_used_from - quant_used_out quant_used_end,
       case when ((left(EquipName, 7) <>'Брелок ') and (left(EquipName, 5) <>'Ключ ') and (left(EquipName, 6) <>'Ключи ') and (left(EquipName, 7) <>'Трубка '))
            then price
            else null end price,
       case when (((/*quant_start + */quant_to - quant_from - quant_out)*(IsNull(price, 0)) + (/*quant_used_start +*/ quant_used_to - quant_used_from - quant_used_out)*(IsNull(price, 0)) >= 0) and (left(EquipName, 7) <>'Брелок ') and (left(EquipName, 5) <>'Ключ ') and (left(EquipName, 6) <>'Ключи ') and (left(EquipName, 7) <>'Трубка '))
            then (/*quant_start + */quant_to - quant_from - quant_out)*(IsNull(price, 0)) + (/*quant_used_start + */quant_used_to - quant_used_from - quant_used_out)*(IsNull(price, 0))
            else null end sum
from(
select MasterName,
       Equip_id,
       EquipName,
       NameUnitMeasurement,

       sum(quant_to) quant_to,
       sum(quant_used_to) quant_used_to,
       sum(quant_from) quant_from,
       sum(quant_used_from) quant_used_from,
       sum(quant_out) quant_out,
       sum(quant_used_out) quant_used_out,
       p.Price_Low Price
from(
select
      emp.Employee_id,
      dbo.FIO(emp.EmployeeName) MasterName,
      e.Equip_id,
      e.EquipName,
      um.NameUnitMeasurement,
      0 as quant_to,
      0 as quant_used_to,
      case when dt.used = 0 then isNull(dt.fact_quant, dt.docm_quant) else 0 end quant_from,
      case when dt.used = 1 then isNull(dt.fact_quant, dt.docm_quant) else 0 end quant_used_from,
      0 as quant_out,
      0 as quant_used_out
from
     ActionHistory ah inner join WHDocuments d on (d.achs_id = ah.achs_id)
     inner join DocmAchsDetails dt on (d.docm_id = dt.docm_id)
     inner join Employees_ForObj_v emp on (ah.mstr_id = emp.Employee_id)
     inner join Equips e on (dt.eqip_id = e.equip_id)
     left join UnitMeasurement um on (e.UnitMeasurement_id = um.UnitMeasurement_id)

where
    d.dctp_id = 2
    and dt.deldate is null
union all
select
      emp.Employee_id,
      dbo.FIO(emp.EmployeeName) MasterName,
      e.Equip_id,
      e.EquipName,
      um.NameUnitMeasurement,
      case when dt.used = 0 then isNull(dt.fact_quant, dt.docm_quant) else 0 end quant_to,
      case when dt.used = 1 then isNull(dt.fact_quant, dt.docm_quant) else 0 end quant_used_to,
      0 quant_from,
      0 quant_used_from,
      0 as quant_out,
      0 as quant_used_out

from
     ActionHistory ah inner join WHDocuments d on (d.achs_id = ah.achs_id)
     inner join DocmAchsDetails dt on (d.docm_id = dt.docm_id)
     inner join Employees_ForObj_v emp on (d.dmnd_empl_id = emp.Employee_id)
     inner join Equips e on (dt.eqip_id = e.equip_id)
     left join UnitMeasurement um on (e.UnitMeasurement_id = um.UnitMeasurement_id)

where
    d.dctp_id = 4
    and dt.deldate is null
union all
select
      emp.Employee_id,
      dbo.FIO(emp.EmployeeName) MasterName,
      dt.Eqip_id Equip_id,
      dt.EquipName,
      dt.NameUnitMeasurement,
      0 quant_to,
      0 quant_used_to,
      0 quant_from,
      0 quant_used_from,
      case when dt.used = 0 then dt.quant else 0 end quant_out,
      case when dt.used = 1 then dt.quant else 0 end quant_used_out

from
     ActionHistory ah inner join WHActs_v d on (d.achs_id = ah.achs_id)
     inner join ActEquips_v dt on (d.docm_id = dt.docm_id)
     inner join Employees_ForObj_v emp on (d.dmnd_empl_id = emp.Employee_id)
union all
select
      emp.Employee_id,
      dbo.FIO(emp.EmployeeName) MasterName,
      e.Equip_id,
      e.EquipName,
      um.NameUnitMeasurement,
      0 quant_to,
      0 quant_used_to,
      0 quant_from,
      0 quant_used_from,
      0 quant_out,
      0 quant_used_out


from Inventories i inner join InventoryDetails id on (i.invn_id = id.invn_id)
     inner join Employees emp on (i.mstr_id = emp.Employee_id)
     inner join Equips e on (id.eqip_id = e.equip_id)
     left join UnitMeasurement um on (e.UnitMeasurement_id = um.UnitMeasurement_id)
where (quant > 0 or id.quant_used > 0)
) t left join PriceListDetails_v p on (t.Equip_id = p.Eqip_id and p.prlt_id = @prlt_id)
where
 t.Employee_id = :master   and t.Equip_id = :equip

group by Employee_id,
       MasterName,
       Equip_id,
       EquipName,
       NameUnitMeasurement,
       Price_Low

) t2
where /*quant_start <> 0 or */
      quant_to <> 0 or
      quant_from <> 0 or
      quant_out <> 0 or
     /* quant_used_start <> 0 or */
      quant_used_to <> 0 or
      quant_used_from <> 0 or
      quant_used_out <> 0
order by MasterName, EquipName

		";

		$query = Yii::app()->db->CreateCommand($sql);
		$query->bindParam(':master', $empl_id);
		$query->bindParam(':equip', $equip_id);
		return count($query->queryAll()) > 0
			? true : false;

	}

	// new repair
	public function checkRepeatRepair($sn,$objc_id) {
		$sql = "Select
					(Select top 1 datediff(d, dbo.truncdate(r.date_exec), getdate()) as d
					From Repairs r
					Where r.sn = :sn
					Order by r.date_exec Desc) as equip,
					(Select top 1 datediff(d, dbo.truncdate(r.date_exec), getdate()) as d
					From Repairs r
					Where r.objc_id = :objc_id
					Order by r.date_exec Desc) as object";
		$days = Yii::app()->db->createCommand($sql)
								->bindParam(':sn', $sn)
								->bindParam(':objc_id', $objc_id)
								->queryRow();

		$repeat = array('equip'=>false, 'object'=>false);
		if(!$days) {
			if($days['equip'] != null && $days['equip']<=self::DAYS_REPEAT_REPAIR){
				$repeat['equip'] = true;
			}

			if($days['object'] != null && $days['object']<=self::DAYS_REPEAT_REPAIR) {
				$repeat['object'] = true;
			}
		}

		return $repeat;
	}


	public function getCountEquip($equip_id) {
		$sql = "Select Top 1 id.quant
				From InventoryDetails id
				Where eqip_id = :equip_id
				Order By id.date Desc";
		return Yii::app()->db->createCommand($sql)
								->bindParam(':equip_id', $equip_id)
								->queryScalar();
	}


	public function getServiceDept($objgr) {
		$sql = "select Territ_Name

				from Contracts_v
				where ObjectGr_id = :objgr
				and DocType_id = " .self::DOC_TYPE_FROM_SD ."
				and getdate() >= ContrSDateStart
				and getdate() <= ContrSDateEnd";

		return Yii::app()->db->createCommand($sql)
								->bindParam(':objgr', $objgr)
								->queryScalar();
	}

	public function checkWarranty($sn) {
//		$sql = " select warranty = case
//						when datediff(d, wh.date, getdate()) <= 30 then 'внутренняя гарантия'
//						else 'нет гарантии'
//					end
//				 from WHDocuments wh
//				 left join Repairs r
//				 on wh.achs_id = r.achs_id
//				 where r.sn = :sn";

		$sql = "select warranty = case
				 when (select top 1 datediff(d, wh.date, getdate())
					 from WHDocuments wh
					 left join Repairs r
					 on wh.achs_id = r.achs_id
					 where r.sn = :sn1
					 order by wh.date desc) <= 30
				 then 'внутренняя гарантия'

				 when (select top 1 datediff(d, wh.date, getdate())
					 from WHDocuments wh
					 left join DocmAchsDetails ad
					 on wh.achs_id = ad.achs_id
					 left join SerialNumbers sn
					 on sn.dadt_id = ad.dadt_id
					 where sn.sn = :sn2
					 order by wh.date desc) <= 365
				 then 'внешнаяя гарантия'

					else 'нет гарантии'
					end";

		return Yii::app()->db->createCommand($sql)
								->bindParam(':sn1', $sn)
								->bindParam(':sn2', $sn)
								->queryScalar();
	}


	public function getSumRepairDetails($id = false) {
		if($id && $id > 0) {
			$this->Repr_id = $id;
		}

		if(!$this->Repr_id > 0) {
			return 0;
		}

		$details = new RepairDetails();
		$sum = 0;
		$details->setRepair($this->Repr_id);
		foreach($details->Query->queryAll() as $detail) {
			$sum += $detail['summa'];
		}

		return $sum;
	}


	public function getEquipLastPrice($equip_id = false) {
		if($equip_id) {
			$this->eqip_id = $equip_id;
		}

		if(!$this->eqip_id > 0) {
			return 0;
		}

	}


	public function profitabilityRepair($type= false) {
		if(!$type || !(int)$type > 0) {
			$type = $this->getTypeRepair();
		}
		switch($type) {
			case self::TYPE_REPAIR_SRM:
				$profitability = ($this->PriceSRM * $this::PRICE_MARKUP / $this->getEquipPrice($this->eqip_id))
				* 100  >= 49 ? false : true;

				break;
			case self::TYPE_REPAIR_PRC_SIMPLE:
				$profitability = ($this->getSumRepairDetails() / $this->getEquipPrice($this->eqip_id)) * 100 >= 49 ? false : true;
				break;
			case self::TYPE_REPAIR_PRC_SALARY:
				$profitability = (($this->getSumRepairDetails() + (Employees::getSalaryPerHour($this->egnr_empl_id) * $this->ExecHour))
													/ $this->getEquipPrice($this->eqip_id)) * 100 >= 49 ? false : true;
				break;
			case self::TYPE_REPAIR_PRC_RETURN:
			case self::TYPE_REPAIR_PRC_NOT_RETURN:
				$profitability = (($this->getSumRepairDetails() + (Employees::getSalaryPerHour($this->egnr_empl_id) * $this->ExecHour))
												/ $this->getEquipLastPrice($this->eqip_id)) * 100 >= 49 ? false : true;
				break;
			default:
				$profitability = false;
				break;
		}

		return $profitability;
	}


	public function getTypeRepair() {
		if(!$this->status || !(int)$this->status > 0) {
			return 0;
		}
	}



	public function getRepairChangeHistory() {
		$select = "
		Select
		  0 Sort,
		  0 Audit_id,
		  '' ActionUser,
		  'Текущее состояние' Action_audit,
		  Null ActionDate,
		  r.Action,
		  case when r.Action < 0 then 'Транзит'
			   when r.Action = 0 then 'Диагностика'
			   when r.Action = 1 then 'Ремонт в ПРЦ'
			   when r.Action = 2 then 'Ремонт в СРМ'
			   when r.Action = 3 then 'Неремонтопригодно'
			   when r.Action = 4 then 'Оборудование исправно' end ActionName,
		  r.Rslt_id, rslt.ResultName,
		  r.Repr_id,
		  r.zate,
		  r.Number,
		  r.Used,
		  r.[Return], r.Repair_pay, r.Wrnt,  r.Work_ok,
		  r.Date_accept as DateAccept, dbo.FIO(e.EmployeeName) UserAccept,
		  r.Date_ready as DateReady, dbo.FIO(e2.EmployeeName) UserReady,
		  r.Date_agree as DateAgree, dbo.FIO(e3.EmployeeName) UserAgree,
		  r.Best_date, r.Deadline, r.Dmnd_id, r.Defect, r.EDefect, r.Note,
		  r.SN, r.[Set], r.Act_def_num, r.Sopr_num, r.Act_def_date, r.Sopr_date,
		  r.Date_plan, r.Date_fact, r.EResult, r.pay_diagnostics, r.Sum_diagnostics,
		  r.Sum_repairs, r.ContactFace, r.DelDate, eq.EquipName,
		  r.Mstr_empl_id, r.Egnr_empl_id
		";
		$from = "
		From Repairs r left join Employees_ForObj_v e on (r.user_accept = e.alias or r.user_accept = e.remotealias)
		  left join Employees_ForObj_v e2 on (r.user_ready = e2.alias or r.user_ready = e2.remotealias)
		  left join Employees_ForObj_v e3 on (r.user_agree = e3.alias or r.user_agree = e3.remotealias)
		  left join RepairResults rslt on (r.rslt_id = rslt.rslt_id)
		  inner join Equips eq on (r.Eqip_id = eq.Equip_id)
		Where r.Repr_id = :Repr_id1
		Union All
		Select
		  1 Sort,
		  r.Audit_id,
		  dbo.FIO(e4.EmployeeName) as ActionUser,
		  case when r.Action_audit = 'U' then 'Изменение'
			   when r.Action_audit = 'D' then 'Удаление'
		  end Action_audit,
		  r.ActionDate,
		  r.Action,
		  case when r.Action < 0 then 'Транзит'
			   when r.Action = 0 then 'Диагностика'
			   when r.Action = 1 then 'Ремонт в Прц'
			   when r.Action = 2 then 'Ремонт в СРМ'
			   when r.Action = 3 then 'Неремонтопригодно'
			   when r.Action = 4 then 'Оборудование исправно' end ActionName,
		  r.Rslt_id, rslt.ResultName,
		  r.Repr_id,
		  r.Date,
		  r.Number,
		  r.Used,
		  r.[Return], r.Repair_pay, r.Wrnt,  r.Work_ok,
		  r.Date_accept as DateAccept, dbo.FIO(e.EmployeeName) UserAccept,
		  r.Date_ready as DateReady, dbo.FIO(e2.EmployeeName) UserReady,
		  r.Date_agree as DateAgree, dbo.FIO(e3.EmployeeName) UserAgree,
		  r.Best_date, r.Deadline, r.Dmnd_id, r.Defect, r.EDefect, r.Note,
		  r.SN, r.[Set], r.Act_def_num, r.Sopr_num, r.Act_def_date, r.Sopr_date,
		  r.Date_plan, r.Date_fact, r.EResult, r.pay_diagnostics, r.Sum_diagnostics,
		  r.Sum_repairs, r.ContactFace, r.DelDate, eq.EquipName,
		  r.Mstr_empl_id, r.Egnr_empl_id
		From Repairs_audit r left join Employees_ForObj_v e on (r.user_accept = e.alias or r.user_accept = e.remotealias)
		  left join Employees_ForObj_v e2 on (r.user_ready = e2.alias or r.user_ready = e2.remotealias)
		  left join Employees_ForObj_v e3 on (r.user_agree = e3.alias or r.user_agree = e3.remotealias)
		  left join Employees_ForObj_v e4 on (r.ActionUser = e4.alias or r.ActionUser = e4.remotealias)
		  left join RepairResults rslt on (r.rslt_id = rslt.rslt_id)
		  inner join Equips eq on (r.Eqip_id = eq.Equip_id)
		";
		$where = "";
		$order = " Order by Sort, Audit_id desc ";

		$this->Query->setSelect($select);
		$this->Query->setFrom($from);
		$this->Query->setWhere($where);
		$this->Query->setOrder($order);
	}

}

