<?php
/**
 *
 * @var PriceMonitoringController $this
 */
?>
<div class="pull-left">
	<label>От</label>
	<?php
	$this->widget('application.extensions.alitonwidgets.dateedit.aldateedit', array(
		'id' => 'DateBegin',
	));
	?>
</div>

<div class="pull-left" style="margin-left: 25px;">
	<label>До</label>
	<?php
	$this->widget('application.extensions.alitonwidgets.dateedit.aldateedit', array(
		'id' => 'DateEnd',
	));
	?>
</div>
<div class="clearfix"></div>
<br>
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
		'price' => array(
			'Name' => 'Цена',
			'FieldName' => 'price',
			'Filter' => array(
				'Condition' => 'pm.price :Value',
			),
		),

	),

	'params' => array(
		'actions' => array(
			'getMonitoringPrice' => 'all',
		),
	),

	'OnAfterClick' => 'pm.mntr_id = settings.CurrentRow["mntr_id"]',
));
?>

<div class="button-group">

	<?php
	$this->widget('application.extensions.alitonwidgets.button.albutton', array(
		'id' => 'add-pricemonitoring',
		'Height' => 30,
		'Text' => 'Добавить',
		'Type' => 'none',
		'OnAfterClick' => ''
	));
	?>

	<?php
	$this->widget('application.extensions.alitonwidgets.button.albutton', array(
		'id' => 'edit-pricemonitoring',
		'Height' => 30,
		'Text' => 'Изменить',
		'Type' => 'none',
		'OnAfterClick' => ''
	));
	?>

	<?php
	$this->widget('application.extensions.alitonwidgets.button.albutton', array(
		'id' => 'del-pricemonitoring',
		'Height' => 30,
		'Text' => 'Удалить',
		'Type' => 'none',
		'OnAfterClick' => ''
	));
	?>

</div>

<form id="edit-monitoring-form" class="hidden">

</form>
<style>
	.ui-dialog, .ui-dialog .ui-dialog-content {
		overflow: visible;
	}
</style>

<script>
	var action_save = ''
	var pm = {
		mntr_id:0,
	}

	$('#add-pricemonitoring').on('click', function(){
		action_save = 'create'
		getFormPM()
		document.getElementById('edit-monitoring-form').reset()
		$('#edit-monitoring-form').dialog({
			modal:true
		})
	})

	$('#edit-pricemonitoring').on('click', function(){
		action_save = 'update'
		getFormPM()
		$('#edit-monitoring-form').dialog({
			modal:true
		})
	})

	$('#del-pricemonitoring').on('click', function(){
		delPM()
		$('#edit-monitoring-form').dialog({
			modal:true
		})
	})
	
	function savePriceMonitoring() {
		if(action_save === 'update') {
			var queryString = '&id='+pm.mntr_id
		} else {
			queryString = ''
		}
		$.ajax({
			url: '/?r=priceMonitoring/'+action_save + queryString,
			data: $('#form-pm').serialize(),
			type: 'post',
			dataType: 'json',
			success: function(r){
				$('#ListMonitoringPrice').algridajax('LoadData')
				alert(r.data.msg)
				$('#edit-monitoring-form').dialog('destroy')
			},
			error: function (r) {
//				console.log($(r.responseText).find('#form-pm').html())
				if(r.status == 200) {
					$('#edit-monitoring-form').html($(r.responseText))
				} else {
					alert('Произошла непридвиденная ошибка, повторите попытку позже')
				}
				//alert('Произошла непредвиденная ошибка, повторите попытку позже')
			}
		})
	}

	function getFormPM() {
		$('#edit-monitoring-form').html('')
		if(action_save === 'update') {
			var queryString = 'id='+pm.mntr_id
		} else {
			queryString = ''
		}
		$.ajax({
			url: '<?php echo Yii::app()->createUrl('priceMonitoring') ?>'+'/'+action_save,
			type: 'get',
			data: queryString,
			beforeSend: function () {
				$('#edit-monitoring-form').html('<p>Загрузка...</p>')
			},
			success: function(r){
				$('#edit-monitoring-form').html(r)
			},
			error: function (r) {
				var errmsg = '<p>Произошла ошибка во время загрузки данных, повторите попытку позже</p>'
				r.responseText ? errmsg = r.responseText : ''
				$('#edit-monitoring-form').html(errmsg)
			}
		})
	}

	function delPM() {
		$('#edit-monitoring-form').html('')
		$.ajax({
			url: '<?php echo Yii::app()->createUrl('priceMonitoring') ?>'+'/delete',
			type: 'post',
			data: 'id='+pm.mntr_id,
			beforeSend: function () {
				$('#edit-monitoring-form').html('<p>Загрузка...</p>')
			},
			success: function(r){
				$('#edit-monitoring-form').html(r)
				$('#ListMonitoringPrice').algridajax('LoadData')
			},
			error: function (r) {
				var errmsg = '<p>Произошла ошибка во время загрузки данных, повторите попытку позже</p>'
				r.responseText ? errmsg = r.responseText : ''
				$('#edit-monitoring-form').html(errmsg)
			}
		})
	}


	Aliton.Links = [
		{
			Out: "DateBegin",
			In: "ListMonitoringPrice",
			TypeControl: "Grid",
			Condition: "dbo.truncdate(pm.DateCreate) >= ':Value'",
			Field: "DateCreate",
			Name: "DateEdit2_Filter1",
			TypeFilter: "Internal",
			TypeLink: "Filter",
			isNullRun: false,
		},
		{
			Out: "DateEnd",
			In: "ListMonitoringPrice",
			TypeControl: "Grid",
			Condition: "dbo.truncdate(pm.DateCreate) <= ':Value'",
			Field: "DateCreate",
			Name: "DateEdit2_Filter1",
			TypeFilter: "Internal",
			TypeLink: "Filter",
			isNullRun: false,
		},
	]
</script>