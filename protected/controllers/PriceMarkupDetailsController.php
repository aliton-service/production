<?php

class PriceMarkupDetailsController extends Controller
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
                    'roles'=>array('ViewPriceMarkupDetails'),
            ),
            array('allow', 
                    'actions'=>array('create'),
                    'roles'=>array('CreatePriceMarkupDetails'),
            ),
            array('allow', 
                    'actions'=>array('update'),
                    'roles'=>array('UpdatePriceMarkupDetails'),
            ),
            array('allow', 
                    'actions'=>array('delete'),
                    'roles'=>array('DeletePriceMarkupDetails'),
            ),
            array('deny',  // deny all users
                    'users'=>array('*'),
            ),
        );
    }

    public function actionCreate()
    {
        $model = new PriceMarkupDetails();
        $ObjectResult = array(
                'result' => 0,
                'id' => 0,
                'html' => '',
            );
        
        if (isset($_POST['PriceMarkupDetails'])) {
            $model->attributes = $_POST['PriceMarkupDetails'];
            if ($model->validate()) {
                $Res = $model->Insert();
                $ObjectResult['result'] = 1;
                $ObjectResult['id'] = $Res['mrdt_id'];
                echo json_encode($ObjectResult);
                return;
            } 
        }
        
        if (isset($_POST['mrkp_id'])) {
            $model->mrkp_id = $_POST['mrkp_id'];
        }
        
        $ObjectResult['html'] = $this->renderPartial('_form', array(
            'model' => $model,
        ), true);
        echo json_encode($ObjectResult);
    }


    public function actionUpdate()
    {
        $model = new PriceMarkupDetails();
        $ObjectResult = array(
                'result' => 0,
                'id' => 0,
                'html' => '',
            );
        if (isset($_POST['mrdt_id'])) {
            $model->getModelPk($_POST['mrdt_id']);
        }
        if (isset($_POST['mrkp_id'])) {
            $model->mrkp_id = $_POST['mrkp_id'];
        }

        if (isset($_POST['PriceMarkupDetails'])) {
            $model->getModelPk($_POST['PriceMarkupDetails']['mrdt_id']);
            $model->attributes = $_POST['PriceMarkupDetails'];
            
            if ($model->validate()) {
                $model->Update();
                $ObjectResult['result'] = 1;
                $ObjectResult['id'] = $model->mrdt_id;
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
        
        if (isset($_POST['mrdt_id'])) {
            $model = new PriceMarkupDetails();
            $model->getModelPk($_POST['mrdt_id']);
            if ($model->validate()) {
                $model->delete();
                $ObjectResult['result'] = 1;
                $ObjectResult['id'] = $model->mrdt_id;
                echo json_encode($ObjectResult);
                return;
            }
        }
        echo json_encode($ObjectResult);
    }

    public function actionIndex()
    {
        $this->title = 'Наценки';
        
        if (isset($_GET['mrkp_id']))
        {
            $mrkp_id = $_GET['mrkp_id'];
            
            $this->render('index', array(
                'mrkp_id' => $mrkp_id
            ));
        }
    }
}