<?php

class RepairController extends Controller {
	public $layout='//layouts/column2';
	public $defaultAction  = 'index';
	public $title = '';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view', 'History', 'ProfitabilityRepair', 'EquipPrice', 'ProcessInfo', 'CheckWarranty', 'GetServiceDept', 'DocumentsInfo', 'CheckRepeatRepair', 'MaterialsInfo', 'CartSRM', 'CartPRC', 'CartGeneral', 'Diagnostic', 'RepairPRC', 'RepairSRM', 'EquipInfo', 'EquipInfoSN'),
				'roles'=>array('ViewRepair','CreateRepair','UpdateRepair'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update', 'writeoff', 'RepairRepeat'),
				'roles'=>array('CreateRepair','UpdateRepair'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('Accept','Agree', 'Ready', 'Exec','Noagree', 'UndoDiagnostic'),
				'roles'=>array('UpdateRepair'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'roles'=>array('DeleteRepair'),
			),
			 array('deny',  // deny all users
			 	'users'=>array('*'),
			 ),
		);
	}

	public function actionIndex($ajax=false){
		$this->render('index');
//		$model = new Repair;
//
//		if($ajax) {
//
//			isset($_GET['Repair']) ? $filter = $_GET['Repair'] : '';
//			//var_dump($filter);
//			$model->setFilter($filter);
//		}
//
//		$DataRow = $model->Find(array());
//		// var_dump($DataRow);
//		$Data = $model->filter($DataRow);
//		//var_dump($Data);
//		$DataProvider=new CArrayDataProvider($Data, array(
//			'keyField' => 'Repr_id',
//
//			'pagination' => array(
//				'pageSize' => 15,
//
//			)));
//
//		$this->render('index', array(
//			'model'=>$model,
//			'data'=>$DataProvider,
//		));
	}

	public function actionCreate() {
		$model = new Repair;

		if(isset($_POST['Repair']))
		{
			$model->attributes=$_POST['Repair'];
			// $model->dldm_id = null;

			$model->reg_empl_id = Yii::app()->user->Employee_id;

			if($id = $model->insert())
				$this->redirect(array('view','id'=>$id['repr_id']));
		}

		$this->render('create', array(
				'model'=>$model,
			)
		);
	}

	public function actionUpdate($id, $ajax=false) {
		$model = new Repair;
		$model->getmodelPk($id);
		if(isset($_POST['Repair']))
		{
			$model->attributes=$_POST['Repair'];
			// $model->dldm_id = null;

			//$model->reg_empl_id = Yii::app()->user->Employee_id;
			$model->Repr_id = $id;

//			$model->date = Yii::app()->dateFormatter->formatDateTime($model->date, 'short','short');
			//die($model->date);
			if($model->update()) {
				if ($model->getNodeptEquipMaster($model->mstr_empl_id, $model->eqip_id)) {
					$this->redirect(array('writeoff', 'master'=>$model->mstr_empl_id, 'equip'=>$model->eqip_id, 'repair'=>$model->Repr_id ));
				}
				$this->redirect(array('view', 'id' => $model->Repr_id));
			}
		}



		if($ajax) {
			$this->renderPartial('update', array(
				'model' => $model
			), false, true);
		}
		else {
			$this->render('update', array(
					'model' => $model,
				)
			);
		}
	}

	public function actionView($id) {
		$model = new Repair;
		$model->getModelPk($id);

		$this->render('view', array(
			'model'=>$model,
		));
	}

	public function actionWriteoff($master, $equip, $repair) {

		$this->render('writeoff', array(

		));
	}

	public function actionRepairPRC($id, $ajax=false) {

		$model = new Repair;
		$model->getmodelPk($id);
		if( isset($_POST['Repair'])) {
			$model->attributes=$_POST['Repair'];
			$model->Repr_id = $id;
			var_dump($model);
			if($model->update())
				$this->redirect(array('view','id'=>$model->Repr_id));
		}

		if($ajax) {
			$this->renderPartial('repairPRC', array(
				'model'=>$model
			),false, true);
		}
		else {
			$this->render('repairPRC', array(
				'model' => $model,
			));
		}
	}

	public function actionRepairSRM($id, $ajax=false) {

		$model = new Repair;
		$model->getmodelPk($id);
		if( isset($_POST['Repair'])) {
			$model->attributes=$_POST['Repair'];
			$model->Repr_id = $id;
			if($model->update())
				$this->redirect(array('view','id'=>$model->Repr_id));
		}

		if($ajax) {
			$this->renderPartial('repairSRM', array(
				'model'=>$model
			),false,true);
		}
		else {
			$this->render('repairSRM', array(
				'model' => $model,
			));
		}
	}

