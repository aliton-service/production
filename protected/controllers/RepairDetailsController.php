<?php

class RepairDetailsController extends Controller
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
				'actions' => array('index', 'view', 'equipAnalog', 'clients', 'autoRepairDetails', 'ShowHide'),
				'roles' => array(
					'ViewRepairDetails',

				),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions' => array('create'),
				'roles' => array(

					'CreateRepairDetails',

				),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions' => array('update'),
				'roles' => array(

					'UpdateRepairDetails',

				),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions' => array('delete'),
				'roles' => array(
					'DeleteRepairDetails',
				),

			),
			array('deny',  // deny all users
				'users' => array('*'),
			),
		);
	}



	public function actionCreate()
	{
		$model = new RepairDetails;

		if (isset($_POST['RepairDetails'])) {
			$model->attributes = $_POST['RepairDetails'];
			$model->EmplCreate = Yii::app()->user->Employee_id;
			if ($model->validate()) {
				$model->insert();
				if ($this->isAjax()) {
					die(json_encode(array('status' => 'ok', 'data' => array('msg' => 'Запись о событии успешно создана'))));
				} else {
					$this->redirect('/?r=RepairDetails');
				}
			}
		}
//		if ($this->isAjax()) {
//			$this->renderPartial('create', array('model' => $model), false, true);
//		} else {
//			$this->render('create', array('model' => $model));
//		}


	}

	public function actionUpdate($id)
	{
		$model = new RepairDetails;
		if ($id == null)
			throw new CHttpException(404, 'Не выбран сотрудник.');

//		if (!Yii::app()->LockManager->LockRecord('RepairDetails', $model->tableSchema->primaryKey, $id))
//			throw new CHttpException(404, 'Запись заблокирована другим пользователем');

		if($id && (int)$id > 0 && isset($_POST['RepairDetails'])) {
			$model->getModelPk($id);
			$model->attributes = $_POST['RepairDetails'];
			$model->rpdt_id = (int)$id;
			$model->EmplChange = Yii::app()->user->Employee_id;
			if ($model->validate()) {
				$model->update();
				if ($this->isAjax()) {
					die(json_encode(array('status' => 'ok', 'data' => array('msg' => 'Запись о событии успешно изменена'))));
				} else {

					$this->redirect('/?r=RepairDetails');
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
		$model = new RepairDetails;
		$model->rpdt_id = $id;
		$model->EmplDel = Yii::app()->user->Employee_id;
		$model->delete();
		if($this->isAjax()) {
			die(json_encode(array('status'=>'ok','data'=>array('msg'=>'Запись о событии успешно удалена'))));
		}
		else {
			$this->redirect('/?r=RepairDetails');
		}

	}

	public function actionIndex($repr_id)
	{
		if($this->isAjax()) {
			$this->renderPartial('index', array('repr_id' => $repr_id), false, true);
		} else {
			$this->render('index', array('repr_id' => $repr_id));
		}
	}

	public function actionView($id) {
		$model = new RepairDetails();
		$model->getModelPk($id);
		$this->render('view', array('model'=>$model));
	}



}

