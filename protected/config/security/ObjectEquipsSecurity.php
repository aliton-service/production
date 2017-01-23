<?php
return array(
	
         /** Роли для таблицы ObjectEquips (Подразделения) **/
        'ManagerObjectEquips' => array(
            'type' => CAuthItem::TYPE_ROLE,
            'description' => 'ManagerObjectEquips',
            'bizRule' => null,
            'data' => null,
            'defaultIndex' => 'sections/index',
             'children' => array(
                'ViewObjectEquips',
                'CreateObjectEquips',
                'UpdateObjectEquips',
                'DeleteObjectEquips',
                ),
        ),

        'AdminObjectEquips' => array(
            'type' => CAuthItem::TYPE_ROLE,
            'description' => 'AdminObjectEquips',
            'bizRule' => null,
            'data' => null,
            'defaultIndex' => 'sections/index',
            'children' => array(
                'ViewObjectEquips',
                'CreateObjectEquips',
                'UpdateObjectEquips',
                'DeleteObjectEquips',
                ),
        ),

        'UserObjectEquips' => array(
            'type' => CAuthItem::TYPE_ROLE,
            'description' => 'UserObjectEquips',
            'bizRule' => null,
            'data' => null,
            'defaultIndex' => 'sections/index',
            'children' => array(
                'ViewObjectEquips'
                ),
        ),

        'ViewObjectEquips' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'ViewObjectEquips',
            'bizRule' => null,
            'data' => null,
        ),

        'CreateObjectEquips' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'CreateObjectEquips',
            'bizRule' => null,
            'data' => null,
        ),

        'UpdateObjectEquips' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'UpdateObjectEquips',
            'bizRule' => null,
            'data' => null,
        ),

        'DeleteObjectEquips' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'DeleteObjectEquips',
            'bizRule' => null,
            'data' => null,
        ),
);





