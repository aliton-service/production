<?php

class OrganizationStructureController extends Controller
{
	//public $layout='//layouts/column2';
        
        public $title = '';
        
	public function filters()
	{
            return array(
                    'accessControl', // perform access control for CRUD operations
            );
	}

	public function accessRules()
	{
            return array(
                array('allow',  
                        'actions'=>array('index'),
                        'roles'=>array('ViewOrganizationStructure'),
                ),
                array('allow', 
                        'actions'=>array('create'),
                        'roles'=>array('CreateOrganizationStructure'),
                ),
                array('allow', 
                        'actions'=>array('update'),
                        'roles'=>array('UpdateOrganizationStructure'),
                ),
                array('allow', 
                        'actions'=>array('delete'),
                        'roles'=>array('DeleteOrganizationStructure'),
                ),
                array('deny',  // deny all users
                        'users'=>array('*'),
                ),
            );
	}

	public function actionCreate()
	{
            $this->title = 'Создание новой организации';
            $model = new OrganizationsV();
            $model->setScenario('Insert');

            if(isset($_POST['PropForms'])) {
                $model->attributes=$_POST['PropForms'];
                $model->EmplCreate = Yii::app()->user->Employee_id;

                if ($model->validate()) {
                    $model->insert();
                    $this->redirect(Yii::app()->createUrl('propForms/index'));
                }    
            }

            $this->render('create',array(
                    'model'=>$model,
            ));
	}

	
	public function actionUpdate($id)
	{
            $this->title = 'Редактирование организации';
        
            $model = new OrganizationsV();
            $model->setScenario('Update');

            if ($id == null)
                    throw new CHttpException(404, 'Не выбрана запись.');

            if(isset($_POST['PropForms']))
            {
                $model->attributes=$_POST['PropForms'];

                $model->EmplChange = Yii::app()->user->Employee_id;

                if ($model->validate()) {
                    $model->update();
                }
            }
            else
            {
                $model->getmodelPk($id);
                $this->title .= ' ' . $model->FullName;
            }

            $this->render('update', array(
                    'model'=>$model,
                )
            );
	}

	
	public function actionDelete($id)
	{
            $model = new OrganizationsV();
            $model->getmodelPk($id);
            $model->delete();
            
            $this->redirect($this->createUrl('propForms/Index'));
	}

	public function actionIndex()
	{
            $this->title = 'Просмотр структуры организации';
            $this->render('index');
	}

	
	public function actionAdmin()
	{
		$model=new PropForms('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['PropForms']))
			$model->attributes=$_GET['PropForms'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	
	public function loadModel($id)
	{
		$model=PropForms::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='prop-forms-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}


