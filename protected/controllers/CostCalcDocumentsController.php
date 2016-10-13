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
}

