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
<!--		--><?php //echo $form->labelEx($model,'Вид работ:'); ?>
<!--		--><?php //echo $form->textField($model,'wrtp_name'); ?>
<!--		--><?php //echo $form->error($model,'wrtp_name'); ?>

		<?php

		$this->widget('application.extensions.alitonwidgets.comboboxajax.alcomboboxajax', array(
			'id' => 'cmb-work-type',
			'FieldName' => 'name',
			'KeyField' => 'wrtp_id',
			'KeyValue' => $model->wrtp_name,


			'Name' => 'WHDocuments[wrtp_name]',
			'Columns' => array(
				'Address' => array(
					'Name' => 'Вид работ',
					'Fieldname' => 'name',
					'Width' => 300,
					'Height' => 23,
				),
			),

		));

//		$this->widget('application.extensions.alitonwidgets.combobox.alcombobox', array(
//			'id' => 'cmb-work-type',
//			'popupid' => 'cmb-work-type-grid',
//			'data' =>WorkTypes::getData(),
//			'label' => 'Вид работ',
//			'fieldname' => 'name',
//			'keyfield' => 'wrtp_id',
//			'keyvalue' => $model->wrtp_name,
//			'width' => -1,
//			'popupwidth' => 300,
//			'showcolumns' => true,
//			'name' => 'WHDocuments[wrtp_name]',
//			'columns' => array(
//				'Address' => array(
//					'name' => 'Вид работ',
//					'fieldname' => 'name',
//					'width' => 300,
//					'height' => 23,
//				),
//			),
//
//		));
		?>

		<?php echo $form->labelEx($model,'Срочность:'); ?>
		<?php echo $form->textField($model,'prty_name'); ?>
		<?php echo $form->error($model,'prty_name'); ?>

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

	<div>
		<div>
			Дата получения
		</div>
		<div>
			<?php echo $form->labelEx($model,'Желаемая:'); ?>
			<?php echo $form->textField($model,'best_date'); ?>
			<?php echo $form->error($model,'best_date'); ?>

			<?php echo $form->labelEx($model,'Предельная:'); ?>
			<?php echo $form->textField($model,'deadline'); ?>
			<?php echo $form->error($model,'deadline'); ?>

			<?php echo $form->labelEx($model,'Обещанная:'); ?>
			<?php echo $form->textField($model,'date_promise'); ?>
			<?php echo $form->error($model,'date_promise'); ?>
		</div>

	</div><hr>

	<div class="">
<!--		--><?php //echo $form->labelEx($model,'Адрес объекта:'); ?>
<!--		--><?php //echo $form->textField($model,'Address'); ?>
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
<!--		--><?php //echo $form->labelEx($model,'Основание:'); ?>
<!--		--><?php //echo $form->textField($model,'rcrs_name'); ?>
<!--		--><?php //echo $form->error($model,'rcrs_name'); ?>

		<?php
		$this->widget('application.extensions.alitonwidgets.combobox.alcombobox', array(
			'id' => 'cmb-receipt',
			'popupid' => 'cmb-receipt-grid',
			'data' =>ReceiptReasons::getData(),
			'label' => 'Основание',
			'fieldname' => 'name',
			'keyfield' => 'rcrs_id',
			'keyvalue' => $model->rcrs_id,
			'width' => -1,
			'popupwidth' => 300,
			'showcolumns' => true,
			'name' => 'WHDocuments[rcrs_id]',
			'columns' => array(
				'Address' => array(
					'name' => 'Основание',
					'fieldname' => 'name',
					'width' => 300,
					'height' => 23,
				),
			),

		));
		?>

		<?php echo $form->labelEx($model,'Дата:'); ?>
		<?php echo $form->textField($model,'ReceiptDate'); ?>
		<?php echo $form->error($model,'ReceiptDate'); ?>

		<?php echo $form->labelEx($model,'Номер:'); ?>
		<?php echo $form->textField($model,'ReceiptNumber'); ?>
		<?php echo $form->error($model,'ReceiptNumber'); ?>
	</div><hr>

	<div class="">
		<?php echo $form->labelEx($model,'Затребовал:'); ?>
		<?php echo $form->textField($model,'dmnd_empl_name'); ?>
		<?php echo $form->error($model,'dmnd_empl_name'); ?>

		<?php echo $form->labelEx($model,'Разрешил:'); ?>
		<?php echo $form->textField($model,'prms_empl_name'); ?>
		<?php echo $form->error($model,'prms_empl_name'); ?>
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