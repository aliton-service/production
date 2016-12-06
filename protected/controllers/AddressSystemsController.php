<?php

class AddressSystemsController extends Controller
{
    public $layout='//layouts/column2';
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
				'actions'=>array('index','view'),
				'roles'=>array('ViewAddressSystems'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create'),
				'roles'=>array('CreateAddressSystems'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('update'),
				'roles'=>array('UpdateAddressSystems'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('delete'),
				'roles'=>array('DeleteAddressSystems'),
                        ),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	public function actionCreate()
        {
            $model = new AddressSystems();
            $ObjectResult = array(
                    'result' => 0,
                    'id' => 0,
                    'html' => '',
                );
            if (isset($_POST['AddressSystems'])) {
                $model->attributes = $_POST['AddressSystems'];
                if ($model->validate()) {
                    $Res = $model->Insert();
                    $ObjectResult['result'] = 1;
                    $ObjectResult['id'] = $Res['AddressSystem_id'];
                    echo json_encode($ObjectResult);
                    return;
                } 
            }

            $ObjectResult['html'] = $this->renderPartial('_form', array(
                'model' => $model,
            ), true);
            echo json_encode($ObjectResult);
        }


        public function actionUpdate()
        {
            $model = new AddressSystems();
            $ObjectResult = array(
                    'result' => 0,
                    'id' => 0,
                    'html' => '',
                );
            if (isset($_POST['AddressSystem_id']))
                $model->getModelPk($_POST['AddressSystem_id']);

            if (isset($_POST['AddressSystems'])) {
                $model->getModelPk($_POST['AddressSystems']['AddressSystem_id']);
                $model->attributes = $_POST['AddressSystems'];
                if ($model->validate()) {
                    $model->Update();
                    $ObjectResult['result'] = 1;
                    $ObjectResult['id'] = $model->AddressSystem_id;
                    echo json_encode($ObjectResult);
                    return;
                }
            }

            $ObjectResult['html'] = $this->renderPartial('_form', array(
                'model' => $model,
            ), true);
            echo json_encode($ObjectResult);
        }

        public function actionDelete()
        {
            $ObjectResult = array(
                    'result' => 0,
                    'id' => 0,
                    'html' => '',
                );

            if (isset($_POST['AddressSystem_id'])) {
                $model = new AddressSystems();
                $model->getModelPk($_POST['AddressSystem_id']);
                if ($model->validate()) {
                    $model->delete();
                    $ObjectResult['result'] = 1;
                    $ObjectResult['id'] = $model->AddressSystem_id;
                    echo json_encode($ObjectResult);
                    return;
                }
            }
            echo json_encode($ObjectResult);
        }

        public function actionIndex()
        {
            $this->title = 'Просмотр подразделений';
            $this->render('index');
        }
}
