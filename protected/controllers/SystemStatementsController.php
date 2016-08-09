<?php

class SystemStatementsController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';
        public $title = '';
	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			
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
					'ViewSystemStatements',
					'CreateSystemStatements',
					'UpdateSystemStatements',
					
				),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create'),
				'roles'=>array(
					
					'CreateSystemStatements',
					
				),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('update'),
				'roles'=>array(
					
					'UpdateSystemStatements',
					
				),
			),
			/* array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin'),
				'roles'=>array(
					'AdminSystemStatements',
					
					
				),

			), */
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('delete'),
				'roles'=>array(
					
					'DeleteSystemStatements',
										
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
		$model=new SystemStatements;

		if(isset($_POST['SystemStatements']))
		{
			$model->attributes=$_POST['SystemStatements'];
                        $model->EmplCreate = Yii::app()->user->Employee_id;
			if ($model->validate()) {
                            if($model->insert())
                                    $this->redirect(Yii::app()->createUrl('SystemStatements/Index'));
                        }
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
	public function actionUpdate($SystemStatements_id)
	{
            $model=new SystemStatements;
            $model->getModelPk($SystemStatements_id);
            
            if(isset($_POST['SystemStatements']))
            {
                
                $model->attributes=$_POST['SystemStatements'];
                $model->EmplChange = Yii::app()->user->Employee_id;
                
                if ($model->validate()) {
                    $model->update();
                    $this->redirect(Yii::app()->createUrl('SystemStatements/Index'));
                }
            }

            $this->render('update',array(
                    'model'=>$model,
            )); 
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete()
	{
            if(isset($_POST['SystemStatements_id'])) {
                $SystemStatements_id = $_POST['SystemStatements_id'];
            }
            $model=new SystemStatements;
            $model->getModelPk($SystemStatements_id);
            $model->EmplDel = Yii::app()->user->Employee_id;
            
            if(!is_null($SystemStatements_id)){
                $model->delete();
            }
            
            $this->redirect($this->createUrl('SystemStatements/Index'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
            $model=new SystemStatements('search');
            $model->unsetAttributes();  // clear any default values
            if(isset($_GET['SystemStatements']))
                    $model->attributes=$_GET['SystemStatements'];

            $this->title = 'Сложность системы';
            $this->render('index',array(
                    'model'=>$model,
            ));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new SystemStatements('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['SystemStatements']))
			$model->attributes=$_GET['SystemStatements'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return SystemStatements the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=SystemStatements::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param SystemStatements $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='SystemStatements-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
