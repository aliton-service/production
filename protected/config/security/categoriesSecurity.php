<?php
return array(

	/** Роли для таблицы Categories (банки) **/
	'ManagerCategories' => array(
		'type' => CAuthItem::TYPE_ROLE,
		'description' => 'ManagerCategories',
		'bizRule' => null,
		'data' => null,
		'defaultIndex' => 'Categories/index',
		'children' => array(
			'ViewCategories',
			'CreateCategories',
			'UpdateCategories',
		),
	),

	'UserCategories' => array(
		'type' => CAuthItem::TYPE_ROLE,
		'description' => 'UserCategories',
		'bizRule' => null,
		'data' => null,
		'defaultIndex' => 'Categories/index',
		'children' => array(
			'ViewCategories',
		),
	),
	'AdminCategories' => array(
		'type' => CAuthItem::TYPE_ROLE,
		'description' => 'AdminCategories',
		'bizRule' => null,
		'data' => null,
		'defaultIndex' => 'Categories/index',
		'children' => array(
			'ViewCategories',
			'CreateCategories',
			'UpdateCategories',
			'DeleteCategories',
		),

	),

	'ViewCategories' => array(
		'type' => CAuthItem::TYPE_OPERATION,
		'description' => 'ViewCategories',
		'bizRule' => null,
		'data' => null,
	),

	'CreateCategories' => array(
		'type' => CAuthItem::TYPE_OPERATION,
		'description' => 'CreateCategories',
		'bizRule' => null,
		'data' => null,
	),

	'UpdateCategories' => array(
		'type' => CAuthItem::TYPE_OPERATION,
		'description' => 'UpdateCategories',
		'bizRule' => null,
		'data' => null,
	),

	'DeleteCategories' => array(
		'type' => CAuthItem::TYPE_OPERATION,
		'description' => 'DeleteCategories',
		'bizRule' => null,
		'data' => null,
	),
);