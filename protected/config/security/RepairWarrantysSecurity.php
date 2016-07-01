<?php

return array(
	'AdminRepairWarrantys' => array(
		'type' => CAuthItem::TYPE_ROLE,
		'description' => 'Админ раздела ремонт',
		'bizRule' => null,
		'data' => null,
		'defaultIndex' => 'RepairWarrantys',
		'children' => array(
			'ViewRepairWarrantys',
			'UpdateRepairWarrantys',
			'CreateRepairWarrantys',
			'DeleteRepairWarrantys',
                        'AgreedRepairWarrantys',
		),
	),

	'ViewRepairWarrantys' => array(
		'type' => CAuthItem::TYPE_OPERATION,
		'description' => 'ViewRepairWarrantys',
		'bizRule' => null,
		'data' => null,
		'defaultIndex' => 'Repais',
	),
    
        'AgreedRepairWarrantys' => array(
		'type' => CAuthItem::TYPE_OPERATION,
		'description' => 'AgreedRepairWarrantys',
		'bizRule' => null,
		'data' => null,
		'defaultIndex' => 'Repais',
	),

	'UpdateRepairWarrantys' => array(
		'type' => CAuthItem::TYPE_OPERATION,
		'description' => 'UpdateRepairWarrantys',
		'bizRule' => null,
		'data' => null,
		'defaultIndex' => 'Repais',
	),

	'CreateRepairWarrantys' => array(
		'type' => CAuthItem::TYPE_OPERATION,
		'description' => 'CreateRepairWarrantys',
		'bizRule' => null,
		'data' => null,
		'defaultIndex' => 'Repais',
	),

	'DeleteRepairWarrantys' => array(
		'type' => CAuthItem::TYPE_OPERATION,
		'description' => 'DeleteRepairWarrantys',
		'bizRule' => null,
		'data' => null,
		'defaultIndex' => 'Repais',
	),
);





