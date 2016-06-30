<?php
return array(
	
 /** Роли для таблицы StreetTypes (типы улиц) **/
        'ManagerContactKinds' => array(
            'type' => CAuthItem::TYPE_ROLE,
            'description' => 'ManagerContactKinds',
            'bizRule' => null,
            'data' => null,
            'defaultIndex' => 'ContactKinds/index',
             'children' => array(
                'ViewContactKinds',
                'CreateContactKinds',
                'UpdateContactKinds',
                ),
        ),

        'AdminContactKinds' => array(
            'type' => CAuthItem::TYPE_ROLE,
            'description' => 'AdminContactKinds',
            'bizRule' => null,
            'data' => null,
            'defaultIndex' => 'ContactKinds/index',
            'children' => array(
                'ViewContactKinds',
                'CreateContactKinds',
                'UpdateContactKinds',
                'DeleteContactKinds',
                ),
        ),

        'UserContactKinds' => array(
            'type' => CAuthItem::TYPE_ROLE,
            'description' => 'UserContactKinds',
            'bizRule' => null,
            'data' => null,
            'defaultIndex' => 'ContactKinds/index',
            'children' => array(
                'ViewContactKinds'
                ),
        ),

        'ViewContactKinds' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'ViewContactKinds',
            'bizRule' => null,
            'data' => null,
        ),

        'CreateContactKinds' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'CreateContactKinds',
            'bizRule' => null,
            'data' => null,
        ),

        'UpdateContactKinds' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'UpdateContactKinds',
            'bizRule' => null,
            'data' => null,
        ),

        'DeleteContactKinds' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'DeleteContactKinds',
            'bizRule' => null,
            'data' => null,
        ),

);