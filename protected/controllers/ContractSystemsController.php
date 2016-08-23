<?php

class ContractSystemsController extends Controller
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
                    'roles'=>array('ViewContractSystems'),
                ),
            array('allow',
                    'actions'=>array('Insert'),
                    'roles'=>array('InsretContractSystems'),
                ),
            array('allow',
                    'actions'=>array('Update'),
                    'roles'=>array('UpdateContractSystems'),
                ),
            array('allow',
                    'actions'=>array('Delete'),
                    'roles'=>array('DeleteContractSystems'),
                ),
            array('deny',  // deny all users
                        'users'=>array('*'),
                ),
        );
    }


    public function actionIndex()
    {
        if (isset($_GET['ContrS_id']))
        {
            $ContrS_id = $_GET['ContrS_id'];
            $model = new ContractSystems();
            $model->getModelPk($ContrS_id);
//            $model = $model->Find(array('ContrS_id' => $ContrS_id));

            $this->renderPartial('index', array(
                'model' => $model,
                'ContrS_id' => $ContrS_id
            ), false, true);
        }
    }

    public function actionInsert() 
    {
        if (isset($_POST['ContrS_id'])) 
            $ContrS_id = $_POST['ContrS_id'];

        $model = new ContractSystems;
        
        if(isset($_POST['ContractSystems']))
        {
            $model->attributes=$_POST['ContractSystems'];
            $ContrS_id = $model->ContrS_id;

            if ($model->validate())
            {
                $model->Insert();
                echo '1';
                return;
            }
        }

        $model->ContrS_id = $ContrS_id;
        $this->renderPartial('_form', array(
            'model' => $model
        ));

    }

    public function actionUpdate() 
    {
        if (isset($_POST['ContractSystem_id'])) 
            $ContractSystem_id = $_POST['ContractSystem_id'];

        $model = new ContractSystems;

        if(isset($_POST['ContractSystems']))
        {
            $model->attributes=$_POST['ContractSystems'];
            $ContractSystem_id = $model->ContractSystem_id;

            $this->performAjaxValidation($model);

            if ($model->validate())
            {
                $model->Update();
                echo '1';
                return;
            }

        }
        $model->getModelPk($ContractSystem_id);
        $this->renderPartial('_form', array(
            'model' => $model
        ));
    }

    public function actionDelete()
    {
        if(isset($_POST['ContractSystem_id'])) {
            $ContractSystem_id = $_POST['ContractSystem_id'];
        }
        $model = new ContractSystems;
        $model->getModelPk($ContractSystem_id);

        if(!is_null($ContractSystem_id)){
            $model->delete();
        }
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


