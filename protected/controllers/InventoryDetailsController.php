<?php

class InventoryDetailsController extends Controller
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
                    'roles'=>array('ViewInventoryDetails'),
            ),
            array('allow', 
                    'actions'=>array('create'),
                    'roles'=>array('CreateInventoryDetails'),
            ),
            array('allow', 
                    'actions'=>array('update'),
                    'roles'=>array('UpdateInventoryDetails'),
            ),
            array('allow', 
                    'actions'=>array('delete'),
                    'roles'=>array('DeleteInventoryDetails'),
            ),
            array('deny',  // deny all users
                    'users'=>array('*'),
            ),
        );
    }

    public function actionCreate()
    {
        $model = new InventoryDetails();
        $ObjectResult = array(
                'result' => 0,
                'id' => 0,
                'html' => '',
            );
        if (isset($_POST['InventoryDetails'])) {
            $model->attributes = $_POST['InventoryDetails'];
            if ($model->validate()) {
                $Res = $model->Insert();
                $ObjectResult['result'] = 1;
                $ObjectResult['id'] = $Res['indt_id'];
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
        $model = new InventoryDetails();
        $ObjectResult = array(
                'result' => 0,
                'id' => 0,
                'html' => '',
            );
        if (isset($_POST['indt_id']))
            $model->getModelPk($_POST['indt_id']);

        if (isset($_POST['InventoryDetails'])) {
            $model->getModelPk($_POST['InventoryDetails']['indt_id']);
            $model->attributes = $_POST['InventoryDetails'];
            $model->EmplChange = Yii::app()->user->Employee_id;
            
            if ($model->validate()) {
                $model->Update();
                $ObjectResult['result'] = 1;
                $ObjectResult['id'] = $model->indt_id;
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
        
        if (isset($_POST['indt_id'])) {
            $model = new InventoryDetails();
            $model->getModelPk($_POST['indt_id']);
            if ($model->validate()) {
                $model->delete();
                $ObjectResult['result'] = 1;
                $ObjectResult['id'] = $model->indt_id;
                echo json_encode($ObjectResult);
                return;
            }
        }
        echo json_encode($ObjectResult);
    }

    public function actionIndex()
    {
        if (isset($_GET['date'])) {
            $date = $_GET['date'];
            $this->title = 'Остатки на складе на ' . $date;
        }
        
        if (isset($_GET['invn_id']))
        {
            $invn_id = $_GET['invn_id'];
            
            $this->render('index', array(
                'invn_id' => $invn_id
            ));
        }
    }
}