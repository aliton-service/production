<?php
return array(
	
 /** Роли для таблицы EquipGroups (типы улиц) **/
        'ManagerEquipGroups' => array(
            'type' => CAuthItem::TYPE_ROLE,
            'description' => 'ManagerEquipGroups',
            'bizRule' => null,
            'data' => null,
            'defaultIndex' => 'EquipGroups/index',
             'children' => array(
                'ViewEquipGroups',
                'CreateEquipGroups',
                'UpdateEquipGroups',
                ),
        ),

        'AdminEquipGroups' => array(
            'type' => CAuthItem::TYPE_ROLE,
            'description' => 'AdminEquipGroups',
            'bizRule' => null,
            'data' => null,
            'defaultIndex' => 'EquipGroups/index',
            'children' => array(
                'ViewEquipGroups',
                'CreateEquipGroups',
                'UpdateEquipGroups',
                'DeleteEquipGroups',
                ),
        ),

        'UserEquipGroups' => array(
            'type' => CAuthItem::TYPE_ROLE,
            'description' => 'UserEquipGroups',
            'bizRule' => null,
            'data' => null,
            'defaultIndex' => 'EquipGroups/index',
            'children' => array(
                'ViewEquipGroups'
                ),
        ),

        'ViewEquipGroups' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'ViewEquipGroups',
            'bizRule' => null,
            'data' => null,
        ),

        'CreateEquipGroups' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'CreateEquipGroups',
            'bizRule' => null,
            'data' => null,
        ),

        'UpdateEquipGroups' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'UpdateEquipGroups',
            'bizRule' => null,
            'data' => null,
        ),

        'DeleteEquipGroups' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'DeleteEquipGroups',
            'bizRule' => null,
            'data' => null,
        ),

);