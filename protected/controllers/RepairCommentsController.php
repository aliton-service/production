<?php

class RepairCommentsController extends Controller
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
            array('allow',  // allow all users to perform 'index' and 'view' actions
                    'actions' => array('index', 'view'),
                    'roles' => array(
                            'ViewRepairComments',

                    ),
            ),
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                    'actions' => array('create'),
                    'roles' => array(

                            'CreateRepairComments',

                    ),
            ),
            array('deny',  // deny all users
                    'users' => array('*'),
            ),
        );
    }



    public function actionCreate()
    {
            $model = new RepairComments;

            if (isset($_POST['RepairComments'])) {
                    $model->attributes = $_POST['RepairComments'];
                    $model->EmplCreate = Yii::app()->user->Employee_id;
                    if ($model->validate()) {
                            $model->insert();
                            if ($this->isAjax()) {
                                    die(json_encode(array('status' => 'ok', 'data' => array('msg' => '������ � ������� ������� �������'))));
                            } else {
                                    $this->redirect('/?r=RepairComments');
                            }
                    }
            }
    }

    public function actionIndex($Repr_id)
    {
            if($this->isAjax()) {
                    $this->renderPartial('index', array('Repr_id' => $Repr_id), false, true);
            } else {
                    $this->render('index', array('Repr_id' => $Repr_id));
            }
    }
}

