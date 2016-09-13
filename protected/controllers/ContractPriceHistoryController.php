<?php

class ContractPriceHistoryController extends Controller
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
                'roles'=>array('ViewContractPriceHistory'),
            ),
            array('allow',
                'actions'=>array('Insert'),
                'roles'=>array('InsretContractPriceHistory'),
            ),
            array('allow',
                'actions'=>array('Update'),
                'roles'=>array('UpdateContractPriceHistory'),
            ),
            array('allow',
                'actions'=>array('Delete'),
                'roles'=>array('DeleteContractPriceHistory'),
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
            $model = new ContractPriceHistory();
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
        $model = new ContractPriceHistory();
        
        if(isset($_POST['ContractPriceHistory']))
        {
            $model->attributes=$_POST['ContractPriceHistory'];
            $model->EmplCreate = Yii::app()->user->Employee_id;
            $model->EmplChange = Yii::app()->user->Employee_id;
            $ContrS_id = $model->ContrS_id;

            if ($model->validate())
            {
                $model->Insert();
                echo '1';
                return;
            }
        }
        
        if (isset($_POST['ContrS_id'])) { 
            $model->ContrS_id = $_POST['ContrS_id'];
        }
        
        if (isset($_POST['DateEnd'])) { 
            $model->DateEnd = $_POST['DateEnd'];
        }
        if (isset($_POST['Price'])) { 
            $model->Price = $_POST['Price'];
        }
        if (isset($_POST['PriceMonth'])) { 
            $model->PriceMonth = $_POST['PriceMonth'];
        }
        if (isset($_POST['Reason_id'])) { 
            $model->Reason_id = $_POST['Reason_id'];
        }
        if (isset($_POST['DateStart'])) { 
            $model->DateStart = $_POST['DateStart'];
        }
        
        $this->renderPartial('_form', array(
            'model' => $model
        ));

    }

    public function actionUpdate() 
    {
        $model = new ContractPriceHistory;
        
        if(isset($_POST['ContractPriceHistory']))
        {
            $model->attributes = $_POST['ContractPriceHistory'];

            if ($model->validate())
            {
                $model->Update();
                echo '1';
                return;
            }

        }
        
        if (isset($_POST['PriceHistory_id']))
        {
            $PriceHistory_id = $_POST['PriceHistory_id'];
            $model->getModelPk($PriceHistory_id);
            
            $this->renderPartial('_form', array(
                'model' => $model
            ));
        }
    }

    
    public function actionDelete()
    {
        if(isset($_POST['ContrS_id'])) {
            $ContrS_id = $_POST['ContrS_id'];

            $model = new ContractsS;
            $model->getModelPk($ContrS_id);

            $model->ClearContractPriceHistory();
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


