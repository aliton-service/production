<?php
/**
 *
 * @var RepairDetailsController $this
 */

$this->widget('application.extensions.alitonwidgets.edit.aledit', array(
	'id' => 'repr_id',
	'Width'=>200,
	'Value' => $repr_id,
	'ReadOnly' => true,
	'Visible' => false,
));

$this->widget('application.extensions.alitonwidgets.gridajax.algridajax', array(
	'id' => 'RepairDetails',
	'Stretch' => true,
	'Key' => 'RepairDetails_Index_Grid_1',
	'ModelName' => 'RepairDetails',
	'ShowFilters' => true,
	'Height' => 300,
	'Width' => 500,
	'Columns' => array(
		'EquipName' => array(
			'Name' => 'Наименование',
			'FieldName' => 'EquipName',
			'Width' => 100,
			'Filter' => array(
				'Condition' => 'e.EquipName Like \':Value%\'',
			),
			'Sort' => array(
				'Up' => 'e.EquipName desc',
				'Down' => 'e.EquipName',
			),
		),
		'um_name' => array(
			'Name' => 'Статус',
			'FieldName' => 'Ед. измерения',
			'Width' => 100,
			'Filter' => array(
				'Condition' => 'm.um_name Like \':Value%\'',
			),
			'Sort' => array(
				'Up' => 'm.um_name desc',
				'Down' => 'm.um_name',
			),
		),
		'docm_quant' => array(
			'Name' => 'Требуется',
			'FieldName' => 'docm_quant',
			'Width' => 100,
			'Filter' => array(
				'Condition' => 'dt.docm_quant Like \':Value%\'',
			),
			'Sort' => array(
				'Up' => 'dt.docm_quant desc',
				'Down' => 'dt.docm_quant',
			),
		),
		'fact_quant' => array(
			'Name' => 'В наличии',
			'FieldName' => 'fact_quant',
			'Width' => 100,
			'Filter' => array(
				'Condition' => 'dt.fact_quant Like \':Value%\'',
			),
			'Sort' => array(
				'Up' => 'dt.fact_quant desc',
				'Down' => 'dt.fact_quant',
			),
		),
		'summa' => array(
			'Name' => 'Сумма',
			'FieldName' => 'summa',
			'Width' => 100,
			'Filter' => array(
				'Condition' => 'summa Like \':Value%\'',
			),
			'Sort' => array(
				'Up' => 'summa desc',
				'Down' => 'summa',
			),
		),
	),
));


?>

<script>
	Aliton.Links.push(
		{
			Out: "repr_id",
			In: "RepairDetails",
			TypeControl: "Grid",
			Condition: "dt.rpdt_id = :Value",
			Name: "RepairDetails_Filter1",
			TypeFilter: "Internal",
			TypeLink: "Filter",
			isNullRun: false
		}
	)
</script>
