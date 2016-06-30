<?php

$this->widget('application.extensions.alitonwidgets.gridajax.algridajax', array(
	'id' => 'ListBillComingGrid',
	'Stretch' => true,
	'Key' => 'Storage_Index_ListBillComingGrid_1',
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
		'splr_name'=>array(
			'Name'=>'Поставщик',
			'FieldName'=>'splr_name',
			'Width'=>100,
		),
		'summa' => array(
			'Name'=>'Сумма',
			'FieldName'=>'summa',
			'Width'=>100,
		),
		'storage' => array(
			'Name'=>'Склад',
			'FieldName'=>'storage',
			'Width'=>100,
		),
		'ac_date' => array(
			'Name'=>'Принято на склад',
			'FieldName'=>'ac_date',
			'Width'=>100,
		),
		'strm_name' => array(
			'Name'=>'Кладовщик',
			'FieldName'=>'strm_name',
			'Width'=>100,
		),
		'c_date' => array(
			'Name'=>'Дата отмены принятия',
			'FieldName'=>'c_date',
			'Width'=>100,
		),
		'c_name' => array(
			'Name'=>'Отменил',
			'FieldName'=>'c_name',
			'Width'=>100,
		),
		'c_confirmname' => array(
			'Name'=>'Основание отмены',
			'FieldName'=>'c_confirmname',
			'Width'=>100,
		),
	),

	'params' => array(
		'actions' => array(
			'setData' => 'bill_coming',
		),
	),

	'OnAfterClick' => 'docParam.id = settings.CurrentRow["docm_id"];
	 docParam.strg_id = settings.CurrentRow["strg_id"];
	 docParam.createUrl("#view-doc");
	 Aliton.wh.modelup(\'setProp\',{docm_id:settings.CurrentRow["docm_id"]}
	 		,Aliton.wh.modelup(\'getOpt\',\'sourceNote\'))',
));

