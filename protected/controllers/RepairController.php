<?php

class RepairController extends Controller {
	
    public $layout='//layouts/column2';
    public $defaultAction  = 'index';
    public $title = '';
    public $gridFilters;

    public function filters()
    {
        return array(
            'accessControl', 
            'postOnly + delete', 
        );
    }

    public function accessRules()
    {
        return array(
            array('allow', 
                    'actions'=>array('Index', 'View', 'GetModel'),
                    'roles'=>array('ViewRepairs'),
            ),
            array('allow', 
                    'actions'=>array('Create'),
                    'roles'=>array('CreateRepairs'),
            ),
            array('allow', 
                    'actions'=>array('Update'),
                    'roles'=>array('UpdateRepairs'),
            ),
            array('allow', 
                    'actions'=>array('Accept'),
                    'roles'=>array('AcceptRepairs'),
            ),
            array('allow', 
                    'actions'=>array('SendAgree'),
                    'roles'=>array('SendAgreeRepairs'),
            ),
            array('deny',  // deny all users
                'users'=>array('*'),
            ),
        );
    }

    public function actionIndex(){
        $this->title = 'Ремонт - реестр оборудвания';
        $this->gridFilters = '_filters';
        $this->render('index');
    }
    
    public function actionView($Repr_id = null){
        if (isset($Repr_id)) {
            $model = new Repair();
            $model->getModelPk($Repr_id);
            $this->title = 'Ремонт - карточка заявки';
            $this->render('view', array(
                'model' => $model,
            ));
        }
    }
    
    public function actionCreate() {
        $model = new Repair();
        
        $ObjectResult = array(
            'result' => 0,
            'id' => 0,
            'html' => '',
        );
        
        if (isset($_POST['Repairs'])) {
            $model->attributes = $_POST['Repairs'];
            if ($model->validate()) {
                $Res = $model->Insert();
                $ObjectResult['result'] = 1;
                $ObjectResult['id'] = $Res['Repr_id'];
                echo json_encode($ObjectResult);
                return;
            } 
        }
        
        $ObjectResult['html'] = $this->renderPartial('_form0', array(
            'model' => $model,
        ), true);
        
        echo json_encode($ObjectResult);
    }
    
    public function actionUpdate() {
        $model = new Repair();
        
        $ObjectResult = array(
            'result' => 0,
            'id' => 0,
            'html' => '',
        );
        if (isset($_POST['Repr_id']))
            $model->getModelPk($_POST['Repr_id']);

        if (isset($_POST['Repairs'])) {
            $model->getModelPk($_POST['Repairs']['Repr_id']);
            $model->attributes = $_POST['Repairs'];
            if ($model->validate()) {
                $model->Update();
                $ObjectResult['result'] = 1;
                $ObjectResult['id'] = $model->Repr_id;
                echo json_encode($ObjectResult);
                return;
            }
        }

        $ObjectResult['html'] = $this->renderPartial('_form' . $_POST['Type'], array(
            'model' => $model,
        ), true);
        echo json_encode($ObjectResult);
    }
    
    public function actionGetModel()
    {
        $model = array();
        if (isset($_POST['Repr_id'])) {
            $model = new Repair();
            $model->getModelPk($_POST['Repr_id']);
        }
       
        echo json_encode($model);
    }
    
    public function actionAccept() {
        $ObjectResult = array(
                'result' => 0,
                'id' => 0,
                'html' => '',
            );
        
        if (isset($_POST['Repairs'])) {
            $sp = new StoredProc();
            $sp->ProcedureName = 'ACCEPT_Repairs';
            $sp->ParametersRefresh();
            $sp->Parameters[0]['Value'] = $_POST['Repairs']['Repr_id'];
            $sp->Parameters[1]['Value'] = $_POST['Repairs']['Mstr_id'];
            $sp->Parameters[2]['Value'] = $_POST['Repairs']['Egnr_id'];
            $sp->Parameters[3]['Value'] = Yii::app()->user->Employee_id;
            $sp->CheckParam = true;
            $Res = $sp->Execute();
            
            $ObjectResult['result'] = 1;
            $ObjectResult['id'] = 0;
            echo json_encode($ObjectResult);
            return;
        }

        echo json_encode($ObjectResult);
    }
    
    public function actionSendAgree() {
        $ObjectResult = array(
                'result' => 0,
                'id' => 0,
                'html' => '',
            );
        
        if (isset($_POST['Repairs'])) {
            $sp = new StoredProc();
            $sp->ProcedureName = 'SEND_RepairAgree';
            $sp->ParametersRefresh();
            $sp->Parameters[0]['Value'] = $_POST['Repairs']['Repr_id'];
            $sp->Parameters[1]['Value'] = Yii::app()->user->Employee_id;
            $sp->CheckParam = true;
            $Res = $sp->Execute();
            
            $ObjectResult['result'] = 1;
            $ObjectResult['id'] = 0;
            echo json_encode($ObjectResult);
            return;
        }

        echo json_encode($ObjectResult);
    }
    
}