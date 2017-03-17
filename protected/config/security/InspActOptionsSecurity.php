<?php
return array(
	
        /** Роли для таблицы InspActOptions (Подразделения) **/
        'ManagerInspActOptions' => array(
            'type' => CAuthItem::TYPE_ROLE,
            'description' => 'ManagerInspActOptions',
            'bizRule' => null,
            'data' => null,
            'defaultIndex' => 'sections/index',
             'children' => array(
                'ViewInspActOptions',
                'CreateInspActOptions',
                'UpdateInspActOptions',
                ),
        ),

        'AdminInspActOptions' => array(
            'type' => CAuthItem::TYPE_ROLE,
            'description' => 'AdminInspActOptions',
            'bizRule' => null,
            'data' => null,
            'defaultIndex' => 'sections/index',
            'children' => array(
                'ViewInspActOptions',
                'CreateInspActOptions',
                'UpdateInspActOptions',
                'DeleteInspActOptions',
                ),
        ),

        'UserInspActOptions' => array(
            'type' => CAuthItem::TYPE_ROLE,
            'description' => 'UserInspActOptions',
            'bizRule' => null,
            'data' => null,
            'defaultIndex' => 'sections/index',
            'children' => array(
                'ViewInspActOptions'
                ),
        ),

        'ViewInspActOptions' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'ViewInspActOptions',
            'bizRule' => null,
            'data' => null,
        ),

        'CreateInspActOptions' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'CreateInspActOptions',
            'bizRule' => null,
            'data' => null,
        ),

        'UpdateInspActOptions' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'UpdateInspActOptions',
            'bizRule' => null,
            'data' => null,
        ),

        'DeleteInspActOptions' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'DeleteInspActOptions',
            'bizRule' => null,
            'data' => null,
        ),
);




