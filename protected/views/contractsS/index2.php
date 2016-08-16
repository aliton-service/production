<?php
/**
 *
 * @var ContractsSController $this
 */

$this->title = 'Поиск счетов';
?>
<div class="pull-left">
	Номер:
</div>

<div class="field pull-left">
	<?php
	$this->widget('application.extensions.alitonwidgets.edit.aledit', array(
		'id' => 'number',
		'Width' => 200,
		'Type' => 'String',
	//	'Mode' => "Auto",
	));
?>
</div>

<div class="pull-left">
	Сумма:
</div>

<div class="field pull-left">
	<?php
	$this->widget('application.extensions.alitonwidgets.edit.aledit', array(
		'id' => 'price',
		'Width' => 200,
		'Type' => 'String',
	//	'Mode' => "Auto",
	));
	?>
</div>
<?php

$this->widget('application.extensions.alitonwidgets.gridajax.algridajax', array(
	'id' => 'search-acc',
	'Stretch' => true,
	'Key' => 'Search_Account_Index_Grid_1',
	'ModelName' => 'ContractsS',
	'ShowFilters' => true,
	'Height' => 300,
	'Width' => 500,
	'Columns' => array(
		'DocType_Name' => array(
			'Name' => 'Тип документа',
			'FieldName' => 'DocType_Name',
			'Width' => 100,
			'Filter' => array(
				'Condition' => 'dt.DocType_Name Like \':Value%\'',
			),
			'Sort' => array(
				'Up' => 'dt.DocType_Name desc',
				'Down' => 'dt.DocType_Name',
			),
		),
		'ContrDateS' => array(
			'Name' => 'Дата',
			'FieldName' => 'ContrDateS',
			'Width' => 100,
			'Format' => 'd.m.Y',
			'Filter' => array(
				'Condition' => 'c.ContrDateS = :Value',
			),
			'Sort' => array(
				'Up' => 'c.ContrDateS desc',
				'Down' => 'c.ContrDateS',
			),
		),
		'ContrNumS' => array(
			'Name' => 'Номер',
			'FieldName' => 'ContrNumS',
			'Width' => 100,
			'Filter' => array(
				'Condition' => "c.ContrNumS like '%:Value%'",
			),
			'Sort' => array(
				'Up' => 'c.ContrNumS desc',
				'Down' => 'c.ContrNumS',
			),
		),
		'Addr' => array(
			'Name' => 'Адрес',
			'FieldName' => 'Addr',
			'Width' => 100,
			'Filter' => array(
				'Condition' => 'a.Addr Like \':Value%\'',
			),
			'Sort' => array(
				'Up' => 'a.Addr desc',
				'Down' => 'a.Addr',
			),
		),
		'Price' => array(
			'Name' => 'Начисления',
			'FieldName' => 'Price',
			'Width' => 100,
			'Filter' => array(
				'Condition' => 'Price Like \':Value%\'',
			),
			'Sort' => array(
				'Up' => 'Price desc',
				'Down' => 'Price',
			),
		),


	),


));

?>
<script>
	Aliton.Links = [
		{
			Out: "number",
			In: "search-acc",
			TypeControl: "Grid",
			Condition: "c.ContrNumS like '%:Value%'",
			//Field: "Employee_id",
			Name: "Edit1_Filter1",
			TypeFilter: "Internal",
			TypeLink: "Filter",
			isNullRun: false
		},
		{
			Out: "price",
			In: "search-acc",
			TypeControl: "Grid",
			Condition: "((case when c.DocType_id = 4 then round(c.PriceMonth, 2) else round(c.Price, 2) end) = :Value)",
			//Field: "Employee_id",
			Name: "Edit1_Filter2",
			TypeFilter: "Internal",
			TypeLink: "Filter",
			isNullRun: false
		}
	]
</script>
