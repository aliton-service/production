<?php
return array(
	
           /** Роли для таблицы Juridicals (юридические лица) **/
        'ManagerJuridicals' => array(
            'type' => CAuthItem::TYPE_ROLE,
            'description' => 'ManagerJuridicals',
            'bizRule' => null,
            'data' => null,
            'defaultIndex' => 'juridicals/index',
             'children' => array(
                'ViewJuridicals',
                'CreateJuridicals',
                'UpdateJuridicals',
                ),
        ),

        'AdminJuridicals' => array(
            'type' => CAuthItem::TYPE_ROLE,
            'description' => 'AdminJuridicals',
            'bizRule' => null,
            'data' => null,
            'defaultIndex' => 'juridicals/index',
            'children' => array(
                'ViewJuridicals',
                'CreateJuridicals',
                'UpdateJuridicals',
                'DeleteJuridicals',
                ),
        ),

        'UserJuridicals' => array(
            'type' => CAuthItem::TYPE_ROLE,
            'description' => 'UserJuridicals',
            'bizRule' => null,
            'data' => null,
            'defaultIndex' => 'juridicals/index',
            'children' => array(
                'ViewJuridicals'
                ),
        ),

        'ViewJuridicals' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'ViewJuridicals',
            'bizRule' => null,
            'data' => null,
        ),

        'CreateJuridicals' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'CreateJuridicals',
            'bizRule' => null,
            'data' => null,
        ),

        'UpdateJuridicals' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'UpdateJuridicals',
            'bizRule' => null,
            'data' => null,
        ),

        'DeleteJuridicals' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'DeleteJuridicals',
            'bizRule' => null,
            'data' => null,
        ),
);