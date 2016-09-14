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
                }
            }
            
            $this->title = 'Перевод мастеров';
            $this->render('index',array(
                'model' => $model
            ));
            
	}


	public function actionCount() {
            if (isset($_POST['id'])) {
                $id = $_POST['id'];
                
		$model = new ReplaceMaster();
		$data_count = $model->getMasterCount($id);
                
//                print_r($data_count);
//                print_r($data_count[0]['object']);

                echo json_encode($data_count);
                
//                echo json_encode($data_count[0]['contract']);
//                echo json_encode(array('status'=>'ok','data'=>$data_count));
                return;
            }
	}
}
