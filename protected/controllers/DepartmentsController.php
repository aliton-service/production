<?php

class DepartmentsController extends Controller
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
                    'roles'=>array('ViewDepartments'),
            ),
            array('allow', 
                    'actions'=>array('create'),
                    'roles'=>array('CreateDepartments'),
            ),
            array('allow', 
                    'actions'=>array('update'),
                    'roles'=>array('UpdateDepartments'),
            ),
            array('allow', 
                    'actions'=>array('delete'),
                    'roles'=>array('DeleteDepartments'),
            ),
            array('deny',  // deny all users
                    'users'=>array('*'),
            ),
        );
    }

    public function actionCreate()
    {
        $model = new Departments();
        $ObjectResult = array(
                'result' => 0,
                'id' => 0,
                'html' => '',
            );
        if (isset($_POST['Departments'])) {
            $model->attributes = $_POST['Departments'];
            if ($model->validate()) {
                $Res = $model->Insert();
                $ObjectResult['result'] = 1;
                $ObjectResult['id'] = $Res['Dep_id'];
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
        $model = new Departments();
        $ObjectResult = array(
                'result' => 0,
                'id' => 0,
                'html' => '',
            );
        if (isset($_POST['Dep_id']))
            $model->getModelPk($_POST['Dep_id']);

        if (isset($_POST['Departments'])) {
            $model->getModelPk($_POST['Departments']['Dep_id']);
            $model->attributes = $_POST['Departments'];
            if ($model->validate()) {
                $model->Update();
                $ObjectResult['result'] = 1;
                $ObjectResult['id'] = $model->Dep_id;
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
        
        if (isset($_POST['Dep_id'])) {
            $model = new Departments();
            $model->getModelPk($_POST['Dep_id']);
            if ($model->validate()) {
                $model->delete();
                $ObjectResult['result'] = 1;
                $ObjectResult['id'] = $model->Dep_id;
                echo json_encode($ObjectResult);
                return;
            }
        }
        echo json_encode($ObjectResult);
    }
    
    public function actionIndex()
    {
        $this->title = 'Просмотр отделов';
        $this->render('index');
    }
}



