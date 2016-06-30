<?php

class ActEquipsController extends Controller
{
    protected $title = '';
    protected $action_url = '';
    
    public function filters()
    {
	return array(
            'accessControl', // perform access control for CRUD operations
        );
    }
    
    public function accessRules()
    {
        return array(
            array('allow',
                    'actions'=>array('Index'),
                    'roles'=>array('ViewActEquips'),
                ),
            array('allow',
                    'actions'=>array('Insert'),
                    'roles'=>array('InsertActEquips'),
                ),
            array('allow',
                    'actions'=>array('Update'),
                    'roles'=>array('UpdateActEquips'),
                ),
            array('allow',
                    'actions'=>array('Delete'),
                    'roles'=>array('DeleteActEquips'),
                ),
            array('deny',  // deny all users
                    'users'=>array('*'),
                ),
        );
    }
    
    public function actionIndex($docm_id = FALSE)
    {
        $this->render('index', array('docm_id' => $docm_id));
    }
    
    public function actionInsert($docm_id = FALSE)
    {
        $this->title = 'Добавление оборудоавния в акт';
        $this->action_url = $this->createUrl('ActEquips/insert', array('docm_id' => $docm_id));
        
        if ($docm_id !== FALSE)
        {
            $model = new ActEquips_v();
            $model->docm_id = $docm_id;
            
            if (isset($_POST['ActEquips']))
            {
                $model->attributes = $_POST['ActEquips'];
                
                if ($model->validate())
                {
                    $model->Insert();
                    $this->redirect(Yii::app()->createUrl('ActEquips/index', array('docm_id' => $model->docm_id)));
                }
                
            }
            
            $this->render('insert', array(
               'model' => $model,
            ));
        }
    }
    
    public function actionUpdate($dadt_id = FALSE)
    {
        $this->title = 'Редактирование оборудования';
        $this->action_url = $this->createUrl('ActEquips/update', array('dadt_id' => $dadt_id));
        
        if ($dadt_id !== FALSE)
        {
            $model = new ActEquips_v();
            
            if (isset($_POST['ActEquips']))
            {
                $model->attributes = $_POST['ActEquips'];
                
                if ($model->validate())
                {
                    $model->Insert();
                    $this->redirect(Yii::app()->createUrl('ActEquips/index', array('docm_id' => $model->docm_id)));
                }
                
            }
            else {
                $model->getModelPk($dadt_id);
            }
            
            $this->render('insert', array(
               'model' => $model,
            ));
        }
    }
    
    public function actionDelete($dadt_id = FALSE)
    {
        $this->title = 'Удаление оборудования';
        $this->action_url = $this->createUrl('ActEquips/delete', array('dadt_id' => $dadt_id));
        
        if ($dadt_id !== FALSE)
        {
            $model = new ActEquips_v();
            $model->getModelPk($dadt_id);
            $model->dadt_id = $dadt_id;
            $model->Delete();
            $this->redirect(Yii::app()->createUrl('ActEquips/index', array('docm_id' => $model->docm_id)));
        }
    }
}



