<?php

class InspectionActsController extends Controller
{
    public $layout = '//layouts/column2';
    public $title = '';

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
                    'actions'=>array('index', 'view', 'getmodel', 'Agreed', 'Paste', 'Transfer'),
                    'roles'=>array('ViewInspectionActs'),
            ),
            array('allow', 
                    'actions'=>array('create'),
                    'roles'=>array('CreateInspectionActs'),
            ),
            array('allow', 
                    'actions'=>array('update'),
                    'roles'=>array('UpdateInspectionActs'),
            ),
            array('allow', 
                    'actions'=>array('delete'),
                    'roles'=>array('DeleteInspectionActs'),
            ),
            array('deny',  // deny all users
                    'users'=>array('*'),
            ),
        );
    }

    public function actionGetModel()
    {
        $model = array();
        if (isset($_POST['Inspection_id'])) {
            $model = new InspectionActs_v();
            $model->getModelPk($_POST['Inspection_id']);
        }
       
        echo json_encode($model);
    }
    
    public function actionView() {
        $model = new InspectionActs_v();
        
        if (isset($_GET['Inspection_id']))
            $model->getModelPk ($_GET['Inspection_id']);
                
        $this->render('view', array(
            'model' => $model,
        ));
        
    }
    
    public function actionCreate()
    {
        $model = new InspectionActs_v();
        $ObjectResult = array(
                'result' => 0,
                'id' => 0,
                'html' => '',
            );
        
        if (isset($_POST['Params']))
            $model->attributes = $_POST['Params'];
        
        if (isset($_POST['InspectionActs'])) {
            $model->attributes = $_POST['InspectionActs'];
            if ($model->validate()) {
                $Res = $model->Insert();
                $ObjectResult['result'] = 1;
                $ObjectResult['id'] = $Res['Inspection_id'];
                echo json_encode($ObjectResult);
                return;
            } 
        }
        
        if ($model->ObjectGr_id != '') {
            $DataContactInfo = new ContactInfo();
            $DataContactInfo = $DataContactInfo->Find(array(), array('ci.ObjectGr_id = ' . $model->ObjectGr_id));
        }
        else { $DataContactInfo = array(); }
        
        $ObjectResult['html'] = $this->renderPartial('_form', array(
            'model' => $model,
            'DataContactInfo' => $DataContactInfo,
        ), true);
        echo json_encode($ObjectResult);
    }
    

    public function actionUpdate()
    {
        $model = new InspectionActs_v();
        $ObjectResult = array(
                'result' => 0,
                'id' => 0,
                'html' => '',
            );
        if (isset($_POST['Inspection_id']))
            $model->getModelPk($_POST['Inspection_id']);

        if (isset($_POST['InspectionActs'])) {
            $model->getModelPk($_POST['InspectionActs']['Inspection_id']);
            $model->attributes = $_POST['InspectionActs'];
            if ($model->validate()) {
                $model->Update();
                $ObjectResult['result'] = 1;
                $ObjectResult['id'] = $model->Inspection_id;
                echo json_encode($ObjectResult);
                return;
            }
        }
        
        if ($model->ObjectGr_id != '') {
            $DataContactInfo = new ContactInfo();
            $DataContactInfo = $DataContactInfo->Find(array(), array('ci.ObjectGr_id = ' . $model->ObjectGr_id));
        }
        else { $DataContactInfo = array(); }
        
        $ObjectResult['html'] = $this->renderPartial('_form', array(
            'model' => $model,
            'DataContactInfo' => $DataContactInfo,
        ), true);
        echo json_encode($ObjectResult);
    }

    public function actionDelete()
    {
        $ObjectResult = array(
                'result' => 0,
                'id' => 0,
                'html' => '',
            );
        
        if (isset($_POST['Inspection_id'])) {
            $model = new InspectionActs();
            $model->getModelPk($_POST['Inspection_id']);
            if ($model->validate()) {
                $model->delete();
                $ObjectResult['result'] = 1;
                $ObjectResult['id'] = $model->Inspection_id;
                echo json_encode($ObjectResult);
                return;
            }
        }
        echo json_encode($ObjectResult);
    }

    public function actionIndex()
    {
        $this->title = 'Просмотр подразделений';
        $this->render('index');
    }
    
    public function actionAgreed() {
        $ObjectResult = array(
                'result' => 0,
                'id' => 0,
                'html' => '',
            );
        
        if (isset($_POST['InspectionActs'])) {
            $sp = new StoredProc();
            $sp->ProcedureName = 'AGREE_InspectionActs';
            $sp->ParametersRefresh();
            $sp->Parameters[0]['Value'] = $_POST['InspectionActs']['Inspection_id'];
            $sp->Parameters[1]['Value'] = Yii::app()->user->Employee_id;
            $sp->Parameters[2]['Value'] = $_POST['InspectionActs']['Type'];
            $sp->CheckParam = true;
            $Res = $sp->Execute();
            
            $ObjectResult['result'] = 1;
            $ObjectResult['id'] = 0;
            echo json_encode($ObjectResult);
            return;
        }

        echo json_encode($ObjectResult);
    }
    
    
    public function actionPaste() {
        $ObjectResult = array(
                'result' => 0,
                'id' => 0,
                'html' => '',
            );
        
        if (isset($_POST['Parameters'])) {
            $sp = new StoredProc();
            $sp->ProcedureName = 'COPY_InspectionActs';
            $sp->ParametersRefresh();
            $sp->Parameters[0]['Value'] = null;
            $sp->Parameters[1]['Value'] = $_POST['Parameters']['Inspection_id'];;
            $sp->Parameters[2]['Value'] = $_POST['Parameters']['In_ObjectGr_id'];
            $sp->Parameters[3]['Value'] = Yii::app()->user->Employee_id;
            $sp->CheckParam = true;
            $Res = $sp->Execute();
            
            $ObjectResult['result'] = 1;
            $ObjectResult['id'] = $Res['Out_Inspection_id'];
            echo json_encode($ObjectResult);
            return;
        }

        echo json_encode($ObjectResult);
    }
    
    public function actionTransfer() {
        $ObjectResult = array(
                'result' => 0,
                'id' => 0,
                'html' => '',
            );
        
        if (isset($_POST['Inspection_id'])) {
            $sp = new StoredProc();
            $sp->ProcedureName = 'TRANSFER_EQUIPS';
            $sp->ParametersRefresh();
            $sp->Parameters[0]['Value'] = $_POST['Inspection_id'];
            $sp->CheckParam = true;
            $Res = $sp->Execute();
            
            $ObjectResult['result'] = 1;
            echo json_encode($ObjectResult);
            return;
        }

        echo json_encode($ObjectResult);
    }
}





