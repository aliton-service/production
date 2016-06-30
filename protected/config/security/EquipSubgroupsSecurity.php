<?php
return array(
	
 /** Роли для таблицы EquipSubgroups (типы улиц) **/
        'ManagerEquipSubgroups' => array(
            'type' => CAuthItem::TYPE_ROLE,
            'description' => 'ManagerEquipSubgroups',
            'bizRule' => null,
            'data' => null,
            'defaultIndex' => 'EquipSubgroups/index',
             'children' => array(
                'ViewEquipSubgroups',
                'CreateEquipSubgroups',
                'UpdateEquipSubgroups',
                ),
        ),

        'AdminEquipSubgroups' => array(
            'type' => CAuthItem::TYPE_ROLE,
            'description' => 'AdminEquipSubgroups',
            'bizRule' => null,
            'data' => null,
            'defaultIndex' => 'EquipSubgroups/index',
            'children' => array(
                'ViewEquipSubgroups',
                'CreateEquipSubgroups',
                'UpdateEquipSubgroups',
                'DeleteEquipSubgroups',
                ),
        ),

        'UserEquipSubgroups' => array(
            'type' => CAuthItem::TYPE_ROLE,
            'description' => 'UserEquipSubgroups',
            'bizRule' => null,
            'data' => null,
            'defaultIndex' => 'EquipSubgroups/index',
            'children' => array(
                'ViewEquipSubgroups'
                ),
        ),

        'ViewEquipSubgroups' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'ViewEquipSubgroups',
            'bizRule' => null,
            'data' => null,
        ),

        'CreateEquipSubgroups' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'CreateEquipSubgroups',
            'bizRule' => null,
            'data' => null,
        ),

        'UpdateEquipSubgroups' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'UpdateEquipSubgroups',
            'bizRule' => null,
            'data' => null,
        ),

        'DeleteEquipSubgroups' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'DeleteEquipSubgroups',
            'bizRule' => null,
            'data' => null,
        ),

);