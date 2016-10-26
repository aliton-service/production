<?php
return array(
	
 /** Роли для таблицы WHBuhActsEquips (Бухгалтерский акт - Оборудование) **/
        'ManagerWHBuhActsEquips' => array(
            'type' => CAuthItem::TYPE_ROLE,
            'description' => 'ManagerWHBuhActsEquips',
            'bizRule' => null,
            'data' => null,
            'defaultIndex' => 'WHBuhActsEquips/index',
             'children' => array(
                'ViewWHBuhActsEquips',
                'CreateWHBuhActsEquips',
                'UpdateWHBuhActsEquips',
                ),
        ),

        'AdminWHBuhActsEquips' => array(
            'type' => CAuthItem::TYPE_ROLE,
            'description' => 'AdminWHBuhActsEquips',
            'bizRule' => null,
            'data' => null,
            'defaultIndex' => 'WHBuhActsEquips/index',
            'children' => array(
                'ViewWHBuhActsEquips',
                'CreateWHBuhActsEquips',
                'UpdateWHBuhActsEquips',
                'DeleteWHBuhActsEquips',
                ),
        ),

        'UserWHBuhActsEquips' => array(
            'type' => CAuthItem::TYPE_ROLE,
            'description' => 'UserWHBuhActsEquips',
            'bizRule' => null,
            'data' => null,
            'defaultIndex' => 'WHBuhActsEquips/index',
            'children' => array(
                'ViewWHBuhActsEquips'
                ),
        ),

        'ViewWHBuhActsEquips' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'ViewWHBuhActsEquips',
            'bizRule' => null,
            'data' => null,
        ),

        'CreateWHBuhActsEquips' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'CreateWHBuhActsEquips',
            'bizRule' => null,
            'data' => null,
        ),

        'UpdateWHBuhActsEquips' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'UpdateWHBuhActsEquips',
            'bizRule' => null,
            'data' => null,
        ),

        'DeleteWHBuhActsEquips' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'DeleteWHBuhActsEquips',
            'bizRule' => null,
            'data' => null,
        ),

);