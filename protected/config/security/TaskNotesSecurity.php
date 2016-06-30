<?php
return array(

	/** Роли для таблицы TaskNotes **/
	'ManagerTaskNotes' => array(
		'type' => CAuthItem::TYPE_ROLE,
		'description' => 'ManagerTaskNotes',
		'bizRule' => null,
		'data' => null,
		'defaultIndex' => 'TaskNotes/index',
		'children' => array(
			'ViewTaskNotes',
			'CreateTaskNotes',
			'UpdateTaskNotes',
		),
	),

	'AdminTaskNotes' => array(
		'type' => CAuthItem::TYPE_ROLE,
		'description' => 'AdminTaskNotes',
		'bizRule' => null,
		'data' => null,
		'defaultIndex' => 'TaskNotes/index',
		'children' => array(
			'ViewTaskNotes',
			'CreateTaskNotes',
			'UpdateTaskNotes',
			'DeleteTaskNotes',
		),
	),

	'UserTaskNotes' => array(
		'type' => CAuthItem::TYPE_ROLE,
		'description' => 'UserTaskNotes',
		'bizRule' => null,
		'data' => null,
		'defaultIndex' => 'TaskNotes/index',
		'children' => array(
			'ViewTaskNotes'
		),
	),

	'ViewTaskNotes' => array(
		'type' => CAuthItem::TYPE_OPERATION,
		'description' => 'ViewTaskNotes',
		'bizRule' => null,
		'data' => null,
	),

	'CreateTaskNotes' => array(
		'type' => CAuthItem::TYPE_OPERATION,
		'description' => 'CreateTaskNotes',
		'bizRule' => null,
		'data' => null,
	),

	'UpdateTaskNotes' => array(
		'type' => CAuthItem::TYPE_OPERATION,
		'description' => 'UpdateTaskNotes',
		'bizRule' => null,
		'data' => null,
	),

	'DeleteTaskNotes' => array(
		'type' => CAuthItem::TYPE_OPERATION,
		'description' => 'DeleteTaskNotes',
		'bizRule' => null,
		'data' => null,
	),

);