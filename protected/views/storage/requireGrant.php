<?php

$this->widget('application.extensions.alitonwidgets.gridajax.algridajax', array(
	'id' => 'ListRequireGrantGrid',
	'Stretch' => true,
	'Key' => 'Storage_Index_ListRequireGrantGrid_1',
	'ModelName' => 'WHDocuments',
	'ShowFilters' => true,
	'Height' => 300,
	'Width' => 500,
	'Columns' => array(
		'docm_id' => array(
			'Name' => 'Ид',
			'FieldName' => 'docm_id',
			'Width' => 100,
		),
		'wrtp_gr'=> array(
			'Name'=>'Монтаж/Обсл.',
			'FieldName'=>'wrtp_gr'
		),
		'dctp_name' => array(
			'Name'=>'dctp_name',
			'FieldName'=>'dctp_name',
			'Width'=> 100,
		),
		'number' => array(
			'Name'=>'Номер',
			'FieldName'=>'number',
			'Width'=>100,
		),
		'date' => array(
			'Name'=>'Дата',
			'FieldName'=>'date',
			'Width'=>100,
		),
		'date_create' => array(
			'Name'=>'Дата создания',
			'FieldName'=>'date_create',
			'Width'=>100,
		),
		'dmnd_empl_name'=>array(
			'Name'=>'Затребовал',
			'FieldName'=>'dmnd_empl_name',
		),
		'prms_empl_name'=>array(
			'Name'=>'Выписал',
			'FieldName'=>'prms_empl_name',
		),
		'prty_name'=>array(
			'Name'=>'Срочность',
			'FieldName'=>'prty_name',
		),
		'status'=>array(
			'Name'=>'Статус',
			'FieldName'=>'status',
		),
		'Address'=>array(
			'Name'=>'Адрес объекта',
			'FieldName'=>'Address',
		),
		'wrtp_name'=>array(
			'Name'=>'Вид работ',
			'FieldName'=>'wrtp_name',
		),
		'best_date'=>array(
			'Name'=>'Желаемая дата',
			'FieldName'=>'best_date',
		),
		'deadline'=>array(
			'Name'=>'Предельная дата',
			'FieldName'=>'deadline',
		),
		'date_promise'=>array(
			'Name'=>'Обещанная дата',
			'FieldName'=>'date_promise',
		),
		'storage'=>array(
			'Name'=>'Склад',
			'FieldName'=>'storage',
		),
		'OverDay'=>array(
			'Name'=>'Прос-но',
			'FieldName'=>'OverDay',
		),
		'ac_date'=>array(
			'Name'=>'Дата',
			'FieldName'=>'ac_date',
		),
		'strm_name'=>array(
			'Name'=>'Кладовщик',
			'FieldName'=>'strm_name',
		),
		'mstr_name'=>array(
			'Name'=>'Кому',
			'FieldName'=>'mstr_name',
		),
		'storage'=>array(
			'Name'=>'Склад',
			'FieldName'=>'storage',
		),
		'storage'=>array(
			'Name'=>'Склад',
			'FieldName'=>'storage',
		),
		'storage'=>array(
			'Name'=>'Склад',
			'FieldName'=>'storage',
		),
	),

	'params' => array(
		'actions' => array(
			'setData' => 'require_grant',
		),
	),

	'OnAfterClick' => 'docParam.id = wh.params.id = settings.CurrentRow["docm_id"];
	 docParam.strg_id = settings.CurrentRow["strg_id"];
	 wh.params.dmnd_empl_name = settings.CurrentRow["dmnd_empl_name"];
	 wh.params.prms_empl_name = settings.CurrentRow["prms_empl_name"];
	 docParam.createUrl("#view-doc");
	 t2.setProp(settings.CurrentRow);
	 console.log(settings.CurrentRow);
	 t2.setProcess("#process-work")
	 wh.setEmplNames()
	 Aliton.wh.modelup(\'setProp\',{docm_id:settings.CurrentRow["docm_id"]}
	 		,Aliton.wh.modelup(\'getOpt\',\'sourceNote\'))',
));

?>
<div>
	<div class="pull-left">
		<label>Затребовал: </label>
		<input type="text" id="dmnd-empl">
	</div>
	<div class="pull-left">
		<label>Разрешил: </label>
		<input type="text" id="prms-empl">
	</div>
</div>

<hr>

<div class="buttons">
	<?php
	$this->widget('application.extensions.alitonwidgets.button.albutton', array(
		'id' => 'grant-ready',
		'Height' => 30,
		'Text' => 'Готово к выдаче',
		'Type' => 'none',
		'OnAfterClick' => 'wh.grantReady()'
	));
	?>
	<?php
	$this->widget('application.extensions.alitonwidgets.button.albutton', array(
		'id' => 'undo-ready',
		'Height' => 30,
		'Text' => 'Снять готовность',
		'Type' => 'none',
		'OnAfterClick' => 'wh.grantUndo()'
	));
	?>
	<?php
	$this->widget('application.extensions.alitonwidgets.button.albutton', array(
		'id' => 'history',
		'Height' => 30,
		'Text' => 'История',
		'Type' => 'none',
		'OnAfterClick' => 'wh.grantHistory()'
	));
	?>
	<?php
	$this->widget('application.extensions.alitonwidgets.button.albutton', array(
		'id' => 'delivery-demand',
		'Height' => 30,
		'Text' => 'Заявка на доставку',
		'Type' => 'none',
		'OnAfterClick' => 'wh.deliveryDemands()'
	));
	?>
</div>

<div id="grant-history-view" class="hidden">

</div>

<div id="delivery-demand-create" class="hidden"></div>

<script>

	if(!aliton.getModel('WHDocuments')) {
		aliton.models.WHDocuments = {
			params: {
				id: false,
			},
			grantReady: function(){
				$.ajax({
					url:'/?r=storage/grantReady',
					data: 'WHDocuments[docm_id]='+this.params.id,
					dataType: 'json',
					method: 'post',
					success: function(r){
						alert(r.status_msg)
					},
					error:function(){
						alert('Запрос не удался, повторите попытку позже')
					}
				})
			},
			grantHistory: function () {
				$('#grant-history-view').html('<p>Загрузка данных...</p>')
				$('#grant-history-view').dialog({
					minWidth:700,
				})
				$.ajax({
					url:'/?r=storage/grantHistory',
					data: 'docm_id='+this.params.id,
					method: 'get',
					success: function(r){
						$('#grant-history-view').html($(r))
					},
					error:function(){
						$('#grant-history-view').html('<p>При загрузке данных произошла ошибка, повторите попытку позже.</p>')
					}
				})
			},
			grantUndo: function() {
				$.ajax({
					url:'/?r=storage/grantUndo',
					data: 'WHDocuments[docm_id]='+this.params.id,
					dataType: 'json',
					method: 'post',
					success: function(r){
						alert(r.status_msg)
					},
					error:function(){
						alert('Запрос не удался, повторите попытку позже')
					}
				})
			},
			deliveryDemands: function() {
				$('#delivery-demand-create').dialog()
				$.ajax({
					url: '/?r=delivery/create',
					data: '',
					method: 'get',
					success: function(r){
						$('#delivery-demand-create').dialog({
							minWidth:880,
							minHeight:450,
						}).html(r)
					},
					error: function () {

					}
				})
			},
			setEmplNames: function() {
				console.log(wh)
				$('#dmnd-empl').val(this.params.dmnd_empl_name)
				$('#prms-empl').val(this.params.prms_empl_name)
			}
		}
	}

	var wh = aliton.models.WHDocuments



	var t2 = new WHDocuments()

//	t2.bindProp({
//		docm_id: '#docm_id_test'
//	})

//	t2.sendData()
//	t2.createSender('#docm_id_test')



//$('#qqq').click(function () {
//	t2.sendData()
//})





//	$('#whdoc-note').model('setProp', {
//		dctp_id:2345,
//	})
//	$('#qqq').model('sendData')



</script>