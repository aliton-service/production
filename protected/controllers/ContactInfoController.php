<?php

class ContactInfoController extends Controller
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
                    'actions'=>array('Grid'),
                    'roles'=>array('ViewContactInfo'),
                ),
            array('allow',
                    'actions'=>array('Insert'),
                    'roles'=>array('InsretContactInfo'),
                ),
            array('allow',
                    'actions'=>array('Update'),
                    'roles'=>array('UpdateContactInfo'),
                ),
            array('allow',
                    'actions'=>array('Delete'),
                    'roles'=>array('DeleteContactInfo'),
                ),
            array('deny',  // deny all users
			'users'=>array('*'),
                ),
        );
    }
    
    
    public function actionGrid()
    {
        // Выводим грид
        
        if (isset($_GET['ObjectGr_id']))
        {
            $ObjectGr_id = $_GET['ObjectGr_id'];
            $ContactInfo = new ContactInfo();
            $ContactInfo->ObjectGr_id = $ObjectGr_id;
            
            if (isset($_GET['ContactInfo']))
                $ContactInfo->SetFilter($_GET['ContactInfo']);
                
            $DataRow = $ContactInfo->Find(array('ci.ObjectGr_id' => $ObjectGr_id));
            $ObjectData = $ContactInfo->filter($DataRow);
        
            $ObjectDataProvider=new CArrayDataProvider($ObjectData, array(
                'sort' => array('attributes' => array('FIO', 'CustomerName', 'Telephone', 'Email', 'CTelephone', 'Main', 'ForReport')),
                'keyField' => 'Info_id',
                'pagination' => array(
                'pageSize' => 15,
            )));
            
            $this->renderPartial('grid', array(
                'dataProvider' => $ObjectDataProvider,
                'model' => $ContactInfo,
            ), FALSE, TRUE);
        }
    }

    public function actionGetContactList($id) {
        $model = new ContactInfo;
         header('Content-Type: application/json');
        echo CJSON::encode($model->getContactList($id));
    }
   
    public function actionInsert($ObjectGr_id = FALSE)
    {
        $this->title = 'Добавление контактного лица';
        $this->action_url = $this->createUrl('ContactInfo/insert', array('ObjectGr_id' => $ObjectGr_id));
        
        if ($ObjectGr_id !== FALSE)
        {
            $model = new ContactInfo();
            $model->ObjectGr_id = $ObjectGr_id;
            
            if (isset($_POST['ContactInfo']))
            {
                $model->attributes = $_POST['ContactInfo'];
                
                
                
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
    
    public function actionUpdate($Info_id = FALSE)
    {
        $this->title = 'Редактирование контактного лица';
        $this->action_url = $this->createUrl('ContactInfo/update', array('Info_id' => $Info_id));
        
        if ($Info_id !== FALSE)
        {
            $model = new ContactInfo();
            $model->getModelPk($Info_id);
            
            if (isset($_POST['ContactInfo']))
            {
                $model->attributes = $_POST['ContactInfo'];
                
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
    
    public function actionDelete($Info_id = false)
    {
        $this->title = 'Удаление контактного лица';
        if ($Info_id !== FALSE)
        {
            $model = new ContactInfo();
            $model->getModelPk($Info_id);
            $model->Delete();
            $this->redirect(Yii::app()->createUrl('Objectsgroup/index', array('ObjectGr_id' => $model->ObjectGr_id)));
        }
    }
    
    protected function performAjaxValidation($model)
    {
        if(isset($_POST['ajax']) && $_POST['ajax']==='ContactInfo')
        {
                echo CActiveForm::validate($model);
                Yii::app()->end();
        }
    }
}

