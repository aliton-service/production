<?php

class CostCalcEquipsController extends Controller
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
                'roles'=>array('ViewCostCalcEquips'),
            ),
            array('allow', 
                'actions'=>array('create'),
                'roles'=>array('CreateCostCalcEquips'),
            ),
            array('allow', 
                'actions'=>array('update'),
                'roles'=>array('UpdateCostCalcEquips'),
            ),
            array('allow', 
                'actions'=>array('delete'),
                'roles'=>array('DeleteCostCalcEquips'),
            ),
            array('deny',  // deny all users
                'users'=>array('*'),
            ),
        );
    }

    public function actionCreate()
    {
        $model = new CostCalcEquips();
        
        if (isset($_POST['calc_id'])) {
            $model->calc_id = $_POST['calc_id'];
        }
        
        $ObjectResult = array(
            'result' => 0,
            'id' => 0,
            'html' => '',
        );
        
        if (isset($_POST['CostCalcEquips'])) {
            $model->attributes = $_POST['CostCalcEquips'];
            if ($model->validate()) {
//                $model->Insert();
                $Res = $model->Insert();
                $ObjectResult['result'] = 1;
                $ObjectResult['id'] = $Res['cceq_id'];
                echo json_encode($ObjectResult);
//                echo 1;
                return;
            } 
        }
        
//        $this->renderPartial('_form', array(
//            'model' => $model
//        ));
        
        $ObjectResult['html'] = $this->renderPartial('_form', array(
            'model' => $model,
        ), true);
        echo json_encode($ObjectResult);
    }


    public function actionUpdate()
    {
        $model = new CostCalcEquips();
        $ObjectResult = array(
            'result' => 0,
            'id' => 0,
            'html' => '',
        );
        if (isset($_POST['cceq_id']))
            $model->getModelPk($_POST['cceq_id']);

        if (isset($_POST['CostCalcEquips'])) {
            $model->getModelPk($_POST['CostCalcEquips']['cceq_id']);
            $model->attributes = $_POST['CostCalcEquips'];
            if ($model->validate()) {
                $model->Update();
                $ObjectResult['result'] = 1;
                $ObjectResult['id'] = $model->cceq_id;
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
        
        if (isset($_POST['cceq_id'])) {
            $model = new CostCalcEquips();
            $model->getModelPk($_POST['cceq_id']);
            $model->Delete();
            $ObjectResult['result'] = 1;
            $ObjectResult['id'] = $model->cceq_id;
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
        
        if (isset($_GET['cceq_id']))
        {
            $model = new CostCalcEquips();
            $model->getModelPk($_GET['cceq_id']);
            $this->title = $model->CostCalcType;
            
            $ObjectResult['result'] = 1;
            $ObjectResult['id'] = $model->cceq_id;
            
            $ObjectResult['html'] = $this->render('index', array(
                'model' => $model,
            ));
            echo json_encode($ObjectResult);
        }
    }
    
}

