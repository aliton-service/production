<?php
    return array(
        // Роли для контактных лиц
        'UserContactInfo' => array(
            'type' => CAuthItem::TYPE_ROLE,
            'description' => 'Просмотр',
            'bizRule' => null,
            'data' => null,
            'defaultIndex' => 'ContactInfo/index',
            'children' => array(
                'ViewContactInfo',
            ),
        ),
        'ManagerContactInfo' => array(
            'type' => CAuthItem::TYPE_ROLE,
            'description' => 'Просмотр + Редактирование',
            'bizRule' => null,
            'data' => null,
            'defaultIndex' => 'ContactInfo/index',
            'children' => array(
                'ViewContactInfo',
                'InsretContactInfo',
                'UpdateContactInfo',
            ),
        ),
        'AdminContactInfo' => array(
            'type' => CAuthItem::TYPE_ROLE,
            'description' => 'Все права',
            'bizRule' => null,
            'data' => null,
            'defaultIndex' => 'ContactInfo/index',
            'children' => array(
                'ViewContactInfo',
                'InsretContactInfo',
                'UpdateContactInfo',
                'DeleteContactInfo',
            ),
        ),
        
        
        'ViewContactInfo' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'Просмотр',
            'bizRule' => null,
            'data' => null,
        ),
        'InsretContactInfo' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'Вставка',
            'bizRule' => null,
            'data' => null,
        ),
        'UpdateContactInfo' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'Изменение',
            'bizRule' => null,
            'data' => null,
        ),
        'DeleteContactInfo' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'Удаление',
            'bizRule' => null,
            'data' => null,
        ),
    );
?>

