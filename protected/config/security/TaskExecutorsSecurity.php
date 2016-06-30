<?php
return array(

	/** Роли для таблицы TaskExecutors **/
	'ManagerTaskExecutors' => array(
		'type' => CAuthItem::TYPE_ROLE,
		'description' => 'ManagerTaskExecutors',
		'bizRule' => null,
		'data' => null,
		'defaultIndex' => 'TaskExecutors/index',
		'children' => array(
			'ViewTaskExecutors',
			'CreateTaskExecutors',
			'UpdateTaskExecutors',
		),
	),

	'AdminTaskExecutors' => array(
		'type' => CAuthItem::TYPE_ROLE,
		'description' => 'AdminTaskExecutors',
		'bizRule' => null,
		'data' => null,
		'defaultIndex' => 'TaskExecutors/index',
		'children' => array(
			'ViewTaskExecutors',
			'CreateTaskExecutors',
			'UpdateTaskExecutors',
			'DeleteTaskExecutors',
		),
	),

	'UserTaskExecutors' => array(
		'type' => CAuthItem::TYPE_ROLE,
		'description' => 'UserTaskExecutors',
		'bizRule' => null,
		'data' => null,
		'defaultIndex' => 'TaskExecutors/index',
		'children' => array(
			'ViewTaskExecutors'
		),
	),

	'ViewTaskExecutors' => array(
		'type' => CAuthItem::TYPE_OPERATION,
		'description' => 'ViewTaskExecutors',
		'bizRule' => null,
		'data' => null,
	),

	'CreateTaskExecutors' => array(
		'type' => CAuthItem::TYPE_OPERATION,
		'description' => 'CreateTaskExecutors',
		'bizRule' => null,
		'data' => null,
	),

	'UpdateTaskExecutors' => array(
		'type' => CAuthItem::TYPE_OPERATION,
		'description' => 'UpdateTaskExecutors',
		'bizRule' => null,
		'data' => null,
	),

	'DeleteTaskExecutors' => array(
		'type' => CAuthItem::TYPE_OPERATION,
		'description' => 'DeleteTaskExecutors',
		'bizRule' => null,
		'data' => null,
	),

);