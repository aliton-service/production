<?php

class EmployeesController extends Controller
{

    public $layout='//layouts/column2';
    public $title = '';


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
                'roles'=>array(
                    'ViewEmployees',

                ),
            ),
            array('allow', 
                'actions'=>array('create'),
                'roles'=>array(

                    'CreateEmployees',

                ),
            ),
            array('allow', 
                'actions'=>array('update'),
                'roles'=>array(

                    'UpdateEmployees',

                ),
            ),
   
            array('allow', 
                'actions'=>array('delete'),
                'roles'=>array(

                    'DeleteEmployees',

                ),

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
        $model = new Employees;

        if (isset($_POST['Employees'])) {
            $model->attributes = $_POST['Employees'];
            $model->EmplCreate = Yii::app()->user->Employee_id;
            if ($model->validate()) {
                $model->insert();
                if ($this->isAjax()) {
                    die(json_encode(array('status' => 'ok', 'data' => array('msg' => 'Запись о сотруднике успешно создана'))));
                } else {
                    $this->redirect('/?r=Employees');
                }
            }
        }
        if ($this->isAjax()) {
            $this->renderPartial('create', array('model' => $model), false, true);
        } else {
            $this->render('create', array('model' => $model));
        }

    }

    public function actionUpdate($id)
    {
        $model=new Employees;
        if ($id == null)
            throw new CHttpException(404, 'Не выбран сотрудник.');


//                $model=$this->loadModel($id);
//
//
//                if (!Yii::app()->LockManager->LockRecord('Employees', $model->tableSchema->primaryKey, $id))
//                    throw new CHttpException(404, 'Запись заблокирована другим пользователем');

        if($id && (int)$id > 0 && isset($_POST['Employees'])) {
            $model->attributes = $_POST['Employees'];
            $model->Employee_id = (int)$id;
            $model->EmplChange = Yii::app()->user->Employee_id;
            if ($model->validate()) {
                $model->update();
                if ($this->isAjax()) {
                    die(json_encode(array('status' => 'ok', 'data' => array('msg' => 'Запись о сотруднике успешно изменена'))));
                } else {
                    $this->redirect('/?r=Employees');
                }
            }
        } else {
            $model->getModelPk($id);
        }
        if($this->isAjax()) {
            $this->renderPartial('update', array('model'=>$model), false, true);
        } else {
            $this->render('update', array('model'=>$model));
        }
        
    }

  
    public function actionDelete($id)
    {
        $model=new Employees;

        $model->Employee_id = $id;
        $model->EmplDel = Yii::app()->user->Employee_id;
        $model->delete();
        if($this->isAjax()) {
            die(json_encode(array('status'=>'ok','data'=>array('msg'=>'Запись о группе оборудований успешно удалена'))));
        }
        else {
            $this->redirect('/?r=Employees');
        }

    }

  
    public function actionIndex()
    {
        $this->render('index');

    }

    public function actionInfoGeneral($id=false) {
        $model = new Employees();
        $this->renderPartial("general", array('model'=>$model), false, true);
    }



//    public function actionIndex(){
//        $this->renderPartial("index", null, false, true);
//    }
}

