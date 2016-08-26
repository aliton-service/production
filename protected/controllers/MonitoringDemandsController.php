<?php

class MonitoringDemandsController extends Controller
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
                    'roles'=>array('ViewMonitoringDemands'),
                ),
            array('allow',
                    'actions'=>array('Insert'),
                    'roles'=>array('InsretMonitoringDemands'),
                ),
            array('allow',
                    'actions'=>array('Update'),
                    'roles'=>array('UpdateMonitoringDemands'),
                ),
            array('allow',
                    'actions'=>array('Delete'),
                    'roles'=>array('DeleteMonitoringDemands'),
                ),
            array('deny',  // deny all users
                        'users'=>array('*'),
                ),
        );
    }


    public function actionIndex()
    {
        $model = new MonitoringDemands();
//        $model->unsetAttributes();  // clear any default values
        
        if(isset($_GET['mndm_id'])) {
            $mndm_id = $_GET['mndm_id'];
            
            $model->getModelPk($mndm_id);
            $this->title = 'Заявка на мониторинг';
            
            $this->render('info', array(
                'model' => $model
            ));
        }

        else {
            $this->title = 'Заявки на мониторинг';
            $this->render('index', array(
                'model' => $model
            ));
        }

    }

    public function actionInsert() 
    {
        $model = new MonitoringDemands;
        
        if(isset($_POST['MonitoringDemands']))
        {
            $model->attributes = $_POST['MonitoringDemands'];
            $model->User2 = Yii::app()->user->Employee_id;
            $model->UserCreate2 = Yii::app()->user->Employee_id;

            if ($model->validate())
            {
                $model->Insert();
                echo '1';
                return;
            }
        }

        $this->renderPartial('_form', array(
            'model' => $model
        ));

    }

    public function actionUpdate() 
    {
        $model = new MonitoringDemands;
        
        if(isset($_POST['MonitoringDemands']))
        {
            $model->attributes=$_POST['MonitoringDemands'];
            $mndm_id = $model->mndm_id;

            if ($model->validate())
            {
                $model->Update();
                echo '1';
                return;
            }

        }
        
        if (isset($_POST['mndm_id'])) {
            $mndm_id = $_POST['mndm_id'];
        }
        
        $model->getModelPk($mndm_id);
        $this->renderPartial('_form', array(
            'model' => $model
        ));
    }

    public function actionDelete()
    {
        if(isset($_POST['mndm_id'])) {
            $mndm_id = $_POST['mndm_id'];
        }
        $model = new MonitoringDemands;
        $model->getModelPk($mndm_id);

        if(!is_null($mndm_id)){
            $model->delete();
        }
    }

    public function loadModel($id)
    {
        $model=Regions::model()->findByPk($id);
        if($model===null)
                throw new CHttpException(404,'The requested page does not exist.');
        return $model;
    }

}


