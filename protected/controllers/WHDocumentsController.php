<?php

class WHDocumentsController extends Controller
{
    public $layout = '//layouts/column2';
    public $title = '';
    public $gridFilters = null;
    public $filterDefaultValues = null;
    

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
                    'actions'=>array('index', 'View', 'GetWhNotes', 'GetModel'),
                    'roles'=>array('WHDocumentsView'),
            ),
            array('allow', 
                    'actions'=>array('Create'),
                    'roles'=>array('CreateWHDocuments'),
            ),
            array('allow', 
                    'actions'=>array('Update'),
                    'roles'=>array('UpdateWHDocuments'),
            ),
            array('allow', 
                    'actions'=>array('AddNote'),
                    'roles'=>array('AddNoteWHDocuments'),
            ),
            array('allow', 
                    'actions'=>array('Delete'),
                    'roles'=>array('DeleteWHDocuments'),
            ),
            array('allow', 
                    'actions'=>array('AuditEquips'),
                    'roles'=>array('AuditEquipsWHDocuments'),
            ),
            array('allow', 
                    'actions'=>array('Ready'),
                    'roles'=>array('ReadyWHDocuments'),
            ),
            array('allow', 
                    'actions'=>array('Undo'),
                    'roles'=>array('UndoReadyWHDocuments'),
            ),
            array('allow', 
                    'actions'=>array('Action', 'ConfirmCancel', 'Confirm'),
                    'users'=>array('*'),
            ),
            array('allow', 
                    'actions'=>array('Purchase'),
                    'roles'=>array('PurchaseWHDocuments'),
            ),
            array('deny',  // deny all users
                    'users'=>array('*'),
            ),
        );
    }
    
    public function actionGetModel()
    {
        $model = array();
        if (isset($_POST['Dctp_id'])) {
            if (isset($_POST['Docm_id'])) {
                $model = new WHDocuments();
                $model->getModelPk($_POST['Docm_id']);
            }
        }
        
        echo json_encode($model);
    }

    public function actionCreate()
    {
        if (isset($_POST['Dctp_id'])) {
            switch ($_POST['Dctp_id']) {
                case 1: $model = new WHDocumentsDoc1(); break;
                case 2: $model = new WHDocumentsDoc2(); break;
                case 3: $model = new WHDocumentsDoc3(); break;
                case 4: $model = new WHDocumentsDoc4(); break;
                case 7: $model = new WHDocumentsDoc7(); break;
                case 8: $model = new WHDocumentsDoc8(); break;
                case 9: $model = new WHDocumentsDoc9(); break;
                default: $model = new WHDocuments(); break;
            }
            $model->dctp_id = $_POST['Dctp_id'];
        }
        
        $DialogId = '';
        $BodyDialogId = '';
        
        if (isset($_POST['DialogId']))
            $DialogId = $_POST['DialogId'];
        if (isset($_POST['BodyDialogId']))
            $BodyDialogId = $_POST['BodyDialogId'];
        
        if (isset($_POST['Params']))
            $model->attributes = $_POST['Params'];
        
        $ObjectResult = array(
                'result' => 0,
                'id' => 0,
                'html' => '',
            );
        
                
        if (isset($_POST['WHDocuments'])) {
            $model->attributes = $_POST['WHDocuments'];
            if ($model->validate()) {
                $modelUpd = new WHDocuments();
                $modelUpd->attributes = $model->attributes;
                if ((int)$model->dctp_id == 4) {
                    $modelUpd->SP_INSERT_NAME = 'INSERT_Treb';
                }
                $Result =  $modelUpd->Insert();
                $ObjectResult['result'] = 1;
                $ObjectResult['id'] = $Result['docm_id'];
                echo json_encode($ObjectResult);
                return;
            }
        }

        switch ($model->dctp_id) {
            case 1:
                $ObjectResult['html'] = $this->renderPartial('_formDoc1', array(
                    'model' => $model,
                    'DialogId' => $DialogId,
                    'BodyDialogId' => $BodyDialogId,
                ), true);
            break;
            case 2:
                $ObjectResult['html'] = $this->renderPartial('_formDoc2', array(
                    'model' => $model,
                    'DialogId' => $DialogId,
                    'BodyDialogId' => $BodyDialogId,
                ), true);
            break;
            case 3:
                $ObjectResult['html'] = $this->renderPartial('_formDoc3', array(
                    'model' => $model,
                    'DialogId' => $DialogId,
                    'BodyDialogId' => $BodyDialogId,
                ), true);
            break;
            case 4:
                if ($model->objc_id == '' || $model->objc_id == null) {
                    $model->objc_id = 7337;
                    $model->Address = 'ЗИП ул., д.нет , СПб';
                }
                $ObjectResult['html'] = $this->renderPartial('_formDoc4', array(
                    'model' => $model,
                    'DialogId' => $DialogId,
                    'BodyDialogId' => $BodyDialogId,
                ), true);
            break;
            case 8:
                $ObjectResult['html'] = $this->renderPartial('_formDoc8', array(
                    'model' => $model,
                    'DialogId' => $DialogId,
                    'BodyDialogId' => $BodyDialogId,
                ), true);
            break;
            case 7:
                $ObjectResult['html'] = $this->renderPartial('_formDoc7', array(
                    'model' => $model,
                    'DialogId' => $DialogId,
                    'BodyDialogId' => $BodyDialogId,
                ), true);
            break;
            case 9:
                $ObjectResult['html'] = $this->renderPartial('_formDoc9', array(
                    'model' => $model,
                    'DialogId' => $DialogId,
                    'BodyDialogId' => $BodyDialogId,
                ), true);
            break;
            default:
                $ObjectResult['html'] = $this->renderPartial('_form', array(
                    'model' => $model,
                    'DialogId' => $DialogId,
                    'BodyDialogId' => $BodyDialogId,
                ), true);
            break;
        };
        
        echo json_encode($ObjectResult);
    }


    public function actionUpdate()
    {
        if (isset($_POST['Dctp_id'])) {
            switch ($_POST['Dctp_id']) {
                case 1: $model = new WHDocumentsDoc1(); break;
                case 2: $model = new WHDocumentsDoc2(); break;
                case 3: $model = new WHDocumentsDoc3(); break;
                case 4: $model = new WHDocumentsDoc4(); break;
                case 7: $model = new WHDocumentsDoc7(); break;
                case 8: $model = new WHDocumentsDoc8(); break;
                case 9: $model = new WHDocumentsDoc9(); break;
                default: $model = new WHDocuments(); break;
            }
        }
        
        $DialogId = '';
        $BodyDialogId = '';
        
        if (isset($_POST['DialogId']))
            $DialogId = $_POST['DialogId'];
        if (isset($_POST['BodyDialogId']))
            $BodyDialogId = $_POST['BodyDialogId'];
        
        $ObjectResult = array(
                'result' => 0,
                'id' => 0,
                'html' => '',
            );
        
        
        if (isset($_POST['Docm_id']))
            $model->getModelPk($_POST['Docm_id']);

        if (isset($_POST['WHDocuments'])) {
            $model->getModelPk($_POST['WHDocuments']['docm_id']);
            $model->attributes = $_POST['WHDocuments'];
            if ($model->validate()) {
                $modelUpd = new WHDocuments();
                $modelUpd->attributes = $model->attributes;
                if ((int)$model->dctp_id == 4) {
                    $modelUpd->SP_UPDATE_NAME = 'UPDATE_Treb';
                }
                $modelUpd->Update();
                $ObjectResult['result'] = 1;
                $ObjectResult['id'] = $modelUpd->docm_id;
                echo json_encode($ObjectResult);
                return;
            }
        }

        switch ($model->dctp_id) {
            case 1:
                $ObjectResult['html'] = $this->renderPartial('_formDoc1', array(
                    'model' => $model,
                ), true);
            break;
            case 2:
                if (isset($_POST['InNumber']))
                    $model->in_number = $_POST['InNumber'];
                
                $ObjectResult['html'] = $this->renderPartial('_formDoc2', array(
                    'model' => $model,
                ), true);
            break;
            case 3:
                if (isset($_POST['InNumber']))
                    $model->in_number = $_POST['InNumber'];
                
                $ObjectResult['html'] = $this->renderPartial('_formDoc3', array(
                    'model' => $model,
                ), true);
            break;            
            case 4:
                $ObjectResult['html'] = $this->renderPartial('_formDoc4', array(
                    'model' => $model,
                    'DialogId' => $DialogId,
                    'BodyDialogId' => $BodyDialogId,
                ), true);
            break;
            case 8:
                $ObjectResult['html'] = $this->renderPartial('_formDoc8', array(
                    'model' => $model,
                ), true);
            break;
            case 7:
                $ObjectResult['html'] = $this->renderPartial('_formDoc7', array(
                    'model' => $model,
                ), true);
            break;
            case 9:
                $ObjectResult['html'] = $this->renderPartial('_formDoc9', array(
                    'model' => $model,
                ), true);
            break;
            default:
                $ObjectResult['html'] = $this->renderPartial('_form', array(
                    'model' => $model,
                ), true);
            break;
        };
        
        echo json_encode($ObjectResult);
    }
    
    public function actionAddNote() {
        $ObjectResult = array(
                'result' => 0,
                'id' => 0,
                'html' => '',
            );
        
        if (isset($_POST['Note'])) {
            $sp = new StoredProc();
            $sp->ProcedureName = 'INSERT_WHNot';
            $sp->ParametersRefresh();
            $sp->Parameters[0]['Value'] = $_POST['Note']['docm_id'];
            $sp->Parameters[1]['Value'] = $_POST['Note']['note'];
            $sp->Parameters[2]['Value'] = Yii::app()->user->Employee_id;
            $sp->CheckParam = true;
            $sp->Execute();
            
            $ObjectResult['result'] = 1;
            $ObjectResult['id'] = $_POST['Note']['docm_id'];
            echo json_encode($ObjectResult);
            return;
        }
        echo json_encode($ObjectResult);
    }

    public function actionDelete()
    {
        $ObjectResult = array(
                'result' => 0,
                'id' => 0,
                'html' => '',
            );
        
        if (isset($_POST['Docm_id'])) {
            $model = new WHDocuments();
            $model->getModelPk($_POST['Docm_id']);
            $model->delete();
            $ObjectResult['result'] = 1;
            $ObjectResult['id'] = $model->docm_id;
            echo json_encode($ObjectResult);
            return;
        }
        
        echo json_encode($ObjectResult);
    }

    public function actionIndex()
    {
        $this->title = 'Склад - реестр документов';
        $this->gridFilters = '_filters';
        $this->render('index');
    }
    
    public function actionView() {
        $this->title = 'Склад - просмотр документа';
        $ActionCode = 0;        
        $Docm_id = 0;
        if (isset($_POST['Docm_id']))
            $Docm_id = $_POST['Docm_id'];
        if (isset($_GET['Docm_id']))
            $Docm_id = $_GET['Docm_id'];
        
        if ($Docm_id != 0) {
            $model = new WHDocuments();
            $model->getModelPk($Docm_id);
            
            switch ($model->dctp_id) {
                case 1:
                    $this->title = 'Накладная на приход №' . $model->number;
                    $this->setPageTitle('Накладная на приход №' . $model->number);
                    $ActionCode = 201;
                    break;
                case 2:
                    $this->title = 'Накладная на возврат №' . $model->number;
                    $this->setPageTitle('Накладная на возврат №' . $model->number);
                    $ActionCode = 301;
                    break;
                case 3:
                    $this->title = 'Накладная на возврат поставщику №' . $model->number;
                    $this->setPageTitle('Накладная на возврат поставщику №' . $model->number);
                    $ActionCode = 102;
                    break;
                case 4:
                    $this->title = 'Требование на выдачу №' . $model->number;
                    $this->setPageTitle('Требование на выдачу №' . $model->number);
                    $ActionCode = 103;
                    break;
                case 7:
                    $this->title = 'Перемещение из ПРЦ на СКЛАД №' . $model->number;
                    $this->setPageTitle('Перемещение из ПРЦ на СКЛАД №' . $model->number);
                    $ActionCode = 501;
                    break;
                case 8:
                    $this->title = 'Перемещение с склада на склад №' . $model->number;
                    $this->setPageTitle('Перемещение с склада на склад №' . $model->number);
                    $ActionCode = 101;
                    break;
                case 9:
                    $this->title = 'Накладная на возврат мастеру №' . $model->number;
                    $this->setPageTitle('Накладная на возврат мастеру №' . $model->number);
                    $ActionCode = 603;
                    break;
            }
        }
        
        $this->render('view', array(
            'model' => $model,
            'ActionCode' => $ActionCode,
        ));
    }
    
    public function actionGetWhNotes() {
        $Result = array(
            'result' => 0,
            'text' => '',
        );
        
        if (isset($_POST['Docm_id'])) {
            $Query = new SQLQuery();
            $Query->setSelect('Select dbo.get_wh_notes(' . $_POST['Docm_id'] . ') notes');
            $Res = $Query->QueryRow();
            $Result['result'] = 1;
            $Result['text'] = $Res['notes'];
        }
        echo json_encode($Result);
    }
    
    public function actionAuditEquips() {
        $ObjectResult = array(
                'result' => 0,
                'id' => 0,
                'html' => '',
            );
        
        if (isset($_GET['Docm_id'])) {
            $ObjectResult['result'] = 1;
            $ObjectResult['id'] = $_GET['Docm_id'];
            $ObjectResult['html'] = $this->renderPartial('equipsaudit', array(
                    'Docm_id' => $_GET['Docm_id'],
                ), true);
            echo json_encode($ObjectResult);
        }
    }
    
    private function SetEmptyNull($Value) {
        if ($Value === '')
            return null;
        else return $Value;
    }
    
    public function actionAction() {
        $ObjectResult = array(
                'result' => 0,
                'id' => 0,
                'html' => '',
            );
        
        if (isset($_POST['ActionHistory'])) {
            $Type = (int)$_POST['ActionHistory']['Dctp_id'];
            switch ($Type) {
                case 1: 
                    if (!Yii::app()->user->checkAccess('Action1WHDocuments'))
                        throw new Exception('У вас недостаточно прав для данной операции');
                break;
            }
                        
            $sp = new StoredProc();
            $sp->ProcedureName = 'INSERT_ActionHistory';
            $sp->ParametersRefresh();
            $sp->Parameters[0]['Value'] = null;
            $sp->Parameters[1]['Value'] = $this->SetEmptyNull($_POST['ActionHistory']['Dlrs_id']);
            $sp->Parameters[2]['Value'] = $this->SetEmptyNull($_POST['ActionHistory']['Docm_id']);
            $sp->Parameters[3]['Value'] = $this->SetEmptyNull($_POST['ActionHistory']['ActnCode']);
            $sp->Parameters[4]['Value'] = $this->SetEmptyNull($_POST['ActionHistory']['Strm_id']);
            $sp->Parameters[5]['Value'] = $this->SetEmptyNull($_POST['ActionHistory']['Splr_id']);
            $sp->Parameters[6]['Value'] = $this->SetEmptyNull($_POST['ActionHistory']['Mstr_id']);
            $sp->Parameters[7]['Value'] = $this->SetEmptyNull($_POST['ActionHistory']['Objc_id']);
            $sp->Parameters[8]['Value'] = $this->SetEmptyNull($_POST['ActionHistory']['Empl_To_id']);
            $sp->Parameters[9]['Value'] = $this->SetEmptyNull($_POST['ActionHistory']['Wrtp_id']);
            $sp->Parameters[10]['Value'] = Yii::app()->user->Employee_id;
            $sp->CheckParam = true;
            $Res = $sp->Execute();
            
            $ObjectResult['result'] = 1;
            $ObjectResult['id'] = $Res['achs_id'];
            echo json_encode($ObjectResult);
            return;
        }

        echo json_encode($ObjectResult);
    }
    
    public function actionPurchase() {
        $ObjectResult = array(
                'result' => 0,
                'id' => 0,
                'html' => '',
            );
        
        if (isset($_POST['Docm_id'])) {
            $sp = new StoredProc();
            $sp->ProcedureName = 'in_purchase';
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
    
    public function actionConfirmCancel() {
        $ObjectResult = array(
                'result' => 0,
                'id' => 0,
                'html' => '',
            );
        
        if (isset($_POST['Achs_id']) && isset($_POST['Dctp_id'])) {
            $ObjectResult['result'] = 1;
            $ObjectResult['id'] = $_POST['Achs_id'];
            $ObjectResult['html'] = $this->renderPartial('confirm', array(
                    'Achs_id' => $_POST['Achs_id'],
                    'Dctp_id' => $_POST['Dctp_id'], 
                ), true);
            
        }
        
        echo json_encode($ObjectResult);
    }
    
    public function actionReady() {
        $ObjectResult = array(
                'result' => 0,
                'id' => 0,
                'html' => '',
            );
        
        if (isset($_POST['Docm_id'])) {
            $sp = new StoredProc();
            $sp->ProcedureName = 'Ready_WHDocuments';
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
    
    public function actionUndo() {
        $ObjectResult = array(
                'result' => 0,
                'id' => 0,
                'html' => '',
            );
        
        if (isset($_POST['Docm_id'])) {
            $sp = new StoredProc();
            $sp->ProcedureName = 'UNDO_Ready_WHDocuments';
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
    
    public function actionConfirm() {
        $ObjectResult = array(
                'result' => 0,
                'id' => 0,
                'html' => '',
            );
        
        if (isset($_POST['ConfirmCancels'])) {
            $Type = (int)$_POST['ConfirmCancels']['Dctp_id'];
            
            switch ($Type) {
                case 1: 
                    if (!Yii::app()->user->checkAccess('Confirm1WHDocuments'))
                        throw new Exception('У вас недостаточно прав для данной операции');
                break;
            }
            
            $sp = new StoredProc();
            $sp->ProcedureName = 'UNDO_WHAction';
            $sp->ParametersRefresh();
            $sp->Parameters[0]['Value'] = $_POST['ConfirmCancels']['Achs_id'];
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
}





