<?php

class DeliveryCommentsController extends Controller
{
	public $layout='//layouts/column2';

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
                    array('allow',  
                            'actions'=>array('index','view'),
                            'roles'=>array('ViewDeliveryComments'),
                    ),
                    array('allow', 
                            'actions'=>array('create'),
                            'roles'=>array('CreateDeliveryComments'),
                    ),
                    array('allow', 
                            'actions'=>array('Delete'),
                            'roles'=>array('DeleteDeliveryComments'),
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
            if(isset($_POST['DeliveryComments']))  {
                $model=new DeliveryComments();
                $model->attributes = $_POST['DeliveryComments'];
                $model->EmplCreate = Yii::app()->user->Employee_id;
                if ($model->validate()) {
                    $model->insert();
                    echo '1';
                    return;
                }
            }
            echo '0';
	}

	public function actionDelete() {
            if(isset($_POST['Dlcm_id'])) {
                $model = new DeliveryComments;
                $model->dlcm_id = $_POST['Dlcm_id'];
                $model->delete();
                echo '1';
                return;
            }
            echo '0';
	}
}
