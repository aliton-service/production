<?php
return array(
	
 /** Роли для таблицы StreetTypes (типы улиц) **/
        'ManagerTransferReasons' => array(
            'type' => CAuthItem::TYPE_ROLE,
            'description' => 'ManagerTransferReasons',
            'bizRule' => null,
            'data' => null,
            'defaultIndex' => 'TransferReasons/index',
             'children' => array(
                'ViewTransferReasons',
                'CreateTransferReasons',
                'UpdateTransferReasons',
                ),
        ),

        'AdminTransferReasons' => array(
            'type' => CAuthItem::TYPE_ROLE,
            'description' => 'AdminTransferReasons',
            'bizRule' => null,
            'data' => null,
            'defaultIndex' => 'TransferReasons/index',
            'children' => array(
                'ViewTransferReasons',
                'CreateTransferReasons',
                'UpdateTransferReasons',
                'DeleteTransferReasons',
                ),
        ),

        'UserTransferReasons' => array(
            'type' => CAuthItem::TYPE_ROLE,
            'description' => 'UserTransferReasons',
            'bizRule' => null,
            'data' => null,
            'defaultIndex' => 'TransferReasons/index',
            'children' => array(
                'ViewTransferReasons'
                ),
        ),

        'ViewTransferReasons' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'ViewTransferReasons',
            'bizRule' => null,
            'data' => null,
        ),

        'CreateTransferReasons' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'CreateTransferReasons',
            'bizRule' => null,
            'data' => null,
        ),

        'UpdateTransferReasons' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'UpdateTransferReasons',
            'bizRule' => null,
            'data' => null,
        ),

        'DeleteTransferReasons' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'DeleteTransferReasons',
            'bizRule' => null,
            'data' => null,
        ),

);