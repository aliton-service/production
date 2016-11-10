<?php
return array(

	'ManagerRepairDocs' => array(
		'type' => CAuthItem::TYPE_ROLE,
		'description' => 'ManagerRepairDocs',
		'bizRule' => null,
		'data' => null,
		'defaultIndex' => 'RepairDocs/index',
		'children' => array(
			'ViewRepairDocs',
			'CreateRepairDocs',
			'UpdateRepairDocs',
		),
	),

	'AdminRepairDocs' => array(
		'type' => CAuthItem::TYPE_ROLE,
		'description' => 'AdminRepairDocs',
		'bizRule' => null,
		'data' => null,
		'defaultIndex' => 'RepairDocs/index',
		'children' => array(
			'ViewRepairDocs',
			'CreateRepairDocs',
			'UpdateRepairDocs',
			'DeleteRepairDocs',
		),
	),

	'UserRepairDocs' => array(
		'type' => CAuthItem::TYPE_ROLE,
		'description' => 'UserRepairDocs',
		'bizRule' => null,
		'data' => null,
		'defaultIndex' => 'RepairDocs/index',
		'children' => array(
			'ViewRepairDocs'
		),
	),

	'ViewRepairDocs' => array(
		'type' => CAuthItem::TYPE_OPERATION,
		'description' => 'ViewRepairDocs',
		'bizRule' => null,
		'data' => null,
	),

	'CreateRepairDocs' => array(
		'type' => CAuthItem::TYPE_OPERATION,
		'description' => 'CreateRepairDocs',
		'bizRule' => null,
		'data' => null,
	),

	'UpdateRepairDocs' => array(
		'type' => CAuthItem::TYPE_OPERATION,
		'description' => 'UpdateRepairDocs',
		'bizRule' => null,
		'data' => null,
	),

	'DeleteRepairDocs' => array(
		'type' => CAuthItem::TYPE_OPERATION,
		'description' => 'DeleteRepairDocs',
		'bizRule' => null,
		'data' => null,
	),

);