	public function actionDiagnostic($id, $ajax=false) {

		$model = new Repair;
		$model->getmodelPk($id);
		if( isset($_POST['Repair'])) {
			$model->attributes=$_POST['Repair'];
			$model->Repr_id = $id;
			if($model->update())
				$this->redirect(array('view','id'=>$model->Repr_id));
		}

		if($ajax) {
			$this->renderPartial('diagnostic', array(
				'model'=>$model
			), false, true);
		}
		else {
			$this->render('diagnostic', array(
				'model' => $model,
			));
		}
	}

	public function actionEquipInfo($id) {
		$model = new Repair;
		$price = $model->getEquipPrice($id);
		$count = $model->getCountEquip($id);

		$this->renderPartial('equipInfo', array(
			'price'=>$price,//$price[0]['price_low'],
			'count'=>$count,
		));
	}

	public function actionEquipInfoSN($sn) {
		$model = new Repair;
		$info = $model->getInfoEquipSN($sn);

		$this->renderPartial('equipInfo', array(
			'info'=>$info
		));
	}

	public function actionProcessInfo($id) {
		$model = new Repair;
		header('Content-Type: application/json');
		echo CJSON::encode($model->getProcessInfo($id));
	}

	public function actionMaterialsInfo($id) {
		$model = new Repair;
		header('Content-Type: application/json');
		echo CJSON::encode($model->getMaterialsInfo($id));
	}

	public function actionDocumentsInfo($id) {
		$model = new Repair;
		header('Content-Type: application/json');
		echo CJSON::encode($model->getDocumentsInfo($id));
	}

	public function actionAutocompleteAddr($term){
		$sql = Yii::app()->db->createCommand("Select Addr as label, Addr as value From Repairs_v Where Addr LIKE '{$term}%' group by Addr ORDER by Addr");
		header('Content-Type: application/json');
		echo CJSON::encode($sql->queryAll());
	}

	public function actionInfoSN($sn) {
		$sql = "SELECT dad.date_create, sup.*, wh.number "
			."From SerialNumbers sn "
			."Inner Join DocmAchsDetails dad On sn.dadt_id = dad.dadt_id "
			."Inner Join ActionHistory ah On dad.achs_id = ah.achs_id "
			."Inner Join WHDocuments wh On wh.achs_id = ah.achs_id "
			."Left Join Suppliers sup On wh.splr_id = sup.Supplier_Id "
			."Where sn.SN = :sn And wh.dctp_id = 1";

		$query = Yii::app()->db->CreateCommand($sql);
		$query->bindParam(':sn', $sn);
		var_dump($query->queryAll());
	}


	/*
	 * Actions change status
	 */

	public function actionAccept($id) {
		$model = new Repair;
		$model->getModelPk($id);
//		$q=$_GET['Repair'];
//		$model->so_id=$q['so_id'];
//		var_dump($model->so_id);
//		if(!$model->update())
//		{
//			//throw new CException('Операция завершилась неудачей');
//		}
//
		$model->mstr_id = $model->mstr_empl_id;
		$model->engnr_id = $model->egnr_empl_id;

		$model->callProc('ACCEPT_Repairs');
	}

	public function actionAgree($id) {
		$model = new Repair;
		$model->getModelPk($id);

		$model->callProc('AGREE_Repairs');
		$this->redirect($_SERVER['HTTP_REFERER']);
	}

	public function actionNoagree($id) {
		$model = new Repair;
		$model->getModelPk($id);

		$model->callProc('NOAGREE_Repairs');
	}

	public function actionReady($id) {
		$model = new Repair;
		$model->getModelPk($id);

		$model->callProc('READY_Repairs');
	}

	public function actionExec($id) {
		$model = new Repair;

		if(!$model->isEstimate($id)) {

		}

		else {
			$model->getModelPk($id);

			$model->callProc('EXEC_Repairs');
		}
	}

	public function actionUndoDiagnostic($id) {
		$model = new Repair;
		$model->getModelPk($id);

		$model->callProc('UNDO_RepairToDiagnostik');
		$this->redirect($_SERVER['HTTP_REFERER']);
	}

	/*
	 * End actions
	 */


//	public function actionRepairRepeat($id, $objc_id) {
//		$sql = "
//			select count(r.repr_id) as count
//			from repairs r
//			where r.deldate is null
//				and r.eqip_id = :id
//				and r.objc_id = :objc_id
//				and r.[return] = 1
//				and dbo.truncdate(r.date_create) between dateadd(mm, -1, dbo.truncdate(getdate())) and  dbo.truncdate(getdate())
//		";
//
//		$query = Yii::app()->db->CreateCommand($sql);
//		$query->bindParam(':id', $id);
//		$query->bindParam(':objc_id', $objc_id);
//
//		echo $query->queryScalar();
//
//	}


