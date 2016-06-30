<?php
return array(
	
        /** Роли для таблицы Banks (банки) **/
        'ManagerBanks' => array(
            'type' => CAuthItem::TYPE_ROLE,
            'description' => 'ManagerBanks',
            'bizRule' => null,
            'data' => null,
            'defaultIndex' => 'banks/index',
            'children' => array(
                'ViewBanks',
                'CreateBanks',
                'UpdateBanks',
                ),
        ),

        'UserBanks' => array(
            'type' => CAuthItem::TYPE_ROLE,
            'description' => 'UserBanks',
            'bizRule' => null,
            'data' => null,
            'defaultIndex' => 'banks/index',
            'children' => array(
                'ViewBanks',
                ),
        ),
        'AdminBanks' => array(
            'type' => CAuthItem::TYPE_ROLE,
            'description' => 'AdminBanks',
            'bizRule' => null,
            'data' => null,
            'defaultIndex' => 'banks/index',
            'children' => array(
                'ViewBanks',
                'CreateBanks',
                'UpdateBanks',
                'DeleteBanks',
                ),

        ),

        'ViewBanks' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'ViewBanks',
            'bizRule' => null,
            'data' => null,
        ),

        'CreateBanks' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'CreateBanks',
            'bizRule' => null,
            'data' => null,
        ),

        'UpdateBanks' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'UpdateBanks',
            'bizRule' => null,
            'data' => null,
        ),

        'DeleteBanks' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'DeleteBanks',
            'bizRule' => null,
            'data' => null,
        ),
        );