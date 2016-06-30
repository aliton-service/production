<?php

$this->widget('application.extensions.alitonwidgets.gridajax.algridajax', array(
	'id' => 'ListMonitoringPrice',
	'Stretch' => true,
	'Key' => 'Storage_Index_ListMonitoringPriceGrid_1',
	'ModelName' => 'PriceMonitoring',
	'ShowFilters' => true,
	'Height' => 300,
	'Width' => 500,
	'Columns' => array(
		'mntr_id' => array(
			'Name' => 'Ид',
			'FieldName' => 'mntr_id',
			'Width' => 100,
			'Filter' => array(
				'Condition' => 'm.mntr_id = :Value',
			),
		),
		'equip' => array(
			'Name' => 'Оборудование',
			'FieldName' => 'EquipName',
			'Width' => 100,
			'Filter' => array(
				'Condition' => 'eq.EquipName like \':Value%\'',
			),
		),
		'ums' => array(
			'Name' => 'Ед. изм.',
			'FieldName' => 'ums',
			'Width' => 100,
			'Filter' => array(
				'Condition' => 'ums like \':Value%\'',
			),
		),
		'supplier' => array(
			'Name' => 'Поставщик',
			'FieldName' => 'NameSupplier',
			'Width' => 100,
			'Filter' => array(
				'Condition' => 's.NameSupplier like \':Value%\'',
			),
		),

	),

	'params' => array(
		'actions' => array(
			'getMonitoringPrice' => 'all',
		),
	),

	'OnAfterClick' => 'pm.params.mntr_id = settings.CurrentRow["mntr_id"]',
));

?>
<div class="buttons">
	<?php
	$this->widget('application.extensions.alitonwidgets.button.albutton', array(
		'id' => 'new-price',
		'Height' => 30,
		'Text' => 'Добавить',
		'Type' => 'Window',
		'Href' => '/?r=storage/createPrice',
	));
	?>
	<?php
	$this->widget('application.extensions.alitonwidgets.button.albutton', array(
		'id' => 'change-price',
		'Height' => 30,
		'Text' => 'Изменить',
		'Type' => 'none',
		'OnAfterClick' => 'pm.updateCount()'
	));
	?>
	<?php
	$this->widget('application.extensions.alitonwidgets.button.albutton', array(
		'id' => 'delete-price',
		'Height' => 30,
		'Text' => 'Удалить',
		'Type' => 'none',

	));
	?>
</div>


<script>
	aliton.models.PriceMonitoring = {
		params: {
			mntr_id: null,
		},

		updateCount: function () {
			window.open('/?r=storage/updatePrice&id=' + this.params.mntr_id)
		},

		deleteCount: function () {
			$.ajax({
				url: '/?r=storage/acceptMonitoringDemand',
				data: 'id='+this.params.mndm_id,
				success: function(){
					alert("Заявка принята")
				},
				error: function(){
					alert("Возникла ошибка, повторите попытку позже")
				},
			})
		}
	}

	var pm = aliton.getModel('PriceMonitoring')

</script>
