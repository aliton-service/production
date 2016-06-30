<?php
return array(

	/** Роли для таблицы RepDebtReasons **/
	'ManagerRepDebtReasons' => array(
		'type' => CAuthItem::TYPE_ROLE,
		'description' => 'ManagerRepDebtReasons',
		'bizRule' => null,
		'data' => null,
		'defaultIndex' => 'RepDebtReasons/index',
		'children' => array(
			'ViewRepDebtReasons',
			'CreateRepDebtReasons',
			'UpdateRepDebtReasons',
		),
	),

	'AdminRepDebtReasons' => array(
		'type' => CAuthItem::TYPE_ROLE,
		'description' => 'AdminRepDebtReasons',
		'bizRule' => null,
		'data' => null,
		'defaultIndex' => 'RepDebtReasons/index',
		'children' => array(
			'ViewRepDebtReasons',
			'CreateRepDebtReasons',
			'UpdateRepDebtReasons',
			'DeleteRepDebtReasons',
		),
	),

	'UserRepDebtReasons' => array(
		'type' => CAuthItem::TYPE_ROLE,
		'description' => 'UserRepDebtReasons',
		'bizRule' => null,
		'data' => null,
		'defaultIndex' => 'RepDebtReasons/index',
		'children' => array(
			'ViewRepDebtReasons'
		),
	),

	'ViewRepDebtReasons' => array(
		'type' => CAuthItem::TYPE_OPERATION,
		'description' => 'ViewRepDebtReasons',
		'bizRule' => null,
		'data' => null,
	),

	'CreateRepDebtReasons' => array(
		'type' => CAuthItem::TYPE_OPERATION,
		'description' => 'CreateRepDebtReasons',
		'bizRule' => null,
		'data' => null,
	),

	'UpdateRepDebtReasons' => array(
		'type' => CAuthItem::TYPE_OPERATION,
		'description' => 'UpdateRepDebtReasons',
		'bizRule' => null,
		'data' => null,
	),

	'DeleteRepDebtReasons' => array(
		'type' => CAuthItem::TYPE_OPERATION,
		'description' => 'DeleteRepDebtReasons',
		'bizRule' => null,
		'data' => null,
	),

);