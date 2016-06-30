<?php
/**
 * Created by PhpStorm.
 * User: meg
 * Date: 22.01.2016
 * Time: 11:07
 */

class RepDebtReasonDetailsController extends Controller
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
				'actions' => array('index', 'view', 'equipAnalog', 'ExportXLS'),
				'roles' => array(
					'ViewRepDebtReasonDetails',
				),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions' => array('create'),
				'roles' => array(
					'CreateRepDebtReasonDetails',
				),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions' => array('update'),
				'roles' => array(
					'UpdateRepDebtReasonDetails',
				),
			),

			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions' => array('delete'),
				'roles' => array(
					'DeleteRepDebtReasonDetails',
				),

			),
			array('deny',  // deny all users
				'users' => array('*'),
			),
		);
	}


	public function actionIndex($id)
	{
		$this->render('index',array('id'=>$id));

	}

	public function actionExportXLS($id) {
		$model = new RepDebtReasonDetails($id);
		die(json_encode($model->getRdrDetails($id)));
	}

	protected function performAjaxValidation($model)
	{
		if (isset($_POST['ajax']) && $_POST['ajax'] === 'RepDebtReasonDetails-form') {
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}



}

