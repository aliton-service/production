<?php
return array(
	
 /** Роли для таблицы EqipGroups (типы улиц) **/
        'ManagerEqipGroups' => array(
            'type' => CAuthItem::TYPE_ROLE,
            'description' => 'ManagerEqipGroups',
            'bizRule' => null,
            'data' => null,
            'defaultIndex' => 'EqipGroups/index',
             'children' => array(
                'ViewEqipGroups',
                'CreateEqipGroups',
                'UpdateEqipGroups',
                ),
        ),

        'AdminEqipGroups' => array(
            'type' => CAuthItem::TYPE_ROLE,
            'description' => 'AdminEqipGroups',
            'bizRule' => null,
            'data' => null,
            'defaultIndex' => 'EqipGroups/index',
            'children' => array(
                'ViewEqipGroups',
                'CreateEqipGroups',
                'UpdateEqipGroups',
                'DeleteEqipGroups',
                ),
        ),

        'UserEqipGroups' => array(
            'type' => CAuthItem::TYPE_ROLE,
            'description' => 'UserEqipGroups',
            'bizRule' => null,
            'data' => null,
            'defaultIndex' => 'EqipGroups/index',
            'children' => array(
                'ViewEqipGroups'
                ),
        ),

        'ViewEqipGroups' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'ViewEqipGroups',
            'bizRule' => null,
            'data' => null,
        ),

        'CreateEqipGroups' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'CreateEqipGroups',
            'bizRule' => null,
            'data' => null,
        ),

        'UpdateEqipGroups' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'UpdateEqipGroups',
            'bizRule' => null,
            'data' => null,
        ),

        'DeleteEqipGroups' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'DeleteEqipGroups',
            'bizRule' => null,
            'data' => null,
        ),

);