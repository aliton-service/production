<?php
return array(
	
        'ManagerDeliveryTypes' => array(
            'type' => CAuthItem::TYPE_ROLE,
            'description' => 'ManagerDeliveryTypes',
            'bizRule' => null,
            'data' => null,
            'defaultIndex' => 'DeliveryTypes/index',
             'children' => array(
                'ViewDeliveryTypes',
                'CreateDeliveryTypes',
                'UpdateDeliveryTypes',
                ),
        ),

        'AdminDeliveryTypes' => array(
            'type' => CAuthItem::TYPE_ROLE,
            'description' => 'AdminDeliveryTypes',
            'bizRule' => null,
            'data' => null,
            'defaultIndex' => 'DeliveryTypes/index',
            'children' => array(
                'ViewDeliveryTypes',
                'CreateDeliveryTypes',
                'UpdateDeliveryTypes',
                'DeleteDeliveryTypes',
                ),
        ),

        'UserDeliveryTypes' => array(
            'type' => CAuthItem::TYPE_ROLE,
            'description' => 'UserDeliveryTypes',
            'bizRule' => null,
            'data' => null,
            'defaultIndex' => 'DeliveryTypes/index',
            'children' => array(
                'ViewDeliveryTypes'
                ),
        ),

        'ViewDeliveryTypes' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'ViewDeliveryTypes',
            'bizRule' => null,
            'data' => null,
        ),

        'CreateDeliveryTypes' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'CreateDeliveryTypes',
            'bizRule' => null,
            'data' => null,
        ),

        'UpdateDeliveryTypes' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'UpdateDeliveryTypes',
            'bizRule' => null,
            'data' => null,
        ),

        'DeleteDeliveryTypes' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'DeleteDeliveryTypes',
            'bizRule' => null,
            'data' => null,
        ),

);