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
            $this->title = 'Мониторинг цен';
            $this->render('index');
	}

	public function actionCreate() {
            $model=new PriceMonitoring;
            $ObjectResult = array(
                'result' => 0,
                'id' => 0,
                'html' => '',
            );
            
            if (isset($_POST['Params']))
                $model->attributes = $_POST['Params'];
            
            if(isset($_POST['PriceMonitoring']))
            {
                $model->attributes = $_POST['PriceMonitoring'];
                if ($model->validate()) {
                    $Res = $model->Insert();
                    $ObjectResult['result'] = 1;
                    $ObjectResult['id'] = $Res['mntr_id'];
                    echo json_encode($ObjectResult);
                    return;
                } 
            }
            $ObjectResult['html'] = $this->renderPartial('_form', array(
                'model' => $model,
            ), true);
            echo json_encode($ObjectResult);
	}

	public function actionUpdate($mntr_id = false) {
            $model=new PriceMonitoring;
            $ObjectResult = array(
                'result' => 0,
                'id' => 0,
                'html' => '',
            );
            
            if (isset($_POST['mntr_id']))
                $model->getModelPk($_POST['mntr_id']);
            
            if (isset($_POST['Params']))
                $model->attributes = $_POST['Params'];
            
            if(isset($_POST['PriceMonitoring']))
            {
                $model->attributes = $_POST['PriceMonitoring'];
                if ($model->validate()) {
                    $Res = $model->Update();
                    $ObjectResult['result'] = 1;
                    $ObjectResult['id'] = $model->mntr_id;
                    echo json_encode($ObjectResult);
                    return;
                } 
            }
            $ObjectResult['html'] = $this->renderPartial('_form', array(
                'model' => $model,
            ), true);
            echo json_encode($ObjectResult);
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