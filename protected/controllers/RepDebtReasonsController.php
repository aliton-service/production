<?php
/**
 * Created by PhpStorm.
 * User: meg
 * Date: 22.01.2016
 * Time: 11:07
 */

class RepDebtReasonsController extends Controller
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
				'actions' => array('index', 'view', 'equipAnalog'),
				'roles' => array(
					'ViewRepDebtReasons',
				),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions' => array('create'),
				'roles' => array(
					'CreateRepDebtReasons',
				),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions' => array('update'),
				'roles' => array(
					'UpdateRepDebtReasons',
				),
			),

			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions' => array('delete'),
				'roles' => array(
					'DeleteRepDebtReasons',
				),

			),
			array('deny',  // deny all users
				'users' => array('*'),
			),
		);
	}



	public function actionCreate()
	{
		$model = new RepDebtReasons;

		if (isset($_POST['RepDebtReasons'])) {
			$model->attributes = $_POST['RepDebtReasons'];
			$model->EmplCreate = Yii::app()->user->Employee_id;
			if ($model->validate()) {
				$model->insert();
				if ($this->isAjax()) {
					die(json_encode(array('status' => 'ok', 'data' => array('msg' => 'Запись о причине долга успешно создана'))));
				} else {
					$this->redirect('/?r=RepDebtReasons');
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
		$model = new RepDebtReasons;
		if ($id == null)
			throw new CHttpException(404, 'Не выбран сотрудник.');

//		if (!Yii::app()->LockManager->LockRecord('RepDebtReasons', $model->tableSchema->primaryKey, $id))
//			throw new CHttpException(404, 'Запись заблокирована другим пользователем');

		if($id && (int)$id > 0 && isset($_POST['RepDebtReasons'])) {
			$model->attributes = $_POST['RepDebtReasons'];
			$model->rpdr_id = (int)$id;
			$model->EmplChange = Yii::app()->user->Employee_id;
			if ($model->validate()) {
				$model->update();
				if ($this->isAjax()) {
					die(json_encode(array('status' => 'ok', 'data' => array('msg' => 'Запись о причине долга успешно изменена'))));
				} else {

					$this->redirect('/?r=RepDebtReasons');
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

		$model = new RepDebtReasons;
		$model->rpdr_id = $id;
		$model->EmplDel = Yii::app()->user->Employee_id;
		$model->delete();
		if($this->isAjax()) {
			die(json_encode(array('status'=>'ok','data'=>array('msg'=>'Запись о долга успешно удалена'))));
		}
		else {
			$this->redirect('/?r=RepDebtReasons');
		}

	}

	public function actionIndex()
	{
		$this->render('index');

	}

	protected function performAjaxValidation($model)
	{
		if (isset($_POST['ajax']) && $_POST['ajax'] === 'RepDebtReasons-form') {
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}



}

