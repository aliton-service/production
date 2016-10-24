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
                    'roles' => array('ViewDocuments'),
                ),
                array('allow', // allow authenticated user to perform 'insert' and 'update' actions
                    'actions' => array('insert'),
                    'roles' => array('InsertDocuments'),
                ),
                array('allow', // allow authenticated user to perform 'update' and 'update' actions
                    'actions' => array('update'),
                    'roles' => array('UpdateDocuments'),
                ),
                array('allow', // allow admin user to perform 'admin' and 'delete' actions
                    'actions' => array('delete'),
                    'roles' => array('DeleteDocuments'),
                ),
                array('allow', // allow admin user to perform 'admin' and 'delete' actions
                    'actions' => array('checkup'),
                    'roles' => array('CheckupDocuments'),
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


	public function actionInsert()
	{
            $model = new Documents;
            
            $DialogId = '';
            $BodyDialogId = '';
            
            if (isset($_POST['Params']))
                $model->attributes = $_POST['Params'];
        
            if (isset($_POST['DialogId']))
                $DialogId = $_POST['DialogId'];
            if (isset($_POST['BodyDialogId']))
                $BodyDialogId = $_POST['BodyDialogId'];
            
            if(isset($_POST['Documents']))
            {
                $model->attributes=$_POST['Documents'];
                switch ($model->DocType_id) {
                    case 8: $model->setScenario('Счет'); break;
                    case 4: $model->setScenario('Договор'); break;
                    case 5: $model->setScenario('Доп.соглашение'); break;
                    case 3: $model->setScenario('Счет-заказ'); break;
                }
                
                if ($model->validate())
                {
                    $model->Insert();
                    echo '1';
                    return;
                }

            }
            
            if (isset($_POST['ObjectGr_id'])) {
                $model->ObjectGr_id = $_POST['ObjectGr_id'];
            }
            if (isset($_POST['DocType_Name'])) {
                switch ($_POST['DocType_Name']) {
                    case 'Счет':
                        $model->DocType_id = 8;
                        $this->renderPartial('_formInvoice', array(
                            'model' => $model,
                            'DialogId' => $DialogId,
                            'BodyDialogId' => $BodyDialogId,
                        ));
                        break;
                    case 'Счет-заказ':
                        $model->DocType_id = 3;
                        $this->renderPartial('_formInvoiceOrder', array(
                            'model' => $model,
                            'DialogId' => $DialogId,
                            'BodyDialogId' => $BodyDialogId,
                        ));
                        break;
                    case 'Доп.соглашение':
                        $model->DocType_id = 5;
                        $this->renderPartial('_formAgreement', array(
                            'model' => $model,
                            'DialogId' => $DialogId,
                            'BodyDialogId' => $BodyDialogId,
                        ));
                        break;
                    case 'Договор обслуживания':
                        $model->DocType_id = 4;
                        $this->renderPartial('_formContract', array(
                            'model' => $model,
                            'DialogId' => $DialogId,
                            'BodyDialogId' => $BodyDialogId,
                        ));
                        break;
                }
            }


	}


	public function actionUpdate()
	{
            if (isset($_POST['ContrS_id'])) {
                $ContrS_id = $_POST['ContrS_id'];
            }
            
            $model = new Documents;
            
            if (isset($_POST['ObjectGr_id'])) {
                $model->ObjectGr_id = $_POST['ObjectGr_id'];
            }

            if(isset($_POST['Documents']))
            {
                $model->attributes=$_POST['Documents'];
//                $ContrS_id = $model->ContrS_id;

                

                if ($model->validate())
                {
                    $model->Update();
                    echo '1';
                    return;
                }

            }
            
            $model->getModelPk($ContrS_id);
            
            switch ($model->DocType_id) {
                case 8:
                    $this->renderPartial('_formInvoice', array(
                        'model' => $model
                    ));
                    break;
                case 3:
                    $this->renderPartial('_formInvoiceOrder', array(
                        'model' => $model
                    ));
                    break;
                case 5:
                    $this->renderPartial('_formAgreement', array(
                        'model' => $model
                    ));
                    break;
                case 4:
                    $this->renderPartial('_formContract', array(
                        'model' => $model
                    ));
                    break;
            }
            
	}


	public function actionDelete()
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


	public function actionIndex()
	{
            if (isset($_GET['ContrS_id'])) {
                $ContrS_id = $_GET['ContrS_id'];
                $model = new Documents();
                $model->getModelPk($ContrS_id);
                $this->title = $model->DocType_Name .' № ' . $model->ContrNumS;
                
                switch ($model->DocType_id) {
                    case 8:
                        $this->render('indexInvoice', array(
                            'model' => $model
                        ));
                        break;
                    case 3:
                        $this->render('indexInvoiceOrder', array(
                            'model' => $model
                        ));
                        break;
                    case 5:
                        $this->render('indexAgreement', array(
                            'model' => $model
                        ));
                        break;
                    case 4:
                        $this->render('indexContract', array(
                            'model' => $model
                        ));
                        break;
                }
            }
	}
        
        protected function performAjaxValidation($model)
        {
            if(isset($_POST['ajax']) && $_POST['ajax']==='regions-form')
            {
                echo CActiveForm::validate($model);
                Yii::app()->end();
            }
        }
        

	public function actionCheckup()
	{
            if (isset($_POST['ContrS_id'])) {
                $model = new Documents();
                $model->getModelPk($_POST['ContrS_id']);
                if ($model->user_checkup == null || $model->user_checkup == '') {
                    $sp = new StoredProc();
                    $sp->ProcedureName = 'CHECKUP_ContractsS';
                    $sp->ParametersRefresh();
                    $sp->Parameters[0]['Value'] = $_POST['ContrS_id'];
                    $sp->Parameters[1]['Value'] = Yii::app()->user->Employee_id;
                    $sp->CheckParam = true;
                    $sp->Execute();
                    echo '1';
                    return;
                }
            }
            echo '0';
            
	}
        

}

