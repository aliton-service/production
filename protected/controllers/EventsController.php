<?php

class EventsController extends Controller
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



	public function actionCreate($objgr_id)
	{
            $model = new Events;

            if (isset($_POST['Events'])) {
                $model->attributes = $_POST['Events'];
                $model->EmplCreate = Yii::app()->user->Employee_id;
                $model->objectgr_id = $objgr_id;
                if ($model->validate()) {
                    $model->insert();
                    if ($this->isAjax()) {
                        die(json_encode(array('status' => 'ok', 'data' => array('msg' => 'Запись о событии успешно создана'))));
                    } else {
                        $this->redirect('/?r=Events');
                    }
                }
            }
//		if ($this->isAjax()) {
//			$this->renderPartial('create', array('model' => $model), false, true);
//		} else {
//			$this->render('create', array('model' => $model));
//		}


	}

	public function actionUpdate($id)
	{
            $model = new Events;
            if ($id == null)
                throw new CHttpException(404, 'Не выбран сотрудник.');

//		if (!Yii::app()->LockManager->LockRecord('Events', $model->tableSchema->primaryKey, $id))
//			throw new CHttpException(404, 'Запись заблокирована другим пользователем');

            if($id && (int)$id > 0 && isset($_POST['Events'])) {
                $model->getModelPk($id);
                $model->attributes = $_POST['Events'];
                $model->evnt_id = (int)$id;
                $model->EmplChange = Yii::app()->user->Employee_id;
                if ($model->validate()) {
                    $model->update();
                    if ($this->isAjax()) {
                        die(json_encode(array('status' => 'ok', 'data' => array('msg' => 'Запись о событии успешно изменена'))));
                    } else {

                        $this->redirect('/?r=Events');
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
            $model = new Events();
//            $model->getModelPk($id);
            $this->render('index', array(
                'model'=>$model
            ));
            
//            $systype = new SystemTypes();
//            $event_types = new EventTypes();
//            $this->render('index', array('systypes' => $systype->find(array()), 'event_types'=>$event_types->find(array())));
	}

	public function actionView($id) {
            $model = new Events();
            $model->getModelPk($id);
            $this->render('view', array('model'=>$model));
	}

	public function actionAutoEvents($objgr_id = false) {
            if($this->isAjax()) {
                $objgr_id || die('Не выбран объект');
                $this->renderPartial('autoevents',array('objgr_id'=>$objgr_id), false, true);
            } else {
                if(!$objgr_id) throw new CHttpException(404, 'Не выбран объект.');
                $this->render('autoevents',array('objgr_id'=>$objgr_id));
            }
	}

	public function actionShowHide($evtp_id, $objgr_id) {
            $model = new Events();
            $model->evtp_id = (int)$evtp_id;
            $model->objectgr_id = (int)$objgr_id;
            $model->callProc('HideOrShowObjectsGroup');
            die(json_encode(array('status'=>'ok')));
	}

	public function actionClients() {

            die(json_encode(Events::getClients(isset($_POST['filter']) ? $_POST['filter'] : false, isset($_POST['out_filter']) ? $_POST['out_filter'] : false)));
	}


}

