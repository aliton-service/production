<div class="form">

	<?php $form=$this->beginWidget('CActiveForm', array(
		'id'=>'bill-coming-form',
		'htmlOptions'=>array(
			'class'=>'form-inline'
		),
		'enableAjaxValidation'=>false,
	)); ?>

	<div class="">
		<?php echo $form->labelEx($model,'Номер:'); ?>
		<?php echo $form->textField($model,'number'); ?>
		<?php echo $form->error($model,'number'); ?>

		<?php echo $form->labelEx($model,'Дата:'); ?>
		<?php echo $form->textField($model,'date'); ?>
		<?php echo $form->error($model,'date'); ?>
	</div><hr>

	<div class="">
<!--		--><?php //echo $form->labelEx($model,'Адрес объекта:'); ?>
<!--		--><?php //echo $form->textArea($model,'Address'); ?>
<!--		--><?php //echo $form->error($model,'Address'); ?>
		<?php
		$AddressList = new AddressList();
		$AddressList = $AddressList->Find(array());
		$this->widget('application.extensions.alitonwidgets.combobox.alcombobox', array(
			'id' => 'cmbAddress',
			'popupid' => 'cmbAddressgrid',
			'data' => $AddressList,
			'label' => 'Адрес объекта',
			'fieldname' => 'Addr',
			'keyfield' => 'Object_id',
			'width' => -1,
			'popupwidth' => 300,
			'showcolumns' => true,
			'columns' => array(
				'Address' => array(
					'name' => 'Адрес',
					'fieldname' => 'Addr',
					'width' => 300,
					'height' => 23,
				),
			),

		));
		?>
	</div><hr>

	<div class="">
		<?php echo $form->labelEx($model,'Мастер:'); ?>
		<?php echo $form->textField($model,'dmnd_empl_name'); ?>
		<?php echo $form->error($model,'dmnd_empl_name'); ?>
	</div><hr>

	<div class="">
		<?php echo $form->labelEx($model,'Выписал:'); ?>
		<?php echo $form->textField($model,'empl_name'); ?>
		<?php echo $form->error($model,'empl_name'); ?>
	</div><hr>

	<div class="">
		<?php echo $form->labelEx($model,'Примечание:'); ?>
		<?php echo $form->textArea($model,'notes'); ?>
		<?php echo $form->error($model,'notes'); ?>
	</div><hr>

	<div class="buttons">
		<?php echo CHtml::submitButton('Сохранить'); ?>
	</div>

	<?php $this->endWidget(); ?>

</div>