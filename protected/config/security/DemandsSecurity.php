<?php
return array(

    /** Роли для таблицы Demands (справочник оборудований) **/
    'ManagerDemands' => array(
        'type' => CAuthItem::TYPE_ROLE,
        'description' => 'ManagerDemands',
        'bizRule' => null,
        'data' => null,
        'defaultIndex' => 'Demands/index',
        'children' => array(
            'ViewDemands',
            'CreateDemands',
            'UpdateDemands',
            'WorkedOut',
        ),
    ),
    
    'SeniorDemands' => array(
        'type' => CAuthItem::TYPE_ROLE,
        'description' => 'ManagerDemands',
        'bizRule' => null,
        'data' => null,
        'defaultIndex' => 'Demands/index',
        'children' => array(
            'ViewDemands',
            'CreateDemands',
            'UpdateDemands',
            'ChangeType',
            'WorkedOut',
        ),
    ),

    'AdminDemands' => array(
        'type' => CAuthItem::TYPE_ROLE,
        'description' => 'AdminDemands',
        'bizRule' => null,
        'data' => null,
        'defaultIndex' => 'Demands/index',
        'children' => array(
            'ViewDemands',
            'CreateDemands',
            'UpdateDemands',
            'DeleteDemands',
            'ChangeType',
            'WorkedOut',
        ),
    ),

    'UserDemands' => array(
        'type' => CAuthItem::TYPE_ROLE,
        'description' => 'UserDemands',
        'bizRule' => null,
        'data' => null,
        'defaultIndex' => 'Demands/index',
        'children' => array(
            'ViewDemands'
        ),
    ),

    'ViewDemands' => array(
        'type' => CAuthItem::TYPE_OPERATION,
        'description' => 'ViewDemands',
        'bizRule' => null,
        'data' => null,
    ),

    'CreateDemands' => array(
        'type' => CAuthItem::TYPE_OPERATION,
        'description' => 'CreateDemands',
        'bizRule' => null,
        'data' => null,
    ),

    'UpdateDemands' => array(
        'type' => CAuthItem::TYPE_OPERATION,
        'description' => 'UpdateDemands',
        'bizRule' => null,
        'data' => null,
    ),

    'DeleteDemands' => array(
        'type' => CAuthItem::TYPE_OPERATION,
        'description' => 'DeleteDemands',
        'bizRule' => null,
        'data' => null,
    ),
    
    'ChangeType' => array(
        'type' => CAuthItem::TYPE_OPERATION,
        'description' => 'ChangeType',
        'bizRule' => null,
        'data' => null,
    ),
    
    'WorkedOut' => array(
        'type' => CAuthItem::TYPE_OPERATION,
        'description' => 'WorkedOut',
        'bizRule' => null,
        'data' => null,
    ),

);