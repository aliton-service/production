<?php
return array(
	
 /** Роли для таблицы StreetTypes (типы улиц) **/
        'ManagerPropForms' => array(
            'type' => CAuthItem::TYPE_ROLE,
            'description' => 'ManagerPropForms',
            'bizRule' => null,
            'data' => null,
            'defaultIndex' => 'PropForms/index',
             'children' => array(
                'ViewPropForms',
                'CreatePropForms',
                'UpdatePropForms',
                ),
        ),

        'AdminPropForms' => array(
            'type' => CAuthItem::TYPE_ROLE,
            'description' => 'AdminPropForms',
            'bizRule' => null,
            'data' => null,
            'defaultIndex' => 'PropForms/index',
            'children' => array(
                'ViewPropForms',
                'CreatePropForms',
                'UpdatePropForms',
                'DeletePropForms',
                ),
        ),

        'UserPropForms' => array(
            'type' => CAuthItem::TYPE_ROLE,
            'description' => 'UserPropForms',
            'bizRule' => null,
            'data' => null,
            'defaultIndex' => 'PropForms/index',
            'children' => array(
                'ViewPropForms'
                ),
        ),

        'ViewPropForms' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'ViewPropForms',
            'bizRule' => null,
            'data' => null,
        ),

        'CreatePropForms' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'CreatePropForms',
            'bizRule' => null,
            'data' => null,
        ),

        'UpdatePropForms' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'UpdatePropForms',
            'bizRule' => null,
            'data' => null,
        ),

        'DeletePropForms' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'DeletePropForms',
            'bizRule' => null,
            'data' => null,
        ),

);