
<div class="grid-select" >
<?php

$this->widget('application.extensions.alitonwidgets.gridajax.algridajax', array(
	'id'=>'delivery-process',
	'Width' => 600,
	'Height' => 200,
	'Stretch' => true,
	//'KeyField' => 'exrp_id',
	'Key' => 'Delivery_TabAdmGrid1',
	'ModelName' => 'DeliveryComments',
	'Columns' => array(
		'DateCreate' => array(
			'Name' => 'Дата сообщение',
			'FieldName' => 'date_create',
			'Width' => 100,
		),
		'employeename' => array(
			'Name' => 'Администрирующий',
			'FieldName' => 'employeename',
			'Width' => 100,
		),
		'Text' => array(
			'Name' => 'Текст сообщения',
			'FieldName' => 'text',
			'Width' => 100,
		),

	),

	'Filters' => array(
		array(
			'Type' => 'Internal',
			'Condition' => 'dc.dldm_id = '.$id,
			'Value' => '',
			'Name' => 'processid',
		),
	),

	//'OnAfterClick' => 'id_del = settings.CurrentRow["dlcm_id"]',

));

?>
</div>
<form id="send-note">
	<div class="pull-left">
		<input class="hidden"  name="DeliveryComments[dldm_id]" value="<?php echo $id; ?>">
		<input type="text" name="DeliveryComments[text]">
	</div>

	<div class="pull-left">
		<?php
//		$this->widget('application.extensions.alitonwidgets.button.albutton', array(
//			'id' => 'BtnSave',
//			'Width' => 124,
//			'Height' => 30,
//			'Text' => 'Написать',
//			'FormName' => 'send-note',
//			'Type' => 'Form',
//		));
		?>
		<input type="submit" value="написать">
	</div>
	<div class="pull-left">
		<?php
		$this->widget('application.extensions.alitonwidgets.button.albutton', array(
			'id' => 'del-rep',
			'Width' => 124,
			'Height' => 30,
			'Text' => 'Удалить',
			'Type'=>'none'
		));
		?>
	</div>
	<div class="clearfix"></div>

<!--	<input id="del-rep" type="button" value="удалить">-->
</form>

<script>


	$('#send-note').ajaxSender({
		url: '/?r=deliveryComments/create',
		type: 'post',

		success: function() {
			$('#delivery-process').algridajax('Load')
		}
	})

	$('#del-rep').on('click', function (e) {
		e.preventDefault()

		$.ajax({
			url: '/?r=deliveryComments/delete',
			data: 'id='+algridajaxSettings['delivery-process'].CurrentRow.dlcm_id,
			type: 'post',
			dataType:'json',
			success: function(r) {
				if(!r.status || r.status !== 'ok') {
					alert('Произошла неизвестная ошибка, повторите попытку позже')
					return false
				}

				$('#delivery-process').algridajax('Load')
			},
			error: function (r) {
				alert('Запрос не удался, попробуйте позже.')
			}
		})
	})

</script>

