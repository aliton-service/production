<?php

return array(
    'AdminSystemComplexitys' => array(
        'type' => CAuthItem::TYPE_ROLE,
        'description' => 'AdminSystemComplexitys',
        'bizRule' => null,
        'data' => null,
        'defaultIndex' => 'SystemComplexitys',
        'children' => array(
            'ViewSystemComplexitys',
            'UpdateSystemComplexitys',
            'CreateSystemComplexitys',
            'DeleteSystemComplexitys',
        ),
    ),
    
    'ManagerSystemComplexitys' => array(
        'type' => CAuthItem::TYPE_ROLE,
        'description' => 'ManagerSystemComplexitys',
        'bizRule' => null,
        'data' => null,
        'defaultIndex' => 'SystemComplexitys',
        'children' => array(
            'ViewSystemComplexitys',
            'UpdateSystemComplexitys',
            'CreateSystemComplexitys',
        ),
    ),
    
    'UserSystemComplexitys' => array(
        'type' => CAuthItem::TYPE_ROLE,
        'description' => 'UserSystemComplexitys',
        'bizRule' => null,
        'data' => null,
        'defaultIndex' => 'SystemComplexitys',
        'children' => array(
            'ViewSystemComplexitys',
        ),
    ),

    'ViewSystemComplexitys' => array(
        'type' => CAuthItem::TYPE_OPERATION,
        'description' => 'ViewSystemComplexitys',
        'bizRule' => null,
        'data' => null,
        'defaultIndex' => 'SystemComplexitys',
    ),

    'UpdateSystemComplexitys' => array(
        'type' => CAuthItem::TYPE_OPERATION,
        'description' => 'UpdateSystemComplexitys',
        'bizRule' => null,
        'data' => null,
        'defaultIndex' => 'SystemComplexitys',
    ),

    'CreateSystemComplexitys' => array(
        'type' => CAuthItem::TYPE_OPERATION,
        'description' => 'CreateSystemComplexitys',
        'bizRule' => null,
        'data' => null,
        'defaultIndex' => 'SystemComplexitys',
    ),

    'DeleteSystemComplexitys' => array(
        'type' => CAuthItem::TYPE_OPERATION,
        'description' => 'DeleteSystemComplexitys',
        'bizRule' => null,
        'data' => null,
        'defaultIndex' => 'SystemComplexitys',
    ),
);