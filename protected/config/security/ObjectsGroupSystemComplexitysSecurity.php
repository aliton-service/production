<?php
return array(
	/** Роли для таблицы ObjectsGroupSystemComplexitys (Подразделения) **/
        'ManagerObjectsGroupSystemComplexitys' => array(
            'type' => CAuthItem::TYPE_ROLE,
            'description' => 'ManagerObjectsGroupSystemComplexitys',
            'bizRule' => null,
            'data' => null,
            'defaultIndex' => 'sections/index',
             'children' => array(
                'ViewObjectsGroupSystemComplexitys',
                'CreateObjectsGroupSystemComplexitys',
                'UpdateObjectsGroupSystemComplexitys',
                ),
        ),

        'AdminObjectsGroupSystemComplexitys' => array(
            'type' => CAuthItem::TYPE_ROLE,
            'description' => 'AdminObjectsGroupSystemComplexitys',
            'bizRule' => null,
            'data' => null,
            'defaultIndex' => 'sections/index',
            'children' => array(
                'ViewObjectsGroupSystemComplexitys',
                'CreateObjectsGroupSystemComplexitys',
                'UpdateObjectsGroupSystemComplexitys',
                'DeleteObjectsGroupSystemComplexitys',
                ),
        ),

        'UserObjectsGroupSystemComplexitys' => array(
            'type' => CAuthItem::TYPE_ROLE,
            'description' => 'UserObjectsGroupSystemComplexitys',
            'bizRule' => null,
            'data' => null,
            'defaultIndex' => 'sections/index',
            'children' => array(
                'ViewObjectsGroupSystemComplexitys'
                ),
        ),

        'ViewObjectsGroupSystemComplexitys' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'ViewObjectsGroupSystemComplexitys',
            'bizRule' => null,
            'data' => null,
        ),

        'CreateObjectsGroupSystemComplexitys' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'CreateObjectsGroupSystemComplexitys',
            'bizRule' => null,
            'data' => null,
        ),

        'UpdateObjectsGroupSystemComplexitys' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'UpdateObjectsGroupSystemComplexitys',
            'bizRule' => null,
            'data' => null,
        ),

        'DeleteObjectsGroupSystemComplexitys' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'DeleteObjectsGroupSystemComplexitys',
            'bizRule' => null,
            'data' => null,
        ),
);






