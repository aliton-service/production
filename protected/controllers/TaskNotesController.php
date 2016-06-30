<?php

class TaskNotesController extends Controller
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
				'actions' => array('index', 'view', 'SendTaskNotes'),
				'roles' => array(
					'ViewTaskNotes',

				),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions' => array('create'),
				'roles' => array(

					'CreateTaskNotes',

				),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions' => array('update'),
				'roles' => array(

					'UpdateTaskNotes',

				),
			),

			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions' => array('delete'),
				'roles' => array(

					'DeleteTaskNotes',

				),

			),
			array('deny',  // deny all users
				'users' => array('*'),
			),
		);
	}


	public function actionCreate($task_id)
	{
		$model = new TaskNotes;

		if (isset($_POST['TaskNotes'])) {
			$model->attributes = $_POST['TaskNotes'];
			$model->EmplCreate = Yii::app()->user->Employee_id;
			$model->Task_id = $task_id;
			if ($model->validate()) {
				$model->insert();
				if ($this->isAjax()) {
					die(json_encode(array('status' => 'ok', 'data' => array('msg' => '«апись о оборудовании успешно создана'))));
				} else {
					$this->redirect('/?r=TaskNotes');
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
		$model = new TaskNotes;
		if ($id == null)
			throw new CHttpException(404, 'Ќе выбрана запись.');

//		if (!Yii::app()->LockManager->LockRecord('TaskNotes', $model->tableSchema->primaryKey, $id))
//			throw new CHttpException(404, '«апись заблокирована другим пользователем');

		$model->getModelPk($id);
		if($id && (int)$id > 0 && isset($_POST['TaskNotes'])) {
			$model->attributes = $_POST['TaskNotes'];
			$model->Tasknote_id = (int)$id;
			$model->EmplChange = Yii::app()->user->Employee_id;
			$model->DateExec = DateTimeManager::YiiDateToAliton(date('Y-m-d H:i:s'));
			if ($model->validate()) {
				$model->update();
				if ($this->isAjax()) {
					die(json_encode(array('status' => 'ok', 'data' => array('msg' => '«апись о оборудовании успешно изменена'))));
				} else {

					$this->redirect('/?r=TaskNotes');
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
		$model = new TaskNotes;
		$model->Tasknote_id = $id;
		$model->EmplDel = Yii::app()->user->Employee_id;
		$model->delete();
		if($this->isAjax()) {
			die(json_encode(array('status'=>'ok','data'=>array('msg'=>'«апись о оборудовании успешно удалена'))));
		}
		else {
			$this->redirect('/?r=TaskNotes');
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


	public function actionSendTaskNotes() {
		if(isset($_POST['TaskNotes'])) {
			$model = new TaskNotes();
			$model->attributes = $_POST['TaskNotes'];
			try {
				$model->callProc('SEND_TaskNotes');
				if($this->isAjax()) {
					die(json_encode(array('status'=>'ok')));
				} else {
					$this->render('index');
				}
			} catch(Exception $e) {
				preg_match('/\[SQL Server\]([\S ]*)The SQL/', $e->getMessage(), $msg);
				if($this->isAjax()) {
					die(json_encode(array('status' => 'error', 'data' => array('msg' => $msg[1]))));
				} else {
					$this->render('index');
				}
			}

		} else {
			$this->render('index');
		}
	}


	public function loadModel($id)
	{
		$model = TaskNotes::model()->findByPk($id);
		if ($model === null)
			throw new CHttpException(404, 'The requested page does not exist.');
		return $model;
	}


	protected function performAjaxValidation($model)
	{
		if (isset($_POST['ajax']) && $_POST['ajax'] === 'TaskNotes-form') {
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

}

