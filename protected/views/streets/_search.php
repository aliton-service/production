<?php
/* @var $this StreetsController */
/* @var $model Streets */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'Street_id'); ?>
		<?php echo $form->textField($model,'Street_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Region_id'); ?>
		<?php echo $form->textField($model,'Region_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'StreetType_id'); ?>
		<?php echo $form->textField($model,'StreetType_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'StreetName'); ?>
		<?php echo $form->textField($model,'StreetName',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'user_change'); ?>
		<?php echo $form->textField($model,'user_change',array('size'=>5,'maxlength'=>5)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'date_change'); ?>
		<?php echo $form->textField($model,'date_change'); ?>
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
		<?php echo $form->label($model,'DelDate'); ?>
		<?php echo $form->textField($model,'DelDate'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'EmplDel'); ?>
		<?php echo $form->textField($model,'EmplDel'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->