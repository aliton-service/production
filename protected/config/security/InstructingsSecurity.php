<?php
return array(

	/** Роли для таблицы Instructings (инструктаж) **/
	'ManagerInstructings' => array(
		'type' => CAuthItem::TYPE_ROLE,
		'description' => 'ManagerInstructings',
		'bizRule' => null,
		'data' => null,
		'defaultIndex' => 'Instructings/index',
		'children' => array(
			'ViewInstructings',
			'CreateInstructings',
			'UpdateInstructings',
		),
	),

	'AdminInstructings' => array(
		'type' => CAuthItem::TYPE_ROLE,
		'description' => 'AdminInstructings',
		'bizRule' => null,
		'data' => null,
		'defaultIndex' => 'Instructings/index',
		'children' => array(
			'ViewInstructings',
			'CreateInstructings',
			'UpdateInstructings',
			'DeleteInstructings',
		),
	),

	'UserInstructings' => array(
		'type' => CAuthItem::TYPE_ROLE,
		'description' => 'UserInstructings',
		'bizRule' => null,
		'data' => null,
		'defaultIndex' => 'Instructings/index',
		'children' => array(
			'ViewInstructings'
		),
	),

	'ViewInstructings' => array(
		'type' => CAuthItem::TYPE_OPERATION,
		'description' => 'ViewInstructings',
		'bizRule' => null,
		'data' => null,
	),

	'CreateInstructings' => array(
		'type' => CAuthItem::TYPE_OPERATION,
		'description' => 'CreateInstructings',
		'bizRule' => null,
		'data' => null,
	),

	'UpdateInstructings' => array(
		'type' => CAuthItem::TYPE_OPERATION,
		'description' => 'UpdateInstructings',
		'bizRule' => null,
		'data' => null,
	),

	'DeleteInstructings' => array(
		'type' => CAuthItem::TYPE_OPERATION,
		'description' => 'DeleteInstructings',
		'bizRule' => null,
		'data' => null,
	),

);