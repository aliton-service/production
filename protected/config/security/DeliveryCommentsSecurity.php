<?php
return array(
	'ManagerDeliveryComments' => array(
            'type' => CAuthItem::TYPE_ROLE,
            'description' => 'ManagerDeliveryComments',
            'bizRule' => null,
            'data' => null,
            'defaultIndex' => 'DeliveryComments/index',
             'children' => array(
                'ViewDeliveryComments',
                'CreateDeliveryComments',
                'UpdateDeliveryComments',
                ),
        ),

        'AdminDeliveryComments' => array(
            'type' => CAuthItem::TYPE_ROLE,
            'description' => 'AdminDeliveryComments',
            'bizRule' => null,
            'data' => null,
            'defaultIndex' => 'DeliveryComments/index',
            'children' => array(
                'ViewDeliveryComments',
                'CreateDeliveryComments',
                'UpdateDeliveryComments',
                'DeleteDeliveryComments',
                ),
        ),

        'UserDeliveryComments' => array(
            'type' => CAuthItem::TYPE_ROLE,
            'description' => 'UserDeliveryComments',
            'bizRule' => null,
            'data' => null,
            'defaultIndex' => 'DeliveryComments/index',
            'children' => array(
                'ViewDeliveryComments'
                ),
        ),

        'ViewStreetTypes' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'ViewDeliveryComments',
            'bizRule' => null,
            'data' => null,
        ),

        'CreateDeliveryComments' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'CreateDeliveryComments',
            'bizRule' => null,
            'data' => null,
        ),

        'UpdateDeliveryComments' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'UpdateDeliveryComments',
            'bizRule' => null,
            'data' => null,
        ),

        'DeleteDeliveryComments' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'DeleteDeliveryComments',
            'bizRule' => null,
            'data' => null,
        ),

);

