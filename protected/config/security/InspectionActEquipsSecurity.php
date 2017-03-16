<?php
return array(
	
         /** Роли для таблицы InspectionActEquips (Подразделения) **/
        'ManagerInspectionActEquips' => array(
            'type' => CAuthItem::TYPE_ROLE,
            'description' => 'ManagerInspectionActEquips',
            'bizRule' => null,
            'data' => null,
            'defaultIndex' => 'sections/index',
             'children' => array(
                'ViewInspectionActEquips',
                'CreateInspectionActEquips',
                'UpdateInspectionActEquips',
                'DeleteInspectionActEquips',
                ),
        ),

        'AdminInspectionActEquips' => array(
            'type' => CAuthItem::TYPE_ROLE,
            'description' => 'AdminInspectionActEquips',
            'bizRule' => null,
            'data' => null,
            'defaultIndex' => 'sections/index',
            'children' => array(
                'ViewInspectionActEquips',
                'CreateInspectionActEquips',
                'UpdateInspectionActEquips',
                'DeleteInspectionActEquips',
                ),
        ),

        'UserInspectionActEquips' => array(
            'type' => CAuthItem::TYPE_ROLE,
            'description' => 'UserInspectionActEquips',
            'bizRule' => null,
            'data' => null,
            'defaultIndex' => 'sections/index',
            'children' => array(
                'ViewInspectionActEquips'
                ),
        ),

        'ViewInspectionActEquips' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'ViewInspectionActEquips',
            'bizRule' => null,
            'data' => null,
        ),

        'CreateInspectionActEquips' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'CreateInspectionActEquips',
            'bizRule' => null,
            'data' => null,
        ),

        'UpdateInspectionActEquips' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'UpdateInspectionActEquips',
            'bizRule' => null,
            'data' => null,
        ),

        'DeleteInspectionActEquips' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'DeleteInspectionActEquips',
            'bizRule' => null,
            'data' => null,
        ),
);




