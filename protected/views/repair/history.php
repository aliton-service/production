<?php
/**
 *
 * @var RepairController $this
 */

$this->widget('application.extensions.alitonwidgets.gridajax.algridajax', array(
	'id' => 'repairHistory',
	'ModelName' => 'Repair',
	'Key' => 'Repairs_HistoryGrid_1',
	'params' => array(
		'actions' => array(
			'getRepairChangeHistory' => '',
		)
	),
	'Columns' => array(
		'ResultName' => array(
			'Name' => 'Result',
			'Width' => 200
		),
	),
));