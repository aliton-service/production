<?php

    echo 'Подъезды';
    
    $this->widget('zii.widgets.grid.CGridView', array(
        'cssFile'=>'css/reference/gridview/styles.css',
        'enableSorting' => true,
	'pager'=>array('cssFile'=>'css/reference/gridview/pager.css', ),
        'htmlOptions'=>array('style'=>'width:1000px; float:none'),
	'tableWidth'=>'524px',
        'tableHeight'=>'500px',
        'dataProvider'=>$ObjectData,
        'filter'=>$ObjectModel,
            
        'columns' => array(
            array(
                'name' => 'Object_id',
                'type' => 'raw',
                'header' => 'Идентификатор',
                'value' => 'CHtml::encode($data["Object_id"])',
                
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
            
        ),
    ));
    echo CHtml::textArea('Примечание');
?>

<a href= "">Создать</a>
<a href= "">Изменить</a>
<a href= "">Удалить</a>

<p>Оборудование:</p>