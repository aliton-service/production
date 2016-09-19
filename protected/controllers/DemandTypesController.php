<?php

class DemandTypesController extends Controller
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
                    'roles'=>array('ViewDemandTypes'),
            ),
            array('allow', 
                    'actions'=>array('create'),
                    'roles'=>array('CreateDemandTypes'),
            ),
            array('allow', 
                    'actions'=>array('update'),
                    'roles'=>array('UpdateDemandTypes'),
            ),
            array('allow', 
                    'actions'=>array('delete'),
                    'roles'=>array('DeleteDemandTypes'),
            ),
            array('deny',  // deny all users
                    'users'=>array('*'),
            ),
        );
    }

    public function actionCreate()
    {
        $model = new DemandTypes();
        $ObjectResult = array(
                'result' => 0,
                'id' => 0,
                'html' => '',
            );
        if (isset($_POST['DemandTypes'])) {
            $model->attributes = $_POST['DemandTypes'];
            if ($model->validate()) {
                $Res = $model->Insert();
                $ObjectResult['result'] = 1;
                $ObjectResult['id'] = $Res['DemandType_id'];
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
        $model = new DemandTypes();
        $ObjectResult = array(
                'result' => 0,
                'id' => 0,
                'html' => '',
            );
        if (isset($_POST['DemandType_id']))
            $model->getModelPk($_POST['DemandType_id']);

        if (isset($_POST['DemandTypes'])) {
            $model->getModelPk($_POST['DemandTypes']['DemandType_id']);
            $model->attributes = $_POST['DemandTypes'];
            if ($model->validate()) {
                $model->Update();
                $ObjectResult['result'] = 1;
                $ObjectResult['id'] = $model->DemandType_id;
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
        
        if (isset($_POST['DemandType_id'])) {
            $model = new DemandTypes();
            $model->getModelPk($_POST['DemandType_id']);
            if ($model->validate()) {
                $model->delete();
                $ObjectResult['result'] = 1;
                $ObjectResult['id'] = $model->DemandType_id;
                echo json_encode($ObjectResult);
                return;
            }
        }
        echo json_encode($ObjectResult);
    }

    public function actionIndex()
    {
        $this->title = 'Типы заявок';
        $this->render('index');
    }
}

