<?php
/* @var $this BanksController */
/* @var $model Banks */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'banks-form',
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
	echo $form->labelEx($model,'bank_name');
	$this->widget('application.extensions.alitonwidgets.edit.aledit', array(
		'id' => 'bankName',
		'Width' => 250,
		'Value' => $model->bank_name,
		'Type' => 'String',
		'Name' => 'Banks[bank_name]'
	));
	echo $form->error($model,'bank_name');

	echo $form->labelEx($model,'cor_account');
	$this->widget('application.extensions.alitonwidgets.edit.aledit', array(
		'id' => 'corAccount',
		'Width' => 250,
		'Value' => $model->cor_account,
		'Type' => 'String',
		'Name' => 'Banks[cor_account]'
	));
	echo $form->error($model,'cor_account');

	echo $form->labelEx($model,'bik');
	$this->widget('application.extensions.alitonwidgets.edit.aledit', array(
		'id' => 'bik',
		'Width' => 250,
		'Value' => $model->bik,
		'Type' => 'String',
		'Name' => 'Banks[bik]'
	));
	echo $form->error($model,'bik');

	echo $form->labelEx($model,'City');
	$this->widget('application.extensions.alitonwidgets.edit.aledit', array(
		'id' => 'city',
		'Width' => 250,
		'Value' => $model->City,
		'Type' => 'String',
		'Name' => 'Banks[City]'
	));
	echo $form->error($model,'City');

	echo $form->labelEx($model,'Department');
	$this->widget('application.extensions.alitonwidgets.edit.aledit', array(
		'id' => 'department',
		'Width' => 250,
		'Value' => $model->Department,
		'Type' => 'String',
		'Name' => 'Banks[Department]'
	));
	echo $form->error($model,'Department');

//	$this->widget('application.extensions.alitonwidgets.button.albutton', array(
//		'id' => 'save-pricemonitoring',
//		'Height' => 30,
//		'Text' => 'Сохранить',
//		'Type' => 'none',
//
//	));
	?>
<input type="submit" value="Сохранить" style="margin-top: 10px;">



<!--	<p class="note">Fields with <span class="required">*</span> are required.</p>-->
<!---->
<!--	--><?php //echo $form->errorSummary($model); ?>
<!---->
<!--	<div class="row">-->
<!--		--><?php //echo $form->labelEx($model,'bank_name'); ?>
<!--		--><?php //echo $form->textField($model,'bank_name',array('class'=>'form-control','size'=>60,'maxlength'=>150)); ?>
<!--		--><?php //echo $form->error($model,'bank_name'); ?>
<!--	</div>-->
<!---->
<!--	<div class="row">-->
<!--		--><?php //echo $form->labelEx($model,'cor_account'); ?>
<!--		--><?php //echo $form->textField($model,'cor_account',array('class'=>'form-control','size'=>50,'maxlength'=>50)); ?>
<!--		--><?php //echo $form->error($model,'cor_account'); ?>
<!--	</div>-->
<!---->
<!--	<div class="row">-->
<!--		--><?php //echo $form->labelEx($model,'bik'); ?>
<!--		--><?php //echo $form->textField($model,'bik',array('class'=>'form-control','size'=>50,'maxlength'=>50)); ?>
<!--		--><?php //echo $form->error($model,'bik'); ?>
<!--	</div>-->
<!---->
<!--	<div class="row">-->
<!--		--><?php //echo $form->labelEx($model,'City'); ?>
<!--		--><?php //echo $form->textField($model,'City',array('class'=>'form-control','size'=>60,'maxlength'=>100)); ?>
<!--		--><?php //echo $form->error($model,'City'); ?>
<!--	</div>-->
<!---->
<!--	<div class="row">-->
<!--		--><?php //echo $form->labelEx($model,'Department'); ?>
<!--		--><?php //echo $form->textField($model,'Department',array('class'=>'form-control','size'=>60,'maxlength'=>250)); ?>
<!--		--><?php //echo $form->error($model,'Department'); ?>
<!--	</div>-->
<!---->
<!--	<div class="row">-->
<!--		--><?php //echo $form->labelEx($model,'Status'); ?>
<!--		--><?php //echo $form->checkBox($model,'Status',array('class'=>'form-control')); ?>
<!--		--><?php //echo $form->error($model,'Status'); ?>
<!--	</div>-->
<!---->
<!--	<div class="row">-->
<!--		--><?php //echo $form->labelEx($model,'DateCreate'); ?>
<!--		--><?php //echo $form->textField($model,'DateCreate'); ?>
<!--		--><?php //echo $form->error($model,'DateCreate'); ?>
<!--	</div>-->
<!---->
<!--	<div class="row">-->
<!--		--><?php //echo $form->labelEx($model,'UserCreate'); ?>
<!--		--><?php //echo $form->textField($model,'UserCreate',array('size'=>50,'maxlength'=>50)); ?>
<!--		--><?php //echo $form->error($model,'UserCreate'); ?>
<!--	</div>-->
<!---->
<!--	<div class="row">-->
<!--		--><?php //echo $form->labelEx($model,'DateChange'); ?>
<!--		--><?php //echo $form->textField($model,'DateChange'); ?>
<!--		--><?php //echo $form->error($model,'DateChange'); ?>
<!--	</div>-->
<!---->
<!--	<div class="row">-->
<!--		--><?php //echo $form->labelEx($model,'EmplChange'); ?>
<!--		--><?php //echo $form->textField($model,'EmplChange',array('size'=>50,'maxlength'=>50)); ?>
<!--		--><?php //echo $form->error($model,'EmplChange'); ?>
<!--	</div>-->
<!---->
<!--	<div class="row">-->
<!--		--><?php //echo $form->labelEx($model,'DelDate'); ?>
<!--		--><?php //echo $form->textField($model,'DelDate'); ?>
<!--		--><?php //echo $form->error($model,'DelDate'); ?>
<!--	</div>-->
<!---->
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
<!--		--><?php //echo $form->labelEx($model,'EmplDel'); ?>
<!--		--><?php //echo $form->textField($model,'EmplDel'); ?>
<!--		--><?php //echo $form->error($model,'EmplDel'); ?>
<!--	</div>-->
<!---->
<!--	<div class="row buttons">-->
<!--		--><?php //echo CHtml::submitButton($model->isNewRecord ? 'Создать' : 'Сохранить', array('class'=>'btn btn-primary')); ?>
<!--	</div>-->

<?php $this->endWidget(); ?>

</div><!-- form -->