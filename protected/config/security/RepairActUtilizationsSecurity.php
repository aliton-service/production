<?php

return array(
	'AdminRepairActUtilizations' => array(
		'type' => CAuthItem::TYPE_ROLE,
		'description' => 'Админ раздела ремонт',
		'bizRule' => null,
		'data' => null,
		'defaultIndex' => 'RepairActUtilizations',
		'children' => array(
			'ViewRepairActUtilizations',
			'UpdateRepairActUtilizations',
			'CreateRepairActUtilizations',
			'DeleteRepairActUtilizations',
                        'AgreedRepairActUtilizations',
		),
	),

	'ViewRepairActUtilizations' => array(
		'type' => CAuthItem::TYPE_OPERATION,
		'description' => 'ViewRepairActUtilizations',
		'bizRule' => null,
		'data' => null,
		'defaultIndex' => 'Repais',
	),
    
        'AgreedRepairActUtilizations' => array(
		'type' => CAuthItem::TYPE_OPERATION,
		'description' => 'AgreedRepairActUtilizations',
		'bizRule' => null,
		'data' => null,
		'defaultIndex' => 'Repais',
	),

	'UpdateRepairActUtilizations' => array(
		'type' => CAuthItem::TYPE_OPERATION,
		'description' => 'UpdateRepairActUtilizations',
		'bizRule' => null,
		'data' => null,
		'defaultIndex' => 'Repais',
	),

	'CreateRepairActUtilizations' => array(
		'type' => CAuthItem::TYPE_OPERATION,
		'description' => 'CreateRepairActUtilizations',
		'bizRule' => null,
		'data' => null,
		'defaultIndex' => 'Repais',
	),

	'DeleteRepairActUtilizations' => array(
		'type' => CAuthItem::TYPE_OPERATION,
		'description' => 'DeleteRepairActUtilizations',
		'bizRule' => null,
		'data' => null,
		'defaultIndex' => 'Repais',
	),
);





