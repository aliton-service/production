<?php

class DemandResultsController extends Controller
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
					'ViewDemandResults',
					'CreateDemandResults',
					'UpdateDemandResults',
					
				),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create'),
				'roles'=>array(
					
					'CreateDemandResults',
					
				),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('update'),
				'roles'=>array(
					
					'UpdateDemandResults',
					
				),
			),
			/* array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin'),
				'roles'=>array(
					'AdminDemandResults',
					
					
				),

			), */
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('delete'),
				'roles'=>array(
					
					'DeleteDemandResults',
										
				),

			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
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
		$model=new DemandResults;

		// Uncomment the following line if AJAX validation is needed
		$this->performAjaxValidation($model);

		if(isset($_POST['DemandResults']))
		{
			$model->attributes=$_POST['DemandResults'];
			$model->DateCreate = date('m.d.y H:i:s');
			$model->DateChange = date('m.d.y H:i:s');
			if($model->save())
				$this->redirect(array('view','id'=>$model->Result_id));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
	$model=new DemandResults;
		 if ($id == null)
                        throw new CHttpException(404, 'Не выбран сотрудник.');
                
                
                $model=$this->loadModel($id);
            
                
                if (!Yii::app()->LockManager->LockRecord('DemandResults', $model->tableSchema->primaryKey, $id))
                    throw new CHttpException(404, 'Запись заблокирована другим пользователем');

		// Uncomment the following line if AJAX validation is needed
		$this->performAjaxValidation($model);

		if(isset($_POST['DemandResults']))
		{
			$model->attributes=$_POST['DemandResults'];
			$model->DateChange = date('m.d.y H:i:s');
			if($model->save())
				$this->redirect(array('view','id'=>$model->Result_id));
		}

		$this->render('update',array(
			'model'=>$model,
                        'locktime'=>Yii::app()->LockManager->getLockTime($model->tableName()),
                        'id'=>$id,
		)); 
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		//$this->loadModel($id)->delete();

		$model=new DemandResults;
		
		$model->deleteCount($id, Yii::app()->user->Employee_id);

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$model=new DemandResults('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['DemandResults']))
			$model->attributes=$_GET['DemandResults'];

		$this->render('index',array(
			'model'=>$model,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new DemandResults('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['DemandResults']))
			$model->attributes=$_GET['DemandResults'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return DemandResults the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=DemandResults::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param DemandResults $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='demand-results-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
