<?php

class SystemComplexitysController extends Controller
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
					'ViewSystemComplexitys',
					'CreateSystemComplexitys',
					'UpdateSystemComplexitys',
					
				),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create'),
				'roles'=>array(
					
					'CreateSystemComplexitys',
					
				),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('update'),
				'roles'=>array(
					
					'UpdateSystemComplexitys',
					
				),
			),
			/* array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin'),
				'roles'=>array(
					'AdminSystemComplexitys',
					
					
				),

			), */
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('delete'),
				'roles'=>array(
					
					'DeleteSystemComplexitys',
										
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
		$model=new SystemComplexitys;

		if(isset($_POST['SystemComplexitys']))
		{
			$model->attributes=$_POST['SystemComplexitys'];
                        $model->EmplCreate = Yii::app()->user->Employee_id;
			if ($model->validate()) {
                            if($model->insert())
                                    $this->redirect(Yii::app()->createUrl('SystemComplexitys/Index'));
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
	public function actionUpdate($SystemComplexitys_id)
	{
            $model=new SystemComplexitys;
            $model->getModelPk($SystemComplexitys_id);
            
            if(isset($_POST['SystemComplexitys']))
            {
                
                $model->attributes=$_POST['SystemComplexitys'];
                $model->EmplChange = Yii::app()->user->Employee_id;
                
                if ($model->validate()) {
                    $model->update();
                    $this->redirect(Yii::app()->createUrl('SystemComplexitys/Index'));
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
            if(isset($_POST['SystemComplexitys_id'])) {
                $SystemComplexitys_id = $_POST['SystemComplexitys_id'];
            }
            $model=new SystemComplexitys;
            $model->getModelPk($SystemComplexitys_id);
            $model->EmplDel = Yii::app()->user->Employee_id;
            
            if(!is_null($SystemComplexitys_id)){
                $model->delete();
            }
            
            $this->redirect($this->createUrl('SystemComplexitys/Index'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
            $model=new SystemComplexitys('search');
            $model->unsetAttributes();  // clear any default values
            if(isset($_GET['SystemComplexitys']))
                    $model->attributes=$_GET['SystemComplexitys'];

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
		$model=new SystemComplexitys('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['SystemComplexitys']))
			$model->attributes=$_GET['SystemComplexitys'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return SystemComplexitys the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=SystemComplexitys::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param SystemComplexitys $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='SystemComplexitys-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
