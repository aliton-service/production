<form id="docm-details">
	<?php
	$this->widget('application.extensions.alitonwidgets.comboboxajax.alcomboboxajax', array(
		'id' => 'list-equips',
		//'popupid' => 'list-equips-grid',
		//'data' =>Equips::getEquipsFull(),
		//'label' => 'Оборудование',
		'ModelName' => 'WHDocuments',
		'FieldName' => 'EquipName',
		'KeyField' => 'Equip_id',
		//'keyvalue' => $model->rcrs_id,
//	'width' => -1,
//	'popupwidth' => 300,
//	'showcolumns' => true,
		//'name' => 'WHDocuments[rcrs_id]',
		'Columns' => array(
			'Address' => array(
				'Name' => 'Оборудование',
				'FieldName' => 'EquipName',
				'Width' => 300,
				'Height' => 23,
			),
		),

		'params'=>array(
			'actions' => array(
				'getEquipsFull'=>true,
			),
		),

		'OnAfterChange' => 'getEquipInfo(alcomboboxajaxSettings[id].CurrentRow["Equip_id"]);
	$("input[data-type=um]").val(alcomboboxajaxSettings[id].CurrentRow["NameUnitMeasurement"]);

	'

	));

	?>

	<label>Ед. изм.</label><input class="small" type="text" disabled="disabled" data-type="um">
	<label>Кол-во</label><input class="small" type="text" data-type="quant">
	<label>Цена </label><input class="small" type="text" data-type="price">
	<div>
		<label>Факт. кол-во</label><input class="small" type="text" data-type="fquant">
		<label>Сумма </label><input class="small" type="text" data-type="sum">
	</div>
	<hr>
	<div class="form-inline">
		<div class="form-field">
			<input type="checkbox" id="equip-used" class="form-control">
			<label for="equip-used">Б/У</label>
		</div><hr>

		<div class="form-field">
			<input type="checkbox" id=to-production" class="form-control">
			<label for="to-production">В производство: </label>
		</div>
		<div class="form-field">
			<input type="checkbox" id=no-price-list" class="form-control">
			<label for="no-price-list">Не показывать цену в прайсе: </label>
		</div>
		<hr>
	</div>
</form>
<div>
	<label>В наличии новое: </label><input class="small" data-type="have-new">
	<label>Б/У: </label><input class="small" data-type="have-used">
	<label>Зарезервировано</label><input class="small" data-type="reserv">
</div>

<div id="analog-info"></div>


<?php
$this->widget('application.extensions.alitonwidgets.button.albutton', array(
	'id' => 'submit-docm-details',
	'Height' => 30,
	'Text' => 'Добавить',
	'Type' => 'Form',
	'FormName' => 'docm-details'
));
?>

<?php
$this->widget('application.extensions.alitonwidgets.button.albutton', array(
	'id' => 'analog-equip',
	'Height' => 30,
	'Text' => 'Замена и аналоги',
	'Type' => 'none',
	'OnAfterClick' => 'getAnalog()',
));
?>

<script>
	var action = location.href.match(/\/?\S*action=([\w-_]*)/)
	if(action != null) {
		action = action[1]
	}
	switch (action) {
		case 'doc-requiregrant':
		case 'doc-bilreturn':
			$('input[data-type="sum"], input[data-type="price"]').attr('disabled',true)
		case 'doc-billreturnmaster':
		case 'doc-billreturndistrib':
		case 'doc-billcoming':
		case 'doc-moveprc':
		case 'doc-movestorage':
		default:
			break
	}

	if(!$('input[data-type="sum"]').is(':disabled')) {
		$('input[data-type="quant"], input[data-type="fquant"], input[data-type="price"]').on('change', function () {

			var price = $('input[data-type="price"]').val()
			var kol = $('input[data-type="fquant"]').val()
			if(kol == 0) {
				kol = $('input[data-type="quant"]').val()
			}
			!parseInt(kol) == 0 && ! parseInt(price) == 0 ?
				$('input[data-type="sum"]').val(kol*price) :
				$('input[data-type="sum"]').val('');
		})
	}
</script>


<script>

	var strg_id = location.href.match(/\/?\S*strg_id=([\w]*)/)
	if(strg_id != null) {
		strg_id = strg_id[1]
	}

	var equipInfo = {
		model: 'WHDocuments',
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

	getEquipInfo = function (id) {
		//alert(id)
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
			},
			error: function () {

			},
		})
	}

	getAnalog = function() {
		$("#analog-info").html("Загрузка данных, подождите...").dialog({'width':'350px'})
		$.ajax({
			url: '/?r=equips/equipAnalog',
			data: 'ajax=1&id='+equipInfo.Id,
			success: function(r) {
				$("#analog-info").html(r)
			},
			error: function(){
				$("#analog-info").html("Во время загрузки данных произошла ошибка, повторите попытку позже")
			}
		})
	}
</script>



