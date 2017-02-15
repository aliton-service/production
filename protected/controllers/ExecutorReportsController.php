<?php

class ExecutorReportsController extends Controller
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
					'ViewExecuteReports',
					'CreateExecuteReports',
					'UpdateExecuteReports',
					
				),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create'),
				'roles'=>array(
					
					'CreateExecuteReports',
					
				),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('update'),
				'roles'=>array(
					
					'UpdateExecuteReports',
					
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
					'DeleteExecuteReports',
										
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
            $model=new ExecutorReports;
            if(isset($_POST['ExecutorReports']))
            {
                $model->setProp($_POST['ExecutorReports']);
                $model->empl_id = Yii::app()->user->Employee_id;
                $model->insert();
                echo 0;
                return;
            }
            echo 1;
            return;
	}

	public function actionInsert() {
            $model = new ClientActions();
            $ObjectResult = array(
                    'result' => 0,
                    'id' => 0,
                    'html' => '',
                );
            if (isset($_POST['ClientActions'])) {
                $model->attributes = $_POST['ClientActions'];
                if ($model->validate()) {
                    $Res = $model->Insert();
                    $ObjectResult['result'] = 1;
                    $ObjectResult['id'] = $Res['Exrp_id'];
                    echo json_encode($ObjectResult);
                    return;
                } 
            }

            $ObjectResult['html'] = $this->renderPartial('_form', array(
                'model' => $model,
            ), true);
            echo json_encode($ObjectResult);
        }
        
        
	public function actionUpdate($id)
	{
	$model=new ExecutorReports;
		 if ($id == null)
                        throw new CHttpException(404, 'Не выбран сотрудник.');
                
                
                $model=$this->loadModel($id);
            
                
                if (!Yii::app()->LockManager->LockRecord('ExecutorReports', $model->tableSchema->primaryKey, $id))
                    throw new CHttpException(404, 'Запись заблокирована другим пользователем');

		// Uncomment the following line if AJAX validation is needed
		$this->performAjaxValidation($model);

		if(isset($_POST['ExecutorReports']))
		{
			$model->attributes=$_POST['ExecutorReports'];
			$model->DateChange = date('m.d.y H:i:s');
			if($model->save())
				$this->redirect(array('view','id'=>$model->exrp_id));
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
	public function actionDelete($id = false)
	{
		$model=new ExecutorReports;
		if(isset($_POST['id']) && (int)$_POST['id'] > 0) {
			$model->exrp_id = (int)$_POST['id'];
			$model->delete();
                        echo 0;
                        return;
		}
                
                echo 1;
                return;
                    
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
            $ObjectResult = array(
                'result' => 0,
                'id' => 0,
                'html' => '',
            );
        
            $Form_id = null;
            $Demand_id = null;
            
            $model = new SalesDemand();
            
            if (isset($_POST['Form_id']))
                $Form_id = $_POST['Form_id'];
            if (isset($_POST['Demand_id'])) {
                $Demand_id = $_POST['Demand_id'];
                $model->getModelPk($Demand_id);
            }
            
            $ObjectResult['html'] = $this->renderPartial('index', array(
                    'Form_id' => $Form_id,
                    'Demand_id' => $model->Demand_id,
                    'model' => $model,
                ), true);
            
            echo json_encode($ObjectResult);
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new ExecutorReports('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['ExecutorReports']))
			$model->attributes=$_GET['ExecutorReports'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return ExecutorReports the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=ExecutorReports::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

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
