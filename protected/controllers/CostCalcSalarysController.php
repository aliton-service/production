<?php

class CostCalcSalarysController extends Controller
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
                'roles'=>array('ViewCostCalcSalarys'),
            ),
            array('allow', 
                'actions'=>array('create'),
                'roles'=>array('CreateCostCalcSalarys'),
            ),
            array('allow', 
                'actions'=>array('update'),
                'roles'=>array('UpdateCostCalcSalarys'),
            ),
            array('allow', 
                'actions'=>array('delete'),
                'roles'=>array('DeleteCostCalcSalarys'),
            ),
            array('allow',
                'actions'=>array('accept'),
                'roles'=>array('AcceptCostCalcSalarys'),
            ),
            array('deny',  // deny all users
                'users'=>array('*'),
            ),
        );
    }

    public function actionCreate()
    {
        $model = new CostCalcSalarys();
        
        if (isset($_POST['calc_id'])) {
            $model->calc_id = $_POST['calc_id'];
        }
                
        $ObjectResult = array(
            'result' => 0,
            'id' => 0,
            'html' => '',
        );
        
        if (isset($_POST['CostCalcSalarys'])) {
            $model->attributes = $_POST['CostCalcSalarys'];
            if ($model->validate()) {
                $Res = $model->Insert();
                $ObjectResult['result'] = 1;
                $ObjectResult['id'] = $Res['ccsl_id'];
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
        $model = new CostCalcSalarys();
        $ObjectResult = array(
            'result' => 0,
            'id' => 0,
            'html' => '',
        );
        if (isset($_POST['ccsl_id'])) 
            $model->getModelPk($_POST['ccsl_id']);
        
        if (isset($_POST['CostCalcSalarys'])) {
            $model->getModelPk($_POST['CostCalcSalarys']['ccsl_id']);
            $model->attributes = $_POST['CostCalcSalarys'];
            if ($model->validate()) {
                $model->Update();
                $ObjectResult['result'] = 1;
                $ObjectResult['id'] = $model->ccsl_id;
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
        
        if (isset($_POST['ccsl_id'])) {
            $model = new CostCalcSalarys();
            $model->getModelPk($_POST['ccsl_id']);
            $model->Delete();
            $ObjectResult['result'] = 1;
            $ObjectResult['id'] = $model->ccsl_id;
            echo json_encode($ObjectResult);
            return;
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
        
        if (isset($_GET['ccsl_id']))
        {
            $model = new CostCalcSalarys();
            $model->getModelPk($_GET['ccsl_id']);
            $this->title = $model->CostCalcType;
            
            $ObjectResult['result'] = 1;
            $ObjectResult['id'] = $model->ccsl_id;
            
            $ObjectResult['html'] = $this->render('index', array(
                'model' => $model,
            ));
            echo json_encode($ObjectResult);
        }
    }
    
    
    public function actionAccept() 
    {
        if (isset($_POST['ccsl_id'])) {
            $model = new CostCalcSalarys();
            $model->getModelPk($_POST['ccsl_id']);
            
            if ($model->date_accept == false || $model->date_accept == null) {
                $sp = new StoredProc();
                $sp->ProcedureName = 'ACCEPT_CostCalcSalarys';
                $sp->ParametersRefresh();
                $sp->Parameters[0]['Value'] = $_POST['ccsl_id'];
                $sp->CheckParam = true;
                $sp->Execute();
            }
        }
    }
}

