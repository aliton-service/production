<?php

class WHDocumentsController extends Controller
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
                    'actions'=>array('index', 'View', 'GetWhNotes', 'GetModel'),
                    'roles'=>array('WHDocumentsView'),
            ),
            array('allow', 
                    'actions'=>array('create'),
                    'roles'=>array('CreateWHDcouments'),
            ),
            array('allow', 
                    'actions'=>array('Update', 'AddNote'),
                    'roles'=>array('UpdateWHDocuments'),
            ),
            array('allow', 
                    'actions'=>array('delete'),
                    'roles'=>array('DeleteWHDcouments'),
            ),
            array('deny',  // deny all users
                    'users'=>array('*'),
            ),
        );
    }
    
    public function actionGetModel()
    {
        $model = array();
        if (isset($_POST['Dctp_id'])) {
            if (isset($_POST['Docm_id'])) {
                $model = new WHDocuments();
                $model->getModelPk($_POST['Docm_id']);
            }
        }
        
        echo json_encode($model);
    }

    public function actionCreate()
    {
        $model = new WHDcouments();
        $ObjectResult = array(
                'result' => 0,
                'id' => 0,
                'html' => '',
            );
        if (isset($_POST['WHDcouments'])) {
            $model->attributes = $_POST['WHDcouments'];
            if ($model->validate()) {
                $Res = $model->Insert();
                $ObjectResult['result'] = 1;
                $ObjectResult['id'] = $Res['Section_id'];
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
        if (isset($_POST['Dctp_id'])) {
            switch ($_POST['Dctp_id']) {
                case 1: $model = new WHDocumentsDoc1(); break;
                case 2: $model = new WHDocumentsDoc2(); break;
                case 3: $model = new WHDocumentsDoc3(); break;
                case 4: $model = new WHDocumentsDoc4(); break;
                case 7: $model = new WHDocumentsDoc7(); break;
                case 8: $model = new WHDocumentsDoc8(); break;
                case 9: $model = new WHDocumentsDoc9(); break;
                default: $model = new WHDocuments(); break;
            }
        }
        
        $ObjectResult = array(
                'result' => 0,
                'id' => 0,
                'html' => '',
            );
        
        if (isset($_POST['Docm_id']))
            $model->getModelPk($_POST['Docm_id']);

        if (isset($_POST['WHDocuments'])) {
            $model->getModelPk($_POST['WHDocuments']['docm_id']);
            $model->attributes = $_POST['WHDocuments'];
            if ($model->validate()) {
                $modelUpd = new WHDocuments();
                $modelUpd->attributes = $model->attributes;
                $modelUpd->Update();
                $ObjectResult['result'] = 1;
                $ObjectResult['id'] = $modelUpd->docm_id;
                echo json_encode($ObjectResult);
                return;
            }
        }

        switch ($model->dctp_id) {
            case 1:
                $ObjectResult['html'] = $this->renderPartial('_formDoc1', array(
                    'model' => $model,
                ), true);
            break;
            default:
                $ObjectResult['html'] = $this->renderPartial('_form', array(
                    'model' => $model,
                ), true);
            break;
        };
        
        echo json_encode($ObjectResult);
    }
    
    public function actionAddNote() {
        $ObjectResult = array(
                'result' => 0,
                'id' => 0,
                'html' => '',
            );
        
        if (isset($_POST['Note'])) {
            $sp = new StoredProc();
            $sp->ProcedureName = 'INSERT_WHNot';
            $sp->ParametersRefresh();
            $sp->Parameters[0]['Value'] = $_POST['Note']['docm_id'];
            $sp->Parameters[1]['Value'] = $_POST['Note']['note'];
            $sp->Parameters[2]['Value'] = Yii::app()->user->Employee_id;
            $sp->CheckParam = true;
            $sp->Execute();
            
            $ObjectResult['result'] = 1;
            $ObjectResult['id'] = $_POST['Note']['docm_id'];
            echo json_encode($ObjectResult);
            return;
        }
        echo json_encode($ObjectResult);
    }

    public function actionDelete()
    {
        $ObjectResult = array(
                'result' => 0,
                'id' => 0,
                'html' => '',
            );
        
        if (isset($_POST['Section_id'])) {
            $model = new WHDcouments();
            $model->getModelPk($_POST['Section_id']);
            if ($model->validate()) {
                $model->delete();
                $ObjectResult['result'] = 1;
                $ObjectResult['id'] = $model->Section_id;
                echo json_encode($ObjectResult);
                return;
            }
        }
        echo json_encode($ObjectResult);
    }

    public function actionIndex()
    {
        $this->title = 'Склад - реестр документов';
        $this->render('index');
    }
    
    public function actionView() {
        $this->title = 'Склад - просмотр документа';
        $Docm_id = 0;
        if (isset($_POST['Docm_id']))
            $Docm_id = $_POST['Docm_id'];
        if (isset($_GET['Docm_id']))
            $Docm_id = $_GET['Docm_id'];
        
        if ($Docm_id != 0) {
            $model = new WHDocuments();
            $model->getModelPk($Docm_id);
            
            switch ($model->dctp_id) {
                case 1:
                    $this->title = 'Накладная на приход №' . $model->number;
                    $this->setPageTitle('Накладная на приход №' . $model->number);
                    break;
                case 2:
                    $this->title = 'Накладная на возврат №' . $model->number;
                    $this->setPageTitle('Накладная на возврат №' . $model->number);
                    break;
                case 3:
                    $this->title = 'Накладная на возврат поставщику №' . $model->number;
                    $this->setPageTitle('Накладная на возврат поставщику №' . $model->number);
                    break;
                case 4:
                    $this->title = 'Требование на выдачу №' . $model->number;
                    $this->setPageTitle('Требование на выдачу №' . $model->number);
                    break;
                case 7:
                    $this->title = 'Перемещение из ПРЦ на СКЛАД №' . $model->number;
                    $this->setPageTitle('Перемещение из ПРЦ на СКЛАД №' . $model->number);
                    break;
                case 8:
                    $this->title = 'Перемещение с склада на склад №' . $model->number;
                    $this->setPageTitle('Перемещение с склада на склад №' . $model->number);
                    break;
                case 9:
                    $this->title = 'Накладная на возврат мастеру №' . $model->number;
                    $this->setPageTitle('Накладная на возврат мастеру №' . $model->number);
                    break;
            }
        }
        
        $this->render('view', array(
            'model' => $model,
        ));
    }
    
    public function actionGetWhNotes() {
        $Result = array(
            'result' => 0,
            'text' => '',
        );
        
        if (isset($_POST['Docm_id'])) {
            $Query = new SQLQuery();
            $Query->setSelect('Select dbo.get_wh_notes(' . $_POST['Docm_id'] . ') notes');
            $Res = $Query->QueryRow();
            $Result['result'] = 1;
            $Result['text'] = $Res['notes'];
        }
        echo json_encode($Result);
    }
}





