<?php

class EventOffersController extends Controller
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
                'actions' => array('index', 'view', 'equipAnalog', 'clients','ObjectOffer','GetObjectOffers', 'GetObjectEvents'),
                'roles' => array('ViewEventOffers'),
            ),
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions' => array('create'),
                'roles' => array('CreateEventOffers'),
            ),
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions' => array('update'),
                'roles' => array('UpdateEventOffers'),
            ),
            array('allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions' => array('delete'),
                'roles' => array('DeleteEventOffers'),
            ),
            array('deny',  // deny all users
                'users' => array('*'),
            ),
        );
    }



    public function actionCreate()
    {
        $model = new EventOffers;
            
        $ObjectResult = array(
            'result' => 0,
            'id' => 0,
            'html' => '',
        );

        if (isset($_POST['evnt_id'])) {
            $model->evnt_id = $_POST['evnt_id'];
        }
        if (isset($_POST['EventOffers'])) {
            $model->attributes = $_POST['EventOffers'];
            $model->EmplCreate = Yii::app()->user->Employee_id;
            if ($model->validate()) {
                $model->insert();
                $ObjectResult['result'] = 1;
                $ObjectResult['id'] = $model->evnt_id;
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
        $model = new EventOffers();
        
        $ObjectResult = array(
            'result' => 0,
            'id' => 0,
            'html' => '',
        );

        if (isset($_POST['code']))
            $model->getModelPk($_POST['code']);

        if (isset($_POST['EventOffers'])) {
            $model->getModelPk($_POST['EventOffers']['code']);
            $model->attributes = $_POST['EventOffers'];
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
        
        if (isset($_POST['code'])) {
            $model = new EventOffers();
            $model->getModelPk($_POST['code']);
            $model->Delete();
            $ObjectResult['result'] = 1;
            $ObjectResult['id'] = $model->code;
            echo json_encode($ObjectResult);
            return;
        }
        echo json_encode($ObjectResult);
    }

    public function actionIndex()
    {
        $this->render('index');
    }


    public function actionObjectOffer($objgr_id=false, $group_id=false) {
        if($this->isAjax()) {
            $this->renderPartial('objectoffer', array('objgr_id'=>$objgr_id), false, true);
        } else {
            $this->render('objectoffer', array('objgr_id'=>$objgr_id));
        }
    }

    public function actionGetObjectOffers($objgr_id, $group_id) {
        $model = new EventOffers();
        die(json_encode(array('status'=>'ok', 'data'=>$model->getOfferFromObjCart($objgr_id, $group_id))));
    }

    public function actionGetObjectEvents($objgr_id, $group_id=false) {
        $model = new EventOffers();
        die(json_encode(array('status'=>'ok', 'data'=>$model->getEventsFromObjCart($objgr_id, $group_id))));
    }

}

