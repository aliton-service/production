<?php
return array(
	
 /** Роли для таблицы FormsOfOwnership (типы улиц) **/
        'ManagerFormsOfOwnership' => array(
            'type' => CAuthItem::TYPE_ROLE,
            'description' => 'ManagerFormsOfOwnership',
            'bizRule' => null,
            'data' => null,
            'defaultIndex' => 'FormsOfOwnership/index',
             'children' => array(
                'ViewFormsOfOwnership',
                'CreateFormsOfOwnership',
                'UpdateFormsOfOwnership',
                ),
        ),

        'AdminFormsOfOwnership' => array(
            'type' => CAuthItem::TYPE_ROLE,
            'description' => 'AdminFormsOfOwnership',
            'bizRule' => null,
            'data' => null,
            'defaultIndex' => 'FormsOfOwnership/index',
            'children' => array(
                'ViewFormsOfOwnership',
                'CreateFormsOfOwnership',
                'UpdateFormsOfOwnership',
                'DeleteFormsOfOwnership',
                ),
        ),

        'UserFormsOfOwnership' => array(
            'type' => CAuthItem::TYPE_ROLE,
            'description' => 'UserFormsOfOwnership',
            'bizRule' => null,
            'data' => null,
            'defaultIndex' => 'FormsOfOwnership/index',
            'children' => array(
                'ViewFormsOfOwnership'
                ),
        ),

        'ViewFormsOfOwnership' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'ViewFormsOfOwnership',
            'bizRule' => null,
            'data' => null,
        ),

        'CreateFormsOfOwnership' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'CreateFormsOfOwnership',
            'bizRule' => null,
            'data' => null,
        ),

        'UpdateFormsOfOwnership' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'UpdateFormsOfOwnership',
            'bizRule' => null,
            'data' => null,
        ),

        'DeleteFormsOfOwnership' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'DeleteFormsOfOwnership',
            'bizRule' => null,
            'data' => null,
        ),

);