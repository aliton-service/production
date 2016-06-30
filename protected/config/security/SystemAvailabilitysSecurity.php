<?php
return array(
	
 /** Роли для таблицы SystemAvailabilitys (типы улиц) **/
        'ManagerSystemAvailabilitys' => array(
            'type' => CAuthItem::TYPE_ROLE,
            'description' => 'ManagerSystemAvailabilitys',
            'bizRule' => null,
            'data' => null,
            'defaultIndex' => 'SystemAvailabilitys/index',
             'children' => array(
                'ViewSystemAvailabilitys',
                'CreateSystemAvailabilitys',
                'UpdateSystemAvailabilitys',
                ),
        ),

        'AdminSystemAvailabilitys' => array(
            'type' => CAuthItem::TYPE_ROLE,
            'description' => 'AdminSystemAvailabilitys',
            'bizRule' => null,
            'data' => null,
            'defaultIndex' => 'SystemAvailabilitys/index',
            'children' => array(
                'ViewSystemAvailabilitys',
                'CreateSystemAvailabilitys',
                'UpdateSystemAvailabilitys',
                'DeleteSystemAvailabilitys',
                ),
        ),

        'UserSystemAvailabilitys' => array(
            'type' => CAuthItem::TYPE_ROLE,
            'description' => 'UserSystemAvailabilitys',
            'bizRule' => null,
            'data' => null,
            'defaultIndex' => 'SystemAvailabilitys/index',
            'children' => array(
                'ViewSystemAvailabilitys'
                ),
        ),

        'ViewSystemAvailabilitys' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'ViewSystemAvailabilitys',
            'bizRule' => null,
            'data' => null,
        ),

        'CreateSystemAvailabilitys' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'CreateSystemAvailabilitys',
            'bizRule' => null,
            'data' => null,
        ),

        'UpdateSystemAvailabilitys' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'UpdateSystemAvailabilitys',
            'bizRule' => null,
            'data' => null,
        ),

        'DeleteSystemAvailabilitys' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'DeleteSystemAvailabilitys',
            'bizRule' => null,
            'data' => null,
        ),

);