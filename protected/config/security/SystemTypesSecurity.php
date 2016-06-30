<?php
return array(
	
 /** Роли для таблицы StreetTypes (типы улиц) **/
        'ManagerSystemTypes' => array(
            'type' => CAuthItem::TYPE_ROLE,
            'description' => 'ManagerSystemTypes',
            'bizRule' => null,
            'data' => null,
            'defaultIndex' => 'SystemTypes/index',
             'children' => array(
                'ViewSystemTypes',
                'CreateSystemTypes',
                'UpdateSystemTypes',
                ),
        ),

        'AdminSystemTypes' => array(
            'type' => CAuthItem::TYPE_ROLE,
            'description' => 'AdminSystemTypes',
            'bizRule' => null,
            'data' => null,
            'defaultIndex' => 'SystemTypes/index',
            'children' => array(
                'ViewSystemTypes',
                'CreateSystemTypes',
                'UpdateSystemTypes',
                'DeleteSystemTypes',
                ),
        ),

        'UserSystemTypes' => array(
            'type' => CAuthItem::TYPE_ROLE,
            'description' => 'UserSystemTypes',
            'bizRule' => null,
            'data' => null,
            'defaultIndex' => 'SystemTypes/index',
            'children' => array(
                'ViewStreetTypes'
                ),
        ),

        'ViewSystemTypes' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'ViewSystemTypes',
            'bizRule' => null,
            'data' => null,
        ),

        'CreateSystemTypes' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'CreateSystemTypes',
            'bizRule' => null,
            'data' => null,
        ),

        'UpdateSystemTypes' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'UpdateSystemTypes',
            'bizRule' => null,
            'data' => null,
        ),

        'DeleteSystemTypes' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'DeleteSystemTypes',
            'bizRule' => null,
            'data' => null,
        ),

);