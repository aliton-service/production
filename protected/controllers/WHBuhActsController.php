<?php

class WHBuhActsController extends Controller
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
                'roles'=>array('ViewWHBuhActs'),
            ),
            array('allow', 
                'actions'=>array('create'),
                'roles'=>array('CreateWHBuhActs'),
            ),
            array('allow', 
                'actions'=>array('update'),
                'roles'=>array('UpdateWHBuhActs'),
            ),
            array('allow', 
                'actions'=>array('delete'),
                'roles'=>array('DeleteWHBuhActs'),
            ),
            array('allow',
                'actions'=>array('accept'),
                'roles'=>array('AcceptWHBuhActs'),
            ),
            array('allow',
                'actions'=>array('cancelAccept'),
                'roles'=>array('CancelAcceptWHBuhActs'),
            ),
            array('deny',  // deny all users
                'users'=>array('*'),
            ),
        );
    }

    public function actionCreate()
    {
        $model = new WHBuhActs();
        
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
        
        if (isset($_POST['WHBuhActs'])) {
            $model->attributes = $_POST['WHBuhActs'];
            $model->EmplCreate = Yii::app()->user->Employee_id;
            if ($model->validate()) {
                $model->Insert();
                $ObjectResult['result'] = 1;
                $ObjectResult['id'] = $model->docm_id;
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
        $model = new WHBuhActs();
        
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
        
        if (isset($_POST['docm_id']))
            $model->getModelPk($_POST['docm_id']);

        if (isset($_POST['WHBuhActs'])) {
            $model->getModelPk($_POST['WHBuhActs']['docm_id']);
            $model->attributes = $_POST['WHBuhActs'];
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
        
        if (isset($_POST['docm_id'])) {
            $model = new WHBuhActs();
            $model->getModelPk($_POST['docm_id']);
            if ($model->validate()) {
                $model->Delete();
                $ObjectResult['result'] = 1;
                $ObjectResult['id'] = $model->docm_id;
                echo json_encode($ObjectResult);
                return;
            }
        }
        echo json_encode($ObjectResult);
    }

    public function actionIndex()
    {
        if (isset($_GET['docm_id'])) {
            $model = new WHBuhActs();

            $this->title = 'Бухгалтерский акт';

            $model->getModelPk($_GET['docm_id']);

            $this->render('index', array(
                'model' => $model,
            ));
        }
    }
    
    public function actionAccept() 
    {
        if (isset($_POST['docm_id'])) {
            $model = new WHBuhActs();
            $model->getModelPk($_POST['docm_id']);
            
            if ($model->achs_id == null) {
                $sp = new StoredProc();
                $sp->ProcedureName = 'INSERT_BuhActionHistory';
                $sp->ParametersRefresh();
                $sp->Parameters[0]['Value'] = $model->docm_id;
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
        if (isset($_POST['docm_id'])) {
            $model = new WHBuhActs();
            $model->getModelPk($_POST['docm_id']);
            
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

