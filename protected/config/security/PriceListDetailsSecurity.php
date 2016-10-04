<?php
return array(
	
 /** Роли для таблицы PriceListDetails (Прайс-лист) **/
        'ManagerPriceListDetails' => array(
            'type' => CAuthItem::TYPE_ROLE,
            'description' => 'ManagerPriceListDetails',
            'bizRule' => null,
            'data' => null,
            'defaultIndex' => 'PriceListDetails/index',
             'children' => array(
                'ViewPriceListDetails',
                'CreatePriceListDetails',
                'UpdatePriceListDetails',
                ),
        ),

        'AdminPriceListDetails' => array(
            'type' => CAuthItem::TYPE_ROLE,
            'description' => 'AdminPriceListDetails',
            'bizRule' => null,
            'data' => null,
            'defaultIndex' => 'PriceListDetails/index',
            'children' => array(
                'ViewPriceListDetails',
                'CreatePriceListDetails',
                'UpdatePriceListDetails',
                'DeletePriceListDetails',
                ),
        ),

        'UserPriceListDetails' => array(
            'type' => CAuthItem::TYPE_ROLE,
            'description' => 'UserPriceListDetails',
            'bizRule' => null,
            'data' => null,
            'defaultIndex' => 'PriceListDetails/index',
            'children' => array(
                'ViewPriceListDetails'
                ),
        ),

        'ViewPriceListDetails' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'ViewPriceListDetails',
            'bizRule' => null,
            'data' => null,
        ),

        'CreatePriceListDetails' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'CreatePriceListDetails',
            'bizRule' => null,
            'data' => null,
        ),

        'UpdatePriceListDetails' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'UpdatePriceListDetails',
            'bizRule' => null,
            'data' => null,
        ),

        'DeletePriceListDetails' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'DeletePriceListDetails',
            'bizRule' => null,
            'data' => null,
        ),
);