<?php
/* @var $this EquipRateDetailsController */
/* @var $model EquipRateDetails */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'equip-rate-details-form',
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

	<!-- <div class="row">
		<?php echo $form->labelEx($model,'eqrt_id'); ?>
		<?php echo $form->textField($model,'eqrt_id'); ?>
		<?php echo $form->error($model,'eqrt_id'); ?>
	</div>
 -->
	<div class="row">
		<?php echo $form->labelEx($model,'eqip_id'); ?>
		<?php echo $form->textField($model,'eqip_id',array('class'=>'form-control',)); ?>
		<?php echo $form->error($model,'eqip_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'eqip_quant'); ?>
		<?php echo $form->textField($model,'eqip_quant',array('class'=>'form-control',)); ?>
		<?php echo $form->error($model,'eqip_quant'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'price'); ?>
		<?php echo $form->textField($model,'price',array('class'=>'form-control','size'=>19,'maxlength'=>19)); ?>
		<?php echo $form->error($model,'price'); ?>
	</div>
<!-- 
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
		<?php echo $form->labelEx($model,'EmplCreate'); ?>
		<?php echo $form->textField($model,'EmplCreate'); ?>
		<?php echo $form->error($model,'EmplCreate'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'DateCreate'); ?>
		<?php echo $form->textField($model,'DateCreate'); ?>
		<?php echo $form->error($model,'DateCreate'); ?>
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