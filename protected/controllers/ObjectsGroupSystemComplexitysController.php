<?php

class ObjectsGroupSystemComplexitysController extends Controller
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
                    'roles'=>array('ViewObjectsGroupSystemCompexitys'),
            ),
            array('allow', 
                    'actions'=>array('create'),
                    'roles'=>array('CreateObjectsGroupSystemCompexitys'),
            ),
            array('allow', 
                    'actions'=>array('update'),
                    'roles'=>array('UpdateObjectsGroupSystemCompexitys'),
            ),
            array('allow', 
                    'actions'=>array('delete'),
                    'roles'=>array('DeleteObjectsGroupSystemCompexitys'),
            ),
            array('deny',  // deny all users
                    'users'=>array('*'),
            ),
        );
    }

    public function actionCreate()
    {
        $model = new ObjectsGroupSystemCompexitys();
        $ObjectResult = array(
                'result' => 0,
                'id' => 0,
                'html' => '',
            );
        
        if (isset($_POST['Ogst_id'])) {
            $model->Ogst_id = $_POST['Ogst_id'];
        }
        
        if (isset($_POST['ObjectsGroupSystemCompexitys'])) {
            $model->attributes = $_POST['ObjectsGroupSystemCompexitys'];
            if ($model->validate()) {
                $Res = $model->Insert();
                $ObjectResult['result'] = 1;
                $ObjectResult['id'] = $Res['Ogsc_id'];
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
        $model = new ObjectsGroupSystemCompexitys();
        $ObjectResult = array(
                'result' => 0,
                'id' => 0,
                'html' => '',
            );
        if (isset($_POST['Ogsc_id']))
            $model->getModelPk($_POST['Ogsc_id']);

        if (isset($_POST['ObjectsGroupSystemCompexitys'])) {
            $model->getModelPk($_POST['ObjectsGroupSystemCompexitys']['Ogsc_id']);
            $model->attributes = $_POST['ObjectsGroupSystemCompexitys'];
            if ($model->validate()) {
                $model->Update();
                $ObjectResult['result'] = 1;
                $ObjectResult['id'] = $model->Ogsc_id;
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
        
        if (isset($_POST['Ogsc_id'])) {
            $model = new ObjectsGroupSystemCompexitys();
            $model->getModelPk($_POST['Ogsc_id']);
            if ($model->validate()) {
                $model->delete();
                $ObjectResult['result'] = 1;
                $ObjectResult['id'] = $model->Ogsc_id;
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
        
        if (isset($_POST['Ogst_id'])) {
            $ObjectResult['result'] = 1;
            $ObjectResult['id'] = 0;
            $ObjectResult['html'] = $this->renderPartial('index', array(
                'Ogst_id' => $_POST['Ogst_id'],
            ), true);
            
        }
        echo json_encode($ObjectResult);
    }
}









