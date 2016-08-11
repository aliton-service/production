<?php
    return array(
        // Роли для объектов
        'UserObjects' => array(
            'type' => CAuthItem::TYPE_ROLE,
            'description' => 'Просмотр объектов',
            'bizRule' => null,
            'data' => null,
            'defaultIndex' => 'Object/index',
            'children' => array(
                'ViewObjects',
            ),
        ),
        
        'ManagerObjects' => array(
            'type' => CAuthItem::TYPE_ROLE,
            'description' => 'Просмотр объектов',
            'bizRule' => null,
            'data' => null,
            'defaultIndex' => 'Object/index',
            'children' => array(
                'ViewObjects',
                'CreateObjects',
                'UpdateObjects',
            ),
        ),
        
        'AdminObjects' => array(
            'type' => CAuthItem::TYPE_ROLE,
            'description' => 'Просмотр объектов',
            'bizRule' => null,
            'data' => null,
            'defaultIndex' => 'Object/index',
            'children' => array(
                'ViewObjects',
                'ViewObjects',
                'CreateObjects',
                'UpdateObjects',
                'DeleteObjects',
            ),
        ),
        
        'ViewObjects' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'Просмотр',
            'bizRule' => null,
            'data' => null,
        ),

        'CreateObjects' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'Создание',
            'bizRule' => null,
            'data' => null,
        ),

        'UpdateObjects' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'Редактирование',
            'bizRule' => null,
            'data' => null,
        ),

        'DeleteObjects' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'Удаление',
            'bizRule' => null,
            'data' => null,
        ),
    );
?>


