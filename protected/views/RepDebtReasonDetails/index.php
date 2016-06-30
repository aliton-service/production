<?php
/**
 *
 * @var RepDebtReasonDetailsController $this
 */
$this->title = "Просмотр отчета";

$this->widget('application.extensions.alitonwidgets.gridajax.algridajax', array(
	'id' => 'RepDebtReasonDetails',
	'Stretch' => true,
	'Key' => 'RepDebtReasonDetails_Index_Grid_1',
	'ModelName' => 'RepDebtReasonDetails',
	'ShowFilters' => true,
	'Height' => 300,
	'Width' => 500,
	'Filters' => array(
		array(
			'Type' => 'Internal',
			'Control' => 'Form',
			'Condition' => 'r.rpdr_id = ' . $id,
			'Value' => '',
			'Name' => 'Form1',
		),
	),
	'Columns' => array(

		'fullname' => array(
			'Name' => 'Наименование организации',
			'FieldName' => 'fullname',
			'Width' => 100,
			'Filter' => array(
				'Condition' => "fullname like ':Value%'",
			),
			'Sort' => array(
				'Up' => 'fullname desc',
				'Down' => 'fullname',
			),
		),

		'period' => array(
			'Name' => 'Период долга',
			'FieldName' => 'period',
			'Width' => 100,
			'Filter' => array(
				'Condition' => 'dt.period = :Value',
			),
			'Sort' => array(
				'Up' => 'dt.period desc',
				'Down' => 'dt.period',
			),
		),

		'date' => array(
			'Name' => 'Дата контакта',
			'FieldName' => 'date',
			'Width' => 100,
			'Filter' => array(
				'Condition' => 'с.date = :Value',
			),
			'Sort' => array(
				'Up' => 'с.date desc',
				'Down' => 'с.date',
			),
			'Format' => 'd.m.Y H:i',
		),

		'debt' => array(
			'Name' => 'Сумма долга',
			'FieldName' => 'debt',
			'Width' => 100,
			'Filter' => array(
				'Condition' => 'debt = :Value',
			),
			'Sort' => array(
				'Up' => 'debt desc',
				'Down' => 'debt',
			),
		),

		'next_date' => array(
			'Name' => 'Дата план. контакта',
			'FieldName' => 'next_date',
			'Width' => 100,
			'Filter' => array(
				'Condition' => 'с.next_date = :Value',
			),
			'Sort' => array(
				'Up' => 'с.next_date desc',
				'Down' => 'с.next_date',
			),
			'Format' => 'd.m.Y H:i',
		),

		'overday' => array(
			'Name' => 'Просрчока',
			'FieldName' => 'overday',
			'Width' => 100,
			'Filter' => array(
				'Condition' => 'overday = :Value',
			),
			'Sort' => array(
				'Up' => 'overday desc',
				'Down' => 'overday',
			),
		),

		'name' => array(
			'Name' => 'Причина долга',
			'FieldName' => 'name',
			'Width' => 100,
			'Filter' => array(
				'Condition' => 'c.name = :Value',
			),
			'Sort' => array(
				'Up' => 'c.name desc',
				'Down' => 'c.name',
			),
		),

		'territ_name' => array(
			'Name' => 'Участок',
			'FieldName' => 'territ_name',
			'Width' => 100,
			'Filter' => array(
				'Condition' => 't.territ_name = :Value',
			),
			'Sort' => array(
				'Up' => 't.territ_name desc',
				'Down' => 't.territ_name',
			),
		),


	),

));

?>
<div class="btn-group">
	<?php
	$this->widget('application.extensions.alitonwidgets.button.albutton', array(
		'id' => 'exportXLS',
		'Height' => 30,
		'Text' => 'Экспорт в Excel',
		'Type' => 'none',
		'OnAfterClick' => "exportRDRD($id)",
	));
	?>
</div>


<script>
	function exportRDRD(id) {
		$.ajax({
			url: '/?r=RepDebtReasonDetails/exportXLS&id='+id,
			dataType: 'json',
			success: function(r) {
//				if(r !== 'ok') {
//					alert('error')
//					return false
//				}
//
				var data = '<table><tbody>'
				data += '' +
					'<tr style="text-align: center;font-weight: bold;">' +
						'<td>' +
							'Наименование организации' +
						'</td>' +
						'<td>' +
							'Период долга' +
						'</td>' +
						'<td>' +
							'Дата контакта' +
						'</td>' +
						'<td>' +
							'Сумма долга' +
						'</td>' +
						'<td>' +
							'Дата план. контакта' +
						'</td>' +
						'<td>' +
							'Просрчока' +
						'</td>' +
						'<td>' +
							'Причина долга' +
						'</td>' +
						'<td>' +
							'Участок' +
						'</td>' +
					'</tr>'
//				console.log(r)
				for(var item in r) {
					data += '' +
						'<tr>' +
							'<td>' +
								r[item].fullname +
							'</td>' +
							'<td>' +
								r[item].period +
							'</td>' +
							'<td>' +
								r[item].date +
							'</td>' +
							'<td>' +
								r[item].debt +
							'</td>' +
							'<td>' +
								r[item].next_date +
							'</td>' +
							'<td>' +
								r[item].overday +
							'</td>' +
							'<td>' +
								r[item].name +
							'</td>' +
							'<td>' +
								r[item].territ_name +
							'</td>' +
						'</tr>'
				}
				data += '</table></tbody>'
//				console.log(data)
				core.exporter('XLS', data)
			}
		})
	}
</script>