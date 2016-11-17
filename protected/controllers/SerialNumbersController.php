<?php

class SerialNumbersController extends Controller
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
                    'roles'=>array('ViewSerialNumbers'),
            ),
            array('allow', 
                    'actions'=>array('create'),
                    'roles'=>array('CreateSerialNumbers'),
            ),
            array('allow', 
                    'actions'=>array('update'),
                    'roles'=>array('UpdateSerialNumbers'),
            ),
            array('allow', 
                    'actions'=>array('delete'),
                    'roles'=>array('DeleteSerialNumbers'),
            ),
            array('deny',  // deny all users
                    'users'=>array('*'),
            ),
        );
    }

    public function actionCreate()
    {
        $model = new SerialNumbers();
        $ObjectResult = array(
                'result' => 0,
                'id' => 0,
                'html' => '',
            );
        
        if (isset($_POST['dadt_id'])) {
            $model->dadt_id = $_POST['dadt_id'];
        }
        
        if (isset($_POST['SerialNumbers'])) {
            $model->attributes = $_POST['SerialNumbers'];
            if ($model->validate()) {
                $Res = $model->Insert();
                $ObjectResult['result'] = 1;
                $ObjectResult['id'] = $Res['SystemCompetitor_id'];
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
        $model = new SerialNumbers();
        $ObjectResult = array(
                'result' => 0,
                'id' => 0,
                'html' => '',
            );
        if (isset($_POST['SystemCompetitor_id']))
            $model->getModelPk($_POST['SystemCompetitor_id']);

        if (isset($_POST['SerialNumbers'])) {
            $model->getModelPk($_POST['SerialNumbers']['SystemCompetitor_id']);
            $model->attributes = $_POST['SerialNumbers'];
            if ($model->validate()) {
                $model->Update();
                $ObjectResult['result'] = 1;
                $ObjectResult['id'] = $model->SystemCompetitor_id;
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
        
        if (isset($_POST['SystemCompetitor_id'])) {
            $model = new SerialNumbers();
            $model->getModelPk($_POST['SystemCompetitor_id']);
            if ($model->validate()) {
                $model->delete();
                $ObjectResult['result'] = 1;
                $ObjectResult['id'] = $model->SystemCompetitor_id;
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
        
        if (isset($_POST['dadt_id'])) {
            $ObjectResult['result'] = 1;
            $ObjectResult['id'] = 0;
            $ObjectResult['html'] = $this->renderPartial('index', array(
                'dadt_id' => $_POST['dadt_id'],
            ), true);
            
        }
        echo json_encode($ObjectResult);
    }
}







