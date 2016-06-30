<?php
return array(
	
         /** Роли для таблицы Departments (Отделы) **/
        'ManagerDepartments' => array(
            'type' => CAuthItem::TYPE_ROLE,
            'description' => 'ManagerDepartments',
            'bizRule' => null,
            'data' => null,
            'defaultIndex' => 'departments/index',
             'children' => array(
                'ViewDepartments',
                'CreateDepartments',
                'UpdateDepartments',
                ),
        ),

        'AdminDepartments' => array(
            'type' => CAuthItem::TYPE_ROLE,
            'description' => 'AdminDepartments',
            'bizRule' => null,
            'data' => null,
            'defaultIndex' => 'departments/index',
            'children' => array(
                'ViewDepartments',
                'CreateDepartments',
                'UpdateDepartments',
                'DeleteDepartments',
                ),
        ),

        'UserDepartments' => array(
            'type' => CAuthItem::TYPE_ROLE,
            'description' => 'UserDepartments',
            'bizRule' => null,
            'data' => null,
            'defaultIndex' => 'departments/index',
            'children' => array(
                'ViewDepartments'
                ),
        ),

        'ViewDepartments' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'ViewDepartments',
            'bizRule' => null,
            'data' => null,
        ),

        'CreateDepartments' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'CreateDepartments',
            'bizRule' => null,
            'data' => null,
        ),

        'UpdateDepartments' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'UpdateDepartments',
            'bizRule' => null,
            'data' => null,
        ),

        'DeleteDepartments' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'DeleteDepartments',
            'bizRule' => null,
            'data' => null,
        ),
);


