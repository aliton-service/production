<script>
    
</script>

<?php 
    $form=$this->beginWidget('CActiveForm', array(
	'id'=>'Positions',
	'htmlOptions'=>array(
		'class'=>'form-inline'
		),
	'enableAjaxValidation'=>false,
    )); 
?>

<?php
    $this->widget('application.extensions.alitonwidgets.edit.aledit', array(
        'id' => 'edPosition_id',
        'Width' => 100,
        'Type' => 'String',
        'Name' => 'Positions[Position_id]',
        'Value' => $model->Position_id,
        'ReadOnly' => true,
        'Visible' => false,
    ));
?>

<div style="float: left; width: 200px">Наименование должности</div>
<div style="float: left; ">
<?php
    $this->widget('application.extensions.alitonwidgets.edit.aledit', array(
            'id' => 'edPositionName',
            'Width' => 280,
            'Type' => 'String',
            'Value' => $model->PositionName,
            'Name' => 'Positions[PositionName]',
    ));
?>
</div>
<div><?php echo $form->error($model, 'PositionName'); ?></div>
<div style="clear: both"></div>
<div style="float: left; margin-top: 6px;">
    <div style="float: left;">
        <?php
            $this->widget('application.extensions.alitonwidgets.button.albutton', array(
                'id' => 'SavePosition',
                'Width' => 124,
                'Height' => 30,
                'Text' => 'Сохранить',
                'FormName' => 'Positions',
                'Type' => 'Form',
            ));
        ?>
    </div> 
</div>
<?php $this->endWidget(); ?>



