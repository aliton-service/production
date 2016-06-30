<?php
return array(

	/** Роли для таблицы Events (графики) **/
	'ManagerEvents' => array(
		'type' => CAuthItem::TYPE_ROLE,
		'description' => 'ManagerEvents',
		'bizRule' => null,
		'data' => null,
		'defaultIndex' => 'Events/index',
		'children' => array(
			'ViewEvents',
			'CreateEvents',
			'UpdateEvents',
		),
	),

	'AdminEvents' => array(
		'type' => CAuthItem::TYPE_ROLE,
		'description' => 'AdminEvents',
		'bizRule' => null,
		'data' => null,
		'defaultIndex' => 'Events/index',
		'children' => array(
			'ViewEvents',
			'CreateEvents',
			'UpdateEvents',
			'DeleteEvents',
		),
	),

	'UserEvents' => array(
		'type' => CAuthItem::TYPE_ROLE,
		'description' => 'UserEvents',
		'bizRule' => null,
		'data' => null,
		'defaultIndex' => 'Events/index',
		'children' => array(
			'ViewEvents'
		),
	),

	'ViewEvents' => array(
		'type' => CAuthItem::TYPE_OPERATION,
		'description' => 'ViewEvents',
		'bizRule' => null,
		'data' => null,
	),

	'CreateEvents' => array(
		'type' => CAuthItem::TYPE_OPERATION,
		'description' => 'CreateEvents',
		'bizRule' => null,
		'data' => null,
	),

	'UpdateEvents' => array(
		'type' => CAuthItem::TYPE_OPERATION,
		'description' => 'UpdateEvents',
		'bizRule' => null,
		'data' => null,
	),

	'DeleteEvents' => array(
		'type' => CAuthItem::TYPE_OPERATION,
		'description' => 'DeleteEvents',
		'bizRule' => null,
		'data' => null,
	),

);