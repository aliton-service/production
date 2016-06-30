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
<!--		--><?php //echo $form->labelEx($model,'Поставщик:'); ?>
<!--		--><?php //echo $form->textField($model,'splr_name'); ?>
<!--		--><?php //echo $form->error($model,'splr_name'); ?>

		<?php
		$this->widget('application.extensions.alitonwidgets.combobox.alcombobox', array(
			'id' => 'cmb-supplier',
			'popupid' => 'cmb-supplier-grid',
			'data' =>Suppliers::getData(),
			'label' => 'Поставщик',
			'fieldname' => 'NameSupplier',
			'keyfield' => 'Supplier_id',
			'keyvalue' => $model->splr_name,
			'width' => -1,
			'popupwidth' => 300,
			'showcolumns' => true,
			'name' => 'WHDocuments[splr_name]',
			'columns' => array(
				'Address' => array(
					'name' => 'Поставщик',
					'fieldname' => 'NameSupplier',
					'width' => 300,
					'height' => 23,
				),
			),

		));
		?>
	</div><hr>

	<div class="">
<!--		--><?php //echo $form->labelEx($model,'Вид документа:'); ?>
<!--		--><?php //echo $form->textField($model,'dckn_name'); ?>
<!--		--><?php //echo $form->error($model,'dckn_name'); ?>

		<?php
		$this->widget('application.extensions.alitonwidgets.combobox.alcombobox', array(
			'id' => 'cmb-dckn',
			'popupid' => 'cmb-dckn-grid',
			'data' =>WHDocKinds::getData(),
			'label' => 'Вид документа',
			'fieldname' => 'name',
			'keyfield' => 'dckn_id',
			'keyvalue' => $model->dckn_name,
			'width' => -1,
			'popupwidth' => 300,
			'showcolumns' => true,
			'name' => 'WHDocuments[dckn_name]',
			'columns' => array(
				'Address' => array(
					'name' => 'Вид документа',
					'fieldname' => 'name',
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
		<?php echo $form->textField($model,'in_date'); ?>
		<?php echo $form->error($model,'in_date'); ?>
	</div><hr>

	<div>
		<?php
		$this->widget('application.extensions.alitonwidgets.combobox.alcombobox', array(
			'id' => 'cmb-juric',
			'popupid' => 'cmb-juric-grid',
			'data' =>Juridicals::getData(),
			'label' => 'Юр. лицо',
			'fieldname' => 'JuridicalPerson',
			'keyfield' => 'Jrdc_id',
			'keyvalue' => $model->jrdc_id,
			'width' => -1,
			'popupwidth' => 300,
			'showcolumns' => true,
			'name' => 'WHDocuments[jrdc_id]',
			'columns' => array(
				'Address' => array(
					'name' => 'Юр. лицо',
					'fieldname' => 'JuridicalPerson',
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