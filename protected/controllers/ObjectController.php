<?php

class ObjectController extends Controller
{
    protected $title = '';
    protected $action_url = '';
    
    public $layout='//layouts/column2';
    
    public function filters()
    {
        return array(
            'accessControl',
        );
    }
    
    public function accessRules()
    {
        return array(
            array('allow', 
                    'actions' => array('index'),
                    'roles' => array('ViewObjects'),
                ),
            array('allow', 
                    'actions' => array('TodayDemands', 'TodayDemandsDialog'),
                    'users' => array('*'),
                ),
            array('deny',  
                    'users'=>array('*'),
		),
        );
    }
    
    public function actionIndex()
    {
        $this->title = 'Список объектов';
        //$this->render('index'); 
        $this->render('index2');
    }
    
    
    public function actionInsert($ObjectGr_id = FALSE)
    {
        $this->title = 'Добавление подъезда';
        $this->action_url = $this->createUrl('Object/insert', array('ObjectGr_id' => $ObjectGr_id));

        if ($ObjectGr_id !== FALSE)
        {
            $model = new Objects();
            $model->ObjectGr_id = $ObjectGr_id;

            if (isset($_POST['Objects']))
            {
                $model->attributes = $_POST['Objects'];

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
    
    public function actionUpdate($Object_id = FALSE)
    {
        $this->title = 'Редактирование подъезда';
        $this->action_url = $this->createUrl('Object/update', array('Object_id' => $Object_id));
        
        if ($Object_id !== FALSE)
        {
            $model = new Objects();
            $model->getModelPk($Object_id);
            
            if (isset($_POST['Objects']))
            {
                $model->attributes = $_POST['Objects'];
                
                print_r($_POST['Objects']);
                
                $this->performAjaxValidation($model);
                
                if ($model->validate())
                {
                    $model->Update();
                    Yii::app()->LockManager->UnLockRecord('Objects', 'Object_id', $model->Object_id);
                    $this->redirect(Yii::app()->createUrl('Objectsgroup/index', array('ObjectGr_id' => $model->ObjectGr_id)));
                }
                
            }
            
            $this->render('edit', array(
               'model' => $model,
            ));
            
        }
    }
    
    public function actionDelete($Object_id = FALSE)
    {
        $this->title = 'Удаление подъезда';
        $this->action_url = $this->createUrl('Object/delete', array('Object_id' => $Object_id));
        
        if ($Object_id !== FALSE)
        {
            $model = new Objects();
            $model->getModelPk($Object_id);
                            
            $this->performAjaxValidation($model);
                
            $model->Delete();
            $this->redirect(Yii::app()->createUrl('Objectsgroup/index', array('ObjectGr_id' => $model->ObjectGr_id)));
        }
    }
    
    public function actionTodayDemands($Object_id) {
        $Demands = new Demands();
        $Result = $Demands->Find(array(), array(
            'Object' => 'd.Object_id = ' . $Object_id,
            'DateReg' => 'dbo.truncdate(d.DateReg) = \'' . Date('d.m.Y') .'\'',
        ));
        if (count($Result) > 0) 
            echo 1;
        else
            echo 0;
    }
    
    public function actionTodayDemandsDialog($Object_id, $ContrS_id = null) {
        $this->renderPartial('todaydemands', array(
            'Object_id' => $Object_id,
            'ContrS_id' => $ContrS_id,
        ), null, true);
    }

    public function actionAutocomplete($term) {
        $sql = Yii::app()->db->createCommand("Select Address_id as id, Object_id as obj, Addr as label, Addr as value From Objects_v Where Addr LIKE '{$term}%' ORDER by Addr");
        header('Content-Type: application/json');
        echo CJSON::encode($sql->queryAll());
    }

    public function actionAutocompleteFullName($term) {
        $sql = Yii::app()->db->createCommand("Select FullName as label, FullName as value From Objects_v Where FullName LIKE '{$term}%' ORDER by FullName");
        header('Content-Type: application/json');
        echo CJSON::encode($sql->queryAll());
    }
    
    protected function performAjaxValidation($model)
    {
        if(isset($_POST['ajax']) && $_POST['ajax']==='Objects')
        {
                echo CActiveForm::validate($model);
                Yii::app()->end();
        }
    }
}


