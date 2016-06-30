<div class="form">

	<?php $form=$this->beginWidget('CActiveForm', array(
		'id'=>'bill-coming-form',
		'htmlOptions'=>array(
			'class'=>'form-inline'
		),
		'enableAjaxValidation'=>false,
	)); ?>

	<div class="">
<!--		--><?php //echo $form->labelEx($model,'Склад источник:'); ?>
<!--		--><?php //echo $form->textField($model,'storage'); ?>
<!--		--><?php //echo $form->error($model,'storage'); ?>
<!---->
<!--		--><?php //echo $form->labelEx($model,'Склад приемник:'); ?>
<!--		--><?php //echo $form->textField($model,'in_storage'); ?>
<!--		--><?php //echo $form->error($model,'in_storage'); ?>

		<?php
		$this->widget('application.extensions.alitonwidgets.combobox.alcombobox', array(
			'id' => 'cmb-storage',
			'popupid' => 'cmb-storage-grid',
			'data' =>Storages::getData(),
			'label' => 'Склад источник',
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

		<?php
		$this->widget('application.extensions.alitonwidgets.combobox.alcombobox', array(
			'id' => 'cmb-storage',
			'popupid' => 'cmb-storage-grid',
			'data' =>Storages::getData(),
			'label' => 'Склад приемник',
			'fieldname' => 'storage',
			'keyfield' => 'storage_id',
			'keyvalue' => $model->in_storage,
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
		<?php echo $form->labelEx($model,'Примечание:'); ?>
		<?php echo $form->textArea($model,'notes'); ?>
		<?php echo $form->error($model,'notes'); ?>
	</div><hr>

	<div class="buttons">
		<?php echo CHtml::submitButton('Сохранить'); ?>
	</div>

	<?php $this->endWidget(); ?>

</div>