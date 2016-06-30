<?php

class PositionsController extends Controller
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
        $this->title = 'Создание новой должности';
        $model = new Positions();
        $model->setScenario('Insert');

        if(isset($_POST['Positions'])) {
            $model->attributes=$_POST['Positions'];
            $model->EmplCreate = Yii::app()->user->Employee_id;

            if ($model->validate()) {
                $model->insert();
                $this->redirect(Yii::app()->createUrl('Positions/index'));
            }    
        }

        $this->render('create',array(
                'model'=>$model,
        ));
    }


    public function actionUpdate($Position_id)
    {
        $this->title = 'Редактирование должности';

        $model = new Positions();
        $model->setScenario('Update');

        if ($Position_id == null)
                throw new CHttpException(404, 'Не выбрана запись.');

        if(isset($_POST['Positions']))
        {
            $model->attributes=$_POST['Positions'];

            $model->EmplChange = Yii::app()->user->Employee_id;

            if ($model->validate()) {
                $model->update();
            }
        }
        else
        {
            $model->getmodelPk($Position_id);
            $this->title .= ' ' . $model->PositionName;
        }

        $this->render('update', array(
                'model'=>$model,
            )
        );
    }

    public function actionDelete($Position_id)
    {
        $model = new Positions();
        $model->getmodelPk($Position_id);
        $model->delete();

        $this->redirect($this->createUrl('Positions/Index'));
    }

    public function actionIndex()
    {
        $this->title = 'Просмотр должностей';
        $this->render('index');
    }
}

