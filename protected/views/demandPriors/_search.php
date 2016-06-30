<?php
/* @var $this DemandPriorsController */
/* @var $model DemandPriors */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'DemandPrior_id'); ?>
		<?php echo $form->textField($model,'DemandPrior_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'DemandPrior'); ?>
		<?php echo $form->textField($model,'DemandPrior',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ExceedType'); ?>
		<?php echo $form->textField($model,'ExceedType'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ExceedDays'); ?>
		<?php echo $form->textField($model,'ExceedDays'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'for_wh'); ?>
		<?php echo $form->checkBox($model,'for_wh'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Sort'); ?>
		<?php echo $form->textField($model,'Sort'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Malfunction_id'); ?>
		<?php echo $form->textField($model,'Malfunction_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'for_dd'); ?>
		<?php echo $form->checkBox($model,'for_dd'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'for_id'); ?>
		<?php echo $form->checkBox($model,'for_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'for_d'); ?>
		<?php echo $form->checkBox($model,'for_d'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'for_pd'); ?>
		<?php echo $form->checkBox($model,'for_pd'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'for_md'); ?>
		<?php echo $form->checkBox($model,'for_md'); ?>
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