<?php

return array(
    'AdminTerritory' => array(
        'type' => CAuthItem::TYPE_ROLE,
        'description' => 'Админ раздела ремонт',
        'bizRule' => null,
        'data' => null,
        'defaultIndex' => 'Territory',
        'children' => array(
            'ViewTerritory',
            'UpdateTerritory',
            'CreateTerritory',
            'DeleteTerritory',
        ),
    ),
    
    'ManagerTerritory' => array(
        'type' => CAuthItem::TYPE_ROLE,
        'description' => 'Менеджер раздела ремонт',
        'bizRule' => null,
        'data' => null,
        'defaultIndex' => 'Territory',
        'children' => array(
            'ViewTerritory',
            'UpdateTerritory',
            'CreateTerritory',
        ),
    ),
    
    'UserTerritory' => array(
        'type' => CAuthItem::TYPE_ROLE,
        'description' => 'Пользователь раздела ремонт',
        'bizRule' => null,
        'data' => null,
        'defaultIndex' => 'Territory',
        'children' => array(
            'ViewTerritory',
        ),
    ),

    'ViewTerritory' => array(
        'type' => CAuthItem::TYPE_OPERATION,
        'description' => 'ViewTerritory',
        'bizRule' => null,
        'data' => null,
        'defaultIndex' => 'Territory',
    ),

    'UpdateTerritory' => array(
        'type' => CAuthItem::TYPE_OPERATION,
        'description' => 'UpdateTerritory',
        'bizRule' => null,
        'data' => null,
        'defaultIndex' => 'Territory',
    ),

    'CreateTerritory' => array(
        'type' => CAuthItem::TYPE_OPERATION,
        'description' => 'CreateTerritory',
        'bizRule' => null,
        'data' => null,
        'defaultIndex' => 'Territory',
    ),

    'DeleteTerritory' => array(
        'type' => CAuthItem::TYPE_OPERATION,
        'description' => 'DeleteTerritory',
        'bizRule' => null,
        'data' => null,
        'defaultIndex' => 'Territory',
    ),
);