<?php
return array(
	
 /** Роли для таблицы ObjectsGroupCostCalculations (Коммерческие предложения и сметы) **/
        'ManagerObjectsGroupCostCalculations' => array(
            'type' => CAuthItem::TYPE_ROLE,
            'description' => 'ManagerObjectsGroupCostCalculations',
            'bizRule' => null,
            'data' => null,
            'defaultIndex' => 'ObjectsGroupCostCalculations/index',
             'children' => array(
                'ViewObjectsGroupCostCalculations',
                'CreateObjectsGroupCostCalculations',
                'UpdateObjectsGroupCostCalculations',
                ),
        ),

        'AdminObjectsGroupCostCalculations' => array(
            'type' => CAuthItem::TYPE_ROLE,
            'description' => 'AdminObjectsGroupCostCalculations',
            'bizRule' => null,
            'data' => null,
            'defaultIndex' => 'ObjectsGroupCostCalculations/index',
            'children' => array(
                'ViewObjectsGroupCostCalculations',
                'CreateObjectsGroupCostCalculations',
                'UpdateObjectsGroupCostCalculations',
                'DeleteObjectsGroupCostCalculations',
                ),
        ),

        'UserObjectsGroupCostCalculations' => array(
            'type' => CAuthItem::TYPE_ROLE,
            'description' => 'UserObjectsGroupCostCalculations',
            'bizRule' => null,
            'data' => null,
            'defaultIndex' => 'ObjectsGroupCostCalculations/index',
            'children' => array(
                'ViewObjectsGroupCostCalculations'
                ),
        ),

        'ViewObjectsGroupCostCalculations' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'ViewObjectsGroupCostCalculations',
            'bizRule' => null,
            'data' => null,
        ),

        'CreateObjectsGroupCostCalculations' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'CreateObjectsGroupCostCalculations',
            'bizRule' => null,
            'data' => null,
        ),

        'UpdateObjectsGroupCostCalculations' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'UpdateObjectsGroupCostCalculations',
            'bizRule' => null,
            'data' => null,
        ),

        'DeleteObjectsGroupCostCalculations' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'DeleteObjectsGroupCostCalculations',
            'bizRule' => null,
            'data' => null,
        ),

);