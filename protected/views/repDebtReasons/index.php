<?php
/**
 *
 * @var RepDebtReasonsController $this
 */
$this->title = "Причина долга";
?>
<div class="field">
	<label>Дата</label>
	<?php
	$this->widget('application.extensions.alitonwidgets.dateedit.aldateedit', array(
		'id' => 'dateRepDebtReasons',
	));
	?>
</div>
<?php
$this->widget('application.extensions.alitonwidgets.gridajax.algridajax', array(
	'id' => 'RepDebtReasons',
	'Stretch' => true,
	'Key' => 'RepDebtReasons_Index_Grid_1',
	'ModelName' => 'RepDebtReasons',
	'ShowFilters' => true,
	'Height' => 300,
	'Width' => 500,
	'Columns' => array(
		'date' => array(
			'Name' => 'Дата',
			'FieldName' => 'date',
			'Width' => 100,
			'Filter' => array(
				'Condition' => 'r.date = :Value',
			),
			'Sort' => array(
				'Up' => 'r.date desc',
				'Down' => 'r.date',
			),
			'Format' => 'd.m.Y H:i',
		),
		'type' => array(
			'Name' => 'Тип долга',
			'FieldName' => 'type_name',
			'Width' => 100,
//			'Filter' => array(
//				'Condition' => "type_name like ':Value%'",
//			),
//			'Sort' => array(
//				'Up' => 'type_name desc',
//				'Down' => 'type_name',
//			),
		),
		'note' => array(
			'Name' => 'Примечание',
			'FieldName' => 'note',
			'Width' => 100,
//			'Filter' => array(
//				'Condition' => 'r.note = :Value',
//			),
//			'Sort' => array(
//				'Up' => 'r.note desc',
//				'Down' => 'r.note',
//			),
		),


	),

));

?>

<div class="btn-group">
	<?php
	$this->widget('application.extensions.alitonwidgets.button.albutton', array(
		'id' => 'view',
		'Height' => 30,
		'Text' => 'Просмотр',
		'Type' => 'none',
		'OnAfterClick' => "window.open('/?r=RepDebtReasonDetails&id='+algridajaxSettings.RepDebtReasons.CurrentRow['rpdr_id'])"
	));
	?>
</div>

<script>
	Aliton.Links = [
		{
			Out: "dateRepDebtReasons",
			In: "RepDebtReasons",
			TypeControl: "Grid",
			Condition: "dbo.truncdate(r.date) = ':Value'",
			Field: "date",
			Name: "DateEdit1_Filter1",
			TypeFilter: "Internal",
			TypeLink: "Filter",
			isNullRun: false,
		}
	]
</script>
