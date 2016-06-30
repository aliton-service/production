<?php
return array(
	
         /** Роли для таблицы Sections (Подразделения) **/
        'ManagerSections' => array(
            'type' => CAuthItem::TYPE_ROLE,
            'description' => 'ManagerSections',
            'bizRule' => null,
            'data' => null,
            'defaultIndex' => 'sections/index',
             'children' => array(
                'ViewSections',
                'CreateSections',
                'UpdateSections',
                ),
        ),

        'AdminSections' => array(
            'type' => CAuthItem::TYPE_ROLE,
            'description' => 'AdminSections',
            'bizRule' => null,
            'data' => null,
            'defaultIndex' => 'sections/index',
            'children' => array(
                'ViewSections',
                'CreateSections',
                'UpdateSections',
                'DeleteSections',
                ),
        ),

        'UserSections' => array(
            'type' => CAuthItem::TYPE_ROLE,
            'description' => 'UserSections',
            'bizRule' => null,
            'data' => null,
            'defaultIndex' => 'sections/index',
            'children' => array(
                'ViewSections'
                ),
        ),

        'ViewSections' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'ViewSections',
            'bizRule' => null,
            'data' => null,
        ),

        'CreateSections' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'CreateSections',
            'bizRule' => null,
            'data' => null,
        ),

        'UpdateSections' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'UpdateSections',
            'bizRule' => null,
            'data' => null,
        ),

        'DeleteSections' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'DeleteSections',
            'bizRule' => null,
            'data' => null,
        ),
);




