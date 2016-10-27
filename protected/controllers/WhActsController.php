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
                    'actions'=>array('index', 'view'),
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
    
    public function actionIndex() {
        $this->title = 'Просмотр актов';
        
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
        
        $this->render('Index');
    }
    
    public function actionView($docm_id) {
        $this->title = 'Просмотр акта';
        
        $model = new WhActs_v();
        $model->getModelPk($docm_id);
        
        $this->render('View', array(
            'model' => $model,
        ));
    }
    
    public function actionInsert() {
        $this->title = 'Создание акта';
        
        $model = new WhActs_v();
        $model->setScenario('Insert');
        
        if(isset($_POST['WhActs']))
        {
            $model->attributes=$_POST['WhActs'];
            
            $model->EmplCreate = Yii::app()->user->Employee_id;

            if ($model->validate()) {
                $model->insert();
                $this->redirect(Yii::app()->createUrl('WhActs/index'));
            }
        }
        
        $this->render('insert', array(
                'model'=>$model,
            )
        );
    }
    
    public function actionUpdate($docm_id) {
        $this->title = 'Редактирование акта';
        
        $model = new WhActs_v();
        $model->setScenario('Update');
        
        if ($docm_id == null)
                throw new CHttpException(404, 'Не выбрана запись.');
        
        if(isset($_POST['WhActs']))
        {
            $model->attributes=$_POST['WhActs'];
            
            $model->EmplChange = Yii::app()->user->Employee_id;

            if ($model->validate())
                $model->update();
        }
        else
        {
            $model->getmodelPk($docm_id);
        }

        $this->render('update', array(
                'model'=>$model,
            )
        );
    }
    
    public function actionConfirm($docm_id) {
        
        $model = new WhActs_v();
        $model->getModelPk($docm_id);

        $model->setScenario('Confirm');
        
        if ($model->achs_id === null)
            if ($model->validate()) {
                //$model->callProc('INSERT_ActionHistory');
                
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
                         
                $StoredProc->Execute();
                
                $this->redirect($_SERVER['HTTP_REFERER']);
            }
            else {
                $this->render('update', array(
                    'model'=>$model,
                ));
            }
        else
            $this->redirect($_SERVER['HTTP_REFERER']);
    }
    
    public function actionAddTreb($docm_id = null) {
        $this->title = 'Просмотр акта';
        
        if (isset($_POST['Treb'])) {
            print_r($_POST['Treb']);
            
            $StoredProc = new StoredProc();
            $StoredProc->ProcedureName = 'INSERT_ActDocuments';
            $StoredProc->CheckParam = true;
            $StoredProc->ParametersRefresh();

            $StoredProc->Parameters[0]['Value'] = null;
            $StoredProc->Parameters[1]['Value'] = $_POST['Treb']['act_id'];
            $StoredProc->Parameters[2]['Value'] = $_POST['Treb']['docm_id'];
            
            $StoredProc->Execute();
        }
        
        $model = new WhActs_v();
        $model->getModelPk($docm_id);
        
        $this->redirect($this->createUrl('WhActs/view', array('docm_id' => $docm_id)));
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
}

