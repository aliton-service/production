<?php
return array(
	
 /** Роли для таблицы CostCalcSalarys (Коммерческие предложения и сметы -- Зарплата) **/
        'ManagerCostCalcSalarys' => array(
            'type' => CAuthItem::TYPE_ROLE,
            'description' => 'ManagerCostCalcSalarys',
            'bizRule' => null,
            'data' => null,
            'defaultIndex' => 'CostCalcSalarys/index',
             'children' => array(
                'ViewCostCalcSalarys',
                'CreateCostCalcSalarys',
                'UpdateCostCalcSalarys',
                ),
        ),

        'AdminCostCalcSalarys' => array(
            'type' => CAuthItem::TYPE_ROLE,
            'description' => 'AdminCostCalcSalarys',
            'bizRule' => null,
            'data' => null,
            'defaultIndex' => 'CostCalcSalarys/index',
            'children' => array(
                'ViewCostCalcSalarys',
                'CreateCostCalcSalarys',
                'UpdateCostCalcSalarys',
                'DeleteCostCalcSalarys',
                'AcceptCostCalcSalarys',
                ),
        ),

        'UserCostCalcSalarys' => array(
            'type' => CAuthItem::TYPE_ROLE,
            'description' => 'UserCostCalcSalarys',
            'bizRule' => null,
            'data' => null,
            'defaultIndex' => 'CostCalcSalarys/index',
            'children' => array(
                'ViewCostCalcSalarys'
                ),
        ),

        'ViewCostCalcSalarys' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'ViewCostCalcSalarys',
            'bizRule' => null,
            'data' => null,
        ),

        'CreateCostCalcSalarys' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'CreateCostCalcSalarys',
            'bizRule' => null,
            'data' => null,
        ),

        'UpdateCostCalcSalarys' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'UpdateCostCalcSalarys',
            'bizRule' => null,
            'data' => null,
        ),

        'DeleteCostCalcSalarys' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'DeleteCostCalcSalarys',
            'bizRule' => null,
            'data' => null,
        ),

        'AcceptCostCalcSalarys' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'AcceptCostCalcSalarys',
            'bizRule' => null,
            'data' => null,
        ),

);