<?php

class WHBuhActsController extends Controller
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
                    'roles'=>array('ViewWHBuhActs'),
            ),
            array('allow', 
                    'actions'=>array('create'),
                    'roles'=>array('CreateWHBuhActs'),
            ),
            array('allow', 
                    'actions'=>array('update'),
                    'roles'=>array('UpdateWHBuhActs'),
            ),
            array('allow', 
                    'actions'=>array('delete'),
                    'roles'=>array('DeleteWHBuhActs'),
            ),
            array('deny',  // deny all users
                    'users'=>array('*'),
            ),
        );
    }

    public function actionCreate()
    {
        $model = new WHBuhActs();
        $ObjectResult = array(
            'result' => 0,
            'id' => 0,
            'html' => '',
        );
        if (isset($_POST['WHBuhActs'])) {
            $model->attributes = $_POST['WHBuhActs'];
            if ($model->validate()) {
                $Res = $model->Insert();
                $ObjectResult['result'] = 1;
                $ObjectResult['id'] = $Res['docm_id'];
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
        $model = new WHBuhActs();
        $ObjectResult = array(
            'result' => 0,
            'id' => 0,
            'html' => '',
        );
        if (isset($_POST['docm_id']))
            $model->getModelPk($_POST['docm_id']);

        if (isset($_POST['WHBuhActs'])) {
            $model->getModelPk($_POST['WHBuhActs']['docm_id']);
            $model->attributes = $_POST['WHBuhActs'];
            if ($model->validate()) {
                $model->Update();
                $ObjectResult['result'] = 1;
                $ObjectResult['id'] = $model->docm_id;
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
        
        if (isset($_POST['docm_id'])) {
            $model = new WHBuhActs();
            $model->getModelPk($_POST['docm_id']);
            if ($model->validate()) {
                $model->Delete();
                $ObjectResult['result'] = 1;
                $ObjectResult['id'] = $model->docm_id;
                echo json_encode($ObjectResult);
                return;
            }
        }
        echo json_encode($ObjectResult);
    }

    public function actionIndex()
    {
        if (isset($_GET['docm_id'])) {
        $model = new WHBuhActs();
        $ObjectResult = array(
            'result' => 0,
            'id' => 0,
            'html' => '',
        );

        $this->title = 'Бухгалтерский акт';

            $model->getModelPk($_GET['docm_id']);

            $ObjectResult['result'] = 1;
            $ObjectResult['id'] = $model->docm_id;
            $ObjectResult['html'] = $this->render('index', array(
                'model' => $model,
            ));
        echo json_encode($ObjectResult);
        }
    }
    
}

