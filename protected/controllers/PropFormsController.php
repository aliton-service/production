<?php

class PropFormsController extends Controller
{
	public $layout='//layouts/column2';
        
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
                        'actions'=>array('index', 'Find'),
                        'roles'=>array('ViewPropForms'),
                ),
                array('allow', 
                        'actions'=>array('create'),
                        'roles'=>array('CreatePropForms'),
                ),
                array('allow', 
                        'actions'=>array('update'),
                        'roles'=>array('UpdatePropForms'),
                ),
                array('allow', 
                        'actions'=>array('delete'),
                        'roles'=>array('DeletePropForms'),
                ),
                array('deny',  // deny all users
                        'users'=>array('*'),
                ),
            );
	}

	public function actionCreate()
	{
            $model = new OrganizationsV();
            $ObjectResult = array(
                    'result' => 0,
                    'id' => 0,
                    'html' => '',
                );
            if (isset($_POST['Organizations'])) {
                $model->attributes = $_POST['Organizations'];
                if ($model->validate()) {
                    $Res = $model->Insert();
                    $ObjectResult['result'] = 1;
                    $ObjectResult['id'] = $Res['Form_id'];
                    echo json_encode($ObjectResult);
                    return;
                } 
            }

            $ObjectResult['html'] = $this->renderPartial('_form', array(
                'model' => $model,
            ), true);
            echo json_encode($ObjectResult);
	}

	
	public function actionUpdate()
        {
            $model = new OrganizationsV();
            $ObjectResult = array(
                    'result' => 0,
                    'id' => 0,
                    'html' => '',
                );
            if (isset($_POST['Form_id']))
                $model->getModelPk($_POST['Form_id']);

            if (isset($_POST['Organizations'])) {
                $model->getModelPk($_POST['Organizations']['Form_id']);
                $model->attributes = $_POST['Organizations'];
                if ($model->validate()) {
                    $model->Update();
                    $ObjectResult['result'] = 1;
                    $ObjectResult['id'] = $model->Form_id;
                    echo json_encode($ObjectResult);
                    return;
                }
            }

            $ObjectResult['html'] = $this->renderPartial('_form', array(
                'model' => $model,
            ), true);
            echo json_encode($ObjectResult);
        }

        public function actionDelete()
        {
            $ObjectResult = array(
                    'result' => 0,
                    'id' => 0,
                    'html' => '',
                );

            if (isset($_POST['Form_id'])) {
                $model = new OrganizationsV();
                $model->getModelPk($_POST['Form_id']);
                if ($model->validate()) {
                    $model->delete();
                    $ObjectResult['result'] = 1;
                    $ObjectResult['id'] = $model->Form_id;
                    echo json_encode($ObjectResult);
                    return;
                }
            }
            echo json_encode($ObjectResult);
        }

	public function actionIndex()
	{
            $this->title = 'Просмотр организаций';
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
        
    public function actionFind() {
        $ObjectResult = array(
            'result' => 0,
            'id' => 0,
            'html' => '',
        );
        
        $ObjectResult['html'] = $this->renderPartial('_find', array(
                
            ), true);
        
        echo json_encode($ObjectResult);
    }
}
