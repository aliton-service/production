<?php

return array(
    'AdminPriceMonitoring' => array(
        'type' => CAuthItem::TYPE_ROLE,
        'description' => 'AdminPriceMonitoring',
        'bizRule' => null,
        'data' => null,
        'defaultIndex' => 'PriceMonitoring',
        'children' => array(
            'ViewPriceMonitoring',
            'UpdatePriceMonitoring',
            'CreatePriceMonitoring',
            'DeletePriceMonitoring',
        ),
    ),
    
    'ManagerPriceMonitoring' => array(
        'type' => CAuthItem::TYPE_ROLE,
        'description' => 'ManagerPriceMonitoring',
        'bizRule' => null,
        'data' => null,
        'defaultIndex' => 'PriceMonitoring',
        'children' => array(
            'ViewPriceMonitoring',
            'UpdatePriceMonitoring',
            'CreatePriceMonitoring',
        ),
    ),
    
    'UserPriceMonitoring' => array(
        'type' => CAuthItem::TYPE_ROLE,
        'description' => 'UserPriceMonitoring',
        'bizRule' => null,
        'data' => null,
        'defaultIndex' => 'PriceMonitoring',
        'children' => array(
            'ViewPriceMonitoring',
        ),
    ),

    'ViewPriceMonitoring' => array(
        'type' => CAuthItem::TYPE_OPERATION,
        'description' => 'ViewPriceMonitoring',
        'bizRule' => null,
        'data' => null,
        'defaultIndex' => 'PriceMonitoring',
    ),

    'UpdatePriceMonitoring' => array(
        'type' => CAuthItem::TYPE_OPERATION,
        'description' => 'UpdatePriceMonitoring',
        'bizRule' => null,
        'data' => null,
        'defaultIndex' => 'PriceMonitoring',
    ),

    'CreatePriceMonitoring' => array(
        'type' => CAuthItem::TYPE_OPERATION,
        'description' => 'CreatePriceMonitoring',
        'bizRule' => null,
        'data' => null,
        'defaultIndex' => 'PriceMonitoring',
    ),

    'DeletePriceMonitoring' => array(
        'type' => CAuthItem::TYPE_OPERATION,
        'description' => 'DeletePriceMonitoring',
        'bizRule' => null,
        'data' => null,
        'defaultIndex' => 'PriceMonitoring',
    ),
);