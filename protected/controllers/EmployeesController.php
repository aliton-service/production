<?php

class EmployeesController extends Controller
{

    public $layout='//layouts/column2';
    public $title = '';
    public $gridFilters = null;
    public $filterDefaultValues = null;


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
                'actions'=>array('index','view','infoGeneral'),
                'roles'=>array('ViewEmployees'),
            ),
            array('allow', 
                'actions'=>array('create'),
                'roles'=>array('CreateEmployees'),
            ),
            array('allow', 
                'actions'=>array('update'),
                'roles'=>array('UpdateEmployees'),
            ),
   
            array('allow', 
                'actions'=>array('delete'),
                'roles'=>array('DeleteEmployees'),

            ),
            array('deny',  
                'users'=>array('*'),
            ),
        );
    }

    public function actionView($id)
    {
        $this->render('view',array(
            'model'=>$this->loadModel($id),
        ));
    }

    public function actionCreate()
    {
        $model = new Employees();
        
        if (isset($_POST['Employees'])) {
            $model->attributes = $_POST['Employees'];
            if ($model->validate()) {
                $model->Insert();
                echo '1';
                return;
            }
        }
        
        $this->renderPartial('_form', array(
            'model' => $model,
        ));
    }

    public function actionUpdate()
    {
        $model = new Employees();
        if (isset($_POST['Employee_id']))
            $model->getModelPk($_POST['Employee_id']);

        if (isset($_POST['Employees'])) {
            $model->getModelPk($_POST['Employees']['Employee_id']);
            $model->attributes = $_POST['Employees'];
            if ($model->validate()) {
                $model->Update();
                echo '1';
                return;
            }
        }

        $this->renderPartial('_form', array(
            'model' => $model,
        ));
        
    }

  
    public function actionDelete()
    {
        if (isset($_POST['Employee_id'])) {
            $model = new Employees();
            $model->getModelPk($_POST['Employee_id']);
            $model->Delete();
        }
        else
            throw new Exception('Не найден ID записи.');
    
    }

  
    public function actionIndex()
    {
        $this->title = 'Сотрудники';
        $this->gridFilters = '_filters';
        $this->render('index');
    }
}

