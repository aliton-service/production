<form id="delivery-detail-edit">
	<div class="pull-left">
	<?php

	$this->widget('application.extensions.alitonwidgets.comboboxajax.alcomboboxajax', array(
			'id'=>'delivery-detail',
			'ModelName'=>'DeliveryDetails',
			'FieldName'=>'equipname',
			'KeyField'=>'equip_id',
			'KeyValue'=>$model->equip_id,
			'Name'=>'DeliveryDetails[equip_id]',
			'Width'=>250,
			'Type' => array(
				'Mode' => 'Filter',
				'Condition' => "e.equipname like ':Value%'",
			),
			'Columns' => array(
				'Name'=>array(
					'Name'=>'Оборудование',
					'FieldName'=>'equipname',
					'Width'=>150
				),
			)
		)
	);

	?>
	</div>
	<div class="pull-left">
		<div class="pull-left"><label>&nbsp;&nbsp;Шт: </label></div>
		<div class="pull-left">
	<?php
	$this->widget('application.extensions.alitonwidgets.edit.aledit', array(
		'id' => 'unit',
		'Width' => 40,
		'Value' => $model->um_name,
		'ReadOnly' => true,
	));
	?>
			</div>
	</div>
	<div class="pull-left">
		<label>Кол-во: </label>
		<input type="text" name="DeliveryDetails[quant]" class="small" value="<?php echo $model->quant ?>">
		<label>Цена: </label>
		<input type="text" name="DeliveryDetails[price]" class="small" value="<?php echo $model->price ?>">
	</div>
	<div class="clearfix"></div>
	<?php
	$this->widget('application.extensions.alitonwidgets.checkbox.alcheckbox', array(
		'id' => 'used',
		'Label' => 'Б/У',
		'Name'=>'DeliveryDetails[used]',
		'Checked'=>$model->used ? true : false
	));
	?>

	<input value="<?php echo $dldm_id ?>" name="DeliveryDetails[dldm_id]" class="hidden">


	<div><input type="submit" value="save"></div>
</form>
<?php
if($id) {
	$url = Yii::app()->createUrl('deliveryDetails/edit', array('id'=>$id));
}
else {
	$url = Yii::app()->createUrl('deliveryDetails/edit');
}
?>
<script>

	$('#delivery-detail-edit').ajaxSender({
		url: '<?php echo $url ?>',
		type: 'post',
		success: function(r) {
			$('#delivery-details').algridajax('Load')
		}
	})


	Aliton.Links = [{
		Out: "delivery-detail",
		In: "unit",
		TypeControl: "Combobox",
		Condition: ":Value",
		Field: "um_name",
		Name: "cmbPropForm_Filter1",
		TypeFilter: "Internal",
		TypeLink: "Filter",
		isNullRun: false,
	}];
</script>
