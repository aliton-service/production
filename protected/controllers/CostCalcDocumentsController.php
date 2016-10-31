<?php

class CostCalcDocumentsController extends Controller
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
                'roles'=>array('ViewCostCalcDocuments'),
            ),
            array('allow', 
                    'actions'=>array('delete'),
                    'roles'=>array('DeleteCostCalcDocuments'),
            ),
            array('deny',  // deny all users
                'users'=>array('*'),
            ),
        );
    }

    public function actionIndex() 
    {
        if (isset($_POST['calc_id'])) 
        {
            $calc_id = $_POST['calc_id'];
            
            $query = new SQLQuery(); 
            $query->SetSelect("exec GET_Documents_of_Calc " . $calc_id); 
            $Res = $query->QueryAll();
            
            $Data[] = array(
                'Rows' => $Res
            );
            echo json_encode($Data);
        }
    }

    public function actionDelete() 
    {
        if (isset($_POST['docm_id']) && isset($_POST['DocType_id']) && $_POST['DocType_id'] === '6') {
            
            $sp = new StoredProc();
            $sp->ProcedureName = 'DELETE_WHDocuments';
            $sp->ParametersRefresh();
            $sp->Parameters[0]['Value'] = $_POST['docm_id'];
            $sp->Parameters[1]['Value'] = Yii::app()->user->Employee_id;
            $sp->CheckParam = true;
            $sp->Execute();
            echo '1';
        }
    }
}

