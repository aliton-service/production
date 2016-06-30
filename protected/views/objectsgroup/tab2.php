<?php
    $this->widget('zii.widgets.grid.CGridView', array(
        'cssFile'=>'css/reference/gridview/styles.css',
        'enableSorting' => true,
	'pager'=>array('cssFile'=>'css/reference/gridview/pager.css', ),
        'htmlOptions'=>array('style'=>'width:1000px; float:none'),
	'tableWidth'=>'1024px',
        'tableHeight'=>'500px',
        'dataProvider'=>$SystemDataProvider,
        'filter'=>$SystemFilterForm,
            
        'columns' => array(
            array(
                'name' => 'Availability',
                'type' => 'raw',
                'header' => 'Наличие',
                'value' => 'CHtml::encode($data["Availability"])',
            ),
            array(
                'name' => 'Count',
                'type' => 'raw',
                'header' => 'Кол-во систем',
                'value' => 'CHtml::encode($data["Count"])',
            ),
            array(
                'name' => 'SystemTypeName',
                'type' => 'raw',
                'header' => 'Тип системы',
                'value' => 'CHtml::encode($data["SystemTypeName"])',
            ),
            array(
                'name' => 'Condition',
                'type' => 'raw',
                'header' => 'Условия',
                'value' => 'CHtml::encode($data["Condition"])',
            ),
            array( 
                'name' => 'Update',
                'type'=> 'raw',
                'value'=> 'Yii::app()->controller->createUrl("ObjectsGroupSystems/update", array("ObjectsGroupSystem_id"=>$data["ObjectsGroupSystem_id"]))', 
                'headerHtmlOptions'=>array('style'=>'width:0%; display:none'),
                'filterHtmlOptions'=>array('style'=>'width:0%; display:none'),
                'htmlOptions'=>array('style'=>'width:0%; display:none', 'id' => 'SysUpdate'),
            ),
            
        ),
    ));
    
    $url =  Yii::app()->createUrl('ObjectsGroupSystems/insert', array('ObjectGr_id' => $model->ObjectGr_id));
    
    echo '<a id="insert_sys" href="'.$url.'">Создать</a>';
    echo '<a id="update_sys" href="'.$url.'">Изменить</a>';
?>

<script>
$('body').on('click','.items tbody tr', function(){
	
	var link_u = $(this).find('td#SysUpdate').text();
	
        $('#update_sys').attr('href', link_u);
        

});
</script>

