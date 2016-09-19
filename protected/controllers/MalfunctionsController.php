<?php

class MalfunctionsController extends Controller
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
                    'roles'=>array('ViewMalfunctions'),
            ),
            array('allow', 
                    'actions'=>array('create'),
                    'roles'=>array('CreateMalfunctions'),
            ),
            array('allow', 
                    'actions'=>array('update'),
                    'roles'=>array('UpdateMalfunctions'),
            ),
            array('allow', 
                    'actions'=>array('delete'),
                    'roles'=>array('DeleteMalfunctions'),
            ),
            array('deny',  // deny all users
                    'users'=>array('*'),
            ),
        );
    }

    public function actionCreate()
    {
        $model = new Malfunctions();
        $ObjectResult = array(
                'result' => 0,
                'id' => 0,
                'html' => '',
            );
        if (isset($_POST['Malfunctions'])) {
            $model->attributes = $_POST['Malfunctions'];
            if ($model->validate()) {
                $Res = $model->Insert();
                $ObjectResult['result'] = 1;
                $ObjectResult['id'] = $Res['Malfunction_id'];
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
        $model = new Malfunctions();
        $ObjectResult = array(
                'result' => 0,
                'id' => 0,
                'html' => '',
            );
        if (isset($_POST['Malfunction_id']))
            $model->getModelPk($_POST['Malfunction_id']);

        if (isset($_POST['Malfunctions'])) {
            $model->getModelPk($_POST['Malfunctions']['Malfunction_id']);
            $model->attributes = $_POST['Malfunctions'];
            if ($model->validate()) {
                $model->Update();
                $ObjectResult['result'] = 1;
                $ObjectResult['id'] = $model->Malfunction_id;
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
        
        if (isset($_POST['Malfunction_id'])) {
            $model = new Malfunctions();
            $model->getModelPk($_POST['Malfunction_id']);
            if ($model->validate()) {
                $model->delete();
                $ObjectResult['result'] = 1;
                $ObjectResult['id'] = $model->Malfunction_id;
                echo json_encode($ObjectResult);
                return;
            }
        }
        echo json_encode($ObjectResult);
    }

    public function actionIndex()
    {
        $this->title = 'Неисправность';
        $this->render('index');
    }
}

