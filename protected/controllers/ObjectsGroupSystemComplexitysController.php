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
                    'roles'=>array('ViewObjectsGroupSystemComplexitys'),
            ),
            array('allow', 
                    'actions'=>array('create'),
                    'roles'=>array('CreateObjectsGroupSystemComplexitys'),
            ),
            array('allow', 
                    'actions'=>array('update'),
                    'roles'=>array('UpdateObjectsGroupSystemComplexitys'),
            ),
            array('allow', 
                    'actions'=>array('delete'),
                    'roles'=>array('DeleteObjectsGroupSystemComplexitys'),
            ),
            array('deny',  // deny all users
                    'users'=>array('*'),
            ),
        );
    }

    public function actionCreate()
    {
        $model = new ObjectsGroupSystemComplexitys();
        $ObjectResult = array(
                'result' => 0,
                'id' => 0,
                'html' => '',
            );
        
        if (isset($_POST['Ogst_id'])) {
            $model->Ogst_id = $_POST['Ogst_id'];
        }
        
        if (isset($_POST['ObjectGr_id'])) {
            $model->ObjectGr_id = $_POST['ObjectGr_id'];
        }
        
        if (isset($_POST['ObjectsGroupSystemComplexitys'])) {
            $model->attributes = $_POST['ObjectsGroupSystemComplexitys'];
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
        $model = new ObjectsGroupSystemComplexitys();
        $ObjectResult = array(
                'result' => 0,
                'id' => 0,
                'html' => '',
            );
        if (isset($_POST['Ogsc_id']))
            $model->getModelPk($_POST['Ogsc_id']);

        if (isset($_POST['ObjectsGroupSystemComplexitys'])) {
            $model->getModelPk($_POST['ObjectsGroupSystemComplexitys']['Ogsc_id']);
            $model->attributes = $_POST['ObjectsGroupSystemComplexitys'];
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
            $model = new ObjectsGroupSystemComplexitys();
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
        
        $ObjectGr_id = 0;
        if (isset($_POST['ObjectGr_id']))
            $ObjectGr_id = $_POST['ObjectGr_id'];
        
        if (isset($_POST['Ogst_id'])) {
            $ObjectResult['result'] = 1;
            $ObjectResult['id'] = 0;
            $ObjectResult['html'] = $this->renderPartial('index', array(
                'Ogst_id' => $_POST['Ogst_id'],
                'ObjectGr_id' => $_POST['ObjectGr_id'],
            ), true);
            
        }
        echo json_encode($ObjectResult);
    }
}









