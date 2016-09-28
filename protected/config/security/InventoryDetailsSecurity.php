<?php
return array(
	
 /** Роли для таблицы InventoryDetails (Остатки на складе) **/
        'ManagerInventoryDetails' => array(
            'type' => CAuthItem::TYPE_ROLE,
            'description' => 'ManagerInventoryDetails',
            'bizRule' => null,
            'data' => null,
            'defaultIndex' => 'InventoryDetails/index',
             'children' => array(
                'ViewInventoryDetails',
                'CreateInventoryDetails',
                'UpdateInventoryDetails',
                ),
        ),

        'AdminInventoryDetails' => array(
            'type' => CAuthItem::TYPE_ROLE,
            'description' => 'AdminInventoryDetails',
            'bizRule' => null,
            'data' => null,
            'defaultIndex' => 'InventoryDetails/index',
            'children' => array(
                'ViewInventoryDetails',
                'CreateInventoryDetails',
                'UpdateInventoryDetails',
                'DeleteInventoryDetails',
                ),
        ),

        'UserInventoryDetails' => array(
            'type' => CAuthItem::TYPE_ROLE,
            'description' => 'UserInventoryDetails',
            'bizRule' => null,
            'data' => null,
            'defaultIndex' => 'InventoryDetails/index',
            'children' => array(
                'ViewInventoryDetails'
                ),
        ),

        'ViewInventoryDetails' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'ViewInventoryDetails',
            'bizRule' => null,
            'data' => null,
        ),

        'CreateInventoryDetails' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'CreateInventoryDetails',
            'bizRule' => null,
            'data' => null,
        ),

        'UpdateInventoryDetails' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'UpdateInventoryDetails',
            'bizRule' => null,
            'data' => null,
        ),

        'DeleteInventoryDetails' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'DeleteInventoryDetails',
            'bizRule' => null,
            'data' => null,
        ),

);