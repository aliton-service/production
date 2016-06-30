<?php
return array(
	
 /** Роли для таблицы StreetTypes (типы улиц) **/
        'ManagerJobTypes' => array(
            'type' => CAuthItem::TYPE_ROLE,
            'description' => 'ManagerJobTypes',
            'bizRule' => null,
            'data' => null,
            'defaultIndex' => 'JobTypes/index',
             'children' => array(
                'ViewJobTypes',
                'CreateJobTypes',
                'UpdateJobTypes',
                ),
        ),

        'AdminJobTypes' => array(
            'type' => CAuthItem::TYPE_ROLE,
            'description' => 'AdminJobTypes',
            'bizRule' => null,
            'data' => null,
            'defaultIndex' => 'JobTypes/index',
            'children' => array(
                'ViewJobTypes',
                'CreateJobTypes',
                'UpdateJobTypes',
                'DeleteJobTypes',
                ),
        ),

        'UserJobTypes' => array(
            'type' => CAuthItem::TYPE_ROLE,
            'description' => 'UserJobTypes',
            'bizRule' => null,
            'data' => null,
            'defaultIndex' => 'JobTypes/index',
            'children' => array(
                'ViewJobTypes'
                ),
        ),

        'ViewStreetTypes' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'ViewJobTypes',
            'bizRule' => null,
            'data' => null,
        ),

        'CreateJobTypes' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'CreateJobTypes',
            'bizRule' => null,
            'data' => null,
        ),

        'UpdateJobTypes' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'UpdateJobTypes',
            'bizRule' => null,
            'data' => null,
        ),

        'DeleteJobTypes' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'DeleteJobTypes',
            'bizRule' => null,
            'data' => null,
        ),

);