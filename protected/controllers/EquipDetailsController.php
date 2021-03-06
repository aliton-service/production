<?php

class EquipDetailsController extends Controller
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
					'ViewEquipDetails',
					'CreateEquipDetails',
					'UpdateEquipDetails',
					
				),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create'),
				'roles'=>array(
					
					'CreateEquipDetails',
					
				),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('update'),
				'roles'=>array(
					
					'UpdateEquipDetails',
					
				),
			),
			/* array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin'),
				'roles'=>array(
					'AdminEquipDetails',
					
					
				),

			), */
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('delete'),
				'roles'=>array(
					
					'DeleteEquipDetails',
										
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
		$model=new EquipDetails;

		if (isset($_POST['EquipDetails'])) {
			$model->attributes = $_POST['EquipDetails'];
			$model->EmplCreate = Yii::app()->user->Employee_id;
			if ($model->validate()) {
				$model->insert();
				if ($this->isAjax()) {
					die(json_encode(array('status' => 'ok', 'data' => array('msg' => 'Запись об аналоге оборудовании успешно создана'))));
				} else {
					$this->redirect('/?r=EquipDetails');
				}
			}
		}
		if ($this->isAjax()) {
			$this->renderPartial('create', array('model' => $model), false, true);
		} else {
			$this->render('create', array('model' => $model));
		}

		// Uncomment the following line if AJAX validation is needed
//		$this->performAjaxValidation($model);
//
//		if(isset($_POST['EquipDetails']))
//		{
//			$model->attributes=$_POST['EquipDetails'];
//			$model->DateCreate = date('m.d.y H:i:s');
//			$model->DateChange = date('m.d.y H:i:s');
//			if($model->save())
//				$this->redirect(array('view','id'=>$model->eqdt_id));
//		}
//
//		$this->render('create',array(
//			'model'=>$model,
//		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
	$model=new EquipDetails;

		if ($id == null)
			throw new CHttpException(404, 'Не выбран сотрудник.');

//		if (!Yii::app()->LockManager->LockRecord('Equips', $model->tableSchema->primaryKey, $id))
//			throw new CHttpException(404, 'Запись заблокирована другим пользователем');

		if($id && (int)$id > 0 && isset($_POST['EquipDetails'])) {
			$model->attributes = $_POST['EquipDetails'];
			$model->eqdt_id = (int)$id;
			$model->EmplChange = Yii::app()->user->Employee_id;
			if ($model->validate()) {
				$model->update();
				if ($this->isAjax()) {
					die(json_encode(array('status' => 'ok', 'data' => array('msg' => 'Запись об аналоге оборудовании успешно изменена'))));
				} else {

					$this->redirect('/?r=EquipDetails');
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

//		 if ($id == null)
//                        throw new CHttpException(404, 'Не выбран сотрудник.');
//
//
//                $model=$this->loadModel($id);
//
//
//                if (!Yii::app()->LockManager->LockRecord('EquipDetails', $model->tableSchema->primaryKey, $id))
//                    throw new CHttpException(404, 'Запись заблокирована другим пользователем');
//
//		// Uncomment the following line if AJAX validation is needed
//		$this->performAjaxValidation($model);
//
//		if(isset($_POST['EquipDetails']))
//		{
//			$model->attributes=$_POST['EquipDetails'];
//			$model->DateChange = date('m.d.y H:i:s');
//			if($model->save())
//				$this->redirect(array('view','id'=>$model->eqdt_id));
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

		$model=new EquipDetails;

		$model->eqdt_id = $id;
		$model->EmplDel = Yii::app()->user->Employee_id;
		$model->delete();
		if($this->isAjax()) {
			die(json_encode(array('status'=>'ok','data'=>array('msg'=>'Запись об аналоге оборудовании успешно удалена'))));
		}
		else {
			$this->redirect('/?r=Equips');
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

//		$model=new EquipDetails('search');
//		$model->unsetAttributes();  // clear any default values
//		if(isset($_GET['EquipDetails']))
//			$model->attributes=$_GET['EquipDetails'];
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
		$model=new EquipDetails('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['EquipDetails']))
			$model->attributes=$_GET['EquipDetails'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return EquipDetails the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=EquipDetails::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param EquipDetails $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='equip-details-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
