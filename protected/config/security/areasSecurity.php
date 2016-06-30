<?php
return array(
	
        /** Роли для таблицы Areas (районы) **/
        'ManagerAreas' => array(
            'type' => CAuthItem::TYPE_ROLE,
            'description' => 'ManagerAreas',
            'bizRule' => null,
            'data' => null,
            'defaultIndex' => 'areas/index',
            'children' => array(
                'ViewAreas',
                'CreateAreas',
                'UpdateAreas',
                ),
        ),

        'UserAreas' => array(
            'type' => CAuthItem::TYPE_ROLE,
            'description' => 'UserAreas',
            'bizRule' => null,
            'data' => null,
            'defaultIndex' => 'areas/index',
            'children' => array(
                'ViewAreas',
                ),
        ),
        'AdminAreas' => array(
            'type' => CAuthItem::TYPE_ROLE,
            'description' => 'AdminAreas',
            'bizRule' => null,
            'data' => null,
            'defaultIndex' => 'areas/index',
            'children' => array(
                'ViewAreas',
                'CreateAreas',
                'UpdateAreas',
                'DeleteAreas',
                ),

        ),

        'ViewAreas' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'ViewAreas',
            'bizRule' => null,
            'data' => null,
        ),

        'CreateAreas' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'CreateAreas',
            'bizRule' => null,
            'data' => null,
        ),

        'UpdateAreas' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'UpdateAreas',
            'bizRule' => null,
            'data' => null,
        ),

        'DeleteAreas' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'DeleteAreas',
            'bizRule' => null,
            'data' => null,
        ),
);