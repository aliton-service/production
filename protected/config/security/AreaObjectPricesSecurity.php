<?php
return array(
	
         /** Роли для таблицы AreaObjectPrices (Подразделения) **/
        'ManagerAreaObjectPrices' => array(
            'type' => CAuthItem::TYPE_ROLE,
            'description' => 'ManagerAreaObjectPrices',
            'bizRule' => null,
            'data' => null,
            'defaultIndex' => 'sections/index',
             'children' => array(
                'ViewAreaObjectPrices',
                'CreateAreaObjectPrices',
                'UpdateAreaObjectPrices',
                ),
        ),

        'AdminAreaObjectPrices' => array(
            'type' => CAuthItem::TYPE_ROLE,
            'description' => 'AdminAreaObjectPrices',
            'bizRule' => null,
            'data' => null,
            'defaultIndex' => 'sections/index',
            'children' => array(
                'ViewAreaObjectPrices',
                'CreateAreaObjectPrices',
                'UpdateAreaObjectPrices',
                'DeleteAreaObjectPrices',
                ),
        ),

        'UserAreaObjectPrices' => array(
            'type' => CAuthItem::TYPE_ROLE,
            'description' => 'UserAreaObjectPrices',
            'bizRule' => null,
            'data' => null,
            'defaultIndex' => 'sections/index',
            'children' => array(
                'ViewAreaObjectPrices'
                ),
        ),

        'ViewAreaObjectPrices' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'ViewAreaObjectPrices',
            'bizRule' => null,
            'data' => null,
        ),

        'CreateAreaObjectPrices' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'CreateAreaObjectPrices',
            'bizRule' => null,
            'data' => null,
        ),

        'UpdateAreaObjectPrices' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'UpdateAreaObjectPrices',
            'bizRule' => null,
            'data' => null,
        ),

        'DeleteAreaObjectPrices' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'DeleteAreaObjectPrices',
            'bizRule' => null,
            'data' => null,
        ),
);




