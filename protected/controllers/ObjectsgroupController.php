<?php

class ObjectsgroupController extends Controller
{
    public $layout='//layouts/column2';
    public $title = '';
    
    public function actionIndex($ObjectGr_id)
    {
        $model = new ObjectsGroup();
        $model->getModelPk($ObjectGr_id);
        
        $this->title = 'Карточка объекта: ' . $model->Address;
        
        $this->render('index', array(
            'model' => $model,
        ));
    }
    
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
                    'actions'=>array('AjaxGeneral'),
                    'roles'=>array('ViewObjectsGroup'),
                ),
            
            array('allow',
                    'actions'=>array('index', 'Hello', 'GetModel'),
                    'roles'=>array('ViewObjectsGroup'),
                ),
            
            array('allow',
                    'actions'=>array('Create'),
                    'roles'=>array('CreateObjectsGroup'),
                ),
            array('allow',
                    'actions'=>array('EditForm', 'Update'),
                    'roles'=>array('UpdateObjectsGroup'),
                ),
            array('allow',
                    'actions'=>array('Delete'),
                    'roles'=>array('DeleteObjectsGroup'),
                ),
            array('allow',
                    'actions'=>array('save'),
                    'roles'=>array('UpdateObjectsGroup'),
                ),

            array('deny',  // deny all users
			'users'=>array('*'),
                ),
        );
    }
    
    public function actionCreate()
    {
        $model = new ObjectsGroup();
        $ObjectResult = array(
                'result' => 0,
                'id' => 0,
                'html' => '',
            );
        
        $model->setScenario('Insert');
                
        if (isset($_POST['ObjectsGroup'])) {
            $model->attributes = $_POST['ObjectsGroup'];
            if ($model->validate()) {
                $ObjectsAddress = new ObjectsAddress();
                $ObjectsAddress->attributes = $_POST['ObjectsGroup'];
                $ResAddress = $ObjectsAddress->Insert();
                
                if ((int)$ResAddress['Address_id'] > 0) {
                    $model->Address_id = $ResAddress['Address_id'];
                    $Res = $model->Insert();
                    $ObjectResult = array(
                        'result' => 1,
                        'id' => $Res['ObjectGr_id'],
                        'html' => '',
                    );
                    echo json_encode($ObjectResult);
                    return;
                }
            }
        }
        
        
        $ObjectResult['html'] = $this->renderPartial('_general', array(
            'model' => $model,
        ), true);
        echo json_encode($ObjectResult);
    }
    
    public function actionUpdate()
    {
        $model = new ObjectsGroup();
        $ObjectResult = array(
                'result' => 0,
                'id' => 0,
                'html' => '',
            );
        if (isset($_POST['ObjectGr_id']))
            $model->getModelPk($_POST['ObjectGr_id']);
        
        $model->setScenario('Update');
        
        if (isset($_POST['ObjectsGroup'])) {
            $model->getModelPk($_POST['ObjectsGroup']['ObjectGr_id']);
            $model->attributes = $_POST['ObjectsGroup'];
            if ($model->validate()) {
                $model->Update();
                $ObjectResult['result'] = 1;
                $ObjectResult['id'] = $model->ObjectGr_id;
                echo json_encode($ObjectResult);
                return;
            }
        }

        $ObjectResult['html'] = $this->renderPartial('general', array(
            'model' => $model,
        ), true);
        echo json_encode($ObjectResult);
    }
    
    public function actionGetModel()
    {
        $model = array();
        if (isset($_POST['ObjectGr_id'])) {
            $model = new ObjectsGroup();
            $model->getModelPk($_POST['ObjectGr_id']);
        }
       
        echo json_encode($model);
    }
    
    public function actionDelete() {
        $ObjectResult = array(
            'result' => 0,
            'id' => 0,
            'html' => '',
        );

        if (isset($_POST['ObjectGr_id'])) {
            $model = new ObjectsGroup();
            $model->getModelPk($_POST['ObjectGr_id']);

                $model->delete();
                $ObjectResult['result'] = 1;
                $ObjectResult['id'] = $model->ObjectGr_id;
                echo json_encode($ObjectResult);
                return;

        }
        echo json_encode($ObjectResult);
    }
            
}

