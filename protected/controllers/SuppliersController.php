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
            $this->title = 'Создание нового поставщика';
            $model = new Suppliers();
            $model->setScenario('Insert');

            if(isset($_POST['Suppliers'])) {
                $model->attributes=$_POST['Suppliers'];
                $model->EmplCreate = Yii::app()->user->Employee_id;

                if ($model->validate()) {
                    $model->insert();
                    $this->redirect(Yii::app()->createUrl('suppliers/index'));
                }    
            }
            
            $this->render('create',array(
                    'model'=>$model,
            ));
	}

	
	public function actionUpdate($Supplier_id)
	{
            $this->title = 'Редактирование поставщика';
        
            $model = new Suppliers();
            $model->setScenario('Update');

            if ($Supplier_id == null)
                    throw new CHttpException(404, 'Не выбрана запись.');

            if(isset($_POST['Suppliers']))
            {
                $model->attributes=$_POST['Suppliers'];

                $model->EmplChange = Yii::app()->user->Employee_id;

                if ($model->validate()) {
                    $model->update();
                }
            }
            else
            {
                $model->getmodelPk($Supplier_id);
                $this->title .= ' ' . $model->NameSupplier;
            }

            $this->render('update', array(
                    'model'=>$model,
                )
            );
	}
	
	public function actionDelete($Supplier_id)
	{
            $model = new Suppliers();
            $model->getmodelPk($Supplier_id);
            $model->delete();
            
            $this->redirect($this->createUrl('suppliers/Index'));
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


