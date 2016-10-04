<?php
return array(
	
 /** Роли для таблицы PriceList (Прайс-лист) **/
        'ManagerPriceList' => array(
            'type' => CAuthItem::TYPE_ROLE,
            'description' => 'ManagerPriceList',
            'bizRule' => null,
            'data' => null,
            'defaultIndex' => 'PriceList/index',
             'children' => array(
                'ViewPriceList',
                'CreatePriceList',
                'UpdatePriceList',
                ),
        ),

        'AdminPriceList' => array(
            'type' => CAuthItem::TYPE_ROLE,
            'description' => 'AdminPriceList',
            'bizRule' => null,
            'data' => null,
            'defaultIndex' => 'PriceList/index',
            'children' => array(
                'ViewPriceList',
                'CreatePriceList',
                'UpdatePriceList',
                'DeletePriceList',
                ),
        ),

        'UserPriceList' => array(
            'type' => CAuthItem::TYPE_ROLE,
            'description' => 'UserPriceList',
            'bizRule' => null,
            'data' => null,
            'defaultIndex' => 'PriceList/index',
            'children' => array(
                'ViewPriceList'
                ),
        ),

        'ViewPriceList' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'ViewPriceList',
            'bizRule' => null,
            'data' => null,
        ),

        'CreatePriceList' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'CreatePriceList',
            'bizRule' => null,
            'data' => null,
        ),

        'UpdatePriceList' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'UpdatePriceList',
            'bizRule' => null,
            'data' => null,
        ),

        'DeletePriceList' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'DeletePriceList',
            'bizRule' => null,
            'data' => null,
        ),

);