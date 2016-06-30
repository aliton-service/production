<?php

//echo $model->ObjectGr_id;

$this->widget('CTabView', array(
    'tabs'=>array(
        'tab1'=>array(
            'title'=>'Общие данные',
            'content'=>$this->renderPartial('tab1', array(
                'model'=> $model), true),
        ),
        
    ),
));

