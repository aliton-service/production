<?php
return array(
	
 /** Роли для таблицы ObjectTypes (типы улиц) **/
        'ManagerObjectTypes' => array(
            'type' => CAuthItem::TYPE_ROLE,
            'description' => 'ManagerObjectTypes',
            'bizRule' => null,
            'data' => null,
            'defaultIndex' => 'ObjectTypes/index',
             'children' => array(
                'ViewObjectTypes',
                'CreateObjectTypes',
                'UpdateObjectTypes',
                ),
        ),

        'AdminObjectTypes' => array(
            'type' => CAuthItem::TYPE_ROLE,
            'description' => 'AdminObjectTypes',
            'bizRule' => null,
            'data' => null,
            'defaultIndex' => 'WorkObjectTypes/index',
            'children' => array(
                'ViewObjectTypes',
                'CreateObjectTypes',
                'UpdateObjectTypes',
                'DeleteObjectTypes',
                ),
        ),

        'UserObjectTypes' => array(
            'type' => CAuthItem::TYPE_ROLE,
            'description' => 'UserObjectTypes',
            'bizRule' => null,
            'data' => null,
            'defaultIndex' => 'ObjectTypes/index',
            'children' => array(
                'ViewObjectTypes'
                ),
        ),

        'ViewObjectTypes' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'ViewObjectTypes',
            'bizRule' => null,
            'data' => null,
        ),

        'CreateObjectTypes' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'CreateObjectTypes',
            'bizRule' => null,
            'data' => null,
        ),

        'UpdateObjectTypes' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'UpdateObjectTypes',
            'bizRule' => null,
            'data' => null,
        ),

        'DeleteObjectTypes' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'DeleteObjectTypes',
            'bizRule' => null,
            'data' => null,
        ),

);