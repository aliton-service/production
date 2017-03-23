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
                'ViewDemands',
                'DiarySalesDepClients',
                'SetSalesManager',
                'SelectObjects',
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
                'ViewDemands',
                'DiarySalesDepClients',
                'SetSalesManager',
                ),
        ),

        'UserSalesDepClients' => array(
            'type' => CAuthItem::TYPE_ROLE,
            'description' => 'UserSalesDepClients',
            'bizRule' => null,
            'data' => null,
            'defaultIndex' => 'streets/index',
            'children' => array(
                'ViewSalesDepClients',
                'DiarySalesDepClients',
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
    
        'ViewDemands' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'ViewDemands',
            'bizRule' => null,
            'data' => null,
        ),
    
        'DiarySalesDepClients' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'DiarySalesDepClients',
            'bizRule' => null,
            'data' => null,
        ),
    
        'SetSalesManager' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'SetSalesManager',
            'bizRule' => null,
            'data' => null,
        ),

);