<?php

class DeliveryController extends Controller
{
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
                array('allow',  // allow all users to perform 'index' and 'view' actions
                        'actions'=>array('View', 'Index', 'GetDeadline'),
                        'roles'=>array('ViewDeliveryDemands'),
                ),
                array('allow', // allow authenticated user to perform 'create' and 'update' actions
                        'actions'=>array('ToLogist'),
                        'roles'=>array('ToLogistDeliveryDemands'),
                ),
                array('allow', // allow authenticated user to perform 'create' and 'update' actions
                        'actions'=>array('Insert'),
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
    
    public function actionInsert() {
        $model = new DeliveryDemands();
        
        if (isset($_POST['DeliveryDemands'])) {
            $model->attributes = $_POST['DeliveryDemands'];
            if ($model->validate()) {
                $model->Insert();
                echo '1';
                return;
            }
        }
        
        $this->renderPartial('_form', array(
            'model' => $model,
        ));
    }
    
    public function actionUpdate() {
        
        $model = new DeliveryDemands();
        if (isset($_POST['Dldm_id']))
            $model->getModelPk($_POST['Dldm_id']);
            
        if (isset($_POST['DeliveryDemands'])) {
            $model->getModelPk($_POST['DeliveryDemands']['dldm_id']);
            $model->attributes = $_POST['DeliveryDemands'];
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
}
