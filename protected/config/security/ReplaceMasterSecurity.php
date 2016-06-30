<?php
return array(

	/** Роли для таблицы ReplaceMaster  **/
	'ManagerReplaceMaster' => array(
		'type' => CAuthItem::TYPE_ROLE,
		'description' => 'ManagerReplaceMaster',
		'bizRule' => null,
		'data' => null,
		'defaultIndex' => 'ReplaceMaster/index',
		'children' => array(
			'ViewReplaceMaster',
			'CreateReplaceMaster',
			'UpdateReplaceMaster',
		),
	),

	'AdminReplaceMaster' => array(
		'type' => CAuthItem::TYPE_ROLE,
		'description' => 'AdminReplaceMaster',
		'bizRule' => null,
		'data' => null,
		'defaultIndex' => 'ReplaceMaster/index',
		'children' => array(
			'ViewReplaceMaster',
			'CreateReplaceMaster',
			'UpdateReplaceMaster',
			'DeleteReplaceMaster',
		),
	),

	'UserReplaceMaster' => array(
		'type' => CAuthItem::TYPE_ROLE,
		'description' => 'UserReplaceMaster',
		'bizRule' => null,
		'data' => null,
		'defaultIndex' => 'ReplaceMaster/index',
		'children' => array(
			'ViewReplaceMaster'
		),
	),

	'ViewReplaceMaster' => array(
		'type' => CAuthItem::TYPE_OPERATION,
		'description' => 'ViewReplaceMaster',
		'bizRule' => null,
		'data' => null,
	),

	'CreateReplaceMaster' => array(
		'type' => CAuthItem::TYPE_OPERATION,
		'description' => 'CreateReplaceMaster',
		'bizRule' => null,
		'data' => null,
	),

	'UpdateReplaceMaster' => array(
		'type' => CAuthItem::TYPE_OPERATION,
		'description' => 'UpdateReplaceMaster',
		'bizRule' => null,
		'data' => null,
	),

	'DeleteReplaceMaster' => array(
		'type' => CAuthItem::TYPE_OPERATION,
		'description' => 'DeleteReplaceMaster',
		'bizRule' => null,
		'data' => null,
	),

);