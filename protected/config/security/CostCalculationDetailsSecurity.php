<?php
return array(
	
 /** Роли для таблицы CostCalculationDetails (Коммерческие предложения и сметы) **/
        'ManagerCostCalculationDetails' => array(
            'type' => CAuthItem::TYPE_ROLE,
            'description' => 'ManagerCostCalculationDetails',
            'bizRule' => null,
            'data' => null,
            'defaultIndex' => 'CostCalculationDetails/index',
             'children' => array(
                'ViewCostCalculationDetails',
                'CreateCostCalculationDetails',
                'UpdateCostCalculationDetails',
                ),
        ),

        'AdminCostCalculationDetails' => array(
            'type' => CAuthItem::TYPE_ROLE,
            'description' => 'AdminCostCalculationDetails',
            'bizRule' => null,
            'data' => null,
            'defaultIndex' => 'CostCalculationDetails/index',
            'children' => array(
                'ViewCostCalculationDetails',
                'CreateCostCalculationDetails',
                'UpdateCostCalculationDetails',
                'DeleteCostCalculationDetails',
                ),
        ),

        'UserCostCalculationDetails' => array(
            'type' => CAuthItem::TYPE_ROLE,
            'description' => 'UserCostCalculationDetails',
            'bizRule' => null,
            'data' => null,
            'defaultIndex' => 'CostCalculationDetails/index',
            'children' => array(
                'ViewCostCalculationDetails'
                ),
        ),

        'ViewCostCalculationDetails' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'ViewCostCalculationDetails',
            'bizRule' => null,
            'data' => null,
        ),

        'CreateCostCalculationDetails' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'CreateCostCalculationDetails',
            'bizRule' => null,
            'data' => null,
        ),

        'UpdateCostCalculationDetails' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'UpdateCostCalculationDetails',
            'bizRule' => null,
            'data' => null,
        ),

        'DeleteCostCalculationDetails' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'DeleteCostCalculationDetails',
            'bizRule' => null,
            'data' => null,
        ),

);