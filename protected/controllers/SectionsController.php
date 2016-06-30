<?php

class SectionsController extends Controller
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
                    'roles'=>array('ViewSections'),
            ),
            array('allow', 
                    'actions'=>array('create'),
                    'roles'=>array('CreateSections'),
            ),
            array('allow', 
                    'actions'=>array('update'),
                    'roles'=>array('UpdateSections'),
            ),
            array('allow', 
                    'actions'=>array('delete'),
                    'roles'=>array('DeleteSections'),
            ),
            array('deny',  // deny all users
                    'users'=>array('*'),
            ),
        );
    }

    public function actionCreate()
    {
        $this->title = 'Создание нового подразделения';
        $model = new Sections();
        $model->setScenario('Insert');

        if(isset($_POST['Sections'])) {
            $model->attributes=$_POST['Sections'];
            $model->EmplCreate = Yii::app()->user->Employee_id;

            if ($model->validate()) {
                $model->insert();
                $this->redirect(Yii::app()->createUrl('Sections/index'));
            }    
        }

        $this->render('create',array(
                'model'=>$model,
        ));
    }


    public function actionUpdate($Section_id)
    {
        $this->title = 'Редактирование должности';

        $model = new Sections();
        $model->setScenario('Update');

        if ($Section_id == null)
                throw new CHttpException(404, 'Не выбрана запись.');

        if(isset($_POST['Sections']))
        {
            $model->attributes=$_POST['Sections'];

            $model->EmplChange = Yii::app()->user->Employee_id;

            if ($model->validate()) {
                $model->update();
            }
        }
        else
        {
            $model->getmodelPk($Section_id);
            $this->title .= ' ' . $model->SectionName;
        }

        $this->render('update', array(
                'model'=>$model,
            )
        );
    }

    public function actionDelete($Section_id)
    {
        $model = new Sections();
        $model->getmodelPk($Section_id);
        $model->delete();

        $this->redirect($this->createUrl('Sections/Index'));
    }

    public function actionIndex()
    {
        $this->title = 'Просмотр подразделений';
        $this->render('index');
    }
}





