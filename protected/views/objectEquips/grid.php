<?php
    
    $this->widget('zii.widgets.grid.CGridView', array(
        'cssFile'=>'css/reference/gridview/styles.css',
        'enableSorting' => true,
	'pager'=>array('cssFile'=>'css/reference/gridview/pager.css', ),
        'htmlOptions'=>array('style'=>'width:980px; float:none'),
	'tableWidth'=>'980px',
        'tableHeight'=>'300px',
        'dataProvider'=>$dataProvider,
        'filter'=>$model,
        'ajaxUrl' => $this->action_url,
        'id' => $GridName,
        
        'columns' => array(
            array( 
                'name' => 'Code',
                'type'=> 'raw',
                'value'=> '$data["Code"]', 
                'headerHtmlOptions'=>array('style'=>'width:0%; display:none'),
                'filterHtmlOptions'=>array('style'=>'width:0%; display:none'),
                'htmlOptions'=>array('style'=>'width:0%; display:none', 'id' => 'Code'),
            ),
            array(
                'name' => 'EquipName',
                'type' => 'raw',
                'header' => 'Оборудование',
                'value' => 'CHtml::encode($data["EquipName"])',
                
            ),
            array(
                'name' => 'EquipName',
                'type' => 'raw',
                'header' => 'Оборудование',
                'value' => 'CHtml::encode($data["EquipQuant"])',
                
            ),
            array(
                'name' => 'StockNumber',
                'type' => 'raw',
                'header' => 'Описание оборудования',
                'value' => 'CHtml::encode($data["StockNumber"])',
                
            ), 
            array(
                'name' => 'DateInstall',
                'type' => 'raw',
                'header' => 'Дата установки',
                'value' => 'CHtml::encode($data["DateInstall"])',
                
            ),
            array(
                'name' => 'DateService',
                'type' => 'raw',
                'header' => 'Дата постановки на обслуживание',
                'value' => 'CHtml::encode($data["DateService"])',
                
            ),
            array(
                'name' => 'Location',
                'type' => 'raw',
                'header' => 'Месторасположение',
                'value' => 'CHtml::encode($data["Location"])',
                
            ),
        ),
    ));
            
?>

<?php
    echo ' <a id="Insert_'.$GridName.'" href=""><div class="btn btn-primary">Создать</div></a>';
    echo ' <a id="Update_'.$GridName.'" href=""><div class="btn btn-primary">Изменить</div></a>';
    echo ' <a id="Delete_'.$GridName.'" href=""><div class="btn btn-primary">Удалить</div></a>';
?>

