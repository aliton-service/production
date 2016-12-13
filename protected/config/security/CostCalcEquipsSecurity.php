<?php
return array(
	
 /** Роли для таблицы CostCalcEquips (Коммерческие предложения и сметы -- Оборудование) **/
        'ManagerCostCalcEquips' => array(
            'type' => CAuthItem::TYPE_ROLE,
            'description' => 'ManagerCostCalcEquips',
            'bizRule' => null,
            'data' => null,
            'defaultIndex' => 'CostCalcEquips/index',
             'children' => array(
                'ViewCostCalcEquips',
                'CreateCostCalcEquips',
                'UpdateCostCalcEquips',
                'DeleteCostCalcEquips',
                ),
        ),

        'AdminCostCalcEquips' => array(
            'type' => CAuthItem::TYPE_ROLE,
            'description' => 'AdminCostCalcEquips',
            'bizRule' => null,
            'data' => null,
            'defaultIndex' => 'CostCalcEquips/index',
            'children' => array(
                'ViewCostCalcEquips',
                'CreateCostCalcEquips',
                'UpdateCostCalcEquips',
                'DeleteCostCalcEquips',
                ),
        ),

        'UserCostCalcEquips' => array(
            'type' => CAuthItem::TYPE_ROLE,
            'description' => 'UserCostCalcEquips',
            'bizRule' => null,
            'data' => null,
            'defaultIndex' => 'CostCalcEquips/index',
            'children' => array(
                'ViewCostCalcEquips'
                ),
        ),

        'ViewCostCalcEquips' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'ViewCostCalcEquips',
            'bizRule' => null,
            'data' => null,
        ),

        'CreateCostCalcEquips' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'CreateCostCalcEquips',
            'bizRule' => null,
            'data' => null,
        ),

        'UpdateCostCalcEquips' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'UpdateCostCalcEquips',
            'bizRule' => null,
            'data' => null,
        ),

        'DeleteCostCalcEquips' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'DeleteCostCalcEquips',
            'bizRule' => null,
            'data' => null,
        ),

);