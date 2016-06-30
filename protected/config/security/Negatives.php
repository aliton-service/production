<?php
return array(
	
 /** Роли для таблицы Negatives (типы улиц) **/
        'ManagerNegatives' => array(
            'type' => CAuthItem::TYPE_ROLE,
            'description' => 'ManagerNegatives',
            'bizRule' => null,
            'data' => null,
            'defaultIndex' => 'Negatives/index',
             'children' => array(
                'ViewNegatives',
                'CreateNegatives',
                'UpdateNegatives',
                ),
        ),

        'AdminNegatives' => array(
            'type' => CAuthItem::TYPE_ROLE,
            'description' => 'AdminNegatives',
            'bizRule' => null,
            'data' => null,
            'defaultIndex' => 'Negatives/index',
            'children' => array(
                'ViewNegatives',
                'CreateNegatives',
                'UpdateNegatives',
                'DeleteNegatives',
                ),
        ),

        'UserNegatives' => array(
            'type' => CAuthItem::TYPE_ROLE,
            'description' => 'UserNegatives',
            'bizRule' => null,
            'data' => null,
            'defaultIndex' => 'Negatives/index',
            'children' => array(
                'ViewNegatives'
                ),
        ),

        'ViewNegatives' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'ViewNegatives',
            'bizRule' => null,
            'data' => null,
        ),

        'CreateNegatives' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'CreateNegatives',
            'bizRule' => null,
            'data' => null,
        ),

        'UpdateNegatives' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'UpdateNegatives',
            'bizRule' => null,
            'data' => null,
        ),

        'DeleteNegatives' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'DeleteNegatives',
            'bizRule' => null,
            'data' => null,
        ),

);