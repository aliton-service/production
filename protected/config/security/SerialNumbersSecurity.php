<?php
return array(
	
         /** Роли для таблицы SerialNumbers (Подразделения) **/
        'ManagerSerialNumbers' => array(
            'type' => CAuthItem::TYPE_ROLE,
            'description' => 'ManagerSerialNumbers',
            'bizRule' => null,
            'data' => null,
            'defaultIndex' => 'sections/index',
             'children' => array(
                'ViewSerialNumbers',
                'CreateSerialNumbers',
                'UpdateSerialNumbers',
                ),
        ),

        'AdminSerialNumbers' => array(
            'type' => CAuthItem::TYPE_ROLE,
            'description' => 'AdminSerialNumbers',
            'bizRule' => null,
            'data' => null,
            'defaultIndex' => 'sections/index',
            'children' => array(
                'ViewSerialNumbers',
                'CreateSerialNumbers',
                'UpdateSerialNumbers',
                'DeleteSerialNumbers',
                ),
        ),

        'UserSerialNumbers' => array(
            'type' => CAuthItem::TYPE_ROLE,
            'description' => 'UserSerialNumbers',
            'bizRule' => null,
            'data' => null,
            'defaultIndex' => 'sections/index',
            'children' => array(
                'ViewSerialNumbers'
                ),
        ),

        'ViewSerialNumbers' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'ViewSerialNumbers',
            'bizRule' => null,
            'data' => null,
        ),

        'CreateSerialNumbers' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'CreateSerialNumbers',
            'bizRule' => null,
            'data' => null,
        ),

        'UpdateSerialNumbers' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'UpdateSerialNumbers',
            'bizRule' => null,
            'data' => null,
        ),

        'DeleteSerialNumbers' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'DeleteSerialNumbers',
            'bizRule' => null,
            'data' => null,
        ),
);




