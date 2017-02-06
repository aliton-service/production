<?php

class AreaObjectPricesController extends Controller
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
                    'roles'=>array('ViewAreaObjectPrices'),
            ),
            array('allow', 
                    'actions'=>array('create'),
                    'roles'=>array('CreateAreaObjectPrices'),
            ),
            array('allow', 
                    'actions'=>array('update'),
                    'roles'=>array('UpdateAreaObjectPrices'),
            ),
            array('allow', 
                    'actions'=>array('delete'),
                    'roles'=>array('DeleteAreaObjectPrices'),
            ),
            array('deny',  // deny all users
                    'users'=>array('*'),
            ),
        );
    }

    public function actionCreate()
    {
        $model = new AreaObjectPrices();
        $ObjectResult = array(
                'result' => 0,
                'id' => 0,
                'html' => '',
            );
        if (isset($_POST['AreaObjectPrices'])) {
            $model->attributes = $_POST['AreaObjectPrices'];
            if ($model->validate()) {
                $Res = $model->Insert();
                $ObjectResult['result'] = 1;
                $ObjectResult['id'] = $Res['AreaObjectPrice_id'];
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
        $model = new AreaObjectPrices();
        $ObjectResult = array(
                'result' => 0,
                'id' => 0,
                'html' => '',
            );
        if (isset($_POST['AreaObjectPrice_id']))
            $model->getModelPk($_POST['AreaObjectPrice_id']);

        if (isset($_POST['AreaObjectPrices'])) {
            $model->getModelPk($_POST['AreaObjectPrices']['AreaObjectPrice_id']);
            $model->attributes = $_POST['AreaObjectPrices'];
            if ($model->validate()) {
                $model->Update();
                $ObjectResult['result'] = 1;
                $ObjectResult['id'] = $model->AreaObjectPrice_id;
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
        
        if (isset($_POST['AreaObjectPrice_id'])) {
            $model = new AreaObjectPrices();
            $model->getModelPk($_POST['AreaObjectPrice_id']);
            if ($model->validate()) {
                $model->delete();
                $ObjectResult['result'] = 1;
                $ObjectResult['id'] = $model->AreaObjectPrice_id;
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





