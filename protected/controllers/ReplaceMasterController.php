<?php
/**
 * Created by PhpStorm.
 * User: meg
 * Date: 19.01.2016
 * Time: 11:51
 */

class ReplaceMasterController extends Controller
{
	protected $title = '';
	protected $action_url = '';

	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions' => array('index', 'view', 'equipAnalog'),
				'roles' => array('ViewReplaceMaster'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions' => array('create'),
				'roles' => array('CreateReplaceMaster'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions' => array('update'),
				'roles' => array('UpdateReplaceMaster'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions' => array('delete'),
				'roles' => array('DeleteReplaceMaster'),
			),
			array('deny',  // deny all users
				'users' => array('*'),
			),
		);
	}

	public function actionIndex() {
            
            $model = new ReplaceMaster();
            
            if (isset($_POST['ReplaceMaster'])) {
                $model->attributes = $_POST['ReplaceMaster'];
                $model->EmplChange = Yii::app()->user->Employee_id;
                if ($model->validate()) {
                    $model->callProc($model->REPLACE_MASTER);
                    if ($this->isAjax()) {
                        die(json_encode(array('status' => 'ok', 'data' => array('msg' => 'Мастера успешно переведены'))));
                    } else {
                        $this->render('index',array('model'=>$model,'msg'=>'Мастера успешно переведены'));
                        return false;
                    }
                }
            } else {
                $this->title = 'Контроль контактов';
                $this->render('index',array(
                    'model' => $model
                ));
            }
	}


	public function actionCount($id) {
		$model = new ReplaceMaster();
		$data_count = $model->getMasterCount($id);
		die(json_encode(array('status'=>'ok','data'=>$data_count)));
	}
}
