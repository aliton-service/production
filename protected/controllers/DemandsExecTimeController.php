<?php

class DemandsExecTimeController extends Controller
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
                    'roles'=>array('ViewDemandsExecTime'),
            ),
            array('allow', 
                    'actions'=>array('create'),
                    'roles'=>array('CreateDemandsExecTime'),
            ),
            array('allow', 
                    'actions'=>array('update'),
                    'roles'=>array('UpdateDemandsExecTime'),
            ),
            array('allow', 
                    'actions'=>array('delete'),
                    'roles'=>array('DeleteDemandsExecTime'),
            ),
            array('deny',  // deny all users
                    'users'=>array('*'),
            ),
        );
    }

    public function actionCreate()
    {
        $model = new DemandsExecTime();
        $ObjectResult = array(
                'result' => 0,
                'id' => 0,
                'html' => '',
            );
        if (isset($_POST['DemandsExecTime'])) {
            $model->attributes = $_POST['DemandsExecTime'];
            if ($model->validate()) {
                $Res = $model->Insert();
                $ObjectResult['result'] = 1;
                $ObjectResult['id'] = $Res['DPrior_id'];
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
        $model = new DemandsExecTime();
        $ObjectResult = array(
                'result' => 0,
                'id' => 0,
                'html' => '',
            );
        if (isset($_POST['DPrior_id']))
            $model->getModelPk($_POST['DPrior_id']);

        if (isset($_POST['DemandsExecTime'])) {
            $model->getModelPk($_POST['DemandsExecTime']['DPrior_id']);
            $model->attributes = $_POST['DemandsExecTime'];
            if ($model->validate()) {
                $model->Update();
                $ObjectResult['result'] = 1;
                $ObjectResult['id'] = $model->DPrior_id;
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
        
        if (isset($_POST['DPrior_id'])) {
            $model = new DemandsExecTime();
            $model->getModelPk($_POST['DPrior_id']);
            if ($model->validate()) {
                $model->delete();
                $ObjectResult['result'] = 1;
                $ObjectResult['id'] = $model->DPrior_id;
                echo json_encode($ObjectResult);
                return;
            }
        }
        echo json_encode($ObjectResult);
    }

    public function actionIndex()
    {
        $this->title = 'Просмотр приоритетов';
        $this->render('index');
    }
}






