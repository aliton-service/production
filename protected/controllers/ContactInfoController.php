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
                    //'roles'=>array('DeleteContactInfo'),
                'users'=>array('*'),
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
   
    public function actionInsert()
    {
        $model = new ContactInfo();
        $ObjectResult = array(
                'result' => 0,
                'id' => 0,
                'html' => '',
            );
        
        $ClientName = '';
        $Telephone = '';
        
        if (isset($_POST['ObjectGr_id']))
            $model->ObjectGr_id = $_POST['ObjectGr_id'];
        
        if (isset($_POST['ClientName']))
            $ClientName = $_POST['ClientName'];
        
        if (isset($_POST['Telephone']))
            $Telephone = $_POST['Telephone'];
        
        if (isset($_POST['ContactInfo'])) {
            $model->attributes = $_POST['ContactInfo'];
            if ($model->validate()) {
                $Res = $model->Insert();
                $ObjectResult['result'] = 1;
                $ObjectResult['id'] = $Res['info_id'];
                echo json_encode($ObjectResult);
                return;
            } 
        }

        $ObjectResult['html'] = $this->renderPartial('_form2', array(
            'model' => $model,
            'ClientName' => $ClientName,
            'Telephone' => $Telephone,
        ), true);
        echo json_encode($ObjectResult);
    }
    
    public function actionUpdate($ObjectGr_id = FALSE, $Info_id = FALSE)
    {
        $model = new ContactInfo();
        $ObjectResult = array(
                'result' => 0,
                'id' => 0,
                'html' => '',
            );
        
        $ClientName = '';
        $Telephone = '';
        
        if (isset($_POST['Info_id']))
            $model->getModelPk ($_POST['Info_id']);
        
        if (isset($_POST['ClientName']))
            $ClientName = $_POST['ClientName'];
        
        if (isset($_POST['Telephone']))
            $Telephone = $_POST['Telephone'];
        
        if (isset($_POST['ContactInfo'])) {
            $model->getModelPk($_POST['ContactInfo']['Info_id']);
            $model->attributes = $_POST['ContactInfo'];
            if ($model->validate()) {
                $Res = $model->Update();
                $ObjectResult['result'] = 1;
                $ObjectResult['id'] = $model->Info_id;
                echo json_encode($ObjectResult);
                return;
            } 
        }

        $ObjectResult['html'] = $this->renderPartial('_form2', array(
            'model' => $model,
            'ClientName' => $ClientName,
            'Telephone' => $Telephone,
        ), true);
        echo json_encode($ObjectResult);
    }
    
    public function actionDelete()
    {
        if(isset($_POST['Info_id'])) {
            $Info_id = $_POST['Info_id'];
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

