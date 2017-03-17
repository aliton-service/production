<?php
return array(
	
        /** Роли для таблицы InspActRecommendations (Подразделения) **/
        'ManagerInspActRecommendations' => array(
            'type' => CAuthItem::TYPE_ROLE,
            'description' => 'ManagerInspActRecommendations',
            'bizRule' => null,
            'data' => null,
            'defaultIndex' => 'sections/index',
             'children' => array(
                'ViewInspActRecommendations',
                'CreateInspActRecommendations',
                'UpdateInspActRecommendations',
                ),
        ),

        'AdminInspActRecommendations' => array(
            'type' => CAuthItem::TYPE_ROLE,
            'description' => 'AdminInspActRecommendations',
            'bizRule' => null,
            'data' => null,
            'defaultIndex' => 'sections/index',
            'children' => array(
                'ViewInspActRecommendations',
                'CreateInspActRecommendations',
                'UpdateInspActRecommendations',
                'DeleteInspActRecommendations',
                ),
        ),

        'UserInspActRecommendations' => array(
            'type' => CAuthItem::TYPE_ROLE,
            'description' => 'UserInspActRecommendations',
            'bizRule' => null,
            'data' => null,
            'defaultIndex' => 'sections/index',
            'children' => array(
                'ViewInspActRecommendations'
                ),
        ),

        'ViewInspActRecommendations' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'ViewInspActRecommendations',
            'bizRule' => null,
            'data' => null,
        ),

        'CreateInspActRecommendations' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'CreateInspActRecommendations',
            'bizRule' => null,
            'data' => null,
        ),

        'UpdateInspActRecommendations' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'UpdateInspActRecommendations',
            'bizRule' => null,
            'data' => null,
        ),

        'DeleteInspActRecommendations' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'DeleteInspActRecommendations',
            'bizRule' => null,
            'data' => null,
        ),
);




