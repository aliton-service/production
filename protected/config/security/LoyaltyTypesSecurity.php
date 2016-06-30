<?php
return array(
	
 /** Роли для таблицы StreetTypes (типы улиц) **/
        'ManagerLoyaltyTypes' => array(
            'type' => CAuthItem::TYPE_ROLE,
            'description' => 'ManagerLoyaltyTypes',
            'bizRule' => null,
            'data' => null,
            'defaultIndex' => 'LoyaltyTypes/index',
             'children' => array(
                'ViewLoyaltyTypes',
                'CreateLoyaltyTypes',
                'UpdateLoyaltyTypes',
                ),
        ),

        'AdminLoyaltyTypes' => array(
            'type' => CAuthItem::TYPE_ROLE,
            'description' => 'AdminLoyaltyTypes',
            'bizRule' => null,
            'data' => null,
            'defaultIndex' => 'LoyaltyTypes/index',
            'children' => array(
                'ViewLoyaltyTypes',
                'CreateLoyaltyTypes',
                'UpdateLoyaltyTypes',
                'DeleteLoyaltyTypes',
                ),
        ),

        'UserLoyaltyTypes' => array(
            'type' => CAuthItem::TYPE_ROLE,
            'description' => 'UserLoyaltyTypes',
            'bizRule' => null,
            'data' => null,
            'defaultIndex' => 'LoyaltyTypes/index',
            'children' => array(
                'ViewLoyaltyTypes'
                ),
        ),

        'ViewLoyaltyTypes' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'ViewLoyaltyTypes',
            'bizRule' => null,
            'data' => null,
        ),

        'CreateLoyaltyTypes' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'CreateLoyaltyTypes',
            'bizRule' => null,
            'data' => null,
        ),

        'UpdateLoyaltyTypes' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'UpdateLoyaltyTypes',
            'bizRule' => null,
            'data' => null,
        ),

        'DeleteLoyaltyTypes' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'DeleteLoyaltyTypes',
            'bizRule' => null,
            'data' => null,
        ),

);