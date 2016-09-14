<?php

class ChildrensController extends Controller
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
                    'roles'=>array('ViewPositions'),
            ),
            array('allow', 
                    'actions'=>array('create'),
                    'roles'=>array('CreatePositions'),
            ),
            array('allow', 
                    'actions'=>array('update'),
                    'roles'=>array('UpdatePositions'),
            ),
            array('allow', 
                    'actions'=>array('delete'),
                    'roles'=>array('DeletePositions'),
            ),
            array('deny',  // deny all users
                    'users'=>array('*'),
            ),
        );
    }

    public function actionCreate()
    {
        
        $model = new Childrens();
        if (isset($_POST['Employee_id']))
            $model->Employee_id = $_POST['Employee_id'];
        
        if (isset($_POST['Childrens'])) {
            $model->attributes = $_POST['Childrens'];
            if ($model->validate()) {
                $model->Insert();
                echo '1';
                return;
            }
        }
        
        $this->renderPartial('_form', array(
            'model' => $model,
        ));
    }


    public function actionUpdate()
    {
        $model = new Childrens();
        if (isset($_POST['Children_id']))
            $model->getModelPk($_POST['Children_id']);

        if (isset($_POST['Childrens'])) {
            $model->getModelPk($_POST['Childrens']['Children_id']);
            $model->attributes = $_POST['Childrens'];
            if ($model->validate()) {
                $model->Update();
                echo '1';
                return;
            }
        }

        $this->renderPartial('_form', array(
            'model' => $model,
        ));
    }

    public function actionDelete($Children_id)
    {
        $model = new Childrens();
        $model->getmodelPk($Children_id);
        $model->delete();

        $this->redirect($this->createUrl('Employees/Index'));
    }

    public function actionIndex($Ajax = true)
    {
        $this->title = 'Просмотр детей';
        $this->renderPartial('index', null, null, true);
        
    }
}



