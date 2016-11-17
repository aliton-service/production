<?php

class BanksController extends Controller
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
				'actions'=>array('index','view', 'Find'),
				'roles'=>array(
					'ViewBanks',

				),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create'),
				'roles'=>array(
					
					'CreateBanks',
					
				),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('update'),
				'roles'=>array(
					
					'UpdateBanks',
					
				),
			),

			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('delete'),
				'roles'=>array(
					
					'DeleteBanks',
										
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
            $model = new Banks();
            $ObjectResult = array(
                    'result' => 0,
                    'id' => 0,
                    'html' => '',
                );
            if (isset($_POST['Banks'])) {
                $model->attributes = $_POST['Banks'];
                if ($model->validate()) {
                    $Res = $model->Insert();
                    $ObjectResult['result'] = 1;
                    $ObjectResult['id'] = $Res['Bank_id'];
                    echo json_encode($ObjectResult);
                    return;
                } 
            }

            $ObjectResult['html'] = $this->renderPartial('_form', array(
                'model' => $model,
            ), true);
            echo json_encode($ObjectResult);
	}


	public function actionUpdate()
	{
            $model = new Banks();
            $ObjectResult = array(
                    'result' => 0,
                    'id' => 0,
                    'html' => '',
                );
            if (isset($_POST['Bank_id']))
                $model->getModelPk($_POST['Bank_id']);

            if (isset($_POST['Banks'])) {
                $model->getModelPk($_POST['Banks']['Bank_id']);
                $model->attributes = $_POST['Banks'];
                if ($model->validate()) {
                    $model->Update();
                    $ObjectResult['result'] = 1;
                    $ObjectResult['id'] = $model->Bank_id;
                    echo json_encode($ObjectResult);
                    return;
                }
            }

            $ObjectResult['html'] = $this->renderPartial('_form', array(
                'model' => $model,
            ), true);
            echo json_encode($ObjectResult);
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete()
	{
            $ObjectResult = array(
                'result' => 0,
                'id' => 0,
                'html' => '',
            );

            if (isset($_POST['Bank_id'])) {
                $model = new Banks();
                $model->getModelPk($_POST['Bank_id']);
                
                    $model->delete();
                    $ObjectResult['result'] = 1;
                    $ObjectResult['id'] = $model->Bank_id;
                    echo json_encode($ObjectResult);
                    return;
                
            }
            echo json_encode($ObjectResult);
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$this->title = 'Реестр банков';
		$this->render('index');

	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Banks('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Banks']))
			$model->attributes=$_GET['Banks'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Banks the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Banks::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Banks $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='banks-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
        
    public function actionFind() {
        $ObjectResult = array(
            'result' => 0,
            'id' => 0,
            'html' => '',
        );
        
        $ObjectResult['html'] = $this->renderPartial('_find', array(
                
            ), true);
        
        echo json_encode($ObjectResult);
    }
}
