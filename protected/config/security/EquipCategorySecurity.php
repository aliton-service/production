<?php
return array(
	
 /** Роли для таблицы EquipCategory (типы улиц) **/
        'ManagerEquipCategory' => array(
            'type' => CAuthItem::TYPE_ROLE,
            'description' => 'ManagerEquipCategory',
            'bizRule' => null,
            'data' => null,
            'defaultIndex' => 'EquipCategory/index',
             'children' => array(
                'ViewEquipCategory',
                'CreateEquipCategory',
                'UpdateEquipCategory',
                ),
        ),

        'AdminEquipCategory' => array(
            'type' => CAuthItem::TYPE_ROLE,
            'description' => 'AdminEquipCategory',
            'bizRule' => null,
            'data' => null,
            'defaultIndex' => 'EquipCategory/index',
            'children' => array(
                'ViewEquipCategory',
                'CreateEquipCategory',
                'UpdateEquipCategory',
                'DeleteEquipCategory',
                ),
        ),

        'UserEquipCategory' => array(
            'type' => CAuthItem::TYPE_ROLE,
            'description' => 'UserEquipCategory',
            'bizRule' => null,
            'data' => null,
            'defaultIndex' => 'EquipCategory/index',
            'children' => array(
                'ViewWorkTypes'
                ),
        ),

        'ViewEquipCategory' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'ViewEquipCategory',
            'bizRule' => null,
            'data' => null,
        ),

        'CreateEquipCategory' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'CreateEquipCategory',
            'bizRule' => null,
            'data' => null,
        ),

        'UpdateEquipCategory' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'UpdateEquipCategory',
            'bizRule' => null,
            'data' => null,
        ),

        'DeleteEquipCategory' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'DeleteEquipCategory',
            'bizRule' => null,
            'data' => null,
        ),

);