<?php
return array(
	
 /** Роли для таблицы EquipAnalog (типы улиц) **/
        'ManagerEquipAnalog' => array(
            'type' => CAuthItem::TYPE_ROLE,
            'description' => 'ManagerEquipAnalog',
            'bizRule' => null,
            'data' => null,
            'defaultIndex' => 'EquipAnalog/index',
             'children' => array(
                'ViewEquipAnalog',
                'CreateEquipAnalog',
                'UpdateEquipAnalog',
                ),
        ),

        'AdminEquipAnalog' => array(
            'type' => CAuthItem::TYPE_ROLE,
            'description' => 'AdminEquipAnalog',
            'bizRule' => null,
            'data' => null,
            'defaultIndex' => 'EquipAnalog/index',
            'children' => array(
                'ViewEquipAnalog',
                'CreateEquipAnalog',
                'UpdateEquipAnalog',
                'DeleteEquipAnalog',
                ),
        ),

        'UserEquipAnalog' => array(
            'type' => CAuthItem::TYPE_ROLE,
            'description' => 'UserEquipAnalog',
            'bizRule' => null,
            'data' => null,
            'defaultIndex' => 'EquipAnalog/index',
            'children' => array(
                'ViewEquipAnalog'
                ),
        ),

        'ViewEquipAnalog' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'ViewEquipAnalog',
            'bizRule' => null,
            'data' => null,
        ),

        'CreateEquipAnalog' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'CreateEquipAnalog',
            'bizRule' => null,
            'data' => null,
        ),

        'UpdateEquipAnalog' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'UpdateEquipAnalog',
            'bizRule' => null,
            'data' => null,
        ),

        'DeleteEquipAnalog' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'DeleteEquipAnalog',
            'bizRule' => null,
            'data' => null,
        ),

);