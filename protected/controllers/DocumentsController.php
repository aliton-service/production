<?php
/**
 * Created by PhpStorm.
 * User: meg
 * Date: 19.01.2016
 * Time: 14:11
 */

class DocumentsController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout = '//layouts/column2';
	public $title = '';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions' => array('index', 'view', 'equipAnalog'),
				'roles' => array(
					'ViewDocuments',

				),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions' => array('create'),
				'roles' => array(

					'CreateDocuments',

				),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions' => array('update'),
				'roles' => array(

					'UpdateDocuments',

				),
			),

			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions' => array('delete'),
				'roles' => array(

					'DeleteDocuments',

				),

			),
			array('deny',  // deny all users
				'users' => array('*'),
			),
		);
	}


	public function actionView($id)
	{
		$this->render('view', array(
			'model' => $this->loadModel($id),
		));
	}


	public function actionCreate()
	{
		$model = new Documents;

		if (isset($_POST['Documents'])) {
			$model->attributes = $_POST['Documents'];
			$model->EmplCreate = Yii::app()->user->Employee_id;
			if ($model->validate()) {
				$model->insert();
				if ($this->isAjax()) {
					die(json_encode(array('status' => 'ok', 'data' => array('msg' => '������ � ������������ ������� �������'))));
				} else {
					$this->redirect('/?r=Documents');
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
		$model = new Documents;
		if ($id == null)
			throw new CHttpException(404, '�� ������ ���������.');

//		if (!Yii::app()->LockManager->LockRecord('Documents', $model->tableSchema->primaryKey, $id))
//			throw new CHttpException(404, '������ ������������� ������ �������������');

		if($id && (int)$id > 0 && isset($_POST['Documents'])) {
			$model->attributes = $_POST['Documents'];
			$model->ContrS_id = (int)$id;
			$model->EmplChange = Yii::app()->user->Employee_id;
			if ($model->validate()) {
				$model->update();
				if ($this->isAjax()) {
					die(json_encode(array('status' => 'ok', 'data' => array('msg' => '������ � ������������ ������� ��������'))));
				} else {

					$this->redirect('/?r=Documents');
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
		$model = new Documents;
		$model->ContrS_id = $id;
		$model->EmplDel = Yii::app()->user->Employee_id;
		$model->delete();
		if($this->isAjax()) {
			die(json_encode(array('status'=>'ok','data'=>array('msg'=>''))));
		}
		else {
			$this->redirect('/?r=Documents');
		}

	}


	public function actionIndex($ContrS_id = NULL)
	{
            if ($ContrS_id !== NULL)
            {
                $model = new Documents();
                $model->getModelPk($ContrS_id);
                $this->title = $model->DocType_Name .' № ' . $model->ContrS_id;

                $this->render('index', array(
                   'model' => $model
                ));

            }
	}




}

