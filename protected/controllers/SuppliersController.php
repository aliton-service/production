<?php

class SuppliersController extends Controller
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
                        'actions'=>array('index'),
                        'roles'=>array('ViewSuppliers'),
                ),
                array('allow', 
                        'actions'=>array('create'),
                        'roles'=>array('InsertSuppliers'),
                ),
                array('allow', 
                        'actions'=>array('update'),
                        'roles'=>array('UpdateSuppliers'),
                ),
                array('allow', 
                        'actions'=>array('delete'),
                        'roles'=>array('DeleteSuppliers'),
                ),
                array('allow', 
                        'actions'=>array('assortments'),
                        'roles'=>array('AssortmentSuppliers'),
                ),
                array('deny',  // deny all users
                        'users'=>array('*'),
                ),
            );
	}

    public function actionCreate()
    {
        $model = new Suppliers();
        $ObjectResult = array(
                'result' => 0,
                'id' => 0,
                'html' => '',
            );
        if (isset($_POST['Suppliers'])) {
            $model->attributes = $_POST['Suppliers'];
            if ($model->validate()) {
                $Res = $model->Insert();
                $ObjectResult['result'] = 1;
                $ObjectResult['id'] = $Res['Supplier_id'];
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
            $model = new Suppliers();
            $ObjectResult = array(
                    'result' => 0,
                    'id' => 0,
                    'html' => '',
                );
            if (isset($_POST['Supplier_id']))
                $model->getModelPk($_POST['Supplier_id']);

            if (isset($_POST['Suppliers'])) {
                $model->getModelPk($_POST['Suppliers']['Supplier_id']);
                $model->attributes = $_POST['Suppliers'];
                if ($model->validate()) {
                    $model->Update();
                    $ObjectResult['result'] = 1;
                    $ObjectResult['id'] = $model->Supplier_id;
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

            if (isset($_POST['Supplier_id'])) {
                $model = new Suppliers();
                $model->getModelPk($_POST['Supplier_id']);
                
                    $model->delete();
                    $ObjectResult['result'] = 1;
                    $ObjectResult['id'] = $model->Supplier_id;
                    echo json_encode($ObjectResult);
                    return;
                
            }
            echo json_encode($ObjectResult);
	}

	public function actionIndex()
	{
            $this->title = 'Просмотр поставщиков';
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

        public function actionAssortments($Supplier_id)
        {
            $this->renderPartial('assortments', array(
                'Supplier_id' => $Supplier_id,
            ), null, true);
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


