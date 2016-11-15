<?php

class OfferDemandsController extends Controller
{
    public $layout = '//layouts/column2';
    public $title = '';

    public function filters()
    {
        return array(
            'accessControl', // perform access control for CRUD operations
            'postOnly + delete', // we only allow deletion via POST request
        );
    }

    public function accessRules()
    {
        return array(
            array('allow',  // allow all users to perform 'index' and 'view' actions
                'actions' => array('index', 'view'),
                'roles' => array('ViewOfferDemands'),
            ),
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions' => array('create'),
                'roles' => array('CreateOfferDemands'),
            ),
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions' => array('update'),
                'roles' => array('UpdateOfferDemands'),
            ),
            array('allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions' => array('delete'),
                'roles' => array('DeleteOfferDemands'),
            ),
            array('deny',  // deny all users
                'users' => array('*'),
            ),
        );
    }



    public function actionCreate()
    {
        $model = new OfferDemands;
            
        $ObjectResult = array(
            'result' => 0,
            'id' => 0,
            'html' => '',
        );

        if (isset($_POST['offer_id']) && isset($_POST['dmnd_id'])) {
            $model->offer_id = $_POST['offer_id'];
            $model->dmnd_id = $_POST['dmnd_id'];

            if ($model->validate()) {
                $model->insert();
                $ObjectResult['result'] = 1;
                $ObjectResult['id'] = $model->OfferDemand_id;
                echo json_encode($ObjectResult);
                return;
            }
        }

        $ObjectResult['html'] = $this->renderPartial('index', array(
            'model' => $model,
        ), true);
        echo json_encode($ObjectResult);
    }

    public function actionUpdate()
    {
        $model = new OfferDemands();
        
        $ObjectResult = array(
            'result' => 0,
            'id' => 0,
            'html' => '',
        );

        if (isset($_POST['code']))
            $model->getModelPk($_POST['code']);

        if (isset($_POST['OfferDemands'])) {
            $model->getModelPk($_POST['OfferDemands']['code']);
            $model->attributes = $_POST['OfferDemands'];
            $model->EmplChange = Yii::app()->user->Employee_id;
            if ($model->validate()) {
                $model->Update();
                $ObjectResult['result'] = 1;
                $ObjectResult['id'] = $model->code;
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
        
        if (isset($_POST['OfferDemand_id'])) {
            $model = new OfferDemands();
            $model->getModelPk($_POST['OfferDemand_id']);
            $model->Delete();
            $ObjectResult['result'] = 1;
            $ObjectResult['id'] = $model->OfferDemand_id;
            echo json_encode($ObjectResult);
            return;
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
        
        $offer_id = '';
        
        if (isset($_POST['offer_id'])) {
            $offer_id = $_POST['offer_id'];
        }

        $ObjectResult['html'] = $this->renderPartial('index', array(
            'offer_id' => $offer_id,
        ), true);
        echo json_encode($ObjectResult);
    }


}

