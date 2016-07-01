<?php
return array(

	'ManagerRepairMaterials' => array(
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

	'AdminRepairMaterials' => array(
		'type' => CAuthItem::TYPE_ROLE,
		'description' => 'AdminRepairMaterials',
		'bizRule' => null,
		'data' => null,
		'defaultIndex' => 'RepairMaterials/index',
		'children' => array(
			'ViewRepairMaterials',
			'CreateRepairMaterials',
			'UpdateRepairMaterials',
			'DeleteRepairMaterials',
		),
	),

	'UserRepairMaterials' => array(
		'type' => CAuthItem::TYPE_ROLE,
		'description' => 'UserRepairMaterials',
		'bizRule' => null,
		'data' => null,
		'defaultIndex' => 'RepairMaterials/index',
		'children' => array(
			'ViewRepairMaterials'
		),
	),

	'ViewRepairMaterials' => array(
		'type' => CAuthItem::TYPE_OPERATION,
		'description' => 'ViewRepairMaterials',
		'bizRule' => null,
		'data' => null,
	),

	'CreateRepairMaterials' => array(
		'type' => CAuthItem::TYPE_OPERATION,
		'description' => 'CreateRepairMaterials',
		'bizRule' => null,
		'data' => null,
	),

	'UpdateRepairMaterials' => array(
		'type' => CAuthItem::TYPE_OPERATION,
		'description' => 'UpdateRepairMaterials',
		'bizRule' => null,
		'data' => null,
	),

	'DeleteRepairMaterials' => array(
		'type' => CAuthItem::TYPE_OPERATION,
		'description' => 'DeleteRepairMaterials',
		'bizRule' => null,
		'data' => null,
	),

);