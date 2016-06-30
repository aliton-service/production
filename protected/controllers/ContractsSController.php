<?php
/**
 * Created by PhpStorm.
 * User: meg
 * Date: 19.01.2016
 * Time: 14:11
 */

class ContractsSController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout = '//layouts/column2';
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
				'actions' => array('index', 'view', 'equipAnalog'),
				'roles' => array(
					'ViewContractsS',

				),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions' => array('create'),
				'roles' => array(

					'CreateContractsS',

				),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions' => array('update'),
				'roles' => array(

					'UpdateContractsS',

				),
			),

			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions' => array('delete'),
				'roles' => array(

					'DeleteContractsS',

				),

			),
			array('deny',  // deny all users
				'users' => array('*'),
			),
		);
	}


	public function actionView($id)
	{
		$this->render('view', array(
			'model' => $this->loadModel($id),
		));
	}


	public function actionCreate()
	{
		$model = new ContractsS;

		if (isset($_POST['ContractsS'])) {
			$model->attributes = $_POST['ContractsS'];
			$model->EmplCreate = Yii::app()->user->Employee_id;
			if ($model->validate()) {
				$model->insert();
				if ($this->isAjax()) {
					die(json_encode(array('status' => 'ok', 'data' => array('msg' => '«апись о оборудовании успешно создана'))));
				} else {
					$this->redirect('/?r=ContractsS');
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
		$model = new ContractsS;
		if ($id == null)
			throw new CHttpException(404, 'Ќе выбран сотрудник.');

//		if (!Yii::app()->LockManager->LockRecord('ContractsS', $model->tableSchema->primaryKey, $id))
//			throw new CHttpException(404, '«апись заблокирована другим пользователем');

		if($id && (int)$id > 0 && isset($_POST['ContractsS'])) {
			$model->attributes = $_POST['ContractsS'];
			$model->ContrS_id = (int)$id;
			$model->EmplChange = Yii::app()->user->Employee_id;
			if ($model->validate()) {
				$model->update();
				if ($this->isAjax()) {
					die(json_encode(array('status' => 'ok', 'data' => array('msg' => '«апись о оборудовании успешно изменена'))));
				} else {

					$this->redirect('/?r=ContractsS');
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
		$model = new ContractsS;
		$model->ContrS_id = $id;
		$model->EmplDel = Yii::app()->user->Employee_id;
		$model->delete();
		if($this->isAjax()) {
			die(json_encode(array('status'=>'ok','data'=>array('msg'=>'«апись о оборудовании успешно удалена'))));
		}
		else {
			$this->redirect('/?r=ContractsS');
		}

	}


	public function actionIndex()
	{
		$this->render('index');

	}




}

