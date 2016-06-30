<?php
return array(

	/** Роли для RepairDetails **/
	'ManagerRepairDetails' => array(
		'type' => CAuthItem::TYPE_ROLE,
		'description' => 'ManagerRepairDetails',
		'bizRule' => null,
		'data' => null,
		'defaultIndex' => 'RepairDetails/index',
		'children' => array(
			'ViewRepairDetails',
			'CreateRepairDetails',
			'UpdateRepairDetails',
		),
	),

	'AdminRepairDetails' => array(
		'type' => CAuthItem::TYPE_ROLE,
		'description' => 'AdminRepairDetails',
		'bizRule' => null,
		'data' => null,
		'defaultIndex' => 'RepairDetails/index',
		'children' => array(
			'ViewRepairDetails',
			'CreateRepairDetails',
			'UpdateRepairDetails',
			'DeleteRepairDetails',
		),
	),

	'UserRepairDetails' => array(
		'type' => CAuthItem::TYPE_ROLE,
		'description' => 'UserRepairDetails',
		'bizRule' => null,
		'data' => null,
		'defaultIndex' => 'RepairDetails/index',
		'children' => array(
			'ViewRepairDetails'
		),
	),

	'ViewRepairDetails' => array(
		'type' => CAuthItem::TYPE_OPERATION,
		'description' => 'ViewRepairDetails',
		'bizRule' => null,
		'data' => null,
	),

	'CreateRepairDetails' => array(
		'type' => CAuthItem::TYPE_OPERATION,
		'description' => 'CreateRepairDetails',
		'bizRule' => null,
		'data' => null,
	),

	'UpdateRepairDetails' => array(
		'type' => CAuthItem::TYPE_OPERATION,
		'description' => 'UpdateRepairDetails',
		'bizRule' => null,
		'data' => null,
	),

	'DeleteRepairDetails' => array(
		'type' => CAuthItem::TYPE_OPERATION,
		'description' => 'DeleteRepairDetails',
		'bizRule' => null,
		'data' => null,
	),

);