<?php
return array(
	
         /** Роли для таблицы InspectionActs **/
        'ManagerInspectionActs' => array(
            'type' => CAuthItem::TYPE_ROLE,
            'description' => 'ManagerInspectionActs',
            'bizRule' => null,
            'data' => null,
            'defaultIndex' => 'InspectionActs/index',
             'children' => array(
                'ViewInspectionActs',
                'CreateInspectionActs',
                'UpdateInspectionActs',
                ),
        ),

        'AdminInspectionActs' => array(
            'type' => CAuthItem::TYPE_ROLE,
            'description' => 'AdminInspectionActs',
            'bizRule' => null,
            'data' => null,
            'defaultIndex' => 'InspectionActs/index',
            'children' => array(
                'ViewInspectionActs',
                'CreateInspectionActs',
                'UpdateInspectionActs',
                'DeleteInspectionActs',
                ),
        ),

        'UserInspectionActs' => array(
            'type' => CAuthItem::TYPE_ROLE,
            'description' => 'UserInspectionActs',
            'bizRule' => null,
            'data' => null,
            'defaultIndex' => 'InspectionActs/index',
            'children' => array(
                'ViewInspectionActs'
                ),
        ),

        'ViewInspectionActs' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'ViewInspectionActs',
            'bizRule' => null,
            'data' => null,
        ),

        'CreateInspectionActs' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'CreateInspectionActs',
            'bizRule' => null,
            'data' => null,
        ),

        'UpdateInspectionActs' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'UpdateInspectionActs',
            'bizRule' => null,
            'data' => null,
        ),

        'DeleteInspectionActs' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'DeleteInspectionActs',
            'bizRule' => null,
            'data' => null,
        ),
);




