<?php
return array(
	
 /** Роли для таблицы EquipRates (типы улиц) **/
        'ManagerEquipRates' => array(
            'type' => CAuthItem::TYPE_ROLE,
            'description' => 'ManagerEquipRates',
            'bizRule' => null,
            'data' => null,
            'defaultIndex' => 'EquipRates/index',
             'children' => array(
                'ViewEquipRates',
                'CreateEquipRates',
                'UpdateEquipRates',
                ),
        ),

        'AdminEquipRates' => array(
            'type' => CAuthItem::TYPE_ROLE,
            'description' => 'AdminEquipRates',
            'bizRule' => null,
            'data' => null,
            'defaultIndex' => 'EquipRates/index',
            'children' => array(
                'ViewEquipRates',
                'CreateEquipRates',
                'UpdateEquipRates',
                'DeleteEquipRates',
                ),
        ),

        'UserEquipRates' => array(
            'type' => CAuthItem::TYPE_ROLE,
            'description' => 'UserEquipRates',
            'bizRule' => null,
            'data' => null,
            'defaultIndex' => 'EquipRates/index',
            'children' => array(
                'ViewEquipRates'
                ),
        ),

        'ViewEquipRates' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'ViewEquipRates',
            'bizRule' => null,
            'data' => null,
        ),

        'CreateEquipRates' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'CreateEquipRates',
            'bizRule' => null,
            'data' => null,
        ),

        'UpdateEquipRates' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'UpdateEquipRates',
            'bizRule' => null,
            'data' => null,
        ),

        'DeleteEquipRates' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'DeleteEquipRates',
            'bizRule' => null,
            'data' => null,
        ),

);