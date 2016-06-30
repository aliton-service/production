<?php
return array(
	
 /** Роли для таблицы StreetTypes (типы улиц) **/
        'ManagerDelayReasons' => array(
            'type' => CAuthItem::TYPE_ROLE,
            'description' => 'ManagerDelayReasons',
            'bizRule' => null,
            'data' => null,
            'defaultIndex' => 'DelayReasons/index',
             'children' => array(
                'ViewDelayReasons',
                'CreateDelayReasons',
                'UpdateDelayReasons',
                ),
        ),

        'AdminDelayReasons' => array(
            'type' => CAuthItem::TYPE_ROLE,
            'description' => 'AdminDelayReasons',
            'bizRule' => null,
            'data' => null,
            'defaultIndex' => 'DelayReasons/index',
            'children' => array(
                'ViewDelayReasons',
                'CreateDelayReasons',
                'UpdateDelayReasons',
                'DeleteDelayReasons',
                ),
        ),

        'UserDelayReasons' => array(
            'type' => CAuthItem::TYPE_ROLE,
            'description' => 'UserDelayReasons',
            'bizRule' => null,
            'data' => null,
            'defaultIndex' => 'DelayReasons/index',
            'children' => array(
                'ViewDelayReasons'
                ),
        ),

        'ViewDelayReasons' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'ViewDelayReasons',
            'bizRule' => null,
            'data' => null,
        ),

        'CreateDelayReasons' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'CreateDelayReasons',
            'bizRule' => null,
            'data' => null,
        ),

        'UpdateDelayReasons' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'UpdateDelayReasons',
            'bizRule' => null,
            'data' => null,
        ),

        'DeleteDelayReasons' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'DeleteDelayReasons',
            'bizRule' => null,
            'data' => null,
        ),

);