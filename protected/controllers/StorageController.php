<?php
class StorageController extends Controller
{
	public $layout = '//layouts/column2';
	public $defaultAction = 'index';


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

	public function actionIndex() {
		//$model = new WHDocuments();
		$this->render('index');
	}

	public function actionCreate($view = false) {

		$model = new WHDocuments;

		if(isset($_POST['WHDocuments'])) {
			$model->setProp($_POST['WHDocuments']);
			$model->EmplCreate = Yii::app()->user->Employee_id;

			if($action = $model->getAction('insert', $view))
				$this->redirect(array('view','id'=>$id['repr_id']));
		}

//		$this->render('create');
		//$model = new WHDocuments;

		$this->render('create', array('view'=>'view/'.$view, 'model'=>$model));
	}

	public function actionUpdate($view = false, $id = false) {
		if(!$view) {
			throw new CHttpException(404, 'представление не найдено');
		}

		if(!$id) {
			throw new CHttpException(404, 'запись не выбран');
		}

		if(isset($_POST['WHDocuments'])) {
			$model = new WHDocuments;
			$model->setProp($_POST['WHDocuments']);
			$model->EmplCreate = Yii::app()->user->Employee_id;

			if($action = $model->getAction('update', $view))
				$this->redirect(array('view','id'=>$id['repr_id']));
		}

		$model = $this->setAdditionPage(true, $id, $view);

		$this->renderPartial('update', array('view'=>'view/'.$view, 'model'=>$model), false, true);
	}

	public function actionDelete() {
		if(!isset($_POST['id']) || (int)$_POST['id'] == 0) {
			throw new CHttpException(500, 'Не выбрана запись');
		}

		$model = new WHDocuments();
		$model->docm_id = $_POST['id'];
		$model->delete();
		echo json_encode(array('status_msg' => 'Запись удалена'));
	}

	public function actionView($id=false) {
		//$model = new WHDocuments();
		$this->render('view', array('id'=>$id));
	}

	public function actionDocAll($view = false, $id = false) {
		$this->setAdditionPage($view, $id, 'docAll');
	}

	public function actionRequireGrant($view = false, $id = false) {
		$this->setAdditionPage($view, $id, 'requireGrant');
	}

	public function actionBillComing($view = false, $id = false) {
		$this->setAdditionPage($view, $id, 'billComing');
	}

	public function actionBillReturn($view = false, $id = false) {
		$this->setAdditionPage($view, $id, 'billReturn');
	}

	public function actionBillReturnDistrib($view = false, $id = false) {
		$this->setAdditionPage($view, $id, 'billReturnDistrib');
	}

	public function actionBillReturnMaster($view = false, $id = false) {
		$this->setAdditionPage($view, $id, 'billReturnMaster');
	}

	public function actionmovePRC($view = false, $id = false) {
		$this->setAdditionPage($view, $id, 'movePRC');
	}

	public function actionmoveStorage($view = false, $id = false) {
		$this->setAdditionPage($view, $id, 'moveStorage');
	}

	private function setAdditionPage($view, $id, $action) {
		!self::isAjax() ? die() : '';
		$model = new WHDocuments;
		if (!$view) {
			$this->renderPartial($action, array(), false, true);
			return false;
		}

		//!$id ? die('Запись не выбрана!') : '';
		!$action ? die('Не выбран тип документа!') : '';

		if ($id){
			$model->getAdditionData($id);
			$model->getmodelPk($id);
		}

		return $model;

		//$this->renderPartial('view/'.$action, array('model'=>$model), false, true);
	}

	public function actionCreateEquipHistory($ajax = false) {

		if(isset($_POST['Storage'])) {
			$model = new Storage;
			$model->setProp($_POST['Storage']);
			$model->callProc("INSERT_DocmAchsDetails");
		}
		if($ajax) {
			$this->renderPartial('createEquipHistory', array(), false, true);
		}
		$this->render('createEquipHistory');
	}

	public function actionUpdateEquipHistory($id, $ajax = false) {
		$model = new Storage();
		if(isset($_POST['Storage'])) {
			$model->setProp($_POST['Storage']);
			$model->callProc("UPDATE_DocmAchsDetails");
		}

		$model->getModelPk($id);
		if($ajax) {
			$this->renderPartial('updateEquipHistory', array('model'=>$model), false, true);
		}
		$this->render('updateEquipHistory', array('model'=>$model));
	}

	public function actionAvailableEquip($id) {
		$model = new Storages;
		$data = $model->getAvailableEquip($id);

		$this->renderPartial('available', array('data'=>$data));
	}


	public function actionMonitoringDemands() {
		$model = new MonitoringDemands();

		$this->render('monitorDemands');
	}

	public function actionCreateMonitoring() {
		$model = new MonitoringDemands();
		if(isset($_POST['MonitoringDemands'])) {
			$model->attributes = $_POST['MonitoringDemands'];
			$model->insert();
		}
		$this->render('createMonitoring', array('model'=>$model));
	}

