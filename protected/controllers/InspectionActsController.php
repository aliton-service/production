<?php

class InspectionActsController extends Controller
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
                    'roles'=>array('ViewInspectionActs'),
            ),
            array('allow', 
                    'actions'=>array('create'),
                    'roles'=>array('CreateInspectionActs'),
            ),
            array('allow', 
                    'actions'=>array('update'),
                    'roles'=>array('UpdateInspectionActs'),
            ),
            array('allow', 
                    'actions'=>array('delete'),
                    'roles'=>array('DeleteInspectionActs'),
            ),
            array('deny',  // deny all users
                    'users'=>array('*'),
            ),
        );
    }

    public function actionCreate()
    {
        $model = new InspectionActs();
        $ObjectResult = array(
                'result' => 0,
                'id' => 0,
                'html' => '',
            );
        if (isset($_POST['InspectionActs'])) {
            $model->attributes = $_POST['InspectionActs'];
            if ($model->validate()) {
                $Res = $model->Insert();
                $ObjectResult['result'] = 1;
                $ObjectResult['id'] = $Res['Inspection_id'];
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
        $model = new InspectionActs();
        $ObjectResult = array(
                'result' => 0,
                'id' => 0,
                'html' => '',
            );
        if (isset($_POST['Inspection_id']))
            $model->getModelPk($_POST['Inspection_id']);

        if (isset($_POST['InspectionActs'])) {
            $model->getModelPk($_POST['InspectionActs']['Inspection_id']);
            $model->attributes = $_POST['InspectionActs'];
            if ($model->validate()) {
                $model->Update();
                $ObjectResult['result'] = 1;
                $ObjectResult['id'] = $model->Inspection_id;
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
        
        if (isset($_POST['Inspection_id'])) {
            $model = new InspectionActs();
            $model->getModelPk($_POST['Inspection_id']);
            if ($model->validate()) {
                $model->delete();
                $ObjectResult['result'] = 1;
                $ObjectResult['id'] = $model->Inspection_id;
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





