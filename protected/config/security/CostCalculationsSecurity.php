<?php
return array(
	
 /** Роли для таблицы CostCalculations (Коммерческие предложения и сметы) **/
        'ManagerCostCalculations' => array(
            'type' => CAuthItem::TYPE_ROLE,
            'description' => 'ManagerCostCalculations',
            'bizRule' => null,
            'data' => null,
            'defaultIndex' => 'CostCalculations/index',
             'children' => array(
                'ViewCostCalculations',
                'CreateCostCalculations',
                'UpdateCostCalculations',
                ),
        ),

        'AdminCostCalculations' => array(
            'type' => CAuthItem::TYPE_ROLE,
            'description' => 'AdminCostCalculations',
            'bizRule' => null,
            'data' => null,
            'defaultIndex' => 'CostCalculations/index',
            'children' => array(
                'ViewCostCalculations',
                'CreateCostCalculations',
                'UpdateCostCalculations',
                'DeleteCostCalculations',
                'AgreedCostCalculations',
                'UndoAgreedCostCalculations',
                'ReadyCostCalculations',
                'UndoReadyCostCalculations',
                'CopyCostCalculations',
                'AnnulCostCalculations',
                
                ),
        ),

        'UserCostCalculations' => array(
            'type' => CAuthItem::TYPE_ROLE,
            'description' => 'UserCostCalculations',
            'bizRule' => null,
            'data' => null,
            'defaultIndex' => 'CostCalculations/index',
            'children' => array(
                'ViewCostCalculations'
                ),
        ),

        'ViewCostCalculations' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'ViewCostCalculations',
            'bizRule' => null,
            'data' => null,
        ),

        'CreateCostCalculations' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'CreateCostCalculations',
            'bizRule' => null,
            'data' => null,
        ),

        'UpdateCostCalculations' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'UpdateCostCalculations',
            'bizRule' => null,
            'data' => null,
        ),

        'DeleteCostCalculations' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'DeleteCostCalculations',
            'bizRule' => null,
            'data' => null,
        ),

        'AgreedCostCalculations' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'AgreedCostCalculations',
            'bizRule' => null,
            'data' => null,
        ),
    
        'UndoAgreedCostCalculations' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'UndoAgreedCostCalculations',
            'bizRule' => null,
            'data' => null,
        ),
    
        'ReadyCostCalculations' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'ReadyCostCalculations',
            'bizRule' => null,
            'data' => null,
        ),
        'UndoReadyCostCalculations' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'UndoReadyCostCalculations',
            'bizRule' => null,
            'data' => null,
        ),
    
        'CopyCostCalculations' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'CopyCostCalculations',
            'bizRule' => null,
            'data' => null,
        ),
    
        'AnnulCostCalculations' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'AnnulCostCalculations',
            'bizRule' => null,
            'data' => null,
        ),
    
);