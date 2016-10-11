<?php

class ObjectsGroupCostCalculationsController extends Controller
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
                'roles'=>array('ViewObjectsGroupCostCalculations'),
            ),
            array('allow', 
                'actions'=>array('create'),
                'roles'=>array('CreateObjectsGroupCostCalculations'),
            ),
            array('allow', 
                'actions'=>array('update'),
                'roles'=>array('UpdateObjectsGroupCostCalculations'),
            ),
            array('allow', 
                'actions'=>array('delete'),
                'roles'=>array('DeleteObjectsGroupCostCalculations'),
            ),
            array('deny',  // deny all users
                'users'=>array('*'),
            ),
        );
    }

    public function actionCreate()
    {
        $model = new ObjectsGroupCostCalculations();
        $ObjectResult = array(
            'result' => 0,
            'id' => 0,
            'html' => '',
        );
        if (isset($_POST['ObjectsGroupCostCalculations'])) {
            $model->attributes = $_POST['ObjectsGroupCostCalculations'];
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
        $model = new ObjectsGroupCostCalculations();
        $ObjectResult = array(
            'result' => 0,
            'id' => 0,
            'html' => '',
        );
        if (isset($_POST['calc_id']))
            $model->getModelPk($_POST['calc_id']);

        if (isset($_POST['ObjectsGroupCostCalculations'])) {
            $model->getModelPk($_POST['ObjectsGroupCostCalculations']['calc_id']);
            $model->attributes = $_POST['ObjectsGroupCostCalculations'];
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
            $model = new ObjectsGroupCostCalculations();
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
        if (isset($_GET['ObjectGr_id']))
        {
            $ObjectGr_id = $_GET['ObjectGr_id'];

            $this->renderPartial('index', array(
                'ObjectGr_id' => $ObjectGr_id,
            ), false, true);
        }
    }
    
}

