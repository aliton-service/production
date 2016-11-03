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
            
            $ObjectResult = array(
                'result' => 0,
                'id' => 0,
                'html' => '',
            );
            
            if(isset($_POST['OrganizationStructure'])) {
                $model->attributes=$_POST['OrganizationStructure'];
                $model->EmplCreate = Yii::app()->user->Employee_id;

                if ($model->validate()) {
                    $Res = $model->insert();
                    $ObjectResult['result'] = 1;
                    $ObjectResult['id'] = $Res['Structure_id'];
                    echo json_encode($ObjectResult);
                    return;
                }    
            }

            $ObjectResult['html'] = $this->renderPartial('_form', array(
                'model' => $model,
            ), true);
            echo json_encode($ObjectResult);
	}

	public function actionDragAndDrop() {
            $model = new OrganizationStructure();
            
            $ObjectResult = array(
                'result' => 0,
                'id' => 0,
                'html' => '',
            );
            
            if(isset($_POST['OrganizationStructure']))
            {
                $model->getModelPk($_POST['OrganizationStructure']['Structure_id']);
                $model->Parent_id = $_POST['OrganizationStructure']['Parent_id'];
                $model->EmplChange = Yii::app()->user->Employee_id;

                if ($model->validate()) {
                    $model->update();
                    $ObjectResult['result'] = 1;
                    $ObjectResult['id'] = $model->Structure_id;
                    echo json_encode($ObjectResult);
                    return;
                }
            }
            
            echo json_encode($ObjectResult);
            return;
        }
        
	public function actionUpdate()
	{
            $model = new OrganizationStructure();
            
            $ObjectResult = array(
                'result' => 0,
                'id' => 0,
                'html' => '',
            );
            
            if(isset($_POST['OrganizationStructure']))
            {
                $model->attributes=$_POST['OrganizationStructure'];
                $model->EmplChange = Yii::app()->user->Employee_id;

                if ($model->validate()) {
                    $model->update();
                    $ObjectResult['result'] = 1;
                    $ObjectResult['id'] = $model->Structure_id;
                    echo json_encode($ObjectResult);
                    return;
                }
            }
            
            if (isset($_POST['Structure_id'])) {
                $model->getmodelPk($_POST['Structure_id']);
            }

            $ObjectResult['html'] = $this->renderPartial('_form', array(
                'model' => $model,
            ), true);
            echo json_encode($ObjectResult);
            
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


