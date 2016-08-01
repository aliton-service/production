<?php

return array(
    'AdminSystemStatements' => array(
        'type' => CAuthItem::TYPE_ROLE,
        'description' => 'AdminSystemStatements',
        'bizRule' => null,
        'data' => null,
        'defaultIndex' => 'SystemStatements',
        'children' => array(
            'ViewSystemStatements',
            'UpdateSystemStatements',
            'CreateSystemStatements',
            'DeleteSystemStatements',
        ),
    ),
    
    'ManagerSystemStatements' => array(
        'type' => CAuthItem::TYPE_ROLE,
        'description' => 'ManagerSystemStatements',
        'bizRule' => null,
        'data' => null,
        'defaultIndex' => 'SystemStatements',
        'children' => array(
            'ViewSystemStatements',
            'UpdateSystemStatements',
            'CreateSystemStatements',
        ),
    ),
    
    'UserSystemStatements' => array(
        'type' => CAuthItem::TYPE_ROLE,
        'description' => 'UserSystemStatements',
        'bizRule' => null,
        'data' => null,
        'defaultIndex' => 'SystemStatements',
        'children' => array(
            'ViewSystemStatements',
        ),
    ),

    'ViewSystemStatements' => array(
        'type' => CAuthItem::TYPE_OPERATION,
        'description' => 'ViewSystemStatements',
        'bizRule' => null,
        'data' => null,
        'defaultIndex' => 'SystemStatements',
    ),

    'UpdateSystemStatements' => array(
        'type' => CAuthItem::TYPE_OPERATION,
        'description' => 'UpdateSystemStatements',
        'bizRule' => null,
        'data' => null,
        'defaultIndex' => 'SystemStatements',
    ),

    'CreateSystemStatements' => array(
        'type' => CAuthItem::TYPE_OPERATION,
        'description' => 'CreateSystemStatements',
        'bizRule' => null,
        'data' => null,
        'defaultIndex' => 'SystemStatements',
    ),

    'DeleteSystemStatements' => array(
        'type' => CAuthItem::TYPE_OPERATION,
        'description' => 'DeleteSystemStatements',
        'bizRule' => null,
        'data' => null,
        'defaultIndex' => 'SystemStatements',
    ),
);