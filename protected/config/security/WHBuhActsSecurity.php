<?php
return array(
	
 /** Роли для таблицы WHBuhActs (Бухгалтерский акт) **/
        'ManagerWHBuhActs' => array(
            'type' => CAuthItem::TYPE_ROLE,
            'description' => 'ManagerWHBuhActs',
            'bizRule' => null,
            'data' => null,
            'defaultIndex' => 'WHBuhActs/index',
             'children' => array(
                'ViewWHBuhActs',
                'CreateWHBuhActs',
                'UpdateWHBuhActs',
                ),
        ),

        'AdminWHBuhActs' => array(
            'type' => CAuthItem::TYPE_ROLE,
            'description' => 'AdminWHBuhActs',
            'bizRule' => null,
            'data' => null,
            'defaultIndex' => 'WHBuhActs/index',
            'children' => array(
                'ViewWHBuhActs',
                'CreateWHBuhActs',
                'UpdateWHBuhActs',
                'DeleteWHBuhActs',
                ),
        ),

        'UserWHBuhActs' => array(
            'type' => CAuthItem::TYPE_ROLE,
            'description' => 'UserWHBuhActs',
            'bizRule' => null,
            'data' => null,
            'defaultIndex' => 'WHBuhActs/index',
            'children' => array(
                'ViewWHBuhActs'
                ),
        ),

        'ViewWHBuhActs' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'ViewWHBuhActs',
            'bizRule' => null,
            'data' => null,
        ),

        'CreateWHBuhActs' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'CreateWHBuhActs',
            'bizRule' => null,
            'data' => null,
        ),

        'UpdateWHBuhActs' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'UpdateWHBuhActs',
            'bizRule' => null,
            'data' => null,
        ),

        'DeleteWHBuhActs' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'DeleteWHBuhActs',
            'bizRule' => null,
            'data' => null,
        ),

);