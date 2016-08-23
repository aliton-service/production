<?php

class ContractMasterHistoryController extends Controller
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
                    'roles'=>array('ViewContractMasterHistory'),
                ),
            array('allow',
                    'actions'=>array('Insert'),
                    'roles'=>array('InsretContractMasterHistory'),
                ),
            array('allow',
                    'actions'=>array('Update'),
                    'roles'=>array('UpdateContractMasterHistory'),
                ),
            array('allow',
                    'actions'=>array('Delete'),
                    'roles'=>array('DeleteContractMasterHistory'),
                ),
            array('deny',  // deny all users
                        'users'=>array('*'),
                ),
        );
    }


    public function actionIndex()
    {

        if (isset($_GET['ObjectGr_id']))
        {
            $ObjectGr_id = $_GET['ObjectGr_id'];
            $model = new ContractMasterHistory();
            $model->getModelPk($ObjectGr_id);
//            $model = $model->Find(array('ObjectGr_id' => $ObjectGr_id));

            $this->renderPartial('index', array(
                'model' => $model,
                'ObjectGr_id' => $ObjectGr_id,
            ), false, true);
        }
    }

    public function actionInsert() 
    {
        if (isset($_POST['ContrS_id'])) 
            $ContrS_id = $_POST['ContrS_id'];

        $model = new ContractMasterHistory;
        
        if(isset($_POST['ContractMasterHistory']))
        {
            $model->attributes=$_POST['ContractMasterHistory'];
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
        if (isset($_POST['History_id'])) 
            $History_id = $_POST['History_id'];

        $model = new ContractMasterHistory;

        if(isset($_POST['ContractMasterHistory']))
        {
            $model->attributes=$_POST['ContractMasterHistory'];
            $History_id = $model->History_id;

            if ($model->validate())
            {
                $model->Update();
                echo '1';
                return;
            }

        }
        $model->getModelPk($History_id);
        $this->renderPartial('_form', array(
            'model' => $model
        ));
    }

    public function actionDelete()
    {
        if(isset($_POST['History_id'])) {
            $History_id = $_POST['History_id'];
        }
        $model = new ContractMasterHistory;
        $model->getModelPk($History_id);

        if(!is_null($History_id)){
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

}


