<?php
/* @var $this PropFormsController */
/* @var $model PropForms */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'Form_id'); ?>
		<?php echo $form->textField($model,'Form_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'FormName'); ?>
		<?php echo $form->textField($model,'FormName',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fown_id'); ?>
		<?php echo $form->textField($model,'fown_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'lph_id'); ?>
		<?php echo $form->textField($model,'lph_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'TaxNumber'); ?>
		<?php echo $form->textField($model,'TaxNumber',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'SettlementAccount'); ?>
		<?php echo $form->textField($model,'SettlementAccount',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'City'); ?>
		<?php echo $form->textField($model,'City',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'bank_id'); ?>
		<?php echo $form->textField($model,'bank_id'); ?>
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
		<?php echo $form->textField($model,'jhouse',array('size'=>15,'maxlength'=>15)); ?>
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
		<?php echo $form->textField($model,'fhouse',array('size'=>15,'maxlength'=>15)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fcorp'); ?>
		<?php echo $form->textField($model,'fcorp',array('size'=>15,'maxlength'=>15)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'inn'); ?>
		<?php echo $form->textField($model,'inn',array('size'=>12,'maxlength'=>12)); ?>
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
		<?php echo $form->label($model,'telephone'); ?>
		<?php echo $form->textField($model,'telephone',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'post_index'); ?>
		<?php echo $form->textField($model,'post_index',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'region_name'); ?>
		<?php echo $form->textField($model,'region_name',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'froom'); ?>
		<?php echo $form->textField($model,'froom',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'jroom'); ?>
		<?php echo $form->textField($model,'jroom',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'DEBT'); ?>
		<?php echo $form->textField($model,'DEBT',array('size'=>19,'maxlength'=>19)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'VIP'); ?>
		<?php echo $form->checkBox($model,'VIP'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'sum_price'); ?>
		<?php echo $form->textField($model,'sum_price'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'sum_appz_price'); ?>
		<?php echo $form->textField($model,'sum_appz_price'); ?>
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