	public function actionUpdateMonitoring($id) {
		$model = new MonitoringDemands();
		if(isset($_POST['MonitoringDemands'])) {
			$model->setProp($_POST['MonitoringDemands']);
			$model->update();
		}
		$model->getModelPk($id);
		$this->render('updateMonitoring',array('model'=>$model));
	}

	public function actionAcceptMonitoringDemand($id){
		$model = new MonitoringDemands();
		$model->mndm_id = $id;
		$model->EmplAccept = Yii::app()->user->Employee_id;
		$model->callProc("ACCEPT_MonitoringDemands");

	}

	public function actionUndoAcceptMonitoringDemand($id){
		$model = new MonitoringDemands();
		$model->mndm_id = $id;
		$model->callProc("UNDO_MonitoringDemands");

	}

	public function actionDeleteMonitoringDemand($id){
		$model = new MonitoringDemands();
		$model->mndm_id = $id;
		$model->EmplDel = Yii::app()->user->Employee_id;
		$model->callProc("DELETE_MonitoringDemands");

	}

	public function actionMonitoringPrice(){
		$this->render('monitorPrice');
	}


	public function actionCreatePrice() {
		$model = new PriceMonitoring();
		if(isset($_POST['PriceMonitoring'])) {
			$model->attributes = $_POST['PriceMonitoring'];
			$model->insert();
		}
		$this->render('createPrice', array('model'=>$model));
	}

	public function actionUpdatePrice($id) {

		$model = new PriceMonitoring();

		if(isset($_POST['PriceMonitoring'])) {
			$model->setProp($_POST['PriceMonitoring']);
			$model->update();
		}
		$model->getMonitoringPrice();
		$model->getModelPk($id);
		$this->render('updatePrice',array('model'=>$model));
	}


	public function actionInventories() {
//		$model = new Inventories();
//		$model->getReestrInventories();
//
		$this->render('inventories');
	}

	public function actionCancelConfirm() {
		if(!isset($_POST['id']) || (int)$_POST['id'] == 0) {
			throw new CHttpException(500, 'Не выбрана запись');
		}

		$model = new WHDocuments();
		$model->docm_id = $_POST['id'];
		$model->ConfirmCancel_id = $_POST['ConfirmCancel_id'];
		$model->callProc('ConfirmCancel');
		echo json_encode(array('status_msg' => 'Подтверждение отменено'));
	}

	public function actionViewInventory() {
		$this->render('viewInventory');
	}

	public function actionDeleteInventory() {
		if(!isset($_POST['id']) || (int)$_POST['id'] == 0) {
			throw new CHttpException(500, 'Не выбрана запись');
		}

		$model = new Inventories();
		$model->invn_id = $_POST['id'];
		$model->EmplDel = Yii::app()->user->Employee_id;
		$model->callProc('Clear_InventoryDetails');
		echo json_encode(array('status_msg'=>'Удалено'));
	}

	public function actionUpdateInventory() {
		$model = new Inventories();

		if(isset($_POST['Inventories'])) {
			$model->setProp($_POST['Inventories']);
			$model->EmplChange = Yii::app()->user->Employee_id;
			$model->callProc('UPDATE_WH_InventoryDetails');
		}
	}

	public function actionCloseInventories() {
		$model = new Inventories();

		if(isset($_POST['Inventories'])) {
			$model->setProp($_POST['Inventories']);
			$model->EmplCreate = Yii::app()->user->Employee_id;
			$model->callProc('inventory_close');
		}
	}

	public function actionDeleteInventories() {
		$model = new Inventories();

		if(isset($_POST['Inventories'])) {
			$model->setProp($_POST['Inventories']);
			$model->EmplDel = Yii::app()->user->Employee_id;
			$model->callProc('DELETE_Inventories');
		}
	}

	public function actionCalcInventories() {
		$model = new Inventories();

		if(isset($_POST['Inventories'])) {
			$model->setProp($_POST['Inventories']);
			$model->callProc('calc_wh_inventory');
		}
	}

	public function actionGrantReady() {
		$model = new WHDocuments();

		if(isset($_POST['WHDocuments'])){
			$model->setProp($_POST['WHDocuments']);
			$model->EmplChange = Yii::app()->user->Employee_id;
			$model->callProc('Ready_WHDocuments');
			echo json_encode(array('status_msg'=>'Готово к выдаче'));
		}
	}

	public function actionGrantUndo() {
		$model = new WHDocuments();

		if(isset($_POST['WHDocuments'])){
			$model->setProp($_POST['WHDocuments']);
			$model->EmplChange = Yii::app()->user->Employee_id;
			$model->callProc('UNDO_WHAction');
			echo json_encode(array('status_msg'=>'Готовность отменена'));
		}
	}

	public function actionGrantHistory($docm_id) {
		$this->renderPartial('grantHistory', array('id'=>$docm_id),false, true);
	}


	public function actionGetNote() {
		if(!$_POST['WHDocuments']) {
			throw new CHttpException(500, 'Не определен идентификатор документа');
		}

		echo json_encode(array( 'props' => WHDocuments::getNote($_POST['WHDocuments']['docm_id'])));
	}


}


