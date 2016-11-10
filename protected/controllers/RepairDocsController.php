<?php

class RepairDocsController extends Controller
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
                        'actions' => array('index'),
                        'roles' => array('ViewRepairDocs'),
                ),
                array('allow', 
                        'actions' => array('Create'),
                        'roles' => array('CreateRepairDocs'),
                ),
                array('allow', 
                        'actions' => array('update'),
                        'roles' => array('UpdateRepairDocs'),
                ),
                array('allow',
                        'actions' => array('delete'),
                        'roles' => array('DeleteRepairDocs'),
                ),
                array('deny',
                        'users' => array('*'),
                ),
        );
    }

    public function actionCreate()
    {
        $model = new RepairDocs();
        
        if (isset($_POST['Repr_id']))
            $model->repr_id = $_POST['Repr_id'];
        
        if (isset($_POST['Dctp_id']))
            $model->dctp_id = $_POST['Dctp_id'];
        
        if (isset($_POST['Params']))
            $model->attributes = $_POST['Params'];
        
        $ObjectResult = array(
                'result' => 0,
                'id' => 0,
                'html' => '',
            );
        if (isset($_POST['RepairDocs'])) {
            $model->attributes = $_POST['RepairDocs'];
            
            if ($model->validate()) {
                $Res = $model->Insert();
                $ObjectResult['result'] = 1;
                $ObjectResult['id'] = $Res['rpdoc_id'];
                echo json_encode($ObjectResult);
                return;
            } 
        }
        
        $ObjectResult['html'] = $this->renderPartial('_form' . $model->dctp_id, array(
            'model' => $model,
        ), true);
        echo json_encode($ObjectResult);
    }

    public function actionUpdate()
    {
        $model = new RepairDocs();
        $ObjectResult = array(
                'result' => 0,
                'id' => 0,
                'html' => '',
            );
        if (isset($_POST['rpdoc_id']))
            $model->getModelPk($_POST['rpdoc_id']);

        if (isset($_POST['RepairDocs'])) {
            $model->getModelPk($_POST['RepairDocs']['rpdoc_id']);
            $model->attributes = $_POST['RepairDocs'];
            if ($model->validate()) {
                $model->Update();
                $ObjectResult['result'] = 1;
                $ObjectResult['id'] = $model->rpdoc_id;
                echo json_encode($ObjectResult);
                return;
            }
        }

        $ObjectResult['html'] = $this->renderPartial('_form' . $model->dctp_id, array(
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
        
        if (isset($_POST['rpdoc_id'])) {
            $model = new RepairDocs();
            $model->getModelPk($_POST['rpdoc_id']);
            if ($model->validate()) {
                $model->delete();
                $ObjectResult['result'] = 1;
                $ObjectResult['id'] = $model->rpdoc_id;
                echo json_encode($ObjectResult);
                return;
            }
            else {
                $ObjectResult['result'] = 2;
            }
        }
        echo json_encode($ObjectResult);
    }

    public function actionIndex($repr_id)
    {
            if($this->isAjax()) {
                    $this->renderPartial('index', array('repr_id' => $repr_id), false, true);
            } else {
                    $this->render('index', array('repr_id' => $repr_id));
            }
    }
}

