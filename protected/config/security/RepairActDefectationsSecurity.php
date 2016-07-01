<?php

return array(
	'AdminRepairActDefectations' => array(
		'type' => CAuthItem::TYPE_ROLE,
		'description' => 'Админ раздела ремонт',
		'bizRule' => null,
		'data' => null,
		'defaultIndex' => 'RepairActDefectations',
		'children' => array(
			'ViewRepairActDefectations',
			'UpdateRepairActDefectations',
			'CreateRepairActDefectations',
			'DeleteRepairActDefectations',
                        'AgreedRepairActDefectations',
		),
	),

	'ViewRepairActDefectations' => array(
		'type' => CAuthItem::TYPE_OPERATION,
		'description' => 'ViewRepairActDefectations',
		'bizRule' => null,
		'data' => null,
		'defaultIndex' => 'Repais',
	),
    
        'AgreedRepairActDefectations' => array(
		'type' => CAuthItem::TYPE_OPERATION,
		'description' => 'AgreedRepairActDefectations',
		'bizRule' => null,
		'data' => null,
		'defaultIndex' => 'Repais',
	),

	'UpdateRepairActDefectations' => array(
		'type' => CAuthItem::TYPE_OPERATION,
		'description' => 'UpdateRepairActDefectations',
		'bizRule' => null,
		'data' => null,
		'defaultIndex' => 'Repais',
	),

	'CreateRepairActDefectations' => array(
		'type' => CAuthItem::TYPE_OPERATION,
		'description' => 'CreateRepairActDefectations',
		'bizRule' => null,
		'data' => null,
		'defaultIndex' => 'Repais',
	),

	'DeleteRepairActDefectations' => array(
		'type' => CAuthItem::TYPE_OPERATION,
		'description' => 'DeleteRepairActDefectations',
		'bizRule' => null,
		'data' => null,
		'defaultIndex' => 'Repais',
	),
);

