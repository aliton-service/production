<?php
return array(
	
         /** Роли для таблицы AddressedStorage (Подразделения) **/
        'ManagerAddressedStorage' => array(
            'type' => CAuthItem::TYPE_ROLE,
            'description' => 'ManagerAddressedStorage',
            'bizRule' => null,
            'data' => null,
            'defaultIndex' => 'sections/index',
             'children' => array(
                'ViewAddressedStorage',
                'CreateAddressedStorage',
                'UpdateAddressedStorage',
                ),
        ),

        'AdminAddressedStorage' => array(
            'type' => CAuthItem::TYPE_ROLE,
            'description' => 'AdminAddressedStorage',
            'bizRule' => null,
            'data' => null,
            'defaultIndex' => 'sections/index',
            'children' => array(
                'ViewAddressedStorage',
                'CreateAddressedStorage',
                'UpdateAddressedStorage',
                'DeleteAddressedStorage',
                ),
        ),

        'UserAddressedStorage' => array(
            'type' => CAuthItem::TYPE_ROLE,
            'description' => 'UserAddressedStorage',
            'bizRule' => null,
            'data' => null,
            'defaultIndex' => 'sections/index',
            'children' => array(
                'ViewAddressedStorage'
                ),
        ),

        'ViewAddressedStorage' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'ViewAddressedStorage',
            'bizRule' => null,
            'data' => null,
        ),

        'CreateAddressedStorage' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'CreateAddressedStorage',
            'bizRule' => null,
            'data' => null,
        ),

        'UpdateAddressedStorage' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'UpdateAddressedStorage',
            'bizRule' => null,
            'data' => null,
        ),

        'DeleteAddressedStorage' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'DeleteAddressedStorage',
            'bizRule' => null,
            'data' => null,
        ),
);






