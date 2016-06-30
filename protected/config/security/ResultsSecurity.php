<?php
return array(
	
 /** Роли для таблицы StreetTypes (типы улиц) **/
        'ManagerResults' => array(
            'type' => CAuthItem::TYPE_ROLE,
            'description' => 'ManagerResults',
            'bizRule' => null,
            'data' => null,
            'defaultIndex' => 'Results/index',
             'children' => array(
                'ViewResults',
                'CreateResults',
                'UpdateResults',
                ),
        ),

        'AdminResults' => array(
            'type' => CAuthItem::TYPE_ROLE,
            'description' => 'AdminResults',
            'bizRule' => null,
            'data' => null,
            'defaultIndex' => 'Results/index',
            'children' => array(
                'ViewResults',
                'CreateResults',
                'UpdateResults',
                'DeleteResults',
                ),
        ),

        'UserResults' => array(
            'type' => CAuthItem::TYPE_ROLE,
            'description' => 'UserResults',
            'bizRule' => null,
            'data' => null,
            'defaultIndex' => 'Results/index',
            'children' => array(
                'ViewResults'
                ),
        ),

        'ViewResults' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'ViewResults',
            'bizRule' => null,
            'data' => null,
        ),

        'CreateResults' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'CreateResults',
            'bizRule' => null,
            'data' => null,
        ),

        'UpdateResults' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'UpdateResults',
            'bizRule' => null,
            'data' => null,
        ),

        'DeleteResults' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'DeleteResults',
            'bizRule' => null,
            'data' => null,
        ),

);