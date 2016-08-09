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
                        'actions'=>array('create', 'EditForm'),
                        'roles'=>array('CreateOrganizationStructure'),
                ),
                array('allow', 
                        'actions'=>array('update', 'DragAndDrop'),
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
        
        public function actionEditForm()
        {
            $model = new OrganizationStructure();
            $model->Structure_id = 0;
            if (isset($_POST['Structure_id'])) {
                $model->getModelPk($_POST['Structure_id']);
            }
            if (isset($_POST['Parent_id'])) {
                if ($_POST['Parent_id'] != -1)
                    $model->Parent_id = $_POST['Parent_id'];
            }
            
            $this->renderPartial('_form', array(
                'model' => $model
            ));
        }

	public function actionCreate()
	{
            $this->title = 'Создание новой организации';
            $model = new OrganizationStructure();
            
            if(isset($_POST['OrganizationStructure'])) {
                $model->attributes=$_POST['OrganizationStructure'];
                $model->EmplCreate = Yii::app()->user->Employee_id;

                if ($model->validate()) {
                    $model->insert();
                    echo '1';
                    return;
                }    
            }

            $this->renderPartial('_form',array(
                    'model'=>$model,
            ));
	}

	public function actionDragAndDrop() {
            $model = new OrganizationStructure();
            
            if(isset($_POST['OrganizationStructure']))
            {
                $model->getModelPk($_POST['OrganizationStructure']['Structure_id']);
                $model->Parent_id = $_POST['OrganizationStructure']['Parent_id'];
                $model->EmplChange = Yii::app()->user->Employee_id;

                if ($model->validate()) {
                    $model->update();
                    echo '1';
                    return;
                }
            }
            
            echo '0';
        }
        
	public function actionUpdate()
	{
            $model = new OrganizationStructure();
            
            if(isset($_POST['OrganizationStructure']))
            {
                $model->attributes=$_POST['OrganizationStructure'];
                $model->EmplChange = Yii::app()->user->Employee_id;

                if ($model->validate()) {
                    $model->update();
                    echo '1';
                    return;
                }
            }
            else
            {
                if (isset($_POST['Structure_id'])) {
                    $model->getmodelPk($_POST['Structure_id']);
                }
            }
            
            $this->renderPartial('_form', array(
                    'model'=>$model,
                )
            );
            
	}

	
	public function actionDelete()
	{
            if (isset($_POST['Structure_id'])) { 
                $model = new OrganizationStructure();
                $model->Structure_id = $_POST['Structure_id'];
                $model->delete();
                echo '1';
                return;
            } else
                echo '0';
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


