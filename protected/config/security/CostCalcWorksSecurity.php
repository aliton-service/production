<?php
return array(
	
 /** Роли для таблицы CostCalcWorks (Коммерческие предложения и сметы -- Работы) **/
        'ManagerCostCalcWorks' => array(
            'type' => CAuthItem::TYPE_ROLE,
            'description' => 'ManagerCostCalcWorks',
            'bizRule' => null,
            'data' => null,
            'defaultIndex' => 'CostCalcWorks/index',
             'children' => array(
                'ViewCostCalcWorks',
                'CreateCostCalcWorks',
                'UpdateCostCalcWorks',
                'DeleteCostCalcWorks',
                ),
        ),

        'AdminCostCalcWorks' => array(
            'type' => CAuthItem::TYPE_ROLE,
            'description' => 'AdminCostCalcWorks',
            'bizRule' => null,
            'data' => null,
            'defaultIndex' => 'CostCalcWorks/index',
            'children' => array(
                'ViewCostCalcWorks',
                'CreateCostCalcWorks',
                'UpdateCostCalcWorks',
                'DeleteCostCalcWorks',
                ),
        ),

        'UserCostCalcWorks' => array(
            'type' => CAuthItem::TYPE_ROLE,
            'description' => 'UserCostCalcWorks',
            'bizRule' => null,
            'data' => null,
            'defaultIndex' => 'CostCalcWorks/index',
            'children' => array(
                'ViewCostCalcWorks'
                ),
        ),

        'ViewCostCalcWorks' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'ViewCostCalcWorks',
            'bizRule' => null,
            'data' => null,
        ),

        'CreateCostCalcWorks' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'CreateCostCalcWorks',
            'bizRule' => null,
            'data' => null,
        ),

        'UpdateCostCalcWorks' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'UpdateCostCalcWorks',
            'bizRule' => null,
            'data' => null,
        ),

        'DeleteCostCalcWorks' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'DeleteCostCalcWorks',
            'bizRule' => null,
            'data' => null,
        ),

);