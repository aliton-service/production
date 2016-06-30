<?php

class RepairCommentsController extends Controller
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
					'ViewRepairComments',

				),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions' => array('create'),
				'roles' => array(

					'CreateRepairComments',

				),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions' => array('update'),
				'roles' => array(

					'UpdateRepairComments',

				),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions' => array('delete'),
				'roles' => array(
					'DeleteRepairComments',
				),

			),
			array('deny',  // deny all users
				'users' => array('*'),
			),
		);
	}



	public function actionCreate()
	{
		$model = new RepairComments;

		if (isset($_POST['RepairComments'])) {
			$model->attributes = $_POST['RepairComments'];
			$model->EmplCreate = Yii::app()->user->Employee_id;
			if ($model->validate()) {
				$model->insert();
				if ($this->isAjax()) {
					die(json_encode(array('status' => 'ok', 'data' => array('msg' => 'Запись о событии успешно создана'))));
				} else {
					$this->redirect('/?r=RepairComments');
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
		$model = new RepairComments;
		if ($id == null)
			throw new CHttpException(404, 'Не выбран сотрудник.');

//		if (!Yii::app()->LockManager->LockRecord('RepairComments', $model->tableSchema->primaryKey, $id))
//			throw new CHttpException(404, 'Запись заблокирована другим пользователем');

		if($id && (int)$id > 0 && isset($_POST['RepairComments'])) {
			$model->getModelPk($id);
			$model->attributes = $_POST['RepairComments'];
			$model->rpcm_id = (int)$id;
			$model->EmplChange = Yii::app()->user->Employee_id;
			if ($model->validate()) {
				$model->update();
				if ($this->isAjax()) {
					die(json_encode(array('status' => 'ok', 'data' => array('msg' => 'Запись о событии успешно изменена'))));
				} else {

					$this->redirect('/?r=RepairComments');
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
		$model = new RepairComments;
		$model->rpcm_id = $id;
		$model->EmplDel = Yii::app()->user->Employee_id;
		$model->delete();
		if($this->isAjax()) {
			die(json_encode(array('status'=>'ok','data'=>array('msg'=>'Запись о событии успешно удалена'))));
		}
		else {
			$this->redirect('/?r=RepairComments');
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
		$model = new RepairComments();
		$model->getModelPk($id);
		$this->render('view', array('model'=>$model));
	}



}

