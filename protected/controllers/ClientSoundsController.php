<?php

class ClientSoundsController extends Controller
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
                    'roles'=>array('ViewClientSounds'),
            ),
            array('allow', 
                    'actions'=>array('create'),
                    'roles'=>array('CreateClientSounds'),
            ),
            array('allow', 
                    'actions'=>array('update'),
                    'roles'=>array('UpdateClientSounds'),
            ),
            array('allow', 
                    'actions'=>array('delete'),
                    'roles'=>array('DeleteClientSounds'),
            ),
            array('deny',  // deny all users
                    'users'=>array('*'),
            ),
        );
    }

    public function actionCreate()
    {
        $model = new ClientSounds();
        $ObjectResult = array(
                'result' => 0,
                'id' => 0,
                'html' => '',
            );
        if (isset($_POST['ClientSounds'])) {
            $OutFile = $_POST['ClientSounds']['Patch'] . "\\" . $_POST['ClientSounds']['Name'];
            $InFile = "\\\\ESRVWEB00\\Sounds\\" . $_POST['ClientSounds']['Name'];
            if (is_file($OutFile)) {
                copy($OutFile, $InFile);
            }
            
            $model->Form_id = $_POST['ClientSounds']['Form_id'];
            $model->SoundDate = date ("d.m.Y H:i", filemtime($OutFile));
            $model->SoundName = $_POST['ClientSounds']['Name'];
//            $model->SoundPatch ;
//            $model->Empl_id;
//            $model->EmplCreate;
            
    
            if ($model->validate()) {
                $Res = $model->Insert();
                $ObjectResult['result'] = 1;
                $ObjectResult['id'] = $Res['Sound_id'];
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
        $model = new ClientSounds();
        $ObjectResult = array(
                'result' => 0,
                'id' => 0,
                'html' => '',
            );
        if (isset($_POST['Sound_id']))
            $model->getModelPk($_POST['Sound_id']);

        if (isset($_POST['ClientSounds'])) {
            $model->getModelPk($_POST['ClientSounds']['Sound_id']);
            $model->attributes = $_POST['ClientSounds'];
            if ($model->validate()) {
                $model->Update();
                $ObjectResult['result'] = 1;
                $ObjectResult['id'] = $model->Sound_id;
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
        
        if (isset($_POST['Sound_id'])) {
            $model = new ClientSounds();
            $model->getModelPk($_POST['Sound_id']);
            if ($model->validate()) {
                $model->delete();
                $ObjectResult['result'] = 1;
                $ObjectResult['id'] = $model->Sound_id;
                echo json_encode($ObjectResult);
                return;
            }
        }
        echo json_encode($ObjectResult);
    }

    public function actionIndex()
    {
        $this->title = 'Просмотр подразделений';
        $this->render('index');
    }
}





