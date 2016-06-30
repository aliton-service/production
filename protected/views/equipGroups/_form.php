<?php
/* @var $this EquipGroupsController */
/* @var $model EquipGroups */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'equip-groups-form',
	'htmlOptions'=>array(
		'class'=>'form-inline'
		),
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation' => true,
	'enableClientValidation' => true,
)); ?>

	<?php

	echo $form->labelEx($model,'name');
	$this->widget('application.extensions.alitonwidgets.edit.aledit', array(
		'id' => 'EquipGroupsName',
		'Width' => 250,
		'Value' => $model->name,
		'Type' => 'String',
		'Name' => 'EquipGroups[name]'
	));
	echo $form->error($model,'name');

	$this->widget('application.extensions.alitonwidgets.button.albutton', array(
		'id' => 'save-equipGr',
		'Height' => 30,
		'Text' => 'Сохранить',
		'Type' => 'none',
		'OnAfterClick' => 'saveEquipGr()'
	));
	?>



<!--	<p class="note">Fields with <span class="required">*</span> are required.</p>-->
<!---->
<!--	--><?php //echo $form->errorSummary($model); ?>
<!---->
<!--	<div class="row">-->
<!--		--><?php //echo $form->labelEx($model,'name'); ?>
<!--		--><?php //echo $form->textField($model,'name',array('class'=>'form-control','size'=>50,'maxlength'=>50)); ?>
<!--		--><?php //echo $form->error($model,'name'); ?>
<!--	</div>-->
<!--<!-- -->
<!--	<div class="row">-->
<!--		--><?php //echo $form->labelEx($model,'Lock'); ?>
<!--		--><?php //echo $form->checkBox($model,'Lock'); ?>
<!--		--><?php //echo $form->error($model,'Lock'); ?>
<!--	</div>-->
<!---->
<!--	<div class="row">-->
<!--		--><?php //echo $form->labelEx($model,'EmplLock'); ?>
<!--		--><?php //echo $form->textField($model,'EmplLock'); ?>
<!--		--><?php //echo $form->error($model,'EmplLock'); ?>
<!--	</div>-->
<!---->
<!--	<div class="row">-->
<!--		--><?php //echo $form->labelEx($model,'DateLock'); ?>
<!--		--><?php //echo $form->textField($model,'DateLock'); ?>
<!--		--><?php //echo $form->error($model,'DateLock'); ?>
<!--	</div>-->
<!---->
<!--	<div class="row">-->
<!--		--><?php //echo $form->labelEx($model,'EmplCreate'); ?>
<!--		--><?php //echo $form->textField($model,'EmplCreate'); ?>
<!--		--><?php //echo $form->error($model,'EmplCreate'); ?>
<!--	</div>-->
<!---->
<!--	<div class="row">-->
<!--		--><?php //echo $form->labelEx($model,'DateCreate'); ?>
<!--		--><?php //echo $form->textField($model,'DateCreate'); ?>
<!--		--><?php //echo $form->error($model,'DateCreate'); ?>
<!--	</div>-->
<!---->
<!--	<div class="row">-->
<!--		--><?php //echo $form->labelEx($model,'EmplChange'); ?>
<!--		--><?php //echo $form->textField($model,'EmplChange'); ?>
<!--		--><?php //echo $form->error($model,'EmplChange'); ?>
<!--	</div>-->
<!---->
<!--	<div class="row">-->
<!--		--><?php //echo $form->labelEx($model,'DateChange'); ?>
<!--		--><?php //echo $form->textField($model,'DateChange'); ?>
<!--		--><?php //echo $form->error($model,'DateChange'); ?>
<!--	</div>-->
<!---->
<!--	<div class="row">-->
<!--		--><?php //echo $form->labelEx($model,'EmplDel'); ?>
<!--		--><?php //echo $form->textField($model,'EmplDel'); ?>
<!--		--><?php //echo $form->error($model,'EmplDel'); ?>
<!--	</div>-->
<!---->
<!--	<div class="row">-->
<!--		--><?php //echo $form->labelEx($model,'DelDate'); ?>
<!--		--><?php //echo $form->textField($model,'DelDate'); ?>
<!--		--><?php //echo $form->error($model,'DelDate'); ?>
<!--	</div> -->
<!---->
<!--	<div class="row buttons">-->
<!--		--><?php //echo CHtml::submitButton($model->isNewRecord ? 'Создать' : 'Сохранить', array('class'=>'btn btn-primary')); ?>
<!--	</div>-->

<!--	<input type="submit" value="ok">-->

<?php $this->endWidget(); ?>

</div><!-- form -->