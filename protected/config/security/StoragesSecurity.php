<?php
return array(
	
 /** Роли для таблицы StreetTypes (типы улиц) **/
        'ManagerStorages' => array(
            'type' => CAuthItem::TYPE_ROLE,
            'description' => 'ManagerStorages',
            'bizRule' => null,
            'data' => null,
            'defaultIndex' => 'Storages/index',
             'children' => array(
                'ViewStorages',
                'CreateStorages',
                'UpdateStorages',
                ),
        ),

        'AdminStorages' => array(
            'type' => CAuthItem::TYPE_ROLE,
            'description' => 'AdminStorages',
            'bizRule' => null,
            'data' => null,
            'defaultIndex' => 'Storages/index',
            'children' => array(
                'ViewStorages',
                'CreateStorages',
                'UpdateStorages',
                'DeleteStorages',
                ),
        ),

        'UserStorages' => array(
            'type' => CAuthItem::TYPE_ROLE,
            'description' => 'UserStorages',
            'bizRule' => null,
            'data' => null,
            'defaultIndex' => 'Storages/index',
            'children' => array(
                'ViewStorages'
                ),
        ),

        'ViewStorages' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'ViewStorages',
            'bizRule' => null,
            'data' => null,
        ),

        'CreateStorages' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'CreateStorages',
            'bizRule' => null,
            'data' => null,
        ),

        'UpdateStorages' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'UpdateStorages',
            'bizRule' => null,
            'data' => null,
        ),

        'DeleteStorages' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'DeleteStorages',
            'bizRule' => null,
            'data' => null,
        ),

);