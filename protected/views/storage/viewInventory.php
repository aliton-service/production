<?php

$this->widget('application.extensions.alitonwidgets.gridajax.algridajax', array(
	'id' => 'Inventory',
	'Stretch' => true,
	'Key' => 'Storage_Index_Inventory_1',
	'ModelName' => 'Inventories',
	'ShowFilters' => true,
	'Height' => 300,
	'Width' => 500,
	'Columns' => array(
		'EquipName' => array(
			'Name'=>'Оборудование',
			'FieldName'=>'EquipName',
			'Width'=>100,
		),
		'NameUnitMeasurement' => array(
			'Name'=>'Ед. изм',
			'FieldName'=>'NameUnitMeasurement',
			'Width'=>100,
		),
		'quant' => array(
			'Name'=>'Кол-во нового',
			'FieldName'=>'quant',
			'Width'=>100,
		),
		'quant_used' => array(
			'Name'=>'Кол-во Б/У',
			'FieldName'=>'quant_used',
			'Width'=>100,
		),
	),

	'params' => array(
		'actions' => array(
			'getInventories' => $_GET['id'],
		),
	),

	'OnAfterClick'=>'
	inventory.params.id = settings.CurrentRow.invn_id;
	inventory.params.indt_id = settings.CurrentRow.indt_id;
	inventory.params.quant = settings.CurrentRow.quant;
	inventory.params.quant_used = settings.CurrentRow.quant_used;
	'


));

?>

<div class="buttons">

	<?php
	$this->widget('application.extensions.alitonwidgets.button.albutton', array(
		'id' => 'edit',
		'Height' => 30,
		'Text' => 'Изменить',
		'Type' => 'none',
		'OnAfterClick'=> 'inventory.changeCount()',
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


<div class="hidden" id="inventory-edit">
	<form id="inventory-edit-form">
		<input class="hidden" name="Inventories[indt_id]">
		<input name="Inventories[quant]">
		<input name="Inventories[quant_used]">
		<input type="submit" value="сохранить">
	</form>
</div>

<script>
	var inventory = {
		params: {
			id: false,
			quant: false,
			quant_used: false,
		},
		deleteCount: function () {
			$.ajax({
				url:'/?r=storage/deleteInventory',
				data: 'id='+this.params.id,
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
		changeCount: function () {
			$('#inventory-edit input[name="Inventories[quant]"]').val(this.params.quant)
			$('#inventory-edit input[name="Inventories[quant_used]"]').val(this.params.quant_used)
			$('#inventory-edit input[name="Inventories[indt_id]"]').val(this.params.indt_id)
			$('#inventory-edit').dialog();
		},

	}

	$('#inventory-edit-form').on('submit',function(e){
		e.preventDefault()
		$.ajax({
			url: '/?r=storage/updateInventory',
			data: $(this).serialize(),
			dataType: 'json',
			method: 'post',
			success: function() {

			},
			error: function() {

			}
		})
	})
</script>