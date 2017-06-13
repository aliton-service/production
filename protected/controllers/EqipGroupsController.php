<?php

class EqipGroupsController extends Controller
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
                        'roles'=>array('ViewEqipGroups'),
                ),
                array('allow', 
                        'actions'=>array('create', 'EditForm'),
                        'roles'=>array('CreateEqipGroups'),
                ),
                array('allow', 
                        'actions'=>array('update', 'DragAndDrop'),
                        'roles'=>array('UpdateEqipGroups'),
                ),
                array('allow', 
                        'actions'=>array('delete'),
                        'roles'=>array('DeleteEqipGroups'),
                ),
                array('deny',  // deny all users
                        'users'=>array('*'),
                ),
            );
	}
        
        public function actionEditForm()
        {
            $model = new EqipGroups();
            $model->group_id = 0;
            if (isset($_POST['group_id'])) {
                $model->getModelPk($_POST['group_id']);
            }
            if (isset($_POST['parent_group_id'])) {
                if ($_POST['parent_group_id'] != -1)
                    $model->parent_group_id = $_POST['parent_group_id'];
            }
            
            $this->renderPartial('_form', array(
                'model' => $model
            ));
        }

	public function actionCreate()
	{
            $this->title = 'Создание нового раздела';
            $model = new EqipGroups();
            
            $model->setScenario('Insert');
            
            $ObjectResult = array(
                'result' => 0,
                'id' => 0,
                'html' => '',
            );
            
            
            
            if(isset($_POST['EqipGroups'])) {
                $model->attributes=$_POST['EqipGroups'];
                $model->EmplCreate = Yii::app()->user->Employee_id;
                
                if ($model->validate()) {
                    $Res = $model->insert();
                    $ObjectResult['result'] = 1;
                    $ObjectResult['id'] = $Res['group_id'];
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
            $model = new EqipGroups();
            
            $model->setScenario('DragAndDrop');
            
            $ObjectResult = array(
                'result' => 0,
                'id' => 0,
                'html' => '',
            );
            
            if(isset($_POST['EqipGroups']))
            {
                $model->getModelPk($_POST['EqipGroups']['group_id']);
                $model->parent_group_id = $_POST['EqipGroups']['parent_group_id'];
                $ObjectResult['parent_group_id'] = $model->parent_group_id;
                
//                if ($model->validate()) {
                    $model->update();
                    $ObjectResult['result'] = 1;
                    $ObjectResult['id'] = $model->group_id;
                    
                    echo json_encode($ObjectResult);
                    return;
//                }
            }
            
            echo json_encode($ObjectResult);
            return;
        }
        
	public function actionUpdate()
	{
            $model = new EqipGroups();
            $model->setScenario('Update');
            
            $ObjectResult = array(
                'result' => 0,
                'id' => 0,
                'html' => '',
            );
            
            if(isset($_POST['EqipGroups']))
            {
                $model->attributes=$_POST['EqipGroups'];
                $model->EmplChange = Yii::app()->user->Employee_id;
                
                if ($model->validate()) {
                    $model->update();
                    $ObjectResult['result'] = 1;
                    $ObjectResult['id'] = $model->group_id;
                    echo json_encode($ObjectResult);
                    return;
                }
            }
            
            if (isset($_POST['group_id'])) {
                $model->getmodelPk($_POST['group_id']);
            }

            $ObjectResult['html'] = $this->renderPartial('_form', array(
                'model' => $model,
            ), true);
            echo json_encode($ObjectResult);
            
	}

	
	public function actionDelete()
	{
            if (isset($_POST['group_id'])) { 
                $model = new EqipGroups();
                $model->group_id = $_POST['group_id'];
                $model->delete();
                echo '1';
                return;
            } else
                echo '0';
	}

	public function actionIndex()
	{
            $this->title = 'Структурное дерево оборудования';
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


