
<p>
<label>Дата: </label>
<?php
$this->widget('application.extensions.alitonwidgets.datepicker.aldatepicker', array(
	'id'=>'date'
));
?></p>
<?php

$this->widget('application.extensions.alitonwidgets.gridajax.algridajax', array(
	'id' => 'Inventories',
	'Stretch' => true,
	'Key' => 'Storage_Index_Inventories_1',
	'ModelName' => 'Inventories',
	'ShowFilters' => true,
	'Height' => 300,
	'Width' => 500,
	'Columns' => array(
		'storage' => array(
			'Name'=>'Склад',
			'FieldName'=>'storage',
			'Width'=>100,
		),
		'date' => array(
			'Name'=>'Дата',
			'FieldName'=>'date',
			'Width'=>100,
		),
		'closed' => array(
			'Name'=>'Принято',
			'FieldName'=>'closed',
			'Width'=>100,
		),
	),

	'params' => array(
		'actions' => array(
			'getReestrInventories' => null,
		),
	),

	'OnAfterClick'=>'inventory.params.id = settings.CurrentRow.invn_id;
	inventory.params.strg_id = settings.CurrentRow.strg_id;'


));

?>

<div class="buttons">
	<?php
	$this->widget('application.extensions.alitonwidgets.button.albutton', array(
		'id' => 'calc',
		'Height' => 30,
		'Text' => 'Расчитать',
		'Type' => 'none',
		'OnAfterClick'=> 'inventory.calcInventory()',
	));
	?>
	<?php
	$this->widget('application.extensions.alitonwidgets.button.albutton', array(
		'id' => 'view',
		'Height' => 30,
		'Text' => 'Просмотр',
		'Type' => 'none',
		'OnAfterClick' => 'inventory.viewInventories()'
	));
	?>
	<?php
	$this->widget('application.extensions.alitonwidgets.button.albutton', array(
		'id' => 'close',
		'Height' => 30,
		'Text' => 'Принять',
		'Type' => 'none',
		'OnAfterClick'=> 'inventory.closeCount()',
	));
	?>
	<?php
	$this->widget('application.extensions.alitonwidgets.button.albutton', array(
		'id' => 'delete',
		'Height' => 30,
		'Text' => 'Удалить',
		'Type' => 'none',
		'OnAfterClick'=> 'inventory.deleteCount()',
	));
	?>
</div>

<script>
	var inventory = {
		params: {
			id:false,
			strg_id:false,
		},
		viewInventories: function() {
			if(!this.params.id || this.params.id == 0) {
				alert('Выберите дату')
				return false
			}
			window.open('/?r=storage/viewInventory&id='+this.params.id)
		},
		closeCount: function () {
			$.ajax({
				url:'/?r=storage/closeInventories',
				data: 'invn_id='+this.params.id,
				dataType: 'json',
				method: 'post',
				success: function (r) {
					alert(r.status_msg)
				},
				error: function () {
					alert('Запрос не удался, повторите попытку позже.')
				},
			})
		},
		deleteCount: function () {
			if(!confirm('Вы действительно хотите удалить?')){
				return false
			}
			$.ajax({
				url:'/?r=storage/deleteInventories',
				data: 'invn_id='+this.params.id,
				dataType: 'json',
				method: 'post',
				success: function (r) {
					alert(r.status_msg)
				},
				error: function () {
					alert('Запрос не удался, повторите попытку позже.')
				},
			})
		},
		calcInventory: function () {
			var date = $('#date').val()
			$.ajax({
				url:'/?r=storage/calcInventories',
				data: 'invn_id='+this.params.id+'&date='+date,
				dataType: 'json',
				method: 'post',
				success: function (r) {
					alert(r.status_msg)
				},
				error: function () {
					alert('Запрос не удался, повторите попытку позже.')
				},
			})
		}

	}
</script>