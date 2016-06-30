<?php

class WHDocumentsFindTrebController extends Controller
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
                'actions'=>array('index'),
                'roles'=>array('FindTreb'),
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
}

