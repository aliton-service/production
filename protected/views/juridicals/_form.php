<?php
/* @var $this JuridicalsController */
/* @var $model Juridicals */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'juridicals-form',
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
		<?php echo $form->labelEx($model,'JuridicalPerson'); ?>
		<?php echo $form->textField($model,'JuridicalPerson',array('class'=>'form-control','size'=>60,'maxlength'=>250)); ?>
		<?php echo $form->error($model,'JuridicalPerson'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Identification'); ?>
		<?php echo $form->textField($model,'Identification',array('class'=>'form-control','size'=>60,'maxlength'=>500)); ?>
		<?php echo $form->error($model,'Identification'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'jregion'); ?>
		<?php echo $form->dropDownList($model,'jregion', Regions::all(), array('options'=>array(
																											$model->Region_id=>array('selected'=>'selected')),
																							'class'=>'form-control',
																											)); ?>
		<?php echo $form->error($model,'jregion'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'jarea'); ?>
		<?php echo $form->dropDownList($model,'jarea', Areas::all(), array('options'=>array(
																											$model->Region_id=>array('selected'=>'selected')),
																							'class'=>'form-control',
																											)); ?>
		<?php echo $form->error($model,'jarea'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'jstreet'); ?>
		<?php echo $form->dropDownList($model,'jstreet', Streets::all(), array('options'=>array(
																											$model->Region_id=>array('selected'=>'selected')),
																							'class'=>'form-control',
																											)); ?>
		<?php echo $form->error($model,'jstreet'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'jhouse'); ?>
		<?php echo $form->textField($model,'jhouse',array('class'=>'form-control','size'=>55,'maxlength'=>55)); ?>
		<?php echo $form->error($model,'jhouse'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'jcorp'); ?>
		<?php echo $form->textField($model,'jcorp',array('class'=>'form-control','size'=>15,'maxlength'=>15)); ?>
		<?php echo $form->error($model,'jcorp'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'fregion'); ?>
		<?php echo $form->dropDownList($model,'fregion', Regions::all(), array('options'=>array(
																											$model->freg_id=>array('selected'=>'selected')),
																							'class'=>'form-control',
																											)); ?>
		<?php echo $form->error($model,'fregion'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'farea'); ?>
		<?php echo $form->dropDownList($model,'farea', Areas::all(), array('options'=>array(
																											$model->Region_id=>array('selected'=>'selected')),
																							'class'=>'form-control',
																											)); ?>
		<?php echo $form->error($model,'farea'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'fstreet'); ?>
		<?php echo $form->dropDownList($model,'fstreet', Streets::all(), array('options'=>array(
																											$model->Region_id=>array('selected'=>'selected')),
																							'class'=>'form-control',
																											)); ?>
		<?php echo $form->error($model,'fstreet'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'fhouse'); ?>
		<?php echo $form->textField($model,'fhouse',array('class'=>'form-control','size'=>55,'maxlength'=>55)); ?>
		<?php echo $form->error($model,'fhouse'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'fcorp'); ?>
		<?php echo $form->textField($model,'fcorp',array('class'=>'form-control','size'=>15,'maxlength'=>15)); ?>
		<?php echo $form->error($model,'fcorp'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'inn'); ?>
		<?php echo $form->textField($model,'inn',array('class'=>'form-control','size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'inn'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'kpp'); ?>
		<?php echo $form->textField($model,'kpp',array('class'=>'form-control','size'=>9,'maxlength'=>9)); ?>
		<?php echo $form->error($model,'kpp'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'account'); ?>
		<?php echo $form->textField($model,'account',array('class'=>'form-control','size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'account'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ogrn'); ?>
		<?php echo $form->textField($model,'ogrn',array('class'=>'form-control','size'=>13,'maxlength'=>13)); ?>
		<?php echo $form->error($model,'ogrn'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'okpo'); ?>
		<?php echo $form->textField($model,'okpo',array('class'=>'form-control','size'=>8,'maxlength'=>8)); ?>
		<?php echo $form->error($model,'okpo'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'telephone'); ?>
		<?php echo $form->textField($model,'telephone',array('class'=>'form-control','size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'telephone'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'post_index'); ?>
		<?php echo $form->textField($model,'post_index',array('class'=>'form-control','size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'post_index'); ?>
	</div>

	<!-- <div class="row">
		<?php echo $form->labelEx($model,'empl_id'); ?>
		<?php echo $form->textField($model,'empl_id'); ?>
		<?php echo $form->error($model,'empl_id'); ?>
	</div> -->

	<div class="row">
		<?php echo $form->labelEx($model,'bank_id'); ?>
		<?php echo $form->textField($model,'bank_id'); ?>
		<?php echo $form->error($model,'bank_id'); ?>
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
	</div>
 -->
	<div class="row buttons">
		<?php echo CHtml::submitButton('Сохранить', array('class'=>'btn btn-primary')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->