<?php

class ContractEquipsController extends Controller
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
                    'roles'=>array('ViewContractEquips'),
                ),
            array('allow',
                    'actions'=>array('Insert'),
                    'roles'=>array('InsretContractEquips'),
                ),
            array('allow',
                    'actions'=>array('Update'),
                    'roles'=>array('UpdateContractEquips'),
                ),
            array('allow',
                    'actions'=>array('Delete'),
                    'roles'=>array('DeleteContractEquips'),
                ),
            array('deny',  // deny all users
                        'users'=>array('*'),
                ),
        );
    }


    public function actionIndex()
    {
        if (isset($_GET['contrs_id']))
        {
            $contrs_id = $_GET['contrs_id'];
            $model = new ContractEquips();
            $model->getModelPk($contrs_id);

            $this->renderPartial('index', array(
                'model' => $model,
                'contrs_id' => $contrs_id
            ), false, true);
        }
    }

    public function actionInsert() 
    {
        if (isset($_POST['contrs_id'])) 
            $contrs_id = $_POST['contrs_id'];

        $model = new ContractEquips;
        
        if(isset($_POST['ContractEquips']))
        {
            $model->attributes=$_POST['ContractEquips'];
            $contrs_id = $model->contrs_id;
            $this->performAjaxValidation($model);

            if ($model->validate())
            {
                $model->Insert();
                echo '1';
                return;
            }
        }

        $model->contrs_id = $contrs_id;
        $this->renderPartial('_form', array(
            'model' => $model
        ));

    }

    public function actionUpdate() 
    {
        if (isset($_POST['creq_id'])) {
            $creq_id = $_POST['creq_id'];
        }
        
        $model = new ContractEquips;

        if(isset($_POST['ContractEquips']))
        {
            $model->attributes=$_POST['ContractEquips'];
            $creq_id = $model->creq_id;

            $this->performAjaxValidation($model);

            if ($model->validate())
            {
                $model->Update();
                echo '1';
                return;
            }

        }
        $model->getModelPk($creq_id);
        $this->renderPartial('_form', array(
            'model' => $model
        ));
    }

    public function actionDelete()
    {
        if(isset($_POST['creq_id'])) {
            $creq_id = $_POST['creq_id'];
        }
        $model = new ContractEquips;
        $model->getModelPk($creq_id);

        if(!is_null($creq_id)){
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


