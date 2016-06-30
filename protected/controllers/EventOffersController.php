<?php

class EventOffersController extends Controller
{

	public $layout = '//layouts/column2';
	public $title = '';

	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions' => array('index', 'view', 'equipAnalog', 'clients','ObjectOffer','GetObjectOffers', 'GetObjectEvents'),
				'roles' => array(
					'ViewEventOffers',
				),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions' => array('create'),
				'roles' => array(
					'CreateEventOffers',
				),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions' => array('update'),
				'roles' => array(
					'UpdateEventOffers',
				),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions' => array('delete'),
				'roles' => array(
					'DeleteEventOffers',
				),
			),
			array('deny',  // deny all users
				'users' => array('*'),
			),
		);
	}



	public function actionCreate()
	{
		$model = new EventOffers;

		if (isset($_POST['EventOffers'])) {
			$model->attributes = $_POST['EventOffers'];
			$model->EmplCreate = Yii::app()->user->Employee_id;
			if ($model->validate()) {
				$model->insert();
				if ($this->isAjax()) {
					die(json_encode(array('status' => 'ok', 'data' => array('msg' => 'Запись о оборудовании успешно создана'))));
				} else {
					$this->redirect('/?r=EventOffers');
				}
			}
		}
		if ($this->isAjax()) {
			$this->renderPartial('create', array('model' => $model), false, true);
		} else {
			$this->render('create', array('model' => $model));
		}


	}

	public function actionUpdate($id)
	{
		$model = new EventOffers;
		if ($id == null)
			throw new CHttpException(404, 'Не выбран сотрудник.');

//		if (!Yii::app()->LockManager->LockRecord('EventOffers', $model->tableSchema->primaryKey, $id))
//			throw new CHttpException(404, 'Запись заблокирована другим пользователем');

		if($id && (int)$id > 0 && isset($_POST['EventOffers'])) {
			$model->attributes = $_POST['EventOffers'];
			$model->code = (int)$id;
			$model->EmplChange = Yii::app()->user->Employee_id;
			if ($model->validate()) {
				$model->update();
				if ($this->isAjax()) {
					die(json_encode(array('status' => 'ok', 'data' => array('msg' => 'Запись о оборудовании успешно изменена'))));
				} else {

					$this->redirect('/?r=EventOffers');
				}
			}
		} else {
			$model->getModelPk($id);
		}
		if($this->isAjax()) {
			$this->renderPartial('update', array('model'=>$model), false, true);
		} else {
			$this->render('update', array('model'=>$model));
		}


	}

	public function actionDelete($id)
	{
		$model = new EventOffers;
		$model->code = $id;
		$model->EmplDel = Yii::app()->user->Employee_id;
		$model->delete();
		if($this->isAjax()) {
			die(json_encode(array('status'=>'ok','data'=>array('msg'=>'Запись о оборудовании успешно удалена'))));
		}
		else {
			$this->redirect('/?r=EventOffers');
		}

	}

	public function actionIndex()
	{
		$this->render('index');
	}


	public function actionObjectOffer($objgr_id=false, $group_id=false) {
		if($this->isAjax()) {
			$this->renderPartial('objectoffer', array('objgr_id'=>$objgr_id), false, true);
		} else {
			$this->render('objectoffer', array('objgr_id'=>$objgr_id));
		}
	}

	public function actionGetObjectOffers($objgr_id, $group_id) {
		$model = new EventOffers();
		die(json_encode(array('status'=>'ok', 'data'=>$model->getOfferFromObjCart($objgr_id, $group_id))));
	}

	public function actionGetObjectEvents($objgr_id, $group_id=false) {
		$model = new EventOffers();
		die(json_encode(array('status'=>'ok', 'data'=>$model->getEventsFromObjCart($objgr_id, $group_id))));
	}

}

