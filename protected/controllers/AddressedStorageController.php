<?php

class AddressedStorageController extends Controller
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
                    'roles'=>array('ViewAddressedStorage'),
            ),
            array('allow', 
                    'actions'=>array('create'),
                    'roles'=>array('CreateAddressedStorage'),
            ),
            array('allow', 
                    'actions'=>array('update'),
                    'roles'=>array('UpdateAddressedStorage'),
            ),
            array('allow', 
                    'actions'=>array('delete'),
                    'roles'=>array('DeleteAddressedStorage'),
            ),
            array('deny',  // deny all users
                    'users'=>array('*'),
            ),
        );
    }

    public function actionCreate()
    {
        $model = new AddressedStorage();
        $ObjectResult = array(
                'result' => 0,
                'id' => 0,
                'html' => '',
            );
        
        if (isset($_POST['Equip_id'])) {
            $model->Equip_id = $_POST['Equip_id'];
        }
        
        if (isset($_POST['AddressedStorage'])) {
            $model->attributes = $_POST['AddressedStorage'];
            if ($model->validate()) {
                $Res = $model->Insert();
                $ObjectResult['result'] = 1;
                $ObjectResult['id'] = $Res['Adst_id'];
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
        $model = new AddressedStorage();
        $ObjectResult = array(
                'result' => 0,
                'id' => 0,
                'html' => '',
            );
        if (isset($_POST['Adst_id']))
            $model->getModelPk($_POST['Adst_id']);

        if (isset($_POST['AddressedStorage'])) {
            $model->getModelPk($_POST['AddressedStorage']['Adst_id']);
            $model->attributes = $_POST['AddressedStorage'];
            if ($model->validate()) {
                $model->Update();
                $ObjectResult['result'] = 1;
                $ObjectResult['id'] = $model->Adst_id;
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
        
        if (isset($_POST['Adst_id'])) {
            $model = new AddressedStorage();
            $model->getModelPk($_POST['Adst_id']);
            if ($model->validate()) {
                $model->delete();
                $ObjectResult['result'] = 1;
                $ObjectResult['id'] = $model->Adst_id;
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
        
        if (isset($_POST['Equip_id'])) {
            $ObjectResult['result'] = 1;
            $ObjectResult['id'] = 0;
            $ObjectResult['html'] = $this->renderPartial('index', array(
                'Equip_id' => $_POST['Equip_id'],
            ), true);
            
        }
        echo json_encode($ObjectResult);
    }
}







