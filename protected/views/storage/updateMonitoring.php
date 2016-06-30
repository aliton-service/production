<div id="monitoring-demand">
	<?php
	$this->renderPartial('_formMonitoring', array('model'=>$model));
	?>
</div>
<hr>
<div id="monitoring-details">
	<?php
	$this->widget('application.extensions.alitonwidgets.gridajax.algridajax', array(
		'id' => 'ListMonitoringDetails',
		'Stretch' => true,
		'Key' => 'Storage_Index_ListMonitoringDetailsGrid_1',
		'ModelName' => 'MonitoringDemands',
		'ShowFilters' => true,
		'Height' => 300,
		'Width' => 500,
		'Columns' => array(
			'mndm_id' => array(
				'Name' => 'ID',
				'Field' => 'mndm_id',
				'Width' => 100,
			),
		),
		'params' => array(
			'actions' => array(
				'getMonitoringDetails' => 1,
			),
		),
	));
	?>
</div>
