<?php

class ValuableInstructionsController extends Controller
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
                        'roles' => array('ViewValuableInstructions'),
                ),
                array('allow', 
                        'actions' => array('Create'),
                        'roles' => array('CreateValuableInstructions'),
                ),
                array('allow', 
                        'actions' => array('update'),
                        'roles' => array('UpdateValuableInstructions'),
                ),
                array('allow',
                        'actions' => array('delete'),
                        'roles' => array('DeleteValuableInstructions'),
                ),
                array('deny',
                        'users' => array('*'),
                ),
        );
    }

    public function actionCreate()
    {
        $model = new ValuableInstructions();
        
        if (isset($_POST['Instruction_id']))
            $model->Instruction_id = $_POST['Instruction_id'];
        
        $ObjectResult = array(
                'result' => 0,
                'id' => 0,
                'html' => '',
            );
        
        if (isset($_POST['Params'])) 
            $model->attributes = $_POST['Params'];
        
        if (isset($_POST['ValuableInstructions'])) {
            $model->attributes = $_POST['ValuableInstructions'];
            
            if ($model->validate()) {
                $Res = $model->Insert();
                $ObjectResult['result'] = 1;
                $ObjectResult['id'] = $Res['Instruction_id'];
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
        $model = new ValuableInstructions();
        $ObjectResult = array(
                'result' => 0,
                'id' => 0,
                'html' => '',
            );
        if (isset($_POST['Instruction_id']))
            $model->getModelPk($_POST['Instruction_id']);

        if (isset($_POST['ValuableInstructions'])) {
            $model->getModelPk($_POST['ValuableInstructions']['Instruction_id']);
            $model->attributes = $_POST['ValuableInstructions'];
            if ($model->validate()) {
                $model->Update();
                $ObjectResult['result'] = 1;
                $ObjectResult['id'] = $model->Instruction_id;
                echo json_encode($ObjectResult);
                return;
            }
        }
        
        $SalesDemand = new SalesDemand();
        if ($model->Demand_id != '')
            $SalesDemand->getModelPk ($model->Demand_id);

        $ObjectResult['html'] = $this->renderPartial('_form2', array(
            'model' => $model,
            'SalesDemand' => $SalesDemand,
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
        
        if (isset($_POST['Instruction_id'])) {
            $model = new ValuableInstructions();
            $model->getModelPk($_POST['Instruction_id']);
            if ($model->validate()) {
                $model->delete();
                $ObjectResult['result'] = 1;
                $ObjectResult['id'] = $model->Instruction_id;
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

