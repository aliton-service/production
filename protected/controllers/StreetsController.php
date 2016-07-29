<?php

class StreetsController extends Controller
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
                    'actions'=>array('index'),
                    'roles'=>array('ViewStreets'),
            ),
            array('allow', 
                    'actions'=>array('create'),
                    'roles'=>array('CreateStreets'),
            ),
            array('allow', 
                    'actions'=>array('update'),
                    'roles'=>array('UpdateStreets'),
            ),
            array('allow', 
                    'actions'=>array('delete'),
                    'roles'=>array('DeleteStreets'),
            ),
            array('deny',  // deny all users
                    'users'=>array('*'),
            ),
        );
    }

    public function actionCreate()
    {
        $this->title = 'Создание новой улицы';
        $model = new Streets();
//        $model->setScenario('Insert');

        if(isset($_POST['Streets'])) {
            $model->attributes=$_POST['Streets'];
            $model->EmplCreate = Yii::app()->user->Employee_id;

            if($model->insert()) {
                $this->redirect(Yii::app()->createUrl('Streets/index'));
            }   
        }

        $this->render('create',array(
                'model'=>$model,
        ));
        
    }


    public function actionUpdate($Street_id)
    {
        $this->title = 'Редактирование улицы';
        $model=new Streets;
        $model->getModelPk($Street_id);
        
        if ($Street_id == null)
                throw new CHttpException(404, 'Не выбрана запись.');

        if(isset($_POST['Streets']))
        {
            $model->attributes=$_POST['Streets'];
            $model->EmplChange = Yii::app()->user->Employee_id;
            
            if ($model->validate()) {
                $model->update();
                $this->redirect(Yii::app()->createUrl('Streets/Index'));
            }
        }

        $this->render('update',array(
                'model'=>$model,
        )); 
    }

    public function actionDelete()
    {
        if(isset($_POST['Street_id'])) {
            $Street_id = $_POST['Street_id'];
        }
        $model=new Streets;
        $model->Street_id = $Street_id;
        $model->EmplChange = Yii::app()->user->Employee_id;

        if(!is_null($Street_id)){
            $model->delete();
        }

        $this->redirect($this->createUrl('Streets/Index'));
    }

    public function actionIndex()
    {
        $this->title = 'Просмотр улиц';
        $this->render('index');
    }
}
