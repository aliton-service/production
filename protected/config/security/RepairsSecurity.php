<?php

return array(
	'AdminRepairs' => array(
		'type' => CAuthItem::TYPE_ROLE,
		'description' => 'Админ раздела ремонт',
		'bizRule' => null,
		'data' => null,
		'defaultIndex' => 'Repairs',
		'children' => array(
			'ViewRepairs',
			'UpdateRepairs',
			'CreateRepairs',
			'DeleteRepairs',
                        'SetTask',
                        'SortTask',
                        'ViewRepairEngineerInformation',
                        'AcceptRepairs',
                        'UndoAcceptRepairs',
                        'SendAgreeRepairs',
                        'ReadyRepairs',
                        'ReturnRepairs',
                        'ExecRepairs',
                        'AgreeRepairs',
                        'NoAgreeRepairs',
		),
	),
    
        'UserRepairs' => array(
		'type' => CAuthItem::TYPE_ROLE,
		'description' => 'Админ раздела ремонт',
		'bizRule' => null,
		'data' => null,
		'defaultIndex' => 'Repairs',
		'children' => array(
			'ViewRepairs',
                        'UpdateRepairs',
			'CreateRepairs',
                ),
         ),

	'ViewRepairs' => array(
		'type' => CAuthItem::TYPE_OPERATION,
		'description' => 'ViewRepairs',
		'bizRule' => null,
		'data' => null,
		'defaultIndex' => 'Repais',
	),

	'UpdateRepairs' => array(
		'type' => CAuthItem::TYPE_OPERATION,
		'description' => 'UpdateRepairs',
		'bizRule' => null,
		'data' => null,
		'defaultIndex' => 'Repais',
	),

	'CreateRepairs' => array(
		'type' => CAuthItem::TYPE_OPERATION,
		'description' => 'CreateRepairs',
		'bizRule' => null,
		'data' => null,
		'defaultIndex' => 'Repais',
	),

	'DeleteRepairs' => array(
		'type' => CAuthItem::TYPE_OPERATION,
		'description' => 'DeleteRepairs',
		'bizRule' => null,
		'data' => null,
		'defaultIndex' => 'Repais',
	),
    
        'SetTask' => array(
		'type' => CAuthItem::TYPE_OPERATION,
		'description' => 'SetTask',
		'bizRule' => null,
		'data' => null,
		'defaultIndex' => 'Repais',
	),
    
        'SortTask' => array(
		'type' => CAuthItem::TYPE_OPERATION,
		'description' => 'SortTask',
		'bizRule' => null,
		'data' => null,
		'defaultIndex' => 'Repais',
	),
    
        'ViewRepairEngineerInformation' => array(
		'type' => CAuthItem::TYPE_OPERATION,
		'description' => 'ViewRepairEngineerInformation',
		'bizRule' => null,
		'data' => null,
		'defaultIndex' => 'Repais',
	),
    
        'AcceptRepairs' => array(
		'type' => CAuthItem::TYPE_OPERATION,
		'description' => 'AcceptRepairs',
		'bizRule' => null,
		'data' => null,
		'defaultIndex' => 'Repais',
	),
    
        'ReadyRepairs' => array(
		'type' => CAuthItem::TYPE_OPERATION,
		'description' => 'ReadyRepairs',
		'bizRule' => null,
		'data' => null,
		'defaultIndex' => 'Repais',
	),
    
        'AgreeRepairs' => array(
		'type' => CAuthItem::TYPE_OPERATION,
		'description' => 'AgreeRepairs',
		'bizRule' => null,
		'data' => null,
		'defaultIndex' => 'Repais',
	),
    
        'NoAgreeRepairs' => array(
		'type' => CAuthItem::TYPE_OPERATION,
		'description' => 'AgreeRepairs',
		'bizRule' => null,
		'data' => null,
		'defaultIndex' => 'Repais',
	),
    
        'ReturnRepairs' => array(
		'type' => CAuthItem::TYPE_OPERATION,
		'description' => 'ReturnRepairs',
		'bizRule' => null,
		'data' => null,
		'defaultIndex' => 'Repais',
	),
    
        'ExecRepairs' => array(
		'type' => CAuthItem::TYPE_OPERATION,
		'description' => 'ExecRepairs',
		'bizRule' => null,
		'data' => null,
		'defaultIndex' => 'Repais',
	),
    
        'SendAgreeRepairs' => array(
		'type' => CAuthItem::TYPE_OPERATION,
		'description' => 'SendAgreeRepairs',
		'bizRule' => null,
		'data' => null,
		'defaultIndex' => 'Repais',
	),
    
        'UndoAcceptRepairs' => array(
		'type' => CAuthItem::TYPE_OPERATION,
		'description' => 'UndoAcceptRepairs',
		'bizRule' => null,
		'data' => null,
		'defaultIndex' => 'Repais',
	),
        
);