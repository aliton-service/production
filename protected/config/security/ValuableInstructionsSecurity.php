<?php
return array(
	
         /** Роли для таблицы ValuableInstructions (Подразделения) **/
        'ManagerValuableInstructions' => array(
            'type' => CAuthItem::TYPE_ROLE,
            'description' => 'ManagerValuableInstructions',
            'bizRule' => null,
            'data' => null,
            'defaultIndex' => 'sections/index',
             'children' => array(
                'ViewValuableInstructions',
                'CreateValuableInstructions',
                'UpdateValuableInstructions',
                ),
        ),

        'AdminValuableInstructions' => array(
            'type' => CAuthItem::TYPE_ROLE,
            'description' => 'AdminValuableInstructions',
            'bizRule' => null,
            'data' => null,
            'defaultIndex' => 'sections/index',
            'children' => array(
                'ViewValuableInstructions',
                'CreateValuableInstructions',
                'UpdateValuableInstructions',
                'DeleteValuableInstructions',
                ),
        ),

        'UserValuableInstructions' => array(
            'type' => CAuthItem::TYPE_ROLE,
            'description' => 'UserValuableInstructions',
            'bizRule' => null,
            'data' => null,
            'defaultIndex' => 'sections/index',
            'children' => array(
                'ViewValuableInstructions'
                ),
        ),

        'ViewValuableInstructions' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'ViewValuableInstructions',
            'bizRule' => null,
            'data' => null,
        ),

        'CreateValuableInstructions' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'CreateValuableInstructions',
            'bizRule' => null,
            'data' => null,
        ),

        'UpdateValuableInstructions' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'UpdateValuableInstructions',
            'bizRule' => null,
            'data' => null,
        ),

        'DeleteValuableInstructions' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'DeleteValuableInstructions',
            'bizRule' => null,
            'data' => null,
        ),
);




