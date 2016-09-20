<?php
return array(
	
         /** Роли для таблицы DemandsExecTime (Приоритеты заявок) **/
        'ManagerDemandsExecTime' => array(
            'type' => CAuthItem::TYPE_ROLE,
            'description' => 'ManagerDemandsExecTime',
            'bizRule' => null,
            'data' => null,
            'defaultIndex' => 'sections/index',
             'children' => array(
                'ViewDemandsExecTime',
                'CreateDemandsExecTime',
                'UpdateDemandsExecTime',
                ),
        ),

        'AdminDemandsExecTime' => array(
            'type' => CAuthItem::TYPE_ROLE,
            'description' => 'AdminDemandsExecTime',
            'bizRule' => null,
            'data' => null,
            'defaultIndex' => 'sections/index',
            'children' => array(
                'ViewDemandsExecTime',
                'CreateDemandsExecTime',
                'UpdateDemandsExecTime',
                'DeleteDemandsExecTime',
                ),
        ),

        'UserDemandsExecTime' => array(
            'type' => CAuthItem::TYPE_ROLE,
            'description' => 'UserDemandsExecTime',
            'bizRule' => null,
            'data' => null,
            'defaultIndex' => 'sections/index',
            'children' => array(
                'ViewDemandsExecTime'
                ),
        ),

        'ViewDemandsExecTime' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'ViewDemandsExecTime',
            'bizRule' => null,
            'data' => null,
        ),

        'CreateDemandsExecTime' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'CreateDemandsExecTime',
            'bizRule' => null,
            'data' => null,
        ),

        'UpdateDemandsExecTime' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'UpdateDemandsExecTime',
            'bizRule' => null,
            'data' => null,
        ),

        'DeleteDemandsExecTime' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'DeleteDemandsExecTime',
            'bizRule' => null,
            'data' => null,
        ),
);





