<?php
    

    // Реестр
    $this->widget('zii.widgets.grid.CGridView', array(
        'cssFile'=>'css/reference/gridview/styles.css',
        'enableSorting' => true,
	'pager'=>array('cssFile'=>'css/reference/gridview/pager.css', ),
        'htmlOptions'=>array('style'=>'width:980px; float:none'),
	'tableWidth'=>'980px',
        'tableHeight'=>'500px',
        'dataProvider'=>$dataProvider,
        'filter'=>$model,
        'id' => 'ContactGrid',
        
        'columns' => array(
            array( 
                'name' => 'Info_id',
                'type'=> 'raw',
                'value'=> 'Yii::app()->controller->createUrl("ContactInfo/update", array("Info_id"=>$data["Info_id"]))', 
                'headerHtmlOptions'=>array('style'=>'width:0%; display:none'),
                'filterHtmlOptions'=>array('style'=>'width:0%; display:none'),
                'htmlOptions'=>array('style'=>'width:0%; display:none', 'id' => 'Info_id'),
            ),
            array(
                'name' => 'FIO',
                'type' => 'raw',
                'header' => 'ФИО',
                'value' => 'CHtml::encode($data["FIO"])',
                'htmlOptions' => array("Info_id" => '$data["Info_id"]'),
                
            ),
            array(
                'name' => 'CustomerName',
                'type' => 'raw',
                'header' => 'Должность',
                'value' => 'CHtml::encode($data["CustomerName"])',
            ),
            
            array(
                'name' => 'Telephone',
                'type' => 'raw',
                'header' => 'Телефон',
                'value' => 'CHtml::encode($data["Telephone"])',
            ),
            array(
                'name' => 'Email',
                'type' => 'raw',
                'header' => 'Электронная почта',
                'value' => 'CHtml::encode($data["Email"])',
            ),
            array(
                'name' => 'CTelephone',
                'type' => 'raw',
                'header' => 'Сотовый телефон',
                'value' => 'CHtml::encode($data["CTelephone"])',
            ),
            array(
                'name' => 'Birthday',
                'type' => 'raw',
                'header' => 'Дата рождения',
                'value' => 'CHtml::encode($data["Birthday"])',
            ),
            array(
                'name' => 'Main',
                'type' => 'raw',
                'header' => 'ЛПР',
                'value' => 'CHtml::checkBox("Main",$data["Main"])',
            ),
            array(
                'name' => 'ForReport',
                'type' => 'raw',
                'header' => 'Для отчетов',
                'value' => 'CHtml::checkBox("ForReport",$data["ForReport"])',
            ),
            
        ),
    ));
    // Кнопки кправления
    
    
    
?>
<script>
    $('body').on('click', '#ContactGrid .items tbody tr', function(){
        $url = $(this).find('#Info_id').text();
        $('#a_update_contact').attr('href', $url);
    });
</script>

<?php
    echo '<a href="'.$this->createURL('ContactInfo/insert', array('ObjectGr_id' => $model->ObjectGr_id)).'"><div class="btn btn-primary">Создать</div></a>';
    echo ' <a id="a_update_contact" href="'.$this->createURL('ContactInfo/update').'"><div class="btn btn-primary">Изменить</div></a>';
?>
