<?php

class InstructingsController extends Controller
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
					'ViewInstructings',

				),
			),
			array('allow',
				'actions'=>array('create'),
				'roles'=>array(

					'CreateInstructings',

				),
			),
			array('allow',
				'actions'=>array('update'),
				'roles'=>array(

					'UpdateInstructings',

				),
			),

			array('allow',
				'actions'=>array('delete'),
				'roles'=>array(

					'DeleteInstructings',

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
            $model = new Instructings();
            if (isset($_POST['Employee_id']))
                $model->Employee_id = $_POST['Employee_id'];

            if (isset($_POST['Instructings'])) {
                $model->attributes = $_POST['Instructings'];
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
            $model = new Instructings();
            if (isset($_POST['Instructing_id']))
                $model->getModelPk($_POST['Instructing_id']);

            if (isset($_POST['Instructings'])) {
                $model->getModelPk($_POST['Instructings']['Instructing_id']);
                $model->attributes = $_POST['Instructings'];
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
            $model = new Instructings();
            $model->getmodelPk($_POST['Instructing_id']);
            $model->delete();
            echo '1';
	}


	public function actionIndex()
	{
		if($this->isAjax()) {
			$this->renderPartial('index', array(), false, true);
		} else {
			$this->render('index');
		}


	}

	public function actionInfoGeneral($id=false) {
		$model = new Instructings();
		$this->renderPartial("general", array('model'=>$model), false, true);
	}


}

