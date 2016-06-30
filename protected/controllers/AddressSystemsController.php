<?php

class AddressSystemsController extends Controller
{
    public $layout='//layouts/column2';
    public $title = '';
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
				'roles'=>array('ViewAddressSystems'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create'),
				'roles'=>array('CreateAddressSystems'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('update'),
				'roles'=>array('UpdateAddressSystems'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('delete'),
				'roles'=>array('DeleteAddressSystems'),
                        ),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	public function actionCreate()
	{
            $this->title = 'Создать адрес';
            
                $model=new AddressSystems;

		if (isset($_POST['AddressSystems'])) {
			$model->attributes = $_POST['AddressSystems'];
			$model->EmplCreate = Yii::app()->user->Employee_id;
			if ($model->validate()) {
				$model->insert();
				if ($this->isAjax()) {
					die(json_encode(array('status' => 'ok', 'data' => array('msg' => 'Запись о адресной системе успешно создана'))));
				} else {
					$this->redirect('/?r=AddressSystems');
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
//		if(isset($_POST['AddressSystems']))
//		{
//			$model->attributes=$_POST['AddressSystems'];
//			$model->DateCreate = date('m.d.y H:i:s');
//			$model->DateChange = date('m.d.y H:i:s');
//			if($model->save())
//				$this->redirect(array('view','id'=>$model->AddressSystem_id));
//		}
//
//		$this->render('create',array(
//			'model'=>$model,
//		));
	}

	
	public function actionUpdate($id)
	{
            $this->title = 'Изменить Адрес';
            
            $model=new AddressSystems;
		 if ($id == null)
                        throw new CHttpException(404, 'Не выбран сотрудник.');
                
//
//                $model=$this->loadModel($id);
//
//
//                if (!Yii::app()->LockManager->LockRecord('AddressSystems', $model->tableSchema->primaryKey, $id))
//                    throw new CHttpException(404, 'Запись заблокирована другим пользователем');

		if($id && (int)$id > 0 && isset($_POST['AddressSystems'])) {
			$model->attributes = $_POST['AddressSystems'];
			$model->AddressSystem_id = (int)$id;
			$model->EmplChange = Yii::app()->user->Employee_id;
			
                        if ($model->validate())
                        {
                            $model->update();
                            if($this->isAjax()) {
                                    die(json_encode(array('status'=>'ok','data'=>array('msg'=>'Запись о адресной системе успешно изменена'))));
                            }
                            else {
                                    $this->redirect('/?r=AddressSystems');
                            }
                        }
		}
		$model->getModelPk($id);
		if($this->isAjax()) {
			$this->renderPartial('update', array('model'=>$model), false, true);
		} else {
			$this->render('update', array('model'=>$model));
		}


		// Uncomment the following line if AJAX validation is needed
//		$this->performAjaxValidation($model);
//
//		if(isset($_POST['AddressSystems']))
//		{
//			$model->attributes=$_POST['AddressSystems'];
//			$model->DateChange = date('m.d.y H:i:s');
//			if($model->save())
//				$this->redirect(array('view','id'=>$model->AddressSystem_id));
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

		$model=new AddressSystems;
		$model->AddressSystem_id = $id;
		$model->EmplDel = Yii::app()->user->Employee_id;
		$model->delete();
		if($this->isAjax()) {
			die(json_encode(array('status'=>'ok','data'=>array('msg'=>'Запись о адресной системе успешно удалена'))));
		}
		else {
			$this->redirect('/?r=AddressSystems');
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
            $this->title = 'Просмотр адресов';
            $this->render('index');
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new AddressSystems('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['AddressSystems']))
			$model->attributes=$_GET['AddressSystems'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return AddressSystems the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=AddressSystems::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param AddressSystems $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='address-systems-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
