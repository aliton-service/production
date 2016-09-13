<?php

class ControlContactsController extends Controller
{
    public $layout='//layouts/column2';
    
    public $title = 'Контроль контактов';
    public $action_url = '';
    
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

            array('allow',
                    'actions'=>array('Index'),
                    'roles'=>array('ViewControlContacts'),
                ),
            array('allow',
                    'actions'=>array('Insert'),
                    'roles'=>array('InsretControlContacts'),
                ),
            array('allow',
                    'actions'=>array('Update'),
                    'roles'=>array('UpdateControlContacts'),
                ),
            array('allow',
                    'actions'=>array('Delete'),
                    'roles'=>array('DeleteControlContacts'),
                ),
            array('deny',  // deny all users
                        'users'=>array('*'),
                ),
        );
    }


    public function actionIndex()
    {
        $model = new ControlContacts();
        
        $this->title = 'Контроль контактов';
        $model->Employee_id = Yii::app()->user->Employee_id;
        
        $this->render('index', array(
            'model' => $model
        ));
    }

    public function actionInsert() 
    {
        $model = new ControlContacts;
        
        if(isset($_POST['ControlContacts']))
        {
            $model->attributes = $_POST['ControlContacts'];
            
            $Employee_id = Yii::app()->user->Employee_id;
            $Query = new SQLQuery();
            $Query->setSelect("Select Alias from Employees where Employee_id = " . $Employee_id);
            $Result = $Query->QueryRow();
            $Employee_Alias = $Result['Alias'];
                
            $model->User2 = $Employee_Alias;
            $model->UserCreate2 = Yii::app()->user->Employee_id;

            if ($model->validate())
            {
                $model->Insert();
                echo '1';
                return;
            }
        }

        $this->renderPartial('_form', array(
            'model' => $model
        ));

    }

    public function actionUpdate() 
    {
        $model = new ControlContacts;
        
        if(isset($_POST['ControlContacts']))
        {
            $model->attributes=$_POST['ControlContacts'];
            $cont_id = $model->cont_id;

            if ($model->validate())
            {
                $model->Update();
                echo '1';
                return;
            }

        }
        
        if (isset($_POST['cont_id'])) {
            $cont_id = $_POST['cont_id'];
        }
        
        $model->getModelPk($cont_id);
        $this->renderPartial('_form', array(
            'model' => $model
        ));
    }
    
    

    public function actionDelete()
    {
        if(isset($_POST['cont_id'])) {
            $cont_id = $_POST['cont_id'];
        }
        $model = new ControlContacts;
        $model->getModelPk($cont_id);
        $model->UserChange2 = Yii::app()->user->Employee_id;

        if(!is_null($cont_id)){
            $model->delete();
        }
    }

    public function loadModel($id)
    {
        $model=Regions::model()->findByPk($id);
        if($model===null)
                throw new CHttpException(404,'The requested page does not exist.');
        return $model;
    }
    
}


