<?php

class EquipForMDDetailsController extends Controller
{
    public $layout='//layouts/column2';
    
    public $title = '';
    public $action_url = '';
    
    /**
     * @return array action filters
     */
    public function filters()
    {
        return array(
            'accessControl', // perform access control for CRUD operations
            'postOnly + delete', // we only allow deletion via POST request
        );
    }

    /**
     * Specifies the access control rules.
     * This method is used by the 'accessControl' filter.
     * @return array access control rules
     */
    public function accessRules()
    {
        return array(

            array('allow',
                    'actions'=>array('Index'),
                    'roles'=>array('ViewEquipForMDDetails'),
                ),
            array('allow',
                    'actions'=>array('Insert'),
                    'roles'=>array('InsretEquipForMDDetails'),
                ),
            array('allow',
                    'actions'=>array('Update'),
                    'roles'=>array('UpdateEquipForMDDetails'),
                ),
            array('allow',
                    'actions'=>array('Delete'),
                    'roles'=>array('DeleteEquipForMDDetails'),
                ),
            array('deny',  // deny all users
                        'users'=>array('*'),
                ),
        );
    }
    
    public function actionIndex()
    {
        $model = new EquipForMDDetails();
        
        if(isset($_POST['Equip_id'])) {
            $Equip_id = $_POST['Equip_id'];
            
            $model->getModelPk($Equip_id);
            
            $price_high = $model->price_high;
            echo $price_high;
        }

        else {
            echo 0;
        }

    }

    public function actionInsert() 
    {
        $model = new EquipForMDDetails;
        
        if(isset($_POST['EquipForMDDetails']))
        {
            $model->attributes = $_POST['EquipForMDDetails'];
            
            $Employee_id = Yii::app()->user->Employee_id;
            $Query = new SQLQuery();
            $Query->setSelect("Select Alias from Employees where Employee_id = " . $Employee_id);
            $Result = $Query->QueryRow();
            $Employee_Alias = $Result['Alias'];
                
            $model->User2 = $Employee_Alias;
            $model->UserCreate2 = Yii::app()->user->Employee_id;

            if ($model->validate())
            {
                $model->Insert();
                echo '1';
                return;
            }
        }

        $this->renderPartial('_form', array(
            'model' => $model
        ));

    }

    public function actionUpdate() 
    {
        $model = new EquipForMDDetails;
        
        if(isset($_POST['EquipForMDDetails']))
        {
            $model->attributes=$_POST['EquipForMDDetails'];
            $Equip_id = $model->Equip_id;

            if ($model->validate())
            {
                $model->Update();
                echo '1';
                return;
            }

        }
        
        if (isset($_POST['Equip_id'])) {
            $Equip_id = $_POST['Equip_id'];
        }
        
        $model->getModelPk($Equip_id);
        $this->renderPartial('_form', array(
            'model' => $model
        ));
    }
    
    public function actionAccept() 
    {
        if (isset($_POST['Equip_id'])) {
            $model = new EquipForMDDetails();
            $model->getModelPk($_POST['Equip_id']);
            if ($model->UserAccept2 == null || $model->UserAccept2 == '') {
                $sp = new StoredProc();
                $sp->ProcedureName = 'ACCEPT_EquipForMDDetails';
                $sp->ParametersRefresh();
                $sp->Parameters[0]['Value'] = $_POST['Equip_id'];
                
                $Employee_id = Yii::app()->user->Employee_id;
                $Query = new SQLQuery();
                $Query->setSelect("Select Alias, ShortName from Employees where Employee_id = " . $Employee_id);
                $Result = $Query->QueryRow();
                $Employee_Alias = $Result['Alias'];
                
                $sp->Parameters[1]['Value'] = $Employee_Alias;
                
                $sp->CheckParam = true;
                $sp->Execute();
                
                $ShortName = $Result['ShortName'];
                echo $ShortName;
                return;
            }
        }
        echo '0';
    }
    

    public function actionDelete()
    {
        if(isset($_POST['Equip_id'])) {
            $Equip_id = $_POST['Equip_id'];
        }
        $model = new EquipForMDDetails;
        $model->getModelPk($Equip_id);
        $model->UserChange2 = Yii::app()->user->Employee_id;

        if(!is_null($Equip_id)){
            $model->delete();
        }
    }

    public function loadModel($id)
    {
        $model=Regions::model()->findByPk($id);
        if($model===null)
                throw new CHttpException(404,'The requested page does not exist.');
        return $model;
    }

}


