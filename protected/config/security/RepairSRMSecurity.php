<?php

return array(
	'AdminRepairSRM' => array(
		'type' => CAuthItem::TYPE_ROLE,
		'description' => 'Админ раздела ремонт',
		'bizRule' => null,
		'data' => null,
		'defaultIndex' => 'RepairSRM',
		'children' => array(
			'ViewRepairSRM',
			'UpdateRepairSRM',
			'CreateRepairSRM',
			'DeleteRepairSRM',
                        'AgreedRepairSRM',
		),
	),

	'ViewRepairSRM' => array(
		'type' => CAuthItem::TYPE_OPERATION,
		'description' => 'ViewRepairSRM',
		'bizRule' => null,
		'data' => null,
		'defaultIndex' => 'Repais',
	),
    
        'AgreedRepairSRM' => array(
		'type' => CAuthItem::TYPE_OPERATION,
		'description' => 'AgreedRepairSRM',
		'bizRule' => null,
		'data' => null,
		'defaultIndex' => 'Repais',
	),

	'UpdateRepairSRM' => array(
		'type' => CAuthItem::TYPE_OPERATION,
		'description' => 'UpdateRepairSRM',
		'bizRule' => null,
		'data' => null,
		'defaultIndex' => 'Repais',
	),

	'CreateRepairSRM' => array(
		'type' => CAuthItem::TYPE_OPERATION,
		'description' => 'CreateRepairSRM',
		'bizRule' => null,
		'data' => null,
		'defaultIndex' => 'Repais',
	),

	'DeleteRepairSRM' => array(
		'type' => CAuthItem::TYPE_OPERATION,
		'description' => 'DeleteRepairSRM',
		'bizRule' => null,
		'data' => null,
		'defaultIndex' => 'Repais',
	),
);



