<?php

$this->widget('application.extensions.alitonwidgets.gridajax.algridajax', array(
	'id' => 'ListDocumentsAllGrid',
	'Stretch' => true,
	'Key' => 'Storage_Index_ListDocumentsAllGrid_1',
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
		'wrtp_gr' => array(
			'Name'=>'Склад/Вид работ',
			'FieldName'=>'wrtp_gr',
			'Width'=>100,
		),
		'storage' => array(
			'Name'=>'Склад',
			'FieldName'=>'storage',
			'Width'=>100,
		),
		'actn_name' => array(
			'Name'=>'Операция',
			'FieldName'=>'actn_name',
			'Width'=>100,
		),
		'ac_date' => array(
			'Name'=>'Дата',
			'FieldName'=>'ac_date',
			'Width'=>100,
		),
		'Source' => array(
			'Name'=>'От',
			'FieldName'=>'Source',
			'Width'=>100,
		),
		'Destination' => array(
			'Name'=>'К',
			'FieldName'=>'Destination',
			'Width'=>100,
		),

	),

	'params' => array(
		'actions' => array(
			'setData' => 'all',
		),
	),

	'OnAfterClick' => '
	 Aliton.wh.modelup(\'setProp\',{docm_id:settings.CurrentRow["docm_id"]}
	 		,Aliton.wh.modelup(\'getOpt\',\'sourceNote\'))
	'

));