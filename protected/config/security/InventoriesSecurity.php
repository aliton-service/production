<?php
return array(
	
 /** Роли для таблицы Inventories (типы улиц) **/
        'ManagerInventories' => array(
            'type' => CAuthItem::TYPE_ROLE,
            'description' => 'ManagerInventories',
            'bizRule' => null,
            'data' => null,
            'defaultIndex' => 'Inventories/index',
             'children' => array(
                'ViewInventories',
                'CreateInventories',
                'UpdateInventories',
                ),
        ),

        'AdminInventories' => array(
            'type' => CAuthItem::TYPE_ROLE,
            'description' => 'AdminInventories',
            'bizRule' => null,
            'data' => null,
            'defaultIndex' => 'Inventories/index',
            'children' => array(
                'ViewInventories',
                'CreateInventories',
                'UpdateInventories',
                'DeleteInventories',
                ),
        ),

        'UserInventories' => array(
            'type' => CAuthItem::TYPE_ROLE,
            'description' => 'UserInventories',
            'bizRule' => null,
            'data' => null,
            'defaultIndex' => 'Inventories/index',
            'children' => array(
                'ViewInventories'
                ),
        ),

        'ViewInventories' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'ViewInventories',
            'bizRule' => null,
            'data' => null,
        ),

        'CreateInventories' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'CreateInventories',
            'bizRule' => null,
            'data' => null,
        ),

        'UpdateInventories' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'UpdateInventories',
            'bizRule' => null,
            'data' => null,
        ),

        'DeleteInventories' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'DeleteInventories',
            'bizRule' => null,
            'data' => null,
        ),

);