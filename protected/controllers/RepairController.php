<?php

class RepairController extends Controller {
	
    public $layout='//layouts/column2';
    public $defaultAction  = 'index';
    public $title = '';
    public $gridFilters;

    public function filters()
    {
        return array(
            'accessControl', 
            'postOnly + delete', 
        );
    }

    public function accessRules()
    {
        return array(
            array('allow', 
                    'actions'=>array('Index', 'View'),
                    'roles'=>array('ViewRepairs'),
            ),
            array('allow', 
                    'actions'=>array('Create'),
                    'roles'=>array('CreateRepairs'),
            ),
            array('allow', 
                    'actions'=>array('Update'),
                    'roles'=>array('UpdateRepairs'),
            ),
            array('deny',  // deny all users
                'users'=>array('*'),
            ),
        );
    }

    public function actionIndex(){
        $this->title = 'Ремонт - реестр оборудвания';
        $this->gridFilters = '_filters';
        $this->render('index');
    }
    
    
}