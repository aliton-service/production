<?php
return array(
	
 /** Роли для таблицы AddressSystems (типы улиц) **/
        'ManagerAddressSystems' => array(
            'type' => CAuthItem::TYPE_ROLE,
            'description' => 'ManagerAddressSystems',
            'bizRule' => null,
            'data' => null,
            'defaultIndex' => 'AddressSystems/index',
             'children' => array(
                'ViewAddressSystems',
                'CreateAddressSystems',
                'UpdateAddressSystems',
                ),
        ),

        'AdminAddressSystems' => array(
            'type' => CAuthItem::TYPE_ROLE,
            'description' => 'AdminAddressSystems',
            'bizRule' => null,
            'data' => null,
            'defaultIndex' => 'AddressSystems/index',
            'children' => array(
                'ViewAddressSystems',
                'CreateAddressSystems',
                'UpdateAddressSystems',
                'DeleteAddressSystems',
                ),
        ),

        'UserAddressSystems' => array(
            'type' => CAuthItem::TYPE_ROLE,
            'description' => 'UserAddressSystems',
            'bizRule' => null,
            'data' => null,
            'defaultIndex' => 'AddressSystems/index',
            'children' => array(
                'ViewAddressSystems'
                ),
        ),

        'ViewAddressSystems' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'ViewAddressSystems',
            'bizRule' => null,
            'data' => null,
        ),

        'CreateAddressSystems' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'CreateAddressSystems',
            'bizRule' => null,
            'data' => null,
        ),

        'UpdateAddressSystems' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'UpdateAddressSystems',
            'bizRule' => null,
            'data' => null,
        ),

        'DeleteAddressSystems' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'DeleteAddressSystems',
            'bizRule' => null,
            'data' => null,
        ),

);