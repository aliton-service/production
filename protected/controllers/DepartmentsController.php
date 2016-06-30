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
        $this->title = 'Создание нового отдела';
        $model = new Departments();
        $model->setScenario('Insert');

        if(isset($_POST['Departments'])) {
            $model->attributes=$_POST['Departments'];
            $model->EmplCreate = Yii::app()->user->Employee_id;

            if ($model->validate()) {
                $model->insert();
                $this->redirect(Yii::app()->createUrl('Departments/index'));
            }    
        }

        $this->render('create',array(
                'model'=>$model,
        ));
    }


    public function actionUpdate($Dep_id)
    {
        $this->title = 'Редактирование должности';

        $model = new Departments();
        $model->setScenario('Update');

        if ($Dep_id == null)
                throw new CHttpException(404, 'Не выбрана запись.');

        if(isset($_POST['Departments']))
        {
            $model->attributes=$_POST['Departments'];

            $model->EmplChange = Yii::app()->user->Employee_id;

            if ($model->validate()) {
                $model->update();
            }
        }
        else
        {
            $model->getmodelPk($Dep_id);
            $this->title .= ' ' . $model->DepName;
        }

        $this->render('update', array(
                'model'=>$model,
            )
        );
    }

    public function actionDelete($Dep_id)
    {
        $model = new Departments();
        $model->getmodelPk($Dep_id);
        $model->delete();

        $this->redirect($this->createUrl('Departments/Index'));
    }

    public function actionIndex()
    {
        $this->title = 'Просмотр отделов';
        $this->render('index');
    }
}



