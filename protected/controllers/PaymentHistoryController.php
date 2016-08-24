<?php

class PaymentHistoryController extends Controller
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
                'roles'=>array('ViewPaymentHistory'),
            ),
            array('allow',
                'actions'=>array('Insert'),
                'roles'=>array('InsretPaymentHistory'),
            ),
            array('allow',
                'actions'=>array('Update'),
                'roles'=>array('UpdatePaymentHistory'),
            ),
            array('allow',
                'actions'=>array('Delete'),
                'roles'=>array('DeletePaymentHistory'),
            ),
            array('deny',  // deny all users
                    'users'=>array('*'),
            ),
        );
    }


    public function actionIndex()
    {
        if (isset($_GET['cntr_id']))
        {
            $cntr_id = $_GET['cntr_id'];
            $model = new PaymentHistory();
            $model->getModelPk($cntr_id);
//            $model = $model->Find(array('cntr_id' => $cntr_id));

            $this->renderPartial('index', array(
                'model' => $model,
                'cntr_id' => $cntr_id
            ), false, true);
        }
    }

    public function actionInsert() 
    {
        $model = new PaymentHistory;
        
        if(isset($_POST['PaymentHistory']))
        {
            $model->attributes=$_POST['PaymentHistory'];
            $model->user_create = Yii::app()->user->Employee_id;
//            $model->EmplChange = Yii::app()->user->Employee_id;
            $cntr_id = $model->cntr_id;

            if ($model->validate())
            {
                $model->Insert();
                echo '1';
                return;
            }
        }
        
        if (isset($_POST['cntr_id'])) { 
            $model->cntr_id = $_POST['cntr_id'];
        }
        
        if (isset($_POST['DateEnd'])) { 
            $model->DateEnd = $_POST['DateEnd'];
        }
        
        $this->renderPartial('_form', array(
            'model' => $model
        ));

    }

    public function actionUpdate() 
    {
        $model = new PaymentHistory;
        
        if(isset($_POST['PaymentHistory']))
        {
            $model->attributes = $_POST['PaymentHistory'];
            $model->user_change = Yii::app()->user->Employee_id;

            if ($model->validate())
            {
                $model->Update();
                echo '1';
                return;
            }

        }
        
        if (isset($_POST['pmhs_id']))
        {
            $pmhs_id = $_POST['pmhs_id'];
            $model->getModelPk($pmhs_id);
            
            $this->renderPartial('_form', array(
                'model' => $model
            ));
        }
    }

    
    public function actionDelete()
    {
        if(isset($_POST['pmhs_id'])) {
            $pmhs_id = $_POST['pmhs_id'];

            $model = new PaymentHistory;
            $model->getModelPk($pmhs_id);

            $model->Delete();
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


