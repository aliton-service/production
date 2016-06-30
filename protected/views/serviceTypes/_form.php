<script>
    
</script>

<?php 
    $form=$this->beginWidget('CActiveForm', array(
	'id'=>'ServiceTypes',
	'htmlOptions'=>array(
		'class'=>'form-inline'
		),
	'enableAjaxValidation'=>false,
    )); 
?>

<?php
    $this->widget('application.extensions.alitonwidgets.edit.aledit', array(
        'id' => 'edServiceType_id',
        'Width' => 100,
        'Type' => 'String',
        'Name' => 'ServiceTypes[ServiceType_id]',
        'Value' => $model->ServiceType_id,
        'ReadOnly' => true,
        'Visible' => false,
    ));
?>

<div style="float: left; width: 200px">Наименование тарифа</div>
<div style="float: left; ">
<?php
    $this->widget('application.extensions.alitonwidgets.edit.aledit', array(
            'id' => 'edServiceTyper',
            'Width' => 280,
            'Type' => 'String',
            'Value' => $model->ServiceType,
            'Name' => 'ServiceTypes[ServiceType]',
    ));
?>
</div>
<div><?php echo $form->error($model, 'ServiceType'); ?></div>
<div style="clear: both"></div>
<div style="float: left; margin-top: 6px;">
    <div style="float: left;">
        <?php
            $this->widget('application.extensions.alitonwidgets.button.albutton', array(
                'id' => 'SaveServiceType',
                'Width' => 124,
                'Height' => 30,
                'Text' => 'Сохранить',
                'FormName' => 'ServiceTypes',
                'Type' => 'Form',
            ));
        ?>
    </div> 
</div>
<?php $this->endWidget(); ?>

