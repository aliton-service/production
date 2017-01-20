<?php
return array(
	
         /** Роли для таблицы AreaPrices (Подразделения) **/
        'ManagerAreaPrices' => array(
            'type' => CAuthItem::TYPE_ROLE,
            'description' => 'ManagerAreaPrices',
            'bizRule' => null,
            'data' => null,
            'defaultIndex' => 'sections/index',
             'children' => array(
                'ViewAreaPrices',
                'CreateAreaPrices',
                'UpdateAreaPrices',
                ),
        ),

        'AdminAreaPrices' => array(
            'type' => CAuthItem::TYPE_ROLE,
            'description' => 'AdminAreaPrices',
            'bizRule' => null,
            'data' => null,
            'defaultIndex' => 'sections/index',
            'children' => array(
                'ViewAreaPrices',
                'CreateAreaPrices',
                'UpdateAreaPrices',
                'DeleteAreaPrices',
                ),
        ),

        'UserAreaPrices' => array(
            'type' => CAuthItem::TYPE_ROLE,
            'description' => 'UserAreaPrices',
            'bizRule' => null,
            'data' => null,
            'defaultIndex' => 'sections/index',
            'children' => array(
                'ViewAreaPrices'
                ),
        ),

        'ViewAreaPrices' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'ViewAreaPrices',
            'bizRule' => null,
            'data' => null,
        ),

        'CreateAreaPrices' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'CreateAreaPrices',
            'bizRule' => null,
            'data' => null,
        ),

        'UpdateAreaPrices' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'UpdateAreaPrices',
            'bizRule' => null,
            'data' => null,
        ),

        'DeleteAreaPrices' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'DeleteAreaPrices',
            'bizRule' => null,
            'data' => null,
        ),
);




