<?php

class TotalCostController extends Controller
{
    public $layout = '//layouts/column2';
    public $title = '';

    public function filters()
    {
        return array(
            'accessControl', // perform access control for CRUD operations
        );
    }

    public function accessRules()
    {
        return array(
            array('allow',
                'actions'=>array('index', 'view'),
                'roles'=>array('ViewTotalCost'),
            ),
            array('allow', 
                'actions'=>array('create'),
                'roles'=>array('CreateTotalCost'),
            ),
            array('allow', 
                'actions'=>array('update'),
                'roles'=>array('UpdateTotalCost'),
            ),
            array('allow', 
                'actions'=>array('delete'),
                'roles'=>array('DeleteTotalCost'),
            ),
            array('allow',
                'actions'=>array('accept'),
                'roles'=>array('AcceptTotalCost'),
            ),
            array('allow',
                'actions'=>array('cancelaccept'),
                'roles'=>array('CancelacceptTotalCost'),
            ),
            array('deny',  // deny all users
                'users'=>array('*'),
            ),
        );
    }

    public function actionCreate()
    {
        $model = new TotalCost();
        $ObjectResult = array(
            'result' => 0,
            'id' => 0,
            'html' => '',
        );
        if (isset($_POST['CostCalcDetails'])) {
            $model->attributes = $_POST['CostCalcDetails'];
            if ($model->validate()) {
                $Res = $model->Insert();
                $ObjectResult['result'] = 1;
                $ObjectResult['id'] = $Res['calc_id'];
                echo json_encode($ObjectResult);
                return;
            } 
        }
        
        $ObjectResult['html'] = $this->renderPartial('_form', array(
            'model' => $model,
        ), true);
        echo json_encode($ObjectResult);
    }


    public function actionUpdate()
    {
        $model = new TotalCost();
        $ObjectResult = array(
            'result' => 0,
            'id' => 0,
            'html' => '',
        );
        if (isset($_POST['calc_id']))
            $model->getModelPk($_POST['calc_id']);

        if (isset($_POST['CostCalcDetails'])) {
            $model->getModelPk($_POST['CostCalcDetails']['calc_id']);
            $model->attributes = $_POST['CostCalcDetails'];
            $model->EmplChange = Yii::app()->user->Employee_id;
            if ($model->validate()) {
                $model->Update();
                $ObjectResult['result'] = 1;
                $ObjectResult['id'] = $model->calc_id;
                echo json_encode($ObjectResult);
                return;
            }
        }

        $ObjectResult['html'] = $this->renderPartial('_form', array(
            'model' => $model,
        ), true);
        echo json_encode($ObjectResult);
    }

    public function actionDelete()
    {
        $ObjectResult = array(
            'result' => 0,
            'id' => 0,
            'html' => '',
        );
        
        if (isset($_POST['calc_id'])) {
            $model = new TotalCost();
            $model->getModelPk($_POST['calc_id']);
            if ($model->validate()) {
                $model->Delete();
                $ObjectResult['result'] = 1;
                $ObjectResult['id'] = $model->calc_id;
                echo json_encode($ObjectResult);
                return;
            }
        }
        echo json_encode($ObjectResult);
    }

    public function actionIndex()
    {
        $ObjectResult = array(
            'result' => 0,
            'id' => 0,
            'html' => '',
        );
        
        if (isset($_GET['calc_id']))
        {
            $model = new TotalCost();
            $model->getModelPk($_GET['calc_id']);
            $this->title = $model->CostCalcType;
            
            $ObjectResult['result'] = 1;
            $ObjectResult['id'] = $model->calc_id;
            
            $ObjectResult['html'] = $this->render('index', array(
                'model' => $model,
            ));
            echo json_encode($ObjectResult);
        }
    }
    
    
    public function actionAccept() 
    {
        if (isset($_POST['calc_id'])) {
            $model = new TotalCost();
            $model->getModelPk($_POST['calc_id']);
            
            if ($model->date_ready == false || $model->date_ready == null) {
                $sp = new StoredProc();
                $sp->ProcedureName = 'ACCEPT_CostCalculations';
                $sp->ParametersRefresh();
                $sp->Parameters[0]['Value'] = $_POST['calc_id'];
                $sp->Parameters[1]['Value'] = Yii::app()->user->Employee_id;
                $sp->CheckParam = true;
                $sp->Execute();
            }
        }
    }
    
    public function actionCancelaccept() 
    {
        if (isset($_POST['calc_id'])) {
            $model = new TotalCost();
            $model->getModelPk($_POST['calc_id']);
            
            if ($model->date_ready !== false || $model->date_ready !== null) {
                $sp = new StoredProc();
                $sp->ProcedureName = 'UNDO_Agreed';
                $sp->ParametersRefresh();
                $sp->Parameters[0]['Value'] = $_POST['calc_id'];
                $sp->CheckParam = true;
                $sp->Execute();
            }
        }
    }
}

