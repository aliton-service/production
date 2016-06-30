<script>
    
</script>

<?php 
    $form=$this->beginWidget('CActiveForm', array(
	'id'=>'Departments',
	'htmlOptions'=>array(
		'class'=>'form-inline'
		),
	'enableAjaxValidation'=>false,
    )); 
?>

<?php
    $this->widget('application.extensions.alitonwidgets.edit.aledit', array(
        'id' => 'edDep_id',
        'Width' => 100,
        'Type' => 'String',
        'Name' => 'Departments[Dep_id]',
        'Value' => $model->Dep_id,
        'ReadOnly' => true,
        'Visible' => false,
    ));
?>

<div style="float: left; width: 200px">Наименование отдела</div>
<div style="float: left; ">
<?php
    $this->widget('application.extensions.alitonwidgets.edit.aledit', array(
            'id' => 'edDepName',
            'Width' => 280,
            'Type' => 'String',
            'Value' => $model->DepName,
            'Name' => 'Departments[DepName]',
    ));
?>
</div>
<div><?php echo $form->error($model, 'DepName'); ?></div>
<div style="clear: both"></div>
<div style="float: left; margin-top: 6px;">
    <div style="float: left;">
        <?php
            $this->widget('application.extensions.alitonwidgets.button.albutton', array(
                'id' => 'SaveDepartment',
                'Width' => 124,
                'Height' => 30,
                'Text' => 'Сохранить',
                'FormName' => 'Departments',
                'Type' => 'Form',
            ));
        ?>
    </div> 
</div>
<?php $this->endWidget(); ?>





