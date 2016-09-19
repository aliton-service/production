<?php
return array(
	
 /** Роли для таблицы Malfunctions (типы улиц) **/
        'ManagerMalfunctions' => array(
            'type' => CAuthItem::TYPE_ROLE,
            'description' => 'ManagerMalfunctions',
            'bizRule' => null,
            'data' => null,
            'defaultIndex' => 'Malfunctions/index',
             'children' => array(
                'ViewMalfunctions',
                'CreateMalfunctions',
                'UpdateMalfunctions',
                ),
        ),

        'AdminMalfunctions' => array(
            'type' => CAuthItem::TYPE_ROLE,
            'description' => 'AdminMalfunctions',
            'bizRule' => null,
            'data' => null,
            'defaultIndex' => 'Malfunctions/index',
            'children' => array(
                'ViewMalfunctions',
                'CreateMalfunctions',
                'UpdateMalfunctions',
                'DeleteMalfunctions',
                ),
        ),

        'UserMalfunctions' => array(
            'type' => CAuthItem::TYPE_ROLE,
            'description' => 'UserMalfunctions',
            'bizRule' => null,
            'data' => null,
            'defaultIndex' => 'Malfunctions/index',
            'children' => array(
                'ViewMalfunctions'
                ),
        ),

        'ViewMalfunctions' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'ViewMalfunctions',
            'bizRule' => null,
            'data' => null,
        ),

        'CreateMalfunctions' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'CreateMalfunctions',
            'bizRule' => null,
            'data' => null,
        ),

        'UpdateMalfunctions' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'UpdateMalfunctions',
            'bizRule' => null,
            'data' => null,
        ),

        'DeleteMalfunctions' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'DeleteMalfunctions',
            'bizRule' => null,
            'data' => null,
        ),

);