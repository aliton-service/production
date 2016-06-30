<?php

$this->widget('application.extensions.alitonwidgets.gridajax.algridajax', array(
	'id'=>'delivery-details',
	'Width' => 600,
	'Height' => 200,
	'Stretch' => true,
	//'KeyField' => 'exrp_id',
	'Key' => 'Delivery_TabDetaildGrid1',
	'ModelName' => 'DeliveryDetails',
	'Columns' => array(
		'equipname' => array(
			'Name' => 'Оборудование',
			'FieldName' => 'equipname',
			'Width' => 100,
		),
		'um_name' => array(
			'Name' => 'Ед. изм.',
			'FieldName' => 'um_name',
			'Width' => 100,
		),
		'quant' => array(
			'Name' => 'Кол-во',
			'FieldName' => 'quant',
			'Width' => 100,
		),
		'price' => array(
			'Name' => 'Цена',
			'FieldName' => 'price',
			'Width' => 100,
		),
		'used' => array(
			'Name' => 'Б/У',
			'FieldName' => 'used',
			'Width' => 100,
		),

	),

	'Filters' => array(
		array(
			'Type' => 'Internal',
			'Condition' => 'dt.dldm_id = '.$id,
			'Value' => '',
			'Name' => 'processid',
		),
	),


));


?>

<div class="button-group">
	<input type="button" id="add-equip" value="Добавить">
	<input type="button" id="edit-equip" value="Изменить">
</div>

<!--<div id="back-overley"></div>-->
<div id="dialog" ></div>
<style>
	.ui-dialog, .ui-dialog .ui-dialog-content {
		overflow: visible;
	}
</style>

<script>
//	$('#dialog').dialog({
//		minWidth:650,
//		minHeight:200,
//		close: function () {
//			$('#back-overley').hide()
//		},
//		open: function(){
//			$('#back-overley').show()
//		}
//	})
//	$('#dialog').dialog('close')
	$('#add-equip').on('click', function(){
		$.ajax({
			url: '/?r=deliveryDetails&dldm_id='+<?php echo $id ?>,
			success: function (r) {
				$('#dialog').html(r)
			}
		})
		dialogOpen('#dialog')
	})

	$('#edit-equip').on('click', function(){
		if(algridajaxSettings['delivery-details'].CurrentRow == null || !algridajaxSettings['delivery-details'].CurrentRow['dldt_id']) {
			alert('Не выбрана запись')
			return false
		}
		$.ajax({
			url: '/?r=deliveryDetails&dldm_id='+<?php echo $id ?>+'&id='+algridajaxSettings['delivery-details'].CurrentRow['dldt_id'],
			success: function (r) {
				$('#dialog').html(r)
			}
		})
		dialogOpen('#dialog')
	})

	function dialogOpen(selector) {
		aliton.socket.emit('register demand', {
			creater: '<?php echo Yii::app()->user->fullname ?>'
		})
		$(selector).dialog({
			minWidth:650,
			minHeight:200,
			modal:true,
//			close: function () {
//				$('#back-overley').hide()
//			},
//			open: function(){
//				$('#back-overley').show()
//			}
		})
	}




</script>
