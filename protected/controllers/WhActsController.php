<?php

class WhActsController extends Controller
{
    public $layout='//layouts/column2';
    public $title = 'Акты';
    public $gridFilters = null;
    public $filterDefaultValues = null;
    
    public function filters()
    {
        return array(
                'accessControl', // perform access control for CRUD operations
                'postOnly + delete2', // we only allow deletion via POST request
        );
    }
	
    public function accessRules()
    {
        return array(
            array('allow',  
                    'actions'=>array('addtreb'),
                    'roles'=>array('AddTrebWhActs'),
            ),
            array('allow',  
                    'actions'=>array('confirm'),
                    'roles'=>array('ConfirmWhActs'),
            ),
            array('allow',  
                    'actions'=>array('index', 'view', 'GetContracts', 'GetModel', 'Control'),
                    'roles'=>array('ViewWhActs'),
            ),
            array('allow',  
                    'actions'=>array('insert'),
                    'roles'=>array('InsertWhActs'),
            ),
            array('allow',  
                    'actions'=>array('update'),
                    'roles'=>array('UpdateWhActs'),
            ),
            array('allow',  
                    'actions'=>array('delete'),
                    'roles'=>array('DeleteWhActs'),
            ),
            array('allow',  
                    'actions'=>array('undo'),
                    'roles'=>array('UndoWhActs'),
            ),
            array('deny',  // deny all users
                    'users'=>array('*'),
            ),
        );
    }
    
    public function actionControl() {
        $this->title = 'Контроль списания';
        $this->setPageTitle('Контроль списания');
        $this->gridFilters = '_filters2';
        
        $this->render('control');
    }
    
    public function actionIndex() {
        $this->title = 'Просмотр актов';
        $this->setPageTitle('Просмотр актов');
        
        $this->gridFilters = '_filters';
        $this->filterDefaultValues = array(
            'DateStart' => '',
            'DateEnd' => '',
            'DateCrStart' => '',
            'DateCrEnd' => '',
            'DateAcStart' => '',
            'DateAcEnd' => '',
            'Master' => '',
            'Address' => '',
        );
        
        if (isset($_GET['Address'])) {
            if (strlen($_GET['Address']) > 5)
                $Str = mb_substr($_GET['Address'], 0, 5);
            else
                $Str = mb_substr($_GET['Address'], 0, strlen($_GET['Address']));
            $this->filterDefaultValues['Address'] = $Str;
        }
        
        $this->render('Index');
    }
    
    public function actionView($docm_id) {
        $this->title = 'Просмотр акта';
        $this->setPageTitle('Просмотр акта');
        
        $model = new WhActs_v();
        $model->getModelPk($docm_id);
        
        $this->render('View', array(
            'model' => $model,
        ));
    }
    
    public function actionInsert() {
        $model = new WhActs_v();
        
        $ObjectResult = array(
            'result' => 0,
            'id' => 0,
            'html' => '',
        );
        
        if (isset($_POST['Params']))
            $model->attributes = $_POST['Params'];
        
        if (isset($_POST['WhActs'])) {
            $model->attributes = $_POST['WhActs'];
            if ($model->validate()) {
                $Res = $model->Insert();
                $ObjectResult['result'] = 1;
                $ObjectResult['id'] = $Res['docm_id'];
                echo json_encode($ObjectResult);
                return;
            } 
        }
        
        $ObjectResult['html'] = $this->renderPartial('_form', array(
            'model' => $model,
        ), true);
        echo json_encode($ObjectResult);
    }
    
    public function actionUpdate() {
        $model = new WhActs_v();
        
        $ObjectResult = array(
            'result' => 0,
            'id' => 0,
            'html' => '',
        );
        if (isset($_POST['docm_id']))
            $model->getModelPk($_POST['docm_id']);

        if (isset($_POST['WhActs'])) {
            $model->getModelPk($_POST['WhActs']['docm_id']);
            $model->attributes = $_POST['WhActs'];
            if ($model->validate()) {
                $model->Update();
                $ObjectResult['result'] = 1;
                $ObjectResult['id'] = $model->docm_id;
                echo json_encode($ObjectResult);
                return;
            }
        }

        $ObjectResult['html'] = $this->renderPartial('_form', array(
            'model' => $model,
        ), true);
        echo json_encode($ObjectResult);
    }
    
