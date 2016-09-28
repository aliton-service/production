<?php

class WHDocumentsController extends Controller
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
                    'actions'=>array('index', 'view', 'GetWhNotes'),
                    'roles'=>array('WHDocumentsView'),
            ),
            array('allow', 
                    'actions'=>array('create'),
                    'roles'=>array('CreateWHDcouments'),
            ),
            array('allow', 
                    'actions'=>array('update'),
                    'roles'=>array('UpdateWHDcouments'),
            ),
            array('allow', 
                    'actions'=>array('delete'),
                    'roles'=>array('DeleteWHDcouments'),
            ),
            array('deny',  // deny all users
                    'users'=>array('*'),
            ),
        );
    }

    public function actionCreate()
    {
        $model = new WHDcouments();
        $ObjectResult = array(
                'result' => 0,
                'id' => 0,
                'html' => '',
            );
        if (isset($_POST['WHDcouments'])) {
            $model->attributes = $_POST['WHDcouments'];
            if ($model->validate()) {
                $Res = $model->Insert();
                $ObjectResult['result'] = 1;
                $ObjectResult['id'] = $Res['Section_id'];
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
        $model = new WHDcouments();
        $ObjectResult = array(
                'result' => 0,
                'id' => 0,
                'html' => '',
            );
        if (isset($_POST['Section_id']))
            $model->getModelPk($_POST['Section_id']);

        if (isset($_POST['WHDcouments'])) {
            $model->getModelPk($_POST['WHDcouments']['Section_id']);
            $model->attributes = $_POST['WHDcouments'];
            if ($model->validate()) {
                $model->Update();
                $ObjectResult['result'] = 1;
                $ObjectResult['id'] = $model->Section_id;
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
        
        if (isset($_POST['Section_id'])) {
            $model = new WHDcouments();
            $model->getModelPk($_POST['Section_id']);
            if ($model->validate()) {
                $model->delete();
                $ObjectResult['result'] = 1;
                $ObjectResult['id'] = $model->Section_id;
                echo json_encode($ObjectResult);
                return;
            }
        }
        echo json_encode($ObjectResult);
    }

    public function actionIndex()
    {
        $this->title = 'Склад - реестр документов';
        $this->render('index');
    }
    
    public function actionGetWhNotes() {
        $Result = array(
            'result' => 0,
            'text' => '',
        );
        
        if (isset($_POST['Docm_id'])) {
            $Query = new SQLQuery();
            $Query->setSelect('Select dbo.get_wh_notes(' . $_POST['Docm_id'] . ') notes');
            $Res = $Query->QueryRow();
            $Result['result'] = 1;
            $Result['text'] = $Res['notes'];
        }
        echo json_encode($Result);
    }
}





