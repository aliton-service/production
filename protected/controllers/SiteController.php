<?php

class SiteController extends Controller
{
    public $title = '';
	/**
	 * Declares class-based actions.
	 */
   
	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			
                        'page'=>array(
				'class'=>'CViewAction',
			),
                        
		);
	}

        public function actionDesign() {
            $this->layout = '//layouts/main4';
            $this->title = 'Дизайн';
            $this->render('design');
        }
        
	public function actionIndex()
	{
            /* В зависимости от роли, открываем по умолчанию */
            $RoleName = Yii::app()->user->getRole('Yii');
            
            if ($RoleName == 'Dispatcher')
                $this->redirect(Yii::app()->createUrl('Object/index'));
            else if ($RoleName == 'PersonalManger')
                $this->redirect(Yii::app()->createUrl('Employees/index'));
            else if ($RoleName == 'StaffManager')
                $this->redirect(Yii::app()->createUrl('Demands/index'));
            else if ($RoleName == 'HeadLogistics')
                $this->redirect(Yii::app()->createUrl('WHDocuments/Index'));
            else if ($RoleName == 'LogisticsManager')
                $this->redirect(Yii::app()->createUrl('WHDocuments/index'));
            else if ($RoleName == 'Storeman')
                $this->redirect(Yii::app()->createUrl('WHDocuments/index'));
            else
                $this->title = 'Приветствие';
                $this->render('index');
            
	}
        
        public function actionICPH() 
        {
            $model = new ContractPriceHistory();
            $model->PriceHistory_id = null;
            $model->ContrS_id = 17189;
            $model->DateStart = '23.08.2016';
            $model->DateEnd = '23.08.2017';
            $model->Price = '100';
            $model->PriceMonth = '100';
            $model->Reason_id = 4;
            $model->ReasonName;
            $model->ServiceType_id = 56;
            $model->ServiceType;
    
            $model->EmplCreate = Yii::app()->user->Employee_id;
            $model->EmplChange = Yii::app()->user->Employee_id;
            $ContrS_id = $model->ContrS_id;

            if ($model->validate())
            {
                $model->Insert();
                echo '1';
                return;
            }
              
        }

        public function actionTest()
        {
            $ListObjects = new ListObjects();
            $DateStart = microtime(true);
            $ListObjects->Find(array());
            $DateEnd = microtime(true);
            $Interval = floor(($DateEnd - $DateStart) * 1000);
            
            $this->render('test', array(
                'Interval' => $Interval,
            ));
        }

	public function actionError()
	{
		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('error', $error);
		}
	}

        
        public function actionAbout()
	{
            $this->renderPartial('about');
	}
        
	/**
	 * Displays the contact page
	 */
	public function actionContact()
	{
		$model=new ContactForm;
		if(isset($_POST['ContactForm']))
		{
			$model->attributes=$_POST['ContactForm'];
			if($model->validate())
			{
				$name='=?UTF-8?B?'.base64_encode($model->name).'?=';
				$subject='=?UTF-8?B?'.base64_encode($model->subject).'?=';
				$headers="From: $name <{$model->email}>\r\n".
					"Reply-To: {$model->email}\r\n".
					"MIME-Version: 1.0\r\n".
					"Content-Type: text/plain; charset=UTF-8";

				mail(Yii::app()->params['adminEmail'],$subject,$model->body,$headers);
				Yii::app()->user->setFlash('contact','Thank you for contacting us. We will respond to you as soon as possible.');
				$this->refresh();
			}
		}
		$this->render('contact',array('model'=>$model));
	}

	public function actionLogin()
	{
            $Obj = array (
                'Data' => array(
                    'Result' => 'NotLogin',
                    'Url' => '',
                    'Error' => '',
                ),
            );    
            
            $model = new LoginForm;
            
            if(isset($_POST['LoginForm']))
            {
                $model->attributes=$_POST['LoginForm'];
                                
                if($model->validate() && $model->login()) {
                    $Obj['Data']['Result'] = 'Login';
                    $Obj['Data']['Url'] = Yii::app()->user->returnUrl;
                    $Obj['Data']['Error']  = $model;
                    echo json_encode($Obj);
                    return 1;
                }
                else {
//                    echo 'NotLogin';
                    $Obj['Data']['Result'] = 'NotLogin';
                    $model->addError('password','Пользователю не присвоина роль');
                    $Obj['Data']['Error']  = $model;
                    echo json_encode($Obj);
                    return 0;
                }
            }
            
            $this->title = 'Авторизация';
		
            $this->render('login',array(
                'model'=>$model,
                'url' => Yii::app()->user->returnUrl,
            ));
	}

	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}
        
        static public function actionUnLockRecord($TableName, $Id, $Value){
            
            $connection = Yii::app()->db;
            $sql = 'Update '.$TableName.' set';
            $sql = $sql.' Lock = 0,';
            $sql = $sql.' EmplLock = Null,';
            $sql = $sql.' DateLock = Null';
            $sql = $sql.' Where '.$Id.' = '.$Value;
            
            $command = $connection->createCommand($sql);
            $result = $command->execute();
            return $result;
        }
        
        public function actionSettings() {
            $UserSettings = new UserSettings();
            $R = $UserSettings->Find(array(), array(
                's.Empl_id = ' . Yii::app()->user->Employee_id,
            ));
            
            if (count($R) > 0) {
                $UserSettings->Setting_id = $R[0]['Setting_id'];
                $UserSettings->Empl_id = $R[0]['Empl_id'];
                $UserSettings->Theme = $R[0]['Theme'];
                $UserSettings->Hide_page_header = $R[0]['Hide_page_header'];
            }
            //$UserSettings->getModelPk(Yii::app()->user->Employee_id);
            
            if (isset($_POST['UserSettings'])) {
                $UserSettings->attributes = $_POST['UserSettings'];
                $UserSettings->Empl_id = Yii::app()->user->Employee_id;
                if ($UserSettings->validate()) {
                    $UserSettings->Update();
                    echo '1';
                    return;
                }
            }
            
            
            $this->render('settings',array(
                'model'=>$UserSettings,
            ));
        }
        
        
}