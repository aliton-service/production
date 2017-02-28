<?php

class InventoriesController extends Controller
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
                    'roles'=>array('ViewInventories'),
            ),
            array('allow', 
                    'actions'=>array('create'),
                    'roles'=>array('CreateInventories'),
            ),
            array('allow', 
                    'actions'=>array('update', 'ChangeTime'),
                    'roles'=>array('UpdateInventories'),
            ),
            array('allow', 
                    'actions'=>array('delete'),
                    'roles'=>array('DeleteInventories'),
            ),
            array('allow',
                    'actions'=>array('accept'),
                    'roles'=>array('AcceptInventories'),
            ),
            array('deny',  // deny all users
                    'users'=>array('*'),
            ),
        );
    }

    public function actionCreate()
    {
        $model = new Inventories();
        $ObjectResult = array(
                'result' => 0,
                'id' => 0,
                'html' => '',
            );
        if (isset($_POST['Inventories'])) {
            $model->attributes = $_POST['Inventories'];
            if ($model->validate()) {
                $Res = $model->Insert();
                $ObjectResult['result'] = 1;
                $ObjectResult['id'] = $Res['invn_id'];
                echo json_encode($ObjectResult);
                return;
            } 
        }
        
        $ObjectResult['html'] = $this->renderPartial('_form', array(
            'model' => $model,
        ), true);
        echo json_encode($ObjectResult);
    }

    public function actionChangeTime() {
        $ObjectResult = array(
            'result' => 0,
            'id' => 0,
            'html' => '',
        );
        
        if (isset($_POST['Inventories'])) {
            $sp = new StoredProc();
            $sp->ProcedureName = 'UPDATE_Inventory';
            $sp->ParametersRefresh();
            $sp->Parameters[0]['Value'] = $_POST['Inventories']['Invn_id'];
            $sp->Parameters[1]['Value'] = $_POST['Inventories']['Date'];
            $sp->CheckParam = true;
            $sp->Execute();
            
            $ObjectResult['result'] = 1;
            $ObjectResult['id'] = $_POST['Inventories']['Invn_id'];
        }
        
        echo json_encode($ObjectResult);
    }
    
    
    public function actionUpdate()
    {
        $model = new Inventories();
        $ObjectResult = array(
            'result' => 0,
            'id' => 0,
            'html' => '',
        );
        if (isset($_POST['invn_id']))
            $model->getModelPk($_POST['invn_id']);

        if (isset($_POST['Inventories'])) {
            $model->getModelPk($_POST['Inventories']['invn_id']);
            $model->attributes = $_POST['Inventories'];
            if ($model->validate()) {
                $model->Update();
                $ObjectResult['result'] = 1;
                $ObjectResult['id'] = $model->invn_id;
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
        if (isset($_POST['invn_id'])) {
            $model = new Inventories();
            $model->getModelPk($_POST['invn_id']);
            $model->delete();
            echo 1;
            return;
        }
    }

    public function actionIndex()
    {
        $this->title = 'Реестр остатков на складе';
        $this->render('index');
    }
    
    public function actionAccept() 
    {
        if (isset($_POST['invn_id'])) {
            $model = new Inventories();
            $model->getModelPk($_POST['invn_id']);
            
            if ($model->closed == false || $model->closed == null) {
                $sp = new StoredProc();
                $sp->ProcedureName = 'inventory_close';
                $sp->ParametersRefresh();
                $sp->Parameters[0]['Value'] = $_POST['invn_id'];
                $sp->CheckParam = true;
                $sp->Execute();
            }
        }
    }
}

