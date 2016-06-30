<?php
    return array(
        'AdminControlContacts' => array(
            'type' => CAuthItem::TYPE_ROLE,
            'description' => 'Просмотр',
            'bizRule' => null,
            'data' => null,
            'defaultIndex' => 'ControlContacts/index',
            'children' => array(
                'ViewControlContacts',
            ),
        ),
        
        'ViewControlContacts' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'Просмотр запланированных контактов',
            'bizRule' => null,
            'data' => null,
        ),
        
    );
?>







