<?php
return array(
	
         /** Роли для таблицы Streets (улицы) **/
        'ManagerDemandTypes' => array(
            'type' => CAuthItem::TYPE_ROLE,
            'description' => 'ManagerDemandTypes',
            'bizRule' => null,
            'data' => null,
            'defaultIndex' => 'demandTypes/index',
             'children' => array(
                'ViewDemandTypes',
                'CreateDemandTypes',
                'UpdateDemandTypes',
                ),
        ),

        'AdminDemandTypes' => array(
            'type' => CAuthItem::TYPE_ROLE,
            'description' => 'AdminDemandTypes',
            'bizRule' => null,
            'data' => null,
            'defaultIndex' => 'demandTypes/index',
            'children' => array(
                'ViewDemandTypes',
                'CreateDemandTypes',
                'UpdateDemandTypes',
                'DeleteDemandTypes',
                ),
        ),

        'UserDemandTypes' => array(
            'type' => CAuthItem::TYPE_ROLE,
            'description' => 'UserDemandTypes',
            'bizRule' => null,
            'data' => null,
            'defaultIndex' => 'demandTypes/index',
            'children' => array(
                'ViewDemandTypes'
                ),
        ),

        'ViewDemandTypes' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'ViewDemandTypes',
            'bizRule' => null,
            'data' => null,
        ),

        'CreateDemandTypes' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'CreateDemandTypes',
            'bizRule' => null,
            'data' => null,
        ),

        'UpdateDemandTypes' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'UpdateDemandTypes',
            'bizRule' => null,
            'data' => null,
        ),

        'DeleteDemandTypes' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'DeleteDemandTypes',
            'bizRule' => null,
            'data' => null,
        ),
);