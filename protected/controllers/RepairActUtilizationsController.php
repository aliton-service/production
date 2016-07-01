<?php

class RepairActUtilizationsController extends Controller {
	
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
                    'roles'=>array('ViewRepairActUtilizations'),
            ),
            array('allow', 
                    'actions'=>array('Agreed'),
                    'roles'=>array('AgreedRepairActUtilizations'),
            ),
            array('allow', 
                    'actions'=>array('Create'),
                    'roles'=>array('CreateRepairActUtilizations'),
            ),
            array('allow', 
                    'actions'=>array('Update'),
                    'roles'=>array('UpdateRepairActUtilizations'),
            ),
            array('allow', 
                    'actions'=>array('Update'),
                    'roles'=>array('DeleteRepairActUtilizations'),
            ),
            array('deny',  
                'users'=>array('*'),
            ),
        );
    }

    public function actionIndex(){
        $this->title = 'Реестр актов утилизации';
        $this->render('index');
    }
    
    
    
    public function actionCreate() {
        $this->title = 'Создание акта';
        $model = new RepairActUtilizations();
        
        //$model->setScenario('Insert');

        if(isset($_POST['RepairActUtilizations'])) {
            $model->attributes=$_POST['RepairActUtilizations'];
            $model->EmplCreate = Yii::app()->user->Employee_id;

            if ($model->validate()) {
                $model->insert();
                $this->redirect(Yii::app()->createUrl('RepairActUtilizations/index'));
            }    
        }

        $this->render('create',array(
            'model'=>$model,
        ));
    }
    
    public function actionUpdate($Docm_id) {
        $this->title = 'Редактирование акта';
        $model = new RepairActUtilizations();
        
        //$model->setScenario('Insert');

        if(isset($_POST['RepairActUtilizations'])) {
            $model->attributes=$_POST['RepairActUtilizations'];
            
            $model->EmplChange = Yii::app()->user->Employee_id;

            if ($model->validate()) {
                $model->update();
                
                $this->redirect(Yii::app()->createUrl('RepairActUtilizations/index', array(
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
            $StoredProc->ProcedureName = 'AGREED_RepairActUtilizations';
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









