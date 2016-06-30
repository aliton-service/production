<?php
return array(
	
 /** Роли для таблицы Competitors (типы улиц) **/
        'ManagerCompetitors' => array(
            'type' => CAuthItem::TYPE_ROLE,
            'description' => 'ManagerWCompetitors',
            'bizRule' => null,
            'data' => null,
            'defaultIndex' => 'Competitors/index',
             'children' => array(
                'ViewCompetitors',
                'CreateCompetitors',
                'UpdateCompetitors',
                ),
        ),

        'AdminCompetitors' => array(
            'type' => CAuthItem::TYPE_ROLE,
            'description' => 'AdminCompetitors',
            'bizRule' => null,
            'data' => null,
            'defaultIndex' => 'Competitors/index',
            'children' => array(
                'ViewCompetitors',
                'CreateCompetitors',
                'UpdateCompetitors',
                'DeleteCompetitors',
                ),
        ),

        'UserCompetitors' => array(
            'type' => CAuthItem::TYPE_ROLE,
            'description' => 'UserCompetitors',
            'bizRule' => null,
            'data' => null,
            'defaultIndex' => 'Competitors/index',
            'children' => array(
                'ViewCompetitors'
                ),
        ),

        'ViewCompetitors' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'ViewCompetitors',
            'bizRule' => null,
            'data' => null,
        ),

        'CreateWorkTypes' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'CreateWorkTypes',
            'bizRule' => null,
            'data' => null,
        ),

        'UpdateCompetitors' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'UpdateCompetitors',
            'bizRule' => null,
            'data' => null,
        ),

        'DeleteCompetitors' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'DeleteCompetitors',
            'bizRule' => null,
            'data' => null,
        ),

);