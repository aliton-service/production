<?php
    return array(
        // Роли для контактных лиц
        'UserControlContacts' => array(
            'type' => CAuthItem::TYPE_ROLE,
            'description' => 'Просмотр',
            'bizRule' => null,
            'data' => null,
            'defaultIndex' => 'ControlContacts/index',
            'children' => array(
                'ViewControlContacts',
            ),
        ),
        'ManagerControlContacts' => array(
            'type' => CAuthItem::TYPE_ROLE,
            'description' => 'Просмотр + Редактирование',
            'bizRule' => null,
            'data' => null,
            'defaultIndex' => 'ControlContacts/index',
            'children' => array(
                'ViewControlContacts',
                'InsretControlContacts',
                'UpdateControlContacts',
            ),
        ),
        'AdminControlContacts' => array(
            'type' => CAuthItem::TYPE_ROLE,
            'description' => 'Все права',
            'bizRule' => null,
            'data' => null,
            'defaultIndex' => 'ControlContacts/index',
            'children' => array(
                'ViewControlContacts',
                'InsretControlContacts',
                'UpdateControlContacts',
                'DeleteControlContacts',
            ),
        ),
        
        
        'ViewControlContacts' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'Просмотр',
            'bizRule' => null,
            'data' => null,
        ),
        'InsretControlContacts' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'Вставка',
            'bizRule' => null,
            'data' => null,
        ),
        'UpdateControlContacts' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'Изменение',
            'bizRule' => null,
            'data' => null,
        ),
        'DeleteControlContacts' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'Удаление',
            'bizRule' => null,
            'data' => null,
        ),
    );
?>

