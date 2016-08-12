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

                array('allow',
                        'actions'=>array('Index'),
                        'roles'=>array('ViewContacts'),
                    ),
                array('allow',
                        'actions'=>array('Insert'),
                        'roles'=>array('InsretContacts'),
                    ),
                array('allow',
                        'actions'=>array('Update'),
                        'roles'=>array('UpdateContacts'),
                    ),
                array('allow',
                        'actions'=>array('Delete'),
                        'roles'=>array('DeleteContacts'),
                    ),
                array('deny',  // deny all users
                            'users'=>array('*'),
                    ),
            );
	}

	
	public function actionIndex()
	{

            if (isset($_GET['ObjectGr_id']))
            {
                $ObjectGr_id = $_GET['ObjectGr_id'];
                $model = new Contacts();
                $model->getModelPk($ObjectGr_id);
    //            $model = $model->Find(array('ObjectGr_id' => $ObjectGr_id));

                $this->renderPartial('index', array(
                    'model' => $model,
                    'ObjectGr_id' => $ObjectGr_id,
                ), false, true);
            }
	}

	public function actionInsert() 
        {
            $this->title = 'Создание контакта';
            
            if (isset($_POST['ObjectGr_id'])) 
                $ObjectGr_id = $_POST['ObjectGr_id'];
            
            $model = new Contacts;

            if(isset($_POST['Contacts']))
            {
                $model->attributes=$_POST['Contacts'];

                $model->cont_id = null;
                $this->performAjaxValidation($model);

                if ($model->validate())
                {
                    $model->Insert();
                    echo '1';
                    return;
                }
            }

            $model->ObjectGr_id = $ObjectGr_id;
            $this->renderPartial('_form', array(
                'model' => $model
            ));
            
	}

	public function actionUpdate() 
        {
            $this->title = 'Редактирование контакта';
            
            if (isset($_POST['cont_id'])) 
                $cont_id = $_POST['cont_id'];

            $model = new Contacts;

            if(isset($_POST['Contacts']))
            {
                $model->attributes=$_POST['Contacts'];
                $cont_id = $model->cont_id;

                $this->performAjaxValidation($model);

                if ($model->validate())
                {
                    $model->Update();
                    echo '1';
                    return;
                }

            }
            $model->getModelPk($cont_id);
            $this->renderPartial('_form', array(
                'model' => $model
            ));
	}
        
        public function actionDelete()
        {
            if(isset($_POST['cont_id'])) {
                $cont_id = $_POST['cont_id'];
            }
            $model = new Contacts;
            $model->getModelPk($cont_id);

            if(!is_null($cont_id)){
                $model->delete();
            }

//            $this->redirect($this->createUrl('ObjectsGroupSystems/Index'));
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


