<?php
/**
 * Created by PhpStorm.
 * User: meg
 * Date: 21.12.2015
 * Time: 9:34
 */

class PriceMonitoringController extends Controller
{
	public $layout = '//layouts/column2';

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


	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view'),
				'roles'=>array(
					'ViewPriceMonitoring',
					'CreatePriceMonitoring',
					'UpdatePriceMonitoring',

				),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create'),
				'roles'=>array(

					'CreatePriceMonitoring',

				),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('update'),
				'roles'=>array(

					'UpdatePriceMonitoring',

				),
			),

			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('delete'),
				'roles'=>array(

					'DeletePriceMonitoring',

				),

			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}


	public function actionIndex() {
            $this->render('index');
	}

	public function actionCreate() {
            $model=new PriceMonitoring;

            if(isset($_POST['PriceMonitoring']))
            {
                $model->attributes=$_POST['PriceMonitoring'];
                $model->user_create_id = Yii::app()->user->Employee_id;
                if ($model->validate()) {
                    if($model->insert())
                        $this->redirect(Yii::app()->createUrl('PriceMonitoring/Index'));
                }
            }

            $this->render('create',array(
                    'model'=>$model,
            ));
	}

	public function actionUpdate($mntr_id = false) {
            $model=new PriceMonitoring;
            $model->getModelPk($mntr_id);

            if ($mntr_id == null)
                    throw new CHttpException(404, 'Не выбрана запись.');

            if(isset($_POST['PriceMonitoring']))
            {
                $model->attributes=$_POST['PriceMonitoring'];
                $model->user_change_id = Yii::app()->user->Employee_id;

                if ($model->validate()) {
                    $model->update();
                    $this->redirect(Yii::app()->createUrl('PriceMonitoring/Index'));
                }
            }

            $this->render('update',array(
                    'model'=>$model,
            )); 
	}

	public function actionDelete() {
            if(isset($_POST['mntr_id'])) {
                $mntr_id = $_POST['mntr_id'];
            }
            $model = new PriceMonitoring;
            $model->getModelPk($mntr_id);
            $model->user_delete = Yii::app()->user->Employee_id;
            
            if(!is_null($mntr_id)){
                $model->delete();
            }
            
            $this->redirect($this->createUrl('PriceMonitoring/Index'));
	}

	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='PriceMonitoring')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}