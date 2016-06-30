<?php
return array(
	
         /** Роли для таблицы Streets (улицы) **/
        'ManagerStreets' => array(
            'type' => CAuthItem::TYPE_ROLE,
            'description' => 'ManagerStreets',
            'bizRule' => null,
            'data' => null,
            'defaultIndex' => 'streets/index',
             'children' => array(
                'ViewStreets',
                'CreateStreets',
                'UpdateStreets',
                ),
        ),

        'AdminStreets' => array(
            'type' => CAuthItem::TYPE_ROLE,
            'description' => 'AdminStreets',
            'bizRule' => null,
            'data' => null,
            'defaultIndex' => 'streets/index',
            'children' => array(
                'ViewStreets',
                'CreateStreets',
                'UpdateStreets',
                'DeleteStreets',
                ),
        ),

        'UserStreets' => array(
            'type' => CAuthItem::TYPE_ROLE,
            'description' => 'UserStreets',
            'bizRule' => null,
            'data' => null,
            'defaultIndex' => 'streets/index',
            'children' => array(
                'ViewStreets'
                ),
        ),

        'ViewStreets' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'ViewStreets',
            'bizRule' => null,
            'data' => null,
        ),

        'CreateStreets' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'CreateStreets',
            'bizRule' => null,
            'data' => null,
        ),

        'UpdateStreets' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'UpdateStreets',
            'bizRule' => null,
            'data' => null,
        ),

        'DeleteStreets' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'DeleteStreets',
            'bizRule' => null,
            'data' => null,
        ),
);