<?php

class InspActEquipCharacteristicsController extends Controller
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
                    'actions'=>array('Index', 'view'),
                    'roles'=>array('ViewInspActEquipCharacteristics'),
            ),
            array('allow', 
                    'actions'=>array('create'),
                    'roles'=>array('CreateInspActEquipCharacteristics'),
            ),
            array('allow', 
                    'actions'=>array('update'),
                    'roles'=>array('UpdateInspActEquipCharacteristics'),
            ),
            array('allow', 
                    'actions'=>array('delete'),
                    'roles'=>array('DeleteInspActEquipCharacteristics'),
            ),
            array('deny',  // deny all users
                    'users'=>array('*'),
            ),
        );
    }

    public function actionCreate()
    {
        $model = new InspActEquipCharacteristics();
        $ObjectResult = array(
                'result' => 0,
                'id' => 0,
                'html' => '',
            );
        
        if (isset($_POST['ActEquip_id'])) {
            $model->ActEquip_id = $_POST['ActEquip_id'];
        }
        
        if (isset($_POST['InspActEquipCharacteristics'])) {
            $model->attributes = $_POST['InspActEquipCharacteristics'];
            if ($model->validate()) {
                $Res = $model->Insert();
                $ObjectResult['result'] = 1;
                $ObjectResult['id'] = $Res['Characteristic_id'];
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
        $model = new InspActEquipCharacteristics();
        $ObjectResult = array(
                'result' => 0,
                'id' => 0,
                'html' => '',
            );
        if (isset($_POST['Characteristic_id']))
            $model->getModelPk($_POST['Characteristic_id']);

        if (isset($_POST['InspActEquipCharacteristics'])) {
            $model->getModelPk($_POST['InspActEquipCharacteristics']['Characteristic_id']);
            $model->attributes = $_POST['InspActEquipCharacteristics'];
            if ($model->validate()) {
                $model->Update();
                $ObjectResult['result'] = 1;
                $ObjectResult['id'] = $model->Characteristic_id;
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
        
        if (isset($_POST['Characteristic_id'])) {
            $model = new InspActEquipCharacteristics();
            $model->getModelPk($_POST['Characteristic_id']);
            if ($model->validate()) {
                $model->delete();
                $ObjectResult['result'] = 1;
                $ObjectResult['id'] = $model->Characteristic_id;
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
        
        if (isset($_POST['ActEquip_id'])) {
            $ObjectResult['result'] = 1;
            $ObjectResult['id'] = 0;
            $ObjectResult['html'] = $this->renderPartial('index', array(
                'ActEquip_id' => $_POST['ActEquip_id'],
            ), true);
            
        }
        echo json_encode($ObjectResult);
    }
}







