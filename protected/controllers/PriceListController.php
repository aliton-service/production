<?php

class PriceListController extends Controller
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
                    'roles'=>array('ViewPriceList'),
            ),
            array('allow', 
                    'actions'=>array('create'),
                    'roles'=>array('CreatePriceList'),
            ),
            array('allow', 
                    'actions'=>array('update'),
                    'roles'=>array('UpdatePriceList'),
            ),
            array('allow', 
                    'actions'=>array('delete'),
                    'roles'=>array('DeletePriceList'),
            ),
            array('deny',  // deny all users
                    'users'=>array('*'),
            ),
        );
    }

    public function actionCreate()
    {
        $model = new PriceList();
        $ObjectResult = array(
                'result' => 0,
                'id' => 0,
                'html' => '',
            );
        if (isset($_POST['PriceList'])) {
            $model->attributes = $_POST['PriceList'];
            if ($model->validate()) {
                $Res = $model->Insert();
                $ObjectResult['result'] = 1;
                $ObjectResult['id'] = $Res['prlt_id'];
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
        $model = new PriceList();
        $ObjectResult = array(
            'result' => 0,
            'id' => 0,
            'html' => '',
        );
        if (isset($_POST['prlt_id']))
            $model->getModelPk($_POST['prlt_id']);

        if (isset($_POST['PriceList'])) {
            $model->getModelPk($_POST['PriceList']['prlt_id']);
            $model->attributes = $_POST['PriceList'];
            if ($model->validate()) {
                $model->Update();
                $ObjectResult['result'] = 1;
                $ObjectResult['id'] = $model->prlt_id;
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
        
        if (isset($_POST['prlt_id'])) {
            $model = new PriceList();
            $model->getModelPk($_POST['prlt_id']);
            if ($model->validate()) {
                $model->Delete();
                $ObjectResult['result'] = 1;
                $ObjectResult['id'] = $model->prlt_id;
                echo json_encode($ObjectResult);
                return;
            }
        }
        echo json_encode($ObjectResult);
    }

    public function actionIndex()
    {
        $this->title = 'Прайс-лист';
        $this->render('index');
    }
    
}

