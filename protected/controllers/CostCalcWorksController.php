<?php

class CostCalcWorksController extends Controller
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
                'roles'=>array('ViewCostCalcWorks'),
            ),
            array('allow', 
                'actions'=>array('create'),
                'roles'=>array('CreateCostCalcWorks'),
            ),
            array('allow', 
                'actions'=>array('update'),
                'roles'=>array('UpdateCostCalcWorks'),
            ),
            array('allow', 
                'actions'=>array('delete'),
                'roles'=>array('DeleteCostCalcWorks'),
            ),
            array('deny',  // deny all users
                'users'=>array('*'),
            ),
        );
    }

    public function actionCreate()
    {
        $model = new CostCalcWorks();
        
        if (isset($_POST['calc_id'])) {
            $model->calc_id = $_POST['calc_id'];
        }
        
        $ObjectResult = array(
            'result' => 0,
            'id' => 0,
            'html' => '',
        );
        
        if (isset($_POST['CostCalcWorks'])) {
            $model->attributes = $_POST['CostCalcWorks'];
            if ($model->validate()) {
//                $model->Insert();
                $Res = $model->Insert();
                $ObjectResult['result'] = 1;
                $ObjectResult['id'] = $Res['ccwr_id'];
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
        $model = new CostCalcWorks();
        $ObjectResult = array(
            'result' => 0,
            'id' => 0,
            'html' => '',
        );
        if (isset($_POST['ccwr_id']))
            $model->getModelPk($_POST['ccwr_id']);

        if (isset($_POST['CostCalcWorks'])) {
            $model->getModelPk($_POST['CostCalcWorks']['ccwr_id']);
            $model->attributes = $_POST['CostCalcWorks'];
            if ($model->validate()) {
                $model->Update();
                $ObjectResult['result'] = 1;
                $ObjectResult['id'] = $model->ccwr_id;
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
        
        if (isset($_POST['ccwr_id'])) {
            $model = new CostCalcWorks();
            $model->getModelPk($_POST['ccwr_id']);
            $model->Delete();
            $ObjectResult['result'] = 1;
            $ObjectResult['id'] = $model->ccwr_id;
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
        
        if (isset($_GET['ccwr_id']))
        {
            $model = new CostCalcWorks();
            $model->getModelPk($_GET['ccwr_id']);
            $this->title = $model->CostCalcType;
            
            $ObjectResult['result'] = 1;
            $ObjectResult['id'] = $model->ccwr_id;
            
            $ObjectResult['html'] = $this->render('index', array(
                'model' => $model,
            ));
            echo json_encode($ObjectResult);
        }
    }
    
}

