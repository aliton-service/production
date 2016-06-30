<?php

class ObjectEquipsController extends Controller
{
    protected $title = '';
    protected $action_url = '';
    
    public $layout='//layouts/column2';
    
    public function actionGrid($GridName = "", $AjaxUrl = "")
    {
        if (isset($_GET['Object_id']))
        {
            $Object_id = $_GET['Object_id'];
            $ObjectEquips = new ObjectEquips();
            $ObjectEquips->Object_Id = $Object_id;
            
            if (isset($_GET['ObjectEquips']))
                $ObjectEquips->SetFilter($_GET['ObjectEquips']);
            
            $DataRow = $ObjectEquips->Find(array(
                'o.Object_id' => $Object_id,
            ));
            
            $ObjectData = $ObjectEquips->filter($DataRow);
        
            $ObjectDataProvider=new CArrayDataProvider($ObjectData, array(
                'keyField' => 'Code',
                'pagination' => array(
                'pageSize' => 15,
            )));
            
            if ($GridName == "")
                $GridName = "Objects";
            
            if ($AjaxUrl == "")
                $this->action_url = Yii::app()->createUrl("ObjectEquips/grid", array("Object_id" => $Object_id));
            
            $this->renderPartial('grid', array(
                'dataProvider' => $ObjectDataProvider,
                'model' => $ObjectEquips,
                'GridName' => $GridName
            ), FALSE, TRUE);
        }
    }
    
    public function actionInsert($Object_id = FALSE)
    {
        $code = 0;
        $this->title = 'Добавление оборудования';
        $this->action_url = $this->createUrl('ObjectEquips/insert', array('Object_id' => $Object_id));
        $Code = 0;
        
        if ($Object_id !== FALSE)
        {
            $model = new ObjectEquips();
            $model->Object_Id = $Object_id;

            if (isset($_POST['ObjectEquips']))
            {
                $model->attributes = $_POST['ObjectEquips'];

                $this->performAjaxValidation($model);

                if ($model->validate())
                {
                    $Result = $model->Insert();
                    
                    $Code = $Result['Code'];
                    
                    $model->getModelPk($Code);
                    
                    $this->redirect(Yii::app()->createUrl('Objectsgroup/index', array('ObjectGr_id' => $model->ObjectGr_id)));
                }
            }
            
            $this->render('edit', array(
               'model' => $model,
            ));
        }
    }
    
    public function actionUpdate($Code = FALSE)
    {
        $this->title = 'Редактирование оборудования';
        $this->action_url = $this->createUrl('ObjectEquips/update', array('Code' => $Code));
        
        if ($Code !== FALSE)
        {
            $model = new ObjectEquips();
            $model->getModelPk($Code);
            
            if (isset($_POST['ObjectEquips']))
            {
                $model->attributes = $_POST['ObjectEquips'];
                
                $this->performAjaxValidation($model);
                
                if ($model->validate())
                {
                    $model->Update();
                    Yii::app()->LockManager->UnLockRecord('ObjectsEquip', 'Code', $model->Code);
                    $this->redirect(Yii::app()->createUrl('Objectsgroup/index', array('ObjectGr_id' => $model->ObjectGr_id)));
                }
                
            }
            
            $this->render('edit', array(
               'model' => $model,
            ));
            
        }
    }
    
    public function actionDelete($Code = FALSE)
    {
        $this->title = 'Удаление оборудования';
        $this->action_url = $this->createUrl('ObjectEquips/delete', array('Code' => $Code));
        
        if ($Code !== FALSE)
        {
            $model = new ObjectEquips();
            $model->getModelPk($Code);
                            
            $this->performAjaxValidation($model);
                
            $model->Delete();
            $this->redirect(Yii::app()->createUrl('Objectsgroup/index', array('ObjectGr_id' => $model->ObjectGr_id)));
        }
    }
    
    protected function performAjaxValidation($model)
    {
        if(isset($_POST['ajax']) && $_POST['ajax']==='ObjectEquips')
        {
                echo CActiveForm::validate($model);
                Yii::app()->end();
        }
    }
    
}

