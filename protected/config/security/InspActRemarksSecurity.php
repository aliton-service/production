<?php
return array(
	
        /** Роли для таблицы InspActRemarks (Подразделения) **/
        'ManagerInspActRemarks' => array(
            'type' => CAuthItem::TYPE_ROLE,
            'description' => 'ManagerInspActRemarks',
            'bizRule' => null,
            'data' => null,
            'defaultIndex' => 'sections/index',
             'children' => array(
                'ViewInspActRemarks',
                'CreateInspActRemarks',
                'UpdateInspActRemarks',
                ),
        ),

        'AdminInspActRemarks' => array(
            'type' => CAuthItem::TYPE_ROLE,
            'description' => 'AdminInspActRemarks',
            'bizRule' => null,
            'data' => null,
            'defaultIndex' => 'sections/index',
            'children' => array(
                'ViewInspActRemarks',
                'CreateInspActRemarks',
                'UpdateInspActRemarks',
                'DeleteInspActRemarks',
                ),
        ),

        'UserInspActRemarks' => array(
            'type' => CAuthItem::TYPE_ROLE,
            'description' => 'UserInspActRemarks',
            'bizRule' => null,
            'data' => null,
            'defaultIndex' => 'sections/index',
            'children' => array(
                'ViewInspActRemarks'
                ),
        ),

        'ViewInspActRemarks' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'ViewInspActRemarks',
            'bizRule' => null,
            'data' => null,
        ),

        'CreateInspActRemarks' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'CreateInspActRemarks',
            'bizRule' => null,
            'data' => null,
        ),

        'UpdateInspActRemarks' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'UpdateInspActRemarks',
            'bizRule' => null,
            'data' => null,
        ),

        'DeleteInspActRemarks' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'DeleteInspActRemarks',
            'bizRule' => null,
            'data' => null,
        ),
);




