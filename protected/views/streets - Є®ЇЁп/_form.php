<?php
/* @var $this StreetsController */
/* @var $model Streets */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'streets-form',
	'htmlOptions'=>array(
		'class'=>'form-inline'
		),
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'Region_id'); ?>
		<?php echo $form->dropDownList(Regions::model(),'Region_id', Regions::all(), array('options'=>array(
																											$model->Region_id=>array('selected'=>'selected')),
																							'class'=>'form-control',
																											)); ?>
		<?php echo $form->error($model,'Region_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'StreetType_id'); ?>
		<?php echo $form->dropDownList(StreetTypes::model(),'StreetType_id', StreetTypes::all(), array('options'=>array(
																											$model->StreetType_id=>array('selected'=>'selected')),
																									'class'=>'form-control',
																											)); ?>
		<?php echo $form->error($model,'StreetType_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'StreetName'); ?>
		<?php echo $form->textField($model,'StreetName',array('size'=>60,'maxlength'=>100, 'class'=>'form-control')); ?>
		<?php echo $form->error($model,'StreetName'); ?>
	</div>

	<!-- <div class="row">
		<?php echo $form->labelEx($model,'user_change'); ?>
		<?php echo $form->textField($model,'user_change',array('size'=>5,'maxlength'=>5)); ?>
		<?php echo $form->error($model,'user_change'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'date_change'); ?>
		<?php echo $form->textField($model,'date_change'); ?>
		<?php echo $form->error($model,'date_change'); ?>
	</div>

	<div class="row">
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
		<?php echo $form->labelEx($model,'DelDate'); ?>
		<?php echo $form->textField($model,'DelDate'); ?>
		<?php echo $form->error($model,'DelDate'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'EmplDel'); ?>
		<?php echo $form->textField($model,'EmplDel'); ?>
		<?php echo $form->error($model,'EmplDel'); ?>
	</div> -->

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Создать' : 'Сохранить', array('class'=>'btn btn-primary')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->