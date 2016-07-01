<?php

class RepairMaterialsController extends Controller
{
    public $layout = '//layouts/column2';
    public $title = '';

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
                    'actions' => array('Index'),
                    'roles' => array('ViewRepairMaterials'),
            ),
            array('allow', 
                    'actions' => array('create', 'EditForm'),
                    'roles' => array('CreateRepairMaterials'),
            ),
            array('allow', 
                    'actions' => array('update'),
                    'roles' => array('UpdateRepairMaterials'),
            ),
            array('allow',
                    'actions' => array('delete'),
                    'roles' => array('DeleteRepairMaterials'),
            ),
            array('deny',  // deny all users
                    'users' => array('*'),
            ),
        );
    }

    public function actionIndex($Repr_id)
    {
        if ($this->isAjax()) 
                $this->renderPartial('index', array(
                    'repr_id' => $Repr_id
                    ), false, true);
        else
            $this->render('index', array(
                    'Repr_id' => $Repr_id
                )
            );
        
    }
    
    public function actionCreate() {
        $model = new RepairMaterials();
        
        if (isset($_POST['RepairMaterials'])) {
            $model->attributes = $_POST['RepairMaterials'];
            if ($model->validate()) {
                $Result = $model->Insert();
                echo $Result['RepairMaterial_id'];
            }
            else
                echo '0';
        }
        else {
            $this->renderPartial('_form', array(
                'model' => $model,
                'action' => 'Create();',
            ), null, true);
        }
    }
    
    public function actionUpdate($RepairMaterial_id = 0) {
        $model = new RepairMaterials();
        $model->getModelPk($RepairMaterial_id);
        
        if (isset($_POST['RepairMaterials'])) {
            $model->attributes = $_POST['RepairMaterials'];
            if ($model->validate()) {
                $Result = $model->Update();
                echo $Result['RepairMaterial_id'];
            }
            else
                echo '0';
        }
        else {
            $this->renderPartial('_form', array(
                'model' => $model,
                'action' => 'Update();',
            ), null, true);
        }
    }
    
    public function actionDelete($RepairMaterial_id = 0) {
        if ($RepairMaterial_id != 0) {
            $StoredProc = new StoredProc();
            $StoredProc->ProcedureName = 'DELETE_RepairMaterials';
            $StoredProc->ParametersRefresh();
            
            $StoredProc->SetParamValue('@RepairMaterial_id', $RepairMaterial_id);
            $StoredProc->SetParamValue('@EmplChange', Yii::app()->user->Employee_id);
            
            $Result = $StoredProc->Execute();
           
        }
    }

}

