<?php
    return array(
        'UserActEquips' => array(
            'type' => CAuthItem::TYPE_ROLE,
            'description' => 'Реестр актов',
            'bizRule' => null,
            'data' => null,
            'defaultIndex' => 'ActEquips/index',
            'children' => array(
                'ViewActEquips',
            ),
        ),
        'ManagerActEquips' => array(
            'type' => CAuthItem::TYPE_ROLE,
            'description' => 'Просмотр + Редактирование',
            'bizRule' => null,
            'data' => null,
            'defaultIndex' => 'ActEquips/index',
            'children' => array(
                'ViewActEquips',
                'InsertActEquips',
                'UpdateActEquips',
                'DeleteActEquips',
            ),
        ),
        
        'AdminActEquips' => array(
            'type' => CAuthItem::TYPE_ROLE,
            'description' => 'Просмотр + Редактирование',
            'bizRule' => null,
            'data' => null,
            'defaultIndex' => 'ActEquips/index',
            'children' => array(
                'ViewActEquips',
                'InsertActEquips',
                'UpdateActEquips',
                'DeleteActEquips',
            ),
        ),
        
        'ViewActEquips' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'Просмотр позиций оборудования',
            'bizRule' => null,
            'data' => null,
        ),
        
        'InsertActEquips' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'Добавления обрудования',
            'bizRule' => null,
            'data' => null,
        ),
        
        'UpdateActEquips' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'Редактирования оборудования',
            'bizRule' => null,
            'data' => null,
        ),
        
        'DeleteActEquips' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'Редактирования оборудования',
            'bizRule' => null,
            'data' => null,
        ),
    );
?>

