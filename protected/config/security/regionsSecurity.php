<?php

    return array(
    'ManagerRegions' => array(
        'type' => CAuthItem::TYPE_ROLE,
        'description' => 'ManagerRerions',
        'bizRule' => null,
        'data' => null,
        'defaultIndex' => 'regions/index',
        'children' => array(
            'ViewRegions',
            'CreateRegions',
            'UpdateRegions',
            ),
    ),

    'UserRegions' => array(
        'type' => CAuthItem::TYPE_ROLE,
        'description' => 'UserRegions',
        'bizRule' => null,
        'data' => null,
        'defaultIndex' => 'regions/index',
        'children' => array(
            'ViewRegions',
            ),
    ),
    'AdminRegions' => array(
        'type' => CAuthItem::TYPE_ROLE,
        'description' => 'AdminRegions',
        'bizRule' => null,
        'data' => null,
        'defaultIndex' => 'regions/index',
        'children' => array(
            'ViewRegions',
            'CreateRegions',
            'UpdateRegions',
            'DeleteRegions',
            ),
        
    ),

    'ViewRegions' => array(
        'type' => CAuthItem::TYPE_OPERATION,
        'description' => 'ViewRegions',
        'bizRule' => null,
        'data' => null,
    ),

    'CreateRegions' => array(
        'type' => CAuthItem::TYPE_OPERATION,
        'description' => 'CreateRegions',
        'bizRule' => null,
        'data' => null,
    ),

    'UpdateRegions' => array(
        'type' => CAuthItem::TYPE_OPERATION,
        'description' => 'UpdateRegions',
        'bizRule' => null,
        'data' => null,
    ),

    'DeleteRegions' => array(
        'type' => CAuthItem::TYPE_OPERATION,
        'description' => 'DeleteRegions',
        'bizRule' => null,
        'data' => null,
    ),
    );
    