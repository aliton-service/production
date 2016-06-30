<?php
return array(
	
 /** Роли для таблицы StreetTypes (типы улиц) **/
        'ManagerConfirmCancels' => array(
            'type' => CAuthItem::TYPE_ROLE,
            'description' => 'ManagerConfirmCancels',
            'bizRule' => null,
            'data' => null,
            'defaultIndex' => 'ConfirmCancels/index',
             'children' => array(
                'ViewConfirmCancels',
                'CreateConfirmCancels',
                'UpdateConfirmCancels',
                ),
        ),

        'AdminConfirmCancels' => array(
            'type' => CAuthItem::TYPE_ROLE,
            'description' => 'AdminConfirmCancels',
            'bizRule' => null,
            'data' => null,
            'defaultIndex' => 'ConfirmCancels/index',
            'children' => array(
                'ViewConfirmCancels',
                'CreateConfirmCancels',
                'UpdateConfirmCancels',
                'DeleteConfirmCancels',
                ),
        ),

        'UserConfirmCancels' => array(
            'type' => CAuthItem::TYPE_ROLE,
            'description' => 'UserConfirmCancels',
            'bizRule' => null,
            'data' => null,
            'defaultIndex' => 'ConfirmCancels/index',
            'children' => array(
                'ViewConfirmCancels'
                ),
        ),

        'ViewConfirmCancels' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'ViewConfirmCancels',
            'bizRule' => null,
            'data' => null,
        ),

        'CreateConfirmCancels' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'CreateConfirmCancels',
            'bizRule' => null,
            'data' => null,
        ),

        'UpdateConfirmCancels' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'UpdateConfirmCancels',
            'bizRule' => null,
            'data' => null,
        ),

        'DeleteConfirmCancels' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'DeleteConfirmCancels',
            'bizRule' => null,
            'data' => null,
        ),

);