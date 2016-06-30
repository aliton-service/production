<?php

class ADropDownListController extends CController
{
    public function actionIndex()
    {
        $Command = Yii::app()->db->createCommand('Select Object_id From Objects');
        $data = $Command->queryAll();
        
        $this->renderPartial('_adropdownlist', array(
            'data' => $data,
        ));
    }
}

