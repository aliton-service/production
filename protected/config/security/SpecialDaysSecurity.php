<?php
return array(
	
         /** Роли для таблицы SpecialDays (Должности) **/
        'ManagerSpecialDays' => array(
            'type' => CAuthItem::TYPE_ROLE,
            'description' => 'ManagerSpecialDays',
            'bizRule' => null,
            'data' => null,
            'defaultIndex' => 'positions/index',
             'children' => array(
                'ViewSpecialDays',
                'CreateSpecialDays',
                'UpdateSpecialDays',
                ),
        ),

        'AdminSpecialDays' => array(
            'type' => CAuthItem::TYPE_ROLE,
            'description' => 'AdminSpecialDays',
            'bizRule' => null,
            'data' => null,
            'defaultIndex' => 'positions/index',
            'children' => array(
                'ViewSpecialDays',
                'CreateSpecialDays',
                'UpdateSpecialDays',
                'DeleteSpecialDays',
                ),
        ),

        'UserSpecialDays' => array(
            'type' => CAuthItem::TYPE_ROLE,
            'description' => 'UserSpecialDays',
            'bizRule' => null,
            'data' => null,
            'defaultIndex' => 'positions/index',
            'children' => array(
                'ViewSpecialDays'
                ),
        ),

        'ViewSpecialDays' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'ViewSpecialDays',
            'bizRule' => null,
            'data' => null,
        ),

        'CreateSpecialDays' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'CreateSpecialDays',
            'bizRule' => null,
            'data' => null,
        ),

        'UpdateSpecialDays' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'UpdateSpecialDays',
            'bizRule' => null,
            'data' => null,
        ),

        'DeleteSpecialDays' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'DeleteSpecialDays',
            'bizRule' => null,
            'data' => null,
        ),
);



