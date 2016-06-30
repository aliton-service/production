<?php
    return array(
        // Роли для контактных лиц
        'UserObjectsGroupSystems' => array(
            'type' => CAuthItem::TYPE_ROLE,
            'description' => 'Просмотр',
            'bizRule' => null,
            'data' => null,
            'defaultIndex' => 'ObjectsGroupSystems/index',
            'children' => array(
                'ViewObjectsGroupSystems',
            ),
        ),
        'ManagerObjectsGroupSystems' => array(
            'type' => CAuthItem::TYPE_ROLE,
            'description' => 'Просмотр + Редактирование',
            'bizRule' => null,
            'data' => null,
            'defaultIndex' => 'ObjectsGroupSystems/index',
            'children' => array(
                'ViewObjectsGroupSystems',
                'InsretObjectsGroupSystems',
                'UpdateObjectsGroupSystems',
            ),
        ),
        'AdminObjectsGroupSystems' => array(
            'type' => CAuthItem::TYPE_ROLE,
            'description' => 'Все права',
            'bizRule' => null,
            'data' => null,
            'defaultIndex' => 'ObjectsGroupSystems/index',
            'children' => array(
                'ViewObjectsGroupSystems',
                'InsretObjectsGroupSystems',
                'UpdateObjectsGroupSystems',
                'DeleteObjectsGroupSystems',
            ),
        ),
        
        
        'ViewObjectsGroupSystems' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'Просмотр',
            'bizRule' => null,
            'data' => null,
        ),
        'InsretObjectsGroupSystems' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'Вставка',
            'bizRule' => null,
            'data' => null,
        ),
        'UpdateObjectsGroupSystems' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'Изменение',
            'bizRule' => null,
            'data' => null,
        ),
        'DeleteObjectsGroupSystems' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'Удаление',
            'bizRule' => null,
            'data' => null,
        ),
    );
?>

