<?php
return array(
	
 /** Роли для таблицы EquipsRate (типы улиц) **/
        'ManagerEquipsRate' => array(
            'type' => CAuthItem::TYPE_ROLE,
            'description' => 'ManagerEquipsRate',
            'bizRule' => null,
            'data' => null,
            'defaultIndex' => 'EquipsRate/index',
             'children' => array(
                'ViewEquipsRate',
                'CreateEquipsRate',
                'UpdateEquipsRate',
                ),
        ),

        'AdminEquipsRate' => array(
            'type' => CAuthItem::TYPE_ROLE,
            'description' => 'AdminEquipsRate',
            'bizRule' => null,
            'data' => null,
            'defaultIndex' => 'EquipsRate/index',
            'children' => array(
                'ViewEquipsRate',
                'CreateEquipsRate',
                'UpdateEquipsRate',
                'DeleteEquipsRate',
                ),
        ),

        'UserEquipsRate' => array(
            'type' => CAuthItem::TYPE_ROLE,
            'description' => 'UserEquipsRate',
            'bizRule' => null,
            'data' => null,
            'defaultIndex' => 'EquipsRate/index',
            'children' => array(
                'ViewEquipsRate'
                ),
        ),

        'ViewEquipsRate' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'ViewEquipsRate',
            'bizRule' => null,
            'data' => null,
        ),

        'CreateEquipsRate' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'CreateEquipsRate',
            'bizRule' => null,
            'data' => null,
        ),

        'UpdateEquipsRate' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'UpdateEquipsRate',
            'bizRule' => null,
            'data' => null,
        ),

        'DeleteEquipsRate' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'DeleteEquipsRate',
            'bizRule' => null,
            'data' => null,
        ),

);