<?php
return array(
	
 /** Роли для таблицы ComplexityTypes (типы улиц) **/
        'ManagerComplexityTypes' => array(
            'type' => CAuthItem::TYPE_ROLE,
            'description' => 'ManagerComplexityTypes',
            'bizRule' => null,
            'data' => null,
            'defaultIndex' => 'ComplexityTypes/index',
             'children' => array(
                'ViewComplexityTypes',
                'CreateComplexityTypes',
                'UpdateComplexityTypes',
                ),
        ),

        'AdminComplexityTypes' => array(
            'type' => CAuthItem::TYPE_ROLE,
            'description' => 'AdminComplexityTypes',
            'bizRule' => null,
            'data' => null,
            'defaultIndex' => 'ComplexityTypes/index',
            'children' => array(
                'ViewComplexityTypes',
                'CreateComplexityTypes',
                'UpdateComplexityTypes',
                'DeleteComplexityTypes',
                ),
        ),

        'UserComplexityTypes' => array(
            'type' => CAuthItem::TYPE_ROLE,
            'description' => 'UserComplexityTypes',
            'bizRule' => null,
            'data' => null,
            'defaultIndex' => 'ComplexityTypes/index',
            'children' => array(
                'ViewComplexityTypes'
                ),
        ),

        'ViewComplexityTypes' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'ViewComplexityTypes',
            'bizRule' => null,
            'data' => null,
        ),

        'CreateComplexityTypes' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'CreateComplexityTypes',
            'bizRule' => null,
            'data' => null,
        ),

        'UpdateComplexityTypes' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'UpdateComplexityTypes',
            'bizRule' => null,
            'data' => null,
        ),

        'DeleteComplexityTypes' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'DeleteComplexityTypes',
            'bizRule' => null,
            'data' => null,
        ),

);