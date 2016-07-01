<?php

class RepairWarrantysController extends Controller {
	
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
                    'roles'=>array('ViewRepairWarrantys'),
            ),
            array('allow', 
                    'actions'=>array('Agreed'),
                    'roles'=>array('AgreedRepairWarrantys'),
            ),
            array('allow', 
                    'actions'=>array('Create'),
                    'roles'=>array('CreateRepairWarrantys'),
            ),
            array('allow', 
                    'actions'=>array('Update'),
                    'roles'=>array('UpdateRepairWarrantys'),
            ),
            array('allow', 
                    'actions'=>array('Update'),
                    'roles'=>array('DeleteRepairWarrantys'),
            ),
            array('deny',  
                'users'=>array('*'),
            ),
        );
    }

    public function actionIndex(){
        $this->title = 'Реестр гарантийных талонов';
        $this->render('index');
    }
    
    
    
    public function actionCreate() {
        $this->title = 'Создание сопроводительной накладной';
        $model = new RepairWarrantys();
        
        //$model->setScenario('Insert');

        if(isset($_POST['RepairWarrantys'])) {
            $model->attributes=$_POST['RepairWarrantys'];
            $model->EmplCreate = Yii::app()->user->Employee_id;

            if ($model->validate()) {
                $model->insert();
                $this->redirect(Yii::app()->createUrl('RepairWarrantys/index'));
            }    
        }

        $this->render('create',array(
            'model'=>$model,
        ));
    }
    
    public function actionUpdate($Docm_id) {
        $this->title = 'Редактирование накладной';
        $model = new RepairWarrantys();
        
        //$model->setScenario('Insert');

        if(isset($_POST['RepairWarrantys'])) {
            $model->attributes=$_POST['RepairWarrantys'];
            
            $model->EmplChange = Yii::app()->user->Employee_id;

            if ($model->validate()) {
                $model->update();
                
                $this->redirect(Yii::app()->createUrl('RepairWarrantys/index', array(
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
            $StoredProc->ProcedureName = 'AGREED_RepairWarrantys';
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





