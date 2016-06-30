<?php
return array(
	
 /** Роли для таблицы StreetTypes (типы улиц) **/
        'ManagerPriceChangeReasons' => array(
            'type' => CAuthItem::TYPE_ROLE,
            'description' => 'ManagerPriceChangeReasons',
            'bizRule' => null,
            'data' => null,
            'defaultIndex' => 'PriceChangeReasons/index',
             'children' => array(
                'ViewPriceChangeReasons',
                'CreatePriceChangeReasons',
                'UpdatePriceChangeReasons',
                ),
        ),

        'AdminPriceChangeReasons' => array(
            'type' => CAuthItem::TYPE_ROLE,
            'description' => 'AdminPriceChangeReasons',
            'bizRule' => null,
            'data' => null,
            'defaultIndex' => 'PriceChangeReasons/index',
            'children' => array(
                'ViewPriceChangeReasons',
                'CreatePriceChangeReasons',
                'UpdatePriceChangeReasons',
                'DeletePriceChangeReasons',
                ),
        ),

        'UserPriceChangeReasons' => array(
            'type' => CAuthItem::TYPE_ROLE,
            'description' => 'UserPriceChangeReasons',
            'bizRule' => null,
            'data' => null,
            'defaultIndex' => 'PriceChangeReasons/index',
            'children' => array(
                'ViewPriceChangeReasons'
                ),
        ),

        'ViewPriceChangeReasons' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'ViewPriceChangeReasons',
            'bizRule' => null,
            'data' => null,
        ),

        'CreatePriceChangeReasons' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'CreatePriceChangeReasons',
            'bizRule' => null,
            'data' => null,
        ),

        'UpdatePriceChangeReasons' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'UpdatePriceChangeReasons',
            'bizRule' => null,
            'data' => null,
        ),

        'DeletePriceChangeReasons' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'DeletePriceChangeReasons',
            'bizRule' => null,
            'data' => null,
        ),

);