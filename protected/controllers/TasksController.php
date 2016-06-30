<?php

class TasksController extends Controller
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
				'actions' => array('index', 'view', 'uploadFile', 'Cancel'),
				'roles' => array(
					'ViewTasks',

				),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions' => array('create'),
				'roles' => array(

					'CreateTasks',

				),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions' => array('update'),
				'roles' => array(

					'UpdateTasks',

				),
			),
		
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions' => array('delete'),
				'roles' => array(

					'DeleteTasks',

				),

			),
			array('deny',  // deny all users
				'users' => array('*'),
			),
		);
	}
	

	public function actionCreate()
	{
		$model = new Tasks;

		if (isset($_POST['Tasks'])) {
			$model->attributes = $_POST['Tasks'];
			$model->EmplCreate = Yii::app()->user->Employee_id;
			if ($model->validate()) {
				$model->insert();
				if ($this->isAjax()) {
					die(json_encode(array('status' => 'ok', 'data' => array('msg' => 'Запись о оборудовании успешно создана'))));
				} else {
					$this->redirect('/?r=Tasks');
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
		$model = new Tasks;
		if ($id == null)
			throw new CHttpException(404, 'Не выбран сотрудник.');

//		if (!Yii::app()->LockManager->LockRecord('Tasks', $model->tableSchema->primaryKey, $id))
//			throw new CHttpException(404, 'Запись заблокирована другим пользователем');

		if($id && (int)$id > 0 && isset($_POST['Tasks'])) {
			$model->attributes = $_POST['Tasks'];
			$model->Task_id = (int)$id;
			$model->EmplChange = Yii::app()->user->Employee_id;
			if ($model->validate()) {
				$model->update();
				if ($this->isAjax()) {
					die(json_encode(array('status' => 'ok', 'data' => array('msg' => 'Запись о оборудовании успешно изменена'))));
				} else {

					$this->redirect('/?r=Tasks');
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
		$model = new Tasks;
		$model->Task_id = $id;
		$model->EmplDel = Yii::app()->user->Employee_id;
		$model->delete();
		if($this->isAjax()) {
			die(json_encode(array('status'=>'ok','data'=>array('msg'=>'Запись о оборудовании успешно удалена'))));
		}
		else {
			$this->redirect('/?r=Tasks');
		}
	}

	public function actionCancel($id)
	{
		$model = new Tasks;
		if(isset($_POST['Tasks'])) {
			$model->attributes = $_POST['Tasks'];
		}
		$model->Task_id = $id;
		$model->EmplDel = Yii::app()->user->Employee_id;
		$model->callProc('CANCEL_Tasks');
		if($this->isAjax()) {
			die(json_encode(array('status'=>'ok','data'=>array('msg'=>'Запись о оборудовании успешно удалена'))));
		}
		else {
			$this->redirect('/?r=Tasks');
		}
	}

	
	public function actionIndex()
	{
		$this->render('index');
	}


	public function actionView($id) {
		if(!$id > 0) {
			return false;
		}

		$model = new Tasks();
		$model->getModelPk($id);
		$this->render('view', array('model'=>$model));

	}

	
	public function loadModel($id)
	{
		$model = Tasks::model()->findByPk($id);
		if ($model === null)
			throw new CHttpException(404, 'The requested page does not exist.');
		return $model;
	}

	
	protected function performAjaxValidation($model)
	{
		if (isset($_POST['ajax']) && $_POST['ajax'] === 'Tasks-form') {
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

}

