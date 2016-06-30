<?php

class ServiceTypesController extends Controller
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
                    'roles'=>array('ViewServiceTypes'),
            ),
            array('allow', 
                    'actions'=>array('create'),
                    'roles'=>array('CreateServiceTypes'),
            ),
            array('allow', 
                    'actions'=>array('update'),
                    'roles'=>array('UpdateServiceTypes'),
            ),
            array('allow', 
                    'actions'=>array('delete'),
                    'roles'=>array('DeleteServiceTypes'),
            ),
            array('deny',  // deny all users
                    'users'=>array('*'),
            ),
        );
    }

    public function actionCreate()
    {
        $this->title = 'Создание нового тарифа';
        $model = new ServiceTypes();
        $model->setScenario('Insert');

        if(isset($_POST['ServiceTypes'])) {
            $model->attributes=$_POST['ServiceTypes'];
            $model->EmplCreate = Yii::app()->user->Employee_id;

            if ($model->validate()) {
                $model->insert();
                $this->redirect(Yii::app()->createUrl('ServiceTypes/index'));
            }    
        }

        $this->render('create',array(
                'model'=>$model,
        ));
    }


    public function actionUpdate($ServiceType_id)
    {
        $this->title = 'Редактирование поставщика';

        $model = new ServiceTypes();
        $model->setScenario('Update');

        if ($ServiceType_id == null)
                throw new CHttpException(404, 'Не выбрана запись.');

        if(isset($_POST['ServiceTypes']))
        {
            $model->attributes=$_POST['ServiceTypes'];

            $model->EmplChange = Yii::app()->user->Employee_id;

            if ($model->validate()) {
                $model->update();
            }
        }
        else
        {
            $model->getmodelPk($ServiceType_id);
            $this->title .= ' ' . $model->ServiceType;
        }

        $this->render('update', array(
                'model'=>$model,
            )
        );
    }

    public function actionDelete($ServiceType_id)
    {
        $model = new ServiceTypes();
        $model->getmodelPk($ServiceType_id);
        $model->delete();

        $this->redirect($this->createUrl('ServiceTypes/Index'));
    }

    public function actionIndex()
    {
        $this->title = 'Просмотр тарифов обслуживания';
        $this->render('index');
    }
}
