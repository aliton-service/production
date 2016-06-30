<?php
return array(
	
 /** Роли для таблицы StreetTypes (типы улиц) **/
        'ManagerReceiptReasons' => array(
            'type' => CAuthItem::TYPE_ROLE,
            'description' => 'ManagerReceiptReasons',
            'bizRule' => null,
            'data' => null,
            'defaultIndex' => 'ReceiptReasons/index',
             'children' => array(
                'ViewReceiptReasons',
                'CreateReceiptReasons',
                'UpdateReceiptReasons',
                ),
        ),

        'AdminReceiptReasons' => array(
            'type' => CAuthItem::TYPE_ROLE,
            'description' => 'AdminReceiptReasons',
            'bizRule' => null,
            'data' => null,
            'defaultIndex' => 'ReceiptReasons/index',
            'children' => array(
                'ViewReceiptReasons',
                'CreateReceiptReasons',
                'UpdateReceiptReasons',
                'DeleteReceiptReasons',
                ),
        ),

        'UserReceiptReasons' => array(
            'type' => CAuthItem::TYPE_ROLE,
            'description' => 'UserReceiptReasons',
            'bizRule' => null,
            'data' => null,
            'defaultIndex' => 'ReceiptReasons/index',
            'children' => array(
                'ViewStreetTypes'
                ),
        ),

        'ViewReceiptReasons' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'ViewReceiptReasons',
            'bizRule' => null,
            'data' => null,
        ),

        'CreateReceiptReasons' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'CreateReceiptReasons',
            'bizRule' => null,
            'data' => null,
        ),

        'UpdateReceiptReasons' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'UpdateReceiptReasons',
            'bizRule' => null,
            'data' => null,
        ),

        'DeleteReceiptReasons' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'DeleteReceiptReasons',
            'bizRule' => null,
            'data' => null,
        ),

);