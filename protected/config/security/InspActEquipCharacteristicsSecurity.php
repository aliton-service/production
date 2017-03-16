<?php
return array(
	
         /** Роли для таблицы InspActEquipCharacteristics (Подразделения) **/
        'ManagerInspActEquipCharacteristics' => array(
            'type' => CAuthItem::TYPE_ROLE,
            'description' => 'ManagerInspActEquipCharacteristics',
            'bizRule' => null,
            'data' => null,
            'defaultIndex' => 'sections/index',
             'children' => array(
                'ViewInspActEquipCharacteristics',
                'CreateInspActEquipCharacteristics',
                'UpdateInspActEquipCharacteristics',
                'DeleteInspActEquipCharacteristics',
                ),
        ),

        'AdminInspActEquipCharacteristics' => array(
            'type' => CAuthItem::TYPE_ROLE,
            'description' => 'AdminInspActEquipCharacteristics',
            'bizRule' => null,
            'data' => null,
            'defaultIndex' => 'sections/index',
            'children' => array(
                'ViewInspActEquipCharacteristics',
                'CreateInspActEquipCharacteristics',
                'UpdateInspActEquipCharacteristics',
                'DeleteInspActEquipCharacteristics',
                ),
        ),

        'UserInspActEquipCharacteristics' => array(
            'type' => CAuthItem::TYPE_ROLE,
            'description' => 'UserInspActEquipCharacteristics',
            'bizRule' => null,
            'data' => null,
            'defaultIndex' => 'sections/index',
            'children' => array(
                'ViewInspActEquipCharacteristics'
                ),
        ),

        'ViewInspActEquipCharacteristics' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'ViewInspActEquipCharacteristics',
            'bizRule' => null,
            'data' => null,
        ),

        'CreateInspActEquipCharacteristics' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'CreateInspActEquipCharacteristics',
            'bizRule' => null,
            'data' => null,
        ),

        'UpdateInspActEquipCharacteristics' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'UpdateInspActEquipCharacteristics',
            'bizRule' => null,
            'data' => null,
        ),

        'DeleteInspActEquipCharacteristics' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'DeleteInspActEquipCharacteristics',
            'bizRule' => null,
            'data' => null,
        ),
);




