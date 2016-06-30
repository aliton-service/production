<?php

class DeliveryDetailsController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

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
				'actions'=>array('index','view'),
				'roles'=>array(
					'ViewDeliveryDetails',
					'CreateDeliveryDetails',
					'UpdateDeliveryDetails',

				),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create'),
				'roles'=>array(

					'CreateDeliveryDetails',

				),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('update'),
				'roles'=>array(

					'UpdateDeliveryDetails',

				),
			),
			/* array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin'),
				'roles'=>array(
					'AdminExecutorReports',


				),

			), */
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('delete'),
				'roles'=>array(

					'DeleteDeliveryDetails',

				),

			),
//			array('deny',  // deny all users
//				'users'=>array('*'),
//			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new DeliveryComments;


		// Uncomment the following line if AJAX validation is needed
		$this->performAjaxValidation($model);

		if(isset($_POST['DeliveryDetails'])) {
			$model->setProp($_POST['DeliveryDetails']);
			$model->EmplCreate = Yii::app()->user->Employee_id;

			$model->insert();
		}

	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
//	public function actionUpdate($id)
//	{
//
//	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
//	public function actionDelete($id)
//	{
//		//$this->loadModel($id)->delete();
//
//		$model=new DeliveryComments();
//
//		$model->deleteCount($id, Yii::app()->user->Employee_id);
//
//		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
//		if(!isset($_GET['ajax']))
//			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
//	}

	/**
	 * Lists all models.
	 */
	public function actionIndex($dldm_id, $id = false)
	{
		$model = new DeliveryDetails;
		if($id !== false) {
			$model->getModelPk($id);
		}
		$this->renderPartial('index',array('model'=>$model,'id'=>$id, 'dldm_id'=>$dldm_id),false,true);
	}

	public function actionEdit($id = false)
	{
		$model = new DeliveryDetails;
		if(!isset($_POST['DeliveryDetails'])) {
			die('Empty Params');
		}
		$model->setProp($_POST['DeliveryDetails']);
		if(!$id) {
			$model->insert();
		}
		else {
			$model->dldt_id = $id;
			$model->quant = (int)$model->quant;
			$model->price = (int)$model->price;
			$model->used == 'true' && $model->used = 1;
			$model->used == 'false' && $model->used = 0;
			$model->update();
		}
	}

	/**
	 * Manages all models.
	 */
//	public function actionAdmin()
//	{
//
//	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return ExecutorReports the loaded model
	 * @throws CHttpException
	 */
//	public function loadModel($id)
//	{
//		$model=DeliveryComments::model()->findByPk($id);
//		if($model===null)
//			throw new CHttpException(404,'The requested page does not exist.');
//		return $model;
//	}

	/**
	 * Performs the AJAX validation.
	 * @param ExecutorReports $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='executor-reports-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
