<?php
return array(
	
        /** Роли для таблицы Customers (должности) **/
        'ManagerCustomers' => array(
            'type' => CAuthItem::TYPE_ROLE,
            'description' => 'ManagerCustomers',
            'bizRule' => null,
            'data' => null,
            'defaultIndex' => 'customers/index',
            'children' => array(
                'ViewCustomers',
                'CreateCustomers',
                'UpdateCustomers',
                ),
        ),

        'UserCustomers' => array(
            'type' => CAuthItem::TYPE_ROLE,
            'description' => 'UserCustomers',
            'bizRule' => null,
            'data' => null,
            'defaultIndex' => 'customers/index',
            'children' => array(
                'ViewCustomers',
                ),
        ),
        'AdminCustomers' => array(
            'type' => CAuthItem::TYPE_ROLE,
            'description' => 'AdminCustomers',
            'bizRule' => null,
            'data' => null,
            'defaultIndex' => 'customers/index',
            'children' => array(
                'ViewCustomers',
                'CreateCustomers',
                'UpdateCustomers',
                'DeleteCustomers',
                ),

        ),

        'ViewCustomers' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'ViewCustomers',
            'bizRule' => null,
            'data' => null,
        ),

        'CreateCustomers' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'CreateCustomers',
            'bizRule' => null,
            'data' => null,
        ),

        'UpdateCustomers' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'UpdateCustomers',
            'bizRule' => null,
            'data' => null,
        ),

        'DeleteCustomers' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'DeleteCustomers',
            'bizRule' => null,
            'data' => null,
        ),
);