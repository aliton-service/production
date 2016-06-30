<?php
return array(
	
 /** Роли для таблицы StreetTypes (типы улиц) **/
        'ManagerPaymentTypes' => array(
            'type' => CAuthItem::TYPE_ROLE,
            'description' => 'ManagerPaymentTypes',
            'bizRule' => null,
            'data' => null,
            'defaultIndex' => 'PaymentTypes/index',
             'children' => array(
                'ViewPaymentTypes',
                'CreatePaymentTypes',
                'UpdatePaymentTypes',
                ),
        ),

        'AdminPaymentTypes' => array(
            'type' => CAuthItem::TYPE_ROLE,
            'description' => 'AdminPaymentTypes',
            'bizRule' => null,
            'data' => null,
            'defaultIndex' => 'PaymentTypes/index',
            'children' => array(
                'ViewPaymentTypes',
                'CreatePaymentTypes',
                'UpdatePaymentTypes',
                'DeletePaymentTypes',
                ),
        ),

        'UserPaymentTypes' => array(
            'type' => CAuthItem::TYPE_ROLE,
            'description' => 'UserPaymentTypes',
            'bizRule' => null,
            'data' => null,
            'defaultIndex' => 'PaymentTypes/index',
            'children' => array(
                'ViewPaymentTypes'
                ),
        ),

        'ViewPaymentTypes' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'ViewPaymentTypes',
            'bizRule' => null,
            'data' => null,
        ),

        'CreatePaymentTypes' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'CreatePaymentTypes',
            'bizRule' => null,
            'data' => null,
        ),

        'UpdatePaymentTypes' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'UpdatePaymentTypes',
            'bizRule' => null,
            'data' => null,
        ),

        'DeletePaymentTypes' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'DeletePaymentTypes',
            'bizRule' => null,
            'data' => null,
        ),

);