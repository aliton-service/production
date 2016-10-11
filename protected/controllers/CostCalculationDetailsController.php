<?php

class CostCalculationDetailsController extends Controller
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
                'roles'=>array('ViewCostCalculationDetails'),
            ),
            array('allow', 
                'actions'=>array('create'),
                'roles'=>array('CreateCostCalculationDetails'),
            ),
            array('allow', 
                'actions'=>array('update'),
                'roles'=>array('UpdateCostCalculationDetails'),
            ),
            array('allow', 
                'actions'=>array('delete'),
                'roles'=>array('DeleteCostCalculationDetails'),
            ),
            array('deny',  // deny all users
                'users'=>array('*'),
            ),
        );
    }

    public function actionCreate()
    {
        $model = new CostCalculationDetails();
        $ObjectResult = array(
            'result' => 0,
            'id' => 0,
            'html' => '',
        );
        if (isset($_POST['CostCalculationDetails'])) {
            $model->attributes = $_POST['CostCalculationDetails'];
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
        $model = new CostCalculationDetails();
        $ObjectResult = array(
            'result' => 0,
            'id' => 0,
            'html' => '',
        );
        if (isset($_POST['calc_id']))
            $model->getModelPk($_POST['calc_id']);

        if (isset($_POST['CostCalculationDetails'])) {
            $model->getModelPk($_POST['CostCalculationDetails']['calc_id']);
            $model->attributes = $_POST['CostCalculationDetails'];
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
            $model = new CostCalculationDetails();
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
            $model = new CostCalculationDetails();
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
    
}

