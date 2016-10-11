<?php

class DocmAchsDetailsController extends Controller
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
                    'roles'=>array('ViewDocmAchsDetails'),
            ),
            array('allow', 
                    'actions'=>array('create'),
                    'roles'=>array('CreateDocmAchsDetails'),
            ),
            array('allow', 
                    'actions'=>array('update'),
                    'roles'=>array('UpdateDocmAchsDetails'),
            ),
            array('allow', 
                    'actions'=>array('delete'),
                    'roles'=>array('DeleteDocmAchsDetails'),
            ),
            array('deny',  // deny all users
                    'users'=>array('*'),
            ),
        );
    }

    public function actionCreate()
    {
        $model = new DocmAchsDetails();
        
        if (isset($_POST['Docm_id']))
            $model->docm_id = $_POST['Docm_id'];
        
        $ObjectResult = array(
                'result' => 0,
                'id' => 0,
                'html' => '',
            );
        if (isset($_POST['DocmAchsDetails'])) {
            $model->attributes = $_POST['DocmAchsDetails'];
            if ($model->fact_quant == '0.00')
                $model->fact_quant = null;
            
            if ($model->validate()) {
                $Res = $model->Insert();
                $ObjectResult['result'] = 1;
                $ObjectResult['id'] = $Res['dadt_id'];
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
        $model = new DocmAchsDetails();
        $ObjectResult = array(
                'result' => 0,
                'id' => 0,
                'html' => '',
            );
        if (isset($_POST['Dadt_id']))
            $model->getModelPk($_POST['Dadt_id']);

        if (isset($_POST['DocmAchsDetails'])) {
            $model->getModelPk($_POST['DocmAchsDetails']['dadt_id']);
            $model->attributes = $_POST['DocmAchsDetails'];
            if ($model->validate()) {
                $model->Update();
                $ObjectResult['result'] = 1;
                $ObjectResult['id'] = $model->dadt_id;
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
        
        if (isset($_POST['Dadt_id'])) {
            $model = new DocmAchsDetails();
            $model->getModelPk($_POST['Dadt_id']);
            if ($model->validate()) {
                $model->delete();
                $ObjectResult['result'] = 1;
                $ObjectResult['id'] = $model->dadt_id;
                echo json_encode($ObjectResult);
                return;
            }
            else {
                $ObjectResult['result'] = 2;
            }
        }
        echo json_encode($ObjectResult);
    }

    public function actionIndex()
    {
        $this->title = 'Просмотр подразделений';
        $this->render('index');
    }
    
    public function actionHistory() {
        if (isset($_POST['Dadt_id'])) {
            
        }
    }
}







