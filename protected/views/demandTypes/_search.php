<?php
/* @var $this DemandTypesController */
/* @var $model DemandTypes */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'DemandType_id'); ?>
		<?php echo $form->textField($model,'DemandType_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'DemandType'); ?>
		<?php echo $form->textField($model,'DemandType',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Visible'); ?>
		<?php echo $form->checkBox($model,'Visible'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Sort'); ?>
		<?php echo $form->textField($model,'Sort'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'dd'); ?>
		<?php echo $form->checkBox($model,'dd'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id'); ?>
		<?php echo $form->checkBox($model,'id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'d'); ?>
		<?php echo $form->checkBox($model,'d'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Lock'); ?>
		<?php echo $form->checkBox($model,'Lock'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'EmplLock'); ?>
		<?php echo $form->textField($model,'EmplLock'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'DateLock'); ?>
		<?php echo $form->textField($model,'DateLock'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'EmplChange'); ?>
		<?php echo $form->textField($model,'EmplChange'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'DateChange'); ?>
		<?php echo $form->textField($model,'DateChange'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'EmplDel'); ?>
		<?php echo $form->textField($model,'EmplDel'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'DelDate'); ?>
		<?php echo $form->textField($model,'DelDate'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->