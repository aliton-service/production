<?php

class ObjectsgroupController extends Controller
{
    public $layout='//layouts/column2';
    public $title = '';
    
    public function actionIndex($ObjectGr_id)
    {
        $model = new ObjectsGroup();
        $model->getModelPk($ObjectGr_id);
        
        $this->title = 'Карточка объекта: ' . $model->Address;
        
        $this->render('index', array(
            'model' => $model
        ));
    }
    
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
                    'actions'=>array('AjaxGeneral'),
                    'roles'=>array('ViewObjectsGroup'),
                ),
            
            array('allow',
                    'actions'=>array('index'),
                    'roles'=>array('ViewObjectsGroup'),
                ),
            
            array('allow',
                    'actions'=>array('EditForm', 'Update'),
                    'roles'=>array('UpdateObjectsGroup'),
                ),
            
            array('allow',
                    'actions'=>array('save'),
                    'roles'=>array('UpdateObjectsGroup'),
                ),
            
            array('deny',  // deny all users
			'users'=>array('*'),
                ),
        );
    }
    
    public function actionInsert()
    {
        
    }
    
    public function actionEditForm($ObjectGr_id)
    {
        // Форма редактирования карточки объекта
        
        // Блокируем запись 
        if (!Yii::app()->LockManager->LockRecord('ObjectsGroup', 'ObjectGr_id', $ObjectGr_id))
            throw new CHttpException(404, 'Запись заблокирована другим пользователем');
        
        $model = new ObjectsGroup();
        $model->getModelPk($ObjectGr_id);
        $this->title = 'Редактирование карточки объекта: ' . $model->Address;
        
        $this->render('general', array(
            'model' => $model,
        ));
    }
    
    public function actionUpdate()
    {
        $model = new ObjectsGroup();
        
        $model->setScenario('Update');
        
        $this->performAjaxValidation($model);
        
        if (isset($_POST['ObjectsGroup']))
        {
            $model->attributes = $_POST['ObjectsGroup'];
            
            //print_r($_POST['ObjectsGroup']);
            
            
            
            if ($model->validate())
            {
                $model->Update();
                Yii::app()->LockManager->UnLockrecord('ObjectsGroup', 'ObjectGr_id', $model->ObjectGr_id);
                $this->redirect(Yii::app()->createUrl('Objectsgroup/index', array('ObjectGr_id' => $model->ObjectGr_id)));
            }
            else
            {
                $this->render('general', array(
                    'model' => $model,
                ));
            }
        }
    }
    
    protected function performAjaxValidation($model)
    {
        if(isset($_POST['ajax']) && $_POST['ajax']==='ObjectsGroup')
        {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }
    
    public function actionAjaxGeneral()
    {
        /* Отображение вкладки "Общие данные "*/
        if (isset($_GET['ObjectGr_id']))
        {
            $ObjectGr_id = $_GET['ObjectGr_id'];
            $model = new ObjectsGroup();
            $model->getModelPk($ObjectGr_id);
            
            
            $this->renderPartial('viewgeneral', array(
                    'model'=> $model,
                    ), false, true);
            
            
            //$this->render('viewgeneral', array('model'=> $model,));
        }
    }
            
}

