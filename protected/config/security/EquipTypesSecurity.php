<?php
return array(
	
 /** Роли для таблицы EquipTypes (типы улиц) **/
        'ManagerEquipTypes' => array(
            'type' => CAuthItem::TYPE_ROLE,
            'description' => 'ManagerEquipTypes',
            'bizRule' => null,
            'data' => null,
            'defaultIndex' => 'EquipTypes/index',
             'children' => array(
                'ViewEquipTypes',
                'CreateEquipTypes',
                'UpdateEquipTypes',
                ),
        ),

        'AdminEquipTypes' => array(
            'type' => CAuthItem::TYPE_ROLE,
            'description' => 'AdminEquipTypes',
            'bizRule' => null,
            'data' => null,
            'defaultIndex' => 'EquipTypes/index',
            'children' => array(
                'ViewEquipTypes',
                'CreateEquipTypes',
                'UpdateEquipTypes',
                'DeleteEquipTypes',
                ),
        ),

        'UserEquipTypes' => array(
            'type' => CAuthItem::TYPE_ROLE,
            'description' => 'UserEquipTypes',
            'bizRule' => null,
            'data' => null,
            'defaultIndex' => 'EquipTypes/index',
            'children' => array(
                'ViewEquipTypes'
                ),
        ),

        'ViewEquipTypes' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'ViewEquipTypes',
            'bizRule' => null,
            'data' => null,
        ),

        'CreateEquipTypes' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'CreateEquipTypes',
            'bizRule' => null,
            'data' => null,
        ),

        'UpdateEquipTypes' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'UpdateEquipTypes',
            'bizRule' => null,
            'data' => null,
        ),

        'DeleteEquipTypes' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'DeleteEquipTypes',
            'bizRule' => null,
            'data' => null,
        ),

);