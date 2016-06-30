<?php
return array(

	/** Роли для таблицы Tasks  **/
	'ManagerTasks' => array(
		'type' => CAuthItem::TYPE_ROLE,
		'description' => 'ManagerTasks',
		'bizRule' => null,
		'data' => null,
		'defaultIndex' => 'Tasks/index',
		'children' => array(
			'ViewTasks',
			'CreateTasks',
			'UpdateTasks',
		),
	),

	'AdminTasks' => array(
		'type' => CAuthItem::TYPE_ROLE,
		'description' => 'AdminTasks',
		'bizRule' => null,
		'data' => null,
		'defaultIndex' => 'Tasks/index',
		'children' => array(
			'ViewTasks',
			'CreateTasks',
			'UpdateTasks',
			'DeleteTasks',
		),
	),

	'UserTasks' => array(
		'type' => CAuthItem::TYPE_ROLE,
		'description' => 'UserTasks',
		'bizRule' => null,
		'data' => null,
		'defaultIndex' => 'Tasks/index',
		'children' => array(
			'ViewTasks'
		),
	),

	'ViewTasks' => array(
		'type' => CAuthItem::TYPE_OPERATION,
		'description' => 'ViewTasks',
		'bizRule' => null,
		'data' => null,
	),

	'CreateTasks' => array(
		'type' => CAuthItem::TYPE_OPERATION,
		'description' => 'CreateTasks',
		'bizRule' => null,
		'data' => null,
	),

	'UpdateTasks' => array(
		'type' => CAuthItem::TYPE_OPERATION,
		'description' => 'UpdateTasks',
		'bizRule' => null,
		'data' => null,
	),

	'DeleteTasks' => array(
		'type' => CAuthItem::TYPE_OPERATION,
		'description' => 'DeleteTasks',
		'bizRule' => null,
		'data' => null,
	),

);