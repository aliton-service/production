<?php
/**
 *
 * @var \Categories $model
 */
?>
<div class="form">

	<?php $form=$this->beginWidget('CActiveForm', array(
		'id'=>'banks-form',
		'htmlOptions'=>array(
			'class'=>'form-inline'
		),
		// Please note: When you enable ajax validation, make sure the corresponding
		// controller action is handling ajax validation correctly.
		// There is a call to performAjaxValidation() commented in generated controller code.
		// See class documentation of CActiveForm for details on this.
		'enableAjaxValidation' => true,
		'enableClientValidation' => true,
	));

	echo $form->labelEx($model,'name');
	$this->widget('application.extensions.alitonwidgets.edit.aledit', array(
		'id' => 'CategoriesName',
		'Width' => 250,
		'Value' => $model->name,
		'Type' => 'String',
		'Name' => 'Categories[name]'
	));
	echo $form->error($model,'name');
	?>

	<div class="pull-left"><?php echo $form->labelEx($model,'ForPrice');?></div>
	<div class="pull-left"><?php
	$this->widget('application.extensions.alitonwidgets.checkbox.alcheckbox', array(
		'id' => 'Edit1',
		'Width' => 200,
		'Name' => 'Categories[ForPrice]',
		'Checked' => $model->ForPrice,
	));
	?></div>
	<?php echo $form->error($model,'ForPrice'); ?>

	<div class="pull-left"><?php echo $form->labelEx($model,'ForObject');?></div>
	<div class="pull-left"><?php
	$this->widget('application.extensions.alitonwidgets.checkbox.alcheckbox', array(
		'id' => 'Edit2',
		'Width' => 200,
		'Name' => 'Categories[ForObject]',
		'Checked' => $model->ForObject,
	));
	?></div>
	<?php echo $form->error($model,'ForObject'); ?>

	<div class="pull-left"><?php echo $form->labelEx($model,'ForTreb');?></div>
	<div class="pull-left"><?php
	$this->widget('application.extensions.alitonwidgets.checkbox.alcheckbox', array(
		'id' => 'Edit3',
		'Width' => 200,
		'Name' => 'Categories[ForTreb]',
		'Checked' => $model->ForTreb,
	));
	?></div>
	<?php echo $form->error($model,'ForTreb'); ?>

	<div class="pull-left"><?php echo $form->labelEx($model,'ForCostCalc');?></div>
	<div class="pull-left"><?php
	$this->widget('application.extensions.alitonwidgets.checkbox.alcheckbox', array(
		'id' => 'Edit4',
		'Width' => 200,
		'Name' => 'Categories[ForCostCalc]',
		'Checked' => $model->ForCostCalc,
	));
	?></div>
	<?php echo $form->error($model,'ForCostCalc'); ?>
	<div class="clearfix"></div>

	<input type="submit" value="Сохранить">
	<?php $this->endWidget(); ?>
</div>
