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
                    'actions' => array('Insert'),
                    'roles' => array('CreateObjects'),
                ),
            array('allow', 
                    'actions' => array('Update'),
                    'roles' => array('UpdateObjects'),
                ),
            array('allow', 
                    'actions' => array('Delete'),
                    'roles' => array('DeleteObjects'),
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
        $this->setPageTitle('Список объектов');
        $this->render('index2');
    }
    
    
    public function actionInsert()
    {
        $this->title = 'Добавление подъезда';

        $model = new Objects();
        
        if (isset($_POST['ObjectGr_id']))
        {
            if ($_POST['ObjectGr_id'] == 0) 
                return;
            $model->ObjectGr_id = $_POST['ObjectGr_id'];
        }
        
        if (isset($_POST['Objects']))
        {
            $model->attributes = $_POST['Objects'];
            
            if ($model->validate())
            {
                $model->Insert();
                echo '1';
                return;
            }
            
                
        }
            
        $this->renderPartial('edit', array(
           'model' => $model,
        ));
    }
    
    public function actionUpdate()
    {
        $this->title = 'Редактирование подъезда';
        $model = new Objects();
        
        if (isset($_POST['Object_id']))
        {
            if ($_POST['Object_id'] == 0) 
                return;
            $model->getModelPk($_POST['Object_id']);
        }
        
        if (isset($_POST['Objects']))
        {
            $model->attributes = $_POST['Objects'];
            
            if ($model->validate())
            {
                $model->Update();
                echo '1';
                return;
            }
            
                
        }
            
        $this->renderPartial('edit', array(
           'model' => $model,
        ));
    }
    
    public function actionDelete()
    {
        $this->title = 'Удаление подъезда';
        
        
        if (isset($_POST['Object_id'])) 
        {
            $model = new Objects();
            $model->getModelPk($_POST['Object_id']);
                            
            $model->Delete();
            echo '1';
            return;
        }
        
        echo '0';
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


