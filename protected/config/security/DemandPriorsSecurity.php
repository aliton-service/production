<?php
return array(
	
         /** Роли для таблицы Streets (улицы) **/
        'ManagerDemandPriors' => array(
            'type' => CAuthItem::TYPE_ROLE,
            'description' => 'ManagerDemandPriors',
            'bizRule' => null,
            'data' => null,
            'defaultIndex' => 'demandPriors/index',
             'children' => array(
                'ViewDemandPriors',
                'CreateDemandPriors',
                'UpdateDemandPriors',
                ),
        ),

        'AdminDemandPriors' => array(
            'type' => CAuthItem::TYPE_ROLE,
            'description' => 'AdminDemandPriors',
            'bizRule' => null,
            'data' => null,
            'defaultIndex' => 'demandPriors/index',
            'children' => array(
                'ViewDemandPriors',
                'CreateDemandPriors',
                'UpdateDemandPriors',
                'DeleteDemandPriors',
                ),
        ),

        'UserDemandPriors' => array(
            'type' => CAuthItem::TYPE_ROLE,
            'description' => 'UserDemandPriors',
            'bizRule' => null,
            'data' => null,
            'defaultIndex' => 'demandPriors/index',
            'children' => array(
                'ViewDemandPriors'
                ),
        ),

        'ViewDemandPriors' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'ViewDemandPriors',
            'bizRule' => null,
            'data' => null,
        ),

        'CreateDemandPriors' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'CreateDemandPriors',
            'bizRule' => null,
            'data' => null,
        ),

        'UpdateDemandPriors' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'UpdateDemandPriors',
            'bizRule' => null,
            'data' => null,
        ),

        'DeleteDemandPriors' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'DeleteDemandPriors',
            'bizRule' => null,
            'data' => null,
        ),
);