<?php
return array(
	
 /** Роли для таблицы StreetTypes (типы улиц) **/
        'ManagerStreetTypes' => array(
            'type' => CAuthItem::TYPE_ROLE,
            'description' => 'ManagerStreetTypes',
            'bizRule' => null,
            'data' => null,
            'defaultIndex' => 'StreetTypes/index',
             'children' => array(
                'ViewStreetTypes',
                'CreateStreetTypes',
                'UpdateStreetTypes',
                ),
        ),

        'AdminStreetTypes' => array(
            'type' => CAuthItem::TYPE_ROLE,
            'description' => 'AdminStreetTypes',
            'bizRule' => null,
            'data' => null,
            'defaultIndex' => 'streetTypes/index',
            'children' => array(
                'ViewStreetTypes',
                'CreateStreetTypes',
                'UpdateStreetTypes',
                'DeleteStreetTypes',
                ),
        ),

        'UserStreetTypes' => array(
            'type' => CAuthItem::TYPE_ROLE,
            'description' => 'UserStreetTypes',
            'bizRule' => null,
            'data' => null,
            'defaultIndex' => 'streetTypes/index',
            'children' => array(
                'ViewStreetTypes'
                ),
        ),

        'ViewStreetTypes' => array(
            'type' => CAuthItem::TYPE_ROLE,
            'description' => 'ViewStreetTypes',
            'bizRule' => null,
            'data' => null,
        ),

        'CreateStreetTypes' => array(
            'type' => CAuthItem::TYPE_ROLE,
            'description' => 'CreateStreetTypes',
            'bizRule' => null,
            'data' => null,
        ),

        'UpdateStreetTypes' => array(
            'type' => CAuthItem::TYPE_ROLE,
            'description' => 'UpdateStreetTypes',
            'bizRule' => null,
            'data' => null,
        ),

        'DeleteStreetTypes' => array(
            'type' => CAuthItem::TYPE_ROLE,
            'description' => 'DeleteStreetTypes',
            'bizRule' => null,
            'data' => null,
        ),

);