<?php


$this->widget('application.extensions.alitonwidgets.tabs.altabs', array(
	'success' => '$(".form").togglerEditForm()',
	'afterActivate'=>'createUrlDocmEquip($(this).attr("href").match(/#([\w-_]*)/)[1]);
',
	'header' => array(

		array(
			'name' => 'Накладные на приход',
			'ajax' => true,
			'options' => array(
//				'url' => '/index.php?r=storage/billComing&view=1&id='.$id,
				'url' => '/index.php?r=storage/update&view=billComing&id='.$id,
				'class' => 'hidden',
			),
		),
		array(
			'name' => 'Требования на выдачу',
			'ajax' => true,
			'options' => array(
				'url' => '/index.php?r=storage/update&view=requireGrant&id='.$id,
				'class' => 'hidden',
			),
		),
		array(
			'name' => 'Накладная на возврат',
			'ajax' => true,
			'options' => array(
				'url' => '/index.php?r=storage/update&view=billReturn&id='.$id,
				'class' => 'hidden',
			),
		),
		array(
			'name' => 'Накладная на возврат поставщику',
			'ajax' => true,
			'options' => array(
				'url' => '/index.php?r=storage/update&view=billReturnDistrib&id='.$id,
				'class' => 'hidden',
			),
		),
		array(
			'name' => 'Перемещение из ПРЦ на склад',
			'ajax' => true,
			'options' => array(
				'url' => '/index.php?r=storage/update&view=movePRC&id='.$id,
				'class' => 'hidden',
			),
		),
		array(
			'name' => 'Перемещение со склада на склад',
			'ajax' => true,
			'options' => array(
				'url' => '/index.php?r=storage/update&view=moveStorage&id='.$id,
				'class' => 'hidden',
			),
		),
		array(
			'name' => 'Накладная на возврат мастеру',
			'ajax' => true,
			'options' => array(
				'url' => '/index.php?r=storage/update&view=billReturnMaster&id='.$id,
				'class' => 'hidden',
			),
		),


	),
	'content' => array(

		array(
			'id' => 'doc-billcoming',
		),
		array(
			'id' => 'doc-requiregrant',
		),
		array(
			'id' => 'doc-billreturn',
		),
		array(
			'id' => 'doc-billreturndistrib',
		),
		array(
			'id' => 'doc-moveprc',
		),
		array(
			'id' => 'doc-movestorage',
		),
		array(
			'id' => 'doc-billreturnmaster',
		),

	),
));
?>
<div class="buttons">
	<?php
	$this->widget('application.extensions.alitonwidgets.button.albutton', array(
		'id' => 'change',
		'Height' => 30,
		'Text' => 'Изменить',
		'Type' => 'none',
	));

	$this->widget('application.extensions.alitonwidgets.button.albutton', array(
		'id' => 'demand',
		'Height' => 30,
		'Text' => 'Заявка',
		'Type' => 'none',
	));

	$this->widget('application.extensions.alitonwidgets.button.albutton', array(
		'id' => 'delivery-demand',
		'Height' => 30,
		'Text' => 'Заявка на доставку',
		'Type' => 'none',
	));

	$this->widget('application.extensions.alitonwidgets.button.albutton', array(
		'id' => 'repair',
		'Height' => 30,
		'Text' => 'Ремонт',
		'Type' => 'none',
	));

	?>
</div>
<hr><?php

$this->widget('application.extensions.alitonwidgets.gridajax.algridajax', array(
	'id' => 'ListDetailsGrid',
	'Stretch' => true,
	'Key' => 'Storage_View_ListDetailsGrid_1',
	'ModelName' => 'WHDocuments',
	'ShowFilters' => false,
	'Height' => 300,
	'Width' => 500,
	'Columns' => array(
		'dadt_id' => array(
			'Name' => 'Ид',
			'FieldName' => 'dadt_id',
			'Width' => 100,
		),
		'dctp_name' => array(
			'Name'=>'NameUnitMeasurement',
			'FieldName'=>'NameUnitMeasurement',
			'Width'=> 100,
		),
	),

	'params' => array(
		'actions' => array(
			'setData' => 'doc_details',
		),
	),
	'Filters' => array(
		array(
			'Type' => 'Internal',
			'Condition' => 'd.docm_id = ' . $id,
			),
		),

	'OnAfterClick' => 'eval(getEquipInfo(settings.CurrentRow["eqip_id"]));
	equipHistory.params.actions.getHistoryEquip.dt_id = settings.CurrentRow["dadt_id"];'

));

?>
<hr>
<label>В наличии на складе: </label>
<label>Новое: </label>
<input class="small" data-type="have-new">
<label>Б/У: </label>
<input class="small" data-type="have-used">

<label>Зарезервировано: </label>
<input class="small" data-type="reserv">

<label>Готово к выдаче: </label>
<input class="small" data-type="ready">

<label>Резерв: </label>
<input class="small" data-type="min-reserv">

<label>Закупить: </label>
<input class="small" data-type="buy">

