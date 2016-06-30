
<div>
	<?php
	$this->widget('application.extensions.alitonwidgets.datepicker.aldatepicker', array(
		'name' => 'MonitoringDemands[date][begin]',
		'label' => 'Дата: ',
		'value' => $model->date,
	));
	?>
</div>
<div class="clearfix">

	<?php
	$this->widget('application.extensions.alitonwidgets.combobox.alcombobox', array(
		'id' => 'cmb-equips',
		'popupid' => 'cmb-equips-grid',
		'data' =>Equips::getData(),
		'label' => 'Оборудование',
		'fieldname' => 'EquipName',
		'keyfield' => 'Equip_id',
		'keyvalue' => $model->eqip_id,
		'width' => -1,
		'popupwidth' => 300,
		'showcolumns' => true,

		'columns' => array(
			'Equip' => array(
				'name' => 'Оборудование',
				'fieldname' => 'EquipName',
				'width' => 300,
				'height' => 23,
			),
		),

	));
	?>
</div>

<div class="clearfix">

	<?php
	$this->widget('application.extensions.alitonwidgets.combobox.alcombobox', array(
		'id' => 'cmb-supplier',
		'popupid' => 'cmb-supplier-grid',
		'data' =>Suppliers::getData(),
		'label' => 'Поставщик',
		'fieldname' => 'NameSupplier',
		'keyfield' => 'Supplier_Id',
		'keyvalue' => 'splr_id',
		'width' => -1,
		'popupwidth' => 300,
		'showcolumns' => true,

		'columns' => array(
			'Supplier' => array(
				'name' => 'Поставщик',
				'fieldname' => 'NameSupplier',
				'width' => 300,
				'height' => 23,
			),
		),

	));
	?>
</div>

<div class="clearfix">

	<label>Цена: </label><input type="text" value="<?=$model->price?>">
</div>