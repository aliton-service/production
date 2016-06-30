<?php

/**
 *
 * @var RepairCommentsController $this
 * @var #A#M#C\Controller.actionIndex.0|? $repr_id
 */

?>
<div>
	<?php
	$this->widget('application.extensions.alitonwidgets.edit.aledit', array(
		'id' => 'repr_id_d',
		'Width'=>200,
		'Value' => $repr_id,
		'ReadOnly' => true,
		'Visible' => false,
	));

	$this->widget('application.extensions.alitonwidgets.gridajax.algridajax', array(
		'id' => 'RepairDocuments',
		'Stretch' => true,
		'Key' => 'RepairDocuments_Index_Grid_1',
		'ModelName' => 'RepairDocuments',
		//'ShowFilters' => true,
		'Height' => 210,
		'Width' => 500,
		'Columns' => array(
			'doctype' => array(
				'Name' => 'Тип докмента',
				'FieldName' => 'doctype',
				'Width' => 100,
				'Filter' => array(
					'Condition' => 'd.doctype Like \':Value%\'',
				),
				'Sort' => array(
					'Up' => 'd.doctype desc',
					'Down' => 'd.doctype',
				),
			),
			'datareg' => array(
				'Name' => 'Дата рег.',
				'FieldName' => 'datareg',
				'Width' => 100,
				'Filter' => array(
					'Condition' => 'd.datareg Like \':Value%\'',
				),
				'Sort' => array(
					'Up' => 'd.datareg desc',
					'Down' => 'd.datareg',
				),
			),
			'number' => array(
				'Name' => 'Номер',
				'FieldName' => 'number',
				'Width' => 100,
				'Filter' => array(
					'Condition' => 'd.number Like \':Value%\'',
				),
				'Sort' => array(
					'Up' => 'd.number desc',
					'Down' => 'd.number',
				),
			),
			'status' => array(
				'Name' => 'Статус',
				'FieldName' => 'status',
				'Width' => 100,
				'Filter' => array(
					'Condition' => 'd.status Like \':Value%\'',
				),
				'Sort' => array(
					'Up' => 'd.status desc',
					'Down' => 'd.status',
				),
			),
			'dateexec' => array(
				'Name' => 'Дата вып',
				'FieldName' => 'dateexec',
				'Width' => 100,
				'Filter' => array(
					'Condition' => 'd.dateexec Like \':Value%\'',
				),
				'Sort' => array(
					'Up' => 'd.dateexec desc',
					'Down' => 'd.dateexec',
				),
			),
			'note' => array(
				'Name' => 'Примечание',
				'FieldName' => 'note',
				'Width' => 100,
				'Filter' => array(
					'Condition' => 'd.note Like \':Value%\'',
				),
				'Sort' => array(
					'Up' => 'd.note desc',
					'Down' => 'd.note',
				),
			),

		),
		'params' => array(
			'repr_id' => $repr_id,
		),
	));

	?>
	<div class="btn-group">
		<?php
		$this->widget('application.extensions.alitonwidgets.button.albutton', array(
			'id' => 'docCreate',
			'Text' => 'Документ',
			'Type' => 'none',
			'OnAfterClick' => '
				$("#documents").dialog({
					minHeight: 380,
					minWidth:300,
					modal: true,
				})
				'
		));
		?>
	</div>
</div>

<script>
//	Aliton.Links.push(
//		{
//			Out: "repr_id_d",
//			In: "RepairDocuments",
//			TypeControl: "Grid",
//			Condition: "d.keyfield = :Value",
//			Name: "RepairDetails_Filter1",
//			TypeFilter: "Internal",
//			TypeLink: "Filter",
//			isNullRun: false
//		}
//	)
</script>