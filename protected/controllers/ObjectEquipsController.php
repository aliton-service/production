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
    
    public function actionInsert()
    {
        $model = new ObjectEquips();
        
        if (isset($_POST['Object_Id'])) {
            $Object_id = $_POST['Object_Id'];
            $model->Object_Id = $Object_id;
        }
        
        if (isset($_POST['ObjectGr_id'])) {
            $ObjectGr_id = $_POST['ObjectGr_id'];
            $model->ObjectGr_id = $ObjectGr_id;
        }
            
        if (isset($_POST['ObjectEquips']))
        {
            $model->attributes = $_POST['ObjectEquips'];
            if ($model->validate())
            {
                $model->Insert();
                echo '1';
                return;
            }
        }
        
        $this->renderPartial('edit', array(
           'model' => $model,
        ));
    }
    
    public function actionUpdate()
    {
        $model = new ObjectEquips();
        
        if (isset($_POST['Code'])) {
            $Code = $_POST['Code'];
            $model->getModelPk($Code);
        }
        
            
        if (isset($_POST['ObjectEquips']))
        {
            $model->attributes = $_POST['ObjectEquips'];
            if ($model->validate())
            {
                $model->Update();
                echo '1';
                return;
            }
        }
        
        $this->renderPartial('edit', array(
           'model' => $model,
        ));
    }
    
    public function actionDelete()
    {
        if (isset($_POST['Code']))
        {
            $model = new ObjectEquips();
            $model->getModelPk($_POST['Code']);
            $model->Delete();
            echo '1';
            return;
        }
        echo '0';
    }

    
}

