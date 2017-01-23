<?php

class AreaPricesController extends Controller
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
                    'roles'=>array('ViewAreaPrices'),
            ),
            array('allow', 
                    'actions'=>array('create'),
                    'roles'=>array('CreateAreaPrices'),
            ),
            array('allow', 
                    'actions'=>array('update'),
                    'roles'=>array('UpdateAreaPrices'),
            ),
            array('allow', 
                    'actions'=>array('delete'),
                    'roles'=>array('DeleteAreaPrices'),
            ),
            array('deny',  // deny all users
                    'users'=>array('*'),
            ),
        );
    }

    public function actionCreate()
    {
        $model = new AreaPrices();
        $ObjectResult = array(
                'result' => 0,
                'id' => 0,
                'html' => '',
            );
        if (isset($_POST['AreaPrices'])) {
            $model->attributes = $_POST['AreaPrices'];
            if ($model->validate()) {
                $Res = $model->Insert();
                $ObjectResult['result'] = 1;
                $ObjectResult['id'] = $Res['AreaPrice_id'];
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
        $model = new AreaPrices();
        $ObjectResult = array(
                'result' => 0,
                'id' => 0,
                'html' => '',
            );
        if (isset($_POST['AreaPrice_id']))
            $model->getModelPk($_POST['AreaPrice_id']);

        if (isset($_POST['AreaPrices'])) {
            $model->getModelPk($_POST['AreaPrices']['AreaPrice_id']);
            $model->attributes = $_POST['AreaPrices'];
            if ($model->validate()) {
                $model->Update();
                $ObjectResult['result'] = 1;
                $ObjectResult['id'] = $model->AreaPrice_id;
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
        
        if (isset($_POST['AreaPrice_id'])) {
            $model = new AreaPrices();
            $model->getModelPk($_POST['AreaPrice_id']);
            if ($model->validate()) {
                $model->delete();
                $ObjectResult['result'] = 1;
                $ObjectResult['id'] = $model->AreaPrice_id;
                echo json_encode($ObjectResult);
                return;
            }
        }
        echo json_encode($ObjectResult);
    }

    public function actionIndex()
    {
        $this->title = 'Просмотр подразделений';
        $this->render('index');
    }
}





