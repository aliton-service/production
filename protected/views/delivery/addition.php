<h1>Заявка на доставку №<?php echo $id; ?></h1>
<?php $this->setPageTitle('Заявка на доставку №'.$id) ?>

<div id="delivery-addition">
<!--	<form id="change-form">-->
<!--		<div class="row">-->
<!--			<label>Номер: </label><input name="Delivery[dldm_id]" data-prop="dldm_id">-->
<!--			<label>Подана: </label><input name="Delivery[date]" data-prop="date">-->
<!--		</div>-->
<!--		<div class="row single-field">-->
<!--			<div class="head-single-field"><label>Дата получения:</label></div>-->
<!--			<div>-->
<!--				<label>Желаемая: </label><input name="Delivery[bestdate]" data-prop="bestdate">-->
<!--				<label>Предельная: </label><input name="Delivery[deadline]" data-prop="deadline">-->
<!--				<label>Обещенная: </label><input name="Delivery[date_promise]" data-prop="date_promise">-->
<!--			</div>-->
<!--		</div>-->
<!--		<div class="row">-->
<!--			<label>Адрес: </label><input name="Delivery[Addr]" data-prop="Addr">-->
<!--			<label>Мастер: </label><input name="Delivery[MasterName]" data-prop="MasterName">-->
<!--		</div>-->
<!--		<div class="row">-->
<!--			<label>Контактное лицо: </label><input name="Delivery[Contacts]" data-prop="Contacts">-->
<!--			<label>Телефон: </label><input name="Delivery[phonenumber]" data-prop="phonenumber">-->
<!--		</div>-->
<!--		<div class="row">-->
<!--			<label>Курьер: </label><input name="Delivery[DeliveryMan]" data-prop="DeliveryMan">-->
<!--			<label>Причина просрочки: </label><input name="Delivery[delayreasonname]" data-prop="delayreasonname">-->
<!--		</div>-->
<!--		<div class="row">-->
<!--			<div><label>Содержание заявки: </label></div><div><textarea name="Delivery[text]" data-prop="text"></textarea></div>-->
<!--		</div>-->
<!--		<div class="row">-->
<!--			<label>Заявку подал: </label><input name="Delivery[user_sender_name]" data-prop="user_sender_name">-->
<!--			<label>Заявку принял: </label><input name="Delivery[user_logist_name]" data-prop="user_logist_name">-->
<!--		</div>-->
<!--		<div class="row">-->
<!--			<div><label>Отчет курьера: </label></div><div><textarea name="Delivery[rep_delivery]" data-prop="rep_delivery"></textarea></div>-->
<!--		</div>-->
<!--	<!--	<div><label>Дата отправки: </label><input data-prop="date_logist"></div>-->
<!--	<!--	<div><label>Дата доставки: </label><input data-prop="date_delivery"></div>-->
<!--		<div></div>-->
<!--		<div class="button-group">-->
<!--			<input value="Изменить" type="submit" id="change-info">-->
<!--			<input type="button" value="Принять" id="accept-demands">-->
<!--		</div>-->
<!--	</form>-->
</div>
<div class="clearfix"></div>
<input type="button" value="Принять" id="accept-demands" class="hidden">




<div class="clearfix"></div>
<?php

$this->widget('application.extensions.alitonwidgets.tabs.altabs', array(
	'reload' => true,
	'header' => array(
		array(
			'name' => 'Ход работы',
			'ajax'=>true,
			'options'=>array(
				'url'=> $this->createUrl('delivery/process',array('id'=>$id)),
			),
		),
		array(
			'name' => 'Оборудование',
			'ajax'=>true,
			'options'=>array(
				'url'=>$this->createUrl('delivery/equip',array('id'=>$id)),
			),
		),
	),
	'content' => array(
		array(
			'id' => 'TabProceess',

		),
		array(
			'id' => 'TabEquip',
		),
	),

));

?>

<script>
//	$('#delivery-addition').modelup({
//		table: 'Delivery',
//		addparams: {
//			action: 'getAdditionInfo',
//		},
//		prop: {
//			dldm_id: {
//				bind: 'input[data-prop="dldm_id"]',
//			},
//			MasterName: {
//				bind: 'input[data-prop="MasterName"]',
//			},
//			Addr: {
//				bind: 'input[data-prop="Addr"]',
//			},
//			Contacts: {
//				bind: 'input[data-prop="Contacts"]',
//			},
//			DeliveryMan: {
//				bind: 'input[data-prop="DeliveryMan"]',
//			},
////			date_logist: {
////				bind: 'input[data-prop="date_logist"]',
////			},
////			date_delivery: {
////				bind: 'input[data-prop="date_delivery"]',
////			},
//			rep_delivery: {
//				bind: 'textarea[data-prop="rep_delivery"]',
//			},
//			phonenumber: {
//				bind: 'input[data-prop="phonenumber"]',
//			},
//			delayreasonname: {
//				bind: 'input[data-prop="delayreasonname"]',
//			},
//			text: {
//				bind: 'textarea[data-prop="text"]',
//			},
//			user_sender_name: {
//				bind: 'input[data-prop="user_sender_name"]',
//			},
//			user_logist_name: {
//				bind: 'input[data-prop="user_logist_name"]',
//			},
//			date: {
//				bind: 'input[data-prop="date"]',
//			},
//			bestdate: {
//				bind: 'input[data-prop="bestdate"]',
//			},
//			deadline: {
//				bind: 'input[data-prop="deadline"]',
//			},
//			date_promise: {
//				bind: 'input[data-prop="date_promise"]',
//			},
//
//		}
//	})

//	$('#delivery-addition').modelup('setProp', { dldm_id: <?php //echo $id; ?>// }, true)

	$.ajax({
		url: '<?php echo Yii::app()->createUrl('delivery/update', array('id'=>$id,'ajax'=>1)) ?>',
		success: function(r) {
			$('#delivery-addition').html(r)
			$('#accept-demands').removeClass('hidden')
		},
		beforeSend: function() {
			$('#delivery-addition').html('Загрузка данных о заявке...')
		}
	})

	$('#accept-demands').ajaxSender({
		sendEvent: 'click',
		url: '<?php echo $this->createUrl('delivery/take',array('id'=>$id)) ?>',
		dataType: 'json',
		success: function(r) {
			if(r.status && r.status === 'ok') {
				$('#aleditInput_logistname').val(r.data.user_logist)
				$('#aldateeditinput_DateEdit4').val(r.data.date_logist)
				alert('Заявка принята')
			} else if(r.status && r.status === 'aborted') {
				alert(r.data.msg)
			}

		}
	})
//
//	$('#change-form').ajaxSender({
//		url: '<?php //echo $this->createUrl('delivery/update',array('id'=>$id)) ?>//',
//		type:'post',
//
//	})

</script>