<?php
return array(
	
 /** Роли для таблицы EquipsHistory (типы улиц) **/
        'ManagerEquipsHistory' => array(
            'type' => CAuthItem::TYPE_ROLE,
            'description' => 'ManagerEquipsHistory',
            'bizRule' => null,
            'data' => null,
            'defaultIndex' => 'EquipsHistory/index',
             'children' => array(
                'ViewEquipsHistory',
                'CreateEquipsHistory',
                'UpdateEquipsHistory',
                ),
        ),

        'AdminEquipsHistory' => array(
            'type' => CAuthItem::TYPE_ROLE,
            'description' => 'AdminEquipsHistory',
            'bizRule' => null,
            'data' => null,
            'defaultIndex' => 'EquipsHistory/index',
            'children' => array(
                'ViewEquipsHistory',
                'CreateEquipsHistory',
                'UpdateEquipsHistory',
                'DeleteEquipsHistory',
                ),
        ),

        'UserEquipsHistory' => array(
            'type' => CAuthItem::TYPE_ROLE,
            'description' => 'UserEquipsHistory',
            'bizRule' => null,
            'data' => null,
            'defaultIndex' => 'EquipsHistory/index',
            'children' => array(
                'ViewEquipsHistory'
                ),
        ),

        'ViewEquipsHistory' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'ViewEquipsHistory',
            'bizRule' => null,
            'data' => null,
        ),

        'CreateEquipsHistory' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'CreateEquipsHistory',
            'bizRule' => null,
            'data' => null,
        ),

        'UpdateEquipsHistory' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'UpdateEquipsHistory',
            'bizRule' => null,
            'data' => null,
        ),

        'DeleteEquipsHistory' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'DeleteEquipsHistory',
            'bizRule' => null,
            'data' => null,
        ),

);