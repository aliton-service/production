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
                'SetSalesManager',
                'AttachObjects',
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
                'SetSalesManager',
                'AttachObjects',
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
    
        'SetSalesManager' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'SetSalesManager',
            'bizRule' => null,
            'data' => null,
        ),
    
        'SelectObjects' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'SelectObjects',
            'bizRule' => null,
            'data' => null,
        ),
    
        'AttachObjects' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'AttachObjects',
            'bizRule' => null,
            'data' => null,
        ),

);