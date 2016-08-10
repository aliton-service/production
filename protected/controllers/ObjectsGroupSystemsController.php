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
            array('allow',
                    'actions'=>array('Delete'),
                    'roles'=>array('DeleteObjectsGroupSystems'),
                ),
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
            $model = new ObjectsGroupSystems();
//            $model = $model->Find(array('ObjectGr_id' => $ObjectGr_id));
            
            $this->renderPartial('index', array(
                'model' => $model,
                'ObjectGr_id' => $ObjectGr_id,
            ), false, true);
        }
    }
    
    public function actionInsert()
    {
        $this->title = 'Добавление системы';
        
        if (isset($_POST['ObjectGr_id'])) 
            $ObjectGr_id = $_POST['ObjectGr_id'];
        
        $model = new ObjectsGroupSystems();
                
        if (isset($_POST['ObjectsGroupSystems']))
            {
                $model->attributes = $_POST['ObjectsGroupSystems'];
                
                $this->performAjaxValidation($model);
                
                if ($model->validate())
                {
                    $model->Insert();
                    echo '1';
                    return;
                }
                
            }
            $model->ObjectGr_id = $ObjectGr_id;
            $this->renderPartial('_form', array(
                'model' => $model
            ));
        
    }
    
    public function actionUpdate()
    {
        $this->title = 'Редактирование системы';
        
        if (isset($_POST['ObjectsGroupSystem_id'])) 
            $ObjectsGroupSystem_id = $_POST['ObjectsGroupSystem_id'];
        
        
        $model = new ObjectsGroupSystems();
        

        if (isset($_POST['ObjectsGroupSystems']))
        {
            $model->attributes = $_POST['ObjectsGroupSystems'];
            $ObjectsGroupSystem_id = $model->ObjectsGroupSystem_id;
            $this->performAjaxValidation($model);

            if ($model->validate())
            {
                $model->Update();
                echo '1';
                return;
            }

        }
        
        $model->getModelPk($ObjectsGroupSystem_id);
        $this->renderPartial('_form', array(
            'model' => $model
        ));
        
    }
    
    public function actionDelete()
    {
        if(isset($_POST['ObjectsGroupSystem_id'])) {
            $ObjectsGroupSystem_id = $_POST['ObjectsGroupSystem_id'];
        }
        $model = new ObjectsGroupSystems;
        $model->getModelPk($ObjectsGroupSystem_id);

        if(!is_null($ObjectsGroupSystem_id)){
            $model->delete();
        }

        $this->redirect($this->createUrl('ObjectsGroupSystems/Index'));
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

