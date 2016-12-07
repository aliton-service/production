<?php
    return array(
        // Роли для контактных лиц
        'UserControlWHDocuments' => array(
            'type' => CAuthItem::TYPE_ROLE,
            'description' => 'Просмотр',
            'bizRule' => null,
            'data' => null,
            'defaultIndex' => 'ControlWHDocuments/index',
            'children' => array(
                'ViewControlWHDocuments',
            ),
        ),
        'ManagerControlWHDocuments' => array(
            'type' => CAuthItem::TYPE_ROLE,
            'description' => 'Просмотр + Редактирование',
            'bizRule' => null,
            'data' => null,
            'defaultIndex' => 'ControlWHDocuments/index',
            'children' => array(
                'ViewControlWHDocuments',
                'InsretControlWHDocuments',
                'UpdateControlWHDocuments',
            ),
        ),
        'AdminControlWHDocuments' => array(
            'type' => CAuthItem::TYPE_ROLE,
            'description' => 'Все права',
            'bizRule' => null,
            'data' => null,
            'defaultIndex' => 'ControlWHDocuments/index',
            'children' => array(
                'ViewControlWHDocuments',
                'InsretControlWHDocuments',
                'UpdateControlWHDocuments',
                'DeleteControlWHDocuments',
            ),
        ),
        
        
        'ViewControlWHDocuments' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'Просмотр',
            'bizRule' => null,
            'data' => null,
        ),
        'InsretControlWHDocuments' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'Вставка',
            'bizRule' => null,
            'data' => null,
        ),
        'UpdateControlWHDocuments' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'Изменение',
            'bizRule' => null,
            'data' => null,
        ),
        'DeleteControlWHDocuments' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'Удаление',
            'bizRule' => null,
            'data' => null,
        ),
    );
?>

