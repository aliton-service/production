<?php
/**
 *
 * @var RepairCommentsController $this
 * @var #A#M#C\Controller.actionIndex.0|? $repr_id
 */
$this->widget('application.extensions.alitonwidgets.edit.aledit', array(
	'id' => 'repr_id_a',
	'Width'=>200,
	'Value' => $repr_id,
	'ReadOnly' => true,
	'Visible' => false,
));

$this->widget('application.extensions.alitonwidgets.gridajax.algridajax', array(
	'id' => 'RepairComments',
	'Stretch' => true,
	'Key' => 'RepairComments_Index_Grid_1',
	'ModelName' => 'RepairComments',
	//'ShowFilters' => true,
	'Height' => 210,
	'Width' => 500,
	'Columns' => array(
		'EmplName' => array(
			'Name' => 'Администрирующий',
			'FieldName' => 'EmplName',
			'Width' => 100,
			'Filter' => array(
				'Condition' => 'rc.EmplName Like \':Value%\'',
			),
			'Sort' => array(
				'Up' => 'rc.EmplName desc',
				'Down' => 'rc.EmplName',
			),
		),
		'DateCreate' => array(
			'Name' => 'Дата',
			'FieldName' => 'DateCreate',
			'Width' => 100,
			'Filter' => array(
				'Condition' => 'dbo.truncdate(rc.DateCreate) = dbo.truncdate(\':Value%\')',
			),
			'Sort' => array(
				'Up' => 'rc.DateCreate desc',
				'Down' => 'rc.DateCreate',
			),
		),
		'comment' => array(
			'Name' => 'Сообщение',
			'FieldName' => 'comment',
			'Width' => 100,
			'Filter' => array(
				'Condition' => 'rc.comment Like \':Value%\'',
			),
			'Sort' => array(
				'Up' => 'rc.comment desc',
				'Down' => 'rc.comment',
			),
		),

	),
));

?>
<div class="field pull-left">
	<?php
	$this->widget('application.extensions.alitonwidgets.edit.aledit', array(
		'id' => 'textWorkState',
		'Width' => 350
	));
	?>
</div>
<div class="btn-group pull-left">
	<?php
	$this->widget('application.extensions.alitonwidgets.button.albutton', array(
		'id' => 'sendWorkState',
		'Height' => 30,
		'Text' => 'Написать',
		'Type' => 'none'
	));
	?>
</div>
<div class="clearfix"></div>

<script>
	Aliton.Links.push(
		{
			Out: "repr_id_a",
			In: "RepairComments",
			TypeControl: "Grid",
			Condition: "rc.repr_id = :Value",
			Name: "RepairDetails_Filter1",
			TypeFilter: "Internal",
			TypeLink: "Filter",
			isNullRun: false
		}
	)
</script>