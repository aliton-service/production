<?php

class DeliveryController extends Controller
{
    public $title = '';
    public $gridFilters = null;
    public $filterDefaultValues = null;
    
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
                array('allow',  // allow all users to perform 'index' and 'view' actions
                        'actions'=>array('View', 'Index', 'GetDeadline'),
                        'roles'=>array('ViewDeliveryDemands'),
                ),
                array('allow', // allow authenticated user to perform 'create' and 'update' actions
                        'actions'=>array('ToLogist'),
                        'roles'=>array('ToLogistDeliveryDemands'),
                ),
                array('allow', // allow authenticated user to perform 'create' and 'update' actions
                        'actions'=>array('UndoExec'),
                        'roles'=>array('UndoExecDeliveryDemands'),
                ),
                array('allow', // allow authenticated user to perform 'create' and 'update' actions
                        'actions'=>array('Insert', 'Create'),
                        'roles'=>array('InsertDeliveryDemands'),
                ),
                array('allow', // allow authenticated user to perform 'create' and 'update' actions
                        'actions'=>array('Update'),
                        'roles'=>array('EditDeliveryDemands'),
                ),
                array('allow', // allow admin user to perform 'admin' and 'delete' actions
                        'actions'=>array('admin','delete'),
                        'users'=>array('*'),
                ),
                array('deny',  // deny all users
                        'users'=>array('*'),
                ),
        );
    }
	
    public function actionIndex()
    {
        $this->title = 'Заявки на доставку';
        $this->gridFilters = '_filters';
        $model = new DeliveryDemands();
        $this->render('index');
    }
    
    public function actionView($Dldm_id = null) {
        if ($Dldm_id != null) {
            $model = new DeliveryDemands();
            $model->getModelPk($Dldm_id);
            $this->title = 'Заявки на доставку №' . $Dldm_id;
            
            $this->render('view', array(
                'model' => $model,
            ));
        }
        else {
            echo 'Заявка н найдена';
        }
    }
    
    public function actionCreate() {
        $model = new DeliveryDemands();
        
        $DialogId = '';
        $BodyDialogId = '';

        if (isset($_POST['Params']))
            $model->attributes = $_POST['Params'];

        if (isset($_POST['DialogId']))
            $DialogId = $_POST['DialogId'];
        if (isset($_POST['BodyDialogId']))
            $BodyDialogId = $_POST['BodyDialogId'];
        
        $ObjectResult = array(
                'result' => 0,
                'id' => 0,
                'html' => '',
            );
        
        if (isset($_POST['Params'])) 
            $model->attributes = $_POST['Params'];
        
        if (isset($_POST['DeliveryDemands'])) {
            $model->attributes = $_POST['DeliveryDemands'];
            if ($model->validate()) {
                $Res = $model->Insert();
                $ObjectResult['result'] = 1;
                $ObjectResult['id'] = $Res['dldm_id'];
                echo json_encode($ObjectResult);
                return;
            } 
        }
        
        $ObjectResult['html'] = $this->renderPartial('_form2', array(
            'model' => $model,
            'DialogId' => $DialogId,
            'BodyDialogId' => $BodyDialogId,
        ), true);
        echo json_encode($ObjectResult);
    }
    
    public function actionInsert() {
        $model = new DeliveryDemands();
        
        $DialogId = '';
        $BodyDialogId = '';
        
        $ObjectResult = array(
                'result' => 0,
                'id' => 0,
                'html' => '',
            );
        
        if (isset($_POST['Params']))
            $model->attributes = $_POST['Params'];

        if (isset($_POST['DialogId']))
            $DialogId = $_POST['DialogId'];
        if (isset($_POST['BodyDialogId']))
            $BodyDialogId = $_POST['BodyDialogId'];
        
        if (isset($_POST['DeliveryDemands'])) {
            $model->attributes = $_POST['DeliveryDemands'];
            if ($model->validate()) {
                $Res = $model->Insert();
                $ObjectResult['result'] = 1;
                $ObjectResult['id'] = $Res['dldm_id'];
                echo json_encode($ObjectResult);
                return;
            }
        }
        
        $ObjectResult['html'] = $this->renderPartial('_form', array(
            'model' => $model,
            'DialogId' => $DialogId,
            'BodyDialogId' => $BodyDialogId,
        ), true);
        echo json_encode($ObjectResult);
        
    }
    
    public function actionUpdate() {
        
        $model = new DeliveryDemands();
        
        $ObjectResult = array(
                'result' => 0,
                'id' => 0,
                'html' => '',
            );
        
        if (isset($_POST['Dldm_id']))
            $model->getModelPk($_POST['Dldm_id']);
            
        if (isset($_POST['DeliveryDemands'])) {
            $model->getModelPk($_POST['DeliveryDemands']['dldm_id']);
            $model->attributes = $_POST['DeliveryDemands'];
            if ($model->validate()) {
                $model->Update();
                $ObjectResult['result'] = 1;
                $ObjectResult['id'] = $model->dldm_id;
                echo json_encode($ObjectResult);
                return;
            }
        }
        
        $ObjectResult['html'] = $this->renderPartial('_form', array(
            'model' => $model,
            'DialogId' => 'EditDeliveryDemandDialog',
            'BodyDialogId' => 'BodyDeliveryDemDialog',
        ), true);
        echo json_encode($ObjectResult);
    }
    
    public function actionGetDeadline() {
        if (isset($_POST['Params'])) {
            $Query = new SQLQuery();
            $Query->setSelect("Select dbo.get_delivery_deadline('" . $_POST['Params']['Date'] . "', " . $_POST['Params']['Prty_id'] . ") as Deadline");
            $Result = $Query->QueryRow();
            echo $Result['Deadline'];            
        }
    }
    
    public function actionToLogist() {
        if (isset($_POST['Dldm_id'])) {
            $model = new DeliveryDemands();
            $model->getModelPk($_POST['Dldm_id']);
            if ($model->date_logist == null || $model->date_logist == '') {
                $sp = new StoredProc();
                $sp->ProcedureName = 'TO_LOGIST';
                $sp->ParametersRefresh();
                $sp->Parameters[0]['Value'] = $_POST['Dldm_id'];
                $sp->Parameters[1]['Value'] = Yii::app()->user->Employee_id;
                $sp->CheckParam = true;
                $sp->Execute();
                echo '1';
                return;
            }
        }
        echo '0';
    }
    
    public function actionUndoExec() {
        if (isset($_POST['Dldm_id'])) {
            $model = new DeliveryDemands();
            $model->getModelPk($_POST['Dldm_id']);
            if ($model->date_delivery != null && $model->date_delivery != '') {
                $sp = new StoredProc();
                $sp->ProcedureName = 'UNDO_ExecDeliveryDemand';
                $sp->ParametersRefresh();
                $sp->Parameters[0]['Value'] = $_POST['Dldm_id'];
                $sp->Parameters[1]['Value'] = Yii::app()->user->Employee_id;
                $sp->CheckParam = true;
                $sp->Execute();
                echo '1';
                return;
            }
        }
        echo '0';
    }
    
}
