<?php
return array(

	/** Роли для таблицы RepDebtReasonDetails **/
	'ManagerRepDebtReasonDetails' => array(
		'type' => CAuthItem::TYPE_ROLE,
		'description' => 'ManagerRepDebtReasonDetails',
		'bizRule' => null,
		'data' => null,
		'defaultIndex' => 'RepDebtReasonDetails/index',
		'children' => array(
			'ViewRepDebtReasonDetails',
			'CreateRepDebtReasonDetails',
			'UpdateRepDebtReasonDetails',
		),
	),

	'AdminRepDebtReasonDetails' => array(
		'type' => CAuthItem::TYPE_ROLE,
		'description' => 'AdminRepDebtReasonDetails',
		'bizRule' => null,
		'data' => null,
		'defaultIndex' => 'RepDebtReasonDetails/index',
		'children' => array(
			'ViewRepDebtReasonDetails',
			'CreateRepDebtReasonDetails',
			'UpdateRepDebtReasonDetails',
			'DeleteRepDebtReasonDetails',
		),
	),

	'UserRepDebtReasonDetails' => array(
		'type' => CAuthItem::TYPE_ROLE,
		'description' => 'UserRepDebtReasonDetails',
		'bizRule' => null,
		'data' => null,
		'defaultIndex' => 'RepDebtReasonDetails/index',
		'children' => array(
			'ViewRepDebtReasonDetails'
		),
	),

	'ViewRepDebtReasonDetails' => array(
		'type' => CAuthItem::TYPE_OPERATION,
		'description' => 'ViewRepDebtReasonDetails',
		'bizRule' => null,
		'data' => null,
	),

	'CreateRepDebtReasonDetails' => array(
		'type' => CAuthItem::TYPE_OPERATION,
		'description' => 'CreateRepDebtReasonDetails',
		'bizRule' => null,
		'data' => null,
	),

	'UpdateRepDebtReasonDetails' => array(
		'type' => CAuthItem::TYPE_OPERATION,
		'description' => 'UpdateRepDebtReasonDetails',
		'bizRule' => null,
		'data' => null,
	),

	'DeleteRepDebtReasonDetails' => array(
		'type' => CAuthItem::TYPE_OPERATION,
		'description' => 'DeleteRepDebtReasonDetails',
		'bizRule' => null,
		'data' => null,
	),

);