<?php
    $_POST['Param1'] = "555";//$model->ObjectGr_id;
?>
    
<?php
    
    $url = '';
    $button = '';
    $readonly = array();

    if ($this->action->id === 'index')
    {
        $url = Yii::app()->createUrl('Objectsgroup/update', array('ObjectGr_id' => $model->ObjectGr_id));
        $button =  CHtml::submitButton('Изменить');
        $readonly = array('disabled'=>'disabled');
    }
    
    if (($this->action->id === 'update') ||($this->action->id === 'save'))
    {
        $url = Yii::app()->createUrl('Objectsgroup/save');
        $button =  CHtml::submitButton('Сохранить');
        $readonly = array();
    }
        
    if ($url === '')
    {
        $url = Yii::app()->createUrl('Objectsgroup/index', array('ObjectGr_id' => $model->ObjectGr_id));
        $button =  CHtml::submitButton('Изменить');
        $readonly = array('disabled'=>'disabled');
    }
    
    $form=$this->beginWidget('CActiveForm', array(
	'id'=>'Objectsgroup',
    'htmlOptions'=>array(
        'class'=>'form-inline'
        ),
        'action'=> $url,
	'enableClientValidation'=>true,
        'enableAjaxValidation'=>true,
)); 
      ?>

<?php
    echo '<input name="ObjectsGroup[ObjectGr_id]" id="ObjectsGroup_ObjectGr_id" type="text" style="display: none;" value="' . $model->ObjectGr_id . '"/>';
    echo '<input name="ObjectsGroup[Address_id]" id="ObjectsGroup_Address_id" type="text" style="display: none;" value="' . $model->Address_id . '"/>';
?>

<?php echo $form->labelEx($model,'PropForm_id'); ?>
<?php echo $form->dropDownList($model,'PropForm_id', OrganizationsV::all(), CMap::mergeArray(array('class'=>'form-control','empty'=>''), $readonly)); ?>
<?php echo $form->error($model,'PropForm_id'); ?>

<?php echo $form->labelEx($model,'LphName'); ?>
<?php echo $form->textField($model,'LphName', CMap::mergeArray(array('class'=>'form-control','disabled'=>'disabled'), $readonly)); ?>
<?php echo $form->error($model,'LphName'); ?>

<hr>

<?php echo $form->labelEx($model,'Address'); ?>
<?php echo $form->textField($model,'Address', CMap::mergeArray(array('class'=>'form-control',), $readonly)); ?>
<?php echo $form->error($model,'Address'); ?>

<?php echo $form->labelEx($model,'Street_id'); ?>
<?php echo $form->dropDownList($model,'Street_id', Streets::all(), CMap::mergeArray(array('class'=>'form-control','empty'=>''), $readonly)); ?>
<?php echo $form->error($model,'Street_id'); ?>

<?php echo $form->labelEx($model,'Area_id'); ?>
<?php echo $form->dropDownList($model,'Area_id', Areas::all(), CMap::mergeArray(array('class'=>'form-control','empty'=>''), $readonly)); ?>
<?php echo $form->error($model,'Area_id'); ?>

<hr>

<?php echo $form->labelEx($model,'Corp'); ?>
<?php echo $form->textField($model,'Corp', CMap::mergeArray(array('class'=>'form-control',), $readonly)); ?>
<?php echo $form->error($model,'Corp'); ?>

<?php echo $form->labelEx($model,'House'); ?>
<?php echo $form->textField($model,'House', CMap::mergeArray(array('class'=>'form-control',), $readonly)); ?>
<?php echo $form->error($model,'House'); ?>

<?php echo $form->labelEx($model,'Room'); ?>
<?php echo $form->textField($model,'Room', CMap::mergeArray(array('class'=>'form-control',), $readonly)); ?>
<?php echo $form->error($model,'Room'); ?>

<?php echo $form->labelEx($model,'Apartment'); ?>
<?php echo $form->textField($model,'Apartment', CMap::mergeArray(array('class'=>'form-control',), $readonly)); ?>
<?php echo $form->error($model,'Apartment'); ?>

<hr>
<?php echo $form->labelEx($model,'Floor'); ?>
<?php echo $form->textField($model,'Floor', CMap::mergeArray(array('class'=>'form-control',), $readonly)); ?>
<?php echo $form->error($model,'Floor'); ?>

<?php echo $form->labelEx($model,'Entrance'); ?>
<?php echo $form->textField($model,'Entrance', CMap::mergeArray(array('class'=>'form-control',), $readonly)); ?>
<?php echo $form->error($model,'Entrance'); ?>

<?php echo $form->labelEx($model,'YConstruction'); ?>
<?php echo $form->textField($model,'YConstruction', CMap::mergeArray(array('class'=>'form-control',), $readonly)); ?>
<?php echo $form->error($model,'YConstruction'); ?>

<hr>

<?php echo $form->labelEx($model,'CountPorch'); ?>
<?php echo $form->textField($model,'CountPorch', CMap::mergeArray(array('class'=>'form-control',), $readonly)); ?>
<?php echo $form->error($model,'CountPorch'); ?>


