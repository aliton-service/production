<?php

$this->widget('application.extensions.alitonwidgets.gridajax.algridajax', array(
	'id' => 'grant-history',
	'Stretch' => true,
	'Key' => 'Storage_Index_grantHistory_1',
	'ModelName' => 'WHDocuments',
	'ShowFilters' => true,
	'Height' => 300,
	'Width' => 500,
	'Columns' => array(
		'' => array(
			'Name'=>'',
			'FieldName'=>'',
			'Width'=>100,
		),
		'' => array(
			'Name'=>'',
			'FieldName'=>'',
			'Width'=>100,
		),
		'' => array(
			'Name'=>'',
			'FieldName'=>'',
			'Width'=>100,
		),
	),

	'params' => array(
		'actions' => array(
			'getGrantHistory' => $id,
		),
	),

	'OnAfterClick'=>''


));