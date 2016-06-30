<?php

$this->widget('application.extensions.alitonwidgets.gridajax.algridajax', array(
	'id' => 'ListMoveStorageGrid',
	'Stretch' => true,
	'Key' => 'Storage_Index_ListMoveStorageGrid_1',
	'ModelName' => 'WHDocuments',
	'ShowFilters' => true,
	'Height' => 300,
	'Width' => 500,
	'Columns' => array(
		'docm_id' => array(
			'Name' => 'Ид',
			'FieldName' => 'docm_id',
			'Width' => 100,
		),
		'dctp_name' => array(
			'Name'=>'dctp_name',
			'FieldName'=>'dctp_name',
			'Width'=> 100,
		),
		'number' => array(
			'Name'=>'Номер',
			'FieldName'=>'number',
			'Width'=>100,
		),
		'date' => array(
			'Name'=>'Дата',
			'FieldName'=>'date',
			'Width'=>100,
		),
		'date_create' => array(
			'Name'=>'Дата создания',
			'FieldName'=>'date_create',
			'Width'=>100,
		),
	),

	'params' => array(
		'actions' => array(
			'setData' => 'move_storage',
		),
	),

	'OnAfterClick' => 'docParam.id = settings.CurrentRow["docm_id"];
	 docParam.strg_id = settings.CurrentRow["strg_id"];
	 docParam.createUrl("#view-doc");
	 Aliton.wh.modelup(\'setProp\',{docm_id:settings.CurrentRow["docm_id"]}
	 		,Aliton.wh.modelup(\'getOpt\',\'sourceNote\'))',
));