	public function checkRepairWaranty($id, $objc_id) {
		$sql = "
			select count(r.repr_id) as count
			from repairs r
			inner join CostCalculations c
			on r.id = c.repr_id
			where r.deldate is null
				and r.eqip_id = :id
				and r.objc_id = :objc_id
				and r.[return] = 1
				and dbo.truncdate(r.date_create) between dateadd(mm, -1, dbo.truncdate(getdate())) and  dbo.truncdate(getdate())
		";

		$query = Yii::app()->db->CreateCommand($sql);
		$query->bindParam(':id', $id);
		$query->bindParam(':objc_id', $objc_id);

		echo $query->queryScalar();

	}

	public function actionMaterials($id) {

	}


	public function actionCartGeneral($id) {
		$model = new Repair();
		$model->getModelPk($id);
		$this->renderPartial('cart/general',array('model' => $model), false, true);
	}


	public function actionCartPRC($id) {
		$model = new Repair();
		$model->getModelPk($id);
		$this->renderPartial('cart/PRC',array('model' => $model), false, true);
	}


	public function actionCartSRM($id) {
		$model = new Repair();
		$model->getModelPk($id);
		$this->renderPartial('cart/SRM',array('model' => $model), false, true);
	}


	public function actionCheckRepeatRepair($sn, $objc_id) {
		$model = new Repair();
		$repeat = $model->checkRepeatRepair($sn, $objc_id);
		die(json_encode(array('status'=>'ok', 'data'=>array('repeatRepair'=>$repeat))));
	}

	public function actionGetServiceDept($objgr) {
		$model = new Repair();
		$sd = $model->getServiceDept($objgr);
		die(json_encode(array('status'=>'ok', 'data'=>array('sd'=>$sd))));
	}

	public function actionCheckWarranty($sn) {
		$model = new Repair();
		$warranty = $model->checkWarranty($sn);
		die(json_encode(array('status'=>'ok', 'data'=>array('warranty'=>$warranty))));
	}
//
//	public function actionCountEquip($equip_id) {
//		$model = new Repair();
//		$count = $model->getCountEquip($equip_id);
//		die(json_encode(array('status'=>'ok', 'data'=>array('equip'=>$count))));
//	}


	public function actionEquipPrice($id) {
		$model = new Repair();
		die(json_encode(array('status'=>'ok','data'=>array('price'=>$model->getEquipPrice($id)))));
	}


	public function actionProfitabilityRepair($id) {
		if(!isset($_GET['calcparam'])) {
			die;
		}

		$model = new Repair();
		$model->getModelPk($id);
		$param = $_GET['calcparam'];
		switch($param['type']) {
			case $model::TYPE_REPAIR_SRM:
				$profitability = ($param['srm']['price'] * $model::PRICE_MARKUP / $model->getEquipPrice($model->eqip_id))
																							* 100  >= 49 ? false : true;

				break;
			case $model::TYPE_REPAIR_PRC_SIMPLE:
				$profitability = ($model->getSumRepairDetails() / $model->getEquipPrice($model->eqip_id)) * 100 >= 49 ? false : true;
				break;
			case $model::TYPE_REPAIR_PRC_SALARY:
				$profitability = (($model->getSumRepairDetails() + (Employees::getSalaryPerHour($model->egnr_empl_id) * $param['prc']['timeForRepair']))
													/ $model->getEquipPrice($model->eqip_id)) * 100 >= 49 ? false : true;
				break;
			case $model::TYPE_REPAIR_PRC_RETURN:
			case $model::TYPE_REPAIR_PRC_NOT_RETURN:
				$profitability = (($model->getSumRepairDetails() + (Employees::getSalaryPerHour($model->egnr_empl_id) * $param['prc']['timeForRepair']))
												/ $model->getEquipLastPrice($model->eqip_id)) * 100 >= 49 ? false : true;
				break;
			default:
				break;
		}

		die();
	}


	public function actionPricePRC($id) {
		$repairDetail = new RepairDetails();
		$repair = new Repair();


	}


	public function actionHistory() {
		if($this->isAjax()) {
			$this->renderPartial('history');
		} else {
			$this->render('history');
		}
	}


	/*
	 * actions documents
	 */

	public function actionKp() {
		$this->render('kp');
	}

	/*
	 * end actions documents
	 */
}