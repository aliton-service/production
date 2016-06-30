<?php
return array(

	/** Роли для таблицы ExecuteReports (отчеты исполнителей) **/
	'ManagerExecuteReports' => array(
		'type' => CAuthItem::TYPE_ROLE,
		'description' => 'ManagerExecuteReports',
		'bizRule' => null,
		'data' => null,
		'defaultIndex' => 'EquipTypes/index',
		'children' => array(
			'ViewExecuteReports',
			'CreateExecuteReports',
			'UpdateExecuteReports',
		),
	),

	'AdminExecuteReports' => array(
		'type' => CAuthItem::TYPE_ROLE,
		'description' => 'AdminExecuteReports',
		'bizRule' => null,
		'data' => null,
		'defaultIndex' => 'EquipTypes/index',
		'children' => array(
			'ViewExecuteReports',
			'CreateExecuteReports',
			'UpdateExecuteReports',
			'DeleteExecuteReports',
		),
	),

	'UserExecuteReports' => array(
		'type' => CAuthItem::TYPE_ROLE,
		'description' => 'UserExecuteReports',
		'bizRule' => null,
		'data' => null,
		'defaultIndex' => 'EquipTypes/index',
		'children' => array(
			'ViewExecuteReports'
		),
	),

	'ViewExecuteReports' => array(
		'type' => CAuthItem::TYPE_OPERATION,
		'description' => 'ViewExecuteReports',
		'bizRule' => null,
		'data' => null,
	),

	'CreateExecuteReports' => array(
		'type' => CAuthItem::TYPE_OPERATION,
		'description' => 'CreateExecuteReports',
		'bizRule' => null,
		'data' => null,
	),

	'UpdateExecuteReports' => array(
		'type' => CAuthItem::TYPE_OPERATION,
		'description' => 'UpdateExecuteReports',
		'bizRule' => null,
		'data' => null,
	),

	'DeleteExecuteReports' => array(
		'type' => CAuthItem::TYPE_OPERATION,
		'description' => 'DeleteExecuteReports',
		'bizRule' => null,
		'data' => null,
	),

);