<?php

class ObjectsGroupSystemsController extends Controller
{
    protected $title = '';
    protected $action_url = '';
    
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
                    'actions'=>array('Index'),
                    'roles'=>array('ViewObjectsGroupSystems'),
                ),
            array('allow',
                    'actions'=>array('Insert'),
                    'roles'=>array('InsretObjectsGroupSystems'),
                ),
            array('allow',
                    'actions'=>array('Update'),
                    'roles'=>array('UpdateObjectsGroupSystems'),
                ),
            /*
            array('allow',
                    'actions'=>array('Delete'),
                    'roles'=>array('DeleteObjectsGroupSystems'),
                ),
            */
            array('deny',  // deny all users
			'users'=>array('*'),
                ),
        );
    }
    
    public function actionIndex()
    {
        // Выводим грид
        if (isset($_GET['ObjectGr_id']))
        {
            $ObjectGr_id = $_GET['ObjectGr_id'];
            $ObjectsGroupSystems = new ObjectsGroupSystems();
            $ObjectsGroupSystems = $ObjectsGroupSystems->Find(array('ObjectGr_id' => $ObjectGr_id));
            
            $this->renderPartial('index', array(
                'ObjectsGroupSystems' => $ObjectsGroupSystems,
                'ObjectGr_id' => $ObjectGr_id,
            ), false, true);
        }
    }
    
    public function actionInsert($ObjectGr_id = FALSE)
    {
        $this->title = 'Добавление системы';
        $this->action_url = $this->createUrl('ObjectsGroupSystems/insert', array('ObjectGr_id' => $ObjectGr_id));
        
        if ($ObjectGr_id !== FALSE)
        {
            $model = new ObjectsGroupSystems();
            $model->ObjectGr_id = $ObjectGr_id;
            
            if (isset($_POST['ObjectsGroupSystems']))
            {
                $model->attributes = $_POST['ObjectsGroupSystems'];
                
                $this->performAjaxValidation($model);
                
                if ($model->validate())
                {
                    $model->Insert();
                    $this->redirect(Yii::app()->createUrl('Objectsgroup/index', array('ObjectGr_id' => $model->ObjectGr_id)));
                }
                
            }
            
            $this->render('edit', array(
               'model' => $model,
            ));
        }
    }
    
    public function actionUpdate($ObjectsGroupSystem_id = FALSE)
    {
        $this->title = 'Редактирование системы';
        $this->action_url = $this->createUrl('ObjectsGroupSystems/update', array('ObjectsGroupSystem_id' => $ObjectsGroupSystem_id));
        
        if ($ObjectsGroupSystem_id !== FALSE)
        {
            $model = new ObjectsGroupSystems();
            $model->getModelPk($ObjectsGroupSystem_id);
            
            if (isset($_POST['ObjectsGroupSystems']))
            {
                $model->attributes = $_POST['ObjectsGroupSystems'];
                
                $this->performAjaxValidation($model);
                
                if ($model->validate())
                {
                    $model->Update();
                    $this->redirect(Yii::app()->createUrl('Objectsgroup/index', array('ObjectGr_id' => $model->ObjectGr_id)));
                }
                
            }
            
            $this->render('edit', array(
               'model' => $model,
            ));
            
        }
    }
    
    protected function performAjaxValidation($model)
    {
        if(isset($_POST['ajax']) && $_POST['ajax']==='ObjectsGroupSystems')
        {
                echo CActiveForm::validate($model);
                Yii::app()->end();
        }
    }
}

