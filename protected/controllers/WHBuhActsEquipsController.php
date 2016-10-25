<?php

class WHBuhActsEquipsController extends Controller
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
                    'roles'=>array('ViewWHBuhActsEquips'),
            ),
            array('allow', 
                    'actions'=>array('create'),
                    'roles'=>array('CreateWHBuhActsEquips'),
            ),
            array('allow', 
                    'actions'=>array('update'),
                    'roles'=>array('UpdateWHBuhActsEquips'),
            ),
            array('allow', 
                    'actions'=>array('delete'),
                    'roles'=>array('DeleteWHBuhActsEquips'),
            ),
            array('deny',  // deny all users
                    'users'=>array('*'),
            ),
        );
    }

    public function actionCreate()
    {
        $model = new WHBuhActsEquips();
        $ObjectResult = array(
            'result' => 0,
            'id' => 0,
            'html' => '',
        );
        if (isset($_POST['WHBuhActsEquips'])) {
            $model->attributes = $_POST['WHBuhActsEquips'];
            if ($model->validate()) {
                $Res = $model->Insert();
                $ObjectResult['result'] = 1;
                $ObjectResult['id'] = $Res['dadt_id'];
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
        $model = new WHBuhActsEquips();
        $ObjectResult = array(
            'result' => 0,
            'id' => 0,
            'html' => '',
        );
        if (isset($_POST['dadt_id']))
            $model->getModelPk($_POST['dadt_id']);

        if (isset($_POST['WHBuhActsEquips'])) {
            $model->getModelPk($_POST['WHBuhActsEquips']['dadt_id']);
            $model->attributes = $_POST['WHBuhActsEquips'];
            if ($model->validate()) {
                $model->Update();
                $ObjectResult['result'] = 1;
                $ObjectResult['id'] = $model->dadt_id;
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
        
        if (isset($_POST['dadt_id'])) {
            $model = new WHBuhActsEquips();
            $model->getModelPk($_POST['dadt_id']);
            if ($model->validate()) {
                $model->Delete();
                $ObjectResult['result'] = 1;
                $ObjectResult['id'] = $model->dadt_id;
                echo json_encode($ObjectResult);
                return;
            }
        }
        echo json_encode($ObjectResult);
    }

    public function actionIndex()
    {
        $model = new WHBuhActsEquips();
        $ObjectResult = array(
            'result' => 0,
            'id' => 0,
            'html' => '',
        );

        $this->title = 'Бухгалтерский акт';

        if (isset($_POST['dadt_id']))
            $model->getModelPk($_POST['dadt_id']);

        echo json_encode($ObjectResult);
    }
    
}

