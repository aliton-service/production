<?php

class DeliveryDetailsController extends Controller
{
	
    public $layout='//layouts/column2';

    public function filters()
    {
            return array(
                    'accessControl', // perform access control for CRUD operations
                    'postOnly + delete', // we only allow deletion via POST request
            );
    }
	
    public function accessRules()
    {
        return array(
            array('allow', 
                    'actions'=>array('Create'),
                    'roles'=>array('CreateDeliveryDetails'),
            ),
            array('allow',
                    'actions'=>array('Update'),
                    'roles'=>array('UpdateDeliveryDetails'),
            ),
            array('allow',
                    'actions'=>array('Delete'),
                    'roles'=>array('DeleteDeliveryDetails'),

            ),
        );
    }

    public function actionCreate()
    {
        $model = new DeliveryDetails();
        if (isset($_POST['dldm_id']))
            $model->dldm_id = $_POST['dldm_id'];
        
        if(isset($_POST['DeliveryDetails'])) {    
            $model->attributes = $_POST['DeliveryDetails'];
            $model->EmplCreate = Yii::app()->user->Employee_id;
            if ($model->validate()) {
                $model->insert();
                echo '1';
                return;
            }
        }
        $this->renderPartial('_form', array(
            'model' => $model,
        ));
    }

    public function actionUpdate()
    {
        $model = new DeliveryDetails();
        if (isset($_POST['dldt_id'])) 
            $model->getModelPk ($_POST['dldt_id']);
        
        if(isset($_POST['DeliveryDetails'])) {    
            
            $model->attributes = $_POST['DeliveryDetails'];
            $model->EmplChange = Yii::app()->user->Employee_id;
            if ($model->validate()) {
                $model->Update();
                echo '1';
                return;
            }
        }
        $this->renderPartial('_form', array(
            'model' => $model,
        ));
    }
    
    public function actionDelete()
    {
        $model = new DeliveryDetails();
        if (isset($_POST['dldt_id'])) {
            $sp = new StoredProc();
            $sp->ProcedureName = 'DELETE_DeliveryDetails';
            $sp->ParametersRefresh();
            $sp->Parameters[0]['Value'] = $_POST['dldt_id'];
            $sp->CheckParam = true;
            $sp->Execute();
            echo '1';
            return;
            
        }
        echo '0';
    }
}
