<?php

class InspActRecommendationsController extends Controller
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
                array('allow',  
                        'actions' => array('index'),
                        'roles' => array('ViewInspActRecommendations'),
                ),
                array('allow', 
                        'actions' => array('Create'),
                        'roles' => array('CreateInspActRecommendations'),
                ),
                array('allow', 
                        'actions' => array('update'),
                        'roles' => array('UpdateInspActRecommendations'),
                ),
                array('allow',
                        'actions' => array('delete'),
                        'roles' => array('DeleteInspActRecommendations'),
                ),
                array('deny',
                        'users' => array('*'),
                ),
        );
    }

    public function actionCreate()
    {
        $model = new InspActRecommendations();
        
        if (isset($_POST['Inspection_id']))
            $model->Inspection_id = $_POST['Inspection_id'];
        
        $ObjectResult = array(
                'result' => 0,
                'id' => 0,
                'html' => '',
            );
        if (isset($_POST['InspActRecommendations'])) {
            $model->attributes = $_POST['InspActRecommendations'];
            
            if ($model->validate()) {
                $Res = $model->Insert();
                $ObjectResult['result'] = 1;
                $ObjectResult['id'] = $Res['Recommendation_id'];
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
        $model = new InspActRecommendations();
        $ObjectResult = array(
                'result' => 0,
                'id' => 0,
                'html' => '',
            );
        if (isset($_POST['Recommendation_id']))
            $model->getModelPk($_POST['Recommendation_id']);

        if (isset($_POST['InspActRecommendations'])) {
            $model->getModelPk($_POST['InspActRecommendations']['Recommendation_id']);
            $model->attributes = $_POST['InspActRecommendations'];
            if ($model->validate()) {
                $model->Update();
                $ObjectResult['result'] = 1;
                $ObjectResult['id'] = $model->Recommendation_id;
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
        
        if (isset($_POST['Recommendation_id'])) {
            $model = new InspActRecommendations();
            $model->getModelPk($_POST['Recommendation_id']);
            if ($model->validate()) {
                $model->delete();
                $ObjectResult['result'] = 1;
                $ObjectResult['id'] = $model->Recommendation_id;
                echo json_encode($ObjectResult);
                return;
            }
            else {
                $ObjectResult['result'] = 2;
            }
        }
        echo json_encode($ObjectResult);
    }

    public function actionIndex($repr_id)
    {
            if($this->isAjax()) {
                    $this->renderPartial('index', array('repr_id' => $repr_id), false, true);
            } else {
                    $this->render('index', array('repr_id' => $repr_id));
            }
    }
}

