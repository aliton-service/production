<?php
return array(
	
 /** Роли для таблицы Equips (справочник оборудований) **/
        'ManagerEquips' => array(
            'type' => CAuthItem::TYPE_ROLE,
            'description' => 'ManagerEquips',
            'bizRule' => null,
            'data' => null,
            'defaultIndex' => 'Equips/index',
             'children' => array(
                'ViewEquips',
                'CreateEquips',
                'UpdateEquips',
                ),
        ),

        'AdminEquips' => array(
            'type' => CAuthItem::TYPE_ROLE,
            'description' => 'AdminEquips',
            'bizRule' => null,
            'data' => null,
            'defaultIndex' => 'Equips/index',
            'children' => array(
                'ViewEquips',
                'CreateEquips',
                'UpdateEquips',
                'DeleteEquips',
                ),
        ),

        'UserEquips' => array(
            'type' => CAuthItem::TYPE_ROLE,
            'description' => 'UserEquips',
            'bizRule' => null,
            'data' => null,
            'defaultIndex' => 'Equips/index',
            'children' => array(
                'ViewEquips'
                ),
        ),

        'ViewEquips' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'ViewEquips',
            'bizRule' => null,
            'data' => null,
        ),

        'CreateEquips' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'CreateEquips',
            'bizRule' => null,
            'data' => null,
        ),

        'UpdateEquips' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'UpdateEquips',
            'bizRule' => null,
            'data' => null,
        ),

        'DeleteEquips' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'DeleteEquips',
            'bizRule' => null,
            'data' => null,
        ),

);