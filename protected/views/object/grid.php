<?php
    $this->widget('zii.widgets.grid.CGridView', array(
        'cssFile'=>'css/reference/gridview/styles.css',
        'enableSorting' => true,
	'pager'=>array('cssFile'=>'css/reference/gridview/pager.css', ),
        'htmlOptions'=>array('style'=>'width:524px; float:none'),
	'tableWidth'=>'524px',
        'tableHeight'=>'500px',
        'dataProvider'=>$dataProvider,
        'filter'=>$model,
        'ajaxUrl' => Yii::app()->createUrl("Object/grid", array("ObjectGr_id" => $model->ObjectGr_id, "GridName" => $GridName)),
        'id' => $GridName,
        
        'columns' => array(
            array( 
                'name' => 'Object_id',
                'type'=> 'raw',
                'value'=> '$data["Object_id"]', 
                'headerHtmlOptions'=>array('style'=>'width:0%; display:none'),
                'filterHtmlOptions'=>array('style'=>'width:0%; display:none'),
                'htmlOptions'=>array('style'=>'width:0%; display:none', 'id' => 'Object_id'),
            ),
            array( 
                'name' => 'Object_id',
                'type'=> 'raw',
                'value'=> 'Yii::app()->controller->createUrl("Object/update", array("Object_id"=>$data["Object_id"]))', 
                'headerHtmlOptions'=>array('style'=>'width:0%; display:none'),
                'filterHtmlOptions'=>array('style'=>'width:0%; display:none'),
                'htmlOptions'=>array('style'=>'width:0%; display:none', 'id' => 'update'),
            ),
            array( 
                'name' => 'Object_id',
                'type'=> 'raw',
                'value'=> 'Yii::app()->controller->createUrl("Object/delete", array("Object_id"=>$data["Object_id"]))', 
                'headerHtmlOptions'=>array('style'=>'width:0%; display:none'),
                'filterHtmlOptions'=>array('style'=>'width:0%; display:none'),
                'htmlOptions'=>array('style'=>'width:0%; display:none', 'id' => 'Delete_Object_id'),
            ),
            array(
                'name' => 'ObjectTypeName',
                'type' => 'raw',
                'header' => 'Число квартир',
                'value' => 'CHtml::encode($data["ObjectTypeName"])',
            ),
            array(
                'name' => 'Doorway',
                'type' => 'raw',
                'header' => 'Подъезд',
                'value' => 'CHtml::encode($data["Doorway"])',
            ),
            array(
                'name' => 'Condition',
                'type' => 'raw',
                'header' => 'Условия',
                'value' => 'CHtml::encode($data["Condition"])',
            ),
            array(
                'name' => 'MasterKey',
                'type' => 'raw',
                'header' => 'Мастер ключ',
                'value' => 'CHtml::encode($data["MasterKey"])',
            ),
            array( 
                'name' => 'Note',
                'type'=> 'raw',
                'value'=> '$data["Note"]', 
                'headerHtmlOptions'=>array('style'=>'width:0%; display:none'),
                'filterHtmlOptions'=>array('style'=>'width:0%; display:none'),
                'htmlOptions'=>array('style'=>'width:0%; display:none', 'id' => 'Note'),
            ),
        ),
    ));
?>

<?php
    echo '<div class="Edit" grid="'.$GridName.'" name="Note"></div>';
    echo ' <a id="Insert_'.$GridName.'" href=""><div class="btn btn-primary">Создать</div></a>';
    echo ' <a id="Update_'.$GridName.'" href=""><div class="btn btn-primary">Изменить</div></a>';
    echo ' <a id="Delete_'.$GridName.'" href=""><div class="btn btn-primary">Удалить</div></a>';
?>


