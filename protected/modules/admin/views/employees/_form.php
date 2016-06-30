<?php
/* @var $this EmployeesController */
/* @var $model Employees */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'employees-form',
        'action'=> Yii::app()->createUrl('admin/employees/save').'&id='.$model->Employee_id,
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'EmployeeName'); ?>
		<?php echo $form->textField($model,'EmployeeName',array('size'=>60,'maxlength'=>80)); ?>
		<?php echo $form->error($model,'EmployeeName'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Alias'); ?>
		<?php echo $form->textField($model,'Alias',array('size'=>25,'maxlength'=>25)); ?>
		<?php echo $form->error($model,'Alias'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'RemoteAlias'); ?>
		<?php echo $form->textField($model,'RemoteAlias',array('size'=>25,'maxlength'=>25)); ?>
		<?php echo $form->error($model,'RemoteAlias'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'DateCreate'); ?>
		<?php echo $form->textField($model,'DateCreate'); ?>
		<?php echo $form->error($model,'DateCreate'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'EmplCreate'); ?>
		<?php echo $form->textField($model,'EmplCreate'); ?>
		<?php echo $form->error($model,'EmplCreate'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Role_id'); ?>
		<?php echo $form->textField($model,'Role_id'); ?>
		<?php echo $form->error($model,'Role_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'DateChange'); ?>
		<?php echo $form->textField($model,'DateChange'); ?>
		<?php echo $form->error($model,'DateChange'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'EmplChange'); ?>
		<?php echo $form->textField($model,'EmplChange'); ?>
		<?php echo $form->error($model,'EmplChange'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Banned'); ?>
		<?php echo $form->textField($model,'Banned'); ?>
		<?php echo $form->error($model,'Banned'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); 
                      echo CHtml::submitButton('Отмена', array('submit'=>Yii::app()->createUrl('admin/employees/cancel', array('id'=>$model->Employee_id))));
                ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->