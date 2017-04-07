<?php

class ContractsDetails_vController extends Controller
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
                    'actions'=>array('Index', 'GetModel'),
                    'roles'=>array('ViewContractsDetails_v'),
                ),
            array('allow',
                    'actions'=>array('Insert'),
                    'roles'=>array('InsretContractsDetails_v'),
                ),
            array('allow',
                    'actions'=>array('Update'),
                    'roles'=>array('UpdateContractsDetails_v'),
                ),
            array('allow',
                    'actions'=>array('Delete'),
                    'roles'=>array('DeleteContractsDetails_v'),
                ),
            array('deny',  // deny all users
                        'users'=>array('*'),
                ),
        );
    }


    public function actionIndex()
    {
//        $model=new ContractsDetails_v();
//        $model->unsetAttributes();  // clear any default values
//        if(isset($_GET['ContrS_id']))
//            $model->attributes=$_GET['ContrS_id'];
//
//        $this->renderPartial('index', array(
//            'model' => $model
//        ), false, true);
//            
            
        if (isset($_GET['ContrS_id']))
        {
            $ContrS_id = $_GET['ContrS_id'];
            $model = new ContractsDetails_v();
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

        $model = new ContractsDetails_v;
        
        if(isset($_POST['ContractsDetails_v']))
        {
            $model->attributes=$_POST['ContractsDetails_v'];
            $ContrS_id = $model->ContrS_id;
            $this->performAjaxValidation($model);

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
        if (isset($_POST['csdt_id'])) 
            $csdt_id = $_POST['csdt_id'];

        $model = new ContractsDetails_v;

        if(isset($_POST['ContractsDetails_v']))
        {
            $model->attributes=$_POST['ContractsDetails_v'];
            $csdt_id = $model->csdt_id;

            $this->performAjaxValidation($model);

            if ($model->validate())
            {
                $model->Update();
                echo '1';
                return;
            }

        }
        $model->getModelPk($csdt_id);
        $this->renderPartial('_form', array(
            'model' => $model
        ));
    }

    public function actionDelete()
    {
        if(isset($_POST['csdt_id'])) {
            $csdt_id = $_POST['csdt_id'];
        }
        $model = new ContractsDetails_v;
        $model->getModelPk($csdt_id);

        if(!is_null($csdt_id)){
            $model->delete();
        }
    }
    
    public function actionGetModel()
    {
        $model = array();
        if (isset($_POST['csdt_id'])) {
            $model = new ContractsDetails_v();
            $model->getModelPk($_POST['csdt_id']);
        }
        
        echo json_encode($model);
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


