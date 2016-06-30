<?php

$this->widget('application.extensions.alitonwidgets.gridajax.algridajax', array(
	'id' => 'ListBillReturnGrid',
	'Stretch' => true,
	'Key' => 'Storage_Index_ListBillReturnGrid_1',
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
		'Address' => array(
			'Name'=>'Адрес объекта',
			'FieldName'=>'Address',
			'Width'=>100,
		),
		'rtrs_name' => array(
			'Name'=>'Причина возврата',
			'FieldName'=>'rtrs_name',
			'Width'=>100,
		),
		'storage' => array(
			'Name'=>'Склад',
			'FieldName'=>'storage',
			'Width'=>100,
		),
		'ac_date' => array(
			'Name'=>'Дата принятия',
			'FieldName'=>'ac_date',
			'Width'=>100,
		),
		'strm_name' => array(
			'Name'=>'Кладовщик',
			'FieldName'=>'strm_name',
			'Width'=>100,
		),
		'mstr_name' => array(
			'Name'=>'От',
			'FieldName'=>'mstr_name',
			'Width'=>100,
		),
	),

	'params' => array(
		'actions' => array(
			'setData' => 'bill_return',
		),
	),

	'OnAfterClick' => 'docParam.id = settings.CurrentRow["docm_id"];
	 docParam.strg_id = settings.CurrentRow["strg_id"];
	 docParam.createUrl("#view-doc");
	 docParam.actionCreate = "billComing";
	 Aliton.wh.modelup(\'setProp\',{docm_id:settings.CurrentRow["docm_id"]}
	 		,Aliton.wh.modelup(\'getOpt\',\'sourceNote\'))',
));
