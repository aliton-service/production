<?php
return array(
	
         /** Роли для таблицы SystemCompetitors (Подразделения) **/
        'ManagerSystemCompetitors' => array(
            'type' => CAuthItem::TYPE_ROLE,
            'description' => 'ManagerSystemCompetitors',
            'bizRule' => null,
            'data' => null,
            'defaultIndex' => 'sections/index',
             'children' => array(
                'ViewSystemCompetitors',
                'CreateSystemCompetitors',
                'UpdateSystemCompetitors',
                ),
        ),

        'AdminSystemCompetitors' => array(
            'type' => CAuthItem::TYPE_ROLE,
            'description' => 'AdminSystemCompetitors',
            'bizRule' => null,
            'data' => null,
            'defaultIndex' => 'sections/index',
            'children' => array(
                'ViewSystemCompetitors',
                'CreateSystemCompetitors',
                'UpdateSystemCompetitors',
                'DeleteSystemCompetitors',
                ),
        ),

        'UserSystemCompetitors' => array(
            'type' => CAuthItem::TYPE_ROLE,
            'description' => 'UserSystemCompetitors',
            'bizRule' => null,
            'data' => null,
            'defaultIndex' => 'sections/index',
            'children' => array(
                'ViewSystemCompetitors'
                ),
        ),

        'ViewSystemCompetitors' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'ViewSystemCompetitors',
            'bizRule' => null,
            'data' => null,
        ),

        'CreateSystemCompetitors' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'CreateSystemCompetitors',
            'bizRule' => null,
            'data' => null,
        ),

        'UpdateSystemCompetitors' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'UpdateSystemCompetitors',
            'bizRule' => null,
            'data' => null,
        ),

        'DeleteSystemCompetitors' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'DeleteSystemCompetitors',
            'bizRule' => null,
            'data' => null,
        ),
);




