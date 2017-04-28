<?php
    return array(
        // Роли для контактных лиц
        'UserObjectEvents' => array(
            'type' => CAuthItem::TYPE_ROLE,
            'description' => 'Просмотр',
            'bizRule' => null,
            'data' => null,
            'defaultIndex' => 'ObjectEvents/index',
            'children' => array(
                'ViewObjectEvents',
            ),
        ),
        'ManagerObjectEvents' => array(
            'type' => CAuthItem::TYPE_ROLE,
            'description' => 'Просмотр + Редактирование',
            'bizRule' => null,
            'data' => null,
            'defaultIndex' => 'ObjectEvents/index',
            'children' => array(
                'ViewObjectEvents',
                'InsretObjectEvents',
                'UpdateObjectEvents',
            ),
        ),
        'AdminObjectEvents' => array(
            'type' => CAuthItem::TYPE_ROLE,
            'description' => 'Все права',
            'bizRule' => null,
            'data' => null,
            'defaultIndex' => 'ObjectEvents/index',
            'children' => array(
                'ViewObjectEvents',
                'InsretObjectEvents',
                'UpdateObjectEvents',
                'DeleteObjectEvents',
            ),
        ),
        
        
        'ViewObjectEvents' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'Просмотр',
            'bizRule' => null,
            'data' => null,
        ),
        'InsretObjectEvents' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'Вставка',
            'bizRule' => null,
            'data' => null,
        ),
        'UpdateObjectEvents' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'Изменение',
            'bizRule' => null,
            'data' => null,
        ),
        'DeleteObjectEvents' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'Удаление',
            'bizRule' => null,
            'data' => null,
        ),
    );
?>

