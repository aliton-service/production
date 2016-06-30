<?php

class ControlContactsController extends Controller
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
                    'actions'=>array('index'),
                    'roles'=>array('ViewControlContacts'),
            ),
            array('deny',  // deny all users
                    'users'=>array('*'),
            ),
        );
    }

    public function actionIndex()
    {
        $this->title = 'Контроль контактов';
        $this->render('index');
    }
}







