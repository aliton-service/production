<?php
return array(
	
 /** Роли для таблицы EquipRateDetails (типы улиц) **/
        'ManagerEquipRateDetails' => array(
            'type' => CAuthItem::TYPE_ROLE,
            'description' => 'ManagerEquipRateDetails',
            'bizRule' => null,
            'data' => null,
            'defaultIndex' => 'EquipRateDetails/index',
             'children' => array(
                'ViewEquipRateDetails',
                'CreateEquipRateDetails',
                'UpdateEquipRateDetails',
                ),
        ),

        'AdminEquipRateDetails' => array(
            'type' => CAuthItem::TYPE_ROLE,
            'description' => 'AdminEquipRateDetails',
            'bizRule' => null,
            'data' => null,
            'defaultIndex' => 'EquipRateDetails/index',
            'children' => array(
                'ViewEquipRateDetails',
                'CreateEquipRateDetails',
                'UpdateEquipRateDetails',
                'DeleteEquipRateDetails',
                ),
        ),

        'UserEquipRateDetails' => array(
            'type' => CAuthItem::TYPE_ROLE,
            'description' => 'UserEquipRateDetails',
            'bizRule' => null,
            'data' => null,
            'defaultIndex' => 'EquipRateDetails/index',
            'children' => array(
                'ViewEquipRateDetails'
                ),
        ),

        'ViewEquipRateDetails' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'ViewEquipRateDetails',
            'bizRule' => null,
            'data' => null,
        ),

        'CreateEquipRateDetails' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'CreateEquipRateDetails',
            'bizRule' => null,
            'data' => null,
        ),

        'UpdateEquipRateDetails' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'UpdateEquipRateDetails',
            'bizRule' => null,
            'data' => null,
        ),

        'DeleteEquipRateDetails' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'DeleteEquipRateDetails',
            'bizRule' => null,
            'data' => null,
        ),

);