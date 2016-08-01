<?php

class TerritoryController extends Controller
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
                        'ViewTerritory',
                    ),
                ),
                array('allow', // allow authenticated user to perform 'create' and 'update' actions
                    'actions'=>array('create'),
                    'roles'=>array(
                        'CreateTerritory',
                    ),
                ),
                array('allow', // allow authenticated user to perform 'create' and 'update' actions
                    'actions'=>array('update'),
                    'roles'=>array(
                        'UpdateTerritory',
                    ),
                ),
                /* array('allow', // allow admin user to perform 'admin' and 'delete' actions
                    'actions'=>array('admin'),
                    'roles'=>array(
                            'AdminTerritory',
                    ),
                ), */
                array('allow', // allow admin user to perform 'admin' and 'delete' actions
                    'actions'=>array('delete'),
                    'roles'=>array(
                        'DeleteTerritory',
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
            $model = new Territory;

            if(isset($_POST['Territory']))
            {
                $model->attributes = $_POST['Territory'];
                $model->EmplChange = Yii::app()->user->Employee_id;
                if($model->insert())
                    $this->redirect(Yii::app()->createUrl('Territory/Index'));
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
	public function actionUpdate($Territ_Id)
	{
            $this->title = 'Редактирование участка';
            $model=new Territory;
            $model->getModelPk($Territ_Id);
            
            if(isset($_POST['Territory']))
            {
                $model->attributes=$_POST['Territory'];
                $model->EmplChange = Yii::app()->user->Employee_id;
                if ($model->validate()) {
                    $model->update();
                    $this->redirect(Yii::app()->createUrl('Territory/Index'));
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
            if(isset($_POST['Territ_Id'])) {
                $Territ_Id = $_POST['Territ_Id'];
            }
            $model=new Territory;
            $model->Territ_Id = $Territ_Id;
            $model->EmplChange = Yii::app()->user->Employee_id;
            
            if(!is_null($Territ_Id)){
                $model->delete();
            }
            
            $this->redirect($this->createUrl('Territory/Index'));
            
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
            $model=new Territory('search');
            $model->unsetAttributes();  // clear any default values
            if(isset($_GET['Territory']))
                $model->attributes=$_GET['Territory'];

            $this->title = 'Просмотр участков';
            $this->render('index',array(
                    'model'=>$model,
            ));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
            $model=new Territory('search');
            $model->unsetAttributes();  // clear any default values
            if(isset($_GET['Territory']))
                $model->attributes=$_GET['Territory'];
            
            $this->render('admin',array(
                'model'=>$model,
            ));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Territory the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
            $model=Territory::model()->findByPk($id);
            if($model===null)
                throw new CHttpException(404,'The requested page does not exist.');
            return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Territory $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
            if(isset($_POST['ajax']) && $_POST['ajax']==='territory-form')
            {
                echo CActiveForm::validate($model);
                Yii::app()->end();
            }
	}
}
