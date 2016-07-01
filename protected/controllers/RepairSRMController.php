<?php

class RepairSRMController extends Controller {
	
    public $layout='//layouts/column2';
    public $defaultAction  = 'index';
    public $title = '';

    public function filters()
    {
            return array(
                    'accessControl', // perform access control for CRUD operations
                    'postOnly + delete', // we only allow deletion via POST request
            );
    }

    public function accessRules()
    {
        return array(
            array('allow', 
                    'actions'=>array('index'),
                    'roles'=>array('ViewRepairSRM'),
            ),
            array('allow', 
                    'actions'=>array('Agreed'),
                    'roles'=>array('AgreedRepairSRM'),
            ),
            array('allow', 
                    'actions'=>array('Create'),
                    'roles'=>array('CreateRepairSRM'),
            ),
            array('allow', 
                    'actions'=>array('Update'),
                    'roles'=>array('UpdateRepairSRM'),
            ),
            array('allow', 
                    'actions'=>array('Update'),
                    'roles'=>array('DeleteRepairSRM'),
            ),
            array('deny',  
                'users'=>array('*'),
            ),
        );
    }

    public function actionIndex(){
        $this->title = 'Реестр сопроводительных накладных';
        $this->render('index');
    }
    
    
    
    public function actionCreate() {
        $this->title = 'Создание сопроводительной накладной';
        $model = new RepairSRM();
        
        //$model->setScenario('Insert');

        if(isset($_POST['RepairSRM'])) {
            $model->attributes=$_POST['RepairSRM'];
            $model->EmplCreate = Yii::app()->user->Employee_id;

            if ($model->validate()) {
                $model->insert();
                $this->redirect(Yii::app()->createUrl('RepairSRM/index'));
            }    
        }

        $this->render('create',array(
            'model'=>$model,
        ));
    }
    
    public function actionUpdate($Docm_id) {
        $this->title = 'Редактирование накладной';
        $model = new RepairSRM();
        
        //$model->setScenario('Insert');

        if(isset($_POST['RepairSRM'])) {
            $model->attributes=$_POST['RepairSRM'];
            
            $model->EmplChange = Yii::app()->user->Employee_id;

            if ($model->validate()) {
                $model->update();
                
                $this->redirect(Yii::app()->createUrl('RepairSRM/index', array(
                    'Docm_id' => $model->Docm_id,
                )));
            }    
        }
        else {
            $model->getModelPk($Docm_id);
        }
            

        $this->render('update',array(
            'model'=>$model,
        ));
    }
    
    public function actionAgreed() {
        $Docm_id = 0;
        
        if (isset($_POST['Data'])) {
            $Docm_id = $_POST['Data']['Docm_id'];
        }
        
        if ($Docm_id != 0) {
            
            $StoredProc = new StoredProc();
            $StoredProc->ProcedureName = 'AGREED_RepairSRM';
            $StoredProc->ParametersRefresh();
            
            $StoredProc->SetParamValue('@Docm_id', $Docm_id);
            $StoredProc->SetParamValue('@EmplChange', Yii::app()->user->Employee_id);
            
            $Result = $StoredProc->Execute();
            echo $Docm_id;
        }
        else
            echo 0;
    }
}



