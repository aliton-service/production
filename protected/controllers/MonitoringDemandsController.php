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
                    'actions'=>array('Accept'),
                    'roles'=>array('AcceptMonitoringDemands'),
                ),
            array('allow',
                    'actions'=>array('CancelAcceptance'),
                    'roles'=>array('CancelAcceptanceMonitoringDemands'),
                ),
            array('allow',
                    'actions'=>array('Execute'),
                    'roles'=>array('ExecuteMonitoringDemands'),
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
            
            $Employee_id = Yii::app()->user->Employee_id;
            $Query = new SQLQuery();
            $Query->setSelect("Select Alias from Employees where Employee_id = " . $Employee_id);
            $Result = $Query->QueryRow();
            $Employee_Alias = $Result['Alias'];
                
            $model->User2 = $Employee_Alias;
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
    
    public function actionAccept() 
    {
        if (isset($_POST['mndm_id'])) {
            $model = new MonitoringDemands();
            $model->getModelPk($_POST['mndm_id']);
            if ($model->UserAccept2 == null || $model->UserAccept2 == '') {
                $sp = new StoredProc();
                $sp->ProcedureName = 'ACCEPT_MonitoringDemands';
                $sp->ParametersRefresh();
                $sp->Parameters[0]['Value'] = $_POST['mndm_id'];
                
                $Employee_id = Yii::app()->user->Employee_id;
                $Query = new SQLQuery();
                $Query->setSelect("Select Alias, ShortName from Employees where Employee_id = " . $Employee_id);
                $Result = $Query->QueryRow();
                $Employee_Alias = $Result['Alias'];
                
                $sp->Parameters[1]['Value'] = $Employee_Alias;
                
                $sp->CheckParam = true;
                $sp->Execute();
                
                $ShortName = $Result['ShortName'];
                echo $ShortName;
            }
        }
    }
    
    public function actionCancelAcceptance() 
    {
        if (isset($_POST['mndm_id'])) {
            $model = new MonitoringDemands();
            $model->getModelPk($_POST['mndm_id']);
            if ($model->UserAccept2 !== null || $model->UserAccept2 !== '') {
                $sp = new StoredProc();
                $sp->ProcedureName = 'UNDO_MonitoringDemands';
                $sp->ParametersRefresh();
                $sp->Parameters[0]['Value'] = $_POST['mndm_id'];
                
                $sp->CheckParam = true;
                $sp->Execute();
            }
        }
    }
    
    
    public function actionExecute() 
    {
        if (isset($_POST['mndm_id'])) {
            $model = new MonitoringDemands();
            $model->getModelPk($_POST['mndm_id']);
            if ($model->UserAccept2 !== null && $model->DateExec == null && $model->UserChange2 == null) {
                $sp = new StoredProc();
                $sp->ProcedureName = 'EXEC_MonitoringDemands';
                $sp->ParametersRefresh();
                $sp->Parameters[0]['Value'] = $_POST['mndm_id'];
                
                $Employee_id = Yii::app()->user->Employee_id;
                $Query = new SQLQuery();
                $Query->setSelect("Select Alias, ShortName from Employees where Employee_id = " . $Employee_id);
                $Result = $Query->QueryRow();
                $Employee_Alias = $Result['Alias'];
                
                $sp->Parameters[1]['Value'] = $Employee_Alias;
                
                $sp->CheckParam = true;
                $sp->Execute();
            }
        }
    }
    

    public function actionDelete()
    {
        if(isset($_POST['mndm_id'])) {
            $mndm_id = $_POST['mndm_id'];
        }
        $model = new MonitoringDemands;
        $model->getModelPk($mndm_id);
        $model->UserChange2 = Yii::app()->user->Employee_id;

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

