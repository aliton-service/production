<?php

class DemandsExecutorsController extends Controller
{
    public $layout='//layouts/column2';
    public $title = '';
    public $action_url = '';
    
    public function actionViewAjax($Demand_id = null){
        $this->renderPartial('view', array('Demand_id' => $Demand_id), false, true);
    }
    
    public function actionInsert() {
        $model = new DemandsExecutors;
        $this->title = 'Добавление исполнителя';
		
        if(isset($_POST['DemandsExecutors']))
        {
            $model->attributes=$_POST['DemandsExecutors'];
            $model->EmplCreate = Yii::app()->user->Employee_id;


            if ($model->validate()) {
                $Result = $model->insert();

                if($Result)
                {	
                    $this->redirect(Yii::app()->createUrl('Demands/view', array('Demand_id' => $Result['Demand_id'])));
                }
            }
        }
       
    }
    
    public function actionChange($Demand_id = false) {
        $model = new DemandsExecutors;
        $this->title = 'Добавление исполнителя';
		
        
        if(isset($_POST['DemandsExecutors']))
        {
            $model->attributes=$_POST['DemandsExecutors'];
            $model->EmplChange = Yii::app()->user->Employee_id;


            if ($model->validate()) {
                $Result = $model->update();

            }
        }
    }
    
}
