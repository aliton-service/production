<?php
return array(
	
 /** Роли для таблицы StreetTypes (типы улиц) **/
        'ManagerContactTypes' => array(
            'type' => CAuthItem::TYPE_ROLE,
            'description' => 'ManagerContactTypes',
            'bizRule' => null,
            'data' => null,
            'defaultIndex' => 'ContactTypes/index',
             'children' => array(
                'ViewContactTypes',
                'CreateContactTypes',
                'UpdateContactTypes',
                ),
        ),

        'AdminContactTypes' => array(
            'type' => CAuthItem::TYPE_ROLE,
            'description' => 'AdminContactTypes',
            'bizRule' => null,
            'data' => null,
            'defaultIndex' => 'ContactTypes/index',
            'children' => array(
                'ViewContactTypes',
                'CreateContactTypes',
                'UpdateContactTypes',
                'DeleteContactTypes',
                ),
        ),

        'UserContactTypes' => array(
            'type' => CAuthItem::TYPE_ROLE,
            'description' => 'UserContactTypes',
            'bizRule' => null,
            'data' => null,
            'defaultIndex' => 'ContactTypes/index',
            'children' => array(
                'ViewContactTypes'
                ),
        ),

        'ViewContactTypes' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'ViewContactTypes',
            'bizRule' => null,
            'data' => null,
        ),

        'CreateContactTypes' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'CreateContactTypes',
            'bizRule' => null,
            'data' => null,
        ),

        'UpdateContactTypes' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'UpdateContactTypes',
            'bizRule' => null,
            'data' => null,
        ),

        'DeleteContactTypes' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'DeleteContactTypes',
            'bizRule' => null,
            'data' => null,
        ),

);