<?php

class TaskExecutorsController extends Controller
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
				'actions' => array('index', 'view'),
				'roles' => array(
					'ViewTaskExecutors',

				),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions' => array('create'),
				'roles' => array(

					'CreateTaskExecutors',

				),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions' => array('update'),
				'roles' => array(

					'UpdateTaskExecutors',

				),
			),

			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions' => array('delete'),
				'roles' => array(

					'DeleteTaskExecutors',

				),

			),
			array('deny',  // deny all users
				'users' => array('*'),
			),
		);
	}


	public function actionCreate()
	{
		$model = new TaskExecutors;

		if (isset($_POST['TaskExecutors'])) {
			$model->attributes = $_POST['TaskExecutors'];
			$model->EmplCreate = Yii::app()->user->Employee_id;
			if ($model->validate()) {
				$model->insert();
				if ($this->isAjax()) {
					die(json_encode(array('status' => 'ok', 'data' => array('msg' => '«апись о оборудовании успешно создана'))));
				} else {
					$this->redirect('/?r=TaskExecutors');
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
		$model = new TaskExecutors;
		if ($id == null)
			throw new CHttpException(404, 'Ќе выбран сотрудник.');

//		if (!Yii::app()->LockManager->LockRecord('TaskExecutors', $model->tableSchema->primaryKey, $id))
//			throw new CHttpException(404, '«апись заблокирована другим пользователем');

		$model->getModelPk($id);
		if($id && (int)$id > 0 && isset($_POST['TaskExecutors'])) {
			$model->attributes = $_POST['TaskExecutors'];
			$model->Tasknote_id = (int)$id;
			$model->EmplChange = Yii::app()->user->Employee_id;
			if ($model->validate()) {
				$model->update();
				if ($this->isAjax()) {
					die(json_encode(array('status' => 'ok', 'data' => array('msg' => '«апись о оборудовании успешно изменена'))));
				} else {

					$this->redirect('/?r=TaskExecutors');
				}
			}
		}
		if($this->isAjax()) {
			$this->renderPartial('update', array('model'=>$model), false, true);
		} else {
			$this->render('update', array('model'=>$model));
		}
	}


	public function actionDelete($id)
	{
		$model = new TaskExecutors;
		$model->Taskexecutor_Id = $id;
		$model->EmplDel = Yii::app()->user->Employee_id;
		$model->delete();
		if($this->isAjax()) {
			die(json_encode(array('status'=>'ok','data'=>array('msg'=>'«апись о оборудовании успешно удалена'))));
		}
		else {
			$this->redirect('/?r=TaskExecutors');
		}
	}


	public function actionIndex($id)
	{
		if(!$id > 0) {
			return false;
		}
		if($this->isAjax()) {
			$this->renderPartial('index', array('id' => $id), false, true);
		}
		else {
			$this->render('index', array('id' => $id));
		}

	}


	public function loadModel($id)
	{
		$model = TaskExecutors::model()->findByPk($id);
		if ($model === null)
			throw new CHttpException(404, 'The requested page does not exist.');
		return $model;
	}


	protected function performAjaxValidation($model)
	{
		if (isset($_POST['ajax']) && $_POST['ajax'] === 'TaskExecutors-form') {
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

}

