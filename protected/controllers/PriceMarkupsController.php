<?php

class PriceMarkupsController extends Controller
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
                    'roles'=>array('ViewPriceMarkups'),
            ),
            array('allow', 
                    'actions'=>array('create'),
                    'roles'=>array('CreatePriceMarkups'),
            ),
            array('allow', 
                    'actions'=>array('update'),
                    'roles'=>array('UpdatePriceMarkups'),
            ),
            array('allow', 
                    'actions'=>array('delete'),
                    'roles'=>array('DeletePriceMarkups'),
            ),
            array('allow', 
                    'actions'=>array('copy'),
                    'roles'=>array('CopyPriceMarkups'),
            ),
            array('deny',  // deny all users
                    'users'=>array('*'),
            ),
        );
    }

    public function actionCreate()
    {
        $model = new PriceMarkups();
        $ObjectResult = array(
                'result' => 0,
                'id' => 0,
                'html' => '',
            );
        if (isset($_POST['PriceMarkups'])) {
            $model->attributes = $_POST['PriceMarkups'];
            $Res = $model->Insert();
            $ObjectResult['result'] = 1;
            $ObjectResult['id'] = $Res['mrkp_id'];
            echo json_encode($ObjectResult);
            return;
        }
        
        $ObjectResult['html'] = $this->renderPartial('_form', array(
            'model' => $model,
        ), true);
        echo json_encode($ObjectResult);
    }


    public function actionUpdate()
    {
        $model = new PriceMarkups();
        $ObjectResult = array(
                'result' => 0,
                'id' => 0,
                'html' => '',
            );
        if (isset($_POST['mrkp_id']))
            $model->getModelPk($_POST['mrkp_id']);

        if (isset($_POST['PriceMarkups'])) {
            $model->getModelPk($_POST['PriceMarkups']['mrkp_id']);
            $model->attributes = $_POST['PriceMarkups'];
            
            $model->Update();
            $ObjectResult['result'] = 1;
            $ObjectResult['id'] = $model->mrkp_id;
            echo json_encode($ObjectResult);
            return;
        }

        $ObjectResult['html'] = $this->renderPartial('_form', array(
            'model' => $model,
        ), true);
        echo json_encode($ObjectResult);
    }

    public function actionCopy()
    {
        $model = new PriceMarkups();
        $ObjectResult = array(
                'result' => 0,
                'id' => 0,
                'html' => '',
            );
        if (isset($_POST['mrkp_id']))
            $model->getModelPk($_POST['mrkp_id']);

        if (isset($_POST['PriceMarkups'])) {
            $model->getModelPk($_POST['PriceMarkups']['mrkp_id']);
            $model->attributes = $_POST['PriceMarkups'];
            $sp = new StoredProc();
            $sp->ProcedureName = 'COPY_PriceMarkups';
            $sp->ParametersRefresh();
            $sp->Parameters[0]['Value'] = $model->mrkp_id;
            $sp->Parameters[1]['Value'] = $model->date_start;
            $sp->Parameters[2]['Value'] = $model->date_end;
            $sp->CheckParam = true;
            $sp->Execute();
            
            $ObjectResult['result'] = 1;
            $ObjectResult['id'] = $model->mrkp_id;
            echo json_encode($ObjectResult);
            return;
        }

        $ObjectResult['html'] = $this->renderPartial('_form', array(
            'model' => $model,
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
        
        if (isset($_POST['mrkp_id'])) {
            $model = new PriceMarkups();
            $model->getModelPk($_POST['mrkp_id']);
            if ($model->validate()) {
                $model->delete();
                $ObjectResult['result'] = 1;
                $ObjectResult['id'] = $model->mrkp_id;
                echo json_encode($ObjectResult);
                return;
            }
        }
        echo json_encode($ObjectResult);
    }

    public function actionIndex()
    {
        $this->title = 'Наценки';
        
        $this->render('index');
    }
}