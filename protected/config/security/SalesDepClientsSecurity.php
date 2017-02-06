<?php
return array(
	
         
        'ManagerSalesDepClients' => array(
            'type' => CAuthItem::TYPE_ROLE,
            'description' => 'ManagerSalesDepClients',
            'bizRule' => null,
            'data' => null,
            'defaultIndex' => 'streets/index',
             'children' => array(
                'ViewSalesDepClients',
                ),
        ),

        'AdminSalesDepClients' => array(
            'type' => CAuthItem::TYPE_ROLE,
            'description' => 'AdminSalesDepClients',
            'bizRule' => null,
            'data' => null,
            'defaultIndex' => 'streets/index',
            'children' => array(
                'ViewSalesDepClients',
                ),
        ),

        'UserSalesDepClients' => array(
            'type' => CAuthItem::TYPE_ROLE,
            'description' => 'UserSalesDepClients',
            'bizRule' => null,
            'data' => null,
            'defaultIndex' => 'streets/index',
            'children' => array(
                'ViewSalesDepClients'
                ),
        ),

        'ViewSalesDepClients' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'ViewSalesDepClients',
            'bizRule' => null,
            'data' => null,
        ),

);