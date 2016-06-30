<?php
/**
 * Created by PhpStorm.
 * User: meg
 * Date: 21.12.2015
 * Time: 9:34
 */

class PriceMonitoringController extends Controller
{
	public $layout = '//layouts/column2';

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


	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view'),
				'roles'=>array(
					'ViewPriceMonitoring',
					'CreatePriceMonitoring',
					'UpdatePriceMonitoring',

				),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create'),
				'roles'=>array(

					'CreatePriceMonitoring',

				),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('update'),
				'roles'=>array(

					'UpdatePriceMonitoring',

				),
			),

			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('delete'),
				'roles'=>array(

					'DeletePriceMonitoring',

				),

			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}


	public function actionIndex() {
		$this->render('index');
	}

	public function actionCreate() {
		$model = new PriceMonitoring();
		//$this->performAjaxValidation($model);
		if(isset($_POST['PriceMonitoring'])) {
			$model->attributes = $_POST['PriceMonitoring'];
			$model->user = Yii::app()->user->Employee_id;
			if($model->validate()) {
				$model->insert();
				if ($this->isAjax()) {
					die(json_encode(array('status' => 'ok', 'data' => array('msg' => 'Заявка на мониторинг создана'))));
				} else {
					$this->redirect('/?r=priceMonitoring');
				}
			}
		}
		if($this->isAjax()) {
			$this->renderPartial('create', array('model'=>$model), false, true);
		} else {
			$this->render('create', array('model'=>$model));
		}
	}

	public function actionUpdate($id = false) {
		$model = new PriceMonitoring();
		if($id && (int)$id > 0 && isset($_POST['PriceMonitoring'])) {
			$model->attributes = $_POST['PriceMonitoring'];
			$model->mntr_id = (int)$id;
			$model->user = Yii::app()->user->Employee_id;
			$model->update();
			if($this->isAjax()) {
				die(json_encode(array('status'=>'ok','data'=>array('msg'=>'Заявка на мониторинг изменена'))));
			}
			else {
				$this->redirect('/?r=priceMonitoring');
			}
		}
		$model->getModelPk($id);
		if($this->isAjax()) {
			$this->renderPartial('update', array('model'=>$model), false, true);
		} else {
			$this->render('update', array('model'=>$model));
		}
	}

	public function actionDelete() {
		if(isset($_POST['id']) && (int)$_POST['id'] > 0) {
			$model = new PriceMonitoring();
			$model->user = Yii::app()->user->Employee_id;
			$model->mntr_id = $_POST['id'];
			$model->delete();
			die('Удалено');
		}
	}

	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='PriceMonitoring')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}