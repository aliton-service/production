<?php
return array(
	
         /** Роли для таблицы ServiceTypes (тип тарифов) **/
        'ManagerServiceTypes' => array(
            'type' => CAuthItem::TYPE_ROLE,
            'description' => 'ManagerServiceTypes',
            'bizRule' => null,
            'data' => null,
            'defaultIndex' => 'serviceTypes/index',
             'children' => array(
                'ViewServiceTypes',
                'CreateServiceTypes',
                'UpdateServiceTypes',
                ),
        ),

        'AdminServiceTypes' => array(
            'type' => CAuthItem::TYPE_ROLE,
            'description' => 'AdminServiceTypes',
            'bizRule' => null,
            'data' => null,
            'defaultIndex' => 'serviceTypes/index',
            'children' => array(
                'ViewServiceTypes',
                'CreateServiceTypes',
                'UpdateServiceTypes',
                'DeleteServiceTypes',
                ),
        ),

        'UserServiceTypes' => array(
            'type' => CAuthItem::TYPE_ROLE,
            'description' => 'UserServiceTypes',
            'bizRule' => null,
            'data' => null,
            'defaultIndex' => 'ServiceTypes/index',
            'children' => array(
                'ViewServiceTypes'
                ),
        ),

        'ViewServiceTypes' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'ViewServiceTypes',
            'bizRule' => null,
            'data' => null,
        ),

        'CreateServiceTypes' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'CreateServiceTypes',
            'bizRule' => null,
            'data' => null,
        ),

        'UpdateServiceTypes' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'UpdateServiceTypes',
            'bizRule' => null,
            'data' => null,
        ),

        'DeleteServiceTypes' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'DeleteServiceTypes',
            'bizRule' => null,
            'data' => null,
        ),
);