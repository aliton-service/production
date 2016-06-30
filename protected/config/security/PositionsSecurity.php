<?php
return array(
	
         /** Роли для таблицы Positions (Должности) **/
        'ManagerPositions' => array(
            'type' => CAuthItem::TYPE_ROLE,
            'description' => 'ManagerPositions',
            'bizRule' => null,
            'data' => null,
            'defaultIndex' => 'positions/index',
             'children' => array(
                'ViewPositions',
                'CreatePositions',
                'UpdatePositions',
                ),
        ),

        'AdminPositions' => array(
            'type' => CAuthItem::TYPE_ROLE,
            'description' => 'AdminPositions',
            'bizRule' => null,
            'data' => null,
            'defaultIndex' => 'positions/index',
            'children' => array(
                'ViewPositions',
                'CreatePositions',
                'UpdatePositions',
                'DeletePositions',
                ),
        ),

        'UserPositions' => array(
            'type' => CAuthItem::TYPE_ROLE,
            'description' => 'UserPositions',
            'bizRule' => null,
            'data' => null,
            'defaultIndex' => 'positions/index',
            'children' => array(
                'ViewPositions'
                ),
        ),

        'ViewPositions' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'ViewPositions',
            'bizRule' => null,
            'data' => null,
        ),

        'CreatePositions' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'CreatePositions',
            'bizRule' => null,
            'data' => null,
        ),

        'UpdatePositions' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'UpdatePositions',
            'bizRule' => null,
            'data' => null,
        ),

        'DeletePositions' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'DeletePositions',
            'bizRule' => null,
            'data' => null,
        ),
);

