<?php
return array(
	
 /** Роли для таблицы StreetTypes (типы улиц) **/
        'ManagerDebtReasons' => array(
            'type' => CAuthItem::TYPE_ROLE,
            'description' => 'ManagerDebtReasons',
            'bizRule' => null,
            'data' => null,
            'defaultIndex' => 'DebtReasons/index',
             'children' => array(
                'ViewDebtReasons',
                'CreateDebtReasons',
                'UpdateDebtReasons',
                ),
        ),

        'AdminDebtReasons' => array(
            'type' => CAuthItem::TYPE_ROLE,
            'description' => 'AdminDebtReasons',
            'bizRule' => null,
            'data' => null,
            'defaultIndex' => 'DebtReasons/index',
            'children' => array(
                'ViewDebtReasons',
                'CreateDebtReasons',
                'UpdateDebtReasons',
                'DeleteDebtReasons',
                ),
        ),

        'UserDebtReasons' => array(
            'type' => CAuthItem::TYPE_ROLE,
            'description' => 'UserDebtReasons',
            'bizRule' => null,
            'data' => null,
            'defaultIndex' => 'DebtReasons/index',
            'children' => array(
                'ViewDebtReasons'
                ),
        ),

        'ViewDebtReasons' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'ViewDebtReasons',
            'bizRule' => null,
            'data' => null,
        ),

        'CreateDebtReasons' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'CreateDebtReasons',
            'bizRule' => null,
            'data' => null,
        ),

        'UpdateDebtReasons' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'UpdateDebtReasons',
            'bizRule' => null,
            'data' => null,
        ),

        'DeleteDebtReasons' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'DeleteDebtReasons',
            'bizRule' => null,
            'data' => null,
        ),

);