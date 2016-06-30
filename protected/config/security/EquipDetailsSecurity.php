<?php
return array(
	
 /** Роли для таблицы EquipDetails (типы улиц) **/
        'ManagerEquipDetails' => array(
            'type' => CAuthItem::TYPE_ROLE,
            'description' => 'ManagerEquipDetails',
            'bizRule' => null,
            'data' => null,
            'defaultIndex' => 'EquipDetails/index',
             'children' => array(
                'ViewEquipDetails',
                'CreateEquipDetails',
                'UpdateEquipDetails',
                ),
        ),

        'AdminEquipDetails' => array(
            'type' => CAuthItem::TYPE_ROLE,
            'description' => 'AdminEquipDetails',
            'bizRule' => null,
            'data' => null,
            'defaultIndex' => 'EquipDetails/index',
            'children' => array(
                'ViewEquipDetails',
                'CreateEquipDetails',
                'UpdateEquipDetails',
                'DeleteEquipDetails',
                ),
        ),

        'UserEquipDetails' => array(
            'type' => CAuthItem::TYPE_ROLE,
            'description' => 'UserEquipDetails',
            'bizRule' => null,
            'data' => null,
            'defaultIndex' => 'EquipDetails/index',
            'children' => array(
                'ViewEquipDetails'
                ),
        ),

        'ViewEquipDetails' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'ViewEquipDetails',
            'bizRule' => null,
            'data' => null,
        ),

        'CreateEquipDetails' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'CreateEquipDetails',
            'bizRule' => null,
            'data' => null,
        ),

        'UpdateEquipDetails' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'UpdateEquipDetails',
            'bizRule' => null,
            'data' => null,
        ),

        'DeleteEquipDetails' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'DeleteEquipDetails',
            'bizRule' => null,
            'data' => null,
        ),

);