    public function actionConfirm() {
        $ObjectResult = array(
                'result' => 0,
                'id' => 0,
                'html' => '',
            );
        
        if (isset($_POST['Docm_id'])) {
            $model = new WhActs_v();
            $model->getModelPk($_POST['Docm_id']);
                   
            $StoredProc = new StoredProc();
            $StoredProc->ProcedureName = 'INSERT_ActionHistory';
            $StoredProc->CheckParam = true;
            $StoredProc->ParametersRefresh();
            $StoredProc->Parameters[0]['Value'] = null;
            $StoredProc->Parameters[1]['Value'] = $model->dlrs_id;
            $StoredProc->Parameters[2]['Value'] = $model->docm_id;
            $StoredProc->Parameters[3]['Value'] = 304;
            $StoredProc->Parameters[4]['Value'] = null;
            $StoredProc->Parameters[5]['Value'] = null;
            $StoredProc->Parameters[6]['Value'] = $model->dmnd_empl_id;
            $StoredProc->Parameters[7]['Value'] = $model->objc_id;
            $StoredProc->Parameters[8]['Value'] = null;
            $StoredProc->Parameters[9]['Value'] = null;
            $StoredProc->Parameters[10]['Value'] = Yii::app()->user->Employee_id;
            
            $Res = $StoredProc->Execute();

            $ObjectResult['result'] = 1;
            $ObjectResult['id'] = $Res['achs_id'];
            echo json_encode($ObjectResult);
            return;
        }


        echo json_encode($ObjectResult);
    }

        

    public function actionAddTreb($docm_id = null) {
        $ObjectResult = array(
                'result' => 0,
                'id' => 0,
                'html' => '',
            );
        
        if (isset($_POST['Docm_id']) && isset($_POST['Act_id'])) {
            $sp = new StoredProc();
            $sp->ProcedureName = 'INSERT_ActDocuments';
            $sp->ParametersRefresh();
            $StoredProc->Parameters[0]['Value'] = null;
            $sp->Parameters[1]['Value'] = $_POST['Act_id'];
            $sp->Parameters[2]['Value'] = $_POST['Docm_id'];
            $sp->CheckParam = true;
            $Res = $sp->Execute();
            
            $ObjectResult['result'] = 1;
            $ObjectResult['id'] = 0;
            echo json_encode($ObjectResult);
            return;
        }

        echo json_encode($ObjectResult);
    }
    
    public function actionDelete($docm_id = null) {
        $ObjectResult = array(
                'result' => 0,
                'id' => 0,
                'html' => '',
            );
        
        if (isset($_POST['Docm_id'])) {
            $sp = new StoredProc();
            $sp->ProcedureName = 'DELETE_WHDocuments';
            $sp->ParametersRefresh();
            $sp->Parameters[0]['Value'] = $_POST['Docm_id'];
            $sp->Parameters[1]['Value'] = Yii::app()->user->Employee_id;
            $sp->CheckParam = true;
            $Res = $sp->Execute();
            
            $ObjectResult['result'] = 1;
            $ObjectResult['id'] = 0;
            echo json_encode($ObjectResult);
            return;
        }

        echo json_encode($ObjectResult);

    }
    
    public function actionUndo($docm_id = null) {
        $ObjectResult = array(
                'result' => 0,
                'id' => 0,
                'html' => '',
            );
        
        if (isset($_POST['Docm_id']) && isset($_POST['Achs_id'])) {
            $sp = new StoredProc();
            $sp->ProcedureName = 'UNDO_WHAction';
            $sp->ParametersRefresh();
            $sp->Parameters[0]['Value'] = $_POST['Achs_id'];
            $sp->Parameters[1]['Value'] = Yii::app()->user->Employee_id;
            $sp->CheckParam = true;
            $Res = $sp->Execute();
            
            $ObjectResult['result'] = 1;
            $ObjectResult['id'] = 0;
            echo json_encode($ObjectResult);
            return;
        }

        echo json_encode($ObjectResult);
    }
    
    public function actionGetContracts() {
        $ObjectResult = array(
                'result' => 0,
                'id' => 0,
                'html' => '',
            );
        
        if (isset($_POST['ObjectGr_id']) && isset($_POST['Date'])) {
            $q = new SQLQuery();
            $q->setSelect("Select
                                c.ContrS_id,
                                isNull(c.ServiceType, 'Не на обслуживании') + isNull(' (договор № ' + c.ContrNumS + ' от ' + convert(nvarchar, c.ContrDateS, 104) + ')', '') ServiceType,
                                c.Jrdc_id,
                                case when ('" . $_POST['Date'] . "' between dbo.truncdate(c.ContrSDateStart) and dbo.truncdate(c.ContrSDateEnd)) then 1 else 0 end Act
                            From Contracts_v c
                            Where c.ObjectGr_id = " . $_POST['ObjectGr_id'] . " and c.DocType_id = 4
                            Order by c.ContrDateS");
            $Res = $q->QueryAll();
            $ObjectResult['result'] = 1;
            $ObjectResult['html'] = $Res;
            
        }
        
        echo json_encode($ObjectResult);
        return;
    }
    
    public function actionGetModel()
    {
        $model = array();
        if (isset($_POST['Docm_id'])) {
            $model = new WhActs_v();
            $model->getModelPk($_POST['Docm_id']);
        }
       
        echo json_encode($model);
    }
}

