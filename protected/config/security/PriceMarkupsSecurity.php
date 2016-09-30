<?php
return array(
	
 /** Роли для таблицы PriceMarkups (Наценки) **/
        'ManagerPriceMarkups' => array(
            'type' => CAuthItem::TYPE_ROLE,
            'description' => 'ManagerPriceMarkups',
            'bizRule' => null,
            'data' => null,
            'defaultIndex' => 'PriceMarkups/index',
             'children' => array(
                'ViewPriceMarkups',
                'CreatePriceMarkups',
                'UpdatePriceMarkups',
                ),
        ),

        'AdminPriceMarkups' => array(
            'type' => CAuthItem::TYPE_ROLE,
            'description' => 'AdminPriceMarkups',
            'bizRule' => null,
            'data' => null,
            'defaultIndex' => 'PriceMarkups/index',
            'children' => array(
                'ViewPriceMarkups',
                'CreatePriceMarkups',
                'UpdatePriceMarkups',
                'DeletePriceMarkups',
                'CopyPriceMarkups',
                ),
        ),

        'UserPriceMarkups' => array(
            'type' => CAuthItem::TYPE_ROLE,
            'description' => 'UserPriceMarkups',
            'bizRule' => null,
            'data' => null,
            'defaultIndex' => 'PriceMarkups/index',
            'children' => array(
                'ViewPriceMarkups'
                ),
        ),

        'ViewPriceMarkups' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'ViewPriceMarkups',
            'bizRule' => null,
            'data' => null,
        ),

        'CreatePriceMarkups' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'CreatePriceMarkups',
            'bizRule' => null,
            'data' => null,
        ),

        'UpdatePriceMarkups' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'UpdatePriceMarkups',
            'bizRule' => null,
            'data' => null,
        ),

        'DeletePriceMarkups' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'DeletePriceMarkups',
            'bizRule' => null,
            'data' => null,
        ),

        'CopyPriceMarkups' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'CopyPriceMarkups',
            'bizRule' => null,
            'data' => null,
        ),

);