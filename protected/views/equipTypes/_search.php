<?php
/* @var $this EquipTypesController */
/* @var $model EquipTypes */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'EquipType_id'); ?>
		<?php echo $form->textField($model,'EquipType_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'EquipType'); ?>
		<?php echo $form->textField($model,'EquipType',array('size'=>60,'maxlength'=>150)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'SystemType_id'); ?>
		<?php echo $form->textField($model,'SystemType_id'); ?>
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
		<?php echo $form->label($model,'EmplCreate'); ?>
		<?php echo $form->textField($model,'EmplCreate'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'DateCreate'); ?>
		<?php echo $form->textField($model,'DateCreate'); ?>
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