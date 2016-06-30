<?php
return array(
	
 /** Роли для PriceMonitoring **/
        'ManagerPriceMonitoring' => array(
            'type' => CAuthItem::TYPE_ROLE,
            'description' => 'ManagerPriceMonitoring',
            'bizRule' => null,
            'data' => null,
            'defaultIndex' => 'PriceMonitoring/index',
             'children' => array(
                'ViewPriceMonitoring',
                'CreatePriceMonitoring',
                'UpdatePriceMonitoring',
                ),
        ),

        'AdminPriceMonitoring' => array(
            'type' => CAuthItem::TYPE_ROLE,
            'description' => 'AdminPriceMonitoring',
            'bizRule' => null,
            'data' => null,
            'defaultIndex' => 'PriceMonitoring/index',
            'children' => array(
                'ViewPriceMonitoring',
                'CreatePriceMonitoring',
                'UpdatePriceMonitoring',
                'DeletePriceMonitoring',
                ),
        ),

        'UserPriceMonitoring' => array(
            'type' => CAuthItem::TYPE_ROLE,
            'description' => 'UserPriceMonitoring',
            'bizRule' => null,
            'data' => null,
            'defaultIndex' => 'PriceMonitoring/index',
            'children' => array(
                'ViewPriceMonitoring'
                ),
        ),

    'ViewPriceMonitoring' => array(
        'type' => CAuthItem::TYPE_OPERATION,
        'description' => 'ViewPriceMonitoring',
        'bizRule' => null,
        'data' => null,
    ),

    'CreatePriceMonitoring' => array(
        'type' => CAuthItem::TYPE_OPERATION,
        'description' => 'CreatePriceMonitoring',
        'bizRule' => null,
        'data' => null,
    ),

    'UpdatePriceMonitoring' => array(
        'type' => CAuthItem::TYPE_OPERATION,
        'description' => 'UpdatePriceMonitoring',
        'bizRule' => null,
        'data' => null,
    ),

    'DeletePriceMonitoring' => array(
        'type' => CAuthItem::TYPE_OPERATION,
        'description' => 'DeletePriceMonitoring',
        'bizRule' => null,
        'data' => null,
    ),

);