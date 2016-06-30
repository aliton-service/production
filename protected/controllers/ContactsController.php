<?php

class ContactsController extends Controller
{
    public $layout='//layouts/column2';
    
    public $title = '';
    public $action_url = '';
    
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
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'users'=>array('*'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('*'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	
	public function actionIndex($ObjectGr_id)
	{
            $this->renderPartial('index',array(
                    'ObjectGr_id'=>$ObjectGr_id,
            ), false, true);
	}

	public function actionCreate($ObjectGr_id) {
		$this->title = 'Создание контакта';
                $this->action_url = $this->createUrl('Contacts/create', array('ObjectGr_id' => $ObjectGr_id));
                $model = new Contacts;
                $model->ObjectGr_id = $ObjectGr_id;
                
		if(isset($_POST['Contacts']))
		{
			$model->attributes=$_POST['Contacts'];
			
			$model->cont_id = null;
			$this->performAjaxValidation($model);
                        
                        if ($model->validate())
                        {
                            $model->Insert();
                            $this->redirect(Yii::app()->createUrl('Objectsgroup/index', array('ObjectGr_id' => $model->ObjectGr_id)));
                        }
		}

		$this->render('create',array(
                    'model'=>$model,
                    'ObjectGr_id'=>$ObjectGr_id,
                    ));
	}

	public function actionUpdate($cont_id) {
		$this->title = 'Редактирование контакта';
                $this->action_url = $this->createUrl('Contacts/update', array('cont_id' => $cont_id));
                       
                $model = new Contacts;
                
		if(isset($_POST['Contacts']))
		{
			$model->attributes=$_POST['Contacts'];
			$model->cont_id = $cont_id;
                        
                        $this->performAjaxValidation($model);
                
                        if ($model->validate())
                        {
                            $model->Update();
                            $this->redirect(Yii::app()->createUrl('Objectsgroup/index', array('ObjectGr_id' => $model->ObjectGr_id)));
                        }
			
		}
		$model->getmodelPk($cont_id);
		$model->date = Yii::app()->dateFormatter->formatDateTime($model->date, 'short','short');
		$model->next_date = Yii::app()->dateFormatter->formatDateTime($model->next_date, 'short','short');
		$this->render('update',array(
			'model'=>$model,
			'cont_id'=>$cont_id,
			));
	}


	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Regions the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Regions::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Regions $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='regions-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}


