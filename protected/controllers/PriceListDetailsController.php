<?php

class PriceListDetailsController extends Controller
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
                    'roles'=>array('ViewPriceListDetails'),
            ),
            array('allow', 
                    'actions'=>array('create'),
                    'roles'=>array('CreatePriceListDetails'),
            ),
            array('allow', 
                    'actions'=>array('update'),
                    'roles'=>array('UpdatePriceListDetails'),
            ),
            array('allow', 
                    'actions'=>array('delete'),
                    'roles'=>array('DeletePriceListDetails'),
            ),
            array('allow',
                    'actions'=>array('Insertdetails'),
                    'roles'=>array('InsertdetailsPriceListDetails'),
            ),
            array('deny',  // deny all users
                    'users'=>array('*'),
            ),
        );
    }

    public function actionCreate()
    {
        $model = new PriceListDetails();
        $ObjectResult = array(
                'result' => 0,
                'id' => 0,
                'html' => '',
                'mas' => array()
            );
        
        if (isset($_POST['PriceListDetails'])) {
            $model->attributes = $_POST['PriceListDetails'];
            if ($model->validate()) {
                $Res = $model->Insert();
                $ObjectResult['result'] = 1;
                $ObjectResult['mas'] = $Res;
                //$ObjectResult['id'] = $Res['pldt_id'];
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
        $model = new PriceListDetails();
        $ObjectResult = array(
            'result' => 0,
            'id' => 0,
            'html' => '',
        );
        if (isset($_POST['pldt_id']))
            $model->getModelPk($_POST['pldt_id']);

        if (isset($_POST['PriceListDetails'])) {
            $model->getModelPk($_POST['PriceListDetails']['pldt_id']);
            $model->attributes = $_POST['PriceListDetails'];
            if ($model->validate()) {
                $model->Update();
                $ObjectResult['result'] = 1;
                $ObjectResult['id'] = $model->pldt_id;
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
        if (isset($_POST['pldt_id'])) {
            $model = new PriceListDetails();
            $model->getModelPk($_POST['pldt_id']);
            $model->delete();
            echo 1;
            return;
        }
    }

    public function actionIndex()
    {
        $this->title = 'Прайс-лист';
        $this->render('index');
    }
    
}

