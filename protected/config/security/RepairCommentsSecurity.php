<?php
return array(

	/** Роли для RepairComments **/
	'ManagerRepairComments' => array(
		'type' => CAuthItem::TYPE_ROLE,
		'description' => 'ManagerRepairComments',
		'bizRule' => null,
		'data' => null,
		'defaultIndex' => 'RepairComments/index',
		'children' => array(
			'ViewRepairComments',
			'CreateRepairComments',
			'UpdateRepairComments',
		),
	),

	'AdminRepairComments' => array(
		'type' => CAuthItem::TYPE_ROLE,
		'description' => 'AdminRepairComments',
		'bizRule' => null,
		'data' => null,
		'defaultIndex' => 'RepairComments/index',
		'children' => array(
			'ViewRepairComments',
			'CreateRepairComments',
			'UpdateRepairComments',
			'DeleteRepairComments',
		),
	),

	'UserRepairComments' => array(
		'type' => CAuthItem::TYPE_ROLE,
		'description' => 'UserRepairComments',
		'bizRule' => null,
		'data' => null,
		'defaultIndex' => 'RepairComments/index',
		'children' => array(
			'ViewRepairComments'
		),
	),

	'ViewRepairComments' => array(
		'type' => CAuthItem::TYPE_OPERATION,
		'description' => 'ViewRepairComments',
		'bizRule' => null,
		'data' => null,
	),

	'CreateRepairComments' => array(
		'type' => CAuthItem::TYPE_OPERATION,
		'description' => 'CreateRepairComments',
		'bizRule' => null,
		'data' => null,
	),

	'UpdateRepairComments' => array(
		'type' => CAuthItem::TYPE_OPERATION,
		'description' => 'UpdateRepairComments',
		'bizRule' => null,
		'data' => null,
	),

	'DeleteRepairComments' => array(
		'type' => CAuthItem::TYPE_OPERATION,
		'description' => 'DeleteRepairComments',
		'bizRule' => null,
		'data' => null,
	),

);