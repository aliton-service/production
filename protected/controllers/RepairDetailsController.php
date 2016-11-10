<?php

class RepairDetailsController extends Controller
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
                        'roles' => array('ViewRepairDetails'),
                ),
                array('allow', 
                        'actions' => array('Create'),
                        'roles' => array('CreateRepairDetails'),
                ),
                array('allow', 
                        'actions' => array('update'),
                        'roles' => array('UpdateRepairDetails'),
                ),
                array('allow',
                        'actions' => array('delete'),
                        'roles' => array('DeleteRepairDetails'),
                ),
                array('deny',
                        'users' => array('*'),
                ),
        );
    }

    public function actionCreate()
    {
        $model = new RepairDetails();
        
        if (isset($_POST['Repr_id']))
            $model->repr_id = $_POST['Repr_id'];
        
        $ObjectResult = array(
                'result' => 0,
                'id' => 0,
                'html' => '',
            );
        if (isset($_POST['RepairDetails'])) {
            $model->attributes = $_POST['RepairDetails'];
            if ($model->fact_quant == '0.00')
                $model->fact_quant = null;
            
            if ($model->validate()) {
                $Res = $model->Insert();
                $ObjectResult['result'] = 1;
                $ObjectResult['id'] = $Res['rpdt_id'];
                echo json_encode($ObjectResult);
                return;
            } 
        }
        
        $ObjectResult['html'] = $this->renderPartial('_form', array(
            'model' => $model,
        ), true);
        echo json_encode($ObjectResult);
    }

    public function actionUpdate()
    {
        $model = new RepairDetails();
        $ObjectResult = array(
                'result' => 0,
                'id' => 0,
                'html' => '',
            );
        if (isset($_POST['Rpdt_id']))
            $model->getModelPk($_POST['Rpdt_id']);

        if (isset($_POST['RepairDetails'])) {
            $model->getModelPk($_POST['RepairDetails']['rpdt_id']);
            $model->attributes = $_POST['RepairDetails'];
            if ($model->validate()) {
                $model->Update();
                $ObjectResult['result'] = 1;
                $ObjectResult['id'] = $model->rpdt_id;
                echo json_encode($ObjectResult);
                return;
            }
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
        
        if (isset($_POST['Rpdt_id'])) {
            $model = new RepairDetails();
            $model->getModelPk($_POST['Rpdt_id']);
            if ($model->validate()) {
                $model->delete();
                $ObjectResult['result'] = 1;
                $ObjectResult['id'] = $model->rpdt_id;
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

