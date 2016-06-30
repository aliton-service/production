<?php
/* @var $this EquipsController */
/* @var $model Equips */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'Equip_id'); ?>
		<?php echo $form->textField($model,'Equip_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'EquipName'); ?>
		<?php echo $form->textField($model,'EquipName',array('size'=>60,'maxlength'=>200)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'UnitMeasurement_Id'); ?>
		<?php echo $form->textField($model,'UnitMeasurement_Id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Supplier_id'); ?>
		<?php echo $form->textField($model,'Supplier_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Description'); ?>
		<?php echo $form->textField($model,'Description',array('size'=>60,'maxlength'=>1000)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'GroupGood_Id'); ?>
		<?php echo $form->textField($model,'GroupGood_Id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'SubGroupGood_Id'); ?>
		<?php echo $form->textField($model,'SubGroupGood_Id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'CategoryGood_Id'); ?>
		<?php echo $form->textField($model,'CategoryGood_Id',array('size'=>19,'maxlength'=>19)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'EquipImage'); ?>
		<?php echo $form->textField($model,'EquipImage',array('size'=>60,'maxlength'=>250)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'actp_id'); ?>
		<?php echo $form->textField($model,'actp_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ctgr_id'); ?>
		<?php echo $form->textField($model,'ctgr_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'grp_id'); ?>
		<?php echo $form->textField($model,'grp_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'sgrp_id'); ?>
		<?php echo $form->textField($model,'sgrp_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'discontinued'); ?>
		<?php echo $form->textField($model,'discontinued'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'SystemType_id'); ?>
		<?php echo $form->textField($model,'SystemType_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ServicingTime'); ?>
		<?php echo $form->textField($model,'ServicingTime'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'AddressSystem_id'); ?>
		<?php echo $form->textField($model,'AddressSystem_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'rate'); ?>
		<?php echo $form->textField($model,'rate',array('size'=>19,'maxlength'=>19)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'must_instruction'); ?>
		<?php echo $form->checkBox($model,'must_instruction'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'there_instruction'); ?>
		<?php echo $form->checkBox($model,'there_instruction'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'must_photo'); ?>
		<?php echo $form->checkBox($model,'must_photo'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'there_photo'); ?>
		<?php echo $form->checkBox($model,'there_photo'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'must_analog'); ?>
		<?php echo $form->checkBox($model,'must_analog'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'there_analog'); ?>
		<?php echo $form->checkBox($model,'there_analog'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'must_producer'); ?>
		<?php echo $form->checkBox($model,'must_producer'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'there_producer'); ?>
		<?php echo $form->checkBox($model,'there_producer'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'must_supplier'); ?>
		<?php echo $form->checkBox($model,'must_supplier'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'there_supplier'); ?>
		<?php echo $form->checkBox($model,'there_supplier'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'note'); ?>
		<?php echo $form->textField($model,'note',array('size'=>-1,'maxlength'=>-1)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'group_id'); ?>
		<?php echo $form->textField($model,'group_id'); ?>
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