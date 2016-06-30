<?php
$form = $this->beginWidget('CActiveForm', array(
	'id' => 'form-pm',
	'htmlOptions'=>array(
		'class'=>'form-inline'
	),
	'enableAjaxValidation' => true,
	'enableClientValidation' => true,
));

?>
	<label>Дата</label>
	<?php
	$this->widget('application.extensions.alitonwidgets.dateedit.aldateedit', array(
		'id' => 'DateEdit',
		'Name' => 'PriceMonitoring[date]',
		'Value' => DateTimeManager::YiiDateToAliton($model->date),
	));
	?>
<div><?php echo $form->error($model, 'date'); ?></div>
	<label>Оборудование</label>
	<?php
	$this->widget('application.extensions.alitonwidgets.comboboxajax.alcomboboxajax', array(
		'id' => 'equip',
		'Name' => 'PriceMonitoring[eqip_id]',
		'ModelName' => 'Equips',
		'FieldName' => 'EquipName',
		'KeyField' => 'Equip_id',
		'KeyValue' => $model->eqip_id,
		'Width' => 200,
		'Type' => array(
			'Mode' => 'Filter',
			'Condition' => "e.EquipName like ':Value%'",
		),
		'Columns' => array(
			'EquipName' => array(
				'Name' => 'Оборудование',
				'FieldName' => 'EquipName',
				'Width' => 150,
				'Height' => 23,
			),
		),

	));
	?>
<div><?php echo $form->error($model, 'eqip_id'); ?></div>
	<label>Поставщик</label>
	<?php
	$this->widget('application.extensions.alitonwidgets.comboboxajax.alcomboboxajax', array(
		'id' => 'supplier',
		'Name' => 'PriceMonitoring[splr_id]',
		'ModelName' => 'Suppliers',
		'FieldName' => 'NameSupplier',
		'KeyField' => 'Supplier_Id',
		'KeyValue' => $model->splr_id,
		'Width' => 200,
		'Type' => array(
			'Mode' => 'Filter',
			'Condition' => "s.NameSupplier like ':Value%'",
		),
		'Columns' => array(
			'NameSupplier' => array(
				'Name' => 'Поставщик',
				'FieldName' => 'NameSupplier',
				'Width' => 150,
				'Height' => 23,
			),
		),

	));
	?>
<div><?php echo $form->error($model, 'splr_id'); ?></div>
	<label>Цена</label>
	<?php
	$this->widget('application.extensions.alitonwidgets.edit.aledit', array(
		'id'=>'equip-price',
		'Name'=>'PriceMonitoring[price]',
		'Value'=>$model->price,
	));
	?>
	<div><?php echo $form->error($model, 'price'); ?></div>

	<?php
	$this->widget('application.extensions.alitonwidgets.button.albutton', array(
		'id' => 'save-pricemonitoring',
		'Height' => 30,
		'Text' => 'Сохранить',
		'Type' => 'none',
		'OnAfterClick' => 'savePriceMonitoring()'
	));
	?>
<div class="clearfix"></div>
<!--<input type="submit" value="ok">-->
<?php $this->endWidget(); ?>