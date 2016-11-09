<?php

class EventsController extends Controller
{

	public $layout = '//layouts/column2';
	public $title = '';
        public $gridFilters = null;
        public $filterDefaultValues = null;

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
                    'actions' => array('index', 'view', 'equipAnalog', 'clients', 'autoevents', 'ShowHide'),
                    'roles' => array('ViewEvents'),
                ),
                array('allow', // allow authenticated user to perform 'create' and 'update' actions
                    'actions' => array('create'),
                    'roles' => array('CreateEvents'),
                ),
                array('allow', // allow authenticated user to perform 'create' and 'update' actions
                    'actions' => array('update'),
                    'roles' => array('UpdateEvents',),
                ),
                array('allow', // allow admin user to perform 'admin' and 'delete' actions
                    'actions' => array('delete'),
                    'roles' => array('DeleteEvents'),
                ),
                array('deny',  // deny all users
                    'users' => array('*'),
                ),
            );
	}



	public function actionCreate()
	{
            $model = new Events;
            
            $ObjectResult = array(
                'result' => 0,
                'id' => 0,
                'html' => '',
            );
            
            if (isset($_POST['objectgr_id'])) {
                $model->objectgr_id = $_POST['objectgr_id'];
            }
            if (isset($_POST['Events'])) {
                $model->attributes = $_POST['Events'];
                $model->EmplCreate = Yii::app()->user->Employee_id;
                if ($model->validate()) {
                    $model->insert();
                    $ObjectResult['result'] = 1;
                    $ObjectResult['id'] = $model->evnt_id;
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
//            echo $_POST['evnt_id'];
            $model = new Events();
        
            $ObjectResult = array(
                'result' => 0,
                'id' => 0,
                'html' => '',
            );

            if (isset($_POST['evnt_id']))
                $model->getModelPk($_POST['evnt_id']);

            if (isset($_POST['Events'])) {
                $model->getModelPk($_POST['Events']['evnt_id']);
                $model->attributes = $_POST['Events'];
                $model->EmplChange = Yii::app()->user->Employee_id;
                if ($model->validate()) {
                    $model->Update();
                    $ObjectResult['result'] = 1;
                    $ObjectResult['id'] = $model->evnt_id;
                    echo json_encode($ObjectResult);
                    return;
                }
            }

            $ObjectResult['html'] = $this->renderPartial('_formEdit', array(
                'model' => $model,
            ), true);
            echo json_encode($ObjectResult);
	}

	public function actionDelete($id)
	{
            $model = new Events;
            $model->evnt_id = $id;
            $model->EmplDel = Yii::app()->user->Employee_id;
            $model->delete();
            if($this->isAjax()) {
                    die(json_encode(array('status'=>'ok','data'=>array('msg'=>'Запись о событии успешно удалена'))));
            }
            else {
                    $this->redirect('/?r=Events');
            }

	}

	public function actionIndex()
	{
            $this->title = 'Графики';
            $this->gridFilters = '_filters';
            $this->filterDefaultValues = array(
                'Master' => '',
            );
            
            $this->render('index');
	}

//	public function actionView($id) {
//            $this->title = 'Графики';
//            $model = new Events();
//            $model->getModelPk($id);
//            $this->render('view', array('model'=>$model));
//	}

	public function actionAutoEvents($objgr_id = false) {
            if($this->isAjax()) {
                $objgr_id || die('Не выбран объект');
                $this->renderPartial('autoevents',array('objgr_id'=>$objgr_id), false, true);
            } else {
                if(!$objgr_id) throw new CHttpException(404, 'Не выбран объект.');
                $this->render('autoevents',array('objgr_id'=>$objgr_id));
            }
	}

	public function actionShowHide() {
            
            if (isset($_POST['objectgr_id']) && isset($_POST['evtp_id'])) {

                $sp = new StoredProc();
                $sp->ProcedureName = 'HideOrShowObjectsGroup';
                $sp->ParametersRefresh();
                $sp->Parameters[0]['Value'] = $_POST['objectgr_id'];
                $sp->Parameters[1]['Value'] = $_POST['evtp_id'];
                $sp->CheckParam = true;
                $sp->Execute();
            }
            
//            $model->callProc('HideOrShowObjectsGroup');
//            die(json_encode(array('status'=>'ok')));
	}

	public function actionClients() {

            die(json_encode(Events::getClients(isset($_POST['filter']) ? $_POST['filter'] : false, isset($_POST['out_filter']) ? $_POST['out_filter'] : false)));
	}


}