<hr>

<?php echo $form->labelEx($model,'PostalAddress'); ?>
<?php echo $form->textField($model,'PostalAddress', CMap::mergeArray(array('class'=>'form-control',), $readonly)); ?>
<?php echo $form->error($model,'PostalAddress'); ?>

<hr>

<?php echo $form->labelEx($model,'Refusers'); ?>
<?php echo $form->textArea($model,'Refusers', CMap::mergeArray(array('class'=>'form-control',), $readonly)); ?>
<?php echo $form->error($model,'Refusers'); ?>

<hr>

<?php echo $form->labelEx($model,'Note'); ?>
<?php echo $form->textArea($model,'Note', CMap::mergeArray(array('class'=>'form-control',), $readonly)); ?>
<?php echo $form->error($model,'Note'); ?>

<hr>

<?php echo $form->labelEx($model,'Information'); ?>
<?php echo $form->textArea($model,'Information', CMap::mergeArray(array('class'=>'form-control',), $readonly)); ?>
<?php echo $form->error($model,'Information'); ?>

<hr>

<?php echo $form->labelEx($model,'Srmg_id'); ?>
<?php echo $form->dropDownList($model,'Srmg_id', Employees::all(), CMap::mergeArray(array('class'=>'form-control','empty'=>''), $readonly)); ?>
<?php echo $form->error($model,'Srmg_id'); ?>

<hr>

<?php echo $form->labelEx($model,'Slmg_id'); ?>
<?php echo $form->dropDownList($model,'Slmg_id', Employees::all(), CMap::mergeArray(array('class'=>'form-control','empty'=>''), $readonly)); ?>
<?php echo $form->error($model,'Slmg_id'); ?>

<hr>

<?php echo $form->labelEx($model,'Inmg_id'); ?>
<?php echo $form->dropDownList($model,'Inmg_id', Employees::all(), CMap::mergeArray(array('class'=>'form-control','empty'=>''), $readonly)); ?>
<?php echo $form->error($model,'Inmg_id'); ?>

<hr>

<?php echo $form->labelEx($model,'clgr_id'); ?>
<?php echo $form->dropDownList($model,'clgr_id', ClientGroups::all(), CMap::mergeArray(array('class'=>'form-control','empty'=>''), $readonly)); ?>
<?php echo $form->error($model,'clgr_id'); ?>

<hr>
<?php echo $form->labelEx($model,'no_sms'); ?>
<?php echo $form->checkBox($model,'no_sms', CMap::mergeArray(array('class'=>'form-control',), $readonly)); ?>
<?php echo $form->error($model,'no_sms'); ?>

<br>




<?php
$this->widget('zii.widgets.jui.CJuiDatePicker',array(
    'name'=>'ObjectsGroup[Journal]',
    'id'=>'ObjectsGroup_Journal',
    'language'=>'ru',
    // additional javascript options for the date picker plugin
    'options'=>array(
        'showAnim'=>'fold',
    ),
    'htmlOptions'=>array(
        'class'=>'form-control',
        'style'=>'height:20px;'

        
    ),
));
?>
<br><br>

<?php
    
    if ($this->action->id === 'index')
        echo CHtml::submitButton('Изменить', array('class'=>'btn btn-primary',));
    if (($this->action->id === 'update') || ($this->action->id === 'save'))
        echo CHtml::submitButton('Сохранить', array('class'=>'btn btn-primary',));
    
?>

<?php $this->endWidget(); ?>

<div>
    

    


<?php


if ($this->action->id === 'index')
{
    
    
    
    echo 'Контактное лицо:';
    
    $this->widget('zii.widgets.grid.CGridView', array(
        'cssFile'=>'css/reference/gridview/styles.css',
        'enableSorting' => true,
	'pager'=>array('cssFile'=>'css/reference/gridview/pager.css', ),
        'htmlOptions'=>array('style'=>'width:1000px; float:none'),
	'tableWidth'=>'1024px',
        'tableHeight'=>'500px',
        'dataProvider'=>$dataProvider,
        'filter'=>$filtersForm,
            
        'columns' => array(
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
            array( 
                'name' => 'Update',
                'type'=> 'raw',
                'value'=> 'Yii::app()->controller->createUrl("ContactInfo/update", array("Info_id"=>$data["Info_id"]))', 
                'headerHtmlOptions'=>array('style'=>'width:0%; display:none'),
                'filterHtmlOptions'=>array('style'=>'width:0%; display:none'),
                'htmlOptions'=>array('style'=>'width:0%; display:none', 'id' => 'Update'),
            ), 
        ),
    ));
    
    $url =  Yii::app()->createUrl('ContactInfo/insert', array('ObjectGr_id' => $model->ObjectGr_id));
    
    echo '<a id="insert" href="'.$url.'">Создать</a>';
    echo ' ';
    echo '<a id="update" href="'.$url.'">Изменить</a>';
    
}
 
?>
</div>

<script>
$('body').on('click','.items tbody tr', function(){
	
	var link_u = $(this).find('td#Update').text();
	
        $('#update').attr('href', link_u);
        

});
</script>

