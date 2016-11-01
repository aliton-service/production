<?php

class ScheduleClientsController extends Controller
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
                'actions'=>array('index', 'view'),
                'roles'=>array('ViewScheduleClients'),
            ),
            array('allow', 
                'actions'=>array('create'),
                'roles'=>array('CreateScheduleClients'),
            ),
            array('allow', 
                'actions'=>array('update'),
                'roles'=>array('UpdateScheduleClients'),
            ),
            array('allow', 
                'actions'=>array('delete'),
                'roles'=>array('DeleteScheduleClients'),
            ),
            array('allow',
                'actions'=>array('accept'),
                'roles'=>array('AcceptScheduleClients'),
            ),
            array('allow',
                'actions'=>array('cancelAccept'),
                'roles'=>array('CancelAcceptScheduleClients'),
            ),
            array('deny',  // deny all users
                'users'=>array('*'),
            ),
        );
    }

    public function actionCreate()
    {
        $model = new ScheduleClients();
        
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
        
        if (isset($_POST['ScheduleClients'])) {
            $model->attributes = $_POST['ScheduleClients'];
            $model->EmplCreate = Yii::app()->user->Employee_id;
            if ($model->validate()) {
                $model->Insert();
                $ObjectResult['result'] = 1;
                $ObjectResult['id'] = $model->form_id;
                echo json_encode($ObjectResult);
                return;
            }
        }
        
        $this->renderPartial('_form', array(
            'model' => $model,
            'DialogId' => $DialogId,
            'BodyDialogId' => $BodyDialogId,
        ));
       
    }


    public function actionUpdate()
    {
        $model = new ScheduleClients();
        
        $DialogId = '';
        $BodyDialogId = '';
        
        $ObjectResult = array(
            'result' => 0,
            'id' => 0,
            'html' => '',
        );
        
        if (isset($_POST['DialogId']))
            $DialogId = $_POST['DialogId'];
        
        if (isset($_POST['BodyDialogId']))
            $BodyDialogId = $_POST['BodyDialogId'];
        
        if (isset($_POST['form_id']))
            $model->getModelPk($_POST['form_id']);

        if (isset($_POST['ScheduleClients'])) {
            $model->getModelPk($_POST['ScheduleClients']['form_id']);
            $model->attributes = $_POST['ScheduleClients'];
            if ($model->validate()) {
                $model->Update();
                $ObjectResult['result'] = 1;
                $ObjectResult['id'] = $model->form_id;
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

    public function actionDelete()
    {
        $ObjectResult = array(
            'result' => 0,
            'id' => 0,
            'html' => '',
        );
        
        if (isset($_POST['form_id'])) {
            $model = new ScheduleClients();
            $model->getModelPk($_POST['form_id']);
            if ($model->validate()) {
                $model->Delete();
                $ObjectResult['result'] = 1;
                $ObjectResult['id'] = $model->form_id;
                echo json_encode($ObjectResult);
                return;
            }
        }
        echo json_encode($ObjectResult);
    }

    public function actionIndex()
    {
        if (isset($_GET['form_id'])) {
            $model = new ScheduleClients();

            $this->title = 'Графики';

            $model->getModelPk($_GET['form_id']);

            $this->render('index', array(
                'model' => $model,
            ));
        }
    }
    
    public function actionAccept() 
    {
        if (isset($_POST['form_id'])) {
            $model = new ScheduleClients();
            $model->getModelPk($_POST['form_id']);
            
            if ($model->achs_id == null) {
                $sp = new StoredProc();
                $sp->ProcedureName = 'INSERT_BuhActionHistory';
                $sp->ParametersRefresh();
                $sp->Parameters[0]['Value'] = $model->form_id;
                $sp->Parameters[1]['Value'] = $model->objc_id;
                $sp->Parameters[2]['Value'] = Yii::app()->user->Employee_id;
                $sp->CheckParam = true;
                $sp->Execute();
                echo '1';
            }
        }
    }
    
    public function actionCancelAccept() 
    {
        if (isset($_POST['form_id'])) {
            $model = new ScheduleClients();
            $model->getModelPk($_POST['form_id']);
            
            if ($model->achs_id !== null) {
                $sp = new StoredProc();
                $sp->ProcedureName = 'UNDO_WHAction';
                $sp->ParametersRefresh();
                $sp->Parameters[0]['Value'] = $model->achs_id;
                $sp->Parameters[1]['Value'] = Yii::app()->user->Employee_id;
                $sp->CheckParam = true;
                $sp->Execute();
                echo '1';
            }
        }
    }
}

