<div class="form">

	<?php $form=$this->beginWidget('CActiveForm', array(
		'id'=>'bill-coming-form',
		'htmlOptions'=>array(
			'class'=>'form-inline'
		),
		'enableAjaxValidation'=>false,
	)); ?>

	<div class="">
<!--		--><?php //echo $form->labelEx($model,'Вид работ:'); ?>
<!--		--><?php //echo $form->textField($model,'wrtp_name'); ?>
<!--		--><?php //echo $form->error($model,'wrtp_name'); ?>

		<?php
		$this->widget('application.extensions.alitonwidgets.combobox.alcombobox', array(
			'id' => 'cmb-work-type',
			'popupid' => 'cmb-work-type-grid',
			'data' =>WorkTypes::getData(),
			'label' => 'Вид работ',
			'fieldname' => 'name',
			'keyfield' => 'wrtp_id',
			'keyvalue' => $model->wrtp_name,
			'width' => -1,
			'popupwidth' => 300,
			'showcolumns' => true,
			'name' => 'WHDocuments[wrtp_name]',
			'columns' => array(
				'Address' => array(
					'name' => 'Вид работ',
					'fieldname' => 'name',
					'width' => 300,
					'height' => 23,
				),
			),

		));
		?>
	</div><hr>

	<div class="">
<!--		--><?php //echo $form->labelEx($model,'Склад:'); ?>
<!--		--><?php //echo $form->textField($model,'storage'); ?>
<!--		--><?php //echo $form->error($model,'storage'); ?>

		<?php
		$this->widget('application.extensions.alitonwidgets.combobox.alcombobox', array(
			'id' => 'cmb-storage',
			'popupid' => 'cmb-storage-grid',
			'data' =>Storages::getData(),
			'label' => 'Склад',
			'fieldname' => 'storage',
			'keyfield' => 'storage_id',
			'keyvalue' => $model->storage,
			'width' => -1,
			'popupwidth' => 300,
			'showcolumns' => true,
			'name' => 'WHDocuments[storage]',
			'columns' => array(
				'Address' => array(
					'name' => 'Склад',
					'fieldname' => 'storage',
					'width' => 300,
					'height' => 23,
				),
			),

		));
		?>
	</div><hr>

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
<!--		--><?php //echo $form->labelEx($model,'Причина возврата:'); ?>
<!--		--><?php //echo $form->textField($model,'rtrs_name'); ?>
<!--		--><?php //echo $form->error($model,'rtrs_name'); ?>

		<?php
		$this->widget('application.extensions.alitonwidgets.combobox.alcombobox', array(
			'id' => 'cmb-return',
			'popupid' => 'cmb-return-grid',
			'data' =>ReturnReasons::getData(),
			'label' => 'Причина возврата',
			'fieldname' => 'name',
			'keyfield' => 'rtrs_id',
			'keyvalue' => $model->rtrs_name,
			'width' => -1,
			'popupwidth' => 300,
			'showcolumns' => true,
			'name' => 'WHDocuments[rtrs_name]',
			'columns' => array(
				'Address' => array(
					'name' => 'Причина возврата',
					'fieldname' => 'name',
					'width' => 300,
					'height' => 23,
				),
			),

		));
		?>
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