<?php

class EqipGroupsController extends Controller
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
				'actions'=>array('index','view'),
				'roles'=>array(
					'ViewEqipGroups',
					
				),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create'),
				'roles'=>array(
					
					'CreateEqipGroups',
					
				),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('update'),
				'roles'=>array(
					
					'UpdateEqipGroups',
					
				),
			),
			/* array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin'),
				'roles'=>array(
					'AdminEqipGroups',
					
					
				),

			), */
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('delete'),
				'roles'=>array(
					
					'DeleteEqipGroups',
										
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
		$model=new EqipGroups;

		if (isset($_POST['EqipGroups'])) {
			$model->attributes = $_POST['EqipGroups'];
			$model->EmplCreate = Yii::app()->user->Employee_id;

			if ($model->validate()) {
				$model->insert();

				if ($this->isAjax()) {
					die(json_encode(array('status' => 'ok', 'data' => array('msg' => 'Запись о структурном дереве оборудований успешно создана'))));
				} else {
					$this->redirect('/?r=EqipGroups');
				}
			}
		}
		if ($this->isAjax()) {
			$this->renderPartial('create', array('model' => $model), false, true);
		} else {
			$this->render('create', array('model' => $model));
		}

		


	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
	$model=new EqipGroups;
		 if ($id == null)
                        throw new CHttpException(404, 'Не выбран сотрудник.');
                
                
//                $model=$this->loadModel($id);
//
//
//                if (!Yii::app()->LockManager->LockRecord('EqipGroups', $model->tableSchema->primaryKey, $id))
//                    throw new CHttpException(404, 'Запись заблокирована другим пользователем');

		if($id && (int)$id > 0 && isset($_POST['EqipGroups'])) {
			$model->attributes = $_POST['EqipGroups'];
			$model->group_id = (int)$id;
			$model->EmplChange = Yii::app()->user->Employee_id;
			if ($model->validate()) {
				$model->update();
				if ($this->isAjax()) {
					die(json_encode(array('status' => 'ok', 'data' => array('msg' => 'Запись о структурном дереве оборудований успешно изменена'))));
				} else {
					$this->redirect('/?r=EqipGroups');
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


		// Uncomment the following line if AJAX validation is needed
//		$this->performAjaxValidation($model);
//
//		if(isset($_POST['EqipGroups']))
//		{
//			$model->attributes=$_POST['EqipGroups'];
//			$model->group_id = $id;
//
//			$model->DateChange = date('m.d.y H:i:s');
//
//			$proc = new StoredProc;
//			$proc->ProcedureName = "UPDATE_EqipGroops";
//			$proc->SetStoredProcParams($model);
//			$proc->Execute();

			// if($model->save())
			//	$this->redirect(array('index'));
//		}
//
//		$this->render('update',array(
//			'model'=>$model,
//                        'locktime'=>Yii::app()->LockManager->getLockTime($model->tableName()),
//                        'id'=>$id,
//		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		//$this->loadModel($id)->delete();

		$model=new EqipGroups;
		$model->group_id = $id;
		$model->EmplDel = Yii::app()->user->Employee_id;
		$model->delete();
		if($this->isAjax()) {
			die(json_encode(array('status'=>'ok','data'=>array('msg'=>'Запись о структурном дереве категорий успешно изменена'))));
		}
		else {
			$this->redirect('/?r=eqipGroups');
		}
		
//		$model->deleteCount($id, Yii::app()->user->Employee_id);
//
//		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
//		if(!isset($_GET['ajax']))
//			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$this->render('index');

//		$model=new EqipGroups('search');
//		$model->unsetAttributes();  // clear any default values
//		if(isset($_GET['EqipGroups']))
//			$model->attributes=$_GET['EqipGroups'];
//
//		$this->render('index',array(
//			'model'=>$model,
//		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new EqipGroups('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['EqipGroups']))
			$model->attributes=$_GET['EqipGroups'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return EqipGroups the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=EqipGroups::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param EqipGroups $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='eqip-groups-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