<hr>

<div class="buttons">
<a href="" target="_blank" data-type="add-docm-equip">
	<?php
	$this->widget('application.extensions.alitonwidgets.button.albutton', array(
		'id' => 'add-history-equip',
		'Height' => 30,
		'Text' => 'Добавить',
		'Type' => 'none',
//		'OnAfterClick' => '/?r=storage/createEquipHistory&strg_id='.$_GET['strg_id'].'&',
	));
	?>
</a>
	<a href="" target="_blank" data-type="edit-docm-equip">
		<?php
		$this->widget('application.extensions.alitonwidgets.button.albutton', array(
			'id' => 'edit-history-equip',
			'Height' => 30,
			'Text' => 'Изменить',
			'Type' => 'none',
//		'OnAfterClick' => '/?r=storage/createEquipHistory&strg_id='.$_GET['strg_id'].'&',
		));
		?>
	</a>
	<?php
	$this->widget('application.extensions.alitonwidgets.button.albutton', array(
		'id' => 'history-equip',
		'Height' => 30,
		'Text' => 'История оборудования',
		'Type' => 'none',
		'OnAfterClick' => 'getHistory()',
	));
	?>

	<?php
	$this->widget('application.extensions.alitonwidgets.button.albutton', array(
		'id' => 'have-other-storage',
		'Height' => 30,
		'Text' => 'Посмотреть наличие на других складах',
		'Type' => 'none',
		'OnAfterClick' => 'getAvailableStorage()',
	));
	?>
</div>

<div>
	<div class="pull-left">
		<p>
			<label>Кладовщик: </label><input type="text">
		</p>
		<p>
			<label>Мастер: </label><input type="text">
		</p>
	</div>

	<div class="pull-left">
		<p>
		<?php
		$this->widget('application.extensions.alitonwidgets.button.albutton', array(
			'id' => 'apply',
			'Height' => 30,
			'Text' => 'Подтвердить',
			'Type' => 'none',
			'OnAfterClick' => 'wh = aliton.getModel("WHDocuments");
			wh.docmApply()',
		));
		?>
		</p>
	</div>
</div>


<script>

//	var aliton = {
//		getModel: function (name) {
//			return this.models[name]
//		},
//
//		models: {}
//
//	}


	aliton.models.WHDocuments = {
			params: {
				achs_id: null,
				dlrs_id: null,
				docm_id: null,
				actn_code: null,
				strm_id: null,
				splr_id: null,
				mstr_id: null,
				objc_id: null,
				empl_to_id: null,
				wrtp_id: null,
				EmplCreate: null,
			},
			docmApply: function(){
				console.log(this.params)
			}
		}


	var strg_id = location.href.match(/\/?\S*strg_id=([\w]*)/)[1]
	var id = location.href.match(/\/?\S*id=([\w]*)/)[1]

	var equipInfo = {
		model: 'WHDocuments',
		docm_id: id,
		dt_id: null,
		params: {
			actions: {
				getEquipInfo: {
					strg_id: strg_id,
					equip_id: null,
				},

			},
		},

	};

	var equipHistory = {
		model: 'WHDocuments',
		params: {
			actions: {
				getHistoryEquip: {
					docm_id: id,
					dt_id: null,
				},

			},
		},

	};
	getEquipInfo = function (id) {
		equipInfo.Id = equipInfo.params.actions.getEquipInfo.equip_id = id

		$.ajax({
			url: '/?r=ajaxData/GetDataa',
			method: 'post',
			dataType: 'json',
			data: equipInfo,

			success: function(r) {
				$('input[data-type="have-new"]').val(parseInt(r.quant))
				$('input[data-type="have-used"]').val(parseInt(r.quant_used))
				$('input[data-type="reserv"]').val(parseInt(r.reserv))
				$('input[data-type="min-reserv"]').val(parseInt(r.min_reserv))
				$('input[data-type="ready"]').val(parseInt(r.ready))
				$('input[data-type="buy"]').val(parseInt(r.min_reserv) - parseInt(r.ready))
			},
			error: function () {

			},
		})
	}


	getHistory = function() {
		$.ajax({
			url: '/?r=ajaxData/GetDataa',
			data: equipHistory,
			dataType: 'json',
			method: 'post',
			success: function(){

			}
		})
	}

	createUrlDocmEquip = function(id) {
		$('a[data-type="add-docm-equip"]').attr('href','/?r=storage/createEquipHistory&action='+id)
	}

	getAvailableStorage = function () {
		if($("#available-storage").length == 0) {
			$('body').append('<div id="available-storage"></div>')
		}
		$("#available-storage").html("Загрузка данных, подождите...").dialog()
		$.ajax({
			url: '/?r=storage/availableEquip&id='+equipInfo.Id,
			success: function (r) {
				$('#available-storage').html(r)
			},
			error: function(){
				$("#available-storage").html("Во время загрузки данных произошла ошибка, повторите попытку позже")
			}
		})
	}

</script>
