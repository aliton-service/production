<?php

class RepairWorkingsController extends Controller
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
                    'actions' => array('Index'),
                    'users' => array('*'),
            ),
            array('deny',  // deny all users
                    'users' => array('*'),
            ),
        );
    }

    public function actionIndex($Repr_id)
    {
        if ($this->isAjax()) 
                $this->renderPartial('index', array(
                    'repr_id' => $Repr_id
                    ), false, true);
        else
            $this->render('index', array(
                    'Repr_id' => $Repr_id
                )
            );
        
    }
}



