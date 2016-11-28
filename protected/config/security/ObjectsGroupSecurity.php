<?php

    return array(
        /* Операции */
        'ViewObjectsGroup' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'Промостр карточки объектов',
            'bizRule' => null,
            'data' => null
        ),
        
        'UpdateObjectsGroup' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'Редактирование карточки (Общие данные)',
            'bizRule' => null,
            'data' => null
        ),
        
        'CreateObjectsGroup' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'Создание объекта',
            'bizRule' => null,
            'data' => null
        ),
        
        'DeleteObjectsGroup' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'Удаление объекта',
            'bizRule' => null,
            'data' => null
        ),
        
        
        /* Роли */
        'UserObjectsGroup' => array(
            'type' => CAuthItem::TYPE_ROLE,
            'description' => 'Промостр карточки объектов',
            'bizRule' => null,
            'children' => array(
                'ViewObjectsGroup',
            ),
            'data' => null
        ),
        
        'ManagerObjectsGroup' => array(
            'type' => CAuthItem::TYPE_ROLE,
            'description' => 'Промостр и редактирование карточки объекта',
            'bizRule' => null,
            'children' => array(
                'ViewObjectsGroup',
                'UpdateObjectsGroup',
            ),
            'data' => null
        ),
        
        'AdminObjectsGroup' => array(
            'type' => CAuthItem::TYPE_ROLE,
            'description' => 'Все права по объекту',
            'bizRule' => null,
            'children' => array(
                'ViewObjectsGroup',
                'UpdateObjectsGroup',
                'CreateObjectsGroup',
                'DeleteObjectsGroup',
            ),
            'data' => null
        ),
        
        'ManagerOfficeObjectsGroup' => array(
            'type' => CAuthItem::TYPE_ROLE,
            'description' => 'Все права по объекту',
            'bizRule' => null,
            'children' => array(
                'ViewObjectsGroup',
                'UpdateObjectsGroup',
                'CreateObjectsGroup',
            ),
            'data' => null
        ),
    );

