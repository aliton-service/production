<?php

class DeliveryController extends Controller
{
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
                            'actions'=>array('index','view','repDelivery','repDeliveryReason','addition','process','equip','GetDeadline'),
                            'users'=>array('*'),
                    ),
                    array('allow', // allow authenticated user to perform 'create' and 'update' actions
                            'actions'=>array('create','update','take'),
                            'users'=>array('*'),
                    ),
                    array('allow', // allow admin user to perform 'admin' and 'delete' actions
                            'actions'=>array('admin','delete'),
                            'users'=>array('*'),
                    ),
                    array('deny',  // deny all users
                            'users'=>array('*'),
                    ),
            );
    }
	
    public function actionIndex()
    {
        $this->title = 'Заявки на доставку';
        $model = new DeliveryDemands();
        $this->render('index');
    }

	

	public function actionCreate() {
		$model = new Delivery;

		if(isset($_POST['Delivery']))
		{
			$model->attributes=$_POST['Delivery'];
			// $model->dldm_id = null;
			$model->user_sender = Yii::app()->user->Employee_id;
			$model->EmplCreate = Yii::app()->user->Employee_id;

			// if (!isset($_POST['Delivery']['prtp_id']) || $_POST['Delivery']['prtp_id']=='') {
			// 	$model->prtp_id = null;
			// }

			// if (!isset($_POST['Delivery']['prdoc_id']) || $_POST['Delivery']['prdoc_id']=='') {
			// 	$model->prdoc_id = null;
			// }

			// if (!isset($_POST['Delivery']['calc_id']) || $_POST['Delivery']['calc_id']=='') {
			// 	$model->calc_id = null;
			// }

			// if (!isset($_POST['Delivery']['dmnd_id']) || $_POST['Delivery']['dmnd_id']=='') {
			// 	$model->dmnd_id = null;
			// }

			// if (!isset($_POST['Delivery']['docm_id']) || $_POST['Delivery']['docm_id']=='') {
			// 	$model->docm_id = null;
			// }

			// if (!isset($_POST['Delivery']['repr_id']) || $_POST['Delivery']['repr_id']=='') {
			// 	$model->repr_id = null;
			// }
			
			//if($model->save())
			if($model->insert())
				$this->redirect(array('view','id'=>$model->dldm_id));
		}

		if (isset($_GET['Delivery'])) {
			$model->attributes=$_GET['Delivery'];
		}

		if($this->isAjax()) {
			$this->renderPartial('create',array('model'=>$model),false,true);
		}
		else {
			$this->render('create', array(
					'model'=>$model,
				)
			);
		}

	}

	public function actionUpdate($id, $ajax=false) {
		$model = new Delivery;

		if ($id == null)
                        throw new CHttpException(404, 'Не выбрана запись.');
                
                
                $model->getmodelPk($id);
            
                
              //  if (!Yii::app()->LockManager->LockRecord('Delivery', $model->PrimaryKey, $id))
                  //  throw new CHttpException(404, 'Запись заблокирована другим пользователем');

		if(isset($_POST['Delivery']))
		{
			$model->attributes=$_POST['Delivery'];
			$model->dldm_id = $id;
			$model->EmplChange = Yii::app()->user->Employee_id;
			$model->user_logist = Yii::app()->user->Employee_id;
//			die(var_dump($model));
//			if($model->update()){
			$model->update();
				$ajax && die(json_encode(array('status'=>'ok')));
				$this->redirect(array('index'));
//			}
		}

//		$model->date = Yii::app()->dateFormatter->formatDateTime($model->date, 'short','short');
//		$model->bestdate = Yii::app()->dateFormatter->formatDateTime($model->date, 'short','short');
//		$model->deadline = Yii::app()->dateFormatter->formatDateTime($model->date, 'short','short');
//		$model->plandate = Yii::app()->dateFormatter->formatDateTime($model->date, 'short','short');
//		$model->date_promise = Yii::app()->dateFormatter->formatDateTime($model->date, 'short','short');
//		$model->date_logist = Yii::app()->dateFormatter->formatDateTime($model->date, 'short','short');

		if($ajax) {
			$this->renderPartial('update', array(
					'model'=>$model,
					'ajax'=>true,
				), false, true
			);
		}
		else {
			$this->render('update', array(
					'model'=>$model,
				)
			);
		}


	}


	public function actionTake($id) {
		$model = new Delivery;
		$model->dldm_id = $id;
		$model->getModelPk($id);
		if((int)$model->user_logist > 0) {
			die(json_encode(array(
				'status'=>'aborted',
				'data'=>array(
					'msg'=>'Заявка была принята ранее.')
				)
			));
		}
		$model->user_logist = Yii::app()->user->Employee_id;

		$model->callProc('TO_LOGIST');
		$model->getmodelPk($id);
			die(json_encode(array(
				'status'=>'ok',
				'data'=>array(
					'user_logist'=>$model->user_logist_name,
					'date_logist'=>$model->date_logist
				)
			)));



	}

	public function actionRepDelivery() {
		$this->render('repDelivery');
	}

	public function actionRepDeliveryReason() {
		$this->render('repDeliveryReason');
	}

	/**
	 * Performs the AJAX validation.
	 * @param Regions $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='regions-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

	public function actionAddition($id) {
		$this->render('addition', array(
			'id'=>$id
		));
	}

	public function actionProcess($id='') {
		$this->renderPartial('process', array('id'=>$id),false, true);
	}

	public function actionEquip($id) {
		$this->renderPartial('equip', array('id'=>$id),false, true);
	}

	public function actionGetDeadline($prior) {
		$id = (int)$prior;
		$sql = "Select dbo.get_delivery_deadline(getdate(), :id)";
		$query = Yii::app()->db->createCommand($sql);
		$query->bindValue('id',$id);
		die(DateTimeManager::YiiDateToAliton($query->queryScalar()));
	}

}


