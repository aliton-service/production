<?php
/* @var $this DemandPriorsController */
/* @var $model DemandPriors */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'demand-priors-form',
	'htmlOptions'=>array(
		'class'=>'form-inline'
		),
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>true,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'DemandPrior'); ?>
		<?php echo $form->textField($model,'DemandPrior',array('class'=>'form-control','size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'DemandPrior'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ExceedType'); ?>
		<?php echo $form->textField($model,'ExceedType'); ?>
		<?php echo $form->error($model,'ExceedType'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ExceedDays'); ?>
		<?php echo $form->textField($model,'ExceedDays'); ?>
		<?php echo $form->error($model,'ExceedDays'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'for_wh'); ?>
		<?php echo $form->checkBox($model,'for_wh'); ?>
		<?php echo $form->error($model,'for_wh'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Sort'); ?>
		<?php echo $form->textField($model,'Sort'); ?>
		<?php echo $form->error($model,'Sort'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Malfunction_id'); ?>
		<?php echo $form->textField($model,'Malfunction_id'); ?>
		<?php echo $form->error($model,'Malfunction_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'for_dd'); ?>
		<?php echo $form->checkBox($model,'for_dd'); ?>
		<?php echo $form->error($model,'for_dd'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'for_id'); ?>
		<?php echo $form->checkBox($model,'for_id'); ?>
		<?php echo $form->error($model,'for_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'for_d'); ?>
		<?php echo $form->checkBox($model,'for_d'); ?>
		<?php echo $form->error($model,'for_d'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'for_pd'); ?>
		<?php echo $form->checkBox($model,'for_pd'); ?>
		<?php echo $form->error($model,'for_pd'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'for_md'); ?>
		<?php echo $form->checkBox($model,'for_md'); ?>
		<?php echo $form->error($model,'for_md'); ?>
	</div>

	<!-- <div class="row">
		<?php echo $form->labelEx($model,'Lock'); ?>
		<?php echo $form->checkBox($model,'Lock'); ?>
		<?php echo $form->error($model,'Lock'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'EmplLock'); ?>
		<?php echo $form->textField($model,'EmplLock'); ?>
		<?php echo $form->error($model,'EmplLock'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'DateLock'); ?>
		<?php echo $form->textField($model,'DateLock'); ?>
		<?php echo $form->error($model,'DateLock'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'EmplChange'); ?>
		<?php echo $form->textField($model,'EmplChange'); ?>
		<?php echo $form->error($model,'EmplChange'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'DateChange'); ?>
		<?php echo $form->textField($model,'DateChange'); ?>
		<?php echo $form->error($model,'DateChange'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'EmplDel'); ?>
		<?php echo $form->textField($model,'EmplDel'); ?>
		<?php echo $form->error($model,'EmplDel'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'DelDate'); ?>
		<?php echo $form->textField($model,'DelDate'); ?>
		<?php echo $form->error($model,'DelDate'); ?>
	</div>
 -->
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Создать' : 'Сохранить', array('class'=>'btn btn-primary')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->