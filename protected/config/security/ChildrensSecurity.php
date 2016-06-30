<?php
return array(
	
         /** Роли для таблицы Childrens (Дети) **/
        'ManagerChildrens' => array(
            'type' => CAuthItem::TYPE_ROLE,
            'description' => 'ManagerChildrens',
            'bizRule' => null,
            'data' => null,
            'defaultIndex' => 'childrens/index',
             'children' => array(
                'ViewChildrens',
                'CreateChildrens',
                'UpdateChildrens',
                ),
        ),

        'AdminChildrens' => array(
            'type' => CAuthItem::TYPE_ROLE,
            'description' => 'AdminChildrens',
            'bizRule' => null,
            'data' => null,
            'defaultIndex' => 'childrens/index',
            'children' => array(
                'ViewChildrens',
                'CreateChildrens',
                'UpdateChildrens',
                'DeleteChildrens',
                ),
        ),

        'UserChildrens' => array(
            'type' => CAuthItem::TYPE_ROLE,
            'description' => 'UserChildrens',
            'bizRule' => null,
            'data' => null,
            'defaultIndex' => 'childrens/index',
            'children' => array(
                'ViewChildrens'
                ),
        ),

        'ViewChildrens' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'ViewChildrens',
            'bizRule' => null,
            'data' => null,
        ),

        'CreateChildrens' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'CreateChildrens',
            'bizRule' => null,
            'data' => null,
        ),

        'UpdateChildrens' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'UpdateChildrens',
            'bizRule' => null,
            'data' => null,
        ),

        'DeleteChildrens' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'DeleteChildrens',
            'bizRule' => null,
            'data' => null,
        ),
);




