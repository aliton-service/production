<?php

class SalesDepClientsController extends Controller
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
                    'roles'=>array('ViewSalesDepClients'),
            ),
        );
    }

    public function actionIndex()
    {
        $this->title = 'Клиенты - реестр';
        $this->render('index');
    }
}
