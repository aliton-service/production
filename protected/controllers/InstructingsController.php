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
		$model = new Instructings;

		if (isset($_POST['Instructings'])) {
			$model->attributes = $_POST['Instructings'];
			$model->EmplCreate = Yii::app()->user->Employee_id;
			if ($model->validate()) {
				$model->insert();
				if ($this->isAjax()) {
					die(json_encode(array('status' => 'ok', 'data' => array('msg' => 'Запись об инструктаже успешно создана'))));
				} else {
					$this->redirect('/?r=Instructings');
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
		$model=new Instructings;
		if ($id == null)
			throw new CHttpException(404, 'Не выбрана запись.');


//                $model=$this->loadModel($id);
//
//
//                if (!Yii::app()->LockManager->LockRecord('Instructings', $model->tableSchema->primaryKey, $id))
//                    throw new CHttpException(404, 'Запись заблокирована другим пользователем');

		if($id && (int)$id > 0 && isset($_POST['Instructings'])) {
			$model->attributes = $_POST['Instructings'];
			$model->Instructing_id = (int)$id;
			$model->EmplChange = Yii::app()->user->Employee_id;
			if ($model->validate()) {
				$model->update();
				if ($this->isAjax()) {
					die(json_encode(array('status' => 'ok', 'data' => array('msg' => 'Запись об инструктаже успешно изменена'))));
				} else {
					$this->redirect('/?r=Instructings');
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
		$model=new Instructings;

		$model->Instructing_id = $id;
		$model->EmplDel = Yii::app()->user->Employee_id;
		$model->delete();
		if($this->isAjax()) {
			die(json_encode(array('status'=>'ok','data'=>array('msg'=>'Запись об инструктаже успешно удалена'))));
		}
		else {
			$this->redirect('/?r=Instructings');
		}

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

