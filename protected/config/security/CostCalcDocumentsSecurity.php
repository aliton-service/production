<?php
return array(
	
 /** Роли для таблицы CostCalcDocuments (Коммерческие предложения и сметы -- Документы) **/
        'ManagerCostCalcDocuments' => array(
            'type' => CAuthItem::TYPE_ROLE,
            'description' => 'ManagerCostCalcDocuments',
            'bizRule' => null,
            'data' => null,
            'defaultIndex' => 'CostCalcDocuments/index',
             'children' => array(
                'ViewCostCalcDocuments',
                'CreateCostCalcDocuments',
                'UpdateCostCalcDocuments',
            ),
        ),

        'AdminCostCalcDocuments' => array(
            'type' => CAuthItem::TYPE_ROLE,
            'description' => 'AdminCostCalcDocuments',
            'bizRule' => null,
            'data' => null,
            'defaultIndex' => 'CostCalcDocuments/index',
            'children' => array(
                'ViewCostCalcDocuments',
                'CreateCostCalcDocuments',
                'UpdateCostCalcDocuments',
                'DeleteCostCalcDocuments',
            ),
        ),

        'UserCostCalcDocuments' => array(
            'type' => CAuthItem::TYPE_ROLE,
            'description' => 'UserCostCalcDocuments',
            'bizRule' => null,
            'data' => null,
            'defaultIndex' => 'CostCalcDocuments/index',
            'children' => array(
                'ViewCostCalcDocuments'
            ),
        ),

        'ViewCostCalcDocuments' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'ViewCostCalcDocuments',
            'bizRule' => null,
            'data' => null,
        ),

        'CreateCostCalcDocuments' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'CreateCostCalcDocuments',
            'bizRule' => null,
            'data' => null,
        ),

        'UpdateCostCalcDocuments' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'UpdateCostCalcDocuments',
            'bizRule' => null,
            'data' => null,
        ),

        'DeleteCostCalcDocuments' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'DeleteCostCalcDocuments',
            'bizRule' => null,
            'data' => null,
        ),

);