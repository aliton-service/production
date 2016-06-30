<?php
/* @var $this JuridicalsController */
/* @var $model Juridicals */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'Jrdc_Id'); ?>
		<?php echo $form->textField($model,'Jrdc_Id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'JuridicalPerson'); ?>
		<?php echo $form->textField($model,'JuridicalPerson',array('size'=>60,'maxlength'=>250)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Identification'); ?>
		<?php echo $form->textField($model,'Identification',array('size'=>60,'maxlength'=>500)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'jregion'); ?>
		<?php echo $form->textField($model,'jregion'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'jarea'); ?>
		<?php echo $form->textField($model,'jarea'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'jstreet'); ?>
		<?php echo $form->textField($model,'jstreet'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'jhouse'); ?>
		<?php echo $form->textField($model,'jhouse',array('size'=>55,'maxlength'=>55)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'jcorp'); ?>
		<?php echo $form->textField($model,'jcorp',array('size'=>15,'maxlength'=>15)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fregion'); ?>
		<?php echo $form->textField($model,'fregion'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'farea'); ?>
		<?php echo $form->textField($model,'farea'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fstreet'); ?>
		<?php echo $form->textField($model,'fstreet'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fhouse'); ?>
		<?php echo $form->textField($model,'fhouse',array('size'=>55,'maxlength'=>55)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fcorp'); ?>
		<?php echo $form->textField($model,'fcorp',array('size'=>15,'maxlength'=>15)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'inn'); ?>
		<?php echo $form->textField($model,'inn',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'kpp'); ?>
		<?php echo $form->textField($model,'kpp',array('size'=>9,'maxlength'=>9)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'account'); ?>
		<?php echo $form->textField($model,'account',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ogrn'); ?>
		<?php echo $form->textField($model,'ogrn',array('size'=>13,'maxlength'=>13)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'okpo'); ?>
		<?php echo $form->textField($model,'okpo',array('size'=>8,'maxlength'=>8)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'telephone'); ?>
		<?php echo $form->textField($model,'telephone',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'post_index'); ?>
		<?php echo $form->textField($model,'post_index',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'empl_id'); ?>
		<?php echo $form->textField($model,'empl_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'bank_id'); ?>
		<?php echo $form->textField($model,'bank_id'); ?>
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