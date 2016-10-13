<?php

class WHDocumentsFindController extends Controller
{
    public $layout='//layouts/column2';
    public $title = 'Поиск требований';
    
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
                'actions'=>array('FindTreb'),
                'roles'=>array('FindTreb'),
            ),
            array('allow',  
                'actions'=>array('FindWHDoc1'),
                'roles'=>array('FindWHDoc1'),
            ),
            
            array('deny',  // deny all users
                'users'=>array('*'),
            ),
        );
    }
    
    public function actionIndex($objc_id = null, $docm_id = null) {
        $this->render('index', array(
            'objc_id' => $objc_id,
            'docm_id' => $docm_id,
        ));
    }
    
    public function actionFindTreb() {
        
        $Object_id = 0;
        if ($_POST['Object_id']) {
            $Object_id = $_POST['Object_id'];
        }
        $Address = '';
        if ($_POST['Address']) {
            $Address = $_POST['Address'];
        }
        
        $ObjectResult = array(
            'result' => 0,
            'id' => 0,
            'html' => '',
        );
        
        $ObjectResult['html'] = $this->renderPartial('findtreb', array(
                'Object_id' => $Object_id,
                'Address' => $Address,
            ), true);
        
        echo json_encode($ObjectResult);
    }
    
    public function actionFindWHDoc1() {
        
        $Supplier_id = 0;
        if ($_POST['Supplier_id']) {
            $Supplier_id = $_POST['Supplier_id'];
        }
        
        $ObjectResult = array(
            'result' => 0,
            'id' => 0,
            'html' => '',
        );
        
        $ObjectResult['html'] = $this->renderPartial('finddoc1', array(
                'Supplier_id' => $Supplier_id,
            ), true);
        
        echo json_encode($ObjectResult);
    }
}

