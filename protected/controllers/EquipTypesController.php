<?php

class EquipTypesController extends Controller
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
                    'roles'=>array('ViewEquipTypes'),
            ),
            array('allow', 
                    'actions'=>array('create'),
                    'roles'=>array('CreateEquipTypes'),
            ),
            array('allow', 
                    'actions'=>array('update'),
                    'roles'=>array('UpdateEquipTypes'),
            ),
            array('allow', 
                    'actions'=>array('delete'),
                    'roles'=>array('DeleteEquipTypes'),
            ),
            array('deny',  // deny all users
                    'users'=>array('*'),
            ),
        );
    }

    public function actionCreate()
    {
        $model = new EquipTypes();
        $ObjectResult = array(
                'result' => 0,
                'id' => 0,
                'html' => '',
            );
        if (isset($_POST['EquipTypes'])) {
            $model->attributes = $_POST['EquipTypes'];
            if ($model->validate()) {
                $Res = $model->Insert();
                $ObjectResult['result'] = 1;
                $ObjectResult['id'] = $Res['EquipType_id'];
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
        $model = new EquipTypes();
        $ObjectResult = array(
                'result' => 0,
                'id' => 0,
                'html' => '',
            );
        if (isset($_POST['EquipType_id']))
            $model->getModelPk($_POST['EquipType_id']);

        if (isset($_POST['EquipTypes'])) {
            $model->getModelPk($_POST['EquipTypes']['EquipType_id']);
            $model->attributes = $_POST['EquipTypes'];
            if ($model->validate()) {
                $model->Update();
                $ObjectResult['result'] = 1;
                $ObjectResult['id'] = $model->EquipType_id;
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
        
        if (isset($_POST['EquipType_id'])) {
            $model = new EquipTypes();
            $model->getModelPk($_POST['EquipType_id']);
            if ($model->validate()) {
                $model->delete();
                $ObjectResult['result'] = 1;
                $ObjectResult['id'] = $model->EquipType_id;
                echo json_encode($ObjectResult);
                return;
            }
        }
        echo json_encode($ObjectResult);
    }

    public function actionIndex()
    {
        $this->title = 'Тип оборудования';
        $this->render('index');
    }
}

