<?php

class SpecialDaysController extends Controller
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
                    'roles'=>array('ViewSpecialDays'),
            ),
            array('allow', 
                    'actions'=>array('create'),
                    'roles'=>array('CreateSpecialDays'),
            ),
            array('allow', 
                    'actions'=>array('update'),
                    'roles'=>array('UpdateSpecialDays'),
            ),
            array('allow', 
                    'actions'=>array('delete'),
                    'roles'=>array('DeleteSpecialDays'),
            ),
            array('deny',  // deny all users
                    'users'=>array('*'),
            ),
        );
    }

    public function actionCreate()
    {
        $model = new SpecialDays();
        $ObjectResult = array(
                'result' => 0,
                'id' => 0,
                'html' => '',
            );
        if (isset($_POST['SpecialDays'])) {
            $model->attributes = $_POST['SpecialDays'];
            if ($model->validate()) {
                $Res = $model->Insert();
                $ObjectResult['result'] = 1;
                $ObjectResult['id'] = $Res['sday_id'];
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
        $model = new SpecialDays();
        $ObjectResult = array(
                'result' => 0,
                'id' => 0,
                'html' => '',
            );
        if (isset($_POST['sday_id']))
            $model->getModelPk($_POST['sday_id']);

        if (isset($_POST['SpecialDays'])) {
            $model->getModelPk($_POST['SpecialDays']['sday_id']);
            $model->attributes = $_POST['SpecialDays'];
            if ($model->validate()) {
                $model->Update();
                $ObjectResult['result'] = 1;
                $ObjectResult['id'] = $model->sday_id;
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
        
        if (isset($_POST['sday_id'])) {
            $model = new SpecialDays();
            $model->getModelPk($_POST['sday_id']);
            if ($model->validate()) {
                $model->delete();
                $ObjectResult['result'] = 1;
                $ObjectResult['id'] = $model->sday_id;
                echo json_encode($ObjectResult);
                return;
            }
        }
        echo json_encode($ObjectResult);
    }

    public function actionIndex()
    {
        $this->title = 'Праздничные, выходные, рабочие дни';
        $this->render('index');
    }
}





