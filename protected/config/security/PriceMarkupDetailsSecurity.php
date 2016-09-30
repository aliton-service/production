<?php
return array(
	
 /** Роли для таблицы PriceMarkupDetails (Наценки) **/
        'ManagerPriceMarkupDetails' => array(
            'type' => CAuthItem::TYPE_ROLE,
            'description' => 'ManagerPriceMarkupDetails',
            'bizRule' => null,
            'data' => null,
            'defaultIndex' => 'PriceMarkupDetails/index',
             'children' => array(
                'ViewPriceMarkupDetails',
                'CreatePriceMarkupDetails',
                'UpdatePriceMarkupDetails',
                ),
        ),

        'AdminPriceMarkupDetails' => array(
            'type' => CAuthItem::TYPE_ROLE,
            'description' => 'AdminPriceMarkupDetails',
            'bizRule' => null,
            'data' => null,
            'defaultIndex' => 'PriceMarkupDetails/index',
            'children' => array(
                'ViewPriceMarkupDetails',
                'CreatePriceMarkupDetails',
                'UpdatePriceMarkupDetails',
                'DeletePriceMarkupDetails',
                ),
        ),

        'UserPriceMarkupDetails' => array(
            'type' => CAuthItem::TYPE_ROLE,
            'description' => 'UserPriceMarkupDetails',
            'bizRule' => null,
            'data' => null,
            'defaultIndex' => 'PriceMarkupDetails/index',
            'children' => array(
                'ViewPriceMarkupDetails'
                ),
        ),

        'ViewPriceMarkupDetails' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'ViewPriceMarkupDetails',
            'bizRule' => null,
            'data' => null,
        ),

        'CreatePriceMarkupDetails' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'CreatePriceMarkupDetails',
            'bizRule' => null,
            'data' => null,
        ),

        'UpdatePriceMarkupDetails' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'UpdatePriceMarkupDetails',
            'bizRule' => null,
            'data' => null,
        ),

        'DeletePriceMarkupDetails' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'DeletePriceMarkupDetails',
            'bizRule' => null,
            'data' => null,
        ),

);