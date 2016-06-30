<?php
/* @var $this EquipsHistoryController */
/* @var $model EquipsHistory */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'eqhs_id'); ?>
		<?php echo $form->textField($model,'eqhs_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'equip_id'); ?>
		<?php echo $form->textField($model,'equip_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'achs_id'); ?>
		<?php echo $form->textField($model,'achs_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ac_date'); ?>
		<?php echo $form->textField($model,'ac_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'objc_id'); ?>
		<?php echo $form->textField($model,'objc_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'docm_id'); ?>
		<?php echo $form->textField($model,'docm_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'dctp_id'); ?>
		<?php echo $form->textField($model,'dctp_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'quant'); ?>
		<?php echo $form->textField($model,'quant'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'used'); ?>
		<?php echo $form->checkBox($model,'used'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'mstr_id'); ?>
		<?php echo $form->textField($model,'mstr_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'direct'); ?>
		<?php echo $form->textField($model,'direct'); ?>
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