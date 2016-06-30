<?php
return array(
	
 /** Роли для таблицы StreetTypes (типы улиц) **/
        'ManagerWorkTypes' => array(
            'type' => CAuthItem::TYPE_ROLE,
            'description' => 'ManagerWorkTypes',
            'bizRule' => null,
            'data' => null,
            'defaultIndex' => 'WorkTypes/index',
             'children' => array(
                'ViewWorkTypes',
                'CreateWorkTypes',
                'UpdateWorkTypes',
                ),
        ),

        'AdminWorkTypes' => array(
            'type' => CAuthItem::TYPE_ROLE,
            'description' => 'AdminWorkTypes',
            'bizRule' => null,
            'data' => null,
            'defaultIndex' => 'WorkTypes/index',
            'children' => array(
                'ViewWorkTypes',
                'CreateWorkTypes',
                'UpdateWorkTypes',
                'DeleteWorkTypes',
                ),
        ),

        'UserWorkTypes' => array(
            'type' => CAuthItem::TYPE_ROLE,
            'description' => 'UserWorkTypes',
            'bizRule' => null,
            'data' => null,
            'defaultIndex' => 'WorkTypes/index',
            'children' => array(
                'ViewWorkTypes'
                ),
        ),

        'ViewWorkTypes' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'ViewWorkTypes',
            'bizRule' => null,
            'data' => null,
        ),

        'CreateWorkTypes' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'CreateWorkTypes',
            'bizRule' => null,
            'data' => null,
        ),

        'UpdateWorkTypes' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'UpdateWorkTypes',
            'bizRule' => null,
            'data' => null,
        ),

        'DeleteWorkTypes' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'DeleteWorkTypes',
            'bizRule' => null,
            'data' => null,
        ),

);