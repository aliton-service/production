<?php

return array(
	'LogisticAdministrator' => array(
		'type' => CAuthItem::TYPE_ROLE,
		'description' => 'Руководитель отдела логистики',
		'bizRule' => null,
		'data' => null,
		'defaultIndex' => 'repair',
		'children' => array(
			'AdminRepair'
		),
	),

	'AdminRepair' => array(
		'type' => CAuthItem::TYPE_ROLE,
		'description' => 'Админ раздела ремонт',
		'bizRule' => null,
		'data' => null,
		'defaultIndex' => 'repair',
		'children' => array(
			'ViewRepair',
			'UpdateRepair',
			'CreateRepair',
			'DeleteRepair',
			'EditDeliveryDemands',
		),
	),

	'ViewRepair' => array(
		'type' => CAuthItem::TYPE_ROLE,
		'description' => 'ViewRepair',
		'bizRule' => null,
		'data' => null,
		'defaultIndex' => 'repair',
	),

	'UpdateRepair' => array(
		'type' => CAuthItem::TYPE_ROLE,
		'description' => 'UpdateRepair',
		'bizRule' => null,
		'data' => null,
		'defaultIndex' => 'repair',
	),

	'CreateRepair' => array(
		'type' => CAuthItem::TYPE_ROLE,
		'description' => 'CreateRepair',
		'bizRule' => null,
		'data' => null,
		'defaultIndex' => 'repair',
	),

	'DeleteRepair' => array(
		'type' => CAuthItem::TYPE_ROLE,
		'description' => 'DeleteRepair',
		'bizRule' => null,
		'data' => null,
		'defaultIndex' => 'repair',
	